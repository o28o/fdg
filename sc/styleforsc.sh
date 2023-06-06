
#!/bin/bash

if [[ `pwd` != *"/sc "* ]]; then
cd sc 2>/dev/null
fi


source ../config/script_config.sh --source-only
cd $apachesitepath/assets/texts/sutta
for i in `find $apachesitepath/assets/texts/sutta -type f -name "*.json" `; do
if grep -q '\.\.\.' $i
then
echo -n "fixing ellipsis in $i"
sed -i 's@\.\.\.@…@g' $i
sed -i 's@……@… …@g' $i
sed -i 's@  …@ …@g' $i
echo " done <br>"
fi


if grep -l $'\r' $i
then
echo -n "fixing windows newlines in $i"
sed -i 's/\r//g' $i
echo " done <br>"
fi

done
exit 

for i in `find . -type f -name "*.json" `; do
echo -n "fixing windows newlines in $i"
sed -i 's/\r//g' $i
echo " done <br>"
done


#Hyphen joins words (station-master).
#En-dash indicates range usually of numbers (AN 3.43–7)
#Em-dash indicates a break in a sentence—like this.
#https://github.com/suttacentral/bilara-data/wiki/SuttaCentral-translation-style-guide#little-details[root@CentOS-Server sc]#

