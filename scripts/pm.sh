
bupm=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/vinaya/pli-tv-bu-pm_root-pli-ms.json
vb=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/vinaya/pli-tv-bu-vb 

type=Sekhiya
i=1
last=11
while true; do
  line=$(jq -r 'to_entries[] | "\(.key)|\(.value)"' $bupm | grep -A1 "$type $i")

  # Проверяем, если grep вернул пустой результат, то выходим из цикла
  if [ -z "$line" ]; then
    break
  fi
  
if [ "$i" -eq $last ]; then
    break
fi
  
  rulename=$(echo "$line" | grep "$type $i" | awk -F'|' '{print $2}' | sed 's/[[:space:]]*$//')

  ruleindex=$(echo "$line" | awk -F':' '{print $2}' | awk -F'|' '{print $1}' | head -n1)
  ruletext=$(echo "$line" | grep -v "$type $i" | awk -F'|' '{print $2}' | sed 's/[[:space:]]*$//')
  vbindex=$(grep -rhi "$ruletext" $vb | awk -F':' '{print $2}' | sed 's/"$//' ) 
  echo '<div class="level4">
   <span class="level5"><a href="/ru/sc/?q=bu-pm#pli-tv-bu-pm:'$ruleindex'">'$rulename'</a> <a href="/ru/sc/?q=pli-tv-bu-vb-sk'$i'#pli-tv-bu-vb-sk'$i':'$vbindex'">vb</a> '$ruletext' </span>
  </div>'

  i=$(( $i + 1 ))
done


