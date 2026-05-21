USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;


--Ejercicio 08
--Pasar calidad a la tabla H_VENTAS_EDIT:
--Limpieza de campo ‘descuento’

update h_ventas_edit
set descuento = trim(replace(replace(descuento, ',', '.'), '%', ''));

--Detección de registros con ids que no se encuentren en ninguna tabla de dimensiones.
select distinct
count(*) as errores_categoria
from h_ventas_edit A
inner join d_categoria B
    on A.id_categoria = B.id_categoria;

select distinct
count(*) as errores_fecha
from h_ventas_edit A
inner join d_fecha B
    on A.id_fecha = B.id_fecha;

select distinct
count(*) as errores_pais
from h_ventas_edit A
inner join d_pais B
    on A.id_pais = B.id_pais;

select distinct
count(*) as errores_tipo_tarjeta
from h_ventas_edit A
inner join d_tipo_tarjeta B
    on A.id_tipo_tarjeta = B.id_tipo_tarjeta;

--Detección de duplicados
select 
    id_pais, 
    id_tipo_tarjeta, 
    id_categoria, 
    id_fecha,
    count(*) as veces_duplicado
from h_ventas_edit
group by 
    id_pais, 
    id_tipo_tarjeta, 
    id_categoria, 
    id_fecha
having count(*) > 1
order by veces_duplicado desc;