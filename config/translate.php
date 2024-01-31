<?php
if (strpos($_SERVER['REQUEST_URI'], "/ru") !== false){
$lang = "ru";

$htmllang = "ru";
$mainpage = '/ru';
$mainscpage = $mainpage . '/sc';
$mainreadlink = '/ru/read.php';
$searchcaption = 'Поиск';
$clearaption = 'Очистить';
$btnsave = 'Сохр. по умолч.';
$btnreset = 'Сбросить';

$gearbutton = 'дополнительные настройки';
$linksothermat = 'https://drive.google.com/drive/u/1/folders/1UU-y5idRNpfcVTripRUtyTVcOgdwjMGN';
$linktextbook = "$linktextbookru";

$maintitle = 'Точный поиск в Пали Суттах и Винае';
$metadesc = 'Точный поиск в Пали Суттах и Винае. Поисковый Сайт Освобождения.';
$metakeywords = 'Сутты, Дхамма, Дхарма, Пали, Палийский канон, буддизм, dhamma, sutta, Buddhism, pali Canon';
$titletwit = 'Точный поиск в Пали Суттах и Винае. ';
$ogdesc = 'Поисковая Система Освобождения. Находите определения и информацию в Суттах и Винае на Пали, Русском, Английском и Тайском';
$oglocale = 'ru_RU';
$ogshare = 'https://find.dhamma.gift/assets/img/social_sharing_gift_rus.jpg';
$menu = 'Меню';
$menumain = 'Главная';
$menuread = 'Читать';
$menuhist = 'История';
$menuhowto = 'Помощь';
$menuabout = 'О Проекте';
$menulinks = 'Полезное';
$menucontact = 'Контакты';

$poweredby = 'Powered by NI';
$tooltippoweredby = 'Natural Intelligence, Естественный Интеллект, Dhamma Интеллект';

$tooltiptitle = 'На Pāḷi, Русском, ไทย, සිංහල и Английском';
$title = 'Найдите Истину';
$tooltippli = 'Поиск на Пали по-умолчанию. По Суттам an, sn, dn, mn. Ангутара Никаи, Саньютта Никаи, Маджжхима Никаи, Дигха Никаи';
$radiopli = 'Pāḷi';
$tooltipdef = 'Поиск определений понятия на Пали в 4 Никаях. Что это, какие виды бывают, какими метафорами описывается. Если в Суттах не будет результатов, то поиск автоматически проведется в определениях из Винаи. Работает только для определений данных стандартными фразами. См. в "для Продвинутых"';
$radiodef = 'Опр';

$tooltipsml = 'Поиск сравнений, метафор, символов понятия на Пали в 4 Никаях. Работает только для определений данных стандартными фразами.';
$radiosml = 'Пдб';

$tooltiptextype = '<strong>Pāḷi</strong> - Ангутара Никаи (AN), Саньютта Никаи (SN), Маджжхима Никаи (MN), Дигха Никаи (DN)<br><br>
<strong>Виная</strong> - Поиск в Патимоккхах и Вибхангах Винаи на Пали и Английском. <br><br>
<strong>+KN</strong> - 4 Никаи + Удана (Ud), Дхаммапада (Dhp), Итивутака (Iti), Суттанипата (Snp), Тхерагатха (Thag), Тхеригатха (Thig)<br><br>
<strong>Поздние</strong> - 4 Никаи + поиск на Пали во всех книгах Кхуддака Никаи, включая поздние<br><br>
<strong>+Kd, Pvr</strong> - Виная + Кхандхаки и Паривара<br><br>
<strong>TBW</strong> - поиск в материалах theBuddhasWords.net<br><br>
<strong>SC.net</strong> - поиск в англ переводах 4 никай SuttaCentral.net
';
$tooltipsearchtype = '<strong>По умолчанию</strong> - все совпадения<br><br>
    <strong>Определения</strong> - Поиск нескольких главных определений понятия на Пали в 4 Никаях. Что это, какие виды бывают, какими метафорами описывается. Работает только для определений данных стандартными фразами. <br><br>
    <strong>Сравнения</strong> - Поиск сравнений, метафор, символов понятия на Пали в 4 Никаях. Работает только для определений данных стандартными фразами.<br><br>
    <strong>Все определения</strong> - Поиск всех определений понятия. Логика описана в разделе помощи для Продвинутых.<br><br>
        <strong>Топ-1 или 5 или 10</strong> - Быстрый поиск X текстов, где больше всего совпадений. Если не нужны все результаты.
    ';
$listdefall  = "Все определения";
$listnm10 = "Топ-10";
$listnm = "Топ-5";
$listnm1 = "Топ-1";
$listdef = "Определения";
$listsml = "Сравнения";
$liststd = "Все совпадения";
$tooltipvin = 'Поиск в Винае на Пали';
$radiovin = 'Виная';
$tooltipkn = 'Поиск на Пали в 4 никаях + поиск в 6 книгах Кхуддака Никаи: ud, dhp, iti, snp, thag, thig. Удана, Дхаммапада, Итивутака, Суттанипата, Тхерагатха, Тхеригатха';
$radiokn = '+КН';
$tooltiponl = 'X Y ... могут быть на любом расстоянии в рамках одного текста. Без этой опции (по умолчанию) поиск идёт только по рядомстоящим словам. ';
$checkboxonl = 'Любое расстояние';
$tooltipnonl = 'С этой опцией будут собраны тексты, которые содержат только рядомстоящие X и Y (в одной строке). По умолчанию, без этой опции поиск будет производиться на любом расстоянии в пределах одного текста.';
$checkboxnonl = 'А Б';
$tooltipltr= "+ поиск на Пали во всех книгах Кхуддака Никаи, включая поздние";
$radioltr = "+Позд";
$radiovinall = "+Kd, Pvr";
$tooltipen = 'Поиск по англ. переводам АН, СН, МН, ДН с SuttaCentral.net дост. Суджато. Без этой опции сначала поиск будет произведен в Пали, затем в переводах sc.net и затем в переводах thebuddhaswords.net ';
$radioen = 'SC.net';
$tooltipth = "Опционально. Поиск в 4 основных Никаях в Тайских переводах Suttacentral.net. Без этой опции сначала поиск будет произведен в Пали текстах, потом в переводах";
$radioth = "ไทย";
$tooltipru = "Опционально. Поиск по русским переводам АН, СН, МН, ДН с SuttaCentral.net";
$radioru = "Рус";
$tooltiptbw = "Искать во всем содержимом TheBuddhasWords.net";
$radiotbw = "TBW";


$monktype = array("монахом" => "imassa ca bhikkhuno",
"тхерой" => "tassa ca therassa",
"сообществом монахов" => "tassa ca saṅghassa"
);

$randomKey = array_rand($monktype);
$randomValue = $monktype[$randomKey];

$howtosearchquotetooltip = '';
$howtosearchquote = '<p>Tāni ce sutte osāriyamānāni vinaye sandassiyamānāni na ceva sutte osaranti, na ca vinaye sandissanti, niṭṭhamettha gantabbaṃ: "addhā, idaṃ na ceva tassa bhagavato vacanaṃ; ' . $randomValue . ' duggahita"nti. Iti hetaṁ, bhikkhave, chaḍḍeyyātha.<br><br>
Если при поиске в Суттах и сверке с Винаей они (учения, практики, методы, цитаты, истории, что-либо приписываемое Будде) не находятся в Суттах и не проходят сверку с Винаей, следует сделать заключение: "Определенно, это не слово Благословенного, оно ошибочно понято тем ' . $randomKey . '". Таким образом, монахи, вам следует это отвергнуть. 
</p>
<p class="text-end"><a target=_blank href=/ru/sc/?q=dn16&lang=pli-eng#4.8.6>dn16</a> <a target=_blank href=/ru/sc/?q=an4.180&lang=pli-eng#2.7>an4.180</a></p>';
$tooltipvindef = 'Поиск определений понятия на Пали в Винае. Работает только для определений данных стандартными фразами. См в разделе для Продвинутых';
$radiovindef = "ОпрВ";

$tooltipla = "Добавить $defaultla строки после совпадения";
//$checkboxla = "+" . $defaultla * 2 . " строки";
$checkboxla = "+" . $defaultla . " строки";
$regexMemoh5 = '<h5>Памятка по RegEx</h5>';

$lax = "искать X и добавить в результаты $defaultla (значение можно менять) следующие строки после строки с X";
$lbx = "искать X и добавить в результаты $defaultla предыдущие строки перед строкой с X";
$exc = "искать X, исключить Y и Z";
$excfew = 'искать X, исключить Y с окончаниями на "ti" и "nti"';
$begin = 'начало или';
$end = 'конец слова';
$anynumber = 'любое количество символов между X и Y';
$fewsymbols = 'от 0 до 10 символов';
$nextwords = 'рядом стоящие слова X и Y, если окончание слова X неизвестно или может быть различным';
$fewwords = 'расстояние в 0 или 2 слова между X и Y с любым окончанием X';
$variants = 'искать несколько вариантов';
$optionalletter = 'буква в [ ]? опционально';
$variantsexc = 'искать tatt исключив tatth';
$metaphorssmlletter = 'искать все сравнения, метафоры в Самьютте 56';
$searchfewwords = 'искать несколько отдельных слов одновременно';
$inallnikaya = 'искать X во всей Мадджхимма Никае';
$inonesutta = 'искать Y в одной Сутте ДН22';
$regexlink = 'ИИ может сгенерировать регулярное выражение для grep -Ei, к примеру <a class="text-white" href="https://codepal.ai/regex-generator" target=_blank>Codepal.ai</a> или <a class="text-white" href="https://chat.openai.com/" target=_blank>ChatGPT</a><br>';

$regexMemo = '<p style="text-align: left;">
  <!--   <strong>-onl "(X|Y|...)"</strong> - найти тексты содержащие только все совпадения X, Y ... и т.д.<br> -->
        </p>     ';
$titlehowtovideo = 'Как пользоваться?';  
$linkhowtovideo = 'https://youtu.be/XXa-K2fQ0Is?si=DDkT-2ZJo6B9bOAA';
$titledeschowtovideo = 'How to search in Pali Suttas and Vinaya with find.dhamma.gift'; 

$fntmessage = '<p class="font-italic text-center ">
Katamañca, bhikkhave, dukkhaṁ?<br>
Что такое, монахи, боль?
<p class="text-end">
dn22 mn141
</p>
</p>';

$carouseltitle = 'Интересные Запросы';

$slides = [

          [
        'title' => 'Крайние сроки на Пробуждение для монахов и мирян от Будды',
        'desc' => 'Максимум 7 и 10 лет, соответственно',
        'link' => '/assets/example/(viharanto-yathaa-mayaanusi.t.tha.m-eva.m-bhaaveyya)_suttanta_pali-ru_3-16.html',
    ],
           [
        'title' => 'Определение понятия dukkha в суттах',
        'desc' => 'Может ли быть, чтобы терминология в Учении Будды была не сквозной?',
        'link' => '/assets/example/kata.,-dukkha.m-question_suttanta_pali-ru_3-3.html',
    ],
           [
        'title' => 'Упадок и Не-упадок в Учении Татхагаты',
        'desc' => 'Пример: Остановится на полпути - это упадок',
        'link' => '/assets/example/parihaanameta.m_suttanta_pali-ru_6-86.html',
    ],        
    
                    [
        'title' => 'Благородные "Средства Передвижения"',
        'desc' => 'Когда ... сделано средством передвижения',
        'link' => '/assets/example/yaaniikat_suttanta_pali-ru_17-62.html',
    ],
      [
        'title' => 'До моего пробуждения',
        'desc' => 'Будда делится размышлениями и практиками, которые привели его к Пробуждению',
        'link' => '/assets/example/pubb.sambodh_suttanta_pali-ru_25-50.html',
    ],
                [
        'title' => 'Джатаки из Сутт',
        'desc' => 'Будда и некотооые ученики, о своих прошлых жизнях',
        'link' => '/assets/example/(bhuutapubbaaha.ahos-aha.m-tena-samayena.ahos)_suttanta_pali-ru_13-13.html',
    ],
    [
        'title' => 'Благородный Глоссарий',
        'desc' => 'Отличия между обычными и понятиями в очищении благородного',
        'link' => '/assets/example/ariyassa-vinaye_suttanta_pali-ru_34-106.html',
    ],
    [
        'title' => 'Пища для размышлений',
        'desc' => 'Все случаи из Сутт, когда спрашивают: "Как вы думаете?"',
        'link' => '/assets/example/ta.m-ki.m-ma~n~n_suttanta_pali-ru_218-610.html',
    ],
    [
        'title' => 'Я научу вас благородному ...',
        'desc' => 'Что такое благородное мытьё, слабительное, рвотное, путь и самадхи',
        'link' => 'https://find.dhamma.gift/result/bariy.desessaa_suttanta_pali-ru_13-13.html',
    ],
    [
        'title' => 'Бывает такой период...',
        'desc' => 'Различные события, которые периодически происходят',
        'link' => '/assets/example/hoti-kho-so.samayo_suttanta_pali-ru_8-32.html',
    ],
    [
        'title' => 'Я не отрицаю это...',
        'desc' => 'Интересные уточнения и нюансы с этой фразой',
        'link' => '/assets/example/nes.natth.vadaami_suttanta_pali-ru_5-17.html',
    ],
];

$read = 'читать';

$mainscrollmodalheader = 'Определение Dukkha в Суттах';
$mainscrollmodal = '<p class="">Из <a href=/ru/sc/?q=dn22&lang=pli-rus#18.18>dn22</a> <a href=/ru/sc/?q=mn141&lang=pli-rus#16.1>mn141</a></br><h4>Katamañca, bhikkhave, dukkhaṁ?</h4></br>
Что такое, монахи, боль?</br>
</br>
Yaṁ kho, bhikkhave, <strong>kāyikaṁ</strong> dukkhaṁ <strong>kāyikaṁ</strong> asātaṁ kāyasamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>

Любая, монахи, <strong>телесная / осязаемая</strong> боль, <strong>телесный / осязаемый</strong> дискомфорт, боль и дискомфорт чувствуемый от затронутости осязанием,</br>
</br>
idaṁ vuccati, bhikkhave, dukkhaṁ.</br>
это называется болью.</br>
</br>
<h4>Katamañca, bhikkhave, domanassaṁ?</h4></br>
А что такое "страдание" / стресс / тягота / недовольство?</br>
</br>
Yaṁ kho, bhikkhave, <strong>cetasikaṁ</strong> dukkhaṁ <strong>cetasikaṁ</strong> asātaṁ manosamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>
Любая, монахи, <strong>ментальная</strong>  боль, <strong>ментальный</strong> дискомфорт, боль и дискомфорт чувствуемый от затронутости мышлением,
</br>
</br>
idaṁ vuccati, bhikkhave, domanassaṁ.</br>
– вот что называется "страданием".</br></p>
<p class="text-end"></p>';

$transwarning = ' <i class="fa-solid fa-triangle-exclamation "></i> <b>Предупреждение!</b><br><br> Переводы выполнены не Буддой! Содержат фундаментальные ошибки главных положений его Учения. Переводы нужно читать критически. 
 <br><br>
  Самое важное из Учения Будды нужно изучить <strong> самостоятельно по Суттам</strong> на Пали. В частности, что такое Серединная Практика и Четыре Благородные Истины. Это несколько абзацев, к примеру из <strong>sn56.11</strong>.';
  
$anamemlearnpali = 'Learn Pali Переводы';
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
$anametools = 'Инстр.';

$aboutheader = 'О Проекте';
$aboutprp = '<div class="col-lg-4 ms-auto"><p class="lead">Find.Dhamma.Gift это поисковая система Освобождения. Точный Поиск в текстах Дхаммы и Винаи Палийского Канона с результатами в удобных таблицах с построчными переводами SuttaCentral.net, TheBuddhasWords.net, Theravada.ru и Tipitaka.theravada.su. Вы можете искать понятия, определения, метафоры, объяснения, людей, места и другое описанное в Суттах и Винае на Пали, Русском, Тайском и Английском.</p></div>
<div class="col-lg-4 me-auto"><p class="lead">Дхамма энтузиасты горячо приветствуются. Проект нуждается в помощи (не материальной): в подготовке построчных текстов на пали и русском, для этого не нужно знать пали, и если вы хотите помочь, пожалуйста, свяжитесь через Telegram, по почте или через Github - ссылки внизу страницы. </p></div>';
$prongh = ' Проект на GitHub';
$premail = ' Написать';

$headerexamples = 'Примеры';
$examplelist = '<li>Определение понятия <a href="/ru/?q=-la1+Kata.*,+dukkhaṁ[,\\\\?]">dukkha</a> на Пали и Русском. Запрос: <a href="/ru/?q=-la1+Kata.*,+dukkhaṁ[,\\\\?]">-la1 Kata.*, dukkhaṁ[,\\\\?]</a>
             </li>
<li>Сутта, в которой Будда говорит, что не делает <a href="/ru/?q=dvayagāminī">двусмысленных (dvayagāminī) утверждений</a> на Пали со ссылками на Русский перевод</li>
           
<li>Все сутты со словом <a href="./assets/example/vosmerichn_suttanta_ru-ru_143-282.html">Восьмеричный</a> Благородный Путь на Русском</li>
 
<li>Все сутты со словом <a href="./assets/example/nravstvennost_suttanta_ru-ru_194-781.html">нравственность</a> на Русском</li>

<li>Все сутты, где упомянут <a href="./assets/example/sariputt_suttanta_ru-ru_179-1105.html">Сарипутта</a> на Русском</li>

<li>Все сутты, где упомянут <a href="./assets/example/moggallaa-exc-(sikhaamoggall|akamoggall)_suttanta_pali-ru_75-621.html">Моггаллана</a> на Пали со ссылками на Русский</li>

<li>Все варианты словосочетания <a href="/ru/?q=paṭiccasamuppād ">paṭiccasamuppado</a> на Пали со ссылками на Русские переводы</li>

<li>Все сутты где, упоминается об <a href="./assets/example/okean_suttanta_ru-ru_90-324.html">океане</a> на Русском</li>

<li>Все сутты с <a href=./assets/example/seyyathaapi_suttanta_pali-ru_597-1861.html>метафорами с seyyathāpi</a> со ссылками на Русские переводы. Для всех сравнениий на Пали используйте запрос с кавычками: "(seyyathāpi|adhivacan|ūpama|opama)" </li> ';

$howtoheader = 'Как Искать?';

$contactheader = 'Контакты';
$contaccalltoaction = 'Всесторонний взгляд на Четыре Благородные Истины<br>
		в Палийских Суттах и Винае.<br> 
    Поймите наст<a target="_blank" class="text-white text-decoration-none" href=/ru/sc/?q=sn51.20&lang=pli>о</a>ящие Четыре Благородные Истины<br> 
   и п<a target="_blank" class="text-white text-decoration-none" href=/ru/sc/?q=bu-pm>о</a>л<a class="text-white text-decoration-none" target=_blank href=/ru/sc/?q=sn35.70&lang=pli>о</a>жите к<a target=_blank class="text-white text-decoration-none" href=/ru/sc/?q=mn77&lang=pli>о</a>нец б<a class="text-white text-decoration-none" href="/scripts/countdowntable.php">о</a>ли.';
                               							
$demovideo = 'Обучающие Видео';	
$demovideolink = 'https://youtube.com/playlist?list=PLFJDP30qrYJ2rknY6fEVR3jQxpZd1S6lX&si=7O06E2lcmPxaEVX2';
$demovideoimg = '/assets/img/video1ru.webp';
$demovideoimg2 = '/assets/img/video2ru.webp';

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
$pfdgoffline = 'Оффлайн версия и инструкция по установке. Пока только Android';

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
$head5suttadiff = 'Сравнить Две Сутты';
$psuttadiff = 'Показывает разницу между двумя текстами. Пали или Англ.';
$head5listdiff = 'Сравнить Два Списка Сутт'; 
$plistdiff = 'Показывает разницу между двумя списками текстов в формате sn56.22 dn22 sn12.2'; 
$head5makelist = 'Создать CSV список';
$pmakelist = 'Создавайте списки феноменов, учений, переводов и т.п.'; 

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
$mainreadlink = '/read.php';
$searchcaption = 'Search';
$clearaption = 'Clear';

$btnsave = 'Set Defaults';
$btnreset = 'Reset';

$gearbutton = 'extra settings';

$maintitle = 'Precise Search in Pali Suttas and Vinaya';
$metadesc = 'Precise Search in Pali Suttas and Vinaya. Liberation Search Engine. Search in Pali Suttanta and Vinaya';
$metakeywords = 'dhamma, sutta, Buddhism, pali Canon, dharma';
$titletwit = 'Precise Search in Pali Suttas and Vinaya. ';
$ogdesc = 'Liberation Search Engine. Search in Suttas and Vinaya in Pali, Russian, English and Thai';
$oglocale = 'en_US';
$ogshare = 'https://find.dhamma.gift/assets/img/social_sharing_gift.jpg';

$linksothermat = 'https://drive.google.com/drive/folders/1nrNtb_4s27nJGq61tpigf_b2sO_KOnVG';

$menu = 'Menu';
$menumain = 'Main';

$menuread = 'Read';
$menuhist = 'Search History';
$menuhowto = 'How To';
$menuabout = 'About';
$menulinks = 'Useful Links';
$menucontact = 'Contacts';

$poweredby = 'Powered by NI';
$tooltippoweredby = 'Natural Intelligence, Dhamma Intelligence';

$tooltiptitle = 'In Pāḷi, English, Russian, සිංහල & ไทย';
$title = 'Search for Truth';
$tooltippli = 'Default search. In Suttas of AN, SN, MN, DN + partially KN. Anguttara Nikaya, Samyutta Nikaya, Majjhimma Nikaya, Digha Nikaya + partially Khudakka Nikaya';
$radiopli = 'Pāḷi';
$tooltipdef = 'Search for definitions in the 4 main Pali Nikayas. Find meanings, quantities, types, and metaphors associated with the term. Requires standard phrasing for definitions. If no results are found in Suttas, Vinaya texts are automatically searched. Study related Suttas for a comprehensive view. See "Advanced" for more details.';
$radiodef = 'Def';

$tooltipsml = 'Search for similes, metaphors, and symbols related to the search term in four main Pali Nikayas. Requires standard phrasing for definitions.';
$radiosml = 'Sml';

$tooltiptextype = '<strong>Pāḷi</strong> - Anguttara Nikaya (AN), Samyutta Nikaya (SN), Majjhimma Nikaya (MN), Digha Nikaya (DN)
<br><br>
<strong>Vinaya</strong> - Search in Patimokkhas and Vibhangas of Vinaya in Pali and English. <br><br>
<strong>+KN</strong> - 4 Nikayas + Udana (Ud), Dhammapada (Dhp), Itivuttaka (Iti), Suttanipāta (Snp), Theragāthā (Thag), Therigatha (Thig)<br><br>
<strong>Later</strong> - 4 Nikayas + search in Pali in all books of kn including later texts<br><br>
<strong>+Kd & Pvr</strong> - Vinaya + Khandhaka & Parivara<br><br>
<strong>TBW</strong> - search in theBuddhasWords.net materials<br><br>
<strong>SC.net</strong> - search in SuttaCentral.net english translations';
$tooltipsearchtype = '<strong>Default</strong> - all matches<br><br>
<strong>Definitions</strong> - Search for several main definitions in 4 main Nikayas in Pali. What is it, how many and what types, metaphors. Works only if definition was given in standard phrases. <br><br>
<strong>Similes</strong> - Sesrch for similies, metaphors, symbols, of the search term in Pali in 4 main Nikayas. Works only if definition was given in standard phrases.<br><br>
<strong>All definitions</strong> - Search for all definitions. For all-round view studying all related Suttas is recommended. See Advanced for details.<br><br>
<strong>Top-1 or 5 or 10</strong> - Top-X texts with the biggest number of matches. In case if you don\'t need all matches. 
';
$listdefall  = "All definitions";
$listnm10 = "Top-10";
$listnm = "Top-5";
$listnm1 = "Топ-1";
$listdef = "Definitions";
$listsml = "Similes";
$liststd = "All matches";

$tooltipvin = 'Search in Pali Vinaya';
$radiovin = 'Vinaya';
$tooltipkn = '+ search in Pali Khuddaka Nikaya: dhp, iti, ud, snp, thag, thig';
$radiokn = '+KN';
$tooltiponl = 'X Y ... Finds texts containing only both and more matches for X, Y ... Without this option only texts where X Y are standing next to each other will be found';
$checkboxonl = 'Any distance';
$tooltipnonl = 'Search for X Y ... on any distance within one text. By default only texts containing X Y ... next to each other will be found.';
$checkboxnonl = 'A B';
$tooltipen = 'Search in an, sn, mn, dn in English line by line translations by B. Sujato as on Suttacentral.net. Without this option search will start with Pali texts, then sc.net texts, then thebuddhaswords.net translations';
$radioen = 'SC.net';
$tooltipltr= "+ search in Pali in all books of kn including later texts";
$radioltr = "+Later";
$radiovinall = "+Kd & Pvr";
$tooltipth = "(optional) Search in an, sn, mn, dn in Thai Suttacentral.net translations. Without this option default search will start with Pali texts, then with sc.net Thai translations";
$radioth = "ไทย";
$tooltipru = "(optional) Search in an, sn, mn, dn in Russain Suttacentral.net translations";
$radioru = "Rus";
$tooltiptbw = "Search in all contents of TheBuddhasWords.net";
$radiotbw = "TBW";

$monktype = array("monk" => "imassa ca bhikkhuno",
"senior monk" => "tassa ca therassa",
"Sangha" => "tassa ca saṅghassa"
);

$randomKey = array_rand($monktype);
$randomValue = $monktype[$randomKey];

$howtosearchquotetooltip = '';
$howtosearchquote = '<p>Tāni ce sutte osāriyamānāni vinaye sandassiyamānāni na ceva sutte osaranti, na ca vinaye sandissanti, niṭṭhamettha gantabbaṃ: "addhā, idaṃ na ceva tassa bhagavato vacanaṃ; ' . $randomValue . ' duggahita"nti. Iti hetaṁ, bhikkhave, chaḍḍeyyātha.<br><br>
If they (teachings, practices, methods, quotes, stories, anything associated with the Buddha) are not found in the Suttas and are not exhibited in the Vinaya, you should draw the conclusion: ‘Clearly this is not the word of the Blessed One. It has been wrongly understood by that ' . $randomKey . '.’ And so, monks, you should reject it.
</p>
<p class="text-end"><a target=_blank href=/ru/sc/?q=dn16&lang=pli-rus#4.8.6>dn16</a> <a target=_blank href=/ru/sc/?q=an4.180&lang=pli-rus#2.7>an4.180</a></p>';
$tooltipvindef = 'Search for definitions in Pali Vinaya. What is it, how many and what types. Works only if definition was given in standard phrases. For all-round view studing all related Rules is recommended. See Advanced for details';
$radiovindef = "DefV";
$tooltipla = "Add $defaultla following lines after match";
//$checkboxla = "+" . $defaultla * 2 . " lines";
$checkboxla = "+" . $defaultla . " lines";
$regexMemoh5 = 'RegEx Memo';

$lax = "search for X, add $defaultla next line to output after lines containing X";
$lbx = "search for X, add $defaultla previous lines to output before lines containing X";
$exc = "search for X, exclude Y and Z";
$excfew = 'search for X, exclude Y ending with "ti" and "nti"';
$begin = 'begins with X or';
$end = 'ends';
$anynumber = 'any number of symbols between X and Y';
$fewsymbols = 'from 0 to 10 symbols';
$nextwords = 'next words X и Y, with variable ending of X';
$fewwords = 'distance of 0 to 2 words between X (any ending) and Y';
$variants = 'multiple variants';
$optionalletter = 'letter in [ ]? is optional';
$variantsexc = 'search for tatt excluding tatth';
$metaphorssmlletter = 'search for all metaphors in Samyutta 56';
$searchfewwords = 'search for few different patterns at the same time';
$inallnikaya = 'find X in all Majjhimma Nikaya';
$inonesutta = 'find Y in DN22 only';
$regexlink = 'AI can generate RegEx for grep -Ei, e.g. <a class="text-white" href="https://codepal.ai/regex-generator" target=_blank>Codepal.ai</a> or <a class="text-white" href="https://chat.openai.com/" target=_blank>ChatGPT</a><br>';

$regexMemo = '
          <p style="text-align: left;">
     <!--  <strong>-onl "(X|Y|...)"</strong> - find texts containing only all of the X, Y ... etc patterns<br> -->

</p>          ';
$titlehowtovideo = 'How-To Video';
$linkhowtovideo = 'https://youtu.be/Jle0XDs_roc?si=-FJFTpdOwZ4lIdo3';
$titledeschowtovideo = 'How to search in Pali Suttas and Vinaya with find.dhamma.gift';

$carouseltitle = 'Top Interesting Queries';

$slides = [
           [
        'title' => 'Deadlines for Awakening for monks and layity from Buddha.',
        'desc' => 'up to 7 or 10 years, accordingly',
        'link' => '/assets/example/(viharanto-yathaa-mayaanusi.t.tha.m-eva.m-bhaaveyya)_suttanta_pali_3-16.html',
    ],
               [
        'title' => 'Definition of dukkha in suttas',
        'desc' => 'Is it possible that terminology in not throughout in the Buddhas Teaching?',
  'link' => '/assets/example/kata.,-dukkha.m-question_suttanta_pali_3-3.html',
    ],   
           [
        'title' => 'Decline and Non-decline in Tathagatas Teaching',
        'desc' => 'E.g. stopping half-way is a case of decline',
        'link' => '/assets/example/parihaanameta.m_suttanta_pali_6-86.html',
    ],    
                        [
        'title' => 'Noble "Vehicles"',
        'desc' => 'When ... made a vehicle',
        'link' => '/assets/example/yaaniikat_suttanta_pali_17-62.html',
    ],
          [
        'title' => 'Before my Awakening',
        'desc' => 'Thoughts and practices that led the unawakened Bodhisatta to Buddhahood',
        'link' => '/assets/example/pubb.sambodh_suttanta_pali_25-50.html',
    ],
    
                [
        'title' => 'Jatakas from Suttas',
        'desc' => 'Buddha and his followers, on their past lifes',
        'link' => '/assets/example/(bhuutapubbaaha.ahos-aha.m-tena-samayena.ahos)_suttanta_pali_13-13.html',
    ],
    [
        'title' => 'Noble Glossary',
        'desc' => 'Differences between ordinary concepts and in the purification of the noble one',
        'link' => '/assets/example/ariyassa-vinaye_suttanta_pali_34-106.html',
    ],
    [
        'title' => 'What do you think?',
        'desc' => 'All Suttas when "What do you think?" was asked by Buddha and his disciples',
        'link' => '/assets/example/ta.m-ki.m-ma~n~n_suttanta_pali_218-610.html',
    ],
    [
        'title' => 'I will teach a noble...',
        'desc' => 'What is noble cleansing, purgative, emetic, the path, and samadhi',
        'link' => 'https://find.dhamma.gift/result/bariy.desessaa_suttanta_pali_13-13.html',
    ],
    [
        'title' => 'There comes a time...',
        'desc' => 'Various recurring events described in Suttas',
        'link' => '/assets/example/hoti-kho-so.samayo_suttanta_pali_8-32.html',
    ],
    [
        'title' => 'I don’t deny it.',
        'desc' => 'Curious clarifications and details containing this phrase.',
        'link' => '/assets/example/nes.natth.vadaami_suttanta_pali_5-17.html',
    ],
];

$read = 'read';

$fntmessage = 'All-round view on Four Noble Truths<br>
        in Pali Suttas and Vinaya.<br>
        Understand the real meaning <br>
        of Four Noble Truths<br>
        and finish the pain.';
	
$mainscrollmodalheader = 'Definition of Dukkha in Suttas';

$mainscrollmodal = '<p class="">From <a href="/sc/?q=dn22&lang=pli-eng#18.18">dn22</a> <a href="/sc/?q=mn141&lang=pli-eng#16.1">mn141</a></br>
<h4>Katamañca, bhikkhave, dukkhaṁ?</h4></br>And what is pain?</br></br>Yaṁ kho, bhikkhave, <strong>kāyikaṁ</strong> dukkhaṁ <strong>kāyikaṁ</strong> asātaṁ kāyasamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>Whatever is experienced as  <strong>bodily</strong> pain, <strong>bodily</strong> discomfort, pain or discomfort born of bodily contact, </br>
</br>
idaṁ vuccati, bhikkhave, dukkhaṁ.</br>
that is called pain.</br>
</br>
<h4>Katamañca, bhikkhave, domanassaṁ?</h4></br>
And what is stress / "suffering"?</br>
</br>
Yaṁ kho, bhikkhave, <strong>cetasikaṁ</strong> dukkhaṁ <strong>cetasikaṁ</strong> asātaṁ manosamphassajaṁ dukkhaṁ asātaṁ vedayitaṁ,</br>
Whatever is experienced as <strong>mental</strong> pain, <strong>mental</strong> discomfort, pain or discomfort born of mental contact, that is called distress,</br>
</br>
idaṁ vuccati, bhikkhave, domanassaṁ.</br>
that is called stress.</p>';

        
$transwarning = '<i class="fa-solid fa-triangle-exclamation "></i> <b>Warning about translations!</b><br><br> Translations did not come from Buddha! Be scrutinizing and critical reading them.<br><br> The most important fundamentals of Buddhas Teaching are better to be learned<strong> on one\'s own from Suttas</strong> in Pali. The minimum is: Middle Practice and Four Noble Truths. E.g. few paragraphs from <strong>sn56.11</strong>.';   

$transwarning = '<i class="fa-solid fa-triangle-exclamation "></i> <b>Caution regarding translations!</b><br><br> Translations do not originate directly from the Buddha himself!  Approach them with scrutiny and critical thinking.<br><br> To acquire the fundamental teachings of the Buddha, it is highly recommended to engage in the <strong>direct study of Suttas in Pali</strong>. At the very least, concentrate on understanding the Middle Practice and the Four Noble Truths. For instance, consider delving into a dedicated section from <strong>sn56.11</strong>.';


$anamemlearnpali = 'Learn Pali Guides';

$anamemolds = 'Translations by M. Olds';
$anameasc = 'Asceticism in Dhamma';
$anameati = 'Accesstoinsight.org patimokkha';
$anamehist = 'History';
$anameuseful = 'Useful Links';
$anamedpd = 'Pali for mDict';

$anameresearch = 'Research';
$anameread = 'Read';
$anamestudy = 'Study';
$anamematerials = 'Study';
$anamecases = 'Cases';
$anameconj = 'Conjugations';
$anametextbook = 'Pali Textbook';
$anameothermat = 'Other Materials';
$anamesdiff = 'Sutta Diff';
$anametools = 'Tools';

$aboutheader = 'About Project';
$aboutprp = '<div class="col-lg-4 ms-auto"><p class="lead">Find.Dhamma.Gift serves as a Liberation Search Engine for Dhamma and Vinaya, the core of the Pali Canon. </br></br>It presents results in informative tables with line by line translations from sources like SuttaCentral.net, TheBuddhasWords.net, Theravada.ru, and Theravada.su. </p></div>
<div class="col-lg-4 me-auto"><p class="lead">You can search in Pali, Russian, Thai, and English for meanings, definitions, metaphors, explanations, people, places, and more as described in Suttas and Vinaya.</br></br>Dhamma enthusiasts and contributors, especially developers, are warmly invited to participate.</p></div>';
$prongh = ' Project on GitHub';
$premail = ' Send email';

$headerexamples = 'Examples';
$examplelist = '<li>Definition of the <a href="/ru/?q=-la1+Kata.*,+dukkhaṁ[,\\\\?]">dukkha</a> in Pali with quotes in English. Query is: <a href="/ru/?q=-la1+Kata.*,+dukkhaṁ[,\\\\?]">-la1 Kata.*, dukkhaṁ[,\\\\?]</a>
</li>

 <li>Sutta where Buddha says that he doesn\'t make <a href="/?q=dvayagāminī">ambiguous (dvayagāminī) statements</a> in Pali with English quote</li>

<li>All variants of the word <a href="/?q=paṭiccasamuppād">paṭiccasamuppado</a> in Pali with quotes in English</li>
            
<li>All suttas about <a href="/assets/example/eightfold_suttanta_en_159-344.html">Eightfold</a> Path in English</li>
<li>All suttas that took place or related to <a href="/assets/example/สาวัตถี_suttanta_th_913-1168.html">Savathi</a> in Thai</li>
<li>All suttas where <a href="/assets/example/sariputt_suttanta_ru-ru_179-1105.html">Sariputta</a> was mentioned in Russian</li>

<li>All suttas where <a href="./assets/example/moggallaa-exc-(sikhaamoggall|akamoggall)_suttanta_pali_75-621.html">Moggallana</a> was mentioned in Pali and English</li>
    
<li>All suttas about or containing the word <a href="/assets/example/ocean_suttanta_en_92-266.html">ocean</a> in English</li>
<li>All Suttas with <a href=./assets/example/(seyyathaapi-adhivacan-uupama-opama)_suttanta_pali_647-2186.html>metaphors & similies</a> in Pali and English</li>   ';
$howtoheader = 'How to Search';

$contactheader = 'Contacts';
$contaccalltoaction = 'Find the Noble Eightfold Path.<br>
Understand the Four Noble Truths.<br>Dhamma - is Actuality.';
 $demovideo = 'Demo Videos';  
 $demovideolink = 'https://youtube.com/playlist?list=PLFJDP30qrYJ2H2lYWREQHF1FVggRYsDB9&si=SIOe2dVFFAApudsw';
 $demovideoimg = '/assets/img/video1en.webp';
 $demovideoimg2 = '/assets/img/video1en.webp';

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

$head5suttadiff = 'Compare Two Suttas';
$psuttadiff = 'Finds difference between two texts.';
$head5listdiff = 'Compare Two Lists of Suttas'; 
$plistdiff = 'Finds difference between two lists of suttas in this format: sn56.22 dn22 sn12.2'; 
$head5makelist = 'Create CSV List';
$pmakelist = 'Create Lists of phenomena, teachings, translations etc'; 


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
