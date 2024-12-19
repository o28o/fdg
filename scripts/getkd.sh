
#srcfolder=/home/mobaxterm/MyDocuments/soft/sc-data-main/sc-data-main/sc_bilara_data/root/pli/ms/vinaya/pli-tv-kd/
basedir=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/

srcfolder=$basedir/root/pli/ms/vinaya/pli-tv-kd/
trnfiolder=$basedir/translation/en/brahmali/vinaya/pli-tv-kd/


function clearSearch() {
sed 's/.*.json://g' | sed 's/:.*": "/ /g'| sed 's/ ",//g' | sed 's/"pli-tv-//g'
}

separator=';'

cat tst | grep -v "^$" | while read word; 
do  
echo -n $word 
echo -n "$separator"

grep -riE "${word}" $srcfolder/* | while read paliline
	do  
	id=$( echo $paliline | awk '{print $2}')
	echo -n "$paliline" | clearSearch 
echo -n "$separator"
grep -i "$id" $trnfiolder/* | while read engline
do	
cleanedEngLine=$( echo "$engline" | clearSearch )

case "$cleanedEngLine" in
    *[0-9]\.*) 
#echo "Строка содержит цифры с точкой."
topic=$(echo "$cleanedEngLine" | sed 's/.*[0-9]*\. //' | awk '{ $1 = tolower($1); print }')
section_number=$(echo "$cleanedEngLine"  | awk '{print $2}' | sed 's/\.//')
khandakha=$(echo "$cleanedEngLine" | awk '{print $1}'| sed 's/kd//g')
result="${topic} - section #${section_number} of the khandakha #${khandakha}"
#echo topic $topic
#echo section_number $section_number
#echo khandakha $khandakha
#echo result $result
echo -n "$result"
echo -n "$separator"
        ;;
    *)
#echo "Строка не содержит цифры с точкой."
echo "$cleanedEngLine"  | awk '{for (i=2; i<=NF; i++) printf $i (i<NF ? OFS : "\n")}'
        ;;
esac

done
echo
done 
echo 
done 

exit 0

echo "animittāparikathā
vippakathā
siveyyakadussayugakathā
samattiṃsavirecanakathā
varayācanākathā
kambalānujānanādikathā
paṃsukūlapariyesanakathā
cīvarapaṭiggāhakasammutikathā
bhaṇḍāgārasammutiādikathā
cīvararajanakathā
daṇḍakathālakanti
atirekacīvarakathā
pacchimavikappanupagacīvarādikathā
saṅghikacīvaruppādakathā
gilānavatthukathā
matasantakakathā
naggiyapaṭikkhepakathā
kusacīrādipaṭikkhepakathā
sabbanīlakādipaṭikkhepakathā
anuppannacīvarakathā
cīvaruppādakathā
duggahitasuggahitādikathā
vaggādikammakathā
ñattivipannakammādikathā
catuvaggakaraṇādikathā
pārivāsikādikathā
dvenissāraṇādikathā
adhammakammādikathā
upālipucchākathā
tajjanīyakammakathā
niyassakammakathā
pabbājanīyakammakathā
paṭisāraṇīyakammakathā
ukkhepanīyakammakathā
tajjanīyakammapaṭippassaddhikathā
niyassakammapaṭippassaddhikathā
pabbājanīyakammapaṭippassaddhikathā
paṭisāraṇīyakammapaṭippassaddhikathā
ukkhepanīyakammapaṭippassaddhikathā
tajjanīyakammavivādakathā
niyassakammavivādakathā
pabbājanīyakammavivādakathā
paṭisāraṇīyakammavivādakathā
ukkhepanīyakammavivādakathā
kosambakavivādakathā
bālakaloṇakagamanakathā
pācīnavaṃsadāyagamanakathā
pācinavaṃsadāyagamanakathā
pālileyyakagamanakathā
aṭṭhārasavatthukathā
saṅghasāmaggīkathā" 


#from phone
exit 0

cat tst | while read line ; do 
echo $line ; 


grep -i $line /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/vinaya/pli-tv-kd/* | while read pali ; do 
id=$( echo $pali | awk '{print $2}' )

grep -i $id  /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/translation/en/brahmali/vinaya/pli-tv-kd/* | while read eng ; do 
content=$( echo $eng | awk '{for (i=3; i<=NF; i++) printf $i (i<NF ? OFS : "\n")}' ) 
echo $content
done 
done
done
