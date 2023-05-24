sctranslation=/drives/c/soft/suttacentral/bilara-data/translation/en/sujato/sutta/sn
translationroot=/drives/c/soft/fdg/assets/texts/
thrulocation=/drives/c/soft/fdg/theravada.ru/Teaching/Canon/Suttanta/Texts
roottextlocation=/home/mobaxterm/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/
cd $sctranslation
for i in `find . -name "sn22*.json"`; do  
linecount=`cat $i | wc -l`
samyutta=`echo $i | awk -F'/' '{print $2}'`
scsuttanumber=`echo $i | awk -F'_' '{print $1}'  | awk -F'/' '{print $NF}' `
suttanumberonly=`echo $scsuttanumber | sed 's/[a-z]*//gi' `
thrusuttanumber=`echo $i | awk -F'_' '{print $1}'  | awk -F'/' '{print $NF}' | sed 's@\.@_@g'`
destfilename=${scsuttanumber}_translation-ru-sv.json
trnfile=$translationroot/sutta/sn/$samyutta/$destfilename
echo $i $trnfile

if [[ $linecount -le 25 ]] && [ ! -f $trnfile ]
then 
echo file do not exist
echo 
grep -i ":0" $roottextlocation/sutta/sn/$samyutta/${scsuttanumber}_root-pli-ms.json
echo
echo                                      
thrufilename=`ls $thrulocation/${thrusuttanumber}-*`
echo 
echo keep the json format and do not modify indexes \"$scsuttanumber:\" etc
cat $i 
echo 
echo replace English text with russian text provided  below. if there is line [Благословенный] - remove it. replace СН $suttanumberonly with Связанные Наставления. Do not change or add new json indexes 
echo
w3m -dump $thrufilename | cat 2>&1 | sed '1,12d' | grep -v "(Буддизм|Учение Старцев|Тхеравада.ру|◄|٭|₪) | sed 's/^[0-9]//g'"
mkdir $translationroot/sutta/sn/$samyutta 2>/dev/null 
cp $i $trnfile
read

fi
done

