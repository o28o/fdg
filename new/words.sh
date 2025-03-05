#!/bin/bash
#echo locale set all=$LC_ALL lang=$LANG
start=`date +%s`
#set -x 
#set +x
#trap read debug
#export LC_ALL=ru_RU.UTF-8 
#export LC_ALL=en_US
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
applyOutputLangToResponses
[[ $keyword == "" ]] && exit 0
WhereToSearch
keyword=$( echo "$@" | clearargs)

if [[ "$@" == *"-d"* ]]; then
filename=$(echo "$@" | awk '{print $2}')
keyword=$(echo "$@" | awk '{$1=$2="";print $0}' | sed 's/^ *//g')
echo "filnename case"
fi
#echo $LC_ALL $LANG $keyword $@
htmlkeyword=$(echo "$keyword" | sed 's/\\.//g' | sed 's/ /%20/g')
separator="@"
sqlitecommand="sqlite3 -separator $separator"

cleanupTempFiles

setSearchLanguage

getWordsForCounts

export LANG=C
export LC_ALL=C
if [ ! -s "$tmpdir/${prefix}words" ]; then
NotFoundErr
#cd $apachesitepath > /dev/null
#bash new/fdgnew.sh `echo $@ | sed -e 's/-en//g'`
    exit 1
fi



if [[ "$searchlang" == *"pi"* ]]; then
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -Eri "$keyword" ./sutta/ ./vinaya/ | sed -e 's@./sutta/kn@khudakka\@/@g' -e 's@./sutta/@dhamma\@/@g' -e 's@./vinaya/@vinaya\@/@g' | sed -e 's/_variant-pli-ms.json:/@/g' -e 's/": "/@/g'  -e 's/@ *"/@/g' | sed 's/",$//g' | sed 's/"$//g' | sort -t@ -k1,1 -k2V | awk -F/ '{print $NF}'| awk -F@ '{
  anch = $2 ; gsub(":", "#", anch); 
  link = "<strong><a class=\"fdgLink\" href=\"\" data-slug=\"" anch "\">" $1 "</a></strong>"}
  {print link, $3 "<br>"}'  > $tmpdir/${prefix}variantsReport
#| sed -i 's/_variant-pli-ms.json//g' 
fi 


#get uniq words
cat $tmpdir/${prefix}words | cleanupwords | sort | uniq > $tmpdir/${prefix}uniqwords

#this list for table is ok
cat $tmpdir/${prefix}words | cleanupwords  | awk -F/ '{print $NF}' | sed 's/.html:/ /g' | sed 's/_.*:/ /g'| awk '{print $2, $1}' | sort -V | uniq | awk '{
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
}' | sort -k1 > $tmpdir/${prefix}wordsWithAggregatedTexts

#get counts in how many texts
cat $tmpdir/${prefix}words | cleanupwords | awk -F/ '{print $NF}' | sed 's/.html:/ /g' | sed 's/_.*:/ /g'| awk '{print $2, $1}' | sort -k1 | uniq | awk '{print $1}'   | uniq -c | awk 'BEGIN { OFS = "@" }{print $2, $1}' > $tmpdir/${prefix}wordcountTexts
#less $tmpdir/${prefix}wordcountTexts

#get word counts 
cat $tmpdir/${prefix}words | awk -F: '{print $NF}' | sort -k1 | uniq -c | awk 'BEGIN { OFS = "@" }{ print $2, $1}' > $tmpdir/${prefix}wordcountMatches

paste -d'@' $tmpdir/${prefix}wordcountTexts $tmpdir/${prefix}wordcountMatches $tmpdir/${prefix}wordsWithAggregatedTexts > $tmpdir/${prefix}threetables


