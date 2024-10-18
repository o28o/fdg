#!/bin/bash
if [[ `pwd` != *"/sc "* ]]; then
cd sc 2>/dev/null
fi

source ../config/script_config.sh --source-only
cd $apachesitepath/assets/texts/sutta

for i in `find $apachesitepath/assets/texts/sutta -type f -name "*.json" | xargs grep -El "(«|»)"`; do


sed -i 's/«/“/g' $i
sed -i 's/»/”/g' $i

done


for i in `find $apachesitepath/assets/texts/sutta -type f -name "*.json" | xargs grep -El "(\.\.\.|,[\.:;])"`; do


if grep -q '\.\.\.' $i
then
echo -n "fixing ellipsis in $i"
sed -i 's@\.\.\.@…@g' $i
sed -i 's@……@… …@g' $i
sed -i 's@  …@ …@g' $i
echo " done <br>"
fi

if grep -q '  ' $i
then
echo -n "fixing double spaces in $i"
sed -i 's@  @ @g' $i
sed -i 's@   @ @g' $i
sed -i 's@    @ @g' $i
echo " done <br>"
fi


if grep -q $'\r' $i
then
echo -n "fixing windows newlines in $i"
sed -i 's/\r//g' $i
echo " done <br>"
fi

if grep -qE ",[\.:;]" $i
then
echo -n "fixing doubled punctuation $i"
sed -i 's/,\([.,:;]\)/\1/g' $i
echo " done <br>"
fi

done
exit 

if grep -q '\\\t' $i
then
echo -n "fixing tabs in $i"
sed -i 's/\\t//g' $i
echo " done <br>"
fi


for i in `find . -type f -name "*.json" `; do
echo -n "fixing windows newlines in $i"
sed -i 's/\r//g' $i
echo " done <br>"
done



exit 0 


if grep -qE 'ни-прият.*ни-болез' $i
then
echo -n "fixing adhukkhamasukha in $i"
#fix adukkhamasukkha
sed -i '/ни-прият.*ни-болез/s/ни-приятн/ни-буфер/g' $file
sed -i '/ни-буфер.*ни-болез/s/ни-болезненн/ни-приятн/g' $file
sed -i '/ни-буфер.*ни-прият/s/ни-буфер/ни-болезненн/g' $file
echo " done <br>"
fi

#fix Учитель
grep -Ei («Учитель|, Учитель) | grep -vi "счастлив" 

#Hyphen joins words (station-master).
#En-dash indicates range usually of numbers (AN 3.43–7)
#Em-dash indicates a break in a sentence—like this.
#https://github.com/suttacentral/bilara-data/wiki/SuttaCentral-translation-style-guide#little-details[root@CentOS-Server sc]#

