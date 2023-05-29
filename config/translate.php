<?php
if (strpos($_SERVER['REQUEST_URI'], "/ru") !== false){
$lang = "ru";

$htmllang = "ru";
$mainpage = '/ru';
$mainscpage = $mainpage . '/sc';
$searchcaption = 'Поиск';
$metadesc = 'Поисковый Сайт Освобождения. Поиск в Пали Суттах и Винае';
$titletwit = 'find.Dhamma.gift - Поисковая Система Освобождения';
$ogdesc = 'Поисковая Система Освобождения. Находите определения и информацию в Суттах и Винае на Пали, Русском, Английском и Тайском';
$oglocale = 'ru_RU';
$ogshare = 'https://find.dhamma.gift/assets/img/social_sharing_gift_rus.jpg';
$menu = 'Меню';
$menuread = 'Читать';
$menuhist = 'История';
$menuhowto = 'Помощь';
$menuabout = 'О Проекте';
$menulinks = 'Полезное';
$menucontact = 'Контакты';
$tooltiptitle = 'На Pāḷi, Русском, ไทย и Английском';
$title = 'Найдите Истину';
$tooltippli = 'Поиск на Пали по-умолчанию. По Суттам an, sn, dn, mn. Ангутара Никаи, Саньютта Никаи, Маджжхима Никаи, Дигха Никаи';
$radiopli = 'Pāḷi';
$tooltipdef = 'Поиск определений понятия на Пали в 4 Никаях. Что это, какие виды бывают, какими метафорами описывается. Если в Суттах не будет результатов, то поиск автоматически проведется в определениях из Винаи. Работает только для определений данных стандартными фразами. См. в "для Продвинутых"';
$radiodef = 'Опр';
$tooltipvin = 'Поиск в Винае на Пали';
$radiovin = 'Вин';
$tooltipkn = 'Поиск на Пали в 4 никаях + поиск в 6 книгах Кхуддака Никаи: ud, dhp, iti, snp, thag, thig. Удана, Дхаммапада, Итивутака, Суттанипата, Тхерагатха, Тхеригатха';
$radiokn = '+КН';
$tooltiponl = 'X Y ... найдет только тексты содержащие оба и более совпадений X, Y, ... Без этой опции будут собраны тексты которые содержат только рядомстоящие X Y';
$checkboxonl = 'Тлк';
$tooltipnonl = 'С этой опцией будут собраны тексты, которые содержат только рядомстоящие X и Y (в одной строке). По умолчанию, без этой опции поиск будет производиться на любом расстоянии в пределах одного текста.';
$checkboxnonl = 'А Б';
$tooltipltr= "+ поиск на Пали во всех книгах Кхуддака Никаи, включая поздние";
$radioltr = "+Позд";
$tooltipen = 'Поиск по англ. переводам АН, СН, МН, ДН с SuttaCentral.net дост. Суджато. Без этой опции сначала поиск будет произведен в Пали, затем в переводах sc.net и затем в переводах thebuddhaswords.net ';
$radioen = 'Англ';
$tooltipth = "Опционально. Поиск в 4 основных Никаях в Тайских переводах Suttacentral.net. Без этой опции сначала поиск будет произведен в Пали текстах, потом в переводах";
$radioth = "ไทย";
$tooltipru = "Опционально. Поиск по русским переводам АН, СН, МН, ДН с SuttaCentral.net";
$radioru = "Рус";
$tooltiptbw = "Искать во всем содержимом TheBuddhasWords.net";
$radiotbw = "TBW";


$tooltipvindef = 'Поиск определений понятия на Пали в Винае. Работает только для определений данных стандартными фразами. См в разделе для Продвинутых';
$radiovindef = "ОпрВ";

$tooltipla = "Добавить $defaultla строку после совпадения";
$checkboxla = "+$defaultla";
$regexMemo = '<h5>Памятка по RegEx</h5>
  <p>ā ī ū ḍ ḷ ṃ ṁ ṇ ṅ ñ ṭ</p>
          <p style="text-align: left;">
          
  <!--   <strong>-onl "(X|Y|...)"</strong> - найти тексты содержащие только все совпадения X, Y ... и т.д.<br> -->
       <strong>-la2 X</strong> - искать X и добавить в результаты 2 следующие строки после строки с X<br>
     <strong>X -exc Y</strong> - искать X, исключить Y<br>
    <strong>X -exc "Y(ti|nti)"</strong> - искать X, исключить Y с окончаниями на "ti" и "nti"<br> 
         <strong>\\\\bX</strong> - начало или <strong>Y\\\\b</strong> конец слова<br>
<strong>X.*Y</strong> - любое количество символов между X и Y<br>
<strong>X.{0,10}Y</strong> - от 0 до 10 символов<br>
<strong>X\\\\S*\\\\sY</strong> - рядом стоящие слова X и Y, если окончание слова X неизвестно или может быть различным<br>     
<strong>"X(\\\\S*\\\\s){0,3}Y"</strong> - расстояние в 0 или 2 слова между X и Y с любым окончанием X<br> 
<strong>[aā]</strong> - искать несколько вариантов<br>           
<strong>"Sn56.*(seyyathāpi|adhivacan|ūpama|opama)"</strong> - искать все метафоры в Самьютте 56<br> 
<strong>"(a|b|c)"</strong> - искать несколько отдельных слов одновременно<br>
<strong>\'^"mn.*X\'</strong> - искать X во всей Мадджхимма Никае<br>            
<strong>dn22.*Y</strong> - искать Y в одной Сутте ДН22<br><br> 
ИИ может сгенерировать регулярное выражение для Grep, к примеру <a class="text-white" href="https://codepal.ai/regex-generator" target=_blank>здесь</a><br>
        </p>     ';
$titlehowtovideo = 'Как пользоваться?';  
$linkhowtovideo = 'https://www.youtube.com/embed/4KIqQYSxTSE';
$titledeschowtovideo = 'How to search in Pali Suttas and Vinaya with find.dhamma.gift'; 

$fntmessage = '<p class="font-italic text-center ">
Katamañca, bhikkhave, dukkhaṁ?<br>
Что такое, монахи, боль / дуккха?
<p class="text-end">
dn22 mn141
</p>
</p>';
$mainscrollmodalheader = 'Определение Dukkha в Суттах';
$mainscrollmodal = '<p class="">Из <a href=/ru/sc/?q=dn22>dn22</a> <a href=/ru/sc/?q=mn141>mn141</a></br><h4>Katamañca, bhikkhave, dukkhaṁ?</h4></br>
Что такое, монахи, боль?</br>
</br>
Yaṁ kho, bhikkhave, <strong>kāyikaṁ dukkhaṁ</strong> kāyikaṁ asātaṁ kāyasamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>
Все, что переживается как <strong>телесная боль</strong>, телесный дискомфорт, боль или дискомфорт, вызванные телесным контактом,</br>
</br>
idaṁ vuccati, bhikkhave, dukkhaṁ.</br>
вот что называется болью.</br>
</br>
<h4>Katamañca, bhikkhave, domanassaṁ?</h4></br>
А что такое стресс / страдание?</br>
</br>
Yaṁ kho, bhikkhave, <strong>cetasikaṁ dukkhaṁ</strong> cetasikaṁ asātaṁ manosamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>
Все, что переживается как <strong>ментальная боль</strong>, ментальный дискомфорт, боль или дискомфорт, вызванные контактом мышления,</br>
</br>
idaṁ vuccati, bhikkhave, domanassaṁ.</br>
– вот что называется стрессом.</br></p>
<p class="text-end"></p>';

$transwarning = ' <i class="fa-solid fa-triangle-exclamation "></i> <b>Предупреждение!</b><br><br> Переводы выполнены не Буддой! Содержат фундаментальные ошибки главных положений его Учения. Переводы нужно читать критически. 
 <br><br>
  Самое важное из Учения Будды нужно изучить <strong> самостоятельно по Суттам</strong> на Пали. В частности, что такое Серединная Практика и Четыре Благородные Истины. Это несколько абзацев, к примеру из <strong>sn56.11</strong>.';
  
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
$prongh = ' Проект на GitHub';

$headerexamples = 'Примеры';
$examplelist = '<li>Определение понятия <a href="./assets/demo/kata.dukkha.m-question_suttanta_pali_3-5.html">dukkha</a> на Пали со ссылками на Русские переводы. Запрос: <a href="./assets/demo/kata.dukkha.m-question_suttanta_pali_3-5.html">Kata.*dukkhaṁ\\\\?</a>
             </li>
              <li>Сутта, в которой Будда говорит, что не делает <a href="./assets/demo/dvayagaaminii_suttanta_pali_1-1.html">двусмысленных (dvayagāminī) утверждений</a> на Пали со ссылками на Русский перевод</li>
           
                <li>Все сутты со словом <a href="./assets/demo/vosmerichn_suttanta_ru_139-275.html">Восьмеричный</a> Благородный Путь на Русском</li>
                <li>Все сутты со словом <a href="./assets/demo/nravstvennost_suttanta_ru_92-260.html">нравственность</a> на Русском</li>
                <li>Все сутты, где упомянут <a href="./assets/demo/sariputt_suttanta_ru_168-1055.html">Сарипутта</a> на Русском</li>
               <li>Все варианты словосочетания <a href="./assets/demo/pa.ticcasamupp_suttanta_pali_33-112.html">paṭiccasamuppado</a> на Пали со ссылками на Русские переводы</li>
               <li>Все сутты где, упоминается об <a href="./assets/demo/okean_suttanta_ru_82-259.html">океане</a> на Русском</li>
               <li>Все сутты с <a href=./assets/demo/(seyyathaapi-adhivacan-uupama-opama)-exc-opama~n~n_suttanta_pali_617-2071.html>метафорами, примерами и сравнениями</a> на Пали со ссылками на Русские переводы. Запрос: "seyyathāpi|adhivacan|ūpama|opama" </li> ';


$howtoheader = 'Как Искать?';

$contactheader = 'Контакты';
$contaccalltoaction = 'Всесторонний взгляд на Четыре Благородные Истины<br>
		в Палийских Суттах и Винае.<br> 
    Поймите наст<a target="_blank" class="text-white text-decoration-none" href=/ru/sc/?q=sn51.20&lang=pli>о</a>ящие Четыре Благородные Истины<br> 
   и п<a target="_blank" class="text-white text-decoration-none" href=/ru/sc/?q=bu-pm>о</a>л<a class="text-white text-decoration-none" target=_blank href=/ru/sc/?q=sn35.70&lang=pli>о</a>жите к<a target=_blank class="text-white text-decoration-none" href=/ru/sc/?q=mn77&lang=pli>о</a>нец б<a class="text-white text-decoration-none" href="/scripts/countdowntable.php">о</a>ли.';
                               							
$demovideo = 'Подробное Видео';	
$demovideolink = 'https://www.youtube.com/embed/iKRaa9D07-I';

$basics = 'Основы ';

$basicscontent = '<p class="mb-4"><strong>Совет #0</strong><br>
										Поиск производится на Пали, Русском, Английском и Тайском в материалах SuttaCentral.net и дополнительно thebuddhaswords.net, то есть если того или иного перевода или определенных слов нет на этих ресурсах здесь их также не будет.<br>
										К примеру в переводах с theravada.ru может не быть слова "мораль", но есть слово "нравственность".<br>
										Логика поика следующая: если вы ищете на Русском, то поиск производится только в русских переводах. На тайском - сначала поиск на пали, потом в тайских переводах. На латинице: сначала пали, потом англ переводы tbw, потом построчные переводы Suttacentral.net. 
										<br><br>
									 <strong>Совет #1</strong><br>
Для поиска на Пали вы можете печатать латинскими буквами, варианты слов встречающихся в четырех никаях (ДН, МН, СН, АН) будут предлагаться автоматически.<br>
При желании вы можете копировать специальные символы отсюда ā ī ū ḍ ḷ ṃ ṁ ṇ ṅ ñ ṭ или из памятки по Regex, иконка-шестеренки.
<br><br>
<strong>Совет #2 Кхуддака Никая</strong><br>
									 Поиск делается во всех суттах ДН, МН, СН, АН. Крайне рекомендуется сначала разобраться с терминами и понятиями, так как они изложены в этих четырех сборниках текстов. И только при необходимости обращаться к малому собранию текстов (КН), так как в него также входят поздние работы.<br>
									 Запустите поиск с опцией -kn, чтобы также искать в следующих книгах КН: Дхаммапада, Удана, Итивуттака, Суттанипата, Тхерагатха, Тхеригатха. Другие книги КН не используются в поиске даже с параметром -kn. Вы можете использовать другие поисковые сайты для поиска в Джатаках и остальных книгах КН.
									 <br>
									 Пример #1: -kn jamm 
									 <br>
									 Этот запрос выведет все совпадения по корню jamm из DN, MN, SN, AN + перечисленные книги KN.
																		 <br>
									 Пример #2: jamm 
									 <br>
									 Выведет совпадения только из DN, MN, SN, AN.
									 <br><br>
<strong>Совет #3 Виная</strong><br> 
      Если вы хотите искать в текстах Винаи добавьте -vin к поисковому запросу. К примеру, чтобы искать совпадение по cetana в Винае запрос должен выглядеть так: -vin cetana <br><br>
			<strong>Совет #4</strong><br>
    Используйте корень слова для более широких результатов поиска. Или к примеру с или без приставок, или окончаний, чтобы сузить результаты. 
<br><br>
<strong>Совет #5</strong><br>
Сделайте упор на Пали, используйте другие языки во вторую очередь. Пали - это язык на котором записаны самые древние тексты связанные с Дхаммой и Будда говорил на языке более близком или ставшим в последствии Пали, он гарантированно не говорил ни на Русском, ни на английском.	
<br><br>
<strong>Совет #6</strong><br>Результаты поиска на Пали - это: таблица совпадений по Суттам/Текстам с цитатами и таблица по словам. Используйте оба типа результатов, чтобы повысить пользу для вас. Для доугих языков таблицы по словам тоже генерируются, но могут работать некорректно.<br><br>
<strong>Совет #7</strong><br>Минимальная длинна поискового запроса - 3 символа. Но если возможно ищите более длинные шаблоны. Так вы получите более точные результаты.<br><br>
<strong>Совет #8</strong><br> 
Мы рекомендуем искать на Пали. Так вы получите наилучшие результаты и вы разовьёте очень важную привычку - не полагаться слепо на переводы. Но очевидно, вы также можете получить некоторые преимущества от поисков на других языках. Если вы ищете животных, растения и т.п. К примеру, в текстах на Пали используется как минимум четыре разных слова. Тогда как на русском и английском это "змея" и "гадюка".<br><br>
									<strong>Совет #9</strong><br>
Если запрос завершается ошибкой из-за таймаута, попробуйте более длинный поисковый запрос или более специфичное слово.  <br><br>
	<strong>Совет #10 Быстрые переходы</strong><br>
   Также как на <a href="https://sc.dhamma.gift">sc.Dhamma.gift</a> или <a href="https://find.dhamma.gift/sc">find.dhamma.gift/sc</a> вы можете вводить идентификаторы сутт так как они используются на suttacentral.net и вместо поиска вы перейдете в Палийский текст сутты, с возможностью быстрого переключения на построчный Английский перевод.<br>
   Через строку поиска можно перейти в сутты dn, mn, sn, an, ud из kn и тексты Винаи. <br><br>
<!--								  <strong>Совет #11</strong><br>
                                   !!!Временно отключён!!! Если запрос завершается ошибкой из-за таймаута и вы не можете использовать  более длинный поисковый запрос, попробуйте <a href="./bg.php">Фоновый Режим</a>. Он может помочь.<br><br>  -->
<p class="mb-4"><strong>Что именно подсчитывается в колонке Mtphr из таблицы результатов?</strong><br>
										Подсчитываются совпадения по всему тексту, без привязки к критерию поиска:<br>
										"seyyathāpi|adhivacan|ūpama|opama|opamma"<br>
										Игнорируются:<br>
    "adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ"<br>
    Создайте issue на github или напишите по почте, если вы найдёте другие критерии.
    <br><br>                    
</p>';


$advanced = 'для Продвинутых';
$advancedcontent = '<strong>Совет #1</strong><br>
								    Опция применима только для поисков на пали или английском! Если вы хотите найти определенное слово в определенной сутте, самьютте, никае - запустите поиск в таком виде: Sn17.*seyyathāpi
								  <br>Запрос из примера выведет в таблицы все метафоры и сравнения из Sn17.<br>
								  Если вы хотите найти разные слова в определенной сутте или группе сутт, запрос должен выглядеть так, включая кавычки:
								  "Sn51.*(seyyathāpi|adhivacan|ūpama|opama)" 
								  <br>данный запрос выгрузит все метафоры, сравнения, перефразы и примеры из Sn51
								  <br><br>
								  <strong>Совет #2</strong><br>
								   Чтобы добавить вариации используйте [], к примеру запрос nand[iī] выведет в таблицы совпадения по обоим вариантам nandi и nandī.
								   <br>
								   По умолчанию такая вариация установлена для буквы "е", она автоматически преобразуется в [ёе], если вам требуется найти совпадения только с "е", соответственно, то запрос можно сделать в таком виде: [е], к примеру впер[е]д.
								   <br>
								   С буквой ё поиск можно осуществлять без доп. символоа.
								 <br><br>
						
									<strong>Совет #3</strong><br>
								   Если вы хотите найти слова начинающиеся или заканчивающиеся с определенного шаблона, используйте \\\\b в начале и\или в конце шаблона поиска, к примеру<strong>\\\\bkummo\\\\b</strong> выведет в таблицы только kummo и пропустит kummova и любые другие совпадения<br><br>
									<strong>Совет #4</strong><br>
								   Чтобы исключить один шаблон из результатов другого шаблона используйте аргумент -exc.<br>
								   Пример: dundubh -exc devadundubh - этот запрос позволит вам выгрузить совпадения по словам похожим на dundubh, но без devadundubh<br><br>
<strong>Совет #5</strong><br>
								   Вы можете использовать регулярные выражения (regex) синтаксиса GNU grep -E. С использованием escape-последовательности (\\) они должны работать. 
								   Специальные ИИ могут сгенерировать регулярное выражение для Grep, к примеру <a href="https://codepal.ai/regex-generator" target=_blank>здесь</a>.
								   Почитайте, поизучайте regex в интернете.<br><br>

	<strong>Совет #6</strong><br>
								   Почитайте на сайте проекта или в интернете о <a target="_blank" href="https://datatables.net/">DataTables</a>, результаты, которые вы получаете из текстов выводятся с помощью них.<br><br>
								   
							<strong>Совет #7 Подборки</strong><br>
								   Вы можете создавать подборки текстов. <br>
								   Примеры запросов:<br> 
								   "sn42.8|sn20.5" (включая кавычки) выведет в одну таблицу две Сутты полностью<br>
								   "Sn20.1" (включая кавычки) выведет Sn20.1 sn20.10 sn20.11 и тд в одну таблицу<br>
								   "Sn20.1\\\\b" (включая кавычки) выведет только одну Сутту
								   <br><br>

									<strong>Как работает опция "Опр" - Определение</strong><br>
									Если эта опция активирована поиск выполняется по следующим критериям:<br>
grep -E -A1 -Eir "${defpattern}.*nāma|an1\..*${defpattern}|An2.*Dv.*${defpattern}|An3.*(Tis|Tay|Tī).*${defpattern}|An4.*(Cattā|Cata).*${defpattern}|An5.*Pañc.*${defpattern}|An6.*cha.*${defpattern}|An7.*Satta.*${defpattern}|An8.*Aṭṭh.*${defpattern}|An9.*Nav.*${defpattern}|an1[10].*das.*${defpattern}|Seyyathāpi.*${defpattern}|${defpattern}[^\s]{0,3}sutta|(dn3[34]|mn4[34]).*(Dv|Tis|Tay|Tī|Cattā|Cata|Pañc|cha|Satta|Aṭṭh|Nav|das).{0,20}${defpattern}|\bKas.{0,60}${defpattern}.{0,9}\?|Katth.*${defpattern}.*daṭṭhabb|\bKata.{0,20}${defpattern}.{0,9}\?|Kiñ.*${defpattern}.{0,9} vadeth|${defpattern}.*adhivacan|vucca.{2,5} ${defpattern}{0,7}|${defpattern}.{0,15}, ${defpattern}.*vucca|${defpattern}.{0,9} vacan|Yadapi.*${defpattern}.*tadapi.*${defpattern}" --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} <br>
Пожалуйста, создайте issue на github или напишите по почте, если вы найдёте другие критерии.<br><br> ';

