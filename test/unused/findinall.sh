#1/bin/bash
source /home/a0092061/domains/find.dhamma.gift/public_html/scripts/script_config.sh --source-only

args="$@"

if [[ "$@" == *"-exc"* ]]
then
pattern=`echo ${args} | sed 's/-exc/savemeforlater/g' | clearargs | sed 's/savemeforlater/-exc/g' ` 

excludepattern=`echo $@ | awk -F'-exc ' '{print $2}'`
addtotitleifexclude=" excluding $excludepattern"
function grepexclude {
egrep -viE "$excludepattern"
}
excfn=_exc_$excludepattern
else

pattern=`echo ${args} | clearargs` 
function grepexclude {
pvlimit 
}
fi


if [[ "$@" == *"-nbg"* ]];  then 
nbg="-nbg"
else 
nbg=
fi

if [[ "$@" == *"-ogr"* ]];  then 
tnr="-ogr"
else 
tnr="-oge"
fi

if [[ "$@" == *"-oru"* ]]; then

function bgswitch {
	echo "Найдено $linescount строк с $pattern<br> 
	Отправлено в фоновый режим.<br>
	Подождите 20-30 минут<br>
	и проверьте <a class=\"outlink\" href="./result/${table}">здесь</a><br>
	или в истории поиска." 
}

function emptypattern {
   echo "Что искать?"
}

function OKresponse {
echo "${pattern^}${addtotitleifexclude} $fortitle $language - "
#echo "$language - "
}

function Erresponse {
     echo "${pattern} нет в $fortitle $language<br>"
     #echo "$language - no<br>"
}

function wordsresponse {
php -r "print(\"<a class="outlink" href="./result/${tempfilewords}">Слова</a> и \");"  
}

function quoteresponse {
	php -r "print(\"<a class="outlink" href="./result/${table}">Цитаты</a><br>\n\");"
	
}
function minlengtherror {
echo "Слишком коротко. Мин $minlength символа"
}

elif [[ "$@" == *"-ogr"* ]]; then

globalpattern=`echo ${pattern^} | sed 's/-exc/исключая/g'`
function bgswitch {
	echo "Найдено $linescount строк с $pattern<br> 
	Отправлено в фоновый режим.<br>
	Подождите 20-30 минут<br>
	и проверьте <a class=\"outlink\" href="./result/${table}">здесь</a><br>
	или в истории поиска." 
}

function emptypattern {
   echo "Что искать?"
}

function OKresponse {
echo "$language - "
#echo "$language - "
}

function Erresponse {
     echo "нет в $language<br>"
     #echo "$language - no<br>"
}

function wordsresponse {
php -r "print(\"<a class="outlink" href="./result/${tempfilewords}">Слова</a> и \");"  
}

function quoteresponse {
	php -r "print(\"<a class="outlink" href="./result/${table}">Цитаты</a><br>\n\");"
	
}
function minlengtherror {
echo "Слишком коротко. Мин $minlength символа"
}

elif [[ "$@" == *"-oge"* ]]; then
globalpattern=`echo ${pattern^} | sed 's/-exc/excluding/g'`
function bgswitch {
	echo "$linescount $pattern lines found.<br> 
	Switched to background mode.<br>
	Wait for 20-30 minutes <br>
	and check <a class=\"outlink\" href="./result/${table}">here</a><br>
	or in search history." 
}

function emptypattern {
   echo "Emptry pattern"
}


function OKresponse {
echo "$language - "
#echo "$language - "
}

function Erresponse {
     echo "not in $language<br>"
     #echo "$language - no<br>"
}

function wordsresponse {
php -r "print(\"<a class="outlink" href="./result/${tempfilewords}">Words</a> and \");"
}

function quoteresponse {
php -r "print(\"<a class="outlink" href="./result/${table}">Quotes</a><br>\n\");"

}

function minlengtherror {
echo Too short. Min is $minlength
}



else #eng
globalpattern=`echo ${pattern^} | sed 's/-exc/excluding/g'`
function bgswitch {
	echo "$linescount $pattern lines found.<br> 
	Switched to background mode.<br>
	Wait for 20-30 minutes <br>
	and check <a class=\"outlink\" href="./result/${table}">here</a><br>
	or in search history." 
}

function emptypattern {
   echo "Emptry pattern"
}


function OKresponse {
echo "${pattern^} $fortitle $language - "
#echo "$language - "
}

function Erresponse {
     echo "${pattern} not in $fortitle $language<br>"
     #echo "$language - no<br>"
}

function wordsresponse {
php -r "print(\"<a class="outlink" href="./result/${tempfilewords}">Words</a> and \");"
}

function quoteresponse {
php -r "print(\"<a class="outlink" href="./result/${table}">Quotes</a><br>\n\");"

}

function minlengtherror {
echo Too short. Min is $minlength
}

fi

mainscript="nice -19 $rootpath/finddhamma.sh $tnr $nbg"

#check if not empty
if [[ "$args" == "" ]] || [[ "$args" == "-ogr" ]]
then
   # emptypattern
    exit 1
fi 
echo ${globalpattern^}
#check suttanta vinatya or abhidhamma
if [[ "$@" =~ "-vin" ]]
then
    echo "Vinaya<br>"
    pitaka="-vin"
elif [[ "$@" =~ "-abhi" ]]
then
    echo "Abhidhamma<br>"
    pitaka="-abhi"
elif [[ "$@" =~ "" ]]
then
    echo "Suttanta<br>"
fi 

#check single language
if [[ "$@" =~ "-en" ]] || [[ "$@" =~ "-ru" ]] || [[ "$@" =~ "-pli" ]] || [[ "$@" =~ "-th" ]]
then
    #echo "single language mode<br>"
$mainscript $pitaka "$pattern"
exit 0
fi 

#echo $mainscript $pitaka "$pattern" 
#run for all
$mainscript $pitaka "$pattern" 
status=$?
if (( "$status" == "3" ))
then                                                                   #echo status=$status
    exit 3
fi

$mainscript $pitaka -ru "$pattern"
$mainscript $pitaka -en "$pattern"
$mainscript $pitaka -th "$pattern"
 
exit 0
