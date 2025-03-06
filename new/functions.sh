#export LANG=en_US.UTF-8
#export LC_ALL=en_US
##############################
# ‘Why don’t I gather grass, 
# sticks, branches, and leaves 
# and make a raft? Riding on the raft
# and paddling with my hands and feet,
# I can safely reach the far shore.
########## sn35.238 ##########
#source ./config/script_config.sh --source-only
database="./db/fdg-db.db"
#separator="@"
sqlitecommand="sqlite3 -separator $separator"

rand=`echo $RANDOM | md5sum | head -c 5`
#prefix=tmp${rand}-

dirvar=$suttapath/sc-data/sc_bilara_data/variant/pli/ms
dirpli=$suttapath/sc-data/sc_bilara_data/root/pli/ms
direng=$suttapath/sc-data/sc_bilara_data/translation/en

function setSearchSite {
if [[ "$args" == *"-tbwbodhi"* ]]; then
#echo eng case
dirvar=/dev/null
dirpli=$apachesitepath/tbw/roottbw
direng=$apachesitepath/tbw/translation
translator=bodhi
elif [[ "$args" == *"-tbwsujato"* ]]; then
#echo eng case
dirvar=/dev/null
dirpli=$apachesitepath/tbw/roottbw
direng=$apachesitepath/tbw/translation
translator=bodhi
elif [[ "$args" == *"-thru"* ]]; then
dirvar=/dev/null
dirpli=$apachesitepath/tbw/roottbw
direng=$apachesitepath/tbw/translation
translator=sv
function ifHtmlFiles {
  awk -F@ '{OFS = "@"} {print $1, $2, $3, $2, $4}'
}

else
#sc line by line
dirvar=$suttapath/sc-data/sc_bilara_data/variant/pli/ms
dirpli=$suttapath/sc-data/sc_bilara_data/root/pli/ms
direng=$suttapath/sc-data/sc_bilara_data/translation/en
fi
}

function setSearchLanguage {
if [[ "$args" == *"-en"* ]]; then
#echo eng case
searchlang=en
mainpagebase="/"
mainpagebasehistory=""
searchlangForUser=English
langtwo=pi
#echo engFirst
initrun=LangFirst
steptwo=getPliFromLangFirst
langdir=$suttapath/sc-data/sc_bilara_data/translation/en/
cd $suttapath/sc-data/sc_bilara_data/translation/en/
elif [[ "$args" == *"-ru"* ]]; then
searchlang=ru
langtwo=pi
searchlangForUser=Russian
mainpagebase="/ru"
mainpagebasehistory=$mainpagebase
#echo rusFirst
initrun=RuLangFirst
steptwo=""
function ifHtmlFiles {
  awk -F@ '{OFS = "@"} {print $1, $2, $3, $2, $4}'
}
langdir=$suttapath/sc-data/html_text/ru/pli/
cd $suttapath/sc-data/html_text/ru/pli/

else
#echo pli case
searchlang=pi
if [[ "$args" == *"-oru"* ]]; then
langtwo=ru
mainpagebase="/ru"
mainpagebasehistory=$mainpagebase
else
langtwo=en
mainpagebase="/"
mainpagebasehistory=""
fi
searchlangForUser=Pali
#pali
langdir=$suttapath/sc-data/sc_bilara_data/root/pli/ms/
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/

initrun=varFirst
steptwo=getLangFromVarFirst
fi
}

function setSearchExtras {
  
  if [[ "$args" == *"-anyd"* ]]; then
initrun=anyDistance
    if [[ "$searchlang" == *"pi"* ]]; then
    steptwo=getLangFromVarFirst
    cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
langdir=$suttapath/sc-data/sc_bilara_data/root/pli/ms/
    fi
elif [[ "$args" == *"-def"* ]]; then
searchBuilderConfiguration=$apachesitepath/new/templates/footerDef
linesafter=0
elif [[ "$args" == *"-sml"* ]]; then
searchBuilderConfiguration=$apachesitepath/new/templates/footerSml
linesafter=1
else
searchBuilderConfiguration=$apachesitepath/new/templates/defaultSearchBuilder
fi

if [[ "$args" == *"-top"* ]] ; then
echo >/dev/null
else
echo >/dev/null
fi
}

function applyOutputLangToResponses {
if [[ "$args" == *"-oru"* ]]; then
function OKresponse {
  echo "`echo "$keyword" | sed 's/[[:lower:]]/\U&/'`${addtotitleifexclude} $textsqnty в $fortitle $language "
}

function NotFoundErr {
    echo "$keyword не найдено в $searchInForUser $searchlangForUser"
}

function Erresponse {
    echo "$keyword не найдено в $searchIn"
}
else
function NotFoundErr {
    echo "$keyword not in $searchInForUser $searchlangForUser"
}
fi 
}

function setSearchIn {
for folder in $@
do
[[ "$folder" == *"sutta"* ]] && translator="sujato"
[[ "$folder" == *"vinaya"* ]] && translator="brahmali"
searchInPli="$searchInPli $dirpli/$folder" 
searchInVar="$searchInVar $dirvar/$folder" 
searchInEng="$searchInEng $direng/$translator/$folder" 
done
}

