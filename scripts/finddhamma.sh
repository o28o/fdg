#!/bin/bash -i
#set -x 
#trap read debug
export LANG=en_US.UTF-8
#export LC_ALL=en_US
##############################
# ‘Why don’t I gather grass, 
# sticks, branches, and leaves 
# and make a raft? Riding on the raft
# and paddling with my hands and feet,
# I can safely reach the far shore.
########## sn35.238 ##########

source ./config/script_config.sh --source-only
args="$@"
rand=`echo $RANDOM | md5sum | head -c 5`
mkdir $output 2>/dev/null
cd $output 
dateforhist=`date +%d-%m-%Y`
if [[ "$@" == *"-oru"* ]]; then
pagelang="/ru"
outfnlang=-ru
defaultlang='lang=pli-rus'
excluderesponse="исключая"
function bgswitch {
  removefilenames
	echo "Найдено $linescount строк с $pattern<br> 
	Ресурсы сервера ограничены и запрос нельзя обработать.<br>
	Варианты:<br>
	1. Попробуйте опцию <strong>Опр</strong>, чтобы сузить поиск<br>
	2. Выберите более специфическое слово из подсказок для Пали<br>
	3. Скачайте необработанные данные <a class=\"outlink\" href="/result/${basefile}">здесь</a>
	"
	exit 3
}

function reverseyoinpattern {
pattern="`echo $pattern | sed 's/\[ёе\]/е/g' | sed 's/\[ṅṁṃ\]/'$initialNorM'/g'`"
}  

function capitalized {
echo "$pattern" | sed 's/[[:lower:]]/\U&/'
}

function emptypattern {
   echo "Что искать?"
}

function OKresponse {
  echo "`echo "$pattern" | sed 's/[[:lower:]]/\U&/'`${addtotitleifexclude} $textsqnty в $fortitle $language "
}

function Erresponse {
     echo "${pattern} нет в $fortitle $language<br>"
}

function Clarification {
     echo "в SN, DN, MN и AN. Попробуйте другие <br>
     настройки +KN, Vin и др."
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

else #eng
pagelang=
defaultlang='lang=pli-eng'
excluderesponse="excluding"
function bgswitch {
  removefilenames
	echo "Found $linescount lines with $pattern<br> 
	Server resources are limited.<br>
	Solutions:<br>
	1. Try <strong>Def</strong> option, it'll narrow down results<br>
	2. Choose more specific word from Pali autocomplete<br>
	3. Download raw data <a class=\"outlink\" href="/result/${basefile}">here</a>
	"
	exit 3
}

function emptypattern {
   echo "Empty pattern"
}


function OKresponse {
echo "`echo "$pattern" | sed 's/[[:lower:]]/\U&/'`${addtotitleifexclude} $textsqnty in $fortitle $language "
}

function Erresponse {
     echo "${pattern} not in $fortitle $language<br>"
}

function Clarification {
     echo "in SN, DN, MN & AN<br>
     Try +KN, Vin options."
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

function grepbrief {
	
	awk -v ptn="$pattern" -v cnt1=$wbefore -v cnt2=$wafter '
{ for (i=1;i<=NF;i++)
      if ($i ~ ptn) {
         sep=""
         for (j=i-cnt1;j<=i+cnt2;j++) {
             if (j<1 || j>NF) continue
             printf "%s%s", sep ,$j
             sep=OFS
         }
         print ""
      }
}'
}

pattern="$@"

if [[ "$@" == *"-h"* ]]; then
    echo "
    without arguments will search in pali<br>
    materials as stored on Suttacentral.net in DN, MN, SN, AN.<br>
    <br>
    -pli - to search in Pali, same as without arguments (default option) <br>
    -def - find similes in Pali provided with standard text formulas <br>
    -sml - find similes in Pali provided with standard text formulas <br>
	-kn - include Khuddaka Nikaya selected books <br>
	-all - include all Khuddaka Nikaya books <br>
    -vin - to search in vinaya texts only <br>
    -abhi - to search in abhidhamma texts only <br>
    -laN X - search X and print N lines after match<br>
    -lbN X - search X and print N lines before match<br>    
    X -exc Y - search X exclude Y <br>
    -onl \"X|Y|...\"- find texts that contain all patterns only
    -ru - to search in Russian <br>
    -en - to search in English <br>
    -th - to search in Thai <br>
    -b - to search in tbw materials <br>
    -tru - to search in theravada.ru materials <br>
    -oru - output messages in sian<br>"
    exit 0
fi
#-nbg - no background <br>
if [[ "$@" == *"-la"* ]]; then
linesafter=`echo "$@" | sed 's@.*-la@@' | awk '{print $1}'` 
else
linesafter=0
fi

if [[ "$@" == *"-lb"* ]]; then
linesbefore=`echo "$@" | sed 's@.*-lb@@' | awk '{print $1}'` 
else 
linesbefore=0
fi

#echo la=$linesafter
if [[ "$pattern" != *"\\"* ]]; then
pattern=`echo "$pattern"| awk '{print tolower($0)}' | clearargs `
else 
pattern=`echo "$pattern"| clearargs `
fi

userpattern="$pattern"
patternForHighlight="`echo $pattern | sed 's@е@[её]@g' | sed 's@ṃ@[ṃṁ]@g' | sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}\.\*//g'| sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}.[0-9]{1,3}\.\*//g' | sed 's@^@(@g' | sed 's/$/)/g' | sed 's@,@@g'`"

if [[ "$pattern" == "" ]] ||  [[ "$pattern" == "-ru" ]] || [[ "$pattern" == "-en" ]] || [[ "$pattern" == "-th" ]]  || [[ "$pattern" == "-oru" ]]  || [[ "$pattern" == "-nbg" ]] || [[ "$pattern" == "-ogr" ]] || [[ "$pattern" == "-oge" ]] || [[ "$pattern" == "-vin" ]] || [[ "$pattern" == "-all" ]] || [[ "$pattern" == "" ]] || [[ "$pattern" == "-kn" ]] || [[ "$pattern" == "-pli" ]] || [[ "$pattern" == "-def" ]] || [[ "$pattern" == "-sml" ]] || [[ "$pattern" == "-b" ]] || [[ "$pattern" == "-onl" ]] ||  [[ "$pattern" == "-tru" ]] || [[ "$pattern" == "-defall" ]] 
then   
#emptypattern
   exit 3
fi
    

if   [ "${#pattern}" -lt "$minlength" ]
then
minlengtherror
exit 1 
fi

grepgenparam=E

#if you want to use this script for other languages, add blocks that are needed with your language which must be available on suttacentra.net
lookup=$suttapath/sc-data/sc_bilara_data

function clearsed {
sed 's/<p>/\n/g; s/<[^>]*>//g'  | sed  's/": "/ /g' | sed  's/"//1' | sed 's/",$//g' 
}


vin=vinaya
abhi=abhidhamma
sutta=mutta
metaphorcountfile=$textinfofolder/metphrcount_sutta.txt
fortitle=Suttanta
dirlocation=sutta
translator=sujato
fileprefix=_suttanta
hwithtitle='<h1>'
if [[ "$@" == *"-vin"* ]]; then
    vin=dummy
    sutta=sutta
	fortitle=Vinaya
	dirlocation=vinaya
	translator=brahmali
    fileprefix=_vinaya
    metaphorcountfile=$textinfofolder/metphrcount_vinaya.txt
fi
if [[ "$@" == *"-abhi"* ]]; then
    abhi=dummy
    sutta=sutta
	fortitle=Abhidhamma
	dirlocation=abhidhamma
	translator=""
    fileprefix=_abhidhamma
    #echo search in abhidhamma
fi
 

if [[ "$@" == *"-kn"* ]]; then
function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site,patton} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} 
}
fileprefix=${fileprefix}-kn
fortitle="${fortitle} +KN"
elif [[ "$@" == *"-def"* ]]
then
fileprefix=${fileprefix}-definition
fortitle="Definition ${fortitle}"

