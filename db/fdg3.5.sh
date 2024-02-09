#!/bin/bash
start=`date +%s`
#set -x 
#set +x
#trap read debug
export LANG=en_US.UTF-8
#export LC_ALL=en_US
##############################
# ‘Why don’t I gather grass, 
# sticks, branches, and leaves 
# and make a raft? Riding on the raft
# and paddling with my hands and feet,
# I can safely reach the far shore.
########## sn35.238 ##########
source ./config/script_config.sh --source-only
args="$@"

keyword="$@"
database="./db/fdg-db.db"

separator="@"
sqlitecommand="sqlite3 -separator $separator"
[[ $keyword == "" ]] && exit 0

# SQLite запрос с использованием параметров
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta
grep -riE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn  | sort -V > $tmpdir/maingrep
cd -  > /dev/null
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
grep -riE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn  | sort -V >> $tmpdir/maingrep
cd - > /dev/null
#quickerNoCountAndNamequery

#prequery=$(echo $prequery| sed 's@kacchap@'"$keyword"'@g')
#query=$(echo $query| sed 's@kacchap@'"$keyword"'@g')
htmlpattern=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
# Выполнение запроса SQLite с использованием параметров
#$sqlitecommand $database "$prequery" > $tmpdir/counts

if [ -s "$tmpdir/maingrep" ]; then

cat $tmpdir/maingrep | awk '{ print $2 }' | sed "s@\":@',@g" | sort -V | sed "s@^\"@'@g" |sed '$ s/,$//'  > $tmpdir/ids 
query="SELECT file_name, 1 AS weight, line_text, line_id
FROM sutta_pi
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE line_id in ("$(cat $tmpdir/ids)")
)
UNION ALL
SELECT file_name, 2 AS weight, line_text, line_id
FROM sutta_en
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE line_id in ("$(cat $tmpdir/ids)")
)
UNION ALL
SELECT file_name, 3 AS weight, line_text, line_id
FROM sutta_var
WHERE line_id IN (
    SELECT line_id
    FROM sutta_pi
    WHERE line_id in ("$(cat $tmpdir/ids)")
) order by file_name, line_id, weight;" 

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' > $tmpdir/words
cd -  > /dev/null
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' >> $tmpdir/words
cd -  > /dev/null
cat $tmpdir/words |sed 's/[[:punct:]]*$//'  | awk -F/ '{print $NF}' | awk -F_ '{print $1}' | sort -V | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/counts
echo $query   > ofof
cat $tmpdir/counts | awk -F"$separator" '{ if (NR == 1) {
        printf "SELECT temp_ids.file_name, t.line_text, s.metaphor_count\n";
        printf "FROM (\n";
        printf "    SELECT '\''%s'\'' AS file_name\n", $1;
    } else {
        printf "    UNION ALL SELECT '\''%s'\''\n", $1;
    }
}
END {
    printf ") AS temp_ids\n";
    printf "LEFT JOIN text_names t ON temp_ids.file_name = t.file_name\n";
    printf "LEFT JOIN similes s ON temp_ids.file_name = s.file_name;\n";
}' | $sqlitecommand $database | sort -V > $tmpdir/extra
paste -d"$separator" $tmpdir/counts $tmpdir/extra > $tmpdir/ctMrNames
$sqlitecommand $database "$query"  | sort -t'@' -k1V,1 -k4 -k2 > $tmpdir/mainquery
bash ./new/awk-step1.sh $tmpdir/mainquery "$keyword" > $tmpdir/prefinal

paste -d'@' $tmpdir/prefinal $tmpdir/ctMrNames > $tmpdir/finalraw
bash ./new/awk-step2.sh $tmpdir/finalraw "$keyword" > $tmpdir/finalhtml

#bash ./new/awk2.sh $tmpdir/ctMrNames $tmpdir/mainquery "$keyword" > $tmpdir/final
#paste -d"$separator" $tmpdir/nocount $tmpdir/ctMrNames

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/ctMrNames)"
cat ./new/templates/header ./new/templates/resultheader| sed 's/$title/'"$headerinfo"'/g' > $tmpdir/r.html
cat $tmpdir/finalhtml >> $tmpdir/r.html
cat ./new/templates/footer >> $tmpdir/r.html
cat $tmpdir/r.html

fi
exit 0

prequery="SELECT file_name, line_id,
       sum((LENGTH(line_text) - LENGTH(REPLACE(lower(line_text), 'kacchap', ''))) / LENGTH('kacchap')) AS count_occurrences
FROM sutta_pi
WHERE lower(line_text) REGEXP '.*kacchap.*'
AND line_id REGEXP '^(sn|mn|dn|an)[0-9].*'
GROUP BY file_name
HAVING count_occurrences >= 1;"


echo '<script>                                   
window.location.href="/result/r.html?s='$htmlpattern'";
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