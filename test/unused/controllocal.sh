exit 0

cp -parv /storage/emulated/0/Dhamma/fdg/scripts/finddhamma.sh /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/
cp -parv /storage/emulated/0/Dhamma/fdg/index.php /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/
cp -parv /storage/emulated/0/Dhamma/fdg/ru/index.php /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/ru/

cp -parv /storage/emulated/0/Dhamma/fdg/scripts/* /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/
cp -parv /storage/emulated/0/Dhamma/fdg/*.php /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/



rm -rf /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/*
cp -parv /storage/emulated/0/Dhamma/fdg/* /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/
cp -parv /storage/emulated/0/Dhamma/theravada.ru /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/theravada.ru  

cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/ru
rm assets sc scripts
ln -s ../assets ./assets 
ln -s ../sc ./sc
ln -s ../scripts ./scripts
ln -s ../o ./o
ln -s ../result ./result


cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/
cd /$PREFIX/share/apache2/default-site/htdocs/


bash /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/finddhamma.sh "pād.*siras.*vand"







sed -i 's@href="/assets@href="/assets@g' *      
sed -i 's@href="/assets@href="/assets@g' *
sed -i 's@href="/assets@href="/assets@g' *.php 
sed -i 's@src="/assets@src="/assets@g' *.php
sed -i 's@src="/assets@src="/assets@g' *   
sed -i 's@src="/assets@src="/assets@g' *
sed -i 's@https://find.dhamma.gift@http://localhost:8080@g' * 
sed -i 's@https://find.dhamma.gift@http://localhost:8080@g' * 
sed -i 's@https://find.dhamma.gift@http://localhost:8080@g' *


sed -i 's@"/ru@"/ru@g' *





/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/sn56.11_root-pli-ms.json