#!/bin/bash -i
#set -x 
#trap read debug

source /home/a0092061/domains/find.dhamma.gift/public_html/scripts/script_config.sh --source-only
output=/home/a0092061/domains/find.dhamma.gift/result/
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
#echo $md5_stdout $md5_file
if [[ "$md5_stdout" == "$md5_file" ]]
then 
cat $listfile 
exit 0
fi 

listsearchresults > $lsout


cat $templatefolder/Header.html $templatefolder/ListTableHeader.html | sed 's/$title/'"$title"'/g' | tee $listfile


listsearchresults | while IFS= read -r line ; do

file=`echo $line | awk '{print $NF}'`
pitaka=`echo $file | awk -F'_' '{print $2}' | sed 's/nta//g'`
language=`echo $file | awk -F'_' '{print $3}' | awk -F'.' '{print $1 }'`
link=/result/$file
#searchedpattern=`echo $file | awk -F'_' '{mu=(NF-2); $mu=$NF=""; print }'`
searchedpattern=`echo $file | awk -F'_' '{print $1}' | sed 's/-/ /g'`
#if [ ${#searchedpattern} -ge $truncatelength ]
#then
#  searchedpattern="`echo $searchedpattern | head -c $truncatelength`..."
#fi


creationdate=`echo $line | awk '{print $2}'`
size=`echo $line | awk '{print $1}'`
#extra=`grep "matech in"  $file`   <td>$extra</td>   
#matchescount=`cat ./$file | grep -m1 title | awk -F' matches in ' '{print $1}' | awk -F' texts and ' '{print $NF}'`
#matchescount=`echo $file | awk -F'_' '{print $NF}' | awk -F'-' '{print $2 }'`
#textscount=`cat ./$file | grep -m1 title | awk -F' matches in ' '{print $1}' | awk -F' texts and ' '{print $1}' | awk '{print $NF}'`
#textscount=`echo $file | awk -F'_' '{print $NF}' | awk -F'-' '{print $1 }'`
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
#file=`echo $line | awk '{print $NF}' | sed 's/.html//g'`
#mv $file.html ${file}_${textscount}_${matchescount}.html
done  | tee -a $listfile
echo "</table>
<a href="/">Main page </a>" | tee -a $listfile
cat $templatefolder/Footer.html  | tee -a $listfile


exit 0
<td><a target=\"_blank\" href="/scripts/remove.php?file\=${link">$creationdate</a>  </td>

            <th>Pattern</th>
            <th>Pitaka</th>
            <th>Date</th>
            <th>Size</th>
            <th class="none">Texts</th>
            <th class="none">Matches</th>
            <th class="none">Language</th>