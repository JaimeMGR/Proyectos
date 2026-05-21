USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 16
--Mostrar los países cuyas descripciones empiecen por la letra S

select
    desc_pais
from d_pais
where desc_pais like 'S%';
