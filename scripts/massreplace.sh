outputfile=bolsn56.txt
cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/html_text/ru/pli/sutta/sn/sn56 

ls | sort -V | while read i ; do w3m -dump $i >> /storage/emulated/0/Download/$outputfile ; done  

cd /storage/emulated/0/Download

sed -i 's/страдание/боль/gI' $outputfile
sed -i 's/страданий/болей/gI' $outputfile
sed -i 's/страдания/боли/gI' $outputfile
sed -i 's/страдании/боли/gI' $outputfile
grep "страдан.* " $outputfile

sed -i 's/источник/проявление/gI' $outputfile
sed -i 's/о прекращении/об устранении/gI' $outputfile
sed -i 's/прекращени/устранени/gI' $outputfile

grep "прекращен.* " $outputfile


sed -i 's/путь, ведущий/практика, ведущая/gI' $outputfile
sed -i 's/пути, ведущем/практике, ведущей/gI' $outputfile
sed -i 's/пути, ведущего/практики, ведущей/gI' $outputfile

grep "пут.*ведущ.* " $outputfile

sed -i '/источник: Sam/Id' $outputfile
sed -i '/редакция перевода:/Id' $outputfile
sed -i '/Перевод с английского:/Id' $outputfile
sed -i '/Prepared for SuttaCentral/Id' $outputfile