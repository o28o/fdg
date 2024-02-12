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
rm $tmpdir/hleg.init* 2>/dev/null
rm $tmpdir/hleg.afterawk 2>/dev/null
rm $tmpdir/hleg.cmnd 2>/dev/null
rm $tmpdir/hleg.counts 2>/dev/null
rm $tmpdir/hleg.finalhtml 2>/dev/null
rm $tmpdir/hleg.finalraw 2>/dev/null
rm $tmpdir/hleg.readyforawk 2>/dev/null
rm $tmpdir/hleg.words 2>/dev/null
rm $tmpdir/hleg.wordsAggregatedByTexts 2>/dev/null
#keyword=dukkh
# SQLite запрос с использованием параметров

translator="brahmali"
translator="sujato"
searchIn="./sutta/sn ./sutta/mn ./sutta/an ./sutta/dn"
kn="./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag"
knLater="./sutta/kn"
vin="./vinaya/pli-tv-b*"
vinLater="./vinaya/pli-tv-[kp].*"
searchIn="$searchIn $kn"
#keyword=byākarissāmīti
textpath=$suttapath/sc-data/html_text/ru/pli/
cd $textpath

grep -riE "$keyword" $searchIn | sed 's/<[^>]*>//g' > $tmpdir/hleg.init-ru
sed -i 's/.html:/@1@@/g' $tmpdir/hleg.init-ru
sed -i -e 's@./sutta/kn@khudakka\@/@g' -e 's@./sutta/@dhamma\@/@g' -e 's@./vinaya/@vinaya\@/@g' $tmpdir/hleg.init*

cat $tmpdir/hleg.init*  | sed 's/<[^>]*>//g' | sed 's/@ *"/@/g' | sed 's/",$//g' | sed 's/ "$//g' | sed 's@/.*/@@g'| sed 's@\@/.*/@\@@g' | sort -t'@' -k2V,2 -k4V,4 -k2n,3 | uniq > $tmpdir/hleg.readyforawk
# |  для доп колонки |  awk -F/ '{print $NF}'
########## count keywords in texts
cd $textpath
grep -rioE "\w*$keyword[^ ]*" $searchIn | sed 's/<[^>]*>//g' |sed 's/[[:punct:]]*$//' | awk -F: '$2 > 0 {print $0}' > $tmpdir/hleg.words

cat $tmpdir/hleg.words   | awk -F/ '{print $NF}' | awk -F_ '{print $1}' | sort -V | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/hleg.counts

cat $tmpdir/hleg.words | cleanupwords | awk -F/ '{print $NF}' | sed 's/_.*:/ /g'| awk '{print $1, $2}' | sort | uniq | awk '{
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
}' | sort -V > $tmpdir/hleg.wordsAggregatedByTexts

cd $apachesitepath > /dev/null
########## end count keywords in texts

#rm $tmpdir/hleg.afterawk  
bash $apachesitepath/new/awknewfdg.sh $tmpdir/hleg.readyforawk "$keyword" > $tmpdir/hleg.afterawk  

counts_file="$tmpdir/hleg.counts" 
afterawk_file="$tmpdir/hleg.afterawk"
aggregated_file="$tmpdir/hleg.wordsAggregatedByTexts"
wordsAggregatedByTexts=$(wc -l < "$aggregated_file")
counts=$(wc -l < "$counts_file")
afterawk=$(wc -l < "$afterawk_file")

if [ "$counts" -eq "$afterawk" ] && [ "$afterawk" -eq "$wordsAggregatedByTexts" ]; then
   # echo "Все три переменные равны $counts"
   echo
else
    echo "$counts в файле $counts_file не равно количеству строк $afterawk в файле $afterawk_file и $wordsAggregatedByTexts в $aggregated_file"
fi

paste -d"@" $tmpdir/hleg.counts $tmpdir/hleg.afterawk $tmpdir/hleg.wordsAggregatedByTexts > $tmpdir/hleg.finalraw
bash $apachesitepath/new/awk-step2fornew.sh $tmpdir/hleg.finalraw "$keyword" > $tmpdir/hleg.finalhtml

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/hleg.counts)"

cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/r.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/r.html
cat $apachesitepath/new/templates/resultheader| sed 's/$title/'"$headerinfo"'/g' >> $output/r.html
cat $tmpdir/hleg.finalhtml >> $output/r.html
cat $apachesitepath/new/templates/footer >> $output/r.html
cat $output/r.html
#head $tmpdir/hleg.readyforawk | awk -F@ '{print $1, $2, $3}' 
#wc -l $tmpdir/hleg.counts $tmpdir/hleg.afterawk
exit 0

cat $tmpdir/hleg.init-pi | awk '{ print $2 }' | sort -V  | uniq | sed "s@:@@g" | sed "s@^\"@@g" | awk 'BEGIN {OFS=""; printf "grep -Eir \047("} { printf $1"|"}' |  sed '$ s@|$@)'\'' '"$searchIn"' \n@'  > cmnd



#make cleanup
grep -oE "tmpdir[^ ]*"  scripts/Fdgh.sh | sort -u | sed 's/[[:punct:]]*$//' | sort -u | sed 's/^/rm $/' | sed 's@$@ 2>/dev/null @'