$closemodal = 'Закрыть Окно';

$head2recomlinks = "Полезные Ссылки ";
$detailonline = 'онлайн';
$detailoffline = 'оффлайн';
$detailonandoffline = 'онлайн и оффлайн';
$detailapp = 'приложение';
$detailtable = 'таблица';
$detailtextbook = 'учебник';

$header5fdgoffline = 'find.dhamma.gift Оффлайн Версия';

$pfdg = 'Всепроникающий поиск по Суттам и Винае';
$pfdgoffline = 'Оффлайн версия и инструкция по установке. Пока только Android🙏';

$head5othermat = 'Учебные материалы на русском и английском';
$pothermat = 'Подборка учебников и таблиц';

$pconj = 'Спряжения неправильно переведены реже чем падежи, но все же встречаются';
$smcheckpali = 'Обязательно сверяйтесь с Пали';

$pcases = 'В англ. переводах и соответственно русских переводах с англ. языка падежи часто переведены неправильно';
$ptextbook = 'Рекомендуемый Учебник';

$pthru = 'Самая полная коллекция Русских переводов Суттанты';
$pthsu = 'Много вариантов переводов. Построчно Пали-Англ-Русский.';
$smthsu = 'Особенно рекомендован для изучения текстов Дигха Никаи';

$pdpr = 'Мощный инструмент для исследования Сутт и изучения Пали. И альетрантивный поиск';
$smdpr = 'Встроенный Пали-Англ словарь';

