-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: sql/abstractSchemaChanges/patch-externallinks-el_to_default.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
ALTER TABLE externallinks
  ALTER el_to
SET
  DEFAULT '';
ALTER TABLE externallinks
  ALTER el_to
  DROP NOT NULL;
ALTER TABLE externallinks
  ALTER el_index
SET
  DEFAULT '';
ALTER TABLE externallinks
  ALTER el_index
  DROP NOT NULL;
ALTER TABLE externallinks
  ALTER el_index_60
SET
  DEFAULT '';
