#!/bin/bash -i
#set -x 
#trap read debug

#######################################
#   Bahussuto hoti sutadharo sutasannicayo. 
#   Ye te dhammā ādikalyāṇā majjhekalyāṇā pariyosānakalyāṇā 
#   sātthā sabyañjanā kevalaparipuṇṇaṁ parisuddhaṁ brahmacariyaṁ 
#   abhivadanti tathārūpāssa dhammā bahussutā honti dhātā vacasā 
#   paricitā manasānupekkhitā diṭṭhiyā suppaṭividdhā.
################ mn53 #################

if [[ "`uname -a`" == *"rym.from.sh"* ]]; then
source /home/a0092061/domains/find.dhamma.gift/public_html/config/script_config.sh --source-only
elif [[ "`uname -a`" == *"Android"* ]]; then 
source /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/config/script_config.sh --source-only
#elif [[ "`uname -a`" == *"CYGWIN"* ]]; then
#source=/home/mobaxterm/scripts/script_config_moba.sh
fi

cd $output 

listfile=listhtml.tmp
lsout=lsout.tmp

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

if [[ $@ == "" ]]
then 
titleT='<title>Search History</title>'
titleH='<h3 class="pl-2 ml-2" style="text-decoration: none">Search History</h3>'
title='Search History'
replacehref='/archive.php'
buttonname='Archive'
cat $templatefolder/Header.html | sed 's@<title>$title</title>@'"$titleT"'@' | sed 's@$title@'"$title"'@g' 
cat $templatefolder/ListTableHeader.html | sed 's@<h3 class="pl-2 ml-2">$title</h3>@'"$titleH"'@g' | sed 's@$title@'"$title"'@g' | sed 's@$replacehref@'"$replacehref"'@g' | sed 's@$ReplaceMe@'"$buttonname"'@g' 


tac $history | grep "<tr>" | head -n $archivenumber
function switchlink {
echo "<a href=\"/archive.php\">Archive</a>&nbsp;"
}

elif  [[ $@ == "arc" ]]
then 
titleT='<title>Search Archive</title>'
titleH='<h3 class="pl-2 ml-2" style="text-decoration: none">Search Archive</h3>'
title='Search Archive'
replacehref='/history.php'
buttonname='History'
cat $templatefolder/Header.html | sed 's@<title>$title</title>@'"$titleT"'@' | sed 's@$title@'"$title"'@g' 
cat $templatefolder/ListTableHeader.html | sed 's@<h3 class="pl-2 ml-2">$title</h3>@'"$titleH"'@g' | sed 's@$title@'"$title"'@g' | sed 's@$replacehref@'"$replacehref"'@g' | sed 's@$ReplaceMe@'"$buttonname"'@g' 




tac $history | grep "<tr>" | tail -n +$(( $archivenumber + 1 ))
function switchlink {
echo "<a href=\"/history.php\">History</a>&nbsp;"
}
fi

echo "</tbody>
</table>
<a href=\"/\">Main</a>&nbsp;
`switchlink`" 
cat $templatefolder/ListFooter.html 

exit 0

md5_stdout=`listsearchresults | md5sum | cut -d" " -f 1`
md5_file=`md5sum $lsout | cut -d" " -f1`
#echo $md5_stdout $md5_file
if [[ "$md5_stdout" == "$md5_file" ]]
then 
#cat $listfile 
#exit 0
fi 

listsearchresults | while IFS= read -r line ; do

file=`echo $line | awk '{print $NF}'`
pitaka=`echo $file | awk -F'_' '{mu=(NF-1); print $mu}' | sed 's/nta//g'`
language=`echo $file | awk -F'_' '{print $NF}' | awk -F'.' '{print $1 }'`
link=/result/$file
#searchedpattern=`echo $file | awk -F'_' '{print $1}' | sed 's/-/ /g'`
searchedpattern=`echo $file | awk -F'_' '{mu=(NF-1); $mu=$NF=""; print }' | sed 's/-/ /g'`
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
