<?php
if (strpos($_SERVER['REQUEST_URI'], "/ru") !== false){

$jsonString = file_get_contents('config/ru.json');
$data = json_decode($jsonString, true);

extract($data);


$regexMemo = '<h5>Памятка по RegEx</h5><p>ā ī ū ḍ ḷ ṃ ṁ ṇ ṅ ñ ṭ</p><p style="text-align: left;"><!-- <strong>-onl "(X|Y|...)"</strong> - найти тексты содержащие только все совпадения X, Y ... и т.д.<br> --><strong>-la2 X</strong> - искать X и добавить в результаты 2 следующие строки после строки с X<br>
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
</p>';

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
<br>Этот запрос выведет все совпадения по корню jamm из DN, MN, SN, AN + перечисленные книги KN.<br>Пример #2: jamm 
<br>Выведет совпадения только из DN, MN, SN, AN.<br><br>
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


$advancedcontent = '<strong>Совет #1</strong><br>Опция применима только для поисков на пали или английском! Если вы хотите найти определенное слово в определенной сутте, самьютте, никае - запустите поиск в таком виде: Sn17.*seyyathāpi
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
С буквой ё поиск можно осуществлять без доп. символоа.<br><br>
<strong>Совет #3</strong><br>Если вы хотите найти слова начинающиеся или заканчивающиеся с определенного шаблона, используйте \\\\b в начале и\или в конце шаблона поиска, к примеру<strong>\\\\bkummo\\\\b</strong> выведет в таблицы только kummo и пропустит kummova и любые другие совпадения<br><br>
<strong>Совет #4</strong><br>Чтобы исключить один шаблон из результатов другого шаблона используйте аргумент -exc.<br>Пример: dundubh -exc devadundubh - этот запрос позволит вам выгрузить совпадения по словам похожим на dundubh, но без devadundubh<br><br>
<strong>Совет #5</strong><br>Вы можете использовать регулярные выражения (regex) синтаксиса GNU grep -E. С использованием escape-последовательности (\\) они должны работать.Специальные ИИ могут сгенерировать регулярное выражение для Grep, к примеру <a href="https://codepal.ai/regex-generator" target=_blank>здесь</a>.Почитайте, поизучайте regex в интернете.<br><br><strong>Совет #6</strong><br>Почитайте на сайте проекта или в интернете о <a target="_blank" href="https://datatables.net/">DataTables</a>, результаты, которые вы получаете из текстов выводятся с помощью них.<br><br>
<strong>Совет #7 Подборки</strong><br>
Вы можете создавать подборки текстов. <br>
Примеры запросов:<br>						   "sn42.8|sn20.5" (включая кавычки) выведет в одну таблицу две Сутты полностью<br>
"Sn20.1" (включая кавычки) выведет Sn20.1 sn20.10 sn20.11 и тд в одну таблицу<br>
"Sn20.1\\\\b" (включая кавычки) выведет только одну Сутту
<br><br>
<strong>Как работает опция "Опр" - Определение</strong><br>
Если эта опция активирована поиск выполняется по следующим критериям:<br>
grep -E -A1 -Eir "${defpattern}.*nāma|an1\..*${defpattern}|An2.*Dv.*${defpattern}|An3.*(Tis|Tay|Tī).*${defpattern}|An4.*(Cattā|Cata).*${defpattern}|An5.*Pañc.*${defpattern}|An6.*cha.*${defpattern}|An7.*Satta.*${defpattern}|An8.*Aṭṭh.*${defpattern}|An9.*Nav.*${defpattern}|an1[10].*das.*${defpattern}|Seyyathāpi.*${defpattern}|${defpattern}[^\s]{0,3}sutta|(dn3[34]|mn4[34]).*(Dv|Tis|Tay|Tī|Cattā|Cata|Pañc|cha|Satta|Aṭṭh|Nav|das).{0,20}${defpattern}|\bKas.{0,60}${defpattern}.{0,9}\?|Katth.*${defpattern}.*daṭṭhabb|\bKata.{0,20}${defpattern}.{0,9}\?|Kiñ.*${defpattern}.{0,9} vadeth|${defpattern}.*adhivacan|vucca.{2,5} ${defpattern}{0,7}|${defpattern}.{0,15}, ${defpattern}.*vucca|${defpattern}.{0,9} vacan|Yadapi.*${defpattern}.*tadapi.*${defpattern}" --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} <br>
Пожалуйста, создайте issue на github или напишите по почте, если вы найдёте другие критерии.<br><br> ';

}
else {

$jsonString = file_get_contents('config/en.json');
$data = json_decode($jsonString, true);

extract($data);


$mainscrollmodal = '<p class="">	
<h4>Katamañca, bhikkhave, dukkhaṁ?</h4></br>
“And what is pain?</br>
			</br>
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
that is called stress.</br></p>
<p class="text-end">
<a href=/sc/?q=dn22>dn22</a> <a href=/sc/?q=mn141>mn141</a>
</p>';

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


$dpdpart = '<h3>Download DPD</h3>
<a target="_blank" href="https://digitalpalidictionary.github.io/"><p>DPD Official</p></a>

<a target="_blank" href="https://devamitta.github.io/pali/"><p>DPD Russian Edition</p></a>
<h3>Download MDict</h3>
';

}
?>
