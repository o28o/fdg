source ../config/script_config.sh --source-only
cd $apachesitepath/assets/texts/sutta
for i in `find . -type f -name "*.json" `; do  
if grep -q '\.\.\.' $i
then
echo -n "fixing ellipsis in $i"
sed -i 's@\.\.\.@…@g' $i       
sed -i 's@……@… …@g' $i
sed -i 's@  …@ …@g' $i
echo "done<br>"
fi
done

# json_pp -t null
#Hyphen joins words (station-master).
#En-dash indicates range usually of numbers (AN 3.43–7)
#Em-dash indicates a break in a sentence—like this.