USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 6
--¿En qué años se hacen más ventas? Al igual que en el ejercicio anterior tendremos que cruzar las tablas, pero esta vez con la tabla d_fecha para obtener el año.

select
    ANYO,
    sum(ventas) as importe_total   
from d_fecha A
inner join h_ventas B
on A.id_fecha = B.id_fecha
group by ANYO
order by importe_total desc;