#!/bin/bash
start=`date +%s`
#set -x 
#set +x
#trap read debug
export LANG=en_US.UTF-8
#args="$@"
keyword="$@"
[[ $keyword == "" ]] && exit 0
database="./db/fdg-db.db"
source ./config/script_config.sh --source-only
#separator="@"
sqlitecommand="sqlite3 -separator $separator"
#[[ $keyword == "" ]] && exit 0
rm $tmpdir/initrun* 2>/dev/null
rm $tmpdir/afterawk 2>/dev/null
rm $tmpdir/cmnd 2>/dev/null
rm $tmpdir/counts 2>/dev/null
rm $tmpdir/finalhtml 2>/dev/null
rm $tmpdir/finalraw 2>/dev/null
rm $tmpdir/readyforawk 2>/dev/null
rm $tmpdir/words 2>/dev/null
rm $tmpdir/wordsAggregatedByTexts 2>/dev/null
#keyword=dukkh
# SQLite запрос с использованием параметров

translator="brahmali"
translator="sujato"
searchIn="./sutta/sn ./sutta/mn ./sutta/an ./sutta/dn"
kn="./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag"
knLater="./sutta/kn"
vin="./vinaya/pli-tv-b*"
vinLater="./vinaya/pli-tv-[kp].*"
searchIn="$searchIn"
#keyword=byākarissāmīti
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -riE "$keyword" $searchIn | sed 's/<[^>]*>//g' > $tmpdir/initrun-var

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/

if [ -s "$tmpdir/initrun-var" ]; then
cat $tmpdir/initrun-var | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/cmnd1
bash $tmpdir/cmnd1 > $tmpdir/initrun-pi
fi
grep -riE "$keyword" $searchIn >> $tmpdir/initrun-pi

if [ ! -s "$tmpdir/initrun-var" ] && [ ! -s "$tmpdir/initrun-pi" ]; then
    echo "$keyword не найдено в $searchIn"
    exit 1
fi

cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
cat $tmpdir/initrun-pi | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)" '"$searchIn"' \n@' > $tmpdir/cmnd
bash $tmpdir/cmnd > $tmpdir/initrun-en

# output language is russian
cd $apachesitepath/assets/texts/
bash $tmpdir/cmnd | sed 's/<[^>]*>//g' > $tmpdir/initrun-ru

cd - > /dev/null

sed -i 's/_root-pli-ms.json/":1"/g' $tmpdir/initrun-pi
sed -i 's/_translation-ru-.*.json/":2"/g' $tmpdir/initrun-ru
sed -i 's/_translation-en-sujato.json/":3"/g' $tmpdir/initrun-en
sed -i 's/_variant-pli-ms.json/":4"/g' $tmpdir/initrun-var
sed -i 's/":/@/g'  $tmpdir/initrun*
sed -i -e 's@./sutta/kn@khudakka\@/@g' -e 's@./sutta/@dhamma\@/@g' -e 's@./vinaya/@vinaya\@/@g' $tmpdir/initrun*


cat $tmpdir/initrun*  | sed 's/<[^>]*>//g' | sed 's/@ *"/@/g' | sed 's/",$//g' | sed 's/ "$//g' | sed 's@/.*/@@g'|  sort -t'@' -k2V,2 -k4V,4 -k2n,3 | uniq > $tmpdir/readyforawk
# |  для доп колонки |  awk -F/ '{print $NF}' | sed 's@\@/.*/@\@@g' |
########## count keywords in texts
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn | awk -F: '$2 > 0 {print $0}' > $tmpdir/words

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn | sed 's/<[^>]*>//g' |sed 's/[[:punct:]]*$//'| awk -F: '$2 > 0 {print $0}' >> $tmpdir/words

cat $tmpdir/words   | awk -F/ '{print $NF}' | awk -F_ '{print $1}' | sort -V | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/counts

cat $tmpdir/words | cleanupwords | awk -F/ '{print $NF}' | sed 's/_.*:/ /g'| awk '{print $1, $2}' | sort | uniq | awk '{
    if ($1 in data) {
        data[$1] = data[$1] " " $2
    } else {
        data[$1] = $1 "@" $2
    }
}
END {
    for (item in data) {
        print data[item]
    }
}' | sort -V > $tmpdir/wordsAggregatedByTexts

cd $apachesitepath > /dev/null
########## end count keywords in texts

#rm $tmpdir/afterawk  
bash $apachesitepath/new/awknewfdg.sh $tmpdir/readyforawk "$keyword" > $tmpdir/afterawk  

counts_file="$tmpdir/counts" 
afterawk_file="$tmpdir/afterawk"
aggregated_file="$tmpdir/wordsAggregatedByTexts"
wordsAggregatedByTexts=$(wc -l < "$aggregated_file")
counts=$(wc -l < "$counts_file")
afterawk=$(wc -l < "$afterawk_file")

if [ "$counts" -eq "$afterawk" ] && [ "$afterawk" -eq "$wordsAggregatedByTexts" ]; then
   # echo "Все три переменные равны $counts"
   echo
else
    echo "$counts в файле $counts_file не равно количеству строк $afterawk в файле $afterawk_file и $wordsAggregatedByTexts в $aggregated_file"
fi

paste -d"@" $tmpdir/counts $tmpdir/afterawk $tmpdir/wordsAggregatedByTexts > $tmpdir/finalraw
bash $apachesitepath/new/awk-step2fornew.sh $tmpdir/finalraw "$keyword" > $tmpdir/finalhtml

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/counts)"
wordLinkToReplace="/w.php?s=$keyword"
WORDREPLACELINK="$wordLinkToReplace"
cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/r.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/r.html
cat $apachesitepath/new/templates/resultheader | sed 's/$title/'"$headerinfo"'/g' | sed 's@$wordLinkToReplace@'"$wordLinkToReplace"'@g' >> $output/r.html
cat $tmpdir/finalhtml >> $output/r.html
cat $apachesitepath/new/templates/footer | sed 's@WORDREPLACELINK@'"$wordLinkToReplace"'@g' >> $output/r.html
cat $output/r.html
#head $tmpdir/readyforawk | awk -F@ '{print $1, $2, $3}' 
#wc -l $tmpdir/counts $tmpdir/afterawk
exit 0

cat $tmpdir/initrun-pi | awk '{ print $2 }' | sort -V  | uniq | sed "s@:@@g" | sed "s@^\"@@g" | awk 'BEGIN {OFS=""; printf "grep -Eir \047("} { printf $1"|"}' |  sed '$ s@|$@)'\'' '"$searchIn"' \n@'  > cmnd



#make cleanup
grep -oE "tmpdir[^ ]*"  scripts/Fdgh.sh | sort -u | sed 's/[[:punct:]]*$//' | sort -u | sed 's/^/rm $/' | sed 's@$@ 2>/dev/null @'