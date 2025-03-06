###thai translit
apachepath=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs
scroot=$apachepath/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms
thairoot=$apachepath/assets/texts/devanagari/root/pli/ms
tmproot=$apachepath/tmp
outputFileNameAddition=rootd-pli-ms.json

find $tmproot -name "*_"  |sort -V | while read suttaid 
do
suttaid=$(echo $suttaid | awk -F/ '{print $NF}')
outputFile=$thairoot/sutta/${suttaid}${outputFileNameAddition}
echo $suttaid
paste <(awk '{print $1}' < $(find $scroot -name "${suttaid}*")) <(awk -F'": ' '{print $2}' < $tmproot/${suttaid} ) > $outputFile

#cat -n $outputFile
sed -i '1!{            # Пропускаем первую строку
    $!{                # Пропускаем последние две строки
        s/[[:space:]]*$//;  # Убираем пробелы в конце строки
        /",$/!s/$/\",/; # Если строка не заканчивается на ",", добавляем
    }
}' $outputFile
sed -i 's@"",@"@' $outputFile
cat $outputFile | jq 1>/dev/null
done

exit 0

###thai translit
apachepath=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs
scroot=$apachepath/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/
thairoot=$apachepath/assets/texts/devanagari/root/pli/ms
tmproot=$apachepath/tmp
outputFileNameAddition=_
alias aks1='~/aksharamukha/bin/python scripts/paliDev.py '

find $scroot -name "*_*" |sort -V | while read file 
do
suttaid=$(echo $file | awk -F/ '{print $NF}' | awk -F_ '{print $1}')
outputFile=$tmproot/${suttaid}${outputFileNameAddition}
echo $suttaid
aks1 $file > $outputFile
done

exit 0

find -type f | while read i; do
  if ! jq . "$i" >/dev/null 2>&1; then
    echo "$i"
  fi
done

~/aksharamukha/bin/python scripts/aksharamukha-adapter.py อฏฺฐมํฯ



#check 
find -type f | while read f ; do echo $f ; cj $f . > /dev/null; done


$scroot
find . -name "*.json" |sort -V | while read filename 

done

/sn/sn12/${suttaid}_rootth-pli-ms.json

cd $scroot
find . -name "*.json" |sort -V | while read filename 
do
echo $filename
curl --get "http://aksharamukha-plugin.appspot.com/api/public" --data-urlencode "source=ISOPali" --data-urlencode "target=Thai" --data-urlencode "text=$(< $filename)"
sleep 10
done
cd - 


suttaid=sn56.11
filename=$(find $scroot -name "${suttaid}_*")
curl --get "http://aksharamukha-plugin.appspot.com/api/public" --data-urlencode "source=ISOPali" --data-urlencode "target=Thai" --data-urlencode "text=$(< $filename)"

paste <(awk '{print $1}' < $(find $scroot -name "${suttaid}_*")) <(awk -F': ' '{print $2}' < $(find $thairoot -name "${suttaid}_*") ) > $thairoot/sutta/sn/sn12/${suttaid}_rootth-pli-ms.json




curl "http://aksharamukha-plugin.appspot.com/api/public?source=ISOPali&target=Thai" --data-urlencode "text=$(< /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/an/an10/an10.46_root-pli-ms.json )" > an10.46_root-pli-mstmp.json 

paste <(awk -F' ' '{print $1}' /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/an/an10/an10.46_root-pli-ms.json) <(awk -F'": ' '{print $2}' /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/th/root/pli/ms/sutta/an/an10/an10.46_root-pli-mstmp.json ) > an10.46_rootth-pli-ms.json







cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/dn/
find . -name "*.json" |sort -V | while read filename 
do
echo $filename
curl --get "http://aksharamukha-plugin.appspot.com/api/public" --data-urlencode "source=ISOPali" --data-urlencode "target=Thai" --data-urlencode "text=$(< $filename)"
sleep 10
done
cd - 


suttaid=sn12.2
paste <(awk '{print $1}' < $(find /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/ -name "${suttaid}_*")) <(awk -F': ' '{print $2}' < $(find /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/th/root/pli/ms -name "${suttaid}_*") ) > /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/th/root/pli/ms/sn/sn12/${suttaid}_rootth-pli-ms.json



mkdir an{1..11}
mkdir sn{1..56}


for i in an{1..11} ; do  mv ${i}.* $i; done
for i in sn{1..56} ; do  mv ${i}.* $i; done