defpattern="`echo $pattern | sed -E 's/([aoā]|aṁ)$//g'`"
pattern="$defpattern" 
#vin=dummy ${defpattern}.*nāma|
linesafter=3
patternForHighlight="`echo $pattern | sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}\.\*//g'| sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}.[0-9]{1,3}\.\*//g' | sed 's/.\*/|/g' |  sed 's@^@(@g' | sed 's/$/)/g' | sed 's@\\.@|@g' | sed 's@ @|@g' | sed 's@,@@g'`"

tmpdef=tmpdef.$rand

if [[ "$@" == *"-vin"* ]]
  then
  vin=dummy
vindefpart="${defpattern}.{0,3}—|${defpattern}.{0,3}ti|${defpattern}.*nāma|"
fi  

function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,thag,thig,snp,dhp,iti,ud} > $tmpdef

nice -$nicevalue grep -Ei "${vindefpart}\bKata.{0,20} \b${defpattern}.{0,5}\?|${defpattern}.{0,15}, ${defpattern}.{0,25} vucca|Kiñ.*${defpattern}.{0,9} va|(dn3[34]|mn4[34]).*(Dv|Ti|Tay|Tī|Cattā|Cata|Pañc|cha|Satta|Aṭṭh|Nav|das).{0,20}${defpattern}|an1\..*yadidaṁ ${defpattern}|an1\..*${defpattern}.*yadidaṁ" $tmpdef
}

function grepbasefileExtended1 {
  fortitle="Definition Extended 1 ${fortitle}"
cat $tmpdef | nice -$nicevalue grep -Ei "\b${defpattern}[^\s]{0,3}sutta" 
}

function grepbasefileExtended2 {
  fortitle="Definition Extended 2 ${fortitle}"
nice -$nicevalue grep -Ei "\bKas.{0,60}${defpattern}.{0,9}\?|${defpattern}[^\s]{0,3}sutta|(dn3[34]|mn4[34]).*(Dv|Ti|Tay|Tī|Cattā|Cata|Pañc|cha|Satta|Aṭṭh|Nav|das).{0,20}${defpattern}|\bKata.{0,20}${defpattern}.{0,9}\?|${defpattern}.*adhivacan|${defpattern}.{0,15}, ${defpattern}.*vucca|${defpattern}.{0,9} vacan|Seyyathāpi.*${defpattern}|Katth.*${defpattern}.*daṭṭhabb|Kiñ.*${defpattern}.{0,9} vadeth|vucca.{2,5} ${defpattern}{0,7}|Yadapi.*${defpattern}.*tadapi.*${defpattern}|an1\..*yadidaṁ ${defpattern}|an1\..*${defpattern}.*yadidaṁ|An2.*Dv.*${defpattern}|An3.*(Tis|Tay|Tī).*${defpattern}|An4.*(Cattā|Cata).*${defpattern}|An5.*Pañc.*${defpattern}|An6.*cha.*${defpattern}|An7.*Satta.*${defpattern}|An8.*Aṭṭh.*${defpattern}|An9.*Nav.*${defpattern}|an1[10].*das.*${defpattern}|(an3.34|an3.111|an3.112|an6.39|an10.174|dn15|sn12.60|sn14.12).*${defpattern}|(mn135|mn136|mn137|mn138|mn139|mn140|mn141|mn142|sn12.2:|sn45.8|sn47.40|sn48.9:|sn48.10|sn48.36|sn48.37|sn48.38|sn51.20).*${defpattern}" $tmpdef
}
#|an1\..*${defpattern}
#sml 

elif [[ "$@" == *"-sml"* ]]
then
fileprefix=${fileprefix}-simile
fortitle="Similes ${fortitle}"

smlpattern="`echo $pattern | sed -E 's/([aoā]|aṁ)$//g'`"
pattern="$smlpattern" 
#vin=dummy ${smlpattern}.*nāma|
linesafter=1
patternForHighlight="`echo $pattern | sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}\.\*//g'| sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}.[0-9]{1,3}\.\*//g' | sed 's/.\*/|/g' |  sed 's@^@(@g' | sed 's/$/)/g' | sed 's@\\.@|@g' | sed 's@ @|@g' | sed 's@,@@g'`"

tmpsml=tmpsml.$rand
nonmetaphorkeys="adhivacanasamphass|adhivacanapath|\banopam|\battūpa|\bnillopa|opamaññ"
if [[ "$@" == *"-vin"* ]]
  then
  vin=dummy
#vinsmlpart="${smlpattern}.{0,3}—|${smlpattern}.{0,3}ti|${smlpattern}.*nāma|"
fi  

function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,thag,thig,snp,dhp,iti,ud} > $tmpsml

nice -$nicevalue grep -Ei "${vinsmlpart}seyyathāpi.*${smlpattern}|${smlpattern}.*adhivacan|${smlpattern}.*(ūpama|opama|opamma)" $tmpsml | grep -vE "$nonmetaphorkeys" 
}


#sml end

