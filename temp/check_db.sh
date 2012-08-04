#!/bin/sh

username="ruyk";
dbname="hackquest"



query="
SELECT * FROM users;

SELECT * FROM cookies;

SELECT * FROM completed_quests;
";


echo "$query" | psql -U $username $dbname
