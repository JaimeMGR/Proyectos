USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLas_VENTA;

--Ejercicio 13
--

with 
wORDERS_JMG_pais as (
    select count(*) as errores_pais
    from ash_ventas_edit A
    where not exists (
        select 1 from d_pais B where A.id_pais = B.id_pais
    )
),
wORDERS_JMG_categoria as (
    select count(*) as errores_categoria
    from ash_ventas_edit A
    where not exists (
        select 1 from d_categoria B where A.id_categoria = B.id_categoria
    )
),
wORDERS_JMG_fecha as (
    select count(*) as errores_fecha
    from ash_ventas_edit A
    where not exists (
        select 1 from d_fecha B where A.id_fecha = B.id_fecha
    )
),
wORDERS_JMG_tipo_tarjeta as (
    select count(*) as errores_tipo_tarjeta
    from ash_ventas_edit A
    where not exists (
        select 1 from d_tipo_tarjeta B where A.id_tipo_tarjeta = B.id_tipo_tarjeta
    )
)

select 
    case 
        when errores_pais > 0 then 
            'Error: ' || errores_pais || ' registros no se encuentran en d_pais'
        else 
            'La coherencia entre ambas tablas es correcta'
    end as resultado_categoria,
    case 
        when errores_categoria > 0 then 
            'Error: ' || errores_categoria || ' registros no se encuentran en d_categoria'
        else 
            'La coherencia entre ambas tablas es correcta'
    end as resultado_categoria,
    case 
        when errores_fecha > 0 then 
            'Error: ' || errores_fecha || ' registros no se encuentran en d_fecha'
        else 
            'La coherencia entre ambas tablas es correcta'
    end as resultado_fecha,
    case 
        when errores_tipo_tarjeta > 0 then 
            'Error: ' || errores_tipo_tarjeta || ' registros no se encuentran en d_tipo_tarjeta'
        else 
            'La coherencia entre ambas tablas es correcta'
    end as resultado_tipo_tarjeta,
    case 
        when errores_pais > 0 
          or errores_categoria > 0 
          or errores_fecha > 0 
          or errores_tipo_tarjeta > 0
        then 
            'Error: Se han encontrado ' || 
            (errores_pais + errores_categoria + errores_fecha + errores_tipo_tarjeta) || 
            ' registros incorrectos en total'
        else 
            'La coherencia entre ambas tablas es correcta'
    end as resultado
from 
    wORDERS_JMG_pais,
    wORDERS_JMG_categoria,
    wORDERS_JMG_fecha,
    wORDERS_JMG_tipo_tarjeta;