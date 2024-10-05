
if [[ "$@" == "" ]]  || [[ "$@" == "-o" ]] 
then
snrange=$(eval echo an{1..11})
nikaya=an
elif [[ "$@" == *"sn" ]]  
then
snrange=$(eval echo sn{1..56})
nikaya=sn
else
snrange=$(echo $@ |  sed 's/[[:space:]]*-o[[:space:]]*//g' )
nikaya=$(echo "$snrange" | sed 's/[0-9]//g; s/[[:space:]]*-o[[:space:]]*//g')

#nikaya=$(echo $snrange | sed 's/[0-9]//g' | sed 's/\s-o\s//g' )
fi

if [[ "$@" = *"-o"* ]]; then
    sortMe="-k1,1V -k2,2n"  # по текстовому индексу
else
    sortMe="-k2,2n -k1,1V"  # по строкам
fi

for sanyutta in $snrange
do

#делаем список переводов
find ./assets/texts/sutta/$nikaya/$sanyutta/ -type f | sed 's@_.*@_@g' | awk -F'/' '{print $NF}' | uniq > trnList

cat ./assets/texts/allRootTextWithLineCount | grep -E "$sanyutta\." | grep -v -f trnList  > missing

#echo $sanyutta `wc -l missing | awk '{print $2, $1}'`
cat missing | sed 's/_//g' | awk '{print $2, $1}' | sort -n | awk '{print $2, $1}' | tac | head -n1 > ./assets/texts/miss_longest
if [[ "$@" = *"-o"* ]]; then
	cat missing | sed 's/_//g' | tac # по текстовому индексу
else
	cat missing | sed 's/_//g' | awk '{print $2, $1}' | sort -n | awk '{print $2, $1}' | tac
fi

echo $sanyutta `wc -l missing | awk '{print $2, $1}'`

rm missing trnList
done 

exit 0

if [[ "$@" == "" ]]
then
snrange=$(eval echo sn{1..56})
nikaya=sn
else
snrange=$@
nikaya=$(echo $snrange | sed 's/[0-9]//g')
fi

for sanyutta in $snrange
do
echo $sanyutta
for i in `find  ../suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/$nikaya/$sanyutta/  -type f | awk -F'/' '{print $NF}' | sed 's/_.*//g' | sort -V | uniq ` ; do
ls assets/texts/sutta/$nikaya/$sanyutta/${i}_* 2>&1 | grep "ls:" | awk -F'/' '{print $NF}' | sed 's/_.*/ missing/g' | tee out
done  | sort -V > total_missing
cat total_missing
wc -l total_missing
done 

rm total_missing
exit 0 




for i in `find  ../suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/$nikaya/$sanyutta/  -type f | sort -V | uniq` ; do 
echo -n "`echo $i | sed 's@_root-pli-ms.json@@g' | awk -F'/' '{print $NF}'` `cat $i | wc -l`" 
echo  
done | sort  -k2,2n -k1,1V
