USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 18
--La tarjeta más utilizada por cada país (es decir que se haga más número de ventas no mayor importe)

with ventas_por_metodo as (
    select
        c.desc_pais,
        b.desc_tipo_tarjeta,
        COUNT(a.ventas) as ventas_totales
    from h_ventas A
        join d_tipo_tarjeta B 
            on A.id_tipo_tarjeta = B.id_tipo_tarjeta
        inner join d_pais C
            on A.id_pais = C.id_pais
    group by c.desc_pais, b.desc_tipo_tarjeta
),
ranking as (
    select
        desc_pais,
        desc_tipo_tarjeta,
        ventas_totales,
        row_number() over (
            partition by desc_pais
            order by ventas_totales desc
        ) as ranking
    from ventas_por_metodo
)
select
    desc_pais,
    desc_tipo_tarjeta,
    ventas_totales
from ranking
where ranking = 1
order by ventas_totales desc;