<?php
$uname = shell_exec("uname -a"); 
//
//OFFLINE ANDROID
//
if ( preg_match('/Android/', $uname)  ) {
    $mode = 'offline';
//$mode = 'online';

$mainpagethrulink = "/theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm";
      $mainpagethsulink = '/tipitaka.theravada.su/dn_toc_thsu.html' ;
//translator-lookup.php
$basedir = "/data/data/com.termux/files/usr/share/apache2/default-site/htdocs";
$translatorlocation = $basedir. '/o/';

//opentexts.php
$indexesfile = $basedir. "/assets/texts/text_indexes.txt";
$scriptfile = $basedir. "/scripts/ranges.sh";

$thsulocation = $basedir. '/assets/offline/tipitaka.theravada.su/';
$thrulocation = $basedir. '/assets/offline/theravada.ru/Teaching/Canon';
$bwlocation = $basedir. '/assets/offline/bw';
$linkforthsu = '/tipitaka.theravada.su/dn/';
$linkforthru = '/theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "/legacy.suttacentral.net/sc/th/"; 
$linkforthaiend = '.html';
//extralinks.php
$locationru = $basedir. "/assets/offline/theravada.ru/Teaching/Canon/Suttanta/Texts";

//converter.php
$adapterscriptlocation = '/data/data/com.termux/files/home/aksharamukha/bin/python3 /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/aksharamukha-adapter.py';

//api-emulator
$scroottextlocation = "/storage/emulated/0/Dhamma/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms";

} else if ( preg_match('/Linux rym.from.sh/', $uname)  ) {
//
// ONLINE PROD
//
  //preg_match('/rym.from.sh/', $uname) 
  $mode = 'online';
  $mainpagethrulink = "https://theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm";
  $mainpagethsulink = 'https://tipitaka.theravada.su/toc/translations/1097' ;
//translator-lookup.php
$basedir = '/home/a0092061/domains/find.dhamma.gift/public_html';
$translatorlocation = $basedir. '/o/';

//opentexts.php
$indexesfile = $basedir. '/assets/texts/text_indexes.txt';
$scriptfile = $basedir. '/scripts/ranges.sh';

$thsulocation = $basedir. '/assets/offline/tipitaka.theravada.su/';
$thrulocation = $basedir. '/assets/offline/theravada.ru/Teaching/Canon';
$bwlocation = $basedir. '/assets/offline/bw';
$linkforthsu = 'https://tipitaka.theravada.su/dn/';
$linkforthru = 'https://theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "https://suttacentral.net/"; 
$linkforthaiend = '/th/siam_rath';


//extralinks.php
$locationru = $basedir. '/theravada.ru/Teaching/Canon/Suttanta/Texts';
$locationTocThsu = $basedir. "/assets";

//converter.php
$adapterscriptlocation = '/home/a0092061/domains/find.dhamma.gift/aksharamukha/bin/python3 /home/a0092061/domains/find.dhamma.gift/public_html/scripts/aksa.py';


//api-emulator
$scroottextlocation = '/home/a0092061/data/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms';
// include_once('../config/config.php');

//
//Offline laptop or server for apache default /var/www/html e.g. Linux Mint / Ubuntu
//
      } else if ( preg_match('/Linux/', $uname)  ) {     

      $mode = 'offline';
 $mainpagethrulink = "/theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm";
      $mainpagethsulink = '/tipitaka.theravada.su/dn_toc_thsu.html' ;
//$mode = 'online';
//translator-lookup.php
$basedir = "/var/www/html/";
$translatorlocation = $basedir. '/o/';

//opentexts.php
$indexesfile = $basedir. "/assets/texts/text_indexes.txt";
$scriptfile = $basedir. "/scripts/ranges.sh";

$thsulocation = $basedir. '/assets/offline/tipitaka.theravada.su/';
$thrulocation = $basedir. '/assets/offline/theravada.ru/Teaching/Canon';
$bwlocation = $basedir. '/assets/offline/bw';
$linkforthsu = '/tipitaka.theravada.su/dn/';
$linkforthru = '/theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "/legacy.suttacentral.net/sc/th/"; 
$linkforthaiend = '.html';
//extralinks.php
$locationru = $basedir. "/assets/offline/theravada.ru/Teaching/Canon/Suttanta/Texts";

//converter.php
$adapterscriptlocation = '/data/data/com.termux/files/home/aksharamukha/bin/python3 /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/aksharamukha-adapter.py';

//api-emulator
$scroottextlocation = "/var/www/html/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms";
      } 
//
// Common Variables
//
$linebylinerulocation = $basedir. '/assets/texts/';
//translator-lookup.php
$translatorlocation = $basedir. '/o/';

//opentexts.php
$indexesfile = $basedir. '/assets/texts/text_indexes.txt';
$scriptfile = $basedir. '/scripts/ranges.sh';

$thsulocation = $basedir. '/assets/offline/tipitaka.theravada.su/';
$thrulocation = $basedir. '/assets/offline/theravada.ru/Teaching/Canon';
$bwlocation = $basedir. '/assets/offline/bw';

      ?>