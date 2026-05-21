USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 05
--¿En qué trimestre se realizaron las mayores ventas en la categoría deportes? Mostrar el campo trimestre y el total de ventas.



with wORDERS_JMG as 
(
select 
    TO_DATE(TO_VARCHAR(A.id_fecha), 'YYYYMMDD') AS desc_fecha,
    A.* 
from h_ventas A
right join d_pais B
    on A.id_pais = B.id_pais
where B.desc_pais != 'Spain'),

wORDERS_JMG2 AS (
    select
        *
        date_part('q' ,desc_fecha) as trimestre,
    from wORDERS_JMG
)

select top 1 WITH TIES
    trimestre,
    SUM(ventas) as ventas_totales
from worders_jmg2group by trimestre
order by ventas_totales desc;


select
    date_part('q' ,TO_DATE(TO_VARCHAR(A.id_fecha), 'YYYYMMDD')) as trimestre,
    sum(B.ventas) as total_ventas,
    C.desc_categoria
from d_fecha A
inner join h_ventas B
    on A.id_fecha = B.id_fecha
inner join d_categoria C
    on B.id_categoria = C.id_categoria
where C.desc_categoria = 'Sports'
group by C.desc_categoria, TO_DATE(TO_VARCHAR(A.id_fecha), 'YYYYMMDD')
order by total_ventas desc;