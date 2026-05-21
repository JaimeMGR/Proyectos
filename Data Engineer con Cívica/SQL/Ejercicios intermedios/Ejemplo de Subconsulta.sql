USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

--Ejemplo de subconsulta

--with wORDERS_JMG as 
--(select
--    A.id_pais
--    A.desc_pais
--    sum(B.ventas) as total_ventas
--    from (select distinct id_pais, desc_pais from d_pais) AS
--left join h_ventas BEFORE(
--    on A.id_pais = B.id_pais
--    where a.desc_pais not ilike '%A'
--    having sum(ventas) > (subconsulta)
--    group by A.id_pais, a.desc_pais
--))
--select * from wORDERS_JMG;
--