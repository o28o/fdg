du -hs /var/www/html/result/ 
cd /var/www/html/result/
du -hs .history

find . -type f -mtime +60 -exec rm {} \;
ls -trha | head -n5

cat -n .history | grep moḷibaddh_suttanta
#sed -i '1,25994d' .history

du -hs /var/www/html/result/ 
du -hs .history
