#!/bin/bash
#echo before set all=$LC_ALL lang=$LANG
start=`date +%s`
#set -x 
#set +x
#trap read debug
export LANG=en_US.UTF-8
#export LC_ALL=en_US
#export LC_ALL=C.utf8
#export LC_ALL=pa_IN.UTF-8 
#echo after set all=$LC_ALL lang=$LANG
##############################
# ‘Why don’t I gather grass, 
# sticks, branches, and leaves 
# and make a raft? Riding on the raft
# and paddling with my hands and feet,
# I can safely reach the far shore.
########## sn35.238 ##########
args="$@"
source ./config/script_config.sh --source-only
source ./new/functions.sh --source-only



keyword="$@"
[[ $keyword == "" ]] && exit 0
WhereToSearch
keyword=$( echo "$@" | clearargs)

if [[ "$@" == *"-d"* ]]; then
filename=$(echo "$@" | awk '{print $2}')
keyword=$(echo "$@" | awk '{$1=$2="";print $0}' | sed 's/^ *//g')
echo "filnename case"
fi

htmlkeyword=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
separator="@"
sqlitecommand="sqlite3 -separator $separator"


cleanupTempFiles

translator="brahmali"
translator="sujato"




cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn  | sed 's/<[^>]*>//g' | awk -F: '$2 > 0 {print $0}' | cleanupwords > $tmpdir/words
cd -  > /dev/null
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn  | sed 's/<[^>]*>//g' | awk -F: '$2 > 0 {print $0}' | cleanupwords >> $tmpdir/words

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -ri "$keyword" ./sutta/ ./vinaya/ | sed -e 's@./sutta/kn@khudakka\@/@g' -e 's@./sutta/@dhamma\@/@g' -e 's@./vinaya/@vinaya\@/@g' | sed -e 's/_variant-pli-ms.json:/@/g' -e 's/": "/@/g'  -e 's/@ *"/@/g' | sed 's/",$//g' | sed 's/"$//g' | sort -t@ -k1,1 -k2V | awk -F/ '{print $NF}'| awk -F@ '{
  anch = $2 ; gsub(":", "#", anch); 
  link = "<strong><a class=\"fdgLink\" href=\"\" data-slug=\"" anch "\">" $1 "</a></strong>"}
  {print link, $3 "<br>"}'  > $tmpdir/variantsReport
#| sed -i 's/_variant-pli-ms.json//g' 


cd -  > /dev/null

#get uniq words
cat $tmpdir/words | sed -e 's/.*://g' -e 's/”ti/’ti/g' -e 's/[[:punct:]]*$//' | sort | uniq > $tmpdir/uniqwords

#this list for table is ok
cat $tmpdir/words |sed 's/[[:punct:]]*$//'  | awk -F/ '{print $NF}' | sed 's/_.*:/ /g'| awk '{print $2, $1}' | sort -V | uniq | awk '{
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
}' | sort -k1 > $tmpdir/wordsWithAggregatedTexts

#get counts in how many texts
cat $tmpdir/words |sed 's/[[:punct:]]*$//'  | awk -F/ '{print $NF}' | sed 's/_.*:/ /g'| awk '{print $2, $1}' | sort -k1 | uniq | awk '{print $1}'   | uniq -c | awk 'BEGIN { OFS = "@" }{print $2, $1}' > $tmpdir/wordcountTexts
#less $tmpdir/wordcountTexts

#get word counts 
cat $tmpdir/words | awk -F: '{print $NF}' | sort -k1 | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2, $1}' > $tmpdir/wordcountMatches

paste -d'@' $tmpdir/wordcountTexts $tmpdir/wordcountMatches $tmpdir/wordsWithAggregatedTexts > $tmpdir/threetables


