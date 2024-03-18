<?php

namespace MediaWiki\Tests\Rest;

use Exception;
use InvalidArgumentException;
use MediaWiki\Rest\Handler;
use MediaWiki\Rest\HttpException;
use MediaWiki\Rest\LocalizedHttpException;
use MediaWiki\Rest\RequestData;
use MediaWiki\Rest\Validator\BodyValidator;
use MediaWiki\Rest\Validator\JsonBodyValidator;
use MediaWiki\Rest\Validator\NullBodyValidator;
use MediaWiki\Rest\Validator\Validator;
use MediaWiki\Tests\Unit\DummyServicesTrait;
use MediaWiki\Tests\Unit\Permissions\MockAuthorityTrait;
use MediaWikiUnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Wikimedia\Message\MessageValue;
use Wikimedia\ParamValidator\ParamValidator;

/**
 * @covers \MediaWiki\Rest\Validator\Validator
 * @covers \MediaWiki\Rest\Validator\ParamValidatorCallbacks
 */
class ValidatorTest extends MediaWikiUnitTestCase {
	use DummyServicesTrait;
	use MockAuthorityTrait;

	public static function provideValidateBody() {
		$bodyData = [
			'kittens' => 'cute',
			'number' => 5,
		];

		$emptyBodyValidator = new NullBodyValidator();
		$nonEmptyBodyValidator = new JsonBodyValidator( [
			'kittens' => [
				'rest-param-source' => 'body',
				ParamValidator::PARAM_TYPE => 'string',
				ParamValidator::PARAM_REQUIRED => true,
			],
			'number' => [
				'rest-param-source' => 'body',
				ParamValidator::PARAM_TYPE => 'integer',
				ParamValidator::PARAM_REQUIRED => true,
			]
		] );

		$emptyBodyParams = [ 'bodyContents' => '' ];
		$nonEmptyBodyParams = [
			'bodyContents' => json_encode( (object)$bodyData ),
			'headers' => [
				'Content-Type' => 'application/json'
			]
		];
		$nonEmptyBodyUnknownTypeParams = [
			'bodyContents' => json_encode( (object)$bodyData ),
		];

		// Validator::validateBody() normalizes method for case and leading/trailing whitespace.
		// Use various permutations herein to confirm that normalization is happy.
		yield 'GET request with empty body' => [
			$emptyBodyValidator,
			new RequestData( $emptyBodyParams + [ 'method' => 'GET' ] ),
			null
		];

		yield 'GET request with non-empty body' => [
			$emptyBodyValidator,
			new RequestData( $nonEmptyBodyParams + [ 'method' => 'get' ] ),
			null
		];

		yield 'HEAD request with empty body' => [
			$emptyBodyValidator,
			new RequestData( $emptyBodyParams + [ 'method' => 'HEAD' ] ),
			null
		];

		yield 'HEAD request with non-empty body' => [
			$emptyBodyValidator,
			new RequestData( $nonEmptyBodyParams + [ 'method' => 'Head' ] ),
			null

		];
		yield 'DELETE request with empty body' => [
			$emptyBodyValidator,
			new RequestData( $emptyBodyParams + [ 'method' => 'DELETE' ] ),
			null
		];

		yield 'DELETE request with non-empty body' => [
			$nonEmptyBodyValidator,
			new RequestData( $nonEmptyBodyParams + [ 'method' => 'DELETE ' ] ),
			$bodyData
		];

		yield 'POST request with empty body' => [
			$nonEmptyBodyValidator,
			new RequestData( $emptyBodyParams + [ 'method' => 'POST' ] ),
			null
		];

		yield 'POST request with unknown type' => [
			$emptyBodyValidator,
			new RequestData( $nonEmptyBodyUnknownTypeParams + [ 'method' => 'POST' ] ),
			HttpException::class
		];

		yield 'POST request with non-empty body' => [
			$nonEmptyBodyValidator,
			new RequestData( $nonEmptyBodyParams + [ 'method' => ' POST' ] ),
			$bodyData
		];

		yield 'PUT request with empty body' => [
			$nonEmptyBodyValidator,
			new RequestData( $emptyBodyParams + [ 'method' => 'PUT' ] ),
			null
		];

		yield 'PUT request with unknown type' => [
			$emptyBodyValidator,
			new RequestData( $nonEmptyBodyUnknownTypeParams + [ 'method' => 'PUT' ] ),
			HttpException::class
		];

		yield 'PUT request with non-empty body' => [
			$nonEmptyBodyValidator,
			new RequestData( $nonEmptyBodyParams + [ 'method' => ' put ' ] ),
			$bodyData
		];
	}