function WhereToSearch {

#source="t=an,sn,mn,dn,kn,lt,vn,kp"
if [[ "$args" == *"-src"* ]]; then 
function cleanupSrc {
   awk -F"-src" '{ print $2}' | awk '{$1=""} { print $0}' | sed 's/^ *//g'
  }

source=$(echo "$args" | awk -F'-src' '{ print $2}' | awk '{ print $1}' )

searchIn=""
searchInPli="" 
searchInVar="" 
searchInEng="" 
for i in $(echo $source | sed 's/,/ /g')
do
case "$i" in
            *an*) searchIn="$searchIn ./sutta/an" 
            searchInForUser="$searchInForUser an" 
            translator="sujato"
            setSearchIn sutta/an
           ;;
            *sn*) searchIn="$searchIn ./sutta/sn" 
            searchInForUser="$searchInForUser sn"
            translator="sujato"
            setSearchIn sutta/sn            
            ;;
            *mn*) searchIn="$searchIn ./sutta/mn"
            searchInForUser="$searchInForUser mn"
            translator="sujato"
            setSearchIn sutta/mn            
            ;;
            *dn*) searchIn="$searchIn ./sutta/dn" 
            searchInForUser="$searchInForUser dn"
            translator="sujato"
            setSearchIn sutta/dn            
            ;;
            *kn*) searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp" 
            searchInForUser="$searchInForUser kn"
            translator="sujato"
            setSearchIn sutta/kn/ud sutta/kn/iti sutta/kn/dhp sutta/kn/thig sutta/kn/thag sutta/kn/snp            
            ;;
            *lt*) searchIn="$searchIn ./sutta/kn/bv ./sutta/kn/cnd ./sutta/kn/cp ./sutta/kn/ja ./sutta/kn/kp ./sutta/kn/mil ./sutta/kn/mnd ./sutta/kn/ne ./sutta/kn/pe ./sutta/kn/ps ./sutta/kn/pv  ./sutta/kn/tha-ap ./sutta/kn/thi-ap ./sutta/kn/vv" 
            searchInForUser="$searchInForUser later"
            translator="sujato"
            setSearchIn sutta/kn/bv sutta/kn/cnd sutta/kn/cp sutta/kn/ja sutta/kn/kp sutta/kn/mil sutta/kn/mnd sutta/kn/ne sutta/kn/pe sutta/kn/ps sutta/kn/pv sutta/kn/tha-ap sutta/kn/thi-ap sutta/kn/vv            
            ;;
            *vn*) searchIn="$searchIn ./vinaya/pli-tv-b*" 
            searchInForUser="$searchInForUser vinaya"
            translator="brahmali"
            setSearchIn vinaya/pli-tv-b*            
            ;;
            *kp*) searchIn="$searchIn ./vinaya/pli-tv-[kp].*" 
            searchInForUser="$searchInForUser kd prv"
            translator="brahmali"
            setSearchIn vinaya/pli-tv-kd vinaya/pli-tv-prv       
            ;;
            *) echo "Unknown" ;;
        esac
        done
else
function cleanupSrc {
    pvlimit
  }
searchIn="./sutta/an ./sutta/sn ./sutta/mn ./sutta/dn"
searchInForUser="Four Nikayas"
#searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp" 
#searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp vinaya/pli-tv-b*" 
#searchInForUser="$searchInForUser +KN"
#searchInForUser="$searchInForUser +KN +Vinaya"
setSearchIn sutta/an sutta/sn sutta/mn sutta/dn sutta/kn/ud sutta/kn/iti sutta/kn/dhp sutta/kn/thig sutta/kn/thag sutta/kn/snp vinaya/pli-tv-b*
#source="an,sn,mn,dn,kn,vn"
source="an,sn,mn,dn"
fi
#echo $searchIn
}

function keywordForLinks {
  echo 1
#echo if keyword has | but no  () add them for proper highlighting
}

function clearargs {
cleanupSrc | sed -e 's/-src //g' -e 's/-pi //g' -e 's/-ru //g' -e 's/-en //g' -e 's/-abhi //g' -e 's/-vin //g' -e 's/-th //g' -e 's/-si //g' -e 's/^ //g' -e 's/-kn //g' -e 's/-all //g' -e 's/-tru //g' -e 's/-conv //g' | sed 's/-oru //g' | sed 's/-ogr //g' | sed 's/-oge //g'| sed 's/-nbg-.* //g' | sed 's/ -exc.*//g' | sed 's/-l[ab][0-9]* //g' | sed 's/-defall //g' | sed 's/-def //g' | sed 's/-sml //g' |  sed 's/-b //g' | sed 's/-onl //g' | sed 's/-anyd //g' |  sed 's/-top[0-9]* //g' | sed 's/-nm10 //g' 
}

function topFiles { 
  ##### replace by custom sorting of datatable
    #usage for filelists
#grep -ril dukkh * | xargs  grep -ci dukkh | sort -t':' -k2n | tail -n10
 if [[ "$@" == *"-top"* ]] ; then
numbersmatches=`echo "$@" | sed 's@.*-nm@@' | awk '{print $1}'` 
#history=/dev/null
else
numbersmatches=
fi
xargs grep -ci "$keyword" | sort -t':' -k2n | tail -n10  > $tmpdir/${prefix}inittoplist
#do the word grep here cat  "$tmpdir/${prefix}inittoplist" 
cat "$tmpdir/${prefix}inittoplist" | xargs grep -Ei "$keywordforgreping" > $tmpdir/${prefix}initrun-$searchlang
}

