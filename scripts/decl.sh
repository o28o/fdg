cat tst | sed "s/\*//g" | sed "s/in[ \t]comps/inComps/g"  | sed "s/в[ \t]составе/inComps/g"  |  tr '\t' '\n' | tr ' ' '\n' | grep -v "^sg$" | grep -v "^pl$" | grep -v "^$" | while read line ; do 
echo -n "$line "
line=$(echo $line | sed 's/ṃ$/[ṁṃn]/g')
#line=$(echo $line | sed 's/i$/[iī]/g')
#line=$(echo $line | sed 's/a$/[aā]/g')
if [[ $line == "nom" ]] || [[ $line == "acc" ]] || [[ $line == "instr" ]] || [[ $line == "dat" ]] ||  [[ $line == "abl" ]] || [[ $line == "gen" ]] || [[ $line == "loc" ]] || [[ $line == "voc" ]] || [[ $line == "inComps" ]] ||  [[ $line == "имен" ]] || [[ $line == "вин" ]] || [[ $line == "твор" ]] || [[ $line == "дат" ]] ||  [[ $line == "отл" ]] || [[ $line == "род" ]] || [[ $line == "мест" ]] || [[ $line == "зват" ]] || [[ $line == "возвратный" ]] || [[ $line == "sg" ]] || [[ $line == "pl" ]] || [[ $line == "ед" ]] || [[ $line == "мн" ]] ||  [[ $line == "буд" ]] || [[ $line == "желат" ]] || [[ $line == "повелит" ]] || [[ $line == "наст" ]] || [[ $line == "1st" ]] ||  [[ $line == "2nd" ]] || [[ $line == "3rd" ]] || [[ $line == "fut" ]] || [[ $line == "imp" ]] ||  [[ $line == "opt" ]] || [[ $line == "pr" ]] || [[ $line == "reflexive" ]] || [[ $line == "pp" ]] || [[ $line == "prp" ]]
then 
echo 
elif grep -qE "$line\b" /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/words/ebtWordsVars.txt 
then
echo 
else 
echo "not in tipitaka mula"
fi 
done


exit 0


find /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/ -name "*json" | sort -V | xargs cat | jq -r '.[]' | sed 's/<p>/\n/g; s/<[^>]*>//g' | tr ' ' '\n' | awk '{print tolower($0)}' | grep -v "^$"  | sed 's/[?:;—–!]//g' | sed "s/^[‘“]//g" | sed "s/[‘“] $//g" | sed 's/[\.,\(\),—]//g' | sed "s/’”/”/g" | sed "s/”’/”/g" |  sed 's/[’‘]/”/g' | sed 's/\]//g' | sed 's/\[//g' | sort | uniq -c | sort -r | awk '{print $2, $1}' | grep -v "^[0-9]" > /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/tipitakawords.txt

find /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/variant/pli/ms -name "*json" | sort -V | xargs cat | jq -r '.[]' | sed 's/<p>/\n/g; s/<[^>]*>//g' | tr ' ' '\n' | awk '{print tolower($0)}' | grep -v "^$"  | sed 's/[?:;—–!]//g' | sed "s/^[‘“]//g" | sed "s/[‘“] $//g" | sed 's/[\.,\(\),—]//g' | sed "s/’”/”/g" | sed "s/”’/”/g" |  sed 's/[’‘]/”/g' | sed 's/\]//g' | sed 's/\[//g' | sort | uniq -c | sort -r | awk '{print $2, $1, "var"}' | grep -v "^[0-9]" > /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/tipitakavars.txt

cat /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/tipitakawords.txt /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/tipitakavars.txt > /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/tipitakaWordsAndVars.txt






  