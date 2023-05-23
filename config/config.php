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
$basedir = "/data/data/com.termux/files/usr/share/apache2/default-site/htdocs";

$linkforthsu = '/tipitaka.theravada.su/dn/';
$linkforthru = '/theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "/legacy.suttacentral.net/sc/th/"; 
$linkforthaiend = '.html';
//extralinks.php
$locationru = $basedir. "/theravada.ru/Teaching/Canon/Suttanta/Texts";

//converter.php
$adapterscriptlocation = '/data/data/com.termux/files/home/aksharamukha/bin/python3 /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/aksharamukha-adapter.py';

// mainmenu
$linkmolds = '/obo.genaud.net/dhamma-vinaya/bd/dhamma-vinaya.htm';
$linksc = '/legacy.suttacentral.net/sc/su.html';
$anamesc = 'Legacy.suttacentral.net';
$linktbw = '/bw';
$linknoblasc = '/en.dhammadana.org/sangha/dhutanga.htm';
$linkati = '/accesstoinsight.org/tipitaka/vin/sv/index.html';
$linktextbook = '/assets/materials/pali_textbook_eng.pdf';
$linkconj = '/assets/materials/pali_conjugations_eng.pdf';
$linkcases = '/assets/materials/declensions_and_conjugations_eng.xlsx';
$linkcasesru = '/assets/materials/pali_cases_rus.pdf';
$linktextbookru = '/assets/materials/pali_textbook_rus.pdf';

} else if ( preg_match('/Ubuntu/', $uname) ) {     
//
//Offline laptop or server for apache default /var/www/html e.g. Linux Mint / Ubuntu
//
$mode = 'offline';
$mainpagethrulink = "/theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm";
$mainpagethsulink = '/tipitaka.theravada.su/dn_toc_thsu.html' ;
//$mode = 'online';

$basedir = "/var/www/html/";

$linkforthsu = '/tipitaka.theravada.su/dn/';
$linkforthru = '/theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "/legacy.suttacentral.net/sc/th/"; 
$linkforthaiend = '.html';
//extralinks.php
$locationru = $basedir. "/theravada.ru/Teaching/Canon/Suttanta/Texts";

//converter.php
$adapterscriptlocation = '/data/data/com.termux/files/home/aksharamukha/bin/python3 /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/aksharamukha-adapter.py';

// mainmenu
$linkmolds = '/obo.genaud.net/dhamma-vinaya/bd/dhamma-vinaya.htm';
$linksc = 'https://suttacentral.net/';
$anamesc = 'SuttaCentral.net';
$linktbw = '/bw';
$linknoblasc = '/en.dhammadana.org/sangha/dhutanga.htm';
$linkati = '/accesstoinsight.org/tipitaka/vin/sv/index.html';
$linktextbook = '/assets/materials/pali_textbook_eng.pdf';
$linktextbookru = '/assets/materials/pali_textbook_rus.pdf';
$linkconj = '/assets/materials/pali_conjugations_eng.pdf';
$linkcases = '/assets/materials/declensions_and_conjugations_eng.xlsx';
$linkcasesru = '/assets/materials/pali_cases_rus.pdf';
      } 
      
   else if ( preg_match('/CentOS-Server/', $uname) ) {
//
// ONLINE KV Prod
//
  //preg_match('/rym.from.sh/', $uname) 
  $mode = 'online';
  $mainpagethrulink = "https://theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm";
  $mainpagethsulink = 'https://tipitaka.theravada.su/toc/translations/1097' ;
  
$basedir = "/var/www/html/";

$linkforthsu = 'https://tipitaka.theravada.su/dn/';
$linkforthru = 'https://theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "https://suttacentral.net/"; 
$linkforthaiend = '/th/siam_rath';

//extralinks.php
$locationru = $basedir. '/theravada.ru/Teaching/Canon/Suttanta/Texts';
$locationTocThsu = $basedir. "/assets/texts/";

//converter.php
//not used currently. php curl for offline
$adapterscriptlocation = '/home/a0092061/domains/f.dhamma.gift/aksharamukha/bin/python3 /home/a0092061/domains/f.dhamma.gift/public_html/scripts/aksharamukha-adapter.py';

// include_once('../config/config.php');

// mainmenu
$linkmolds = 'https://obo.genaud.net/dhamma-vinaya/bd/dhamma-vinaya.htm';
$linksc = 'https://suttacentral.net/';
$anamesc = 'SuttaCentral.net';
$linktbw = '/bw';
$linknoblasc = 'https://en.dhammadana.org/sangha/dhutanga.htm';
$linkati = 'https://www.accesstoinsight.org/tipitaka/vin/sv/index.html';
$linktextbook = 'https://drive.google.com/file/d/1HYI0psEjzl5SHDTSI1arAVJMiJdO862G/view?usp=drivesdk';
$linktextbookru = 'https://drive.google.com/file/d/1H_mhKNgrBYevOOnax-FUBgxkfSuwHItu/view?usp=sharing';

$linkconj = 'https://drive.google.com/file/d/1HzPCYsVBEkWErAk6TqSWRYKseM1hqMCb/view?usp=sharing';
$linkcases = 'https://docs.google.com/spreadsheets/d/1wo8YEXX72DEV7L2jH5FUBdmeQPdiyAIN/edit?usp=drivesdk&ouid=110812668327988798342&rtpof=true&sd=true';
$linkcasesru = 'https://drive.google.com/file/d/1HVRK6yTMT59uHCCvTdQukRy7fmHNntOr/view?usp=drivesdk';
      }    
      
      
      
