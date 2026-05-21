USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 9
--¿En qué país se hacen menos ventas? ¿Y en cual más ventas? Al igual que en el ejercicio anterior tendremos que cruzar las tablas, pero esta vez con la tabla d_pais para obtener la descripción del país.

(select
    id_pais,
    sum(ventas) as ventas_totales,
from h_ventas
group by id_pais
order by ventas_totales
limit 1)

union all

(select
    id_pais,
    sum(ventas) as ventas_totales,
from h_ventas
group by id_pais
order by ventas_totales desc
limit 1);