elif [[ "$@" == *"-all"* ]]; then
function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site}
}
fileprefix=${fileprefix}-all
fortitle="${fortitle} +All"
elif [[ "$@" == *"-tru"* ]]; then
function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $pali_or_lang --exclude-dir={$sutta,$abhi,home,js,css,image} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} 
}
fileprefix=${fileprefix}
fortitle="${fortitle}"
elif [[ "$@" == *"-b"* ]]; then
function grepbasefile {
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $bwlocation
 --exclude-dir={$sutta,$abhi,home,js,css,image,fonts} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} | grep -vE "(ud|sn|an)[0-9]{0,3}.html|/bw/home"
}
fileprefix=${fileprefix}-bw
fortitle="${fortitle}"
elif [[ "$@" == *"-onl"* ]]; then
patternForHighlight="`echo $pattern | sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}\.\*//g'| sed -E 's/^[A-Za-z]{2,4}[0-9]{2,3}.[0-9]{1,3}\.\*//g' | sed 's/.\*/|/g' |  sed 's@^@(@g' | sed 's/$/)/g' | sed 's@\\.@|@g' | sed 's@ @|@g' | sed 's@,@@g'`"
function grepbasefile {
tmponl=tmponl.$rand

patternforfind=`echo $pattern | sed 's@|@ @g' |sed 's@^(@@g' | sed 's@)$@@g' `

#revertlater=$pattern
#splitarraylen=`echo $pattern | tr -s "|" "\n" | wc -l`

#nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,thag,thig,snp,dhp,iti,ud} > $tmponl

command="find $suttapath/$pali_or_lang  -type f -not -path '*/'$sutta'/*' -not -path '*/'$abhi'/*' -not -path '*/'$vin'/*' -not -path '*/xplayground/*' -not -path '*/name/*' -not -path '*/site/*' -not -path '*/ab/*' -not -path '*/bv/*' -not -path '*/cnd/*' -not -path '*/cp/*' -not -path '*/ja/*' -not -path '*/kp/*' -not -path '*/mil/*' -not -path '*/mnd/*' -not -path '*/ne/*' -not -path '*/pe/*' -not -path '*/ps/*' -not -path '*/pv/*' -not -path '*/tha-ap/*' -not -path '*/thi-ap/*' -not -path '*/vv/*' -not -path '*/thag/*' -not -path '*/thig/*' -not -path '*/snp/*' -not -path '*/dhp/*' -not -path '*/iti/*' -not -path '*/ud/*' "
for i in $patternforfind
do
command+=`echo -n '-exec grep -qE "'$i'" {} \; '` 
done
command+=' -print'
#echo  "$command" >> command
eval "$command" > $tmponl 

# Чтение содержимого файла в массив с помощью mapfile (readarray)
mapfile -t onl_array < $tmponl

# Вывод содержимого массива для проверки
for line in "${onl_array[@]}"; do
grep -HE "$pattern" $line
done > $tmponl
cat $tmponl
#onltextindex=`for i in $splitpattern
#do
#grep -Eir "$i" $tmponl | awk '{print $2}'| awk -F':' '{print $1}' | sort -Vf | uniq 
#done | sort -Vf | uniq -c | sort | awk '{print $1, $2}'| grep "^$splitarraylen" | awk -F'"' '{print $2}' | xargs | sed 's@ @:|@g' | sed 's@$@:@g'`
#pattern=$revertlater
}
fileprefix=${fileprefix}-onl
fortitle="${fortitle} Matching Mode"
maxmatchesbg=100000000
#echo $pattern $splitpattern $splitarraylen | tohtml
else 
function grepbasefile {
tmpgb=tmpgrepbase.$rand
#find $suttapath/$pali_or_lang  -type f -not -path '*/'$sutta'/*' -not -path '*/'$abhi'/*' -not -path '*/'$vin'/*' -not -path '*/xplayground/*' -not -path '*/name/*' -not -path '*/site/*' -not -path '*/ab/*' -not -path '*/bv/*' -not -path '*/cnd/*' -not -path '*/cp/*' -not -path '*/ja/*' -not -path '*/kp/*' -not -path '*/mil/*' -not -path '*/mnd/*' -not -path '*/ne/*' -not -path '*/pe/*' -not -path '*/ps/*' -not -path '*/pv/*' -not -path '*/tha-ap/*' -not -path '*/thi-ap/*' -not -path '*/vv/*' -not -path '*/thag/*' -not -path '*/thig/*' -not -path '*/snp/*' -not -path '*/dhp/*' -not -path '*/iti/*' -not -path '*/ud/*' -print0 | xargs -n$filelimit -r0P$procqnty grep -E -Ri${grepvar}${grepgenparam} "$pattern" > $tmpgb

nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,thag,thig,dhp} > $tmpgb
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/sc-data/sc_bilara_data/variant/pli/ms/sutta --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,thag,thig,dhp} >> $tmpgb

if [ -s $tmpgb ]; then
cat $tmpgb
fi
}
fi

if [[ "$@" == *"-th"* ]]; then
    fnlang=_th
    pali_or_lang=sc-data/html_text/th/pli 
    language=Thai
	printlang=ไทย
    directlink=
    type=html   
    metaphorkeys="как если бы|подоб|представь|обозначение|Точно также, как"
    nonmetaphorkeys="подобного|подоба"
elif [[ "$@" == *"-tru"* ]]; then
    fnlang=_thru
    suttapath=
    pali_or_lang=$apachesitepath/theravada.ru
    language=Russian-thru
    printlang=Русский
    directlink=
    type=html   
    metaphorkeys="как если бы|подоб|представь|обозначение|Точно также, как"
    nonmetaphorkeys="подобного|подоба"
    definitionkeys="что такое.*${pattern}.{0,4}\\?|${pattern}.*говорят|${pattern}.*обозначение|${pattern}.{0,4}, ${pattern}.*говорят"    
elif [[ "$@" == *"-ru"* ]]; then
    fnlang=_ru
    pali_or_lang=sc-data/html_text/ru/pli
    language=Russian
    printlang=Русский
    directlink=
    type=html   
    metaphorkeys="как если бы|подоб|представь|обозначение|Точно также, как"
    nonmetaphorkeys="подобного|подоба"
    definitionkeys="что такое.*${pattern}.{0,4}\\?|${pattern}.*говорят|${pattern}.*обозначение|${pattern}.{0,4}, ${pattern}.*говорят"
elif [[ "$@" == *"-b"* ]]; then
    fnlang=_tbw
    pali_or_lang=/bw/
    directlink=/bw
    language="TBW"
    type=html
    hwithtitle='<h00002>'
    metaphorkeys="seyyathāpi|adhivacan|ūpama|opama|opamma"
    nonmetaphorkeys="adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ"
    definitionkeys="Kata.*${pattern}.{0,4}\\?|${pattern}.*vucati|${pattern}.*adhivacan|${pattern}.{0,4}, ${pattern}.*vucca"
   #modify pattern as legacy uses different letters
elif [[ "$@" == *"-pli"* ]]; then
    fnlang=_pali
    pali_or_lang=sc-data/sc_bilara_data/root/pli/ms
    directlink=/pli/ms
    #directlink=/en/?layout=linebyline
    language=Pali
    type=json
    metaphorkeys="seyyathāpi|adhivacan|ūpama|opama|opamma"
    nonmetaphorkeys="adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ"
    definitionkeys="Kata.*${pattern}.{0,4}\\?|${pattern}.*vucati|${pattern}.*adhivacan|${pattern}.{0,4}, ${pattern}.*vucca"
   #modify pattern as legacy uses different letters
elif [[ "$@" == *"-en"* ]]; then
    fnlang=_en
	printlang=English
    pali_or_lang=sc-data/sc_bilara_data/translation/en/$translator
    language=English
    type=json
    metaphorkeys="It’s like a |suppose|is a term for|similar to |simile"
    nonmetaphorkeys="adhivacanasamphass|adhivacanapath" 
    definitionkeys="what is.*${pattern}.{0,4}\\?|speak of this.*${pattern}|${pattern}.*term|${pattern}.{0,4}, ${pattern}.*говорят"
    if [[ "$@" == *"-vin"* ]]
  then 
