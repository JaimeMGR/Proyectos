USE ROLE CURSO_DATA_ENGINEERING;
USE WAREHOUSE DB29_SILVER_DBWH_CURSO_DATA_ENGINEERING;
USE DATABASE SNOWFLAKE_SAMPLE_DATA;
USE SCHEMA TPCH_SF1;


-- Permisos Cortex (solo necesario la primera vez)
GRANT DATABASE ROLE SNOWFLAKE.CORTEX_USER TO ROLE ACCOUNTADMIN;

SHOW TABLES IN SCHEMA SNOWFLAKE_SAMPLE_DATA.TPCH_SF1;


-- ============================================================
-- 🔍 EJERCICIO 0 — Exploración de datos
-- ============================================================
SELECT
    O_ORDERKEY,
    O_ORDERSTATUS,
    O_TOTALPRICE,
    O_ORDERDATE,
    O_ORDERPRIORITY,
    O_COMMENT
FROM   ORDERS
WHERE  O_COMMENT IS NOT NULL
  AND  LENGTH(O_COMMENT) > 30
LIMIT  10;


-- ============================================================
-- 🏋️ EJERCICIO 1 — AI_SENTIMENT
-- ============================================================
WITH sentiment_raw AS (
    SELECT
        O_ORDERKEY,
        O_ORDERPRIORITY,
        O_COMMENT,
        AI_SENTIMENT(O_COMMENT, ['delivery', 'price', 'quality']) AS sentiment_json
    FROM ORDERS
    WHERE O_COMMENT IS NOT NULL
      AND LENGTH(O_COMMENT) > 20
    ORDER BY O_ORDERDATE DESC
    LIMIT 20
)
SELECT
    O_ORDERKEY,
    O_ORDERPRIORITY,
    O_COMMENT,
    sentiment_json:categories[0]:sentiment::STRING AS SENT_GLOBAL,
    sentiment_json:categories[1]:sentiment::STRING AS ASPECTO_DELIVERY,
    sentiment_json:categories[2]:sentiment::STRING AS ASPECTO_PRICE,
    sentiment_json:categories[3]:sentiment::STRING AS ASPECTO_QUALITY
FROM sentiment_raw
WHERE sentiment_json:categories[0]:sentiment::STRING IN ('negative', 'mixed');


-- ============================================================
-- 🏋️ EJERCICIO 2 — AI_TRANSLATE
-- ============================================================
SELECT
    P_PARTKEY,
    P_NAME,
    P_MFGR,
    P_COMMENT                                          AS COMENTARIO_ORIGINAL,
    SNOWFLAKE.CORTEX.TRANSLATE(P_COMMENT::STRING, '', 'es') AS COMENTARIO_EN_ESPANOL
FROM PART
WHERE P_COMMENT IS NOT NULL
  AND LENGTH(P_COMMENT) BETWEEN 20 AND 120
LIMIT 10;


-- ============================================================
-- 🏋️ EJERCICIO 3 — AI_SUMMARIZE_AGG
-- ============================================================
WITH top5 AS (
    SELECT
        C_CUSTKEY,
        SUM(O_TOTALPRICE) AS GASTO_TOTAL_USD
    FROM ORDERS
    JOIN CUSTOMER ON O_CUSTKEY = C_CUSTKEY
    GROUP BY C_CUSTKEY
    ORDER BY GASTO_TOTAL_USD DESC
    LIMIT 5
)
SELECT
    C_NAME,
    t.GASTO_TOTAL_USD,
    AI_SUMMARIZE_AGG(O_COMMENT) AS RESUMEN_ACTIVIDAD
FROM top5 t
JOIN CUSTOMER ON t.C_CUSTKEY    = CUSTOMER.C_CUSTKEY
JOIN ORDERS   ON CUSTOMER.C_CUSTKEY = ORDERS.O_CUSTKEY
WHERE O_COMMENT IS NOT NULL
GROUP BY C_NAME, t.GASTO_TOTAL_USD
ORDER BY t.GASTO_TOTAL_USD DESC;


-- ============================================================
-- 🏋️ EJERCICIO 4 — AI_CLASSIFY
-- ============================================================
WITH classified AS (
    SELECT
        S_SUPPKEY,
        S_NAME,
        S_COMMENT,
        AI_CLASSIFY(
            S_COMMENT,
            [
                {'label': 'logistica',
                 'description': 'Problemas de envío, transporte, retrasos o distribución',
                 'examples': ['shipment was delayed', 'late delivery', 'transport issues']},
                {'label': 'calidad',
                 'description': 'Comentarios sobre defectos, materiales o estándares de producto',
                 'examples': ['defective parts', 'poor quality materials', 'damaged goods']},
                {'label': 'precio',
                 'description': 'Menciones de costes, tarifas, negociaciones o cambios de precio',
                 'examples': ['price increase', 'too expensive', 'cost reduction needed']},
                {'label': 'servicio',
                 'description': 'Atención al cliente, soporte, comunicación o relación comercial',
                 'examples': ['great customer support', 'poor communication', 'helpful team']},
                {'label': 'otro',
                 'description': 'Cualquier tema que no encaje en las categorías anteriores',
                 'examples': ['general note', 'no specific issue mentioned']}
            ],
            {'output_mode': 'single'}
        ) AS classify_json
    FROM SUPPLIER
    WHERE S_COMMENT IS NOT NULL
      AND LENGTH(S_COMMENT) > 15
    LIMIT 15
)
SELECT
    S_SUPPKEY,
    S_NAME,
    S_COMMENT,
    classify_json:label::STRING AS CATEGORIA,
    classify_json:score::FLOAT  AS CONFIANZA