if [[ "$@" == *"-d"* ]]; then
cat $tmpdir/${prefix}threetables | awk -v keyword="$keyword" -v filename="$filename" 'BEGIN { 
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
    print "<tr><td class=pli-lang>" word "</td><td><a href=\"/" filename "?f=" word "\">" counttexts "</a></td><td><div style=\"display:none;\">" wordTabTwo " </div>" countmatches "</td><td><div style=\"display:none;\">" wordTabThree " </div>" linksHTML "</td></tr>"
}' > $tmpdir/${prefix}wordsfinalhtml
else
cat $tmpdir/${prefix}threetables | awk -v keyword="$htmlkeyword" -v source="$source" 'BEGIN { 
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
    print "<tr><td class=pli-lang>" word "</td><td><a href=/s.php?s=\\b" word "\\b&d=" source " >" counttexts "</a></td><td>" countmatches "</td><td>" linksHTML "</td></tr>"
}' > $tmpdir/${prefix}wordsfinalhtml
#    print "<tr><td>" word "</td><td><a href=/s.php?s=" keyword "&f=" word ">" counttexts "</a></td><td>" countmatches "</td><td>" linksHTML "</td></tr>"
fi 
uniqwordqnty=$(cat $tmpdir/${prefix}wordcountTexts | wc -l)
textqnty=$(cat $tmpdir/${prefix}words | awk -F/ '{print $NF}'| awk -F_ '{print $1}' | sort -u | wc -l)
headerinfo="${keyword^} $textqnty texts $uniqwordqnty related words in $searchInForUser $searchlangForUser"

escapedKeyword=$(echo "$keyword" | sed 's/\\/\\\\/g')

if [[ "$@" == *"-oru"* ]]
then
quotesLinkToReplace="/s.php?s=${escapedKeyword}\&d=$source\&p=-oru"
else
quotesLinkToReplace="/s.php?s=${escapedKeyword}\&d=$source"
fi

#echo end set all=$LC_ALL lang=$LANG

cat $apachesitepath/new/templates/header | sed 's/$title/'"$headerinfo"'/g' > $output/${prefix}w.html

echo '<div class="args" style="display: none;" >'"$args"'</div>' >> $output/${prefix}w.html
echo '<div class="searchIn" style="display: none;" >'"$source"'</div>' >> $output/${prefix}w.html
echo '<div class="keyword" style="display: none;" >'"$keyword"'</div>' >> $output/${prefix}w.html
echo '<div class="searchlang" style="display: none;" >'"$searchlang"'</div>' >> $output/${prefix}w.html
cat $apachesitepath/new/templates/wordsheader | sed 's@quotesLinkToReplace@'"$quotesLinkToReplace"'@g' | sed 's/$title/'"$headerinfo"'/g' >> $output/${prefix}w.html
cat $tmpdir/${prefix}wordsfinalhtml >> $output/${prefix}w.html
echo " </tbody>
    </table>" >> $output/${prefix}w.html
    if [ -s "$tmpdir/${prefix}variantsReport" ]; then
echo " </div><div class='mt-3 ms-4 variants'><h3 id='variants' class='text-center my-3 '>Variants for ${keyword^}<div class='form-check-inline text-muted fs-4 input-group-append' data-bs-html='true'data-bs-toggle='tooltip' data-bs-placement='bottom' title='<strong>Variants</strong> with searched word<br><br>that are found across different editions of Pali Canon. <br><br>Abbreviation keys can be found in Edition Abbreviations section of <a href=/assets/texts/abbr.html>this page</a> or <a target=_blank href=https://suttacentral.net/abbreviations?lang=en>this</a>'> *</div></h3>" >> $output/${prefix}w.html
echo "<div class=pli-lang>" >> $output/${prefix}w.html
cat $tmpdir/${prefix}variantsReport | sed -E 's@'"$keyword"'@<b>&</b>@gI'>> $output/${prefix}w.html
#cat $tmpdir/${prefix}variantsReport >> $output/${prefix}w.html
fi
echo "</div>" >> $output/${prefix}w.html
echo "</div>" >> $output/${prefix}w.html
#cat $apachesitepath/assets/templates/WordsFooter.html >> $output/${prefix}w.html
cat $apachesitepath/new/templates/wordsfooter >> $output/${prefix}w.html
cat $output/${prefix}w.html

#cleanupTempFiles
exit 0

#replaced by getWordsForCounts
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn  | sed 's/<[^>]*>//g' | awk -F: '$2 > 0 {print $0}' | cleanupwords > $tmpdir/${prefix}words
cd -  > /dev/null
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -rioE "\w*$keyword[^ ]*" $searchIn  | sed 's/<[^>]*>//g' | awk -F: '$2 > 0 {print $0}' | cleanupwords >> $tmpdir/${prefix}words



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

