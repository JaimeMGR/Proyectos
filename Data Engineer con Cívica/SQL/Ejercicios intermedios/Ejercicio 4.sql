USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 04
--Replicar tabla d_fecha a partir del campo id_fecha y haciendo uso de las funciones propuestas en las diapositivas anteriores.
--Guardar datos en una tabla temporal.
--• Nombre de la tabla: wORDERS_[Iniciales Nombre+Apellidos]

select
    TO_DATE(TO_VARCHAR(id_fecha), 'YYYYMMDD') AS fecha,
    DAY(fecha) as Dia,
    MONTH(fecha) as Mes,
    YEAR(fecha) as ANYO,
    date_part('dow', fecha) AS dia_semana_num,
    TO_CHAR(fecha, 'DY,') AS dia_semana,
    TO_CHAR(fecha, 'MMMM') AS nombre_mes,
from d_fecha
