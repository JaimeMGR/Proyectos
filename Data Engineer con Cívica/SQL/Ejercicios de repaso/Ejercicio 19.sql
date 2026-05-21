USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 19
--Mes en el que se gasta más dinero de 2015 y 2016

with ventas_por_metodo as (
    select
        b.mes,
        sum(a.ventas) as ventas_totales
    from h_ventas A
        join d_fecha B 
            on A.id_fecha = B.id_fecha
    group by b.mes
),
ranking as (
    select
        b.mes,
        ventas_totales,
        ROW_NUMBER() OVER (
            partition by desc_pais
            order by ventas_totales desc
        ) as ranking
    from ventas_por_metodo
)
select
    b.mes
    ventas_totales
from ranking
where ranking = 1
order by ventas_totales desc;