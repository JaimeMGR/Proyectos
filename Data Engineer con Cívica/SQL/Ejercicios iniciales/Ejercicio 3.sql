USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 3.1
--Mostrar el importe total de ventas de la empresa utilizando la función de agregación correspondiente.

select 
    sum(VENTAS) as importe_total
from
H_VENTAS;

--Ejercicio 3.2
--Mostrar el importe total de ventas de la empresa en función de la categoría (id_categoria).
select 
    id_categoria, sum(VENTAS) as importe_total
from
    H_VENTAS
GROUP BY id_categoria;

--Ejercicio 3.3
--Mostrar la media de ventas por tipo de tarjeta

SELECT 
    id_tipo_tarjeta, AVG(VENTAS) as media_de_ventas
from
    H_VENTAS
GROUP BY 
    id_tipo_tarjeta
order by 
    id_tipo_tarjeta
asc;

--Ejercicio 3.4
--Mostrar total ventas según país y categoría

SELECT 
    id_pais, id_categoria, SUM(VENTAS) as total_ventas
from
    H_VENTAS
GROUP BY 
    id_pais, id_categoria
order by 
    id_pais, id_categoria
asc;