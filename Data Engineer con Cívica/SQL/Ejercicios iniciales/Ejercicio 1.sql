USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 1.1
--Listar los dos componentes (id_categoria, desc_categoria) de la tabla de categorías que tiene esta empresa.

SELECT 
    ID_CATEGORIA, DESC_CATEGORIA 
FROM
    D_CATEGORIA;

-- Ejercicio 1.2
-- Listar los diferentes registros de años que hay en la tabla de fechas.  

SELECT DISTINCT
    ANYO,
FROM
    D_FECHA;

--Ejercicio 1.3
--Muestra los primeros 5 países de la tabla de países.

SELECT
    ID_PAIS,
    DESC_PAIS
FROM 
    D_PAIS
LIMIT 5;