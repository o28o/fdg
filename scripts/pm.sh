
bupm=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/vinaya/pli-tv-bi-pm_root-pli-ms.json
vb=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/vinaya/pli-tv-bi-vb 
vbtrn=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/translation/en/brahmali/vinaya/pli-tv-bi-vb

type="Saṅghādisesa"
typeacr=ss
i=14
last=17
mf=i
cd $vb/pli-tv-bi-vb-$typeacr


while true; do
next=$(( $i + 1 ))
  line=$(jq -r 'to_entries[] | "\(.key)|\(.value)"' $bupm | grep -A1 "|$type $i\." )

  rulename=$(echo "$line" | grep "$type $i\." | awk -F'|' '{print $2}' | sed 's/[[:space:]]*$//')

  ruleindex=$(echo "$line" | awk -F':' '{print $2}' | awk -F'|' '{print $1}' | head -n1)


bupmruleid=$(jq -r 'to_entries[] | "\(.key)|\(.value)"' $bupm | grep -iA0 "|$type $i\." | awk -F'|' '{print $1}' | awk -F'.' '{print $1}')

  fullruletext=$(jq -r 'to_entries[] | "\(.key)|\(.value)"' $bupm | grep -iA30 "$type $i" | grep $bupmruleid | grep -v "$bupmruleid.0"| awk -F'|' '{print $2}' )
  
  
vbindexfile=`find $vbtrn -name "*${typeacr}${i}_*"`
 vbindex=$(grep "Final ruling" $vbindexfile | awk -F':' '{print $2}' | sed 's/"$//' ) 
 
 
  echo '<div class="level4">
<span class="level5">
<a href="/ru/sc/?q=b'$mf'-pm#'$ruleindex'">'$rulename'</a> 
<a href="/ru/sc/?q=pli-tv-b'$mf'-vb-'$typeacr$i'#'$vbindex'">vb</a> '$fullruletext'
</span>
</div>'


if [ -z "$line" ]; then
    break
  fi
  
  
if [ ! -z "$last" ] 
then
if
[ "$i" -eq "$last" ]; then
    break
  fi
fi
    
  
  i=$(( $i + 1 ))
done


exit 0



  # Проверяем, если grep вернул пустой результат, то выходим из цикла
  if [ -z "$line" ]; then
    break
  fi