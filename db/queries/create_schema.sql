#create schema


fdgdb=fdg-db.db 
for table in sutta_pi vinaya_pi sutta_var vinaya_var
do 
echo "DROP TABLE IF EXISTS $table;
CREATE TABLE $table (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL);" | sqlite3 $fdgdb
done

DROP TABLE IF EXISTS sutta_ru;
CREATE TABLE sutta_ru (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL);

DROP TABLE IF EXISTS sutta_en;
CREATE TABLE sutta_en (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL);

DROP TABLE IF EXISTS vinaya_en;
CREATE TABLE vinaya_en (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL);


DROP TABLE IF EXISTS similes;


CREATE TABLE similes (
file_name TEXT PRIMARY KEY NOT NULL UNIQUE,
metaphor_count INT NOT NULL DEFAULT 0,
sg_count INT NOT NULL DEFAULT 0);



