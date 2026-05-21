USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 4.1
--Ordena el total de ventas obtenidas en el ej 3.2 en orden descendente.
select 
    id_categoria,
    sum(VENTAS) as importe_total
from
    H_VENTAS
GROUP BY 
    id_categoria
order by 
    importe_total desc;

--Ejercicio 4.2
--Mostrar solo las filas con total de ventas entre 600 y 1000, en orden descendente
select
    id_categoria,
    sum(VENTAS) as total_ventas
from
    H_VENTAS
group by id_categoria
    HAVING sum(VENTAS) > 599 AND sum(VENTAS) < 1001
order by 
    id_categoria asc;

--Ejercicio 4.3
--Mostrar las 5 id_tipo_tarjeta con menor cantidad de filas en la tabla h_ventas. 
select
    id_tipo_tarjeta,
    count(*) as cantidad
from 
    h_ventas
group by 
    id_tipo_tarjeta
order by 
    cantidad asc
limit 5;

--Ejercicio 4.4
-- Mostrar numero de registros de id_pais con total ventas mayor / igual a 500 de mayor a menor

select 
    id_pais, 
    count(id_pais) as registros,
from 
    h_ventas
group by 
    id_pais
    HAVING sum(ventas) >= 500
order by 
    sum(ventas) desc;