$ptbw = 'Полная коллекция Пали-Англ переводов по абзацам';
$smtbw = 'Пали-Англ словарь встроен';
$psc = 'Самая полная коллекция построчных переводов Типитаки Пали-Англ';
$smsc = 'Пали-Англ словарь можно включить в настройках';

$psclight = 'Открывайте тексты suttacentral.net в разы быстрее';
$smsclight = 'Пали-Англ построчно с удобным переключением';
$ptamilcube = 'Простой Англо-Пали словарь';

$head5words = 'Все Пали слова из Суттанты (кроме КН) и Винаи';
$pwords = 'По алфавиту с указанием количества';

$pwids = 'Прекрасная онлайн коллекция словарей. Помимо Пали -  многие духовные традиции Индии';
$smwisd = 'Очень полезно для сложных понятий';

$pdpd = 'Объёмный и самый удобный Пали-Англ словарь и грамматика Пали';
$smdpd = 'Доступно для ПК, Linux, Mac, Android, IOS';

$head5dpdru = 'DPD Русская Версия';
$pdpdru = 'Небольшой Пали-Русский словарь основанный на Digital Pali Dictionary';
$smdpdru = 'Альтернатива DPD, для тех кто не владеет английским';

$head5pts = 'Словарь Pali Text Society';
$ppts = 'Один из самых известных Пали-Англ словарей';

