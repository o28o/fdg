roottextdir=/data/data/com.termux/files/usr/share/apache2/default-site/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta
audiodir=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/audio
#nikaya=sn
#book=${nikaya}$@


find $audiodir | grep "+" 

function move {
cd $audiodir
mv /storage/emulated/0/Download/*ogg ./
ls *.ogg | awk -F'.' '{print "mkdir "substr($1,0,2)"/"$1" ; mv "$1"* "substr($1,0,2)"/"$1}' | sort -Vf | uniq > tmpmove
cat tmpmove 
bash tmpmove
}

function check {
  book=$1
  nikaya=`echo $book | sed 's/[0-9]*//g'`
  
	if [[ $book =~ [0-9] ]];then
	book=$book
	else
	book=
	fi
	
	
  rm $audiodir/tmpcheck
	cd $audiodir/$nikaya/$book/
	for i in `ls $roottextdir/$nikaya/$book/* | sed 's/_root.*//g' | awk -F'/' '{print $NF}' | sort -Vf ` ; do  
		ls $i* 1>/dev/null
	done 2>&1 | awk -F"'" '{print $2}' | sed 's/*//g' | sort -Vf | while read line 
do
echo $line 
echo "termux-open-url https://voice.suttacentral.net/scv/index.html?#/sutta?search=$line" >> $audiodir/tmpcheck
done

[[ "$@" != *"-s"* ]] && echo "opening missing links" ; cat $audiodir/tmpcheck | head -n7 | bash || echo nots
	cd - >/dev/null
}


move


#book=`ls * | sed 's/\..*//g' `
if [[ $@ != "" ]] then 
book=`echo $@ | sed 's/-s //g'`
nikaya=`echo $book | sed 's/[0-9]*//g'`

	if [[ $book =~ [0-9] ]];then
	book=$book
	else
	book=
	fi
	check $book
else

for i in `cat tmpmove | awk '{print $2}' | sed 's@.*/@@g' | sort | uniq`
do 
check $i
done
fi 

exit 0

wc -l ready.txt; ./check.sh ; for i in `find an -type f | awk -F'/' '{print $NF}' | sed 's/_.*//g'` ; do sed -i '/'$i'/d' ready.txt ; done ; wc -l ready.txt

for i in `echo "an10.156-166                                                    an10.167                                                        an10.168                                                        an10.169                                                        an10.170
an10.171                                                        an10.173                                                        an10.174                                                        an10.175                                                        an10.177
an10.178"` ; do
termux-open-url https://voice.suttacentral.net/scv/index.html?#/sutta?search=$i
done




iti91
iti109
iti27

snp1.4
snp3.10
snp3.4                                                          

thag6.7                                                         

ud3.2
ud3.3
ud5.3
ud5.5
ud6.4
ud8.10
ud8.6
ud8.9


for i in sn{7..10} ; do  ./check.sh $i; done 