#!/bin/bash
cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data
git pull | grep "translation/ru"
cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/


Pali="/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta"
Trn="/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/translation/ru"

function ShowDiff() {
cd $TrnDir
TrnFolders=$(find . -type d | sort -V)

for i in $TrnFolders ; do 
echo $i r=$(ls $PaliDir/$i | wc -l) t=$(ls $TrnDir/$i | wc -l)
#find $i -maxdepth 1 -type f | sort -V 
done
}

echo KN
PaliDir="$Pali/kn"
TrnDir="$Trn/narinyanievmenenko/sutta/kn"
ShowDiff

echo SN
# Задаем директории для перевода и палийских текстов
PaliDir="$Pali/sn"
TrnDir="$Trn/sv/sutta/sn"
ShowDiff

echo cp if have new sv files
read x
cp suttacentral.net/sc-data/sc_bilara_data/translation/ru/sv/sutta/sn/sn2/* assets/texts/sutta/sn/sn2/