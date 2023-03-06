#install Termux
#open it 
#then run: 
# apt install git
# mkdir -p $PREFIX/share/apache2/default-site/htdocs
# cd $PREFIX/share/apache2/default-site/htdocs
# git clone https://github.com/o28o/fdg.git ./
# bash ./scripts/install.sh

#PREFIX=/data/data/com.termux/files/usr/
httpdconf=$PREFIX/etc/apache2/httpd.conf
httpdtdir=$PREFIX/share/apache2/default-site/htdocs

echo "installing php-apache apache2 zip pv wget git iconv w3m"
apt install php-apache apache2 zip pv wget git iconv w3m

while true; do
    read -p "Are you going to perform searches in Thai? Y or N" yn
    case $yn in
        [Yy]* ) 
   echo "installing python3.9 and aksharamukha. For searches in Thai. 
   This will overwrite the default python link. 
You may fix it with these commands:
rm \$PREFIX/bin/python
ln -s \$PREFIX/bin/python(version installed previously) \$PREFIX/bin/python
"     
pkg install tur-repo
pkg update
pkg install python3.9
rm $PREFIX/bin/python
ln -s $PREFIX/bin/python3.9 $PREFIX/bin/python

echo "install aksharamukha. needed if youll make requests in Thai"
cd 
python -m venv aksharamukha 
aksharamukha/bin/pip install aksharamukha
        break;;
        [Nn]* ) break;;
        * ) echo "Please answer yes or no.";;
    esac
done

#fix php based on this [article](https://parzibyte.me/blog/en/2019/04/28/install-apache-php-7-android-termux/#Step_2_Install_Apache_and_PHP)

sed -i "/mpm_worker_module/s@LoadModule@#LoadModule@g" $httpdconf 
echo "LoadModule mpm_prefork_module libexec/apache2/mod_mpm_prefork.so
LoadModule php_module /data/data/com.termux/files/usr/libexec/apache2/libphp.so
      <FilesMatch \.php$>
        SetHandler application/x-httpd-php
      </FilesMatch>
      
      <IfModule dir_module>
          DirectoryIndex index.php index.html index.htm
      </IfModule>
      
      LoadModule rewrite_module libexec/apache2/mod_rewrite.so
      ServerName localhost:8080
      ServerName 127.0.0.1:8080" >> $httpdconf
  
cd $httpdtdir
rm ./index.html
echo "removed apache demo page"
mkdir result 
cd ru 
ln -s ../result ./result

#current suttacentral.net
echo "downloading suttacentral.net"
cd ..
rm -rf suttacentral.net
mkdir suttacentral.net 
cd suttacentral.net 
git clone https://github.com/suttacentral/sc-data.git ./

#accesstoinsight.org 
cd ..
echo "downloading accesstoinsight.org"
rm -rf accesstoinsight.org 
wget http://accesstoinsight.org/tech/download/ati.zip
echo "unzipping"
unzip ati.zip ./accesstoinsight.org
rm ati.zip

#legacy suttacentral.net 
echo "downloading legacy.suttacentral.net"
rm -rf legacy.suttacentral.net
wget https://legacy.suttacentral.net/exports/sc-offline-2016-11-30_16:03:42.zip
echo "unzipping"
unzip sc-offline-2016-11-30_16\:03\:42.zip ./legacy.suttacentral.net

#test run
echo "test run"
echo
bash ./scripts/finddhamma.sh adhivacanasamphasso 

echo "apachectl start" >> ~/.profile
echo "added apache webserver (httpd) to autostart each time you open temrux app"
echo 
echo "press anykey to start apache and open fdg offline

if you will use termux only for dhamma.gift you may want trun this command.
it will open find.dhamma.gift offline automatically

echo 'termux-open-url http://localhost:8080/' >> ~/.profile


if localhost:8080 is unavailable. you may run 

apachectl stop && apachectl start

without restarting Termux
press anykey to finish the setup
"
read 
apachectl start
termux-open-url http://localhost:8080/

exit 0

#cleanup sc repo from unused texts
cd /suttacentral.net/sc-data/sc_bilara_data/translation
ls | grep -Ev "ru|th|en|san" | xargs rm -rf
cd /suttacentral.net/sc-data/sc_bilara_data/html
ls | grep -Ev "ru|th|en|san" | xargs rm -rf

#fix bw
sed -i  "s@top: 15px@bottom: 15px" css.css

#in css.css file 
#controlpanel {
#	position: fixed;
# bottom: 15px; /* 70px; */
 
 // set default state of Pali Lookup
if (localStorage.paliLookupActive === undefined) {
  localStorage.paliLookupActive = "false";
}
#disable dictionary 
mv /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/offline/bw/js/pali-lookup-standalone.js  /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/offline/bw/js/pali-lookup-standalone.jsdd
#remove bw header image
cp /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/headerlogo.png /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/offline/bw/images
 
#apache config
cp /data/data/com.termux/files/usr/etc/apache2/httpd.conf /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/config/

for i in `grep -rl mousetrap   /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/bw`
do 
sed -i 's@<script src="../js/mousetrap.min.js"></script>@<?php $uname = shell_exec("uname -a"); if ( preg_match(\'/\!Android\/', $uname)) {  echo "<script src="../js/mousetrap.min.js"></script>"; } ?>@' /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/bw/vi/kd9.html

done 


#bw 
localStorage.paliLookupActive = "false";

js/footer.js



			<?php 
			$uname = shell_exec("uname -a"); 
			if ( preg_match('/!Android/', $uname)) {  
			echo '<script src=../js/mousetrap.min.js></script>'; 
			} 
			?>
replace in bw index to disable the lookup

			<?php $uname = shell_exec("uname -a"); if ( preg_match('/!Android/', $uname)) {  <script src="../js/mousetrap.min.js"></script> } ?>

#to refresh theravada.ru run
mkdir theravada.ru && cd theravada.ru
wget -r --no-check-certificate -P ./ --no-parent https://theravada.ru/Teaching/canon.htm
cd theravada.ru/Teaching/Canon/Suttanta   
for i in `find . -name  "*" -type f`; do  
    echo $i; 
    iconv -f windows-1251 $i > ../tmp
    mv ../tmp $i
    sed -i 's@windows-1251@utf-8@g' $i
    done
    
#check and fix links if needed 
cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/ru
ln -s ../assets ./assets 
ln -s ../sc ./sc
ln -s ../scripts ./scripts
ln -s ../result ./result

#tests
curl http://localhost:8080/sc/translator-lookup.php?fromjs=sutta/sn/sn56/sn56.11
curl http://localhost:8080/sc/api.php?fromjs=sutta/dn/dn22&type=A
curl http://localhost:8080/sc/extralinks.php?fromjs=dn22

curl https://find.dhamma.gift/sc/translator-lookup.php?fromjs=sutta/mn/mn1
curl https://find.dhamma.gift/sc/api.php?fromjs=sutta/dn/dn22&type=A
curl https://find.dhamma.gift/sc/extralinks.php?fromjs=dn22

curl http://localhost/sc/translator-lookup.php?fromjs=sutta/sn/sn56/sn56.11
curl http://localhost/sc/api.php?fromjs=sutta/dn/dn22&type=A
curl http://localhost/sc/extralinks.php?fromjs=dn22