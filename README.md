# fdg 
# dhamma.gift - Liberation Search Engine
# online version
Grep-based search in all Texts of Pali Suttanta and Vinaya in 4 languages: Pali, English, Russian, Thai and Sinhala. Little script that will or at least might change Buddhism to better.
Search all matches for the word in Suttas and Vinaya.
Web implementation of bash script that generates comfortables datatables. 

https://dhamma.gift/

Perfect for those who are looking for Awakening and study Pali.
You can get all occurrences of the definition, metaphor, practice etc.
By default search is made in DN, MN, SN, AN. But user has option to add other books of KN.

# fdg.offline
Offline version of fdg 

This instruction is only for Android devices. Check possible options for IOS in the end of this instruction. if you'll find out how to run it on IOS please let me know.

# Option #1 
# installation with script

# for Linux with apt 

copy-paste into terminal contents of the script from scripts/install-linix.sh (requires root)

# for Windows 10+ (WSL)

[Activate](https://learn.microsoft.com/en-us/windows/wsl/install) Windows Subsystem for Linux 
install ubuntu of your choice from windows store. finalize the setup: set username and password
copy-paste into terminal contents of the script from scripts/install-linix.sh (requires root)

# For Android
1\. Install Termux from [f-droid](https://f-droid.org/packages/com.termux/) or [github](https://github.com/termux/termux-app)

2\. run Termux 

3\. Copy-paste following commands:

    pkg update 
    pkg upgrade
    pkg install -y git
    mkdir -p $PREFIX/share/apache2/default-site/htdocs
    cd $PREFIX/share/apache2/default-site/htdocs
    git clone https://github.com/o28o/fdg.git ./
    bash ./scripts/install-android.sh

4\. If you want to add offline audio files clone this repo to ./assets/audio

    mkdir -p $PREFIX/share/apache2/default-site/htdocs/assets/audio
    cd $PREFIX/share/apache2/default-site/htdocs/assets/audio
    git clone https://github.com/o28o/fdg.audio ./

# Option #2
# manual installation 
1\. Install Termux from [f-droid](https://f-droid.org/packages/com.termux/) or [github]()

2\. Open termux and run

    pkg install -y php-apache apache2 pv wget git iconv python w3m
    
#fix php based on this [article](https://parzibyte.me/blog/en/2019/04/28/install-apache-php-7-android-termux/#Step_2_Install_Apache_and_PHP)

    nano /data/data/com.termux/files/usr/etc/apache2/httpd.conf

comment and add following lines

    #LoadModule mpm_worker_module libexec/apache2/mod_mpm_worker.so
    LoadModule mpm_prefork_module libexec/apache2/mod_mpm_prefork.so

    LoadModule php_module /data/data/com.termux/files/usr/libexec/apache2/libphp.so
      <FilesMatch \.php$>
        SetHandler application/x-httpd-php
      </FilesMatch>
      
      <IfModule dir_module>
          DirectoryIndex index.php index.html index.htm
      </IfModule>
      
      LoadModule rewrite_module libexec/apache2/mod_rewrite.so
      ServerName localhost:8080
      ServerName 127.0.0.1:8080

and if needed
      
    ServerName #yourip:8080

    cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs

    git clone https://github.com/o28o/fdg.git ./


offline resources part
go to the apache directory

      cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs
      
current suttacentral.net 

    git clone https://github.com/suttacentral/sc-data.git ./suttacentral.net

accesstoinsight.org 

    wget http://accesstoinsight.org/tech/download/ati.zip
    unzip ati.zip ./accesstoinsight.org

#legacy suttacentral.net 
note: you dont neet it if suttacentral.net PWA offline is working fine on your phone

    wget https://legacy.suttacentral.net/exports/sc-offline-2016-11-30_16:03:42.zip
    unzip sc-offline-2016-11-30_16:03:42.zip ./legacy.suttacentral.net
    
or
wget https://legacy.suttacentral.net/exports/sc-offline-2016-11-30_16:03:42.7z

#to refresh theravada.ru run

    mkdir theravada.ru && cd theravada.ru
    wget -r --no-check-certificate  --no-parent -P ./ https://theravada.ru/Teaching/canon.htm

#possible double dir... check later
    
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


#optional 
if you download suttacentral.net data somewhere else, not in apache default

    cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/
    rm suttacentral suttacentral.net
    ln -s ../yourpath ./suttacentral.net
    ln -s ../yourpath ./theravada.ru
    ln -s ../yourpath ./legacy.suttacentral.net

#option #2 or if you want to keep offline resources in other places without symlinks edit paths in ./config/script_config.sh and ./config/config.php


#for testing your queries in cli you may run

    bash ./scripts/finddhamma.sh yourqueryInPali
    bash ./scripts/finddhamma.sh -ru yourqueryInRussian
    bash ./scripts/finddhamma.sh -en yourqueryInEnglish
    bash ./scripts/finddhamma.sh -th yourqueryInThai

    apachctl start
    termux-open-url http://localhost:8080/
    
this should open http://localhost:8080 in your web browser 

don't forget to run

    apachctl start
    termux-open-url http://localhost:8080/

before using fdg offline 

done. 

# for Windows?
Not yet available 

# IOS installation?

Might be possible to run on IOS devices with 
[phpwin](httpsp://apps.apple.com/us/app/phpwin/id1157634089) or similar 
and some terminal emulator e.g. [from this article](https://alternativeto.net/software/termux/?platform=iphone)

never tried. please let me know if there is a way.
