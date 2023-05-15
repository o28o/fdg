roottextdir=/data/data/com.termux/files/usr/share/apache2/default-site/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta
audiodir=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/audio
#nikaya=sn
#book=${nikaya}$@

function move {
cd $audiodir
mv /storage/emulated/0/Download/*ogg ./
ls *.ogg | awk -F'.' '{print "mkdir "substr($1,0,2)"/"$1" ; mv "$1"* "substr($1,0,2)"/"$1}' | sort -Vf | uniq > tmpmove
cat tmpmove 
bash tmpmove
}

function check {
  rm $audiodir/tmpcheck
	cd $audiodir/$nikaya/$book/
	for i in `ls $roottextdir/$nikaya/$1/* | sed 's/_root.*//g' | awk -F'/' '{print $NF}' | sort -Vf ` ; do  
		ls $i* 1>/dev/null
	done 2>&1 | awk -F"'" '{print $2}' | sed 's/*//g' | sort -Vf | while read line 
do
echo $line 
echo "termux-open-url https://voice.suttacentral.net/scv/index.html?#/sutta?search=$line" >> $audiodir/tmpcheck
done
echo "do you want to open missing links?"
read
bash $audiodir/tmpcheck
	cd - >/dev/null
}


move


#book=`ls * | sed 's/\..*//g' `
if [[ $@ != "" ]] then 
book=$@
nikaya=`echo $book | sed 's/[0-9]*//g'`

	if [[ $book =~ [0-9] ]];then
	book=$book
	else
	book=
	fi
	check $book
else

for i in `cat tmpmove | awk -F'/' '{print $2}' | awk '{print $1}' | sort | uniq`
do 
echo $i
check $i

done
fi 


