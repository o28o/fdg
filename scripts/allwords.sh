#!/bin/bash -i

if [[ "`uname -a`" == *"rym.from.sh"* ]]; then
source=/home/a0092061/scripts/script_config.sh
elif [[ "`uname -a`" == *"CYGWIN"* ]]; then
source=/home/mobaxterm/Dhamma_scripts/script_config_moba.sh
elif [[ "`uname -a`" == *"Android"* ]]; then 
source=/storage/emulated/0/Dhamma/scripts/script_config-termux.sh
binbash='#!/data/data/com.termux/files/usr/bin/bash'
fi

source $source
#dir=sutta
function clearsed {
sed 's/<p>/\n/g; s/<[^>]*>//g'  | sed  's/": "/ /g' | sed  's/"//1' | sed 's/",$//g' | sed 's/{//g' | sed 's/}//g' 
}

cd $homedir
mkdir allwords

for dir in sutta vinaya abhidhamma
do
echo "working on $dir"

inputdir=$suttapath/sc-data/sc_bilara_data/root/pli/ms
inputdir=$inputdir/$dir

alltexts=$outputdiraw/texts_${dir}.txt
allwords=$outputdiraw/list_${dir}.txt
result1=$outputdiraw/top_${dir}.txt
result2=$outputdiraw/${dir}_words.txt

#prev clieanup
rm $alltexts $result1 $result2 $allwords >/dev/null 2>&1

find $inputdir -type f -name "*.json" |
 egrep -v "/xplayground/|/ab/|/bv/|/cnd/|/cp/|/ja/|/kp/|/mil/|/mnd/|/ne/|/pe/|/ps/|/pv/|/tha-ap/|/thi-ap/|/vv/|/thag/|/thig/|/snp/|/dhp/|/iti/|/ud/" | clearsed | sort > $alltexts
# 

for i in `cat $alltexts`; do  
cat $i | clearsed | awk '{print substr($0, index($0, $2))}' | tr ' ' '\n' | sed 's/Ā/ā/g' | sed 's/[—.";:?,’“”…]/ /g' | sed 's/[0-9]/ /g' | sed 's/[\(\)‘“]/ /g' | tr '[:upper:]' '[:lower:]' | sed 's/ //g' | grep -v "^$" >> $allwords

done 

cat $allwords | sort | uniq -c | sort -k1 -n > $result1
cat $allwords | sort | uniq | sort > $result2

done 
exit 0