function ifHtmlFiles {
  pvlimit
}

function anyDistance {
 # keyword="\bsaddhā vicikicch"
keywordforfindingfiles=$(echo $keyword | sed 's@|@ @g' |sed 's@^(@@g' | sed 's@)$@@g' )
keywordforgreping=$(echo $keywordforfindingfiles | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )

#echo "$keywordforfindingfiles" | tr ' ' '\n'  | awk 'BEGIN { ORS = "" } { if (NR == 1) { print "grep -rliE \"" $1 "\" '"$searchIn"' " } else if (NR == n) { print "| xargs grep -iE \"" $1 "\"" } else { print "| xargs grep -iEl \"" $1 "\"" }}' n=$(echo "$keywordforfindingfiles" | wc -w) "$searchIn"

#old $keywordforgreping
echo "$keywordforfindingfiles" | tr ' ' '\n'  | awk 'BEGIN { ORS = "" } { if (NR == 1) {
  print "grep -rliE \"" $1 "\" '"$searchIn"' " 
}
  else {
  print "| xargs grep -iEl \"" $1 "\""
}}' > $tmpdir/${prefix}cmndForAnydistance
bash $tmpdir/${prefix}cmndForAnydistance > $tmpdir/${prefix}initfilelist

checkForInitSearch $tmpdir/${prefix}initfilelist

cat "$tmpdir/${prefix}initfilelist" | xargs grep -EHi "$keywordforgreping" > $tmpdir/${prefix}initrun-$searchlang

if [[ "$searchlang" == *"pi"* ]]; then
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
initialCmnd $tmpdir/${prefix}initrun-pi var 
fi


}

function setLinesBeforeAndAfter {

if [[ "$args" == *"-lb"* ]]; then
linesbefore=`echo "$args" | sed 's@.*-lb@@' | awk '{print $1}'` 
else 
linesbefore=0
fi 

if [[ "$args" == *"-la"* ]]; then
linesafter=`echo "$args" | sed 's@.*-la@@' | awk '{print $1}'` 
else
linesafter=0
fi
}

function initialGrep {
  #use with "file" flag for output file and no flag for word/id mode list 
[[ "$1" == *"file"* ]] && grepArg="l"
grep -B${linesbefore} -A${linesafter} -riE$grepArg "$keyword" $searchIn 2>/dev/null | grep -v "^--$"  | grep '": "' | sed 's/json-/json:/g' | sed 's/html-/html:/g' | sed 's/htm-/htm:/g' | cleanuphtml  | sort -V | uniq
}

function initialCmnd {
#file to process to function $1 source file e.g initfile eng var pli $2 dest filr e.g. pli 
if [ -s "$1" ]; then
cat "$1" | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$3"' \n@' > $tmpdir/${prefix}cmndFor-$2
bash $tmpdir/${prefix}cmndFor-$2 2>/dev/null | cleanuphtml  > $tmpdir/${prefix}initrun-$2
fi
}

function grepForWords {
  
  if [[ "$args" == *"-anyd"* ]]; then 
  cd $langdir
cat "$tmpdir/${prefix}initfilelist" | xargs grep -ioHE "\w*${keywordforgreping}[^ ]*" | awk -F: '$2 > 0 {print $0}' | cleanupwords

else   
  grep -rioE "\w*$keyword[^ ]*" $searchIn 2>/dev/null | cleanuphtml  | awk -F: '$2 > 0 {print $0}' | cleanupwords
 fi  
  
}

function RuLangFirst {
cd $suttapath/sc-data/html_text/ru/pli/
grep -riE -B${linesbefore} -A${linesafter} "$keyword" $searchIn | cleanuphtml  | sed 's@/ему/@ему@g' | grep -v "^--$" | sort -V | uniq > $tmpdir/${prefix}initrun-ru
#cd - > /dev/null

checkForInitSearch $tmpdir/${prefix}initrun-ru

}

