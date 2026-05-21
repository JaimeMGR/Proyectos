-- An ACCOUNTADMIN would need to run:
USE ROLE ACCOUNTADMIN;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
SET alumno = 'JaimeMGR';
SET env = 'DEV';--Crear 3 bases de datos
CREATE DATABASE IF NOT EXISTS db29_BRONZE_DB;
CREATE DATABASE IF NOT EXISTS db29_SILVER_DB;
CREATE DATABASE IF NOT EXISTS db29_GOLD_DB;

use database db29_BRONZE_DB;
create schema contenido_bronce;
create stage stage_bronce;
use database db29_SILVER_DB;
create schema contenido_silver;
use database db29_GOLD_DB;
create schema contenido_gold;