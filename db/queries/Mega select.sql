SELECT 
    file_name,
    GROUP_CONCAT(weight || '|' || truncated_line_text  || '|' || line_id || '|')
FROM (
    SELECT 
        file_name,
        weight,
        substr(line_text, 1, 10) AS truncated_line_text,
        line_id
    FROM (
        SELECT sp.file_name, 1 AS weight, sp.line_text, sp.line_id
        FROM sutta_pi sp
        WHERE sp.line_id IN (
            SELECT line_id
            FROM sutta_pi
            WHERE line_text LIKE '%kacchap%'
                AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
        )
        UNION ALL
        SELECT se.file_name, 2 AS weight, se.line_text, se.line_id
        FROM sutta_en se
        WHERE se.line_id IN (
            SELECT line_id
            FROM sutta_pi
            WHERE line_text LIKE '%kacchap%'
                AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
        )
        UNION ALL
        SELECT sv.file_name, 3 AS weight, sv.line_text, sv.line_id
        FROM sutta_var sv
        WHERE sv.line_id IN (
            SELECT line_id
            FROM sutta_pi
            WHERE line_text LIKE '%kacchap%'
                AND line_id REGEXP '^(sn|mn|dn|an)[0-9]'
        )
    ) AS combined_results
    ORDER BY file_name, line_id, weight
) AS formatted_results
GROUP BY file_name;