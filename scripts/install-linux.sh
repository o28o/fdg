#!/bin/bash

sudo apt update && sudo apt -y upgrade
sudo apt install -y apache2 php zip pv wget git
sudo apt install -y php-{common,xml,xmlrpc,curl,gd,imagick,cli,dev,imap,mbstring,opcache,soap,zip,intl}
rm /var/www/html/index.html
cd /var/www/html
git clone https://github.com/o28o/fdg.git ./
cd ..
mkdir suttacentral.net && cd suttacentral.net
git clone https://github.com/suttacentral/sc-data.git 

sudo systemctl restart apache2

#check this or similar article for "how to check apache and php installation"
# https://www.vultr.com/docs/install-linux-apache-mysql-and-php-lamp-on-ubuntu-20-04-lts/