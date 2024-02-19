#export LANG=en_US.UTF-8
#export LC_ALL=en_US
##############################
# ‘Why don’t I gather grass, 
# sticks, branches, and leaves 
# and make a raft? Riding on the raft
# and paddling with my hands and feet,
# I can safely reach the far shore.
########## sn35.238 ##########
source ./config/script_config.sh --source-only

function WhereToSearch {

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
            *an*) searchIn="$searchIn ./sutta/an" 
           searchInForUser="$searchInForUser an" ;;
            *sn*) searchIn="$searchIn ./sutta/sn" 
            searchInForUser="$searchInForUser sn"
            ;;
            *mn*) searchIn="$searchIn ./sutta/mn"
            searchInForUser="$searchInForUser mn"
            ;;
            *dn*) searchIn="$searchIn ./sutta/dn" 
            searchInForUser="$searchInForUser dn"
            ;;
            *kn*) searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp" 
            searchInForUser="$searchInForUser kn"
            ;;
            *lt*) searchIn="$searchIn ./sutta/kn/bv ./sutta/kn/cnd ./sutta/kn/cp ./sutta/kn/ja ./sutta/kn/kp ./sutta/kn/mil ./sutta/kn/mnd ./sutta/kn/ne ./sutta/kn/pe ./sutta/kn/ps ./sutta/kn/pv  ./sutta/kn/tha-ap ./sutta/kn/thi-ap ./sutta/kn/vv" 
            searchInForUser="$searchInForUser later"
            ;;
            *vn*) searchIn="$searchIn ./vinaya/pli-tv-b*" 
            searchInForUser="$searchInForUser vinaya"
            ;;
            *kp*) searchIn="$searchIn ./vinaya/pli-tv-[kp].*" 
            searchInForUser="$searchInForUser kd prv"
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
searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag ./sutta/kn/snp" 
searchInForUser="$searchInForUser +KN"
source="an,sn,mn,dn,kn"
fi
#echo $searchIn
}

function keywordForLinks {
  echo 1
#echo if keyword has | but no  () add them for proper highlighting
}

function clearargs {
cleanupSrc | sed -e 's/-src //g' -e 's/-pi //g' -e 's/-ru //g' -e 's/-en //g' -e 's/-abhi //g' -e 's/-vin //g' -e 's/-th //g' -e 's/-si //g' -e 's/^ //g' -e 's/-kn //g' -e 's/-all //g' -e 's/-tru //g' -e 's/-conv //g' | sed 's/-oru //g' | sed 's/-ogr //g' | sed 's/-oge //g'| sed 's/-nbg-.* //g' | sed 's/ -exc.*//g' | sed 's/-l[ab][0-9]* //g' | sed 's/-defall //g' | sed 's/-def //g' | sed 's/-sml //g' |  sed 's/-b //g' | sed 's/-onl //g' | sed 's/-top[0-9]* //g' | sed 's/-nm10 //g' 
}

function topFiles { 
    #usage for filelists
#grep -ril dukkh * | xargs  grep -ci dukkh | sort -t':' -k2n | tail -n10
 if [[ "$@" == *"-top"* ]] ; then
numbersmatches=`echo "$@" | sed 's@.*-nm@@' | awk '{print $1}'` 
#history=/dev/null
else
numbersmatches=
fi
xargs grep -ci "$keyword" | sort -t':' -k2n | tail -n10  > $tmpdir/inittoplist
#do the word grep here cat  "$tmpdir/inittoplist" 
}

function anyDistance {
 # keyword="\bsaddhā vicikicch"
keywordforfindingfiles=$(echo $keyword | sed 's@|@ @g' |sed 's@^(@@g' | sed 's@)$@@g' )
keywordforgreping=$(echo $keywordforfindingfiles | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )

echo "$keywordforfindingfiles" | tr ' ' '\n'  | awk 'BEGIN { ORS = "" } { if (NR == 1) {
  print "grep -rlE \"" $1 "\" '"$searchIn"' " 
}
  else {
  print "| xargs grep -l \"" $1 "\""
}}' > $tmpdir/cmndForAnydistance
bash $tmpdir/cmndForAnydistance > $tmpdir/initfilelist

cat "$tmpdir/initfilelist" | xargs grep -Ei "$keywordforgreping" > $tmpdir/initrun-pi
}

function initialGrep {
  #use with "file" flag for output file and no flag for word/id mode list 
[[ "$1" == *"file"* ]] && grepArg="l"
grep -riE$grepArg "$keyword" $searchIn | sed 's/<[^>]*>//g'
}

function initialCmnd {
#file to process to function
cat "$1" | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/cmndFor-$2
bash $tmpdir/cmndFor-$2 | sed 's/<[^>]*>//g' > $tmpdir/initrun-$2
}

