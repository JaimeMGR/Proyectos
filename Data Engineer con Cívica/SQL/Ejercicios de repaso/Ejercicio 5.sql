USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 5
--Hemos mostrado las ventas en función de la id_categoria, pero esto realmente no aporta información ya que la id_categoria es un número. Por lo tanto, se pide mostrar las ventas de la empresa en  función de la desc_categoria cruzando con la tabla d_categoria.¿Qué categoría tiene más ventas?

select
    desc_categoria,
    sum(ventas) as importe_total   
from h_ventas A
inner join d_categoria B
on A.id_categoria = B.id_categoria
group by desc_categoria
order by importe_total desc;