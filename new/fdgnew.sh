#!/bin/bash
start=`date +%s`
#set -x 
#set +x
#trap read debug
#export LANG=en_US.UTF-8
#export LC_ALL=C.utf8
#args="$@"
keyword="$@"
args="$@"
[[ $keyword == "" ]] && exit 0
database="./db/fdg-db.db"
source ./config/script_config.sh --source-only
source ./new/functions.sh --source-only
#separator="@"
sqlitecommand="sqlite3 -separator $separator"
#[[ $keyword == "" ]] && exit 0

cleanupTempFiles
#keyword=dukkh
# SQLite запрос с использованием параметров

translator="brahmali"
translator="sujato"
WhereToSearch
keyword=$( echo "$@" | clearargs)
escapedKeyword=$(echo "$keyword" | sed 's/\\/\\\\/g')
#echo $keyword in $searchIn lc $LC_ALL lang $LANG src $source

#keyword=byākarissāmīti

#if pali cd to pali or var if eng cd to eng 
#filelists
if [[ "$@" == *"-anyd"* ]] || [[ "$@" == *"-top"* ]] ; then
echo engFirst
fi

#word or id lists
#pli or eng first
if [[ "$@" == *"-def"* ]] || [[ "$@" == *"-sml"* ]] ; then
echo engFirst
fi

#eng 1st pli 1st 
if [[ "$@" == *"-en"* ]]; then
echo engFirst

fi

#var1st
varFirst

if [[ "$@" == *"-oru"* ]]
then
# output language is russian
cd $apachesitepath/assets/texts/
bash $tmpdir/cmndFromPi | sed 's/<[^>]*>//g' > $tmpdir/initrun-ru 2>/dev/null
fi

cd $apachesitepath > /dev/null

#proccessing common for all files 
sed -i 's/_root-pli-ms.json/":1"/g' $tmpdir/initrun-pi
sed -i 's/_translation-ru-.*.json/":2"/g' $tmpdir/initrun-ru 2>/dev/null
sed -i 's/_translation-en-sujato.json/":3"/g' $tmpdir/initrun-en
sed -i 's/_variant-pli-ms.json/":4"/g' $tmpdir/initrun-var
sed -i 's/":/@/g'  $tmpdir/initrun*
sed -i -e 's@./sutta/kn@khudakka\@/@g' -e 's@./sutta/@dhamma\@/@g' -e 's@./vinaya/@vinaya\@/@g' $tmpdir/initrun*


cat $tmpdir/initrun*  | sed 's/<[^>]*>//g' | sed 's/@ *"/@/g' | sed 's/",$//g' | sed 's/ "$//g' | sed 's@/.*/@@g'|  sort -t'@' -k2V,2 -k4V,4 -k2n,3 | uniq > $tmpdir/readyforawk
# |  для доп колонки |  awk -F/ '{print $NF}' | sed 's@\@/.*/@\@@g' |
########## count keywords in texts
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn  | sed 's/<[^>]*>//g' | awk -F: '$2 > 0 {print $0}' > $tmpdir/words

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn | sed 's/<[^>]*>//g' |sed 's/[[:punct:]]*$//'| awk -F: '$2 > 0 {print $0}' >> $tmpdir/words

cat $tmpdir/words | awk -F/ '{print $NF}' | awk -F_ '{print $1}' | sort -V | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/counts

cat $tmpdir/words | cleanupwords | awk -F/ '{print $NF}' | sed 's/_.*:/ /g'| awk '{print $1, $2}' | sort -V | uniq | awk '{
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


headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts "  sum " matches in '"$searchInForUser"'" }' $tmpdir/counts)"

escapedKeyword=$(echo "$keyword" | sed 's/\\/\\\\/g')
#echo $escapedKeyword
wordLinkToReplace="/w.php?s=${escapedKeyword}\&d=$source"
WORDREPLACELINK="$wordLinkToReplace"
cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/r.html
echo '<div class="keyword" style="display: none;" >'"$escapedKeyword"'</div>' >> $output/r.html
echo '<div class="searchIn" style="display: none;" >'"$searchIn"'</div>' >> $output/r.html

grepping=

#    if [ -s "$tmpdir/initrun-var" ]; then
if grep -qrEi -m1 "$keyword" $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta/ $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta/vinaya/
then
echo '<script>
document.addEventListener("DOMContentLoaded", function() {
  var keywordDiv = document.querySelector(".keyword");
  var variantsDivs = document.querySelectorAll(".variants");

  if (keywordDiv) {
    var keywordText = keywordDiv.innerText.trim();
    var keywordCapitalized = keywordText.charAt(0).toUpperCase() + keywordText.slice(1);
    
    variantsDivs.forEach(function(variantsDiv) {
      if (variantsDiv.id === "variants") {
        variantsDiv.style.display = "block";
        variantsDiv.innerHTML = keywordCapitalized + " has" + variantsDiv.innerHTML.substring(variantsDiv.innerHTML.indexOf("has") + 3);
      } else {
        variantsDiv.style.display = "block";
      }
    });
  }
});
</script>' >> $output/r.html
fi 

#echo $keyword in the end

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



datatables debugger

https://debug.datatables.net/

(function() {
    var url = 'https://debug.datatables.net/bookmarklet/DT_Debug.js';
    if (typeof DT_Debug != 'undefined') {
        if (DT_Debug.instance !== null) {
            DT_Debug.close();
        } else {
            new DT_Debug();
        }
    } else {
        var n = document.createElement('script');
        n.setAttribute('language', 'JavaScript');
        n.setAttribute('src', url + '?rand=' + new Date().getTime());
        document.body.appendChild(n);
    }
})(); 