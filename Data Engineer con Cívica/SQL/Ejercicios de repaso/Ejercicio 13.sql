USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 13
--Listar los países que facturen un importe de ventas total de más de 10.000 en el mes de febrero de 2016.

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
where c.anyo = 2016 and c.mes = 2
group by B.desc_tipo_tarjeta, c.mes, c.anyo
having sum(A.ventas) > 10000
order by ventas_totales desc;