USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 2.1
--Mostrar todas las fechas del año 2015

select 
    * 
from 
    d_fecha 
where 
    ANYO = 2015;

--Ejercicio 2.2
--Mostrar todas las ventas con valor menor que 15

select 
    id_fecha 
from 
    h_ventas
where 
    ventas < 15;

-- Ejercicio 2.3
--Mostrar todas las categorías cuyo nombre empieza por G

select 
    desc_categoria
from
    d_categoria 
where 
    desc_categoria 
like 
    'G%';