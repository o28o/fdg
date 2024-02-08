#!/bin/bash

# Параметр запроса - ключевое слово для поиска
keyword="$1"

# SQLite запрос с использованием параметров запроса

query="SELECT 
    file_name,
    GROUP_CONCAT(line_id || '|' || truncated_line_text || ' ')
FROM (
    SELECT 
        file_name,
        line_id,
        line_text AS truncated_line_text
    FROM (
        SELECT sp.file_name, sp.line_id, sp.line_text
        FROM sutta_pi sp
        WHERE sp.line_id IN (
            SELECT line_id
            FROM sutta_pi
            WHERE lower(line_text) LIKE '%kacchap%'
                AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
        )
    
        UNION ALL
    
        SELECT se.file_name, se.line_id, se.line_text
        FROM sutta_en se
        WHERE se.line_id IN (
            SELECT line_id
            FROM sutta_pi
            WHERE lower(line_text) LIKE '%kacchap%'
                AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
        )
    
        UNION ALL
    
        SELECT sv.file_name, sv.line_id, sv.line_text
        FROM sutta_var sv
        WHERE sv.line_id IN (
            SELECT line_id
            FROM sutta_pi
            WHERE lower(line_text) LIKE '%kacchap%'
                AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
        )
    ) AS combined_results
    ORDER BY file_name, line_id
) AS formatted_results
GROUP BY file_name;"


query=$(echo $query| sed 's@%kacchap%@'"$keyword"'@g')
# Выполнение запроса SQLite с использованием параметров
sqlite3 fdg-db.db "$query" 


exit 0
#count
SELECT file_name, 
       SUM((LENGTH(line_text) - LENGTH(REPLACE(lower(line_text), 'kacchap', ''))) / LENGTH('kacchap')) AS count_occurrences
FROM sutta_pi
WHERE lower(line_text) REGEXP '.*kacchap.*'
AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
GROUP BY file_name
HAVING count_occurrences >= 1;




query="SELECT file_name, GROUP_CONCAT(line_id || '|' || line_text, '|') AS concatenated_text
FROM (
    SELECT sp.file_name, sp.line_id, sp.line_text
    FROM sutta_pi sp
    WHERE sp.line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE line_text LIKE '%kacchap%'
            AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
    )
    
    UNION ALL
    
    SELECT se.file_name, se.line_id, se.line_text
    FROM sutta_en se
    WHERE se.line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE line_text LIKE '%kacchap%'
            AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
    )
    
    UNION ALL
    
    SELECT sv.file_name, sv.line_id, sv.line_text
    FROM sutta_var sv
    WHERE sv.line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE line_text LIKE '%kacchap%'
            AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
    )
) AS combined_tables
GROUP BY file_name, line_id;"

SELECT file_name, GROUP_CONCAT(line_id || '|' || line_text, '|') AS concatenated_text
FROM (
    SELECT sp.file_name, sp.line_id, sp.line_text
    FROM sutta_pi sp
    WHERE sp.line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE line_text LIKE '%kacchap%'
            AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
    )
    
    UNION ALL
    
    SELECT se.file_name, se.line_id, se.line_text
    FROM sutta_en se
    WHERE se.line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE line_text LIKE '%kacchap%'
            AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
    )
    
    UNION ALL
    
    SELECT sv.file_name, sv.line_id, sv.line_text
    FROM sutta_var sv
    WHERE sv.line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE line_text LIKE '%kacchap%'
            AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
    )
) AS combined_tables
GROUP BY file_name, line_id;