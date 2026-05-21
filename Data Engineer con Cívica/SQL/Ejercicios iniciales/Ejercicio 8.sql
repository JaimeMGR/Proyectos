USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 8.1
--Muestra el total de las ventas por país y el nombre de dicho país.

SELECT
SUM(VENTAS) as total_ventas,
desc_pais
FROM h_ventas A
LEFT JOIN d_pais B
ON A.id_pais = B.id_pais
group by desc_pais
order by desc_pais asc;

--Ejercicio 8.2
--Muestra para cada venta el nombre de país, tipo de tarjeta, la categoría y el día de la semana en la que ocurrió

SELECT
A.ventas,
B.desc_pais,
C.desc_tipo_tarjeta,
D.desc_categoria,
E.dia_semana
FROM h_ventas A
JOIN d_pais B ON A.id_pais = B.id_pais
JOIN d_tipo_tarjeta C ON A.id_tipo_tarjeta = C.id_tipo_tarjeta
JOIN d_categoria D ON A.id_categoria = D.id_categoria
JOIN d_fecha E ON A.id_fecha = E.id_fecha
order by ventas desc;