suttaroot=/drives/c/soft/suttacentral.net/bilara-data
sctranslation=$suttaroot/translation/en/sujato/sutta/sn
#sctranslation=/drives/c/soft/suttacentral/bilara-data/root/pli/ms/sutta/sn
translationroot=/drives/c/soft/fdg/assets/texts/

thrulocation=/drives/c/soft/fdg/theravada.ru/Teaching/Canon/Suttanta/Texts
string=$@
string="an10.46"
thrusuttanumber=`echo $string | sed 's@\.@_@g'`
thrufilename=`ls $thrulocation/${thrusuttanumber}-*`
nikaya=${string//[^[:alpha:]]/}/
book=${string%%.*}

path=${nikaya}${book}/

destfilename=${string}_translation-ru
trnfile=$translationroot/sutta/sn/$samyutta/$destfilename


path="an"

echo "$path"
roottextlocation=`find $suttaroot/root/pli/ms/sutta/$path -name "${string}_root-pli-ms.json"`
translation=`find $suttaroot/translation/en/sujato/sutta/$path -name "${string}_*"`


#grep -i ":0" $roottextlocation
echo замени в json файле текст пали 
echo
cat $roottextlocation
echo 
echo на русский перевод ниже. обязательно сохрани индексы
echo 
w3m -dump $thrufilename | cat 2>&1 | sed '1,12d' | grep -v "(Буддизм|Учение Старцев|Тхеравада.ру|◄|٭|₪) | sed 's/^[0-9]//g'"

