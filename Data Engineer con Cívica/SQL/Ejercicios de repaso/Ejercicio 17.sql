USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 17
--Mostrar los países cuyas descripciones empiecen por la letra S y terminen con la letra n y su número de ventas sea mayor de 100 tanto en 2016 como en 2015. Calcula el promedio de esos valores.

select
    c.desc_pais,
    b.anyo,
    sum(a.ventas) as ventas_totales
from h_ventas A
inner join d_fecha b
    on a.id_fecha = b.id_fecha
inner join d_pais c
    on a.id_pais = c.id_pais
where 
    (b.anyo = 2015 AND c.desc_pais like 'S%n')
    OR (b.anyo = 2016 AND c.desc_pais like 'S%n')
    
group by c.desc_pais, b.anyo
HAVING ventas_totales > 100

order by ventas_totales asc;
