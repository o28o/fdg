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

for i in `find . -type f` ; do echo -n "`echo $i | sed 's@_root-pli-ms.json@@g'` `cat $i | wc -l`" ; echo ; done | sort -k2,2n -k1,1V