function linklist {
if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
cat $templatefolder/Header2.html $templatefolder/ResultTableHeader2.html | sed 's/$title/TitletoReplace/g' | sed 's@HOMEVAR@'$mainpagebase'@' | tohtml 
else
cat $templatefolder/Header2.html $templatefolder/ResultTableHeader2.html | sed 's/$title/TitletoReplace/g' |sed '/forshellscript/d'  | sed 's@HOMEVAR@'$mainpagebase'@' | tohtml 

fi 

#keyword="$keyword"
pattern="$keyword"
    
cd $output > /dev/null
#Samaṇasukhasutta An Ascetic’s Happiness an5.128 var

#if ru
sed -i 's/.html/":1"/g'  $tmpdir/${prefix}$basefile
sed -i 's/":/@/g'  $tmpdir/${prefix}$basefile

sed -i -e 's@.*sutta/kn@khudakka\@/@g' -e 's@.*sutta/@dhamma\@/@g' -e 's@.*vinaya/@vinaya\@/@g' $tmpdir/${prefix}$basefile
sed -i -e 's@.*/sutta/kn@khudakka\@/@g' -e 's@.*/sutta/@dhamma\@/@g' -e 's@.*/vinaya/@vinaya\@/@g' $tmpdir/${prefix}$basefile
   
cat $tmpdir/${prefix}$basefile | cleanuphtml | sed 's/@ *"/@/g' | sed 's/",$//g' | sed 's/ "$//g' | sed 's@/.*/@@g'| awk -F@ '{OFS = "@"} {print $1, $2, $3, $2, $4}' | sort -t'@' -k2V,2 -k4V,4 -k2n,3 | uniq > $tmpdir/${prefix}readyforawk


# |  для доп колонки |  awk -F/ '{print $NF}' | sed 's@\@/.*/@\@@g' |
########## count keywords in texts

cd $suttapath/$pali_or_lang
grep -rioE "\w*$keyword[^ ]*" $searchIn | cleanuphtml  | awk -F: '$2 > 0 {print $0}' > $tmpdir/${prefix}words



cat $tmpdir/${prefix}words   | awk -F/ '{print $NF}' | awk -F: '{print $1}' | sort -V | uniq -c | sed 's/.html//g'| awk 'BEGIN { OFS = "@" }{ print $2,$2,$1}' > $tmpdir/${prefix}counts

cat $tmpdir/${prefix}words | cleanupwords | awk -F/ '{print $NF}' | sed 's/.html:/ /g'| awk '{print $1, $2}' | sort -V | uniq | awk '{
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
}' | sort -V > $tmpdir/${prefix}wordsAggregatedByTexts

cd $output > /dev/null
########## end count keywords in texts

#rm $tmpdir/${prefix}afterawk  
bash $apachesitepath/new/awknewfdg.sh $tmpdir/${prefix}readyforawk "$keyword" > $tmpdir/${prefix}afterawk  

counts_file="$tmpdir/${prefix}counts" 
afterawk_file="$tmpdir/${prefix}afterawk"
aggregated_file="$tmpdir/${prefix}wordsAggregatedByTexts"
wordsAggregatedByTexts=$(wc -l < "$aggregated_file")
counts=$(wc -l < "$counts_file")
afterawk=$(wc -l < "$afterawk_file")

if [ "$counts" -eq "$afterawk" ] && [ "$afterawk" -eq "$wordsAggregatedByTexts" ]; then
   # echo "Все три переменные равны $counts"
   echo
else
    echo "$counts в файле $counts_file не равно количеству строк 
    $afterawk в файле $afterawk_file и 
    $wordsAggregatedByTexts в $aggregated_file"
   paste -d"@" $tmpdir/${prefix}counts $tmpdir/${prefix}afterawk $tmpdir/${prefix}wordsAggregatedByTexts | awk -F@ '{OFS == "@"} BEGIN {print "counts after wordsAggr" } {OFS == "\t"} {print $1,$6, $9}' > $tmpdir/${prefix}fordebug
  #  cd result
  #  exit 0
fi

paste -d"@" $tmpdir/${prefix}counts $tmpdir/${prefix}afterawk $tmpdir/${prefix}wordsAggregatedByTexts > $tmpdir/${prefix}finalraw
bash $apachesitepath/new/awk-step2fornew.sh $tmpdir/${prefix}finalraw "$keyword" > $tmpdir/${prefix}finalhtml

headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/${prefix}counts)"
wordLinkToReplace="/w.php?s=$keyword"
WORDREPLACELINK="$wordLinkToReplace"

#cat $apachesitepath/new/templates/resultheader | sed 's/$title/'"$headerinfo"'/g' | sed 's@$wordLinkToReplace@'"$wordLinkToReplace"'@g' 
#cat $apachesitepath/new/templates/footer | sed 's@WORDREPLACELINK@'"$wordLinkToReplace"'@g'

#echo -e "Content-Type: text/html\n\n"
#echo $@



headerinfo="${keyword^} $(awk -F@ '{ sum += $3 }; END { print NR " texts and "  sum " matches" }' $tmpdir/${prefix}counts)"
matchqnty=`awk -F@ '{sum+=$3;} END{print sum;}' $tmpdir/${prefix}counts`

}

function LangFirst {
if [[ "$searchIn" == *"sutta"* ]] 
then 
translator="sujato"
cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
initialGrep > $tmpdir/${prefix}initrun-en
fi 

if [[ "$searchIn" == *"vinaya"* ]] 
then 
translator="brahmali"
cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
initialGrep >> $tmpdir/${prefix}initrun-en
fi 

checkForInitSearch $tmpdir/${prefix}initrun-en
}

function checkForInitSearch {
    if [ "$#" -eq 1 ]; then
        if [ ! -s "$1" ]; then
            NotFoundErr
            #cd $apachesitepath > /dev/null
            #bash new/fdgnew.sh `echo $@ | sed -e 's/-en//g'`
            exit 1
        fi
    elif [ "$#" -eq 2 ]; then
        if [ ! -s "$1" ] && [ ! -s "$2" ]; then
            NotFoundErr
            #cd $apachesitepath > /dev/null
            #bash new/fdgnew.sh -en "$@"
            exit 1
        fi
    fi
}