	/**
	 * If $expected is a string, it must be the name of the expected exception class.
	 * Otherwise, it must match the returned body.
	 *
	 * @dataProvider provideValidateBody
	 */
	public function testValidateBody( BodyValidator $bodyValidator, RequestData $requestData, $expected ) {
		$objectFactory = $this->getDummyObjectFactory();

		/** @var Handler|MockObject $handler */
		$handler = $this->getMockBuilder( Handler::class )
			->onlyMethods( [ 'getBodyValidator', 'execute' ] )
			->getMock();
		$handler->method( 'getBodyValidator' )->willReturn( $bodyValidator );

		$validator = new Validator( $objectFactory, $requestData, $this->mockAnonNullAuthority() );

		if ( is_string( $expected ) ) {
			$this->expectException( $expected );
		}

		$actual = $validator->validateBody( $requestData, $handler );
		$this->assertEquals( $expected, $actual );
	}

	public static function provideParameterSpec() {
		yield 'simple path parameter' => [
			[
				ParamValidator::PARAM_TYPE => 'string',
				Validator::PARAM_SOURCE => 'path',
			],
			[
				'schema' => [
					'type' => 'string',
				],
				'required' => true,
				'description' => 'test parameter',
				'in' => 'path',
				'name' => 'test',
			],
		];

		yield 'optional query parameter' => [
			[
				ParamValidator::PARAM_TYPE => 'float',
				Validator::PARAM_SOURCE => 'query',
				ParamValidator::PARAM_REQUIRED => false,
			],
			[
				'schema' => [
					'type' => 'number',
					'format' => 'float',
				],
				'required' => false,
				'description' => 'test parameter',
				'in' => 'query',
				'name' => 'test',
			]
		];

		yield 'enum parameter' => [
			[
				ParamValidator::PARAM_TYPE => [ 'a', 'b', 'c' ],
				Validator::PARAM_SOURCE => 'body',
				Validator::PARAM_DESCRIPTION => 'just a test',
				ParamValidator::PARAM_REQUIRED => true,
			],
			[
				'schema' => [
					'type' => 'string',
					'enum' => [ 'a', 'b', 'c' ],
				],
				'required' => true,
				'description' => 'just a test',
				'in' => 'body',
				'name' => 'test',
			]
		];

		yield 'empty enum (should not happen)' => [
			[
				ParamValidator::PARAM_TYPE => [],
				Validator::PARAM_SOURCE => 'body',
				Validator::PARAM_DESCRIPTION => 'just a test',
				ParamValidator::PARAM_REQUIRED => true,
			],
			[
				'schema' => [
					'type' => 'string',
					'enum' => [ '' ], // hacky
				],
				'required' => true,
				'description' => 'just a test',
				'in' => 'body',
				'name' => 'test',
			]
		];

		// Should not happen, but we shouldn't let things explode either.
		yield 'timestamp, missing source (should not happen)' => [
			[
				ParamValidator::PARAM_TYPE => 'timestamp',
			],
			[
				'schema' => [
					'type' => 'string',
					'format' => 'mw-timestamp',
				],
				'required' => false,
				'description' => 'test parameter',
				'in' => 'unspecified',
				'name' => 'test',
			]
		];

		// Should not happen, but we shouldn't let things explode either.
		yield 'missing type, pretend not required' => [
			[
				Validator::PARAM_SOURCE => 'path',
				ParamValidator::PARAM_REQUIRED => false,
			],
			[
				'schema' => [
					'type' => 'string',
				],
				'required' => true, // path params are always required
				'description' => 'test parameter',
				'in' => 'path',
				'name' => 'test',
			]
		];
	}

