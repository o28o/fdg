#!/bin/bash

# Параметр запроса - ключевое слово для поиска
keyword="$@"

[[ $keyword == "" ]] && exit 0


# SQLite запрос с использованием параметров запроса
#total
total="SELECT  '1' as draw,
count(distinct SUBSTR(line_id, 1, INSTR(line_id, ':') - 1)) as recordsTotal,
count(distinct SUBSTR(line_id, 1, INSTR(line_id, ':') - 1)) as recordsFiltered
 FROM sutta_pi
           WHERE line_text LIKE '%kacchap%'
             AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'"
query="WITH combined_results AS (
    SELECT 
        file_name,
        REPLACE(line_id, ':', '#') AS anchor,
        SUBSTR(line_id, 1, INSTR(line_id, ':') - 1) AS extra_link,
        line_id,
        weight,
        CASE 
        WHEN weight = 1 THEN 'pi'
        WHEN weight = 2 THEN 'en'
        WHEN weight = 3 THEN 'en'
        ELSE 'Unknown'
    END AS language,
        line_text AS quote_text,
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
    )
)
SELECT 
    json_object(
        'anchor', anchor,
        'file_name', file_name, 
        'extra_links', extra_link,        
        'quotes', json_group_array(json_object('lang', language, 'quote', quote_text, 'line_id', line_id) ORDER BY line_id)
    ) AS json_result
FROM combined_results
GROUP BY file_name;"


total=$(echo $total| sed 's@kacchap@'"$keyword"'@g')
query=$(echo $query| sed 's@kacchap@'"$keyword"'@g')
htmlpattern=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
# Выполнение запроса SQLite с использованием параметров
sqlite3 -json fdg-db.db "$total" | sed 's@[}\]]@@g'
echo -n ',"data":['
sqlite3 fdg-db.db "$query" #| sed 's@\\@@g'
echo -n ']}]'
exit 0

if [ -s "./result/output" ]; then
    cat ./new/header | sed 's/$title/'"$keyword"'/g' > ./result/w.html
bash ./awk.sh ./result/output "$keyword" >> ./result/w.html
cat ./new/footer >> ./result/w.html

echo '<script>                                   
window.location.href="/result/w.html?s='$htmlpattern'";
</script>'
else
    echo "	<script>                                   
window.location.href='/new';
</script>
    <script defer>
    document.getElementById('spinner').style.display = 'none';
</script>"

fi





SELECT file_name, line_id, line_text, 1 AS weight
FROM sutta_pi
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE lower(line_text) REGEXP '.*kacchap.*'
    AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
)
UNION ALL
SELECT file_name, line_id, line_text, 2 AS weight
FROM sutta_en
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE lower(line_text) REGEXP '.*kacchap.*'
    AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
)
UNION ALL
SELECT file_name, line_id, line_text, 3 AS weight
FROM sutta_var
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE lower(line_text) REGEXP '.*kacchap.*'
    AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
) order by file_name, line_id, weight


--name 

SELECT line_text
FROM text_names
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    LIMIT 5
);


highlight js

let params = new URLSearchParams(document.location.search);
  let finder = params.get("s");
if (finder && finder.trim() !== "") {
    let regex = new RegExp(finder, 'gi'); // 'gi' - игнорировать регистр
    paliData[segment] = paliData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    transData[segment] = transData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    
}






SELECT json_group_array(
           JSON_OBJECT(
               'file_name', file_name,
               'line_id', line_id,
               'line_text', line_text,
               'weight', weight
           )
       ) AS result
FROM (
    SELECT file_name, line_id,1 AS weight, line_text
    FROM sutta_pi
    WHERE line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE lower(line_text) REGEXP '.*kacchap.*'
        AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
    )
    UNION ALL
    SELECT file_name, line_id, 2 AS weight, line_text
    FROM sutta_en
    WHERE line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE lower(line_text) REGEXP '.*kacchap.*'
        AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
    )
    UNION ALL
    SELECT file_name, line_id, 3 AS weight, line_text
    FROM sutta_var
    WHERE line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE lower(line_text) REGEXP '.*kacchap.*'
        AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
    )
) AS subquery;