USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 21
--Listar los países que facturen un importe de ventas total de m´´as de 76000 en alguno de los dos años. Si o si deben hacerlo en uno de los dos años para estar en la lista, no el cómputo total de los dos años

select 
    c.desc_pais,
    b.anyo,
    sum(a.ventas) as ventas_totales,
from h_ventas A
inner join d_fecha b
    on a.id_fecha = b.id_fecha
inner join d_pais c
    on a.id_pais = c.id_pais
group by c.desc_pais, b.anyo
having ventas_totales > 76000
order by ventas_totales desc;