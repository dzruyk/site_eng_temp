#!/bin/sh

username="ruyk";
dbname="hackquest"

query="
DELETE FROM users WHERE TRUE;
DELETE FROM cookies WHERE TRUE;
DELETE FROM completed_quests WHERE TRUE;
";
echo "$query" | psql -U $username $dbname

