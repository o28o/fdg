#!/bin/bash

source ./config/script_config.sh --source-only

assetdir=$apachesitepath/assets/templates
suttapath=../suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta
suttapath=../suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta
translationpath=$apachesitepath//suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta
translationpath=$apachesitepath//suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta
cd $suttapath


index=0
grep -ri vaggasaṁyutta sn* | awk '{print $2, $3}' | sed 's/\..*: "/ /g' | sed 's/"sn//g' | while read line 
do array[$index]="$line" 
index=$(($index+1))
done  
cat $assetdir/Header.html
cat $assetdir/SNTableHeader.html

  
grep -ri vaggasaṁyutta sn* | awk '{print $2, $3}' | sed 's/\..*: "/ /g' | sort -V  | sed 's/"sn//g'  | while read -r samyuttavagga
do
prevlast=$lastsamyuttainsv 
lastsamyuttainsv=`echo $samyuttavagga | awk '{print $1}'`
samyuttavagganame=`echo $samyuttavagga | awk '{print $2}'`
samyuttavagganumber=1
firstsamyuttainsv=$(( $prevlast + 1 ))
let "index+=1"
#echo "<br>"
#echo "<h2>$samyuttavagganame $((  $lastsamyuttainsv - $firstsamyuttainsv + 1  )) $vagganumber $suttaname</h2>"
#SN
grep -r "saṁyuttaṁ " ./sn* | grep -v "(Y" |sort -V  | awk '{print $2,$3}' | sed 's/\.[0-9]*-/\./g' | sed 's/"//g' | sed 's/:.*://g' | sed 's/ ,//g' | sed 's/\. / /g'  | sed 's/\./ /g'| while read -r samyuttainfo
do 

samyuttanumber=`echo $samyuttainfo | awk '{print $1}' | sed 's/sn//g'`
totalsuttasinsamyutta=`echo $samyuttainfo | awk '{print $2}'`
samyuttaname=`echo $samyuttainfo | awk '{print $3}'`

if (( $samyuttanumber >= $firstsamyuttainsv )) && (( $samyuttanumber <= $lastsamyuttainsv ))
then 

#echo "<h3>sn${samyuttanumber} $samyuttaname $totalsuttasinsamyutta</h3><br>"

for file in `find ./sn/sn$samyuttanumber -type f | sort -V ` 
do  


#echo "<h3>${vagganumber} $vagganame</h3><br>"


grep ":0.[23]\":" $file | xargs | awk '{print $1, $2, $3, $6}' | sed 's/:0.2://g' | while read -r info
do 
suttanumber=`echo $info | awk '{print $1}'`
vagganumber=`echo $info | awk '{print $2}'| sed 's/\.//g'`
vagganame=`echo $info | awk '{print $3}'`
suttaname=`echo $info | awk '{print $4}'`

echo  "  
<tr>
<td>
$samyuttavagganumber</td>
<td>
$samyuttavagganame</td>
<td>
sn$samyuttanumber</td>
<td>
$samyuttaname</td>
<td>
$vagganumber</td>
<td>
$vagganame</td>
<td>
$suttaname</td>
<td>
<a href=\"/ru/sc/?q=${suttanumber}\">$suttanumber </a></td>
<td>
$totalsuttasinsamyutta</td>
</tr> "




done #sutta loop

done #vagga loop
#echo TOTAL samyuttaname=$samyuttaname suttas=$totalsuttasinsamyutta 
fi

done #general loop

done #sv loop

cat $assetdir/Footer.html
exit 0


egrep -r "saṁyuttaṁ |The Linked Discourses " ./sn* | sort -V
./sn/sn1/sn1.81_translation-en-sujato.json:  "sn1.81:5.5": "The Linked Discourses on Deities are complete. "
./sn/sn2/sn2.30_translation-en-sujato.json:  "sn2.30:18.5": "The Linked Discourses on Gods are complete. "
./sn/sn3/sn3.25_translation-en-sujato.json:  "sn3.25:11.5": "The Linked Discourses with the Kosalan are completed. "
./sn/sn4/sn4.25_translation-en-sujato.json:  "sn4.25:26.5": "The Linked Discourses with Māra are complete. "
>>>>>>> 31c47bc3328fd35c017c39e03bf995db21e3b6fc


n=0
svArray=()
grep -ri vaggasaṁyutta sn* | awk '{print $2, $3}' | sed 's/\..*: "/ /g' | sed 's/"sn//g' | while read -r samyuttavagga
do
lastsamyuttainsv=`echo $samyuttavagga | awk '{print $1}'`
samyuttavagganame=`echo $samyuttavagga | awk '{print $2}'`
echo $lastsamyuttainsv $samyuttavagganame
svArray[$n]="${lastsamyuttainsv} ${samyuttavagganame}"
svArray+=(${lastsamyuttainsv} ${samyuttavagganame})
let "n+=1"
done
echo ${svArray[@]}

# Iterate the loop to read and print each array element

