USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 11
--Crear una vista con el número de ventas y los diferentes conceptos de negocio con lo que hemos trabajado: categoría, país, tipo de tarjeta, fecha. Esto facilita mucho las cosas ya que a partir de esta tabla podemos hacer la consultas que queramos
select
    B.desc_tipo_tarjeta,
    sum(A.ventas) as ventas_totales
from h_ventas A
join d_tipo_tarjeta B on A.id_tipo_tarjeta = B.id_tipo_tarjeta
where A.id_pais = 16
group by B.desc_tipo_tarjeta
order by ventas_totales desc
limit 1