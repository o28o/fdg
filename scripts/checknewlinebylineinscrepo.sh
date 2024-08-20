#!/bin/bash
cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data
git pull | grep "translation/ru"
cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/


Pali="/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta"
Trn="/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/sutta"
TrnNew="/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/translation/ru"

function ShowDiff() {
cd $TrnDir
TrnFolders=$(find . -type d | sort -V)
#echo $TrnFolders
cd $TrnNewDir
TrnFolders=$(printf "%s\n%s" "$TrnFolders" "$(find . -type d)" | sort -u -V)
#echo $TrnFolders

for i in $TrnFolders ; do 
root=$(ls $PaliDir/$i | wc -l) 
asset=$(ls $TrnDir/$i 2>/dev/null | wc -l ) 
new=$(ls $TrnNewDir/$i 2>/dev/null | wc -l)

echo "$i $(awk "BEGIN {printf \"%.0f\", ($asset/$root)*100}")% r=$root a=$asset n=$new $(if [ "$new" -gt "$asset" ]; then echo 'Updated!'; cp $TrnNewDir/$i/* $TrnDir/$i/ ; fi)"

#$(if [ "$root" -eq "$asset" ]; then echo '100% done'; fi)"
#find $i -maxdepth 1 -type f | sort -V 
done
}

echo KN
PaliDir="$Pali/kn"
TrnDir="$Trn/kn"
TrnNewDir="$TrnNew/narinyanievmenenko/sutta/kn"
ShowDiff

echo SN
# Задаем директории для перевода и палийских текстов
PaliDir="$Pali/sn"
TrnDir="$Trn/sn"
TrnNewDir="$TrnNew/sv/sutta/sn"
ShowDiff

echo any key to run latest-rus.php or ctrl-c to cancel
#cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/sc
#php ./latest-rus.php
#echo cp if have new sv files
#read x
#cp suttacentral.net/sc-data/sc_bilara_data/translation/ru/sv/sutta/sn/sn2/* assets/texts/sutta/sn/sn2/