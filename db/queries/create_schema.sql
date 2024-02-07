#create schema

DROP TABLE IF EXISTS texts_pi;

CREATE TABLE texts_pi (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
text_type TEXT NOT NULL);

DROP TABLE IF EXISTS texts_var;

CREATE TABLE texts_var (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
text_type TEXT NOT NULL);


DROP TABLE IF EXISTS texts_en;

CREATE TABLE texts_en (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL);


DROP TABLE IF EXISTS texts_ru;

CREATE TABLE texts_ru (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL,
text_type TEXT NOT NULL);


DROP TABLE IF EXISTS similes;

CREATE TABLE similes (
file_name TEXT PRIMARY KEY NOT NULL UNIQUE,
metaphor_count INT NOT NULL DEFAULT 0,
sg_count INT NOT NULL DEFAULT 0);

DROP TABLE IF EXISTS text_names;

CREATE TABLE text_names (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL);

DROP TABLE IF EXISTS text_names_fullid;

CREATE TABLE text_names_fullid (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL);

