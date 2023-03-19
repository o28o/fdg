<?php
if (strpos($_SERVER['REQUEST_URI'], "/ru") !== false){
$lang = "ru";
$htmllang = "ru";
$mainpage = '/ru';
$mainscpage = '/ru/sc';
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
         <strong>\\\\bX</strong> - начало или <strong>Y\\\\b</strong> конец слова<br>
<strong>X.*Y</strong> - любое количество символов между X и Y<br>
<strong>X.{0,10}Y</strong> - от 0 до 10 символов<br>
<strong>X\\\\S*\\\\sY</strong> - рядом стоящие слова X и Y, если окончание слова X неизвестно или может быть различным<br>     
<strong>"X(\\\\S*\\\\s){0,3}Y"</strong> - расстояние в 0 или 2 слова между X и Y с любым окончанием X<br> 
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
$warning = '<b>Предупреждение!</b><br><br> Переводы выполнены не Буддой! Чаще всего содержат фундаментальные ошибки главных положений его Учения. Переводы нужно читать критически. 
 <!--<a target="_blank" href="https://docs.google.com/spreadsheets/d/1e-uFcjBzmCf08t7BUR-Ffnz3ZlSzhLNUnIWbMbvg3go" class="alert-link"> Примеры ошибок</a> -->
 <br><br>
  Самое важное из Учения Будды лучше изучить <strong> самостоятельно по Суттам</strong> на Пали. В частности, что такое Серединная Практика и Четыре Благородные Истины. Это несколько абзацев, к примеру из <strong>sn56.11</strong>.';
  
$anamemolds = 'Переводы Майкла Олдса'; 
$anameasc = 'Благородный Аскетизм';
$anameati = 'Accesstoinsight.org Патимоккха';
$anamehist = 'История';
$anameuseful = 'Полезное';
$anamedpd = 'Пали-Англ для mDict';
$anamedpdru = 'Пали-Рус для GoldenDict';



$anameresearch = 'Исследование';
$anameread = 'Чтение';
$anamestudy = 'Изучение';
$anamematerials = 'Грамматика';
$anamecases = 'Падежи';
$anameconj = 'Спряжения';
$anametextbook = 'Курс по Пали';
$anameothermat = 'Другие Материалы';
$anamesdiff = 'Сравнить Две Сутты';



$aboutheader = 'О Проекте';
$aboutprp = '<div class="col-lg-4 ms-auto"><p class="lead">Find.Dhamma.Gift это поисковая система Освобождения, инструмент для поиска основанный на материалах SuttaCentral.net и Theravada.ru. Вы можете искать понятия, определения, метафоры, объяснения, людей, места и другое описанное в Суттах и Винае на Пали, Русском, Тайском и Английском.</p></div>
<div class="col-lg-4 me-auto"><p class="lead">Дхамма энтузиасты, разработчики горячо приветствуются, у проекта большой потенциал в поисках настоящего значения текстов. Но, я не разработчик и это всего лишь скрипт на Bash и PHP-обёртка😊</p></div>';
$prongh = 'Проект на GitHub';





$contactheader = 'Контакты';
$contaccalltoaction = 'Найдите Благородный Восьмеричный Путь.<br>
							Поймите Четыре Благородные Истины.<br>
							Дхамма - это Действительность.';
$closemodal = 'Закрыть Окно';
}
else {
$lang = "en";
$htmllang = "en";
$mainpage = '/';
$mainscpage = '/sc';
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
       <strong>\\\\bX</strong> - beginning of the word or <strong>Y\\\\b</strong> end<br>
<strong>X.*Y</strong> - any number of symbols between X and Y<br>
<strong>X.{0,10}Y</strong> - from 0 to 10 symbols<br>
<strong>X\\\\S*\\\\sY</strong> - next words X и Y, with variable ending of X<br>      
<strong>"X(\\\\S*\\\\s){0,3}Y"</strong> - distance of 0 to 2 words between X and Y with any ending of X<br> 
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
        
$warning = '<b>Warning about translations!</b><br><br> Translations did not come from Buddha! Be scrutinizing and critical reading them. The most important fundamentals of Buddhas Teaching are better to be learned<strong> on one\'s own from Suttas</strong> in Pali. The minimum is: Middle Practice and Four Noble Truths. E.g. few paragraphs from <strong>sn56.11</strong>.';   
}

$anamemolds = 'Translations by M. Olds';
$anameasc = 'Asceticism in Dhamma';
$anameati = 'Accesstoinsight.org patimokkha';
$anamehist = 'History';
$anameuseful = 'Useful Links';
$anamedpd = 'Pali for mDict';

$anameresearch = 'Research';
$anameread = 'Read';
$anamestudy = 'Study';
$anamematerials = 'Grammar';
$anamecases = 'Cases';
$anameconj = 'Conjugations';
$anametextbook = 'Pali Textbook';
$anameothermat = 'Other Materials';
$anamesdiff = 'Sutta Diff';


$aboutheader = 'About Project';
$aboutprp = '<div class="col-lg-4 ms-auto"><p class="lead">Find.Dhamma.Gift is a Liberation Search Engine, it\'s a search tool based on SuttaCentral.net and Theravada.ru materials. You can search in Pali, Russian, Thai and English for meanings, definitions, metaphors, explanations, people, locations etc. described in Suttas and Vinaya.</p></div>
<div class="col-lg-4 me-auto"><p class="lead">Dhamma Enthusiasts, Developers and Contributors are warmly welcome, because project has great potential to find the real meaning of the texts. But! I\'m not a developer and its just a bash script with php wrapper😊</p></div>';
$prongh = 'Project on GitHub';



$contactheader = 'Contacts';
$contaccalltoaction = 'Find the Noble Eightfold Path.<br>
							Understand the Four Noble Truths.<br>Dhamma - is Actuality.
                      ';
$closemodal = 'Close Window';
?>