nice -$nicevalue grep -E -Ri${grepvar}${grepgenparam} "$pattern" $suttapath/sc-data/sc_bilara_data/translation/en/$translator/$dirlocation --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv,thag,thig,dhp,iti,ud} >> $tmpgb
fi
else
    fnlang=_pali
    pali_or_lang=sc-data/sc_bilara_data/root/pli/ms
    directlink=/pli/ms
    #directlink=/en/?layout=linebyline
    language=Pali
    type=json
    metaphorkeys="seyyathāpi|adhivacan|ūpama|opama|opamma"
    nonmetaphorkeys="adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ"
fi

if [[ "$@" == *"-exc"* ]]
then

fortitle="${fortitle}"
excludepattern="`echo $@ | sed 's/.*-exc //g'`"
addtotitleifexclude=" exc. ${excludepattern,,}"
addtoresponseexclude=" $excluderesponse $excludepattern"
function grepexclude {
grep -iE -v "$excludepattern"
}
#echo arg="$@"
excfn="` echo -exc-${excludepattern} | sed 's/ /-/g' | sed 's@\\\@@g' `"

else
function grepexclude {
pvlimit 
}
fi

function diact2normal {
sed "s/ā/aa/g" |
sed "s/ī/ii/g" |
sed "s/ū/uu/g" |
sed "s/ḍ/.d/g" |
sed "s/ṁ/.m/g" |
sed "s/ṅ/.n/g" |
sed "s/ṇ/.n/g" |
sed "s/ṭ/.t/g" |
sed "s/ḷ/.l/g" |
sed "s/ñ/~n/g"
}

function cyr2lat {
sed "s/а/a/g" |
sed "s/б/b/g" |
sed "s/в/v/g" |
sed "s/г/g/g" |
sed "s/д/d/g" |
sed "s/е/e/g" |
sed "s/ё/yo/g" |
sed "s/ж/zh/g" |
sed "s/з/z/g" |
sed "s/и/i/g" |
sed "s/й/i/g" |
sed "s/к/k/g" |
sed "s/л/l/g" |
sed "s/м/m/g" |
sed "s/н/n/g" |
sed "s/о/o/g" |
sed "s/п/p/g" |
sed "s/р/r/g" |
sed "s/с/s/g" |
sed "s/т/t/g" |
sed "s/у/u/g" |
sed "s/ф/f/g" |
sed "s/х/h/g" |
sed "s/ц/ts/g" |
sed "s/ч/ch/g" |
sed "s/ш/sh/g" |
sed "s/щ/sh/g" |
sed "s/ъ//g" |
sed "s/ы/y/g" |
sed "s/ь//g" |
sed "s/э/e/g" |
sed "s/ю/yu/g" |
sed "s/я/ya/g" 
}

#link and filename
fn=`echo $pattern | sed 's/\*//g' | sed 's/[|-]/-/g' | sed 's/[][]//g' | sed 's/ /-/g' | sed 's/\\\//g' | sed 's@?@-question@g'|  awk '{print tolower($0)}'`
fn=${fn}${excfn}${fileprefix}${fnlang}${outfnlang}

modifiedfn=`echo $fn | diact2normal | cyr2lat`

extention=$rand.tmp
basefile=${fn}_fn.$extention

#filelist
#metaphors=${fn}_metaphors.$extention
table=${modifiedfn}.$rand
tempfile=${modifiedfn}.$extention
tempfilewhistory=${modifiedfn}_hist.$extention
tempfilewords=${modifiedfn}_words.$rand
tempdeffile=${modifiedfn}.def.$extention
deffile=${modifiedfn}_definitions.$rand

function checkifalreadydone {
checkfile=`ls $modifiedfn*_[0-9]*-[0-9]*.html 2>/dev/null| grep -v word ` 

if [[ -s "${checkfile}" ]] ; then 
function md5checkwrite {
var="$(cat)"
functionname=`echo $var | awk '{print $1}'`
functionfile=~/.shortcuts/${functionname}.sh 
content=`echo "$var" | awk 'NR!=1'`
#echo $functionfile $functionname
md5_stdin=$(echo "$content" | md5sum | cut -d" " -f 1)
md5_file=$(md5sum ${functionfile} | cut -d" " -f1)
[[ "$md5_stdin" != "$md5_file" ]] && echo "$content"  > $functionfile
}

filesize=$(stat -c%s "${checkfile}")

if (( $filesize >= $filesizenooverwrite )) && [[ "`tail -n1 ${checkfile}`" == "</html>" ]] 
then
	echo Already 
	cat -n $history | grep -E "$table" | grep daterow | grep -i "${fortitle^}" | grep ">$language<" | tac > updatehistorytmp 
	linenumbers=`cat updatehistorytmp | awk '{print $1}'`

for i in $linenumbers
do 
sed -i "${i}d" $history 
done 

sed -i 's@[0-9][0-9]-[0-9][0-9]-[0-9][0-9][0-9][0-9]@'$dateforhist'@g' updatehistorytmp
cat updatehistorytmp | tac | head -1 | awk '{print substr($0, index($0, $2))}' >> $history
rm updatehistorytmp
OKresponse
echo "<script>window.location.href=\"./result/${checkfile}\";</script>"
	exit 0
fi 
fi
}

function genwordsfile {
cat $tempfilewords | pvlimit | sedexpr | awk '{print tolower($0)}' | tr -s ' '  '\n' | sort | uniq -c | awk '{print $2, $1}' > $tempfile
uniqwordtotal=`cat $tempfile | pvlimit | sort | uniq | wc -l `

if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
cat $templatefolder/Header.html $templatefolder/WordTableHeader.html | sed 's/$title/TitletoReplace/g' > $tempfilewords 
else
cat $templatefolder/Header.html $templatefolder/WordTableHeader.html | sed '/forshellscript/d' | sed 's/$title/TitletoReplace/g' > $tempfilewords 
fi 

nice -$nicevalue cat $tempfile | pvlimit | while IFS= read -r line ; do
uniqword=`echo $line | awk '{print $1}'`
uniqwordcount=`echo $line | awk '{print $2}'`
linkscount=`nice -$nicevalue grep -i "\b$uniqword\b" $basefile | sort | awk '{print $1}' | awk -F'/' '{print $NF}' | sort | uniq | wc -l`

if(( $linkscount == 0 ))
then
continue 
fi 

linkswwords=`grep -i "\b$uniqword\b" $basefile | sort -Vf | awk '{print $1}' | awk -F'/' '{print $NF}' | sort -Vf | uniq | awk -F'_' '{print "<a target=_blank href=\"'${pagelang}'/sc/?q="$1"\">"$1"</a>"}'| sort -Vf | uniq | xargs`

#&lang=pli
echo "<tr>
<td>`echo $uniqword | highlightpattern`</td>
<td>$linkscount</td>   
<td>$uniqwordcount</td>   
<td>$linkswwords</td>
</tr>" >>$tempfilewords

# `(( $linkscount >= 6 )) && echo \"($linkscount)\"`
echo "$uniqword: $linkswwords<br>" >> $tempfilewhistory
done
}


