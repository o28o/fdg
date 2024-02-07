#!/bin/bash

# Параметр запроса - ключевое слово для поиска
keyword="$@"

[[ $keyword == "" ]] && exit 0


# SQLite запрос с использованием параметров запроса

query="SELECT 
    cr.file_name,
    weight,
    cr.line_text,
    cr.line_id,
 (SELECT line_text FROM Text_names WHERE line_id LIKE (SUBSTR(cr.line_id, 1, INSTR(cr.line_id, ':')) || '%')) AS text_name,
    (SELECT  metaphor_count FROM similes WHERE file_name = cr.file_name) AS metaphor_count
FROM (
    SELECT file_name, 1 AS weight, line_text, line_id
    FROM sutta_pi
    WHERE line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE lower(line_text) REGEXP '.*kacchap.*'
        AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
    )
    UNION ALL
    SELECT file_name, 2 AS weight, line_text, line_id
    FROM sutta_en
    WHERE line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE lower(line_text) REGEXP '.*kacchap.*'
        AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
    )
    UNION ALL
    SELECT file_name, 3 AS weight, line_text, line_id
    FROM sutta_var
    WHERE line_id IN (
        SELECT line_id
        FROM sutta_pi
        WHERE lower(line_text) REGEXP '.*kacchap.*'
        AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
    )
) cr
ORDER BY cr.file_name, cr.line_id, cr.weight;"

quickerNoCountAndNamequery="SELECT file_name, 1 AS weight, line_text, line_id
FROM sutta_pi
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE lower(line_text) REGEXP '.*kacchap.*'
    AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
)
UNION ALL
SELECT file_name, 2 AS weight, line_text, line_id
FROM sutta_en
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE lower(line_text) REGEXP '.*kacchap.*'
    AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
)
UNION ALL
SELECT file_name, 3 AS weight, line_text, line_id
FROM sutta_var
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE lower(line_text) REGEXP '.*kacchap.*'
    AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
) order by file_name, line_id, weight" 
query=$(echo $query| sed 's@kacchap@'"$keyword"'@g')
htmlpattern=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
# Выполнение запроса SQLite с использованием параметров
sqlite3 ./db/fdg-db.db "$query" > ./result/output


if [ -s "./result/output" ]; then
    cat ./new/header | sed 's/$title/'"$keyword"'/g' > ./result/w.html
bash ./new/awk2.sh ./result/output "$keyword" >> ./result/w.html
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


exit 0


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