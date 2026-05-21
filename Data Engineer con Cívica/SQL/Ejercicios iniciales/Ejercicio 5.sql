USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE CURSO_DATAENG_SQL_DE29.TABLAS_VENTA;

-- Ejercicio 5
-- Muestra de la tabla h_ventas la columna ventas y una columna adicional con los siguientes valores:- “Poco” cuando el valor venta es menor de 100- “Bastante” cuando el valor de venta se encuentra entre 100 y 1000 (incluidos)- “Mucho” cuando el valor de venta se encuentra por encima de 1000

select 
    ventas,
    case
    when ventas < 100 then 'Poco'
    when ventas >= 100 AND ventas <= 1000 then 'Bastante'
    ELSE 'Mucho'
    END 
    as Puntuacion
from h_ventas
group by ventas
order by ventas asc;




--A partir del ejercicio 5 tenemos que mostrar sólo las ventas cuyo beneficio sea 'Bastante'

select 
    ventas,
    case
    when ventas < 100 then 'Poco'
    when ventas >= 100 AND ventas <= 1000 then 'Bastante'
    ELSE 'Mucho'
    END 
    as beneficios
from
    h_ventas
HAVING case
    when ventas < 100 then 'Poco'
    when ventas >= 100 AND ventas <= 1000 then 'Bastante'
    ELSE 'Mucho'
    END = 'Bastante'
order by 
    ventas
asc;


-- Ejercicio de la pizarra
select 
   sum(case when id_pais = 16 then ventas else 0 end) as COUNT_16,
   sum(case when id_pais = 37 then ventas else 0 end) as COUNT_37,
   sum(case when id_pais = 38 then ventas else 0 end) as COUNT_38,
   sum(case when id_pais = 40 then ventas else 0 end) as COUNT_40
from h_ventas;


-- A partir del ejercicio extra (que mostrábamos en una SOLA FILA y una columna para cada una de los 4 tipos de tarjeta 16, 37,38,40. En lugar de mostrar la suma de ventas de cada tipo vamos a mostrar el número de ventas mayores de 100 de cada uno de los id pais. Debe tener el mismo formato de salida, sólo cambian los resultados.

select 
   sum(case when id_pais = 16 AND ventas > 100 then 1 else 0 end) as COUNT_16,
   sum(case when id_pais = 37 AND ventas > 100 then 1 else 0 end) as COUNT_37,
   sum(case when id_pais = 38 AND ventas > 100 then 1 else 0 end) as COUNT_38,
   sum(case when id_pais = 40 AND ventas > 100 then 1 else 0 end) as COUNT_40
from h_ventas;