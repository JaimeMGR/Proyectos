USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 1
--Listar los dos componentes (id_categoria, desc_categoria) de la tabla de categorías que tiene esta empresa.

select
    id_categoria,
    desc_categoria
from d_categoria;