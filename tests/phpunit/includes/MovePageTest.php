<?php

use MediaWiki\Config\ServiceOptions;
use MediaWiki\Interwiki\InterwikiLookup;
use MediaWiki\MediaWikiServices;
use MediaWiki\Revision\SlotRecord;
use MediaWiki\Tests\Rest\Handler\MediaTestTrait;
use MediaWiki\Tests\Unit\DummyServicesTrait;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\LoadBalancer;

/**
 * @covers MovePage
 * @group Database
 */
class MovePageTest extends MediaWikiIntegrationTestCase {
	use DummyServicesTrait;
	use MediaTestTrait;

	/**
	 * @param Title $old
	 * @param Title $new
	 * @param array $params Valid keys are: db, options, nsInfo, wiStore, repoGroup.
	 *   options is an indexed array that will overwrite our defaults, not a ServiceOptions, so it
	 *   need not contain all keys.
	 * @return MovePage
	 */
	private function newMovePageWithMocks( $old, $new, array $params = [] ): MovePage {
		$mockLB = $this->createMock( LoadBalancer::class );
		$mockLB->method( 'getConnectionRef' )
			->willReturn( $params['db'] ?? $this->createNoOpMock( IDatabase::class ) );
		$mockLB->expects( $this->never() )
			->method( $this->anythingBut( 'getConnectionRef', '__destruct' ) );

		// If we don't use a manual mock for something specific, get a full
		// NamespaceInfo service from DummyServicesTrait::getDummyNamespaceInfo
		$nsInfo = $mocks['nsInfo'] ?? $this->getDummyNamespaceInfo();

		return new MovePage(
			$old,
			$new,
			new ServiceOptions(
				MovePage::CONSTRUCTOR_OPTIONS,
				$params['options'] ?? [],
				[
					'CategoryCollation' => 'uppercase',
					'MaximumMovedPages' => 100,
				]
			),
			$mockLB,
			$nsInfo,
			$params['wiStore'] ?? $this->createMock( WatchedItemStore::class ),
			$params['repoGroup'] ?? $this->makeMockRepoGroup(
				[ 'Existent.jpg', 'Existent2.jpg', 'Existent-file-no-page.jpg' ]
			),
			$params['contentHandlerFactory']
				?? MediaWikiServices::getInstance()->getContentHandlerFactory(),
			$this->getServiceContainer()->getRevisionStore(),
			$this->getServiceContainer()->getSpamChecker(),
			$this->getServiceContainer()->getHookContainer(),
			$this->getServiceContainer()->getWikiPageFactory(),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getUserEditTracker(),
			$this->getServiceContainer()->getMovePageFactory()
		);
	}

	protected function setUp(): void {
		parent::setUp();

		// Ensure we have some pages that are guaranteed to exist or not
		$this->getExistingTestPage( 'Existent' );
		$this->getExistingTestPage( 'Existent2' );
		$this->getExistingTestPage( 'File:Existent.jpg' );
		$this->getExistingTestPage( 'File:Existent2.jpg' );
		$this->getExistingTestPage( 'File:Non-file.jpg' );
		$this->getExistingTestPage( 'MediaWiki:Existent.js' );
		$this->getExistingTestPage( 'Hooked in place' );
		$this->getNonexistingTestPage( 'Nonexistent' );
		$this->getNonexistingTestPage( 'Nonexistent2' );
		$this->getNonexistingTestPage( 'File:Nonexistent.jpg' );
		$this->getNonexistingTestPage( 'File:Nonexistent.png' );
		$this->getNonexistingTestPage( 'File:Existent-file-no-page.jpg' );
		$this->getNonexistingTestPage( 'MediaWiki:Nonexistent' );
		$this->getNonexistingTestPage( 'No content allowed' );

		// Set a couple of hooks for specific pages
		$this->setTemporaryHook( 'ContentModelCanBeUsedOn',
			static function ( $modelId, Title $title, &$ok ) {
				if ( $title->getPrefixedText() === 'No content allowed' ) {
					$ok = false;
				}
			}
		);

		$this->setTemporaryHook( 'TitleIsMovable',
			static function ( Title $title, &$result ) {
				if ( strtolower( $title->getPrefixedText() ) === 'hooked in place' ) {
					$result = false;
				}
			}
		);

		$this->tablesUsed[] = 'page';
		$this->tablesUsed[] = 'revision';
		$this->tablesUsed[] = 'comment';
	}

