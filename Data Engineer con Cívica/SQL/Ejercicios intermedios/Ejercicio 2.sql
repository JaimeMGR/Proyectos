USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 2
--Crear tabla CTE que copie la estructura de la tabla H_VENTAS,  filtrando por las ventas fuera de España.
--La consulta debe contener un campo adicional: campo id_fecha, transformado a fecha que utilizaremos para filtrar las ventas entre octubre y diciembre de 2015.
--• Nombre de la tabla: wORDERS_[Iniciales Nombre+Apellidos]
--• Usa conversión de tipo de datos

with wORDERS_JMG as 
(select
    TO_DATE(TO_VARCHAR(A.id_fecha), 'YYYYMMDD') AS fecha,
    A.id_categoria, A.id_pais, A.id_tipo_tarjeta, A.ventas
  --CAST(CAST(A.id_fecha AS STRING) AS DATE)
from h_ventas A
right join d_pais B
    on A.id_pais = B.id_pais
where B.desc_pais != 'Spain')
select * 
from wORDERS_JMG;