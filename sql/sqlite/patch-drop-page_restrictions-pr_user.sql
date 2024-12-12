-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: sql/abstractSchemaChanges/patch-drop-page_restrictions-pr_user.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
CREATE TEMPORARY TABLE /*_*/__temp__page_restrictions AS
SELECT
  pr_id,
  pr_page,
  pr_type,
  pr_level,
  pr_cascade,
  pr_expiry
FROM /*_*/page_restrictions;
DROP TABLE /*_*/page_restrictions;


CREATE TABLE /*_*/page_restrictions (
    pr_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    pr_page INTEGER NOT NULL, pr_type BLOB NOT NULL,
    pr_level BLOB NOT NULL, pr_cascade SMALLINT NOT NULL,
    pr_expiry BLOB DEFAULT NULL
  );
INSERT INTO /*_*/page_restrictions (
    pr_id, pr_page, pr_type, pr_level,
    pr_cascade, pr_expiry
  )
SELECT
  pr_id,
  pr_page,
  pr_type,
  pr_level,
  pr_cascade,
  pr_expiry
FROM
  /*_*/__temp__page_restrictions;
DROP TABLE /*_*/__temp__page_restrictions;

CREATE UNIQUE INDEX pr_pagetype ON /*_*/page_restrictions (pr_page, pr_type);

CREATE INDEX pr_typelevel ON /*_*/page_restrictions (pr_type, pr_level);

CREATE INDEX pr_level ON /*_*/page_restrictions (pr_level);

CREATE INDEX pr_cascade ON /*_*/page_restrictions (pr_cascade);
