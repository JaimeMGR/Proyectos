USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 10
--A la consulta del ejercicio 10, añadir un nuevo campo calculado: el número, conteo de ventas por año.
--La salida debe mostrar las siguientes columnas: fecha de la venta, categoría (nombre), total de la venta por categoría y conteo de categorías distintas vendidas por cada año.

with wORDERS_JMG as (
select
    TO_DATE(TO_VARCHAR(id_fecha), 'YYYYMMDD') AS desc_fecha,
    B.desc_categoria,
    A.*
from h_ventas A
right join d_categoria B
    on A.id_categoria = B.id_categoria
)
select
    desc_fecha,
    desc_categoria,
    SUM(ventas) over (partition by desc_categoria) as total_ventas_categoria,
    COUNT(*) over (partition by year(desc_fecha)) as ventas_por_anio
from wORDERS_JMG;