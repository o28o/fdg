<?php
$uname = shell_exec("uname -a"); 
//
//OFFLINE ANDROID
//
if ( preg_match('/Android/', $uname)  ) {
    $mode = 'offline';
//$mode = 'online';

$mainpagethrflink = "/theravada.rf/palicanon/суттанта/дигха-hикая.html";
$mainpagethrulink = "/theravada.ru/Teaching/Canon/Suttanta/samyutta.htm";
$mainpagethsulink = '/tipitaka.theravada.su/dn_toc_thsu.html' ;
$basedir = "/data/data/com.termux/files/usr/share/apache2/default-site/htdocs";

$fontawesomejs = '<script src="/assets/js/fontawesome.6.1.all.js" defer></script>
';

$linkforthsu = '/tipitaka.theravada.su/dn/';
$linkforthru = '/theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "/legacy.suttacentral.net/sc/th/"; 
$linkforthaiend = '.html';
//extralinks.php
$locationru = $basedir. "/theravada.ru/Teaching/Canon/Suttanta/Texts";

//converter.php
$adapterscriptlocation = '/data/data/com.termux/files/home/aksharamukha/bin/python3 /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/aksharamukha-adapter.py';

// mainmenu
$linkmolds = '/buddhadust.net/dhamma-vinaya/bd/dhamma-vinaya.htm';

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
$mainpagethrflink = "/theravada.rf/palicanon/суттанта/дигха-hикая.html";
$mainpagethrulink = "/theravada.ru/Teaching/Canon/Suttanta/samyutta.htm";
$mainpagethsulink = '/tipitaka.theravada.su/dn_toc_thsu.html' ;
//$mode = 'online';
$fontawesomejs = '<script src="/assets/js/fontawesome.6.1.all.js" defer></script>
';
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
$linkmolds = '/buddhadust.net/dhamma-vinaya/bd/dhamma-vinaya.htm';
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
$mainpagethrflink =  "http://xn--80aaaglc1fo1a.xn--p1ai/palicanon/%D1%81%D1%83%D1%82%D1%82%D0%B0%D0%BD%D1%82%D0%B0/%D0%B4%D0%B8%D0%B3%D1%85%D0%B0-h%D0%B8%D0%BA%D0%B0%D1%8F";
  $mainpagethrulink = "https://theravada.ru/Teaching/Canon/Suttanta/samyutta.htm";
  $mainpagethsulink = 'https://tipitaka.theravada.su/toc/translations/1097' ;


$fontawesomejs = '<script src="https://kit.fontawesome.com/a2bd6cd99e.js" crossorigin="anonymous"></script>';


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
$adapterscriptlocation = '/home/python/aksharamukha/bin/python3 /var/www/html/scripts/aksharamukha-adapter.py';

// include_once('../config/config.php');

// mainmenu
$linkmolds = 'https://buddhadust.net/dhamma-vinaya/bd/dhamma-vinaya.htm';

$linktbw = '/bw';
$linknoblasc = 'https://en.dhammadana.org/sangha/dhutanga.htm';
$linkati = 'https://www.accesstoinsight.org/tipitaka/vin/sv/index.html';
$linktextbook = 'https://drive.google.com/file/d/1HYI0psEjzl5SHDTSI1arAVJMiJdO862G/view?usp=drivesdk';
$linktextbookru = 'https://drive.google.com/file/d/1H_mhKNgrBYevOOnax-FUBgxkfSuwHItu/view?usp=share_link';

$linkconj = 'https://drive.google.com/file/d/1HzPCYsVBEkWErAk6TqSWRYKseM1hqMCb/view?usp=sharing';
$linkcases = 'https://docs.google.com/spreadsheets/d/1wo8YEXX72DEV7L2jH5FUBdmeQPdiyAIN/edit?usp=drivesdk&ouid=110812668327988798342&rtpof=true&sd=true';
$linkcasesru = 'https://drive.google.com/file/d/1HVRK6yTMT59uHCCvTdQukRy7fmHNntOr/view?usp=drivesdk';
      }    
           
else if ( preg_match('/.from.sh/', $uname) ) {
//
// ONLINE PROD
//
  //preg_match('/rym.from.sh/', $uname) 
  $mode = 'online';
$mainpagethrflink = "http://xn--80aaaglc1fo1a.xn--p1ai/palicanon/%D1%81%D1%83%D1%82%D1%82%D0%B0%D0%BD%D1%82%D0%B0/%D0%B4%D0%B8%D0%B3%D1%85%D0%B0-h%D0%B8%D0%BA%D0%B0%D1%8F";
  $mainpagethrulink = "https://theravada.ru/Teaching/Canon/Suttanta/samyutta.htm";
  $mainpagethsulink = 'https://tipitaka.theravada.su/toc/translations/1097' ;
  
$basedir = '/home/a0902785/domains/find.dhamma.gift/public_html';
$fontawesomejs = '<script src="https://kit.fontawesome.com/a2bd6cd99e.js" crossorigin="anonymous"></script>';


$linkforthsu = 'https://tipitaka.theravada.su/dn/';
$linkforthru = 'https://theravada.ru/Teaching/Canon/Suttanta/Texts/';
$linkforthai = "https://suttacentral.net/"; 
$linkforthaiend = '/th/siam_rath';

//extralinks.php
$locationru = $basedir. '/theravada.ru/Teaching/Canon/Suttanta/Texts';
$locationTocThsu = $basedir. "/assets/texts";

//converter.php
//not used currently. php curl for offline
$adapterscriptlocation = '/home/a0902785/domains/find.dhamma.gift/aksharamukha/bin/python3 /home/a0902785/domains/find.dhamma.gift/public_html/scripts/aksharamukha-adapter.py';

// include_once('../config/config.php');

// mainmenu
$linkmolds = 'https://buddhadust.net/dhamma-vinaya/bd/dhamma-vinaya.htm';

//$linktbw = 'https://thebuddhaswords.net';
$linktbw = '/bw';
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

$linksc = 'https://suttacentral.net/';
$anamesc = 'SuttaCentral.net';
$linksclegacy = '/legacy.suttacentral.net/sc/su.html';
$anamesclegacy = 'SC.net Legacy';
//api-emulator
$scroottextlocation = $basedir . "/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms";
$sctrntextlocation = $basedir . "/suttacentral.net/sc-data/sc_bilara_data/translation/";
//opentexts.php
$indexesfile = $basedir. '/assets/texts/text_indexes.txt';
$scriptfile = $basedir. '/scripts/ranges.sh';

$thsulocation = $basedir. '/tipitaka.theravada.su/';
$thrulocation = $basedir. '/theravada.ru/Teaching/Canon';
$bwlocation = $basedir. '/bw';

$defaultla = 2;
$latestrusmn = 38;
$iconimportant = 'fa-solid fa-circle-exclamation';
$iconimportant = 'fa-solid fa-triangle-exclamation';
$iconimportant = 'fa-solid fa-star';

?>