$head5cse = 'Google от dhamma.gift';
$psce = 'Google поиск по рекомендованным ресурсам';
$smcse = 'Особенно удобен для поисков на Wisdomlib';

$head5plikeyboard = 'Pali раскладка';
$pplikeyboard = 'Перед установкой Пали-плагина установите O keyboard';
$smplikeyboard = 'для активации: Язык - Транслитерация - Pali (IAST)';

$pt2s = 'Преобразование Русс и Англ текстов в речь';
$smt2s = 'для прослушивания текстов sc.dhamma.gift, theravada.ru и др.';

$pscvoice = 'Преобразование Пали и Англ текстов в речь';
$smscvoice = 'для прослушивания текстов suttacentral.net';

$title404 = 'Ошибка 404';
$p404 = ' Страница не найдена. Но';
$link404 = '/ru/sc/?q=sn38.4';
$hreftext404 = 'На Главную';

$dpddesc = 'Digital Pali Dictionary Онлайн';

$dpdpart = '<h3>Скачать Словарь "DPD"</h3>
<a target="_blank" href="https://digitalpalidictionary.github.io/"><p>Сайт DPD</p></a>

<a target="_blank" href="https://devamitta.github.io/pali/"><p>DPD Русская Версия</p></a>
<h3>Скачать Оболочку mDict</h3>
';



}
else {
$lang = "en";
$htmllang = "en";
$mainpage = '/';
$mainscpage = '/sc';
$searchcaption = 'Search';
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
$tooltipdef = 'Search for definitions in 4 main Nikayas in Pali. What is it, how many and what types, metaphors. Works only if definition was given in standard phrases. If nothing will be found in Suttas it will automatically search in Vinaya. For all-round view studing all related Suttas is recommended. See "Advanced" for details';
$radiodef = 'Def';
$tooltipvin = 'Search in Pali Vinaya';
$radiovin = 'Vin';
$tooltipkn = '+ search in Pali Khuddaka Nikaya: dhp, iti, ud, snp, thag, thig';
$radiokn = '+KN';
$tooltiponl = 'X Y ... Finds texts containing only both and more matches for X, Y ... Without this option only texts where X Y are standing next to each other will be found';
$checkboxonl = 'Onl';
$tooltipnonl = 'By default only texts containing X Y ... on any distance between  words will be found. With this option texts containing only X Y standing next to each other will be in results.';
$checkboxnonl = 'A B';
$tooltipen = 'Search in an, sn, mn, dn in English line by line translations by B. Sujato as on Suttacentral.net. Without this option search will start with Pali texts, then sc.net texts, then thebuddhaswords.net translations';
$radioen = 'Eng';
$tooltipltr= "+ search in Pali in all books of kn including later texts";
$radioltr = "+Later";
$tooltipth = "(optional) Search in an, sn, mn, dn in Thai Suttacentral.net translations. Without this option default search will start with Pali texts, then with sc.net Thai translations";
$radioth = "ไทย";
$tooltipru = "(optional) Search in an, sn, mn, dn in Russain Suttacentral.net translations";
$radioru = "Rus";
$tooltiptbw = "Search in all contents of TheBuddhasWords.net";
$radiotbw = "TBW";

$tooltipvindef = 'Search for definitions in Pali Vinaya. What is it, how many and what types. Works only if definition was given in standard phrases. For all-round view studing all related Rules is recommended. See Advanced for details';
$radiovindef = "DefV";
$tooltipla = "Add $defaultla line after match";
$checkboxla = "+$defaultla";


$regexMemo = ' <h5>RegEx Memo</h5>
  <p>ā ī ū ḍ ḷ ṃ ṁ ṇ ṅ ñ ṭ</p>
          <p style="text-align: left;">
     <!--  <strong>-onl "(X|Y|...)"</strong> - find texts containing only all of the X, Y ... etc patterns<br> -->
     <strong>-la1 X</strong> - search for X, add 1 next line to output after lines containing X<br>
       <strong>X -exc Y</strong> - search for X, exclude Y<br>
           <strong>X -exc "Y(ti|nti)"</strong> - search for X, exclude Y ending with "ti" and "nti"<br> 
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
<br>AI can generate RegEx for Grep, e.g. <a class="text-white" href="https://codepal.ai/regex-generator" target=_blank>here</a><br>
</p>          ';
$titlehowtovideo = 'How-To Video';
$linkhowtovideo = 'https://www.youtube.com/embed/Q_SLMrg6L1k?modestbranding=1&hl=en-US';
$titledeschowtovideo = 'How to search in Pali Suttas and Vinaya with find.dhamma.gift';
$fntmessage = 'All-round view on Four Noble Truths<br>
        in Pali Suttas and Vinaya.<br>
        Understand the real meaning <br>
        of Four Noble Truths<br>
        and finish the p<a class="text-black text-decoration-none" href="/scripts/countdowntable.php">a</a>in.';


$mainscrollmodalheader = 'Definition of Dukkha in Suttas';

$mainscrollmodal = '<p class="">
From <a href="/sc/?q=dn22">dn22</a> <a href="/sc/?q=mn141">mn141</a></br>
<h4>Katamañca, bhikkhave, dukkhaṁ?</h4></br>
“And what is pain?</br></br>
Yaṁ kho, bhikkhave, <strong>kāyikaṁ dukkhaṁ</strong> kāyikaṁ asātaṁ kāyasamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>
Whatever is experienced as  <strong>bodily pain</strong>, bodily discomfort, pain or discomfort born of bodily contact, </br>
</br>
idaṁ vuccati, bhikkhave, dukkhaṁ.</br>
that is called pain.</br>
</br>
<h4>Katamañca, bhikkhave, domanassaṁ?</h4></br>
“And what is stress?</br>
</br>
Yaṁ kho, bhikkhave, <strong>cetasikaṁ dukkhaṁ</strong> cetasikaṁ asātaṁ manosamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>
Whatever is experienced as <strong>mental pain</strong>, mental discomfort, pain or discomfort born of mental contact, that is called distress,</br>
</br>
idaṁ vuccati, bhikkhave, domanassaṁ.</br>
that is called stress.</br></p>';

        
$transwarning = ' <i class="fa-solid fa-triangle-exclamation "></i> <b>Warning about translations!</b><br><br> Translations did not come from Buddha! Be scrutinizing and critical reading them.<br><br> The most important fundamentals of Buddhas Teaching are better to be learned<strong> on one\'s own from Suttas</strong> in Pali. The minimum is: Middle Practice and Four Noble Truths. E.g. few paragraphs from <strong>sn56.11</strong>.';   

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
$prongh = ' Project on GitHub';


$headerexamples = 'Examples';
$examplelist = '<li>Definition of the <a href="/assets/demo/kata.dukkha.m-question_suttanta_pali_3-5.html">dukkha</a> in Pali with quotes in English. Query is: <a href="/assets/demo/kata.dukkha.m-question_suttanta_pali_3-5.html">Kata.*dukkhaṁ\\\\?</a></li>

 <li>Sutta where Buddha says that he doesn\'t make <a href="/assets/demo/dvayagaaminii_suttanta_pali_1-1.html">ambiguous (dvayagāminī) statements</a> in Pali with English quote</li>

             <li>All variants of the word <a href="/assets/demo/pa.ticcasamupp_suttanta_pali_33-112.html">paṭiccasamuppado</a> in Pali with quotes in English</li>
            
                <li>All suttas about <a href="/assets/demo/eightfold_suttanta_en_158-343.html">Eightfold</a> Path in English</li>
                <li>All suttas that took place or related to <a href="/assets/demo/สาวัตถี_suttanta_th_913-1168.html">Savathi</a> in Thai</li>
                <li>All suttas where <a href="/assets/demo/sariputt_suttanta_ru_168-1055.html">Sariputta</a> was mentioned in Russian</li>
    
             <li>All suttas about or containing the word <a href="/assets/demo/ocean_suttanta_en_85-228.html">ocean</a> in English</li>
                 <li>All Suttas with <a href=./assets/demo/(seyyathaapi-adhivacan-uupama-opama)-exc-opama~n~n_suttanta_pali_617-2071.html>metaphors & similies</a> in Pali and English</li>   ';
$howtoheader = 'How to Search';

$contactheader = 'Contacts';
$contaccalltoaction = 'Find the Noble Eightfold Path.<br>
							Understand the Four Noble Truths.<br>Dhamma - is Actuality.
                      ';
 $demovideo = 'Demo Video';  
 $demovideolink = 'https://www.youtube.com/embed/Q_SLMrg6L1k?modestbranding=1&hl=en-US';
 $basics = 'Tips & Tricks';
 $basicscontent = '<p class="mb-4"><strong>Tip #0</strong><br>Search available in Pali, English, Russian and Thai materials of SuttaCentral.net and also in thebuddhaswords.net. If some text is not presented there, you wont be able to find it.<br>
Also, e.g. if "sankhara" is translated as "formation" in thw materials you won\'t find it in suttacentral.net, as it\'s translated as "choice" and vice-versa.<br>
The following logic is applied: if you search in Roman script: 1st is Pali, then tbw materials, then Suttacentral.net materials. In Thai script - 1st is Pali, then Thai translations. In Cyrillic - Russian translations only.
<br><br>
<strong>Tip #1</strong><br>
Use special characters ā ī ū ḍ ṁ ṁ ṇ ṅ ñ ṭ<br><br>
<strong>Tip #2 Khuddaka NIkaya</strong><br>
Search is performed in All DN, MN, SN, AN. use <strong>-kn</strong> option if you also want to include results from the following books of KN: Dhammapada, Udāna, Itivuttaka, Suttanipāta, Theragāthā, Therīgāthā. Other books of KN will not be used in the search even with option. You may use alternative services to make searches in Jatakas and other book of KN.<br>
									 Example #1: -kn jamm
									 <br>Will search in DN, MN, SN, AN + books of KN listed above
									 <br>
									 Example #2: jamm
									 <br>Will search in DN, MN, SN, AN only.
									 <br><br>
									 
									 <strong>Tip #3 Vinaya</strong><br> 
                                   if you\'re willing to search in Vinaya add -vin to your search request. For pali vinaya search for cetana the line will look like: -vin cetana <br><br>

									 <strong>Tip #4 Stem</strong><br>
                                    Use stem of the word for broader results with or without prefixes or endings. 
									<br><br>
									          <strong>Tip #5</strong><br>
                                    Prefer Pali to other languages. Pali is the language in which the oldest Dhamma related texts are written.	
									<br><br>
									<strong>Tip #6</strong><br>
									For Pali search results you have two options: results sorted by Suttas/Texts with quotes and by words. Use both to get some extra details.<br><br>
                                   <strong>Tip #7</strong><br>Minimal length of search pattern is 3 symbols. But if possible search for longer patterns. Then you will get more precise results.<br><br>
									<strong>Tip #8</strong><br> 
                                   We highly recommend to search in Pali. As it will give the best results, and you will develop a very important habit to look into Pali and do not rely blindly on the translations. But obviously you can get some benefits from searches in translations. If you are looking for animals, plants, etc. There are at least 4 different pali words for a snake but in Russian or English - it\'s just "a snake" or "a viper". <br><br>
				
									<strong>Tip #9</strong><br>
                                   if your request fails due to timeout try longer search pattern.  <br><br>
								   <strong>Tip #10</strong><br>
                                   if your request fails due to timeout, and you can\'t use longer search pattern try <a href="./bg.php">Background Mode</a>. It might work.
								   <br><br> 
<strong>What is Mtphr count in result table?</strong><br>
										Matches in all text, not connected to search pattern:<br>
										"seyyathāpi|adhivacan|ūpama|opama|opamma"<br>
										Following words are ignored:<br>
    "adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ"<br>
    Create an issue on github or send an email, if you\'ll find other criteria.
    <br><br>
</p>';

$advanced = 'Advanced';
$advancedcontent = '<strong>Tip #1</strong><br>
								   If you want to find some word in particular sutta, samyutta or nikaya run search like this: Sn17.*seyyathāpi
								  <br>This example will search for all similies and metaphors in all Sn17.<br><br>
								  <strong>Tip #2</strong><br>
								   To add variations you may add [], e.g. nand[iī] this will search for both nandi and nandī matches.
								 <br><br>
								  
									<strong>Tip #3</strong><br>
								   If you want to find words beginning or ending from some pattern use \\\\b before and/or in the end of the pattern. e.g. <strong>\\\\bkummo\\\\b</strong> will search for only kummo and will skip kummova and any other<br><br>
									<strong>Tip #4</strong><br>
								   You may use regexes that are applicable in GNU grep -E statements. With proper escaping (\\\\) they should work. 
								   Specialized AI can generate RegEx for Grep, e.g. <a href="https://codepal.ai/regex-generator" target=_blank>here</a>.
								   Read and study regex to boost your search abilities.<br><br>
								   
								   <strong>Tip #5</strong><br>
								
								   Read about <a target="_blank" href="https://datatables.net/">DataTables</a> on project webpage or elswhere. Results are generated in datatables.<br><br>
								   
			<strong>How "Def" option works?</strong><br>
									With Def following search will run:<br>
grep -E -A1 -Eir "${defpattern}.*nāma|an1\..*${defpattern}|An2.*Dv.*${defpattern}|An3.*(Tis|Tay|Tī).*${defpattern}|An4.*(Cattā|Cata).*${defpattern}|An5.*Pañc.*${defpattern}|An6.*cha.*${defpattern}|An7.*Satta.*${defpattern}|An8.*Aṭṭh.*${defpattern}|An9.*Nav.*${defpattern}|an1[10].*das.*${defpattern}|Seyyathāpi.*${defpattern}|${defpattern}[^\s]{0,3}sutta|(dn3[34]|mn4[34]).*(Dv|Tis|Tay|Tī|Cattā|Cata|Pañc|cha|Satta|Aṭṭh|Nav|das).{0,20}${defpattern}|\bKas.{0,60}${defpattern}.{0,9}\?|Katth.*${defpattern}.*daṭṭhabb|\bKata.{0,20}${defpattern}.{0,9}\?|Kiñ.*${defpattern}.{0,9} vadeth|${defpattern}.*adhivacan|vucca.{2,5} ${defpattern}{0,7}|${defpattern}.{0,15}, ${defpattern}.*vucca|${defpattern}.{0,9} vacan|Yadapi.*${defpattern}.*tadapi.*${defpattern}" --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} <br>
Please, create an issue on github or send an email, if you\'ll find other criteria.<br><br> ';


