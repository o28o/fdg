downloaddir=/media/c/Users/o28o/Downloads
trndir=/media/c/soft/fdg/assets/texts/sutta/

for file in `find "$downloaddir" -maxdepth 1 -type f -name "*translation*.json"`
do 
suttaname=$(echo $file | sed -E 's/_translation.*//' | awk -F'/' '{print $NF}')
booknumber=$(echo $suttaname | sed -E 's/\..*//')
nikaya=$(echo "$suttaname" | sed -E 's/[0-9]+.*//')

mv $file $trndir/$nikaya/$booknumber/
echo "$suttaname moved to ./$nikaya/$booknumber" 
done