function getPliFromLangFirst {
 # initialCmnd $tmpdir/${prefix}initrun-en pi 
  cat $tmpdir/${prefix}initrun-en | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)" '"$searchIn"' \n@' > $tmpdir/${prefix}cmndFor-pi
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
bash $tmpdir/${prefix}cmndFor-pi | cleanuphtml > $tmpdir/${prefix}initrun-pi

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
bash $tmpdir/${prefix}cmndFor-pi | cleanuphtml  > $tmpdir/${prefix}initrun-var
cd $apachesitepath/assets/texts/variant/
bash $tmpdir/${prefix}cmndFor-pi | cleanuphtml  >> $tmpdir/${prefix}initrun-var
#grep -riE "$pattern" $searchIn | sed 's/{//g' | sed 's/}//g' | sed 's/<[^>]*>//g' >> $tmpdir/${prefix}initrun-var
}

function varFirst {

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
initialGrep > $tmpdir/${prefix}initrun-var
cd $apachesitepath/assets/texts/variant/
initialGrep >> $tmpdir/${prefix}initrun-var

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/

if [ -s "$tmpdir/${prefix}initrun-var" ]; then
cat $tmpdir/${prefix}initrun-var | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/${prefix}cmndFor-pi
bash $tmpdir/${prefix}cmndFor-pi | cleanuphtml > $tmpdir/${prefix}initrun-pi
fi
initialGrep >> $tmpdir/${prefix}initrun-pi

checkForInitSearch $tmpdir/${prefix}initrun-var $tmpdir/${prefix}initrun-pi

}

function pliFirst {

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
initialGrep > $tmpdir/${prefix}initrun-pi

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
initialGrep > $tmpdir/${prefix}initrun-var
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
initialGrep >> $tmpdir/${prefix}initrun-var

if [ -s "$tmpdir/${prefix}initrun-var" ]; then
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
cat $tmpdir/${prefix}initrun-var | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/${prefix}cmndFor-pi
bash $tmpdir/${prefix}cmndFor-pi | cleanuphtml >> $tmpdir/${prefix}initrun-pi
fi

checkForInitSearch $tmpdir/${prefix}initrun-var $tmpdir/${prefix}initrun-pi

}

function getLangFromVarFirst {
   # initialCmnd $tmpdir/${prefix}initrun-pi en
  cat $tmpdir/${prefix}initrun-pi | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)" '"$searchIn"' \n@' > $tmpdir/${prefix}cmndFor-en

if [[ "$searchIn" == *"sutta"* ]] 
then 
translator="sujato"
cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
bash $tmpdir/${prefix}cmndFor-en > $tmpdir/${prefix}initrun-en
fi 

if [[ "$searchIn" == *"vinaya"* ]] 
then 
translator="brahmali"
cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
bash $tmpdir/${prefix}cmndFor-en >> $tmpdir/${prefix}initrun-en
fi 
}

function getWordsForCounts {
delimiterForAwk="_"
if [[ "$searchlang" == *"pi"* ]]; then
cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grepForWords > $tmpdir/${prefix}words

cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grepForWords >> $tmpdir/${prefix}words
cd $apachesitepath/assets/texts/variant/
grepForWords >> $tmpdir/${prefix}words

elif  [[ "$searchlang" == *"en"* ]]; then
if [[ "$searchIn" == *"sutta"* ]] 
then 
translator="sujato"
cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
grepForWords > $tmpdir/${prefix}words
fi 

if [[ "$searchIn" == *"vinaya"* ]] 
then 
translator="brahmali"
cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
grepForWords >> $tmpdir/${prefix}words
fi
elif  [[ "$searchlang" == *"ru"* ]]; then
delimiterForAwk=":"
cd $suttapath/sc-data/html_text/ru/pli/
grepForWords > $tmpdir/${prefix}words
fi 
cd $apachesitepath >/dev/null
}

function cleanuphtml {
sed 's/<[^>]*>//g'  | sed 's@<em>@@g'  | sed 's@</em>@@g' | sed 's@<b>@@g' | sed 's@</b>@@g' | sed 's@</j>@@g' | sed 's@<j>@@g' 
}

function cleanupwords {
sed 's/[[:punct:]]*$//' | sed 's/…$//'| awk '{print tolower($0)}' | sed  -e 's/[[:punct:]]*$//' | cleanuphtml  
}
#-e 's/”ti$/’ti/g' -e 's/”’ti$/’ti/g'
function cleanupTempFiles {
  #fdgnew
rm $tmpdir/${prefix}initrun* 2>/dev/null
rm $tmpdir/${prefix}afterawk 2>/dev/null
rm $tmpdir/${prefix}cmnd* 2>/dev/null
rm $tmpdir/${prefix}counts 2>/dev/null
rm $tmpdir/${prefix}finalhtml 2>/dev/null
rm $tmpdir/${prefix}finalraw 2>/dev/null
rm $tmpdir/${prefix}readyforawk 2>/dev/null
rm $tmpdir/${prefix}words 2>/dev/null
rm $tmpdir/${prefix}wordsAggregatedByTexts 2>/dev/null
rm $output/${prefix}r.html 2>/dev/null

#words
rm $tmpdir/${prefix}threetables 2>/dev/null
rm $tmpdir/${prefix}counts 2>/dev/null
rm $tmpdir/${prefix}finalhtml 2>/dev/null
rm $tmpdir/${prefix}uniqwords 2>/dev/null
rm $output/${prefix}w.html 2>/dev/null
rm $tmpdir/${prefix}wordcountMatches 2>/dev/null
rm $tmpdir/${prefix}wordcountTexts 2>/dev/null
rm $tmpdir/${prefix}words 2>/dev/null
rm $tmpdir/${prefix}wordsWithAggregatedTexts 2>/dev/null
rm $tmpdir/${prefix}wordsfinalhtml 2>/dev/null
rm $tmpdir/${prefix}variantsReport 2>/dev/null

}

