#!/bin/bash
source ./config/script_config.sh --source-only

function ParseFile {
# Чтение файла построчно
cat "$file_path" | sed 's@{@@g' |sed 's@}@@g' | grep -v "^$" |while IFS= read -r line; do
    # Извлечение данных из строки JSON с помощью awk
    line_id=$(echo "$line" | awk '{print $1}' | sed 's@":@@g' | sed 's@"@@g')
    line_text=$(echo "$line" | awk '{$1=""; print $0}' | sed 's@^ "@@' | sed 's@",$@@' | sed 's@"$@@')
    file_name=$(basename "$file_path" | sed 's@_.*@@g' )
[[ $translator != "" ]] && extracolumn="@$translator"
#${extracolumn}
echo "$line_id@$line_text@$file_name${extracolumn}" 
done 
}

function CreateSQL {
texttype=$1
language=$2
list=$4
textdir=$3
output=$language-$texttype.sql
rm $output 
for i in $list 
do 
find $textdir/$i -type f -name "*.json" | sort -V 
done > filelist-$texttype.tmp

for file_path in `cat filelist-$texttype.tmp`
do
[[ $language != "pali" ]] && translator=$(basename "$file_path" | awk -F'_translation-..-' '{print $2}' | sed 's@\.json@@g' )
echo $(basename "$file_path" | sed 's@_.*@@g' )
ParseFile $texttype >> $output
done 
}


#sutta vinaya pi
basedir=$suttapath/sc-data/sc_bilara_data/root/pli/ms
CreateSQL sutta pali $basedir "an sn mn dn kn"
CreateSQL vinaya pali $basedir "pli-tv-bu-pm_root-pli-ms.json pli-tv-bi-pm_root-pli-ms.json pli-tv-bu-vb pli-tv-bi-vb pli-tv-kd pli-tv-pvr"

#variants sutta vinaya
basedir=$suttapath/sc-data/sc_bilara_data/variant/pli/ms
CreateSQL sutta variant $basedir "an sn mn dn kn"
CreateSQL vinaya variant $basedir "pli-tv-bu-pm_root-pli-ms.json pli-tv-bi-pm_root-pli-ms.json pli-tv-bu-vb pli-tv-bi-vb pli-tv-kd pli-tv-pvr"

#sutta vinaya eng
basedir=$suttapath/sc-data/sc_bilara_data/translation/en
CreateSQL sutta eng $basedir/sujato/sutta "an sn mn dn kn" 
CreateSQL vinaya eng $basedir/brahmali/vinaya "pli-tv-bu-pm_translation-en-brahmali.json pli-tv-bi-pm_translation-en-brahmali.json pli-tv-bu-vb pli-tv-bi-vb pli-tv-kd pli-tv-pvr" 

#sutta ru
basedir=$apachesitepath/assets/texts/sutta
CreateSQL sutta rus $basedir "an sn mn dn" 

exit 0


fdgdb=fdg-db.db 
for table in sutta_pi vinaya_pi sutta_var vinaya_var
do 
echo "DROP TABLE IF EXISTS $table;
CREATE TABLE $table (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL);" | sqlite3 $fdgdb


DROP TABLE IF EXISTS sutta_ru;
CREATE TABLE sutta_ru (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL);

DROP TABLE IF EXISTS sutta_en;
CREATE TABLE sutta_en (
line_id TEXT PRIMARY KEY NOT NULL UNIQUE,
line_text TEXT NOT NULL,
file_name TEXT NOT NULL,
translator TEXT NOT NULL);

done

sqlite3 -separator '@' $fdgdb ".import pali-sutta.sql sutta_pi"
sqlite3 -separator '@' $fdgdb ".import pali-vinaya.sql vinaya_pi"
sqlite3 -separator '@' $fdgdb ".import variant-sutta.sql sutta_var"
sqlite3 -separator '@' $fdgdb ".import variant-vinaya.sql vinaya_var"
sqlite3 -separator '@' $fdgdb ".import rus-sutta.sql sutta_ru"


exit 1
cd 
/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/sutta
find . -type f | awk -F'_translation-ru-' '{print $2}' | sort -u

chatgpt.json
khantibalo.json
o.json
sv.json
syrkin+o.json
syrkin.json


grep -rih dukkh suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/an/ suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/sn/ suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/mn/ suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/dn/ | sed "s@\"@'@g" | sed "s@':@'@g" | awk '{print "\
select file_name, line_id, line_text from sutta_pi where line_id = "$1" UNION ALL \
SELECT file_name, line_id, line_text FROM sutta_ru WHERE line_id = "$1" UNION ALL \
SELECT file_name, line_id, line_text FROM sutta_en WHERE line_id = "$1" group by file_name;"}' | sqlite3 fdg-db.db

grep -rih dukkh suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/sn/ ntral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/mn/ | sed "s@\"@'@g" | sed "s@':@'@g" | awk '{print "\                                    select file_name, line_id, line_text from sutta_pi where line_id = "$1" UNION ALL \               SELECT file_name, line_id, line_text FROM sutta_ru WHERE line_id = "$1" UNION ALL \               SELECT file_name, line_id, line_text FROM sutta_en WHERE line_id = "$1" group by file_name;"}' | sqlite3 fdg-db.db

#fix rus file 
tr -d '\r' < input.txt > output.txt