	/**
	 * @covers MovePage::__construct
	 */
	public function testConstructorDefaults() {
		$services = MediaWikiServices::getInstance();

		$this->filterDeprecated( '/MovePage::__construct/' );

		$obj1 = new MovePage( Title::newFromText( 'A' ), Title::newFromText( 'B' ) );
		$obj2 = new MovePage(
			Title::newFromText( 'A' ),
			Title::newFromText( 'B' ),
			new ServiceOptions( MovePage::CONSTRUCTOR_OPTIONS, $services->getMainConfig() ),
			$services->getDBLoadBalancer(),
			$services->getNamespaceInfo(),
			$services->getWatchedItemStore(),
			$services->getRepoGroup(),
			$services->getContentHandlerFactory()
		);

		$this->assertEquals( $obj2, $obj1 );
	}

	/**
	 * @dataProvider provideIsValidMove
	 * @covers MovePage::isValidMove
	 * @covers MovePage::isValidMoveTarget
	 * @covers MovePage::isValidFileMove
	 * @covers MovePage::__construct
	 *
	 * @param string|Title $old
	 * @param string|Title $new
	 * @param array $expectedErrors
	 * @param array $extraOptions
	 */
	public function testIsValidMove(
		$old, $new, array $expectedErrors, array $extraOptions = []
	) {
		$iwLookup = $this->createMock( InterwikiLookup::class );
		$iwLookup->method( 'isValidInterwiki' )
			->willReturn( true );

		$this->setService(
			'InterwikiLookup',
			$iwLookup
		);

		if ( is_string( $old ) ) {
			$old = Title::newFromText( $old );
		}
		if ( is_string( $new ) ) {
			$new = Title::newFromText( $new );
		}
		$mp = $this->newMovePageWithMocks( $old, $new, [ 'options' => $extraOptions ] );
		$this->assertSame( $expectedErrors, $mp->isValidMove()->getErrorsArray() );
	}