function getSimiles {
  tmpsml=$tmpdir/${prefix}tmpsml.$rand
  modkeyword="`echo $keyword | sed -E 's/([aiīoā]|aṁ)$//g'`"
keyword="$modkeyword"

linesafter=1
nonmetaphorkeys="condition|adhivacanasamphass|adhivacanapath|\banopam|\battūpa|\bnillopa|opamaññ"
if [[ "$@" == *"-vin"* ]]
  then
  vin=dummy
vinsmlpart="${modkeyword}.{0,3}—|${modkeyword}.{0,3}ti|${modkeyword}.*nāma|"
fi  

smlkeyword="${vinsmlpart}seyyathāpi.*${modkeyword}|${modkeyword}.*adhivacan|${modkeyword}.*(ūpam|upam|opam|opamm)|(ūpam|upam|opam|opamm).*${modkeyword}|Suppose.*${modkeyword}|${modkeyword} is|${modkeyword}.*is a designation for|is a designation for.*${modkeyword}|${modkeyword}.*Simile|simile.*${modkeyword}|It’s like.*${modkeyword}|is a term for.*${modkeyword}|${modkeyword}.*is a term for|similar to.*${modkeyword}|${modkeyword}.*similar to|Представ.*${modkeyword}|обозначение.*${modkeyword}|${modkeyword}.*обозначение${customtexts}" 

#cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grep -Eir "$smlkeyword" $searchIn | grep -viE "$nonmetaphorkeys" | grep -vi "condition" > $tmpdir/${prefix}initrun-pi

grep -B2 -ERi "Eva[mnṇṅṃṁ].*${modkeyword}" $searchIn | grep -A1 -i Seyyathāpi | sed 's@json-@json:@g' | sed '/--/d' >> $tmpdir/${prefix}initrun-pi

if [ -s "$tmpdir/${prefix}initrun-pi" ]; then
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
cat $tmpdir/${prefix}initrun-pi | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/${prefix}cmndFromPi
cd $apachesitepath/assets/texts/variant/
cat $tmpdir/${prefix}initrun-pi | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' >> $tmpdir/${prefix}cmndFromPi
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
bash $tmpdir/${prefix}cmndFromPi | cleanuphtml > $tmpdir/${prefix}initrun-var
fi

}

function getDefinitions {
fileprefix=${fileprefix}-definition
fortitle="Definition ${fortitle}"

modpattern="`echo $keyword | sed -E 's/([aiīoā]|aṁ)$//g'`"
pattern="$modpattern" 
#vin=dummy ${modpattern}.*nāma|
linesafter=3
patternForHighlight="`echo $keyword | sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}\.\*//g'| sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}.[0-9]{1,3}\.\*//g' | sed 's/.\*/|/g' |  sed 's@^@(@g' | sed 's/$/)/g' | sed 's@\\.@|@g' | sed 's@ @|@g' | sed 's@,@@g'`"

tmpdef=$tmpdir/${prefix}tmpdef.$rand

vin="./vinaya/pli-tv-b*"
searchIn="$vin"
  vin=dummy
vindefpart="${modpattern}.{0,3}—|${modpattern}.{0,3}ti|${modpattern}.*nāma|"
linesafter=1
function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} -B${linesbefore} -A${linesafter} "$keyword" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,pli-tv-kd,pli-tv-pvr,thag,thig,dhp} > $tmpdef

nice -$nicevalue grep -Ei -B${linesbefore} -A${linesafter} "${vindefpart}\bKata.{0,20} \b${modpattern}.{0,5}\?|\bKatha.{0,20} \b${modpattern}.{0,5}\?|${modpattern}.{0,15}, ${modpattern}.{0,25} vucca|${modpattern}.{0,25} vucca|Kiñ.*${modpattern}.{0,9} va|${modpattern}.*ariyassa vinaye|ariyassa vinaye.*${modpattern}" $tmpdef
}
}

