#!/bin/bash -i
#set -x 
#trap read debug

source /home/a0092061/domains/find.dhamma.gift/public_html/scripts/script_config.sh --source-only
cd $output 

listfile=listhtml.tmp
lsout=lsout.tmp
title="Search History"

#`grep ':0\.' $file | clearsed |

case=$@ 
if [[ "$case" == "pali" ]]
then
switch=pali
elif [[ "$case" == "en" ]]
then
switch=en
elif [[ "$case" == "ru" ]]
then
switch=ru
elif [[ "$case" == "th" ]]
then
switch=th
else 
switch=
fi


function listsearchresults {
  ls -lpah --time-style="+%d-%m-%Y" *_${switch}* | egrep -v "$listfile|$lsout|_words.html|\.tmp|_fn.txt|table|.git|итого|total|/" | grep -v "^_" | awk '{print substr($0, index($0, $5))}'
}

md5_stdout=`listsearchresults | md5sum | cut -d" " -f 1`
md5_file=`md5sum $lsout | cut -d" " -f1`
echo $md5_stdout $md5_file
if [[ "$md5_stdout" == "$md5_file" ]]
then 
echo equals
#cat $listfile 
exit 0
fi 
echo "not equals"
listsearchresults > $lsout


cat $templatefolder/Header.html $templatefolder/ListTableHeader.html | sed 's/$title/'"$title"'/g' > $listfile


listsearchresults | while IFS= read -r line ; do

file=`echo $line | awk '{print $NF}'`
pitaka=`echo $file | awk -F'_' '{mu=(NF-1); print $mu}' | sed 's/nta//g'`
language=`echo $file | awk -F'_' '{print $NF}' | awk -F'.' '{print $1 }'`
link=/result/$file
searchedpattern=`echo $file | awk -F'_' '{mu=(NF-1); $mu=$NF=""; print }'`
#if [ ${#searchedpattern} -ge $truncatelength ]
#then
#  searchedpattern="`echo $searchedpattern | head -c $truncatelength`..."
#fi


creationdate=`echo $line | awk '{print $2}'`
size=`echo $line | awk '{print $1}'`
#extra=`grep "matech in"  $file`   <td>$extra</td>   
matchescount=`cat ./$file | grep -m1 title | awk -F' matches in ' '{print $1}' | awk -F' texts and ' '{print $NF}'`
textscount=`cat ./$file | grep -m1 title | awk -F' matches in ' '{print $1}' | awk -F' texts and ' '{print $1}' | awk '{print $NF}'`
echo "<tr>
<td><a target=\"_blank\" href="$link">$searchedpattern</a>  
</td>
<td>${language^}</td>
<th>$textscount</th>
<th>$matchescount</th>
<td>${pitaka^}</td>
<td>$size</td>
<td>$creationdate</td>

</tr>"
done >> $listfile
echo "</table>
<a href="/">Main page </a>" >> $listfile
cat $templatefolder/Footer.html >> $listfile
exit 0