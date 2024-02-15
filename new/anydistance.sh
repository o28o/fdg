



if [[ "$@" == *"-anyd"* ]]
then
 
keyword="\bsaddhā vicikicch"
keywordforfindingfiles=$(echo $keyword | sed 's@|@ @g' |sed 's@^(@@g' | sed 's@)$@@g' )
keywordforgreping=$(echo $keywordforfindingfiles | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )

echo "$keywordforfindingfiles" | tr ' ' '\n'  | awk 'BEGIN { ORS = "" } { if (NR == 1) {
  print "grep -rlE \"" $1 "\" '"$searchIn"' " 
}
  else {
  print "| xargs grep -l \"" $1 "\""
}}' > $tmpdir/cmndForAnydistance
bash $tmpdir/cmndForAnydistance > $tmpdir/initfilelist

cat  "$tmpdir/initfilelist" | xargs grep -Ei "$keywordforgreping" > $tmpdir/initrun-pi


cd $suttapath/sc-data/sc_bilara_data/variant/pli/ms/
grep -riE "$keyword" $searchIn | sed 's/<[^>]*>//g' > $tmpdir/initrun-var

cd $suttapath/sc-data/sc_bilara_data/root/pli/ms/

if [ -s "$tmpdir/initrun-var" ]; then
cat $tmpdir/initrun-var | awk '{ print $2 }' | sed 's@\"@\\"@g' | awk 'BEGIN {OFS=""; printf "grep -Eir \"("} { printf $1"|"}' |  sed '$ s@|$@)"  '"$searchIn"' \n@' > $tmpdir/cmnd1
bash $tmpdir/cmnd1 > $tmpdir/initrun-pi
fi
grep -riE "$keyword" $searchIn >> $tmpdir/initrun-pi

if [ ! -s "$tmpdir/initrun-var" ] && [ ! -s "$tmpdir/initrun-pi" ]; then
    echo "$keyword не найдено в $searchIn"
    exit 1
fi

cd $suttapath/sc-data/sc_bilara_data/translation/en/$translator