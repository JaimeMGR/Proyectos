USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 7
--Listar los 10 primeros países con más ventas. Utilizando la consulta de predicado correspondiente.

select
    desc_pais,
    sum(ventas) as importe_total   
from d_pais A
inner join h_ventas B
on A.id_pais = B.id_pais
group by desc_pais
order by importe_total desc
limit 10;