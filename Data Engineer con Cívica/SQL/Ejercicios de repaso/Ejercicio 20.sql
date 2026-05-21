USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 20
--Mes mas rentable de cada país en el año 2015

with ventas_por_mes as (
    select
        b.mes,
        c.desc_pais,
        SUM(a.ventas) as ventas_totales
    FROM h_ventas A
        inner join d_fecha B 
            on A.id_fecha = B.id_fecha
        inner join d_pais C
            on A.id_pais = C.id_pais
    where b.anyo = 2015
    group by b.mes, c.desc_pais
),
ranking as (
    select
        mes,
        desc_pais,
        ventas_totales,
        row_number() over (
            partition by desc_pais
            order by ventas_totales desc
        ) as ranking_mes
    from ventas_por_mes
)
select
    desc_pais,
    mes,
    ventas_totales
from ranking
where ranking_mes = 1
order by ventas_totales;