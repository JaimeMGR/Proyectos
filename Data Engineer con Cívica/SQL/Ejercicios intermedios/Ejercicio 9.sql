USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 09
--Mostrar el importe total de la venta de la tabla H_VENTAS, en función de cada categoría.
--La salida debe mostrar las siguientes columnas: campo fecha de la venta, categoría (nombre), y total de la venta por categoría.

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
    SUM(ventas) over (partition by desc_categoria) as total_ventas_categoria
from wORDERS_JMG;