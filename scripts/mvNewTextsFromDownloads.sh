source ./config/script_config.sh --source-only

#downloaddir=/media/c/Users/o28o/Downloads
#trndir=/media/c/soft/fdg/assets/texts/sutta/



cd $downloaddir
for file in `find .  -maxdepth 1 -type f -name "*root-pli-ms.json"`
do

newname=$(echo $file | sed 's@root-pli-ms@translation-ru-o@g')
echo renamed $file $newname
mv $file $newname
done

cd -  2>&1 >/dev/null


for file in `find "$downloaddir" -maxdepth 1 -type f -name "*translation*.json"`
do 
suttaname=$(echo $file | sed -E 's/_translation.*//' | awk -F'/' '{print $NF}')

if [[ $suttaname =~ snp|iti|thig|thag|ud ]]; then
    nikaya=kn/$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
booknumber=vagga$(echo $suttaname | sed -E 's/\..*//' | sed 's/[a-z]*//g')
else
booknumber=$(echo $suttaname | sed -E 's/\..*//')
    nikaya=$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
fi

mv $file $trndir/$nikaya/$booknumber/
echo "moved $suttaname to ./$nikaya/$booknumber" 
done
