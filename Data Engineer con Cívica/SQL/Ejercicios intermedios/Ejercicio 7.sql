USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 7
--Conseguir a través de funciones de cadenas de texto, conseguir que la cadena ‘123789,99&’ se formatee para poder convertirla a tipo decimal.

select cast(
    translate(
    '123789,99&',
    ',&',
    '. '
    )
    as decimal (10,2)) AS numero_limpio;
