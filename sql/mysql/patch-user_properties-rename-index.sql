-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: sql/abstractSchemaChanges/patch-user_properties-rename-index.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
DROP INDEX user_properties_property ON /*_*/user_properties;

CREATE INDEX up_property ON /*_*/user_properties (up_property);
