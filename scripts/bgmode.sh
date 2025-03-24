#!/bin/bash
echo script started `date`
cd /home/a0092061/domains/dhamma.gift/public_html/input
pscheck=`ps -ef | grep bgmode.sh | grep -v grep | wc -l`
inputfile=./input.txt
echo pscheck $pscheck 
echo

#debug info
echo begin ps list
ps -ef | grep bgmode.sh | grep -v grep
echo end 
echo
#quit if already running
if (( $pscheck >= 5 ))
then 
  echo "`date` already running"
  exit 1
fi

#clean emptly lines
sed -i '/^$/d' ./input.txt
#grep -v "^$" $inputfile > temp  
#mv temp $inputfile

#run the main script
cat input.txt | sort | uniq | while read -r line 
do  
echo "working on $line `date`"
sed -i '/^'"$line"'$/Id' ./input.txt 
nice -19 ../scripts/findinall.sh -nbg "$line" 
#  grep -v "$line" $inputfile > ./temp ;
#  mv ./temp $inputfile
  echo "done with $line `date`"
done 
echo script ended `date`
exit 0
