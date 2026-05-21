USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 10
--¿Con qué tipo de tarjeta compra más la gente de Francia y con cuál menos? Ordenado de mayor a menor

(select
    B.desc_tipo_tarjeta,
    sum(A.ventas) as ventas_totales
from h_ventas A
join d_tipo_tarjeta B on A.id_tipo_tarjeta = B.id_tipo_tarjeta
where A.id_pais = 16
group by B.desc_tipo_tarjeta
order by ventas_totales desc
limit 1)

union all

(select
    B.desc_tipo_tarjeta,
    sum(A.ventas) as ventas_totales
from h_ventas A
join d_tipo_tarjeta B on A.id_tipo_tarjeta = B.id_tipo_tarjeta
where A.id_pais = 16
group by B.desc_tipo_tarjeta
order by ventas_totales asc
limit 1);