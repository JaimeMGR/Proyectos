USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejercicio 22
--La media de ventas de España en cada uno de los años y la media total de esos años.

select
    c.desc_pais,

    avg(case when b.anyo = 2015 then a.ventas end) as media2015,
    AVG(case when b.anyo = 2016 then a.ventas end) as media2016,
    AVG(a.ventas) as promedio
from h_ventas A
inner join d_fecha B 
    on A.id_fecha = B.id_fecha
inner join d_pais C
    on A.id_pais = C.id_pais
where c.desc_pais = 'Spain'
group by c.desc_pais;