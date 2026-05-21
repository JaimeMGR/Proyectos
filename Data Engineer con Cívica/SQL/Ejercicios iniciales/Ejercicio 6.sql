USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 6.1 
--Actualiza el nombre de los tipos de tarjeta china-unionpay a unionpay

update D_TIPO_TARJETA
set DESC_TIPO_TARJETA = 'unionpay'
WHERE desc_tipo_tarjeta = 'china-unionpay';

--Ejercicio 6.2 
--Elimina todos los registros de la tabla ventas que tengan algún id no válido (-1)
delete from h_ventas
where ID_FECHA = -1 
or ID_CATEGORIA = -1 
or ID_PAIS = -1 
or ID_TIPO_TARJETA = -1;


--Ejercicio 6.3 
--Añade a la tabla ventas un registro en la que:- La venta tiene valor 45.6- Se vendió en Francia- Se usó una tarjeta mastercard- Ocurrió el 10 de octubre de 2015- La categoría del producto es deporte

INSERT INTO H_VENTAS (ID_FECHA, ID_CATEGORIA, ID_PAIS, ID_TIPO_TARJETA, VENTAS)
VALUES (20151010, 20, 16, 12, 45.6);
