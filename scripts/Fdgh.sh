
source ./config/script_config.sh --source-only
#args="$@"

keyword="$@"
database="./db/fdg-db.db"

#separator="@"
sqlitecommand="sqlite3 -separator $separator"
#[[ $keyword == "" ]] && exit 0

#keyword=dukkh
# SQLite запрос с использованием параметров
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta
grep -riE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn  | sort -V > $tmpdir/initrun1
cd -  > /dev/null
#cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
#grep -riE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn  | sort -V | sed 's/<[^>]*>//g' > $tmpdir/initrun3
#cd - > /dev/null

cd $suttapath/sc-data/sc_bilara_data/translation/en/sujato/sutta
cat $tmpdir/initrun1 | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  ./sn ./mn ./an ./dn \n@' > cmnd
bash cmnd > $tmpdir/initrun2
cd - > /dev/null

sed -i 's/_root-pli-ms.json/":1"/g' $tmpdir/initrun1
sed -i 's/_translation-en-sujato.json/":2"/g' $tmpdir/initrun2
sed -i 's/_variant-pli-ms.json/":3"/g' $tmpdir/initrun3
sed -i 's/":/@/g' $tmpdir/initrun*

cat $tmpdir/initrun* | sort -t'@' -k1V,1 -k3V,3 -k2n,2 | sed 's/<[^>]*>//g' | sed 's/@ *"/@/g' | sed 's/",$//g' | sed 's/ "$//g' | awk -F/ '{print $NF}'> $tmpdir/readyforawk

########## count keywords in texts
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' > $tmpdir/words
cd -  > /dev/null
#cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
#grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' >> $tmpdir/words
#cd -  > /dev/null
cat $tmpdir/words |sed 's/[[:punct:]]*$//'  | awk -F/ '{print $NF}' | awk -F_ '{print $1}' | sort -V | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/counts
########## end count keywords in texts
#rm $tmpdir/afterawk  
bash awknewfdg.sh $tmpdir/readyforawk "$keyword" > $tmpdir/afterawk  


counts_file="$tmpdir/counts"
afterawk_file="$tmpdir/afterawk"
counts=$(wc -l < "$counts_file")
afterawk=$(wc -l < "$afterawk_file")

if [ "$counts" -ne "$afterawk" ]; then
    echo "Количество строк $counts в файле $counts_file не равно количеству строк $afterawk в файле $afterawk_file"
fi

paste -d"@" $tmpdir/counts $tmpdir/afterawk > $tmpdir/finalraw
bash ./awk-step2fornew.sh $tmpdir/finalraw "$keyword" > $tmpdir/finalhtml

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/counts)"

cat ./new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/r.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/r.html
cat ./new/templates/resultheader| sed 's/$title/'"$headerinfo"'/g' >> $output/r.html
cat $tmpdir/finalhtml >> $output/r.html
cat ./new/templates/footer >> $output/r.html
cat $output/r.html
#head $tmpdir/readyforawk | awk -F@ '{print $1, $2, $3}' 
#wc -l $tmpdir/counts $tmpdir/afterawk
exit 0

cat $tmpdir/initrun1 | awk '{ print $2 }' | sort -V  | uniq | sed "s@:@@g" | sed "s@^\"@@g" | awk 'BEGIN {OFS=""; printf "grep -Eir \047("} { printf $1"|"}' |  sed '$ s@|$@)'\'' ./sn ./mn ./an ./dn \n@'  > cmnd