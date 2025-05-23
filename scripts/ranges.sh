source ./config/script_config.sh --source-only
string=$@

if [[ $string =~ [0-9]-[0-9] ]];then
string=`echo $string | sed 's@-.*@@g'`
fi
stringforrange=`echo $string |sed 's@\.@\\\.@g'`
#echo str4rg=$stringforrange

partforrange=`echo $stringforrange| sed 's@\..*@\\.@g'`
#echo $partforrange
textnameforrange=`echo $partforrange| sed 's@[0-9].*@@g'`

if [[ $string == *"dhp"* ]]; then
partforrange=`echo $stringforrange| sed 's@[0-9]*@@g'`

    textnameforrange=`echo $partforrange | sed 's@[0-9]*@@g'`
    
fi


#echo $textnameforrange
if [[ $string =~ [0-9]\.[0-9] ]]
then
#echo 1
textnumforrange=`echo $stringforrange| sed 's@.*\.@@g'`
#echo $textforrange
check=$partforrange
ranges=`grep -iE "[0-9]-[0-9]" $indexesfile | grep -i "$partforrange" | awk -F'/' '{print $NF}' | awk -F'_' '{print $1}' |  awk -F'.' '{print $NF}' `
#echo $ranges
elif  [[ $textnameforrange == *"bu-"* ]] || [[ $textnameforrange == *"bi-"* ]] ||  [[ $textnameforrange == *"vb-"* ]] 
then

if  [[ $textnameforrange != *"vb-"* ]] 
then
textnameforrange=`echo "$textnameforrange" | sed 's/bi-/bi-vb-/g'| sed 's/bu-/bu-vb-/g'`
fi 
#echo vinayacase
textnumforrange=`echo $string| sed 's@[A-Za-z]@@g' | sed 's@-@@g'`
#echo $textnumforrange
textnameforrange=`echo $textnameforrange | sed 's@pli-tv-@@'`
check=`echo $textnameforrange | sed 's@vb-@@g'`
ranges=`grep -iE "[0-9]-[0-9]" $indexesfile | grep -i "$partforrange" | awk -F'/' '{print $NF}' | awk -F'[._]' '{print $1}' | sed 's/[^0-9]*\([0-9].*\)/\1/' `
#echo $ranges
else
#elif  [[ $textnameforrange != *"\."* ]]
#then
#echo 2
textnumforrange=`echo $stringforrange| sed 's@[A-Za-z]@@g'`
#echo $textforrange
check=$textnameforrange
ranges=`grep -iE "[0-9]-[0-9]" $indexesfile | grep -i "$partforrange" | awk -F'/' '{print $NF}' | awk -F'[._]' '{print $1}' | sed 's@[A-Za-z]@@g' `
#echo $ranges
fi

for range in $ranges
do 
start=`echo $range | awk -F'-' '{print $1}'`
end=`echo $range | awk -F'-' '{print $2}'`
if (( $textnumforrange >= $start )) && (( $textnumforrange <= $end ))
then 
rangeforlink=$check$range
echo "$rangeforlink#$string" | sed 's@\\@@g'
break
fi
done

exit 0