FROM classified
ORDER BY CONFIANZA DESC;


-- ============================================================
-- 🏋️ EJERCICIO 5 — AI_COMPLETE + PROMPT()
-- ============================================================
WITH pedidos_urgentes AS (
    SELECT
        O_ORDERKEY,
        C_NAME                                AS CLIENTE,
        O_ORDERDATE                           AS FECHA,
        O_TOTALPRICE                          AS IMPORTE_USD,
        O_ORDERSTATUS                         AS ESTADO,
        COALESCE(O_COMMENT, 'sin comentario') AS COMENTARIO
    FROM ORDERS
    JOIN CUSTOMER ON O_CUSTKEY = C_CUSTKEY
    WHERE O_ORDERPRIORITY = '1-URGENT'
    ORDER BY O_TOTALPRICE DESC
    LIMIT 5
)
SELECT
    O_ORDERKEY,
    CLIENTE,
    FECHA,
    IMPORTE_USD,
    ESTADO,
    AI_COMPLETE(
        'claude-sonnet-4-5',
        PROMPT(
            'Genera una nota ejecutiva de seguimiento en español, máximo 50 palabras. '
            || 'Cliente: {0}. Fecha: {1}. Importe: ${2}. Estado: {3}. Comentario: {4}',
            CLIENTE, FECHA::STRING, IMPORTE_USD::STRING, ESTADO, COMENTARIO
        ),
        {'temperature': 0.3, 'max_tokens': 120}
    ) AS NOTA_EJECUTIVA
FROM pedidos_urgentes;


-- ============================================================
-- 🏋️ EJERCICIO 6 — AI_FILTER
-- ============================================================
SELECT
    S_SUPPKEY,
    S_NAME,
    N_NAME                                                   AS PAIS,
    S_COMMENT,
    (S_COMMENT ILIKE '%delay%' OR S_COMMENT ILIKE '%late%') AS ILIKE_MATCH
FROM SUPPLIER
JOIN NATION ON S_NATIONKEY = N_NATIONKEY
WHERE S_COMMENT IS NOT NULL
  AND LENGTH(S_COMMENT) > 15
  AND AI_FILTER(PROMPT('Does the following text mention delivery delays, late shipments, or pending delivery problems? Text: {0}', S_COMMENT))
LIMIT 20;


-- ============================================================
-- 🏋️ EJERCICIO 7 — AI_EXTRACT
-- ============================================================
WITH extractions AS (
    SELECT
        S_SUPPKEY,
        S_NAME,
        N_NAME    AS PAIS,
        S_COMMENT AS CONTEXTO,
        AI_EXTRACT(
            S_COMMENT,
            {
                'problema':          '¿Qué problema específico se menciona en el texto?',
                'producto_afectado': '¿Qué producto o material está afectado?',
                'hay_urgencia':      '¿Se menciona urgencia o alta prioridad? Responde solo sí o no.'
            }
        ) AS extract_json
    FROM SUPPLIER
    JOIN NATION ON S_NATIONKEY = N_NATIONKEY
    WHERE S_COMMENT IS NOT NULL
      AND LENGTH(S_COMMENT) > 20
    LIMIT 30
)
SELECT
    S_SUPPKEY,
    S_NAME,
    PAIS,
    CONTEXTO,
    extract_json:response:problema::STRING          AS PROBLEMA_DETECTADO,
    extract_json:response:producto_afectado::STRING AS PRODUCTO_AFECTADO,
    extract_json:response:hay_urgencia::STRING      AS HAY_URGENCIA
FROM extractions
WHERE PROBLEMA_DETECTADO IS NOT NULL
  AND PROBLEMA_DETECTADO != ''
ORDER BY S_NAME;


-- ============================================================
-- 🏋️ EJERCICIO 8 — AI_AGG
-- ============================================================
SELECT
    O_ORDERPRIORITY,
    COUNT(*) AS COMENTARIOS_ANALIZADOS,
    AI_AGG(
        O_COMMENT,
        'Analiza los comentarios de pedidos de este grupo y responde en español con exactamente: '
        || '1) Los 2-3 temas recurrentes principales, '
        || '2) El tono predominante (positivo, negativo o neutro), '
        || '3) Una recomendación de acción concreta en una sola frase.'
    ) AS ANALISIS_EJECUTIVO
FROM ORDERS
WHERE O_COMMENT IS NOT NULL
  AND O_ORDERDATE >= '1997-01-01'
GROUP BY O_ORDERPRIORITY
QUALIFY ROW_NUMBER() OVER (PARTITION BY O_ORDERPRIORITY ORDER BY RANDOM()) <= 50
ORDER BY O_ORDERPRIORITY;

select * from schema;