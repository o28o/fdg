<?php
if (strpos($_SERVER['REQUEST_URI'], "/ru") !== false){
$lang = "ru";
$htmllang = "ru";
$metadesc = 'Поисковый Сайт Освобождения. Поиск в Пали Суттах и Винае';
$titletwit = 'find.Dhamma.gift - Поисковая Система Освобождения';
$ogdesc = 'Поисковая Система Освобождения. Находите определения и информацию в Суттах и Винае на Пали, Русском, Английском и Тайском';
$oglocale = 'ru_RU';
$ogshare = 'https://find.dhamma.gift/assets/img/social_sharing_gift_rus.jpg';
$menu = 'Меню';
$menuread = 'Читать';
$menuhist = 'История Поиска';
$menuhowto = 'Помощь';
$menuabout = 'О Проекте';
$menulinks = 'Полезное';
$menucontact = 'Контакты';
$tooltiptitle = 'На Pāḷi, Русском, ไทย и Английском';
$title = 'Найдите Истину';
$tooltippli = 'Поиск по-умолчанию. По Суттам an, sn, dn, mn. Ангутара Никаи, Саньютта Никаи, Маджжхима Никаи, Дигха Никаи';
$radiopli = 'Pāḷi';
$tooltipdef = 'Поиск определений понятия на Пали в 4 Никаях. Что это, какие виды бывают, какими метафорами описывается. Работает только для определений данных стандартными фразами. См. в "для Продвинутых"';
$radiodef = 'Опр';
$tooltipvin = 'Поиск в Винае на Пали';
$radiovin = 'Вин';
$tooltipkn = '+ поиск на Пали в 6 книгах Кхуддака Никаи: ud, dhp, iti, snp, thag, thig. Удана, Дхаммапада, Итивутака, Суттанипата, Тхерагатха, Тхеригатха';
$radiokn = '+КН';
$tooltiponl = 'X Y ... или "(X|Y|...)" включая кавычки. Найдет только тексты содержащие оба и более совпадений X, Y, ... Без этой опции будут собраны тексты которые содержат хотя бы одно совпадение';
$checkboxonl = 'Тлк';
$tooltipltr= "+ поиск на Пали во всех книгах Кхуддака Никаи, включая поздние";
$radioltr = "+Позд";
$tooltipen = 'Поиск по англ. переводам АН, СН, МН, ДН с SuttaCentral.net дост. Суджато. Без этой опции сначала поиск будет произведен в Пали, затем в переводах thebuddhaswords.net и затем в переводах sc.net';
$radioen = 'Англ';
$tooltipth = "Опционально. Поиск в 4 основных Никаях в Тайских переводах Suttacentral.net. Без этой опции сначала поиск будет произведен в Пали текстах, потом в переводах";
$radioth = "ไทย";
$tooltipru = "Опционально. Поиск по русским переводам АН, СН, МН, ДН с SuttaCentral.net";
$radioru = "Рус";

$regexMemo = '<h5>Памятка по RegEx</h5>
  <p>ā ī ū ḍ ḷ ṃ ṁ ṇ ṅ ñ ṭ</p>
          <p style="text-align: left;">
  <!--   <strong>-onl "(X|Y|...)"</strong> - найти тексты содержащие только все совпадения X, Y ... и т.д.<br> -->
     <strong>X -exc Y</strong> - искать X, исключить Y<br>
         <strong>\\bX</strong> - начало или <strong>Y\\b</strong> конец слова<br>
<strong>X.*Y</strong> - любое количество символов между X и Y<br>
<strong>X.{0,10}Y</strong> - от 0 до 10 символов<br>
<strong>X\\S*\\sY</strong> - рядом стоящие слова X и Y, если окончание слова X неизвестно или может быть различным<br>     
<strong>"X(\\S*\\s){0,3}Y"</strong> - расстояние в 0 или 2 слова между X и Y с любым окончанием X<br> 
<strong>[aā]</strong> - искать несколько вариантов<br>           
<strong>"Sn56.*(seyyathāpi|adhivacan|ūpama|opama)"</strong> - искать все метафоры в Самьютте 56<br> 
<strong>"(a|b|c)"</strong> - искать несколько отдельных слов одновременно<br>
<strong>\'^"mn.*X\'</strong> - искать X во всей Мадджхимма Никае<br>            
<strong>dn22.*Y</strong> - искать Y в одной Сутте ДН22<br> 
        </p>     ';
$titlehowtovideo = 'Как пользоваться?';  
$linkhowtovideo = 'https://www.youtube.com/embed/4KIqQYSxTSE';
$titledeschowtovideo = 'How to search in Pali Suttas and Vinaya with find.dhamma.gift'; 
$fntmessage = 'Всесторонний взгляд на Четыре Благородные Истины<br>
		в Палийских Суттах и Винае.<br> 
    Поймите настоящие Четыре Благородные Истины<br> 
   и положите конец боли.';
}
else {
$lang = "en";
$htmllang = "en";
$metadesc = 'Liberation Search Engine. Search in Pali Suttanta and Vinaya';
$titletwit = 'find.Dhamma.gift - Liberation Search Engine';
$ogdesc = 'Liberation Search Engine. Search in Suttas and Vinaya in Pali, Russian, English and Thai';
$oglocale = 'en_US';
$ogshare = 'https://find.dhamma.gift/assets/img/social_sharing_gift.jpg';
$menu = 'Menu';
$menuread = 'Read';
$menuhist = 'Search History';
$menuhowto = 'How To';
$menuabout = 'About';
$menulinks = 'Useful Links';
$menucontact = 'Contacts';
$tooltiptitle = 'In Pāḷi, English, Russian & ไทย';
$title = 'Search for Truth';
$tooltippli = 'Default search. In Suttas of an, sn, mn, dn. Anguttara Nikaya, Samyutta Nikaya, Majjhimma Nikaya, Digha Nikaya';
$radiopli = 'Pāḷi';
$tooltipdef = 'Search for definitions in 4 main Nikayas in Pali. What is it, how many and what types, metaphors. Works only if definition was given in standard phrases. For all-round view studing all related Suttas are recommended. See "Advanced" for details';
$radiodef = 'Def';
$tooltipvin = 'Search in Pali Vinaya';
$radiovin = 'Vin';
$tooltipkn = '+ search in Pali Khuddaka Nikaya: dhp, iti, ud, snp, thag, thig';
$radiokn = '+KN';
$tooltiponl = 'X Y ... or "(X|Y|...)" including quotes. Finds texts containing only both and more matches for X, Y ...
  Without this option texts containing even one match will be in results';
$checkboxonl = 'Onl';
$tooltipen = 'Search in an, sn, mn, dn in English line by line translations by B. Sujato as on Suttacentral.net. Without this option search will start with Pali texts, then thebuddhaswords.net texts, then sc.net translations';
$radioen = 'Eng';
$tooltipltr= "+ search in Pali in all books of kn including later texts";
$radioltr = "+Later";
$tooltipth = "(optional) Search in an, sn, mn, dn in Thai Suttacentral.net translations. Without this option default search will start with Pali texts, then with sc.net Thai translations";
$radioth = "ไทย";
$tooltipru = "(optional) Search in an, sn, mn, dn in Russain Suttacentral.net translations";
$radioru = "Rus";

$regexMemo = ' <h5>RegEx Memo</h5>
  <p>ā ī ū ḍ ḷ ṃ ṁ ṇ ṅ ñ ṭ</p>
          <p style="text-align: left;">
     <!--  <strong>-onl "(X|Y|...)"</strong> - find texts containing only all of the X, Y ... etc patterns<br> -->
       <strong>X -exc Y</strong> - search for X, exclude Y<br>
       <strong>\\bX</strong> - beginning of the word or <strong>Y\\b</strong> end<br>
<strong>X.*Y</strong> - ant number of symbols between X and Y<br>
<strong>X.{0,10}Y</strong> - from 0 to 10 symbols<br>
<strong>X\\S*\\sY</strong> - next words X и Y, with variable ending of X<br>      
<strong>"X(\\S*\\s){0,3}Y"</strong> - distance of 0 to 2 words between X and Y with any ending of X<br> 
<strong>[aā]</strong> - multiple variants<br>           
<strong>"Sn56.*(seyyathāpi|adhivacan|ūpama|opama)"</strong> - search for all metaphors in Samyutta 56<br> 
<strong>"(a|b|c)"</strong> - search for few different patterns at the same time<br>                          
<strong>\'^"mn.*X\'</strong> - find X in all Majjhimma Nikaya<br>            
<strong>dn22.*Y</strong> - find Y in DN22 only<br>
        </p>          ';
$titlehowtovideo = 'How-To Video';
$linkhowtovideo = 'https://www.youtube.com/embed/Q_SLMrg6L1k?modestbranding=1&hl=en-US';
$titledeschowtovideo = 'How to search in Pali Suttas and Vinaya with find.dhamma.gift';
$fntmessage = 'All-round view on Four Noble Truths<br>
        in Pali Suttas and Vinaya.<br>
        Understand the real meaning <br>
        of Four Noble Truths<br>
        and end up with pain.';
}

?>