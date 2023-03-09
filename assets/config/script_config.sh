#################################
# 'anāvattidhammaṁ me cittaṁ 
# kāmabhavāyā’ti paññāya cittaṁ
# suparicitaṁ hoti;
# ‘anāvattidhammaṁ me cittaṁ 
# rūpabhavāyā’ti paññāya cittaṁ 
# suparicitaṁ hoti;
# ‘anāvattidhammaṁ me cittaṁ 
# arūpabhavāyā’ti paññāya cittaṁ 
# suparicitaṁ hoti.
########## an9.25 ##############


export LANG=en_US.UTF-8


if [[ "`uname -a`" == *"Android"* ]]; then 

sitename=http://localhost:8080
nicevalue=1
mode=offline
apachesitepath=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs
suttapath=$apachesitepath/suttacentral.net/

linkforthsu=/tipitaka.theravada.su
linkforthru=/theravada.ru
linkforthai=/legacy.suttacentral.net/sc/th/
linkforthaiext='.html'
linkforru=/legacy.suttacentral.net/sc/ru/

urllinkpli=
urllinken='/sc/?q='
urllinkenend='&lang=pli-eng'
urllinkbw=/bw/

wbefore=1
wafter=3
linesafter=0
minlength=3
truncatelength=30
filesizenooverwrite=10000000
maxmatchesbg=3000
archivenumber=84

elif [[ "`uname -a`" == *"rym.from.sh"* ]]; then

sitename=https://find.dhamma.gift
mode=online
nicevalue=19
apachesitepath=/home/a0092061/domains/find.dhamma.gift/public_html/
suttapath=/home/a0092061/data/suttacentral.net/

linkforthsu=https://tipitaka.theravada.su
linkforthru=https://theravada.ru
linkforthai=https://suttacentral.net/
linkforthaiext=/th/siam_rath
linkforru=https://suttacentral.net/

#for find in all theravada.ru suttas
scriptdir=$rootpath
outputdir=$output

#for allwords.sh
homedir=$rootpath
outputdiraw=$output/allwords

urllinkpli=https://find.dhamma.gift/
urllinken=https://suttacentral.net/
urllinkenmid=/en/
urllinkenend='?layout=linebyline'
urllinkbw=https://thebuddhaswords.net/
urllinkbwend=.html
wbefore=1
wafter=3
linesafter=0
minlength=3
truncatelength=30
filesizenooverwrite=10000000000
maxmatchesbg=1900
archivenumber=31

elif [[ "`uname -a`" == *"Linux"* ]]; then 

sitename=http://localhost
nicevalue=1
mode=offline
apachesitepath=/var/www/html
suttapath=$apachesitepath/suttacentral.net/

linkforthsu=/tipitaka.theravada.su
linkforthru=/theravada.ru
linkforthai=/legacy.suttacentral.net/sc/th/
linkforthaiext='.html'
linkforru=/legacy.suttacentral.net/sc/ru/

urllinkpli=
urllinken='/sc/?q='
urllinkenend='&lang=pli-eng'
urllinkbw=/bw/

wbefore=1
wafter=3
linesafter=0
minlength=2
truncatelength=30
filesizenooverwrite=80000
maxmatchesbg=300000
archivenumber=280
archivenumber=91
fi
#common vars
rootpath=$apachesitepath/assets/scripts
output=$apachesitepath/result/
history="$apachesitepath/result/.history"
sntoccsv="$apachesitepath/assets/texts/sn_toc.csv"
templatefolder=$apachesitepath/assets/templates
textinfofolder=$apachesitepath/assets/texts
bwlocation=$apachesitepath/assets/offline/bw/
indexesfile=$apachesitepath/assets/texts/all_texts_indexes.txt
thsulocation=$apachesitepath/assets/offline/tipitaka.theravada.su/
searchdir=$apachesitepath/assets/offline/theravada.ru/Teaching/Canon/Suttanta/Texts




function pvlimit {
pv -L 1m -q
}
function clearargs {
sed -e 's/-pli //g' -e 's/-pi //g' -e 's/-ru //g' -e 's/-en //g' -e 's/-abhi //g' -e 's/-vin //g' -e 's/-th //g' -e 's/^ //g' -e 's/-kn //g' -e 's/-all //g' | sed 's/-oru //g' | sed 's/-ogr //g' | sed 's/-oge //g'| sed 's/-nbg //g' | sed 's/ -exc.*//g' | sed 's/-la [0-9]* //g' | sed 's/-def //g' |  sed 's/-b //g'
}

function removefilenames {
sed -Ei 's%^.*(.json|.html):%%g' $basefile 
sed -i 's/$/<br>/' $basefile
(echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>' && cat $basefile ) > tmp && mv tmp $basefile

echo "</body>
</html>" >> $basefile
newbasefilename=`echo $basefile | sed 's@_fn.tmp@_raw.html@'`
mv $basefile $newbasefilename
basefile=$newbasefilename
}
  
function removeindex {
sed -e 's/:.*": "/": "/' #      sed 's/ /:/1' | awk -F':'  '{print $1, $3}'
}

function tohtml {
tee -a ${table} > /dev/null
} 

function sedexpr {
sed 's/\.$//g' | sed 's/:$//g' | sed 's/[,!?;«—”“‘"]/ /g' | sed 's/)//g' | sed 's/(//g'  
}

function cleanwords {
  cat $file | removeindex | clearsed | sedexpr | awk '{print tolower($0)}' |grep -Eio$grepgenparam "[^ ]*$pattern[^ ]*"
  }
  
function getwords {
cleanwords | sort | uniq 
cleanwords | tee -a $tempfilewords > /dev/null
}

function highlightpattern {
sed -E "s@$patternForHighlight@<b>&</b>@gI"
}