$closemodal = 'Close Window';

$head2recomlinks = 'Recommended Links';
$detailonline = 'online';
$detailoffline = 'offline';
$detailonandoffline = 'online & offline';
$detailapp = 'app';
$detailtable = 'table';
$detailtextbook = 'textbook';

$header5fdgoffline = 'find.dhamma.gift Offline Edition';
$pfdg = 'All encompassing search within all Suttas and Vinaya';
$pfdgoffline = 'Offline version & setup instruction. Right now Android only🙏';

$head5othermat = 'Materials for studying Pali in English and Russian';
$pothermat = 'Collection of textbooks and tables';

$pconj = 'Conjugations sometimes mistranslated';
$smcheckpali = 'Check Pali original';

$pcases = 'Cases are mistranslated pretty often';

$ptextbook = 'Highly recommended';
$pthru = 'The most complete translation of Suttanta in Russian';
$pthsu = 'Multiple translation options. Pali-English-Russian line-by-line';
$smthsu = 'Especially recommended for studying Digha Nikaya';

$pdpr = 'Profound online tool for Pali readings and alternative search';
$smdpr = 'Built-in Pali-English dictionary';
$ptbw = 'Very impressive paragraph-by-paragraph Pali-English collection';
$smtbw = 'Pali-English on hover dictionary built-in';
$psc = 'The most complete line-by-line Pali-English collection';
$smsc = 'Pali-English dictionary can be turned on in settings';

