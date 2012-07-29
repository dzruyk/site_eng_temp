#!/bin/sh

username="ruyk";
dbname="hackquest"


createdb $dbname 
query="
CREATE TABLE users	(uid	serial4 NOT NULL,
			 uname	text,
			 pass	text,
			 email	text,
			 score	smallint,
			 PRIMARY KEY (uid));

CREATE TABLE cookies	(uid	int4 NOT NULL,
			cookie	text);

CREATE TABLE completed_quests (uid int4 NOT NULL,
				qid int4 NOT NULL);
";

echo "$query" | psql -U $username $dbname
