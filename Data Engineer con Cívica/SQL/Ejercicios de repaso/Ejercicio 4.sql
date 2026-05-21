USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 4
--Mostrar el importe total de ventas de la empresa en función de la categoría (id_categoria). ¿Qué id_categoria tiene más ventas? Ordenar las ventas en orden ascendente.

select
    sum(ventas) as importe_total,
    id_categoria
from h_ventas
group by id_categoria
order by importe_total desc;
