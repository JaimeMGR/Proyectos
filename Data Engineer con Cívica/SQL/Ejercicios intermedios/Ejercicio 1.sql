USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 1
--Crear tabla temporal que copie la estructura de la tabla H_VENTAS,  filtrando por las ventas fuera de España:
--Crear tabla temporal CTE con el nombre wORDERS_[Iniciales Nombre+Apellidos] y comprobar resultados

with wORDERS_JMG as 
(select A.* 
from h_ventas A
right join d_pais B
    on A.id_pais = B.id_pais
where B.desc_pais != 'Spain')
select *
from wORDERS_JMG;