if [[ "$@" == *"-d"* ]]; then
cat $tmpdir/threetables | awk -v keyword="$keyword" -v filename="$filename" 'BEGIN { 
    FS = "@" 
} 
{
    word = $1
    counttexts = $2
    wordTabTwo = $3
    countmatches = $4
    wordTabThree = $5
    linkslistArray = $NF

    # Парсинг списка ссылок
    linkCount = split(linkslistArray, linksArray, " ")
    linksHTML = ""
    for (i = 1; i <= linkCount; i++) {
        linksHTML = linksHTML "<a class=\"fdgLink\" href=\"\" data-slug=\"" linksArray[i] "\" data-filter=\"" word "\">" linksArray[i] "</a> "
    }

    # Вывод форматированной строки
    print "<tr><td>" word "</td><td><a href=\"/" filename "?f=" word "\">" counttexts "</a></td><td><div style=\"display:none;\">" wordTabTwo " </div>" countmatches "</td><td><div style=\"display:none;\">" wordTabThree " </div>" linksHTML "</td></tr>"
}' > $tmpdir/wordsfinalhtml
else
cat $tmpdir/threetables | awk -v keyword="$htmlkeyword" 'BEGIN { 
    FS = "@" 
} 
{
    word = $1
    counttexts = $2
    wordTabTwo = $3
    countmatches = $4
    wordTabThree = $5
    linkslistArray = $NF

    # Парсинг списка ссылок
    linkCount = split(linkslistArray, linksArray, " ")
    linksHTML = ""
    for (i = 1; i <= linkCount; i++) {
        linksHTML = linksHTML "<a class=\"fdgLink\" href=\"\" data-slug=\"" linksArray[i] "\" data-filter=\"" word "\">" linksArray[i] "</a> "
    }

    # Вывод форматированной строки
    print "<tr><td>" word "</td><td><a href=/s.php?s=" keyword "&f=" word ">" counttexts "</a></td><td><div style=\"display:none;\">" wordTabTwo " </div>" countmatches "</td><td><div style=\"display:none;\">" wordTabThree " </div>" linksHTML "</td></tr>"
}' > $tmpdir/wordsfinalhtml
fi 
uniqwordqnty=$(cat $tmpdir/wordcountTexts | wc -l)
textqnty=$(cat $tmpdir/words | awk -F/ '{print $NF}'| awk -F_ '{print $1}' | sort -u | wc -l)
headerinfo="${keyword^} $textqnty texts and $uniqwordqnty related words"
quotesLinkToReplace="/s.php?s=$keyword"
#echo end set all=$LC_ALL lang=$LANG

cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/w.html

echo '<div class="searchIn" style="display: none;" >'"$searchIn"'</div>' >> $output/w.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/w.html
cat $apachesitepath/new/templates/wordsheader | sed 's@quotesLinkToReplace@'"$quotesLinkToReplace"'@g' | sed 's/$title/'"$headerinfo"'/g' >> $output/w.html
cat $tmpdir/wordsfinalhtml >> $output/w.html
echo " </tbody>
    </table>" >> $output/w.html
    if [ -s "$tmpdir/variantsReport" ]; then
echo " </div><div class='mt-3 ms-4 variants'><h3 class='text-center my-3'>Variants for ${keyword^}</h2>" >> $output/w.html
cat $tmpdir/variantsReport >> $output/w.html
fi
echo "</div>" >> $output/w.html
cat $apachesitepath/new/templates/wordsfooter >> $output/w.html
cat $output/w.html

exit 0




vokiṇṇasukhadukkhaṁ@5@vokiṇṇasukhadukkhaṁ@5@vokiṇṇasukhadukkhaṁ@an3.23 an4.233 an4.234 mn57 mn79                yaṁdukkhasutta@1@yaṁdukkhasutta@2@yaṁdukkhasutta@sn22.16yaṁdukkho@1@yaṁdukkho@2@yaṁdukkho@dn19                  āveṇikadukkhasutta@1@āveṇikadukkhasutta@2@āveṇikadukkhasutta@sn37.3                                             ṭhitidukkhā@1@ṭhitidukkhā@1@ṭhitidukkhā@mn44

word=$1 
counttexts=$2
countmatches=$4
linkslistArray=$NF

<tr><td> word </td><td><a href=/s.php?&s=" htmlkeyword "f=" word ">" counttexts "</a></td><td>" countmatches "</td><td>
<a class='fdgLink' href='' data-slug='" linkfromArray1 "'>" linkfromaArray1 "</a>
<a class='fdgLink' href='' data-slug='" linkfromArray2 "'>" linkfromaArray2 "</a>
<a class='fdgLink' href='' data-slug='" etc "'>" etc "</a>
</td>
</tr>



exit 0