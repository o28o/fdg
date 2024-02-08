#!/bin/bash

# Параметр запроса - ключевое слово для поиска
keyword="$@"
database="./db/fdg-db.db"
tmpdir="./result"
separator="@"
sqlitecommand="sqlite3 -separator $separator"
[[ $keyword == "" ]] && exit 0


# SQLite запрос с использованием параметров 
prequery="SELECT file_name, line_id,
       sum((LENGTH(line_text) - LENGTH(REPLACE(lower(line_text), 'kacchap', ''))) / LENGTH('kacchap')) AS count_occurrences
FROM sutta_pi
WHERE lower(line_text) REGEXP '.*kacchap.*'
AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
GROUP BY file_name
HAVING count_occurrences >= 1;"

#names and metaphors



#quickerNoCountAndNamequery
query="SELECT file_name, 1 AS weight, line_text, line_id
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
prequery=$(echo $prequery| sed 's@kacchap@'"$keyword"'@g')
query=$(echo $query| sed 's@kacchap@'"$keyword"'@g')
htmlpattern=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
# Выполнение запроса SQLite с использованием параметров
$sqlitecommand $database "$prequery" > $tmpdir/counts

if [ -s "$tmpdir/counts" ]; then
cat $tmpdir/counts | awk -F"$separator" 'BEGIN {
    printf("SELECT t1.metaphor_count, t2.line_text\n");
    printf("FROM similes t1\n");
    printf("JOIN text_names t2 ON t1.file_name = t2.file_name\n");
    printf("WHERE t2.file_name IN (");
    first = 1;
}
{
    if (first) {
        printf("'\''%s'\''", $1);
        first = 0;
    } else {
        printf(",'\''%s'\''", $1);
    }
}

END {
    printf(");\n");
}' | $sqlitecommand $database > $tmpdir/extra
paste -d"$separator" $tmpdir/counts $tmpdir/extra > $tmpdir/ctMrNames
$sqlitecommand $database "$query" > $tmpdir/mainquery
bash ./new/awk-step1.sh $tmpdir/mainquery "$keyword" > $tmpdir/prefinal
paste -d'@' $tmpdir/ctMrNames $tmpdir/prefinal > $tmpdir/finalraw
bash ./new/awk-step2.sh $tmpdir/finalraw "$keyword" > $tmpdir/finalhtml

#bash ./new/awk2.sh $tmpdir/ctMrNames $tmpdir/mainquery "$keyword" > $tmpdir/final
#paste -d"$separator" $tmpdir/nocount $tmpdir/ctMrNames

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/ctMrNames)"
cat ./new/header | sed 's/$title/'"$headerinfo"'/g' > $tmpdir/w.html
cat $tmpdir/finalhtml >> $tmpdir/w.html
cat ./new/footer >> $tmpdir/w.html
cat $tmpdir/w.html

fi
exit 0

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

#toolkng
eeequery="SELECT 
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