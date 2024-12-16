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