	/**
	 * @dataProvider provideParameterSpec
	 * @param array $paramSetting
	 * @param array $expectedSpec
	 */
	public function testParameterSpec( $paramSetting, $expectedSpec ) {
		$spec = Validator::getParameterSpec( 'test', $paramSetting );
		$this->assertArrayEquals( $expectedSpec, $spec, false, true );
	}

	public static function provideValidateParams() {
		$sources = [ 'path', 'query', 'post', 'body' ];
		$paramNames = [
			"path" => "pathParams",
			"query" => "queryParams",
			"post" => "postParams",
			"body" => "parsedBody"
		];
		foreach ( $sources as $source ) {
			yield "default $source parameter is null" => [
				[
					'defaultparam' => [
						ParamValidator::PARAM_TYPE => 'string',
						Validator::PARAM_SOURCE => $source,
					]
				],
				new RequestData( [ 'pathParams' => [] ] ),
				[ 'defaultparam' => null ]
			];
			yield "missing required $source parameter raises Exception" => [
				[
					'requiredparam' => [
						ParamValidator::PARAM_TYPE => 'string',
						ParamValidator::PARAM_REQUIRED => true,
						Validator::PARAM_SOURCE => $source,
					]
				],
				new RequestData( [] ),
				new LocalizedHttpException( new MessageValue( 'paramvalidator-missingparam' ), 400 )
			];
			yield "$source parameter" => [
				[
					'param' => [
						ParamValidator::PARAM_TYPE => 'string',
						Validator::PARAM_SOURCE => $source,
					]
				],
				new RequestData( [ $paramNames[ $source ] => [ 'param' => 'test' ] ] ),
				[ 'param' => 'test' ]
			];
			yield "return default $source param set" => [
				[
					'param' => [
						ParamValidator::PARAM_TYPE => 'string',
						Validator::PARAM_SOURCE => $source,
						ParamValidator::PARAM_DEFAULT => "default$source"
					]
				],
				new RequestData( [] ),
				[ "param" => "default$source" ]
			];
			yield "throw on malformed $source param" => [
				[
					'param' => [
						ParamValidator::PARAM_TYPE => 'string',
						Validator::PARAM_SOURCE => $source,
					]
				],
				new RequestData( [ $paramNames[ $source ] => [ 'param' => [] ] ] ),
				new LocalizedHttpException( new MessageValue( 'paramvalidator-notmulti' ), 400 )
			];
		}
		yield 'unknown source' => [
			[
				'unknown source' => [
					ParamValidator::PARAM_TYPE => 'string',
					Validator::PARAM_SOURCE => 'unknown',
				]
			],
			new RequestData( [ 'parsedBody' => [ 'simplebodyparam1' => 'test' ] ] ),
			new InvalidArgumentException( "Invalid source 'unknown'" )
		];
	}

	/**
	 * If $expected is a string, it must be the name of the expected exception class.
	 * Otherwise, it must match the returned body.
	 *
	 * @dataProvider provideValidateParams
	 */
	public function testValidateParams( $paramSetting, RequestData $requestData, $expected ) {
		$objectFactory = $this->getDummyObjectFactory();
		$validator = new Validator( $objectFactory, $requestData, $this->mockAnonNullAuthority() );

		if ( $expected instanceof Exception ) {
			$this->expectException( get_class( $expected ) );
			$this->expectExceptionCode( $expected->getCode() );
			$this->expectExceptionMessage( $expected->getMessage() );
		}

		$actual = $validator->validateParams( $paramSetting );
		$this->assertEquals( $expected, $actual );
	}
}
