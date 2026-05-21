USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 9
--Crea una vista del máximo y el mínimo de las ventas por tipo de tarjeta usada y el nombre de la tarjeta. Consúltala, y luego elimínala

Create view plantilla_venta
as 
select
    desc_tipo_tarjeta,
    min(ventas) as min_venta,
    max(ventas) as max_venta
from d_tipo_tarjeta A
inner join h_ventas B
    on A.id_tipo_tarjeta = B.id_tipo_tarjeta
group by desc_tipo_tarjeta
order by desc_tipo_tarjeta asc;

select * from plantilla_venta;

DROP VIEW IF EXISTS plantilla_venta;

