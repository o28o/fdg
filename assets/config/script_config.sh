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

if [[ "`uname -a`" == *"Android"* ]]; then 

sitename=http://localhost:8080
mode=offline
apachesitepath=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs
rootpath=$apachesitepath/scripts
suttapath=$apachesitepath/suttacentral.net/
output=$apachesitepath/result/
history="$apachesitepath/result/.history"
sntoccsv="$apachesitepath/assets/sn_toc.csv"
templatefolder=$apachesitepath/assets/templates

searchdir=$apachesitepath/assets/offline/theravada.ru/Teaching/Canon/Suttanta/Texts
indexesfile=$apachesitepath/assets/texts/all_texts_indexes.txt
thsulocation=$apachesitepath/assets/offline/tipitaka.theravada.su/
linkforthsu=/tipitaka.theravada.su
linkforthru=/theravada.ru/
linkforthai=/legacy.suttacentral.net/sc/th/
linkforthaiext='.html'
linkforru=/legacy.suttacentral.net/sc/ru/

wbefore=1
wafter=3
linesafter=0
minlength=3
truncatelength=30
filesizenooverwrite=800000
maxmatchesbg=3000
archivenumber=84

elif [[ "`uname -a`" == *"rym.from.sh"* ]]; then

sitename=https://find.dhamma.gift
mode=online
apachesitepath=/home/a0092061/domains/find.dhamma.gift/public_html/
rootpath=$apachesitepath/scripts
suttapath=/home/a0092061/data/suttacentral.net/
output=$apachesitepath/result/
history="$apachesitepath/result/.history"
sntoccsv="$apachesitepath/assets/sn_toc.csv"
templatefolder=$apachesitepath/assets/templates

searchdir=$apachesitepath/assets/offline/theravada.ru/Teaching/Canon/Suttanta/Texts
indexesfile=$apachesitepath/assets/texts/all_texts_indexes.txt
thsulocation=$apachesitepath/assets/offline/tipitaka.theravada.su/
linkforthsu=https://tipitaka.theravada.su
linkforthru=https://theravada.ru/
linkforthai=https://suttacentral.net/
linkforthaiext=/th/siam_rath
linkforru=https://suttacentral.net/

templatefolder=$apachesitepath/assets/templates

#for find in all theravada.ru suttas
scriptdir=$rootpath
searchdir=$apachesitepath/assets/offline/theravada.ru/Teaching/Canon/Suttanta/Texts
outputdir=$output

#for allwords.sh
homedir=$rootpath
outputdiraw=$output/allwords




wbefore=1
wafter=3
linesafter=0
minlength=3
truncatelength=30
filesizenooverwrite=800000
maxmatchesbg=1900
history="/home/a0092061/domains/find.dhamma.gift/public_html/result/.history"
sntoccsv="/home/a0092061/domains/find.dhamma.gift/public_html/assets/sn_toc.csv"
archivenumber=31



fi



function pvlimit {
pv -L 1m -q
}
function clearargs {
sed -e 's/-pli //g' -e 's/-pi //g' -e 's/-ru //g' -e 's/-en //g' -e 's/-abhi //g' -e 's/-vin //g' -e 's/-th //g' -e 's/^ //g' -e 's/-kn //g' -e 's/-all //g' | sed 's/-oru //g' | sed 's/-ogr //g' | sed 's/-oge //g'| sed 's/-nbg //g' | sed 's/ -exc.*//g' | sed 's/-la [0-9]* //g' | sed 's/-def //g' | sed 's/-ply //g'
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