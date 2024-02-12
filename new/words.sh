#!/bin/bash
echo before set all=$LC_ALL lang=$LANG
start=`date +%s`
#set -x 
#set +x
#trap read debug
export LANG=en_US.UTF-8
export LC_ALL=en_US
echo after set all=$LC_ALL lang=$LANG
#export LC_ALL=C  
#export LC_ALL=pa_IN.UTF-8 
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
[[ $keyword == "" ]] && exit 0
database="./db/fdg-db.db"
htmlpattern=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
separator="@"
sqlitecommand="sqlite3 -separator $separator"


rm $tmpdir/counts 2>/dev/null
rm $tmpdir/finalhtml 2>/dev/null
rm $tmpdir/uniqwords 2>/dev/null
rm $output/w.html 2>/dev/null
rm $tmpdir/wordcountMatches 2>/dev/null
rm $tmpdir/wordcountTexts 2>/dev/null
rm $tmpdir/words 2>/dev/null
rm $tmpdir/wordsWithAggregatedTexts 2>/dev/null
rm $tmpdir/wordsfinalhtml 2>/dev/null

function cleanupwords {
sed 's/[[:punct:]]*$//' | awk '{print tolower($0)}' | sed -e 's/[”’]*ti$/’ti/g' -e 's/[[:punct:]]*$//' 
}

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' | cleanupwords > $tmpdir/words
cd -  > /dev/null
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta
grep -rioE "\w*$keyword[^ ]*" ./sn ./mn ./an ./dn | awk -F: '$2 > 0 {print $0}' | cleanupwords >> $tmpdir/words
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

cat $tmpdir/threetables | awk -v keyword="$htmlpattern" 'BEGIN { 
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

uniqwordqnty=$(cat $tmpdir/wordcountTexts | wc -l)
textqnty=$(cat $tmpdir/words | awk -F/ '{print $NF}'| awk -F_ '{print $1}' | sort -u | wc -l)
headerinfo="${keyword^} $uniqwordqnty related words in $textqnty texts"
quotesLinkToReplace="/s.php?s=$keyword"
echo end set all=$LC_ALL lang=$LANG

cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/w.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/w.html
cat $apachesitepath/new/templates/wordsheader | sed 's@quotesLinkToReplace@'"$quotesLinkToReplace"'@g' | sed 's/$title/'"$headerinfo"'/g' >> $output/w.html
cat $tmpdir/wordsfinalhtml >> $output/w.html
cat ./new/templates/wordsfooter >> $output/w.html
cat $output/w.html

exit 0




vokiṇṇasukhadukkhaṁ@5@vokiṇṇasukhadukkhaṁ@5@vokiṇṇasukhadukkhaṁ@an3.23 an4.233 an4.234 mn57 mn79                yaṁdukkhasutta@1@yaṁdukkhasutta@2@yaṁdukkhasutta@sn22.16yaṁdukkho@1@yaṁdukkho@2@yaṁdukkho@dn19                  āveṇikadukkhasutta@1@āveṇikadukkhasutta@2@āveṇikadukkhasutta@sn37.3                                             ṭhitidukkhā@1@ṭhitidukkhā@1@ṭhitidukkhā@mn44

word=$1 
counttexts=$2
countmatches=$4
linkslistArray=$NF

<tr><td> word </td><td><a href=/s.php?&s=" htmlpattern "f=" word ">" counttexts "</a></td><td>" countmatches "</td><td>
<a class='fdgLink' href='' data-slug='" linkfromArray1 "'>" linkfromaArray1 "</a>
<a class='fdgLink' href='' data-slug='" linkfromArray2 "'>" linkfromaArray2 "</a>
<a class='fdgLink' href='' data-slug='" etc "'>" etc "</a>
</td>
</tr>



exit 0