function genbwlinks {
forbwlink=`echo $filenameblock |  awk '{print substr($1,1,2)}' `

  if [[ -s $bwlocation/$forbwlink/${filenameblock}.html  ]] ; then 
  linken=`echo $filenameblock |  awk '{print "'${urllinkbw}${forbwlink}'/"$0".html"}' `
  elif [[ -s $bwlocation/$forbwlink/${forbwranges}.html  ]] ; then 
  linken=`echo $filenameblock |  awk '{print "'${urllinkbw}$forbwlink/$forbwranges'.html"}' `
  else
  linken=`echo $filenameblock |  awk '{print "'$urllinken'"$0"'${urllinkenmid}${urllinkenend}'"}'`
  fi 
}

if [[ "$type" == json ]]; then

filelist=`echo "
${words}
${links}
${links_and_words}
${quotes}
${brief}
${metaphors}
${top}"`

grepvar=

function linklist {
cat $templatefolder/Header.html $templatefolder/ResultTableHeader.html | sed 's/$title/TitletoReplace/g' | tohtml 
textlist=`nice -$nicevalue cat $basefile | pvlimit | awk -F':' '{print $1}' | awk -F'/' '{print $NF}' |  awk -F'_' '{print $1}' | sort -Vf | uniq`

for pathAndfile in `nice -$nicevalue cat $basefile | awk -F':' '{print $1}' | sed -E 's@.*(sutta|vinaya|abhidhamma)@@g' |  awk -F'_' -v dirlocation="$dirlocation" '{print dirlocation""$1}' | sort -Vf | uniq` ; do

filenameblock=`echo $pathAndfile | awk -F'/' '{print $NF}'| sort -Vf | uniq`
pathblock=`echo $pathAndfile | awk -F'/' '{ var=NF-1 ; for (i=1;i<=var;i++) printf $i"/"}'`

#echo "flnblck=$filenameblock pathblock=$pathblock" 
#| tohtml

  #old find block
  #  roottext=`nice -$nicevalue find $lookup/root/pli/ms/$pathblock -name "*${filenameblock}_*" -not -path "*/blurb/*" -not  -path "*/name*" -not -path "*/site/*"`
 #   translation=`nice -$nicevalue find $lookup/translation/en/$translator/$pathblock -name "*${filenameblock}_*" -not -path "*/blurb/*" -not  -path "*/name*" -not -path "*/site/*" |head -n1`
 #   variant=`nice -$nicevalue find $lookup/variant/pli/ms/$pathblock -name "*${filenameblock}_*" -not -path "*/blurb/*" -not  -path "*/name*" -not -path "*/site/*"`
   roottext=`ls $lookup/root/pli/ms/$pathblock/*${filenameblock}_*`
   
   #roottext=`for f in $lookup/root/pli/ms/$pathblock/*${filenameblock}_*; do ;  [ -e "$f" ] && echo "$f" ; break ; done`

 #echo "$roottext $roottext2"
 lettersblock=`echo $filenameblock | sed 's@[0-9]*@@g'`
 numberblock=`echo $filenameblock | sed 's@[A-Za-z]*@@g'`
#echo "$filenameblock $pathblock $lettersblock $numberblock" | tohtml
checktrnfile="`ls $apachesitepath/assets/texts/$pathblock/*${filenameblock}_translation* 2>/dev/null | tail -n1`"

#matching_files=( $apachesitepath/assets/texts/$pathblock/*${filenameblock}_translation*{+o,-o}.json )
#if [[ ${#matching_files[@]} -gt 0 ]]; then
  # Найдены файлы с "+o.json" или "-o.json"
#  checktrnfile="${matching_files[0]}"
#else
  # Файлы с "+o.json" или "-o.json" не найдены
#  checktrnfile="$apachesitepath/assets/texts/$pathblock/*${filenameblock}_translation*"
#fi

if [[ "$args" == *"-oru"* ]] && [ -f "$checktrnfile" ]; then
defaultlang='lang=pli-rus'
fnlang=_ru

defaultlang='lang=pli-rus'
 translation="$checktrnfile"
 else
 defaultlang='lang=pli'
    translation=`ls $lookup/translation/en/$translator/$pathblock/*${filenameblock}_*`
fi   
    variant=`ls $lookup/variant/pli/ms/$pathblock/*${filenameblock}_* 2>/dev/null`
    
    np=`echo $filenameblock | sed 's@\.@_@g'`
#    tr=`nice -$nicevalue find $searchdir -name "*${np}-*"`
tr=`ls $searchdir/*${np}-* 2>/dev/null`
     thrulink=`echo $tr | sed 's@.*theravada.ru@'$linkforthru'@g'`

if [[ $filenameblock == *"dn"* ]]
then 
dnnumber=`echo $filenameblock | sed 's/dn//g'`
if [[ $mode == "offline" ]]
then 
thrulink="`ls -R $thsulocation/dn/ | grep \"dn${dnnumber}.html\" | awk -v lths="$linkforthsu" '{print lths\"/dn/\"$0}'`"
else 
thrulink=`grep "ДН $dnnumber" $thsucurldn | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'"' '{print $2}'`
fi
  fi 

if [[ "$language" == *"Pali"* ]]; then
        file=$roottext
elif [[ "$language" == "English" ]]; then
        file=$translation
fi 
   
if echo $filenameblock | grep -E "(sn|an)[0-9]{0,2}.[0-9]{0,3}-[0-9]{0,3}" >/dev/null || echo $filenameblock | grep -E "dhp[0-9]{0,3}-[0-9]{0,3}" >/dev/null
then 
suttanumber=`nice -$nicevalue grep -E -Ei $filenameblock $basefile | awk '{print $2}' | awk -F':' '{print $1}' | sort | uniq `
forbwranges=$suttanumber 
else 
suttanumber=$filenameblock
fi 
if [[ "$roottext" == *"/dhp/"* ]] ||  [[ "$roottext" == *"/iti/"* ]] ||  [[ "$roottext" == *"/ja/"* ]] 
        then 
        roottitle=`nice -$nicevalue grep -m1 ':0\.4' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif [[ "$roottext" == *"/pli-tv-pvr/"* ]] 
then
roottitle=`nice -$nicevalue grep -E -m3 ':0\.[23]' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif [[ "$roottext" == *"/pli-tv-bu-pm"* ]] || [[ "$roottext" == *"/pli-tv-bi-pm"* ]] 
then
roottitle=`nice -$nicevalue grep -E -m2 ':0\.2' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif [[ "$roottext" == *"/pli-tv-kd/"* ]] 
then
roottitle=`nice -$nicevalue grep -E -m3 ':0\.[3-4].*khandhaka' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif [[ "$roottext" == *"/pli-tv-b"* ]] 
then
  roottitle=`nice -$nicevalue grep -E -m3 ':0\.[3-5].*sikkhāpada' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif ls $roottext | grep -E -q -m1 "sn[0-9]{0,2}.[0-9]*_"
then
  roottitle=`nice -$nicevalue grep -m1 "${suttanumber}," $sntoccsv | awk -F',' '{print $8" "$4}' | sort -Vf | uniq`

elif ls $roottext | grep -E -q "(sn|an)[0-9]{0,3}.[0-9]*-[0-9]*_"
then

samyuttaname=`grep -m1 \`echo $suttanumber | awk -F'.' '{print $1}'\` $sntoccsv | awk -F',' '{print $4}'`
      roottitle="`nice -$nicevalue grep -E -i "$pattern" $roottext | clearsed | awk '{print $1}' | awk -F':' '{print $1}' | sort -Vf | uniq |  xargs ` $samyuttaname"
else 
roottitle=`nice -$nicevalue grep ':0\.' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs | grep -E -oE "[^ ]*sutta[^ ]*"`
fi 
#echo -e "Content-Type: text/html\n\n"
#echo $@

if [[ "$translation" == *"/dn/"* ]] || [[ "$translation" == *"/mn/"* ]] || [[ "$translation" == *"/ud/"* ]] 
        then 
        trntitle=`nice -$nicevalue grep -m1 ':0\.2' $translation | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif [[ "$translation" == *"/dhp/"* ]] ||  [[ "$translation" == *"/iti/"* ]] 
        then 
        trntitle=`nice -$nicevalue grep -m1':0\.4' $translation | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
elif [[ "$translation" == *"/pli-tv-b"* ]] 
then
trntitle=`nice -$nicevalue grep -E -m3 ':0\.[3-5].*rule' $translation | clearsed | awk '{print substr($0, index($0, $2))}' | xargs `
        else
        trntitle=`nice -$nicevalue grep -m1 ':0\.3' $translation | clearsed | awk '{print substr($0, index($0, $2))}' | sort -Vf | uniq | xargs `
        fi 
translatorsname=`echo $translation | awk -F'/en/' '{print $2}' | awk -F'/' '{print $1}'`

if [[ "$fortitle" == *"Suttanta"* ]]
then
linkthai=`echo $filenameblock |  awk -v lkth="$linkforthai" -v ext="$linkforthaiext" '{print lkth$0''ext}' `
link=`echo $filenameblock |  awk -v lkru="$linkforru" -v ext="$linkforruext" '{print lkru$0''ext}' `
fi

linkgeneral=`echo $filenameblock |  awk '{print "'${pagelang}'/sc/?q="$0}' ` 

#"&'$defaultlang'

linkpli=`echo $filenameblock |  awk '{print "'$urllinkpli${pagelang}'/sc/?q="$0}' `
#"&'$defaultlang'"
#echo "root=$roottext trn=$translation" 

genbwlinks

count=`nice -$nicevalue grep -E -oi$grepgenparam "$pattern" $file $variant | wc -l ` 
echo $count >> $tempfile

word=`getwords | grepexclude | removeindex | clearsed | sedexpr | awk '{print tolower($0)}' | highlightpattern | xargs` 

if [[ "$suttanumber" != *"pli-tv-bi-vb-pd2-8"* ]]
then
indexlist=`nice -$nicevalue grep -E -i "${suttanumber}:" $basefile | awk '{print $2}' | sort -Vf | uniq`
else 
indexlist=`nice -$nicevalue grep -E -i "pli-tv-bi-vb-pd" $basefile | awk '{print $2}' | sort -Vf | uniq`
fi

echo $indexlist > indexlist
firstIndex=$(echo $indexlist | tr ' ' '\n' | head -n1 | awk -F':' '{print $2}'  )

linkgeneralwithindex="$linkgeneral#$firstIndex"
#echo "ind=$indexlist ls=`ls $basefile` stn=$suttanumber fnb=$filenameblock"

metaphorcount=`nice -$nicevalue grep -m1 ${filenameblock}_ $metaphorcountfile | awk '{print $2}'`
if [[ $metaphorcount == "" ]]
then
metaphorcount=`nice -$nicevalue cat $file | pvlimit | clearsed | nice -$nicevalue grep -iE "$metaphorkeys" | nice -$nicevalue grep -vE "$nonmetaphorkeys" | tr -s ' '  '\n' | nice -$nicevalue grep -iE "$metaphorkeys" | wc -l` 
sankhamEvamcount=`cat $file | tr '\n' '\a' | grep -ioc 'saṅkhaṁ gacchati.*Evamevaṁ'`
metaphorcount=$(( $metaphorcount + $sankhamEvamcount ))
fi

echo "<tr>
<td><a class=\"freebutton\" target=\"_blank\" href="$linkgeneralwithindex">$filenameblock</a></td>
<td><strong class=\"pli-lang inputscript-ISOPali\">`echo $roottitle | highlightpattern` </strong>`echo ${trntitle}  | highlightpattern ` </td>
<td>${word}</td>
<td>$count</td>   
<td>$metaphorcount</td>
<td>
<a target=\"_blank\" href="$linken">En</a> 
`[[ $linkthai != "" ]] && echo "<a target=\"_blank\" href="$linkthai">ไทย</a>"`
`[[ "$thrulink" != "" ]] && echo "<a target=\"_blank\" href="$thrulink">Ru</a>"` 
`[[ "$thrulink" == "" ]] && [[ $link != "" ]] && echo "<a target=\"_blank\" href="$link">Ru</a>"` 
</td>" | tohtml 
echo "<td><p>" | tohtml 

for i in $indexlist
do
		for f in $roottext $translation $variant
        do     
		anchor=`echo $i | awk -F':' '{print $2}'`
		quote=`nice -$nicevalue grep -E -B${linesbefore} -A${linesafter} -iE "${i}(:|[^0-9]|$)" $f | grep -v "^--$" | removeindex | clearsed | awk '{print substr($0, index($0, $2))}'  | highlightpattern `
[[ "$f" == *"root"* ]] && echo "<span class=\"pli-lang inputscript-ISOPali\" lang=\"pi\">$quote <a target=_blank class=\"text-white text-decoration-none\" href=\"$linkgeneral#$anchor\">&nbsp;&nbsp;</a></span><br class=\"btwntrn\">" || echo "<span class=\"eng-lang text-muted font-weight-light\" lang=\"en\">$quote</span>"
done
echo '<br class="styled">'
done | tohtml 
echo "</p></td>
</tr>" | tohtml

done
matchqnty=`awk '{sum+=$1;} END{print sum;}' $tempfile`

}
#e g for Russian language
elif [[ "$type" == html ]]; then

