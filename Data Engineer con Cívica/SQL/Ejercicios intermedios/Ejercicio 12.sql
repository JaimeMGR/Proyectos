USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;
--Ejercicio 12
--Una vez limpia la tabla h_ventas_edit:
--1. Calcular el beneficio de la venta después del descuento

with wORDERS_JMG as (
    select 
        ventas,
        descuento,
        ventas * (1 - descuento) as beneficio
    from h_ventas_edit)
SELECT * FROM WORDERS_JMG;

--Extra: 
--En una consulta aparte…
--¿Cuál es la categoría con una media de descuentos mayor por año?

WITH medias AS (
    SELECT
        b.desc_categoria,
        c.anyo,
        AVG(a.descuento) AS media_descuento
    FROM h_ventas_edit A
        INNER JOIN d_categoria B
            ON a.id_categoria = b.id_categoria
        INNER JOIN d_fecha C
            ON a.id_fecha = c.id_fecha
    GROUP BY b.desc_categoria, c.anyo
)
SELECT
    desc_categoria,
    anyo,
    media_descuento,
    RANK() OVER (
        PARTITION BY desc_categoria
        ORDER BY media_descuento DESC
    ) AS ranking
FROM medias;

--1. Calcular la media de descuentos (porcentaje)  por año y categoría
--2. Hacer ranking por  categoría y ordenando por la media de descuentos por año y categorías calculado

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