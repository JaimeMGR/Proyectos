USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 8
--Listar todas las ventas por año en el país de España. Utilizando la cláusula correspondiente.

select
    d_pais.id_pais,
    desc_pais,
    ventas
from h_ventas, d_pais
where desc_pais = 'Spain';