if [[ "$@" == *"-exc"* ]]
then
fortitle="${fortitle}"
excludekeyword="`echo $@ | sed 's/.*-exc //g'`"
addtotitleifexclude=" exc. $excludekeyword"
addtoresponseexclude=" $excluderesponse $excludekeyword"
excfn="` echo -exc-${excludekeyword} | sed 's/ /-/g' | sed 's@\\\@@g' `"
keywordforexclude=$(echo "$@" | awk -F'-exc' '{ print $2}'  | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )

function initialGrep {
[[ "$1" == *"file"* ]] && grepArg="l"
grep -rviE$grepArg "$keywordforexclude" $searchIn | grep -iE "$keyword" | sed 's/<[^>]*>//g'
}
fi

function varFirst {
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
initialGrep > $tmpdir/initrun-var

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/

if [ -s "$tmpdir/initrun-var" ]; then
cat $tmpdir/initrun-var | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/cmndFromVar
bash $tmpdir/cmndFromVar | sed 's/<[^>]*>//g' > $tmpdir/initrun-pi
fi
initialGrep >> $tmpdir/initrun-pi

if [ ! -s "$tmpdir/initrun-var" ] && [ ! -s "$tmpdir/initrun-pi" ]; then
    echo "$keyword не найдено в $searchIn"
    exit 1
fi

cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator
cat $tmpdir/initrun-pi | awk '{ print $2 }' | sort -V  | uniq | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)" '"$searchIn"' \n@' > $tmpdir/cmndFromPi
bash $tmpdir/cmndFromPi > $tmpdir/initrun-en
}

function cleanupwords {
sed 's/[[:punct:]]*$//' | awk '{print tolower($0)}' | sed -e 's/”ti$/’ti/g' -e 's/”’ti$/’ti/g' -e 's/[[:punct:]]*$//' | sed 's/<[^>]*>//g'    
}

function cleanupTempFiles {
  #fdgnew
rm $tmpdir/initrun* 2>/dev/null
rm $tmpdir/afterawk 2>/dev/null
rm $tmpdir/cmnd* 2>/dev/null
rm $tmpdir/counts 2>/dev/null
rm $tmpdir/finalhtml 2>/dev/null
rm $tmpdir/finalraw 2>/dev/null
rm $tmpdir/readyforawk 2>/dev/null
rm $tmpdir/words 2>/dev/null
rm $tmpdir/wordsAggregatedByTexts 2>/dev/null
#words
rm $tmpdir/counts 2>/dev/null
rm $tmpdir/finalhtml 2>/dev/null
rm $tmpdir/uniqwords 2>/dev/null
rm $output/w.html 2>/dev/null
rm $tmpdir/wordcountMatches 2>/dev/null
rm $tmpdir/wordcountTexts 2>/dev/null
rm $tmpdir/words 2>/dev/null
rm $tmpdir/wordsWithAggregatedTexts 2>/dev/null
rm $tmpdir/wordsfinalhtml 2>/dev/null
}

function getSimiles {
  tmpsml=$tmpdir/tmpsml.$rand
  modkeyword="`echo $keyword | sed -E 's/([aiīoā]|aṁ)$//g'`"
keyword="$modkeyword"

linesafter=1
nonmetaphorkeys="condition|adhivacanasamphass|adhivacanapath|\banopam|\battūpa|\bnillopa|opamaññ"
if [[ "$@" == *"-vin"* ]]
  then
  vin=dummy
#vinsmlpart="${modkeyword}.{0,3}—|${modkeyword}.{0,3}ti|${modkeyword}.*nāma|"
fi  

smlkeyword="${vinsmlpart}seyyathāpi.*${modkeyword}|${modkeyword}.*adhivacan|${modkeyword}.*(ūpam|upam|opam|opamm)|(ūpam|upam|opam|opamm).*${modkeyword}|Suppose.*${modkeyword}|${modkeyword} is|${modkeyword}.*is a designation for|is a designation for.*${modkeyword}|${modkeyword}.*Simile|simile.*${modkeyword}|It’s like.*${modkeyword}|is a term for.*${modkeyword}|${modkeyword}.*is a term for|similar to.*${modkeyword}|${modkeyword}.*similar to|Представ.*${modkeyword}|обозначение.*${modkeyword}|${modkeyword}.*обозначение${customtexts}" 

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/
grep -Eir "$smlkeyword" $searchIn | grep -viE "$nonmetaphorkeys" | grep -vi "condition" > $tmpdir/initrun-pi

grep -B2 -ERi "Eva[mnṇṅṃṁ].*${modkeyword}" $searchIn | grep -A1 -i Seyyathāpi | sed 's@json-@json:@g' | sed '/--/d' >> $tmpdir/initrun-pi

if [ -s "$tmpdir/initrun-pi" ]; then
cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
cat $tmpdir/initrun-pi | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/cmndFromPi
bash $tmpdir/cmndFromPi | sed 's/<[^>]*>//g' > $tmpdir/initrun-var
fi

}

