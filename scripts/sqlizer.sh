#!/bin/bash
source ./config/script_config.sh --source-only

function ParseFile {
# Чтение файла построчно
cat "$file_path" | sed 's@{@@g' |sed 's@}@@g' | grep -v "^$" |while IFS= read -r line; do
    # Извлечение данных из строки JSON с помощью awk
    line_id=$(echo "$line" | awk '{print $1}' | sed 's@":@@g' | sed 's@"@@g')
    line_text=$(echo "$line" | awk '{$1=""; print $0}' | sed 's@^ "@@' | sed 's@",$@@' | sed 's@"$@@')
    file_name=$(basename "$file_path" | sed 's@_.*@@g' )
  
echo "$line_id@$line_text@$file_name@$1" 
done 
}

function CreateSQL {
texttype=$1
language=$2
list=$4
textdir=$basedir/$texttype
output=$language-$texttype.sql
rm $output
for i in $list 
do 
find $textdir/$i -type f | sort -V 
done > filelist-$texttype.tmp

for file_path in `cat filelist-$texttype.tmp`
do
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

CreateSQL sutta pali $basedir/sujato/sutta "an sn mn dn kn"
CreateSQL vinaya pali $basedirra_data/brahmali/vinaya "pli-tv-bu-pm_root-pli-ms.json pli-tv-bi-pm_root-pli-ms.json pli-tv-bu-vb pli-tv-bi-vb pli-tv-kd pli-tv-pvr"

exit 0
sqlite3 -separator '|' fdg-db.db ".import insert-sutta-sn28.sql sutta_pi"


sqlite3 -separator '@' fdg-db.db ".import insert-sutta-sn28.sql sutta_pi"


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

