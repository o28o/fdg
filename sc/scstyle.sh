source ../config/script_config.sh --source-only
cd $apachesitepath/assets/texts/sutta
echo "fixing ellipsis"
for i in `find . -type f -name "*.json" `; do  
grep -l '\.\.\.' $i
sed -i 's@\.\.\.@…@g' $i       
sed -i 's@……@… …@g' $i
sed -i 's@  …@ …@g' $i
done

# json_pp -t null
#Hyphen joins words (station-master).
#En-dash indicates range usually of numbers (AN 3.43–7)
#Em-dash indicates a break in a sentence—like this.