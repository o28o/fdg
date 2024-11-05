cat tst | sed "s/in[ \t]comps/inComps/g"  | tr '\t' '\n' | tr ' ' '\n' | grep -v "^sg$" | grep -v "^pl$" | while read line ; do 
echo -n "$line "
line=$(echo $line | sed 's/ṃ/ṁ/g')
if [[ $line == "nom" ]] || [[ $line == "acc" ]] || [[ $line == "instr" ]] || [[ $line == "dat" ]] ||  [[ $line == "abl" ]] || [[ $line == "gen" ]] || [[ $line == "loc" ]] || [[ $line == "voc" ]] || [[ $line == "inComps" ]]
then 
echo 
elif grep -qE "$line\b" /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/tipitakaWords* 
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

  