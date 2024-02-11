#!/bin/bash
start=`date +%s`
#set -x 
#set +x
#trap read debug
export LANG=en_US.UTF-8
source ./config/script_config.sh --source-only
#args="$@"
keyword="$@"
[[ $keyword == "" ]] && exit 0
database="./db/fdg-db.db"

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

#keyword=byākarissāmīti
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
grep -riE "$keyword" ./sn ./mn ./an ./dn | sort -V | sed 's/<[^>]*>//g' > $tmpdir/initrun3

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta

if [ -s "$tmpdir/initrun3" ]; then
cat $tmpdir/initrun3 | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  ./sn ./mn ./an ./dn \n@' > $tmpdir/cmnd1
bash $tmpdir/cmnd1 > $tmpdir/initrun1
fi

grep -riE "$keyword" ./sn ./mn ./an ./dn  | sort -V | uniq >> $tmpdir/initrun1

if [ ! -s "$tmpdir/initrun3" ] && [ ! -s "$tmpdir/initrun1" ]; then
    echo "$keyword не найдено в sn an mn dn"
    exit 1
fi

cd $suttapath/sc-data/sc_bilara_data/translation/en/sujato/sutta
cat $tmpdir/initrun1 | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  ./sn ./mn ./an ./dn \n@' > $tmpdir/cmnd
bash $tmpdir/cmnd > $tmpdir/initrun2
cd - > /dev/null

sed -i 's/_root-pli-ms.json/":1"/g' $tmpdir/initrun1
sed -i 's/_translation-en-sujato.json/":2"/g' $tmpdir/initrun2
sed -i 's/_variant-pli-ms.json/":3"/g' $tmpdir/initrun3
sed -i 's/":/@/g' $tmpdir/initrun*

cat $tmpdir/initrun* | sort -t'@' -k1V,1 -k3V,3 -k2n,2 | sed 's/<[^>]*>//g' | sed 's/@ *"/@/g' | sed 's/",$//g' | sed 's/ "$//g' | awk -F/ '{print $NF}'> $tmpdir/readyforawk

########## count keywords in texts
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' > $tmpdir/words

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' >> $tmpdir/words

cat $tmpdir/words |sed 's/[[:punct:]]*$//'  | awk -F/ '{print $NF}' | awk -F_ '{print $1}' | sort -V | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/counts


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
   break
else
    echo "Количество строк $counts в файле $counts_file не равно количеству строк $afterawk в файле $afterawk_file и $wordsAggregatedByTexts в $aggregated_file"
fi

paste -d"@" $tmpdir/counts $tmpdir/afterawk $tmpdir/wordsAggregatedByTexts> $tmpdir/finalraw
bash $apachesitepath/new/awk-step2fornew.sh $tmpdir/finalraw "$keyword" > $tmpdir/finalhtml

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/counts)"

cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/r.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/r.html
cat $apachesitepath/new/templates/resultheader| sed 's/$title/'"$headerinfo"'/g' >> $output/r.html
cat $tmpdir/finalhtml >> $output/r.html
cat $apachesitepath/new/templates/footer >> $output/r.html
cat $output/r.html
#head $tmpdir/readyforawk | awk -F@ '{print $1, $2, $3}' 
#wc -l $tmpdir/counts $tmpdir/afterawk
exit 0

cat $tmpdir/initrun1 | awk '{ print $2 }' | sort -V  | uniq | sed "s@:@@g" | sed "s@^\"@@g" | awk 'BEGIN {OFS=""; printf "grep -Eir \047("} { printf $1"|"}' |  sed '$ s@|$@)'\'' ./sn ./mn ./an ./dn \n@'  > cmnd



#make cleanup
grep -oE "tmpdir[^ ]*"  scripts/Fdgh.sh | sort -u | sed 's/[[:punct:]]*$//' | sort -u | sed 's/^/rm $/' | sed 's@$@ 2>/dev/null @'