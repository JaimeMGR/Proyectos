USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 06
--Conseguir a través de funciones de cadenas de texto, conseguir que la cadena ‘hola MUNDO’ se formatee tipo oración: Primera letra de la oración en mayúsculas y resto de caracteres en  minúsculas

select concat(
    upper(left('hola MUNDO', 1)),
    lower(right('hola MUNDO',9))
);

    
    