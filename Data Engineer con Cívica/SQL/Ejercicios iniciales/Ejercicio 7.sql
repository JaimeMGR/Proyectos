USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 7 
--Muestra todas las distintas categorías, países y tipos de tarjeta en una sola consulta utilizando union.

select *
from d_pais, d_categoria, d_tipo_tarjeta
order by id_pais, id_categoria, id_tipo_tarjeta;

select desc_pais as descripcion
from d_pais

union

select desc_categoria as descripcion
from d_categoria

union

select desc_tipo_tarjeta as descripcion
from d_tipo_tarjeta;
