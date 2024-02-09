
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
grep -riE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn  | sort -V > $tmpdir/maingrep1
cd -  > /dev/null
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
grep -riE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn  | sort -V > $tmpdir/maingrep3
cd - > /dev/null

cd $suttapath/sc-data/sc_bilara_data/translation/en/sujato/sutta
cat $tmpdir/maingrep1 | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  ./sn ./mn ./an ./dn \n@' > cmnd
bash cmnd > $tmpdir/maingrep2
cd - > /dev/null

sed -i 's/_root-pli-ms.json/":1"/g' $tmpdir/maingrep1
sed -i 's/_translation-en-sujato.json/":2"/g' $tmpdir/maingrep2
sed -i 's/_variant-pli-ms.json/":3"/g' $tmpdir/maingrep3
sed -i 's/":/@/g' $tmpdir/maingrep*

cat $tmpdir/maingrep* | sort -t'@' -k1V,1 -k3V,3 -k2n,2 | sed 's/@ *"/@/g' | sed 's/",$//g' | awk -F/ '{print $NF}'> $tmpdir/readyforawk

bash awknewfdg.sh $tmpdir/readyforawk "$keyword" > $tmpdir/afterawk  

cat $tmpdir/afterawk | wc -l 
#head $tmpdir/readyforawk | awk -F@ '{print $1, $2, $3}' 
exit 0

cat $tmpdir/maingrep1 | awk '{ print $2 }' | sort -V  | uniq | sed "s@:@@g" | sed "s@^\"@@g" | awk 'BEGIN {OFS=""; printf "grep -Eir \047("} { printf $1"|"}' |  sed '$ s@|$@)'\'' ./sn ./mn ./an ./dn \n@'  > cmnd