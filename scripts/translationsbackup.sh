for i in `find /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/sutta  -type f | grep "\-o" `
do

echo $i
cp $i /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/backuptranslations
done
