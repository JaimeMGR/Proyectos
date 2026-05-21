USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;
--Ejercicio 11
--Crear una consulta para detectar duplicados de la tabla H_VENTAS_EDIT teniendo en cuenta las siguientes columnas:
--• Id categoria
--• Id tipo tarjeta
--• Id fecha
--• Id pais
--Sin hacer uso de la cláusula GROUP BY

--Detección de duplicados sin usar group by
select *
    from (
        select 
            row_number() over (
                partition by 
                    id_pais,
                    id_tipo_tarjeta,
                    id_categoria,
                    id_fecha
                order by 
                    id_pais
                )
                as veces_repetidas,
            id_pais,
            id_tipo_tarjeta,
            id_categoria,
            id_fecha,
        from h_ventas_edit
    )
where veces_repetidas > 1
order by id_pais, id_tipo_tarjeta, id_categoria, id_fecha;