USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 12
--Muestra las ventas para el año 2015 y enero (usar las funciones de fecha de sql server)

select
    B.desc_tipo_tarjeta,
    sum(A.ventas) as ventas_totales,
    c.mes,
    c.anyo
from h_ventas A
join d_tipo_tarjeta B 
    on A.id_tipo_tarjeta = B.id_tipo_tarjeta
inner join d_fecha c
    on A.id_fecha = c.id_fecha
where c.anyo = 2015 AND c.mes = 1
group by B.desc_tipo_tarjeta, c.mes, c.anyo
order by ventas_totales desc;