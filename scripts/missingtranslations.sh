
if [[ "$@" == "" ]]  || [[ "$@" == "-n" ]] 
then
snrange=$(eval echo sn{1..56})
nikaya=sn
else
snrange=$@
nikaya=$(echo $snrange | sed 's/[0-9]//g' | sed 's/\s-n\s//g' )
fi

if [[ "$@" = *"-n"* ]]; then
    sortMe="-k2,2n -k1,1V"  # по строкам
else
    sortMe="-k1,1V -k2,2n"  # по текстовому индексу
fi

for sanyutta in $snrange
do
echo $sanyutta
#делаем список переводов
find assets/texts/sutta/$nikaya/$sanyutta/ -type f | sed 's@_.*@_@g' | awk -F'/' '{print $NF}' | sort -V | uniq > trnList

cat allRootTextWithLineCount | grep -E "$sanyutta\." | grep -v -f trnList  > missing
cat missing | sort $sortMe
wc -l missing

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