filelist=`echo "
${words}
${links}
${links_and_words}
${quotes}
${tempfile}
${table}"`

#${texts}

grepvar=l

function linklist {
if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
cat $templatefolder/Header.html $templatefolder/ResultTableHeader.html | sed 's/$title/TitletoReplace/g' | tohtml 
else
cat $templatefolder/Header.html $templatefolder/ResultTableHeader.html | sed 's/$title/TitletoReplace/g' |sed '/forshellscript/d' | tohtml 

fi 

uniquelist=`cat $basefile |grep -vE "(ud|sn|an)[0-9]{0,3}.html|/bw/home" | grep -Ev "palisearch|engsearch|standalone.js" | pvlimit | awk '{print $1}' | awk -F'/' '{print $NF}' | sort -Vf | uniq`


textlist=$uniquelist
    for i in $uniquelist
do

if [[ "$args" == *"-tru"* ]]; then
filenameblock=`echo $i |  sed 's/-.*//g' | sed 's@_@.@g' | sort -Vf | uniq `
else 
filenameblock=`echo $i |  sed 's/.html//g' | sort -Vf | uniq `
fi 
echo $i >> sddd

file=`grep -m1 "${i}" $basefile `

tr=$file

    suttanumber="$filenameblock"

linkgeneral=`echo $filenameblock |  awk '{print "'${pagelang}'/sc/?q="$0}' `
#"&'$defaultlang'"
linklang="$linkgeneral"


if [[ "$@" == *"-b"* ]]; then
roottext=`nice -$nicevalue find $bwlocation -name "*${filenameblock}_*" -not -path "*/home/*" -not  -path "*/css/*" -not -path "*/js/*" -not -path "*/engsesrch/*"`
else
#pathblock=`echo $pathAndfile | awk -F'/' '{ var=NF-1 ; for (i=1;i<=var;i++) printf $i"/"}'`
#roottext=`ls $lookup/root/pli/ms/$pathblock/*${filenameblock}_*`

roottext=`nice -$nicevalue find $lookup/root -name "*${filenameblock}_*" -not -path "*/blurb/*" -not  -path "*/name*" -not -path "*/site/*"`
fi
        if [[ "$language" == *"Pali"* ]]; then
        file=$roottext
   # elif [[ "$language" == "Russian" ]]; then
   else
        file=$tr
        remtitle=`echo $filenameblock | sed 's/[A-Za-z]//g'`
suttatitle=`grep -m1 $hwithtitle $file | clearsed | xargs | sed 's@'$remtitle'@@g'`

	   np=`echo $filenameblock | sed 's@\.@_@g'`
   # tr=`find $searchdir -name "*${np}-*"`
tr=`ls $searchdir/*${np}-* 2>/dev/null`
     thrulink=`echo $tr | sed 's@.*theravada.ru@'$linkforthru'@g'`

linklang="$thrulink"	
fi

roottitle=`nice -$nicevalue grep -m5 ':0\.' $roottext | clearsed | awk '{print substr($0, index($0, $2))}' | xargs | grep -E -oE "[^ ]*sutta[^ ]*"`

if ls $roottext | grep -E -q "sn[0-9]{0,2}.[0-9]*_"
then
roottitle=`nice -$nicevalue grep -m1 "${suttanumber}," $sntoccsv | awk -F',' '{print $8" "$4}' | sort -Vf | uniq`
fi
  
 if [[ $filenameblock == *"dn"* ]]
then 
if [[ $mode == "offline" ]]
then 
dnnumber=`echo $filenameblock | sed 's/dn//g'`
linklang="`ls -R $thsulocation/dn/ | grep \"dn${dnnumber}.html\" | awk -v lths="$linkforthsu" '{print lths\"/dn/\"$0}'`"
else 
linklang=` grep "ДН $dnnumber" $thsucurldn | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'"' '{print $2}'`
fi
  fi    
  
genbwlinks
  

linkthai=`echo $filenameblock |  awk -v lkth="$linkforthai" -v ext="$linkforthaiext" '{print lkth$0''ext}' `

count=`nice -$nicevalue grep -E -oi$grepgenparam "$pattern" $file $variant | wc -l ` 
echo $count >> $tempfile

word=`getwords | grepexclude | xargs | clearsed | sedexpr | highlightpattern`
indexlist=`nice -$nicevalue grep -E -i $filenameblock $basefile | awk '{print $2}'`

metaphorcount=`nice -$nicevalue grep -m1 ${filenameblock}_ $metaphorcountfile | awk '{print $2}'`
if [[ $metaphorcount == "" ]]
then

metaphorcount=`nice -$nicevalue cat $file | pvlimit | clearsed | nice -$nicevalue grep -iE "$metaphorkeys" | nice -$nicevalue grep -vE "$nonmetaphorkeys" | tr -s ' '  '\n' | nice -$nicevalue grep -iE "$metaphorkeys" | wc -l` 
sankhamEvamcount=`cat $file | tr '\n' '\a' | grep -ioc 'saṅkhaṁ gacchati.*Evamevaṁ'`
metaphorcount=$(( $metaphorcount + $sankhamEvamcount ))
fi

echo "<tr>
<td><a target=\"_blank\" href="$linkgeneral">$suttanumber</a></td>
<td><strong class=\"pli-lang inputscript-ISOPali\">`echo $roottitle | highlightpattern`</strong>`echo "${suttatitle}" | highlightpattern ` </td>
<td>$word</td>
<td>$count</td>   
<td>$metaphorcount</td>
<td><a target=\"_blank\" href="$linken">Eng</a>&nbsp;
`[[ $linkthai != "" ]] && echo "<a target=\"_blank\" href="$linkthai">ไทย</a>&nbsp;"`
<a target=\"_blank\" href="$linklang">Рус</a>`[[ "$thrulink" != "" ]] && [[ "$thrulink" != "$linklang" ]] && echo "&nbsp;<a target=\"_blank\" href="$thrulink">Вар. 2</a>"` 
</td>
<td>" | tohtml

nice -$nicevalue grep -E -B${linesbefore} -A${linesafter} -ih "${pattern}" $file | grep -v "^--$" | clearsed | highlightpattern  | while IFS= read -r line ; do
echo "$line"
echo '<br class="styled">'
done | tohtml

echo "</td>
</tr>" | tohtml

done

matchqnty=`awk '{sum+=$1;} END{print sum;}' $tempfile`
}

fi

function getbasefile {

if [[ "$pattern" == *"ṅ"* ]]; then
initialNorM="ṅ"
elif [[ "$pattern" == *"ṃ"* ]];  then
initialNorM="ṃ"
fi
  
if [[ "$pattern" != *"["* ]] &&  [[ "$pattern" != *"]"* ]];  then
pattern=`echo $pattern | sed 's/е/[ёе]/g' | sed 's/[ṅṃ]/[ṅṁṃ]/g'`
fi

if [[ "$@" == *"-onl"* ]]
then
 if [[ $pattern == *"("* ]] && [[ $pattern == *")"* ]] 
 then
 pattern=`echo $pattern | sed 's@ @|@g' `
 else
 pattern=`echo $pattern | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' `
 fi
fi

checkifalreadydone

grepbasefile | grep -v "^--$" | grepexclude | clearsed | sort -Vf > $basefile



if [[ "$@" == *"-defall"* ]] 
then
mintexts=1000
else 
mintexts=1
fi
#echo $mintexts
texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`

if [[ "$@" == *"-def"* ]] && (( $texts <= $mintexts )) && [[ "$@" != *"-vin"* ]]
then 
#echo mintxt=$mintexts txt=$texts
#echo "$tmpdef bf $texts"
grepbasefileExtended1 | grep -v "^--$" | grepexclude | clearsed | sort -Vf >> $basefile
texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
#echo "$tmpdef bf+1 $texts"
fi

if [[ "$@" == *"-def"* ]] && (( $texts <= $mintexts )) && [[ "$@" != *"-vin"* ]]
then 
grepbasefileExtended2 | grep -v "^--$" | grepexclude | clearsed | sort -Vf >> $basefile

texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
#echo "bf+12 $texts"
fi

texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
if [[ "$@" == *"-def"* ]] && (( $texts <= $mintexts )) && [[ "$@" != *"-vin"* ]]
then 
nice -$nicevalue grep -E -A1 -Eir "${defpattern}.{0,50}saṅkhaṁ gacchati" $suttapath/$pali_or_lang --exclude-dir={$sutta,$abhi,$vin,xplayground,name,site} --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} | grep -E -B1 Evamevaṁ | grep -v "^--$" >> $basefile

texts=`awk -F"$type" '{print $1}' $basefile | sort | uniq | wc -l`
#echo "bf+12sk $texts"
fi

linescount=`wc -l $basefile | awk '{print $1}'`
if [ ! -s $basefile ]
then

pattern="`echo $pattern | sed 's/\[ёе\]/е/g'`"
	Erresponse
	#Clarification
     rm $basefile
     exit 1
elif [ $linescount -ge $maxmatchesbg ] && [[ "$@" != *"-nbg"* ]];  then  
bgswitch
exit 3
#	echo "$@" | sed 's/-oru //g' | sed 's/-oge //g' | sed 's/-ogr //g'   | sed 's/-nbg //g' >> ../input/input.txt
fi

}

rm $basefile > /dev/null 2>&1
getbasefile "$@"
#cleanup in case the same search was launched before
rm ${table} $tempfile $tempfilewords $tempfilewhistory > /dev/null 2>&1

#add links to each file
linklist

if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
genwordsfile
fi 
textsqnty=`echo $textlist | wc -w`

pattern="`echo $pattern | sed 's/\[ёе\]/е/g'`"
pattern=$userpattern
title="`echo "$pattern" | sed 's/^[[:lower:]]/\U&/'`${addtotitleifexclude} $textsqnty texts and $matchqnty matches in $fortitle $language"
titlewords="`echo "$pattern" | sed 's/^[[:lower:]]/\U&/'`${addtotitleifexclude} $uniqwordtotal related words in $textsqnty texts and $matchqnty matches in $fortitle $language"

sed -i 's/TitletoReplace/'"$title"'/g' ${table}
sed -i 's/TitletoReplace/'"$titlewords"'/g' ${tempfilewords}

OKresponse

#finalize words file 
oldname=$tempfilewords
removerand=`echo $tempfilewords| sed 's@\.'$rand'@@'`
if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
tempfilewords=${removerand}_${textsqnty}-${matchqnty}-${uniqwordtotal}.html
else
tempfilewords=${removerand}_${textsqnty}-${matchqnty}.html
fi 

echo "</tbody>
</table>
<br><br><hr>
<a href='/' id='back'>Main</a>&nbsp;
<a href='${pagelang}/sc'>Read</a>&nbsp;
<a href='/assets/diff'>SuttaDiff</a>&nbsp;
<a href='/history.php'>History</a>&nbsp;"  | tohtml
if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
echo "<a href=\"/result/${tempfilewords}\">Words</a>" | tohtml
#replace button href in qoute file
fi 

cat $templatefolder/Footer.html | tohtml
mv ./$oldname ./$tempfilewords

#finalize quotes file 
oldname=$table
removerand=`echo $table| sed 's@\.'$rand'@@'`
table=${removerand}_${textsqnty}-${matchqnty}.html

echo "</tbody>
</table>
<br><br><hr>
<a href='/' id='back'>Main</a>&nbsp;
<a href='${pagelang}/sc'>Read</a>&nbsp;
<a href='/assets/diff'>SuttaDiff</a>&nbsp;
<a href='/history.php'>History</a>&nbsp;
<a href=\"/result/${table}\">Quotes</a>
" >> $tempfilewords
#replace button href in word file
cat $templatefolder/WordsFooter.html >> $tempfilewords
mv ./$oldname ./$table

if [[ "$language" == *"Pali"* ]] ||  [[ "$language" == *"English"* ]]; 
then
sed -i 's@$quotesLinkToReplace@'./$table'@' ./$tempfilewords
sed -i 's@$wordLinkToReplace@'./$tempfilewords'@' ./$table
fi 

linenumbers=`cat -n $history | grep -E "$table" | grep daterow | grep "${fortitle^}" | grep ">$language<" | awk '{print $1}' | tac`

for i in $linenumbers
do 
sed -i "${i}d" $history 
done 

if [[ $excludepattern != "" ]]
then
userpattern="$pattern exc. ${excludepattern,,}"
fi 

echo -n "<!-- begin $userpattern --> 
<tr><td><a class=\"outlink\" href=\"./result/${table}\">${userpattern}</a></td><th>$textsqnty</th><th>$matchqnty</th><th><a class=\"outlink\" href=\"./result/${tempfilewords}\">$uniqwordtotal</a></th><td>${fortitle^}</td><td>$language</td><td class=\"daterow\">$dateforhist</td><td>`ls -lh ${table} | awk '{print  $5}'`</td><td>" >> $history

if [[ "$type" == json ]]; then
  if (( $textsqnty <= 40 ))
  then
  echo -n "<br>`cat $tempfilewhistory | grep href | highlightpattern | xargs`" >> $history
  else 
  echo -n "<br>" >> $history
  fi
elif  [[ "$language" == Thai ]] && [[ "$fortitle" == *"Suttanta"* ]]
then
  if (( $textsqnty <= 40 ))
  then
  echo -n "`cat $basefile | awk -F':' '{print $1}' | awk -F'/' '{print $NF}' | sed 's/.html//g' | awk -F'_' -v lkth="$linkforthai" -v ext="$linkforthaiext"  '{print \"<a target=_blank href="lkth$1''ext">"$1"</a>\"}' | sort -u | sort -Vf | xargs`" >> $history
  else 
  echo -n "<br>" >> $history
  fi
else
  if (( $textsqnty <= 40 ))
  then
 # cat $basefile > checkitout
echo -n "`cat $basefile | awk -F':' '{print $1}' | awk -F'/' '{print $NF}' | sed 's/.html//g' | awk -F'_' '{print \"<a target=_blank href=/sc/?q="$1">"$1"</a>\"}' | sort -u | sort -Vf | xargs`" >> $history
#&lang=pli
  else 
  echo -n "<br>" >> $history
  fi
fi

echo "</td></tr>
" >> $history

rm $basefile $tempfile $tempfilewhistory tmp*$rand* *$rand* > /dev/null 2>&1
echo "<script>window.location.href=\"./result/${table}\";</script>"

exit 0