	public static function provideIsValidMove() {
		$ret = [
			'Self move' => [
				'Existent',
				'Existent',
				[ [ 'selfmove' ] ],
			],
			'Move from empty name' => [
				Title::makeTitle( NS_MAIN, '' ),
				'Nonexistent',
				// @todo More specific error message, or make the move valid if the page actually
				// exists somehow in the database
				[ [ 'badarticleerror' ] ],
			],
			'Move to empty name' => [
				'Existent',
				Title::makeTitle( NS_MAIN, '' ),
				[ [ 'movepage-invalid-target-title' ] ],
			],
			'Move to invalid name' => [
				'Existent',
				Title::makeTitle( NS_MAIN, '<' ),
				[ [ 'movepage-invalid-target-title' ] ],
			],
			'Move between invalid names' => [
				Title::makeTitle( NS_MAIN, '<' ),
				Title::makeTitle( NS_MAIN, '>' ),
				// @todo First error message should be more specific, or maybe we should make moving
				// such pages valid if they actually exist somehow in the database
				[ [ 'movepage-source-doesnt-exist' ], [ 'movepage-invalid-target-title' ] ],
			],
			'Move nonexistent' => [
				'Nonexistent',
				'Nonexistent2',
				[ [ 'movepage-source-doesnt-exist' ] ],
			],
			'Move over existing' => [
				'Existent',
				'Existent2',
				[ [ 'articleexists', 'Existent2' ] ],
			],
			'Move from another wiki' => [
				Title::makeTitle( NS_MAIN, 'Test', '', 'otherwiki' ),
				'Nonexistent',
				[ [ 'immobile-source-namespace-iw' ] ],
			],
			'Move special page' => [
				'Special:FooBar',
				'Nonexistent',
				[ [ 'immobile-source-namespace', 'Special' ] ],
			],
			'Move to another wiki' => [
				'Existent',
				Title::makeTitle( NS_MAIN, 'Test', '', 'otherwiki' ),
				[ [ 'immobile-target-namespace-iw' ] ],
			],
			'Move to special page' =>
				[ 'Existent', 'Special:FooBar', [ [ 'immobile-target-namespace', 'Special' ] ] ],
			'Move to allowed content model' => [
				'MediaWiki:Existent.js',
				'MediaWiki:Nonexistent',
				[],
			],
			'Move to prohibited content model' => [
				'Existent',
				'No content allowed',
				[ [ 'content-not-allowed-here', 'wikitext', 'No content allowed', 'main' ] ],
			],
			'Aborted by hook' => [
				'Hooked in place',
				'Nonexistent',
				[ [ 'immobile-source-namespace', '(Main)' ] ],
			],
			'Doubly aborted by hook' => [
				'Hooked in place',
				'Hooked In Place',
				[
					[ 'immobile-source-namespace', '(Main)' ],
					[ 'immobile-target-namespace', '(Main)' ]
				],
			],
			'Non-file to file' =>
				[ 'Existent', 'File:Nonexistent.jpg', [ [ 'nonfile-cannot-move-to-file' ] ] ],
			'File to non-file' => [
				'File:Existent.jpg',
				'Nonexistent',
				[ [ 'imagenocrossnamespace' ] ],
			],
			'Existing file to non-existing file' => [
				'File:Existent.jpg',
				'File:Nonexistent.jpg',
				[],
			],
			'Existing file to existing file' => [
				'File:Existent.jpg',
				'File:Existent2.jpg',
				[ [ 'articleexists', 'File:Existent2.jpg' ] ],
			],
			'Existing file to existing file with no page' => [
				'File:Existent.jpg',
				'File:Existent-file-no-page.jpg',
				// @todo Is this correct? Moving over an existing file with no page should succeed?
				[],
			],
			'Existing file to name with slash' => [
				'File:Existent.jpg',
				'File:Existent/slashed.jpg',
				[ [ 'imageinvalidfilename' ] ],
			],
			'Mismatched file extension' => [
				'File:Existent.jpg',
				'File:Nonexistent.png',
				[ [ 'imagetypemismatch' ] ],
			],
			'Non-file page in the File namespace' => [
				'File:Non-file.jpg',
				'File:Non-file-new.png',
				[],
			],
		];
		return $ret;
	}

	/**
	 * @dataProvider provideIsValidMove
	 *
	 * @param string $old Old name
	 * @param string $new New name
	 * @param array $expectedErrors
	 * @param array $extraOptions
	 */
	public function testMove( $old, $new, array $expectedErrors, array $extraOptions = [] ) {
		$iwLookup = $this->createMock( InterwikiLookup::class );
		$iwLookup->method( 'isValidInterwiki' )
			->willReturn( true );

		$this->setService(
			'InterwikiLookup',
			$iwLookup
		);

		if ( is_string( $old ) ) {
			$old = Title::newFromText( $old );
		}
		if ( is_string( $new ) ) {
			$new = Title::newFromText( $new );
		}

		$params = [ 'options' => $extraOptions ];

		if ( $expectedErrors ) {
			$obj = $this->newMovePageWithMocks( $old, $new, $params );
			$status = $obj->move( $this->getTestUser()->getUser() );
			$this->assertSame( $expectedErrors, $status->getErrorsArray() );
		} else {
			$oldPageId = $old->getArticleID();
			$status = $this->getServiceContainer()
				->getMovePageFactory()
				->newMovePage( $old, $new )
				->move( $this->getTestUser()->getUser(), 'move reason' );
			$this->assertTrue( $status->isOK() );
			$this->assertMoved( $old, $new, $oldPageId );
		}
	}

