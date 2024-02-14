export LANG=en_US.UTF-8
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
            *an*) searchIn="$searchIn ./sutta/an" ;;
            *sn*) searchIn="$searchIn ./sutta/sn" ;;
            *mn*) searchIn="$searchIn ./sutta/mn" ;;
            *dn*) searchIn="$searchIn ./sutta/dn" ;;
            *kn*) searchIn="$searchIn ./sutta/kn/ud ./sutta/kn/iti ./sutta/kn/dhp ./sutta/kn/thig ./sutta/kn/thag" ;;
            *lt*) searchIn="$searchIn ./sutta/kn" ;;
            *vn*) searchIn="$searchIn ./vinaya/pli-tv-b*" ;;
            *kp*) searchIn="$searchIn ./vinaya/pli-tv-[kp].*" ;;
            *) echo "Unknown pair: $pair" ;;
        esac
        done
else
function cleanupSrc {
    pvlimit
  }
searchIn="./sutta/sn ./sutta/mn ./sutta/an ./sutta/dn"
fi
#echo $searchIn
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
xargs  grep -ci "$keyword" | sort -t':' -k2n | tail -n10
}

if [[ "$@" == *"-exc"* ]]
then
fortitle="${fortitle}"
excludepattern="`echo $@ | sed 's/.*-exc //g'`"
addtotitleifexclude=" exc. $excludepattern"
addtoresponseexclude=" $excluderesponse $excludepattern"
excfn="` echo -exc-${excludepattern} | sed 's/ /-/g' | sed 's@\\\@@g' `"
patternforexclude=$(echo "$@" | awk -F'-exc' '{ print $2}'  | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )

function excludeFiles { 
  #possible cases words, ids or files
  #usage
#grep -ril dukkh * | xargs  grep -ci dukkh | sort -t':' -k2n | tail -n10
xargs grep -vl "$patternforexclude" 
}
function excludeWords {
grep -iE -v "$excludepatterngrepv"
}
else
function excludeFiles {
pvlimit
}
function excludeWords {
pvlimit
}
fi