$psclight = 'Suttacentral.net texts with quicker lightweight interface';
$smsclight = 'Pali-English Line-by-line';
$ptamilcube = 'Simple Online English-Pali Dictionary';
$head5words = 'All Pali words from Suttanta (except KN) & Vinaya';
$pwords = 'In alphabetical order with count number';
$pwids = 'Big online collection of dictionaries. Not only Pali, but multiple spiritual traditions of India';
$smwisd = 'Very helpful for difficult terms';

$head5cse = 'Google from dhamma.gift';
$psce = 'Search with Google within recommended resources';
$smcse = 'Especially convenient for Wisdomlib';

$pdpd = 'The biggest and quickest dictionary and pali grammar';
$smdpd = 'Available for PC, Linux, Mac, Android, IOS';

$head5dpdru = 'DPD Russian Version';
$pdpdru = 'Small Pali-Russian Dictionary based on DPD';
$smdpdru = '';


$head5pts = 'Pali Text Society Dictionary';
$ppts = 'One of the most famous Pali English dictionaries';

$head5plikeyboard = 'Pali Layout';
$pplikeyboard = 'Install "O keyboard" itself before installing plug-in';
$smplikeyboard = 'to add Pali: Language - Transliteration - Pali (IAST)';

$pt2s = 'Text-to-Speech generator for English and Russian';
$smt2s = 'Listen to sc.dhamma.gift, theravada.ru & other';
$pscvoice = 'Generates Pali & English text-to-speech';
$smscvoice = 'for suttacentral.net texts';

$title404 = '404 Error';
$p404 = ' Page not found. But';
$link404 = '/sc/?q=sn38.4';
$hreftext404 = 'Go Home';

$dpddesc = 'Digital Pali Dictionary Online';

$dpdpart = '<h3>Download DPD</h3>
<a target="_blank" href="https://digitalpalidictionary.github.io/"><p>DPD Official</p></a>

<a target="_blank" href="https://devamitta.github.io/pali/"><p>DPD Russian Edition</p></a>
<h3>Download MDict</h3>
';

}
?>