	/**
	 * Test for the move operation being aborted via the TitleMove hook
	 * @covers MovePage::move
	 */
	public function testMoveAbortedByTitleMoveHook() {
		$error = 'Preventing move operation with TitleMove hook.';
		$this->setTemporaryHook( 'TitleMove',
			static function ( $old, $new, $user, $reason, $status ) use ( $error ) {
				$status->fatal( $error );
			}
		);

		$oldTitle = Title::newFromText( 'Some old title' );
		WikiPage::factory( $oldTitle )->doUserEditContent(
			new WikitextContent( 'foo' ),
			$this->getTestSysop()->getUser(),
			'bar'
		);
		$newTitle = Title::newFromText( 'A brand new title' );
		$mp = $this->newMovePageWithMocks( $oldTitle, $newTitle );
		$user = User::newFromName( 'TitleMove tester' );
		$status = $mp->move( $user, 'Reason', true );
		$this->assertTrue( $status->hasMessage( $error ) );
	}

	/**
	 * Test moving subpages from one page to another
	 * @covers MovePage::moveSubpages
	 */
	public function testMoveSubpages() {
		$name = ucfirst( __FUNCTION__ );

		$subPages = [ "Talk:$name/1", "Talk:$name/2" ];
		$ids = [];
		$pages = [
			$name,
			"Talk:$name",
			"$name 2",
			"Talk:$name 2",
		];
		foreach ( array_merge( $pages, $subPages ) as $page ) {
			$ids[$page] = $this->createPage( $page );
		}

		$oldTitle = Title::newFromText( "Talk:$name" );
		$newTitle = Title::newFromText( "Talk:$name 2" );
		$status = $this->getServiceContainer()
			->getMovePageFactory()
			->newMovePage( $oldTitle, $newTitle )
			->moveSubpages( $this->getTestUser()->getUser(), 'Reason', true );

		$this->assertTrue( $status->isGood(),
			"Moving subpages from Talk:{$name} to Talk:{$name} 2 was not completely successful." );
		foreach ( $subPages as $page ) {
			$this->assertMoved( $page, str_replace( $name, "$name 2", $page ), $ids[$page] );
		}
	}

	/**
	 * Test moving subpages from one page to another
	 * @covers MovePage::moveSubpagesIfAllowed
	 */
	public function testMoveSubpagesIfAllowed() {
		$name = ucfirst( __FUNCTION__ );

		$subPages = [ "Talk:$name/1", "Talk:$name/2" ];
		$ids = [];
		$pages = [
			$name,
			"Talk:$name",
			"$name 2",
			"Talk:$name 2",
		];
		foreach ( array_merge( $pages, $subPages ) as $page ) {
			$ids[$page] = $this->createPage( $page );
		}

		$oldTitle = Title::newFromText( "Talk:$name" );
		$newTitle = Title::newFromText( "Talk:$name 2" );
		$status = $this->getServiceContainer()
			->getMovePageFactory()
			->newMovePage( $oldTitle, $newTitle )
			->moveSubpagesIfAllowed( $this->getTestUser()->getUser(), 'Reason', true );

		$this->assertTrue( $status->isGood(),
			"Moving subpages from Talk:{$name} to Talk:{$name} 2 was not completely successful." );
		foreach ( $subPages as $page ) {
			$this->assertMoved( $page, str_replace( $name, "$name 2", $page ), $ids[$page] );
		}
	}

	/**
	 * Shortcut function to create a page and return its id.
	 *
	 * @param string $name Page to create
	 * @return int ID of created page
	 */
	protected function createPage( $name ) {
		return $this->editPage( $name, 'Content' )->value['revision-record']->getPageId();
	}

