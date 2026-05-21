USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 23
--Hacer una consulta de las ventas por paises en el periodo de fechas de 21/12/2017 a 31/12/2016. Compararla con el mismo periodo pero de 2015. ¿Que año vendió más en el mismo periodo?

with ventas_rango as (
    select
        c.desc_pais,
        sum(case 
                when b.fecha between '2016-12-21' and '2017-12-31'
                then a.ventas
            end) as ventas_2016_2017,

        sum(case 
                when b.fecha between '2015-12-21' and '2015-12-31'
                then a.ventas
            end) as ventas_2015
    from h_ventas a
        inner join d_fecha b
            on a.id_fecha = b.id_fecha
        inner join d_pais c
            on a.id_pais = c.id_pais
    group by c.desc_pais
)
select
    desc_pais,
    ventas_2016_2017,
    ventas_2015,
    case 
        when ventas_2016_2017 > ventas_2015 then 'Gana 2016-2017'
        when ventas_2016_2017 < ventas_2015 then 'Gana 2015'
        else 'Empate'
    end as resultado
from ventas_rango
order by desc_pais;