#make it getdefall
function getbasefile {

if [[ "$keyword" == *"ṅ"* ]]; then
initialNorM="ṅ"
elif [[ "$keyword" == *"ṃ"* ]];  then
initialNorM="ṃ"
fi
  
if [[ "$keyword" != *"["* ]] &&  [[ "$keyword" != *"]"* ]];  then
pattern=`echo $keyword | sed 's/е/[ёе]/g' | sed 's/[ṅṃ]/[ṅṁṃ]/g'`
fi

if [[ "$@" == *"-onl"* ]]
then
 if [[ $keyword == *"("* ]] && [[ $keyword == *")"* ]] 
 then
 pattern=`echo $keyword | sed 's@ @|@g'`
 else
 pattern=`echo $keyword | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' `
 fi
fi

checkifalreadydone
echo grepbase > new_time_output.txt
{ time grepbasefile | grep -v "^--$" | grepexclude | sort -Vf ;} 2>> new_time_output.txt > $basefile
cp $basefile bfc
#echo path is $suttapath/$pali_or_lang and searchin is $searchIn
#echo grep -riE -B${linesbefore} -A${linesafter} "$keyword" $searchIn


#grepbasefile | grep -v "^--$" | grepexclude | clearsed | sort -Vf > $basefile

if [[ "$@" == *"-nm"* ]] 
then
topmatchesintexts=`cat $basefile | awk '{print $1}' | uniq -c | LC_ALL=C sort -r | head -n$numbersmatches | awk '{print $2}'`
for i in $topmatchesintexts
do
grep $i $basefile
done > tmp
cp tmp $basefile
fi


if [[ "$@" == *"-defall"* ]] 
then
mintexts=1000
else 
mintexts=1
fi
#echo $mintexts
texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`

if [[ "$@" == *"-def"* ]] && (( $texts <= $mintexts )) && [[ "$@" != *"-vin"* ]]
then 
#echo mintxt=$mintexts txt=$texts
#echo "$tmpdef bf $texts"
grepbasefileExtended1 | grep -v "^--$" | grepexclude | clearsed | sort -Vf >> $basefile
texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
#echo "$tmpdef bf+1 $texts"
fi

if [[ "$@" == *"-def"* ]] && (( $texts <= $mintexts )) && [[ "$@" != *"-vin"* ]]
then 
grepbasefileExtended2 | grep -v "^--$" | grepexclude | clearsed | sort -Vf >> $basefile

texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
#echo "bf+12 $texts"
fi

texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
if [[ "$@" == *"-def"* ]] && (( $texts <= $mintexts )) && [[ "$@" != *"-vin"* ]]
then 
nice -$nicevalue grep -E -A1 -Eir "${modpattern}.{0,50}saṅkhaṁ gacchati" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,pli-tv-kd,pli-tv-pvr} | grep -E -B1 Evamev | grep -v "^--$" >> $basefile

texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
#echo "bf+12sk $texts"
fi

textlist=`nice -$nicevalue cat $basefile | pvlimit | awk -F':' '{print $1}' | awk -F'/' '{print $NF}' |  awk -F'_' '{print $1}' | sort -Vf | uniq`
totaltexts=` echo $textlist | wc -w`
linescount=$(wc -l < "$basefile")

if (( linescount == 0 )); then
pattern="`echo $keyword | sed 's/\[ёе\]/е/g'`"
	Erresponse

	#Clarification
     rm $basefile
     exit 1
elif [ $linescount -ge $maxmatchesbg ] && [[ "$@" != *"-nbg"* ]];  then 
bgswitch
exit 3
#	echo "$@" | sed 's/-oru //g' | sed 's/-oge //g' | sed 's/-ogr //g'   | sed 's/-nbg //g' >> ../input/input.txt     
fi

}

function excludeWords {
  
searchBuilderConfiguration=$apachesitepath/new/templates/footerExclude
WordToExclude1=test  
  
if [[ "$args" == *"-exc"* ]]
then
fortitle="${fortitle}"
excludekeyword="`echo $args | sed 's/.*-exc //g'`"
addtotitleifexclude=" exc. $excludekeyword"
addtoresponseexclude=" $excluderesponse $excludekeyword"
excfn="` echo -exc-${excludekeyword} | sed 's/ /-/g' | sed 's@\\\@@g' `"

if [[ $(echo "$excludekeyword" | wc -w) -eq 1 ]]; then
    keywordforexclude="$excludekeyword"
   # echo 1 word in exclude 
else
    keywordforexclude=$(echo "$args" | awk -F'-exc' '{ print $2}'  | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )
   # echo 2 or more words in exclude
fi

function initialGrep {
#[[ "$1" == *"file"* ]] && grepArg="l"
grep -B${linesbefore} -A${linesafter} -riE$grepArg "$keyword" $searchIn 2>/dev/null | grep -v "^--$"  | grep '": "'| sed 's/json-/json:/g' | sed 's/html-/html:/g' | sed 's/htm-/htm:/g' | grep -B${linesbefore} -A${linesafter} -viE$grepArg "$keywordforexclude" | grep -v "^--$" | sed 's/json-/json:/g' | sed 's/html-/html:/g' | sed 's/htm-/htm:/g' | cleanuphtml
#grep -B${linesbefore} -A${linesafter} -rviE$grepArg "$keyword" $searchIn 2>/dev/null | grep -v "^--$" | grep -iE "$keyword" | sed 's/<[^>]*>//g'
}

function grepForWords {
  grep -rioE "\w*$keyword[^ ]*" $searchIn 2>/dev/null | grep -viE "$keywordforexclude" | grep -v "^--$" | sed 's/json-/json:/g' | sed 's/html-/html:/g' | sed 's/htm-/htm:/g' | cleanuphtml | awk -F: '$2 > 0 {print $0}' | cleanupwords
}
fi
}

function updateHistory {
filesize=`ls -lh $output/$table | awk '{print \$5}'`



dateforhist=`date +%d-%m-%Y`
echo -n "<!-- begin $keyword --> 
<tr><td><a class=\"outlink\" href=\"./result/${table}\">${keyword}</a></td><td><label class='star-checkbox'><input type='checkbox' data-index=\"${table}\"/><i class='fa-regular fa-star'></i></label></td><td>$textsqnty</td><td>$matchqnty</td><td><a class=\"outlink\" href=\"/w.php?s=${escapedKeyword}&d=$source\">$uniqwords</a></td><td>$searchlangForUser/$langtwo</td><td>$searchInForUser</td><td class=\"daterow\">$dateforhist</td><td>$filesize</td><td>" >> $history
}


#########

function WhereToSearchAllinOne {


#source="t=an,sn,mn,dn,kn,lt,vn,kp"
if [[ "$args" == *"-src"* ]]; then 
function cleanupSrc {
   awk -F"-src" '{ print $2}' | awk '{$1=""} { print $0}' | sed 's/^ *//g'
  }

source=$(echo "$args" | awk -F'-src' '{ print $2}' | awk '{ print $1}' )


searchIn=""
for i in $(echo $source | sed 's/,/ /g')
do
case "$i" in
            *an*) 
            #searchIn="$searchIn ./sutta/an" 
            searchInForUser="$searchInForUser an"
            translator="sujato"
            setSearchIn sutta/an
           # searchIn="$searchIn $dirpli/sutta/an $dirvat/sutta/an $direng/$translator/sutta/an" 
           ;;
            *sn*) 
            searchInForUser="$searchInForUser sn"
            translator="sujato"
            #searchIn="$searchIn $dirpli/sutta/sn $dirvat/sutta/sn $direng/$translator/sutta/sn" 
            #searchIn="$searchIn ./sutta/sn" 
            setSearchIn sutta/sn
            ;;
            *mn*)              
            searchInForUser="$searchInForUser mn"
            translator="sujato"
           # searchIn="$searchIn $dirpli/sutta/mn $dirvat/sutta/mn $direng/$translator/sutta/mn" 
         #   searchIn="$searchIn ./sutta/mn"
            setSearchIn sutta/mn
            ;;
            *dn*) 
            searchInForUser="$searchInForUser dn"
            translator="sujato"
           # searchIn="$searchIn $dirpli/sutta/dn $dirvat/sutta/dn $direng/$translator/sutta/dn"             
        #    searchIn="$searchIn ./sutta/dn" 
            setSearchIn sutta/dn
            ;;
            *kn*) 
         #   searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp" 
            searchInForUser="$searchInForUser kn"
            translator="sujato"
            #searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp"
            setSearchIn sutta/kn/ud sutta/kn/iti sutta/kn/dhp sutta/kn/thig sutta/kn/thag sutta/kn/snp
            ;;
            *lt*) 
            searchInForUser="$searchInForUser later"
            translator="sujato"
            #searchIn="$searchIn $dirpli/sutta/kn $dirvat/sutta/kn $direng/$translator/sutta/kn" 
       #  searchIn="$searchIn ./sutta/kn/bv ./sutta/kn/cnd ./sutta/kn/cp ./sutta/kn/ja ./sutta/kn/kp ./sutta/kn/mil ./sutta/kn/mnd ./sutta/kn/ne ./sutta/kn/pe ./sutta/kn/ps ./sutta/kn/pv  ./sutta/kn/tha-ap ./sutta/kn/thi-ap ./sutta/kn/vv" 
           setSearchIn sutta/kn/bv sutta/kn/cnd sutta/kn/cp sutta/kn/ja sutta/kn/kp sutta/kn/mil sutta/kn/mnd sutta/kn/ne sutta/kn/pe sutta/kn/ps sutta/kn/pv sutta/kn/tha-ap sutta/kn/thi-ap sutta/kn/vv
            ;;
            *vn*) 
            #searchIn="$searchIn ./vinaya/pli-tv-b*" 
            searchInForUser="$searchInForUser vinaya"
            translator="brahmali"
            #searchIn="$searchIn $dirpli/vinaya/pli-tv-b* $dirvat/vinaya/pli-tv-b* $direng/$translator/vinaya/pli-tv-b*" 
            setSearchIn vinaya/pli-tv-b*
            ;;
            *kp*)
           # searchIn="$searchIn ./vinaya/pli-tv-[kp].*" 
            searchInForUser="$searchInForUser kd prv"
            translator="brahmali"
           #searchIn="$searchIn $dirpli/vinaya/pli-tv-[kp].* $dirvat/vinaya/pli-tv-[kp].* $direng/$translator/vinaya/pli-tv-[kp].*"  
            setSearchIn vinaya/pli-tv-kd vinaya/pli-tv-prv
            ;;
            *) echo "Unknown" ;;
        esac
        done
else
function cleanupSrc {
    pvlimit
  }
#searchIn="./sutta/an ./sutta/sn ./sutta/mn ./sutta/dn"
searchInForUser="Four Nikayas"
#searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp" 
#searchInForUser="$searchInForUser +KN"
source="an,sn,mn,dn,kn"
translator="sujato"
setSearchIn sutta/an sutta/sn sutta/mn sutta/dn

fi
#echo $searchIn
}