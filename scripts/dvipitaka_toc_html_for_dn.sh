#!/bin/bash

source ./config/script_config.sh --source-only


#apachesitepath=/drives/c/soft/fdg/
assetdir=$apachesitepath/assets/templates

#suttapath=/drives/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/an/an1
suttapath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/dn

translationpath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta

cat $assetdir/TocHeader.html
nikayaabr=dn
nikaya="Dīgha Nikāya"
echo '<div class="container">
    <div class="my-3">
      <button class="btn btn-primary btn-sm btn-fixed-width toggle-button" type="button" id="collapseAll">+</button>
    </div>
<div class="my-3">
      <div class="level1">
        <h2><a href=# data-bs-toggle="collapse"
          data-bs-target="#'$nikayaabr'Collapse">'$nikaya'</a></h2>
      </div>
	  <div class="collapse show showkeep" id="'$nikayaabr'Collapse">'


# Переменные для предыдущих значений vagga, nikaya и anbook
prev_vagga=""
prev_nikaya=""
prev_anbook=""

# Поиск всех JSON файлов в указанном каталоге и его подкаталогах
find "$suttapath" -type f -name "*.json" | sort -V | while read -r file; do
    # Извлечение данных из файла с помощью grep -E

        jq -r 'to_entries[] | "\(.key) \(.value)"' "$file" | grep -E ":0\..*Nikāya|vagga|sutta" > /tmp/tmp

    nikaya=$(cat /tmp/tmp | grep Nikāya | awk '{print $2}')
	
   # anbook=$(cat /tmp/tmp | grep Nikāya | awk '{print $NF}' | awk -F'.' '{print $1}')
    #vagga=$(cat /tmp/tmp | grep vagga | awk '{print $2, $3}')
    suttanum=$(echo $file | awk -F'/' '{print $NF}' | awk -F'_' '{print $1}') 
    suttanumwoletters=`echo $suttanum | sed 's/[^0-9]//g'`
 suttaname=$(cat /tmp/tmp | grep -E "sutta\\b " | awk '{print $2}')
    link=$(echo "$file" | awk -F'/' '{print $NF}' | awk -F'_' '{print "/r/?q="$1}')

if [[ "$suttanumwoletters" -le 13 ]]
then
vagga=Sīlakkhandhavagga
elif [[ "$suttanumwoletters" -ge 14 ]] && [[  "$suttanumwoletters" -le 23 ]]
then
vagga=Mahāvagga
elif [[ "$suttanumwoletters" -ge 24 ]] 
then
vagga=Pāthikavagga
fi

    # Вывод извлеченных данных

#    if [[ "$nikaya" != "$prev_nikaya" ]]; then
#        echo "$nikaya Nikāya"
#    fi

	#vaggalink and div
	if [[ "$vagga" != "$prev_vagga" ]]; then
	
if [[ "$prev_vagga" != "" ]] ; then 
	echo '</div> <!-- close prev vagga div -->'
fi
	
echo '<div class="my-3">
<div class="level4 my-3">
		   <h5>'$vagga'</h5>
                  </div>'
fi
    
	#suttalink div
	echo '<div class="mt-3">
<span class="level5"><a href="/r/?q='$suttanum'">'$suttanum'</a> '"$suttaname"'</span>
</div>'
	echo "  "
    
	
    # Обновление предыдущих значений vagga, nikaya и anbook
    prev_vagga="$vagga"
    prev_nikaya="$nikaya"

done

echo '</div> <!-- Nikaya collapse -->
</div> <!-- Nikaya title + Nikaya collapse inside -->
</div> <!-- Container -->'
# Удаление временного файла
rm /tmp/tmp

cat $assetdir/TocFooter.html