else if ( preg_match('/Linux rym.from.sh/', $uname) ) {
//
// ONLINE PROD
//
  //preg_match('/rym.from.sh/', $uname) 
  $mode = 'online';
  $mainpagethrulink = "https://theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm";
  $mainpagethsulink = 'https://tipitaka.theravada.su/toc/translations/1097' ;
  
$basedir = '/home/a0092061/domains/f.dhamma.gift/public_html';

$linkforthsu = 'https://tipitaka.theravada.su/dn/';
$linkforthru = 'https://theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "https://suttacentral.net/"; 
$linkforthaiend = '/th/siam_rath';

//extralinks.php
$locationru = $basedir. '/theravada.ru/Teaching/Canon/Suttanta/Texts';
$locationTocThsu = $basedir. "/assets/texts";

//converter.php
//not used currently. php curl for offline
$adapterscriptlocation = '/home/a0092061/domains/f.dhamma.gift/aksharamukha/bin/python3 /home/a0092061/domains/f.dhamma.gift/public_html/scripts/aksharamukha-adapter.py';

// include_once('../config/config.php');

// mainmenu
$linkmolds = 'https://obo.genaud.net/dhamma-vinaya/bd/dhamma-vinaya.htm';
$linksc = 'https://suttacentral.net/';
$anamesc = 'SuttaCentral.net';
$linktbw = 'https://thebuddhaswords.net';
$linknoblasc = 'https://en.dhammadana.org/sangha/dhutanga.htm';
$linkati = 'https://www.accesstoinsight.org/tipitaka/vin/sv/index.html';
$linktextbook = 'https://drive.google.com/file/d/1HYI0psEjzl5SHDTSI1arAVJMiJdO862G/view?usp=drivesdk';
$linktextbookru = 'https://drive.google.com/file/d/1H_mhKNgrBYevOOnax-FUBgxkfSuwHItu/view?usp=sharing';

$linkconj = 'https://drive.google.com/file/d/1HzPCYsVBEkWErAk6TqSWRYKseM1hqMCb/view?usp=sharing';
$linkcases = 'https://docs.google.com/spreadsheets/d/1wo8YEXX72DEV7L2jH5FUBdmeQPdiyAIN/edit?usp=drivesdk&ouid=110812668327988798342&rtpof=true&sd=true';
$linkcasesru = 'https://drive.google.com/file/d/1HVRK6yTMT59uHCCvTdQukRy7fmHNntOr/view?usp=drivesdk';
      } 
//
// Common Variables
//
$linebylinerulocation = $basedir. '/assets/texts/';
//translator-lookup.php
$translatorlocation = $basedir. '/assets/texts/';


//api-emulator
$scroottextlocation = $basedir . "/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms";
//opentexts.php
$indexesfile = $basedir. '/assets/texts/text_indexes.txt';
$scriptfile = $basedir. '/scripts/ranges.sh';

$thsulocation = $basedir. '/tipitaka.theravada.su/';
$thrulocation = $basedir. '/theravada.ru/Teaching/Canon';
$bwlocation = $basedir. '/bw';

$linksothermat = 'https://drive.google.com/drive/folders/1nrNtb_4s27nJGq61tpigf_b2sO_KOnVG';
$defaultla = 1;
$latestrusmn = 37;

?>