	/**
	 * @param string $from Prefixed name of source
	 * @param string|Title $to Prefixed name of destination
	 * @param string|Title $id Page id of the page to move
	 * @param array|string|null $opts Options: 'noredirect' to expect no redirect
	 */
	protected function assertMoved( $from, $to, $id, $opts = null ) {
		$opts = (array)$opts;

		Title::clearCaches();
		$fromTitle = $from instanceof Title ? $from : Title::newFromText( $from );
		$toTitle = $to instanceof Title ? $to : Title::newFromText( $to );

		$this->assertTrue( $toTitle->exists(),
			"Destination {$toTitle->getPrefixedText()} does not exist" );

		if ( in_array( 'noredirect', $opts ) ) {
			$this->assertFalse( $fromTitle->exists(),
				"Source {$fromTitle->getPrefixedText()} exists" );
		} else {
			$this->assertTrue( $fromTitle->exists(),
				"Source {$fromTitle->getPrefixedText()} does not exist" );
			$this->assertTrue( $fromTitle->isRedirect(),
				"Source {$fromTitle->getPrefixedText()} is not a redirect" );

			$target = MediaWikiServices::getInstance()
				->getRevisionLookup()
				->getRevisionByTitle( $fromTitle )
				->getContent( SlotRecord::MAIN )
				->getRedirectTarget();
			$this->assertSame( $toTitle->getPrefixedText(), $target->getPrefixedText() );
		}

		$this->assertSame( $id, $toTitle->getArticleID() );
	}

	/**
	 * Test redirect handling
	 *
	 * @covers MovePage::isValidMove
	 */
	public function testRedirects() {
		$this->editPage( 'ExistentRedirect', '#REDIRECT [[Existent]]' );
		$mp = $this->newMovePageWithMocks(
			Title::newFromText( 'Existent' ),
			Title::newFromText( 'ExistentRedirect' )
		);
		$this->assertSame(
			[],
			$mp->isValidMove()->getErrorsArray(),
			'Can move over normal redirect'
		);

		$this->editPage( 'ExistentRedirect3', '#REDIRECT [[Existent]]' );
		$mp = $this->newMovePageWithMocks(
			Title::newFromText( 'Existent2' ),
			Title::newFromText( 'ExistentRedirect3' )
		);
		$this->assertSame(
			[ [ 'redirectexists', 'ExistentRedirect3' ] ],
			$mp->isValidMove()->getErrorsArray(),
			'Cannot move over redirect with a different target'
		);

		$this->editPage( 'ExistentRedirect3', '#REDIRECT [[Existent2]]' );
		$mp = $this->newMovePageWithMocks(
			Title::newFromText( 'Existent' ),
			Title::newFromText( 'ExistentRedirect3' )
		);
		$this->assertSame(
			[ [ 'articleexists', 'ExistentRedirect3' ] ],
			$mp->isValidMove()->getErrorsArray(),
			'Multi-revision redirects count as articles'
		);
	}

	/**
	 * Assert that links tables are updated after cross namespace page move (T299275).
	 */
	public function testCrossNamespaceLinksUpdate() {
		$this->getExistingTestPage( Title::makeTitle( NS_TEMPLATE, 'Test' ) );

		$wikitext = "[[Test]], [[Image:Existent.jpg]], {{Test}}";

		$old = Title::makeTitle( NS_USER, __METHOD__ );
		$this->editPage( $old, $wikitext );
		$pageId = $old->getId();

		// do a cross-namespace move
		$new = Title::makeTitle( NS_PROJECT, __METHOD__ );
		$obj = $this->newMovePageWithMocks( $old, $new, [ 'db' => $this->db ] );
		$status = $obj->move( $this->getTestUser()->getUser() );

		// sanity checks
		$this->assertTrue( $status->isOK() );
		$this->assertSame( $pageId, $new->getId() );
		$this->assertNotSame( $pageId, $old->getId() );

		// ensure links tables where updated
		$this->assertSelect(
			'pagelinks',
			[ 'pl_namespace', 'pl_title', 'pl_from_namespace' ],
			[ 'pl_from' => $pageId ],
			[
				[ NS_MAIN, 'Test', NS_PROJECT ]
			]
		);
		$this->assertSelect(
			'templatelinks',
			[ 'tl_namespace', 'tl_title', 'tl_from_namespace' ],
			[ 'tl_from' => $pageId ],
			[
				[ NS_TEMPLATE, 'Test', NS_PROJECT ]
			]
		);
		$this->assertSelect(
			'imagelinks',
			[ 'il_to', 'il_from_namespace' ],
			[ 'il_from' => $pageId ],
			[
				[ 'Existent.jpg', NS_PROJECT ]
			]
		);
	}

}
