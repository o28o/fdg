#!/bin/bash

source ./config/script_config.sh --source-only


tmp=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/tmp
#apachesitepath=/drives/c/soft/fdg/
assetdir=$apachesitepath/assets/templates

#suttapath=/drives/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/kn/an1
suttapath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/kn/

translationpath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta

cat $assetdir/TocHeader.html
nikayaabr=kn
nikaya="Khuddaka Nikāya"
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


# Переменные для предыдущих значений vagga, nikaya и knbook
prev_vagga=""
prev_nikaya=""
prev_knbook=""

# Поиск всех JSON файлов в указанном каталоге и его подкаталогах
find "$suttapath" -type f -name "*.json" | grep -E "/(thag|snp|thig)/" | sort -V | while read -r file; do
    # Извлечение данных из файла с помощью grep -E

        jq -r 'to_entries[] | "\(.key) \(.value)"' "$file" | grep -E ":0\..*Nikāya|vagga|sutta|nipāta|gāthā|pucchā" > $tmp

    nikaya=$(cat $tmp | grep Nikāya | awk '{print $2}')
	
    knbook=$(cat $tmp | grep Nikāya | awk '{print $NF}' | awk -F'.' '{print $1}')
    vagga=$(cat $tmp | grep vagga | awk '{print $2, $3}')
    suttanum=$(echo $file | awk -F'/' '{print $NF}' | awk -F'_' '{print $1}') 
 suttaname=$(cat $tmp | grep -E "(sutta|gāthā|pucchā)\\b " | grep -vE "(Theragāthā|Therīgāthā)" | awk '{$1=""; print $0}')
 
    link=$(echo "$file" | awk -F'/' '{print $NF}' | awk -F'_' '{print "/ru/read/?q="$1}')

    # Вывод извлеченных данных

#    if [[ "$nikaya" != "$prev_nikaya" ]]; then
#        echo "$nikaya Nikāya"
#    fi

	
	#nipata div
    if [[ "$knbook" != "$prev_knbook" ]]; then

if [[ "$prev_knbook" != "" ]] ; then 
echo '</div> <!-- my-3 inside nipata collapse close prev my div -->
</div> <!-- nipata collapse close prev nipata div -->
</div> <!-- nipata collapse close prev nipata div -->'
fi

echo '<div class="level2">
	  <h3><a href=# data-bs-toggle="collapse" data-bs-target="#'${nikayaabr}$knbook'Collapse">'$nikaya' Nikāya '$knbook'</a></h3>
	  </div> 
	  <div class="collapse" id="'${nikayaabr}$knbook'Collapse">
	  <div class="my-3">'

    fi
    
	
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
<span class="level5"><a href="/ru/read/?q='$suttanum'">'$suttanum'</a> '"$suttaname"'</span>
</div>'
	echo "  "
    
	
    # Обновление предыдущих значений vagga, nikaya и knbook
    prev_vagga="$vagga"
    prev_nikaya="$nikaya"
    prev_knbook="$knbook"
done

echo '</div> <!-- Nikaya collapse -->
</div> <!-- Nikaya title + Nikaya collapse inside -->
</div> <!-- Container -->'
# Удаление временного файла
rm $tmp

cat $assetdir/TocFooter.html


exit 0

Ekakanipāta
Dukanipāta
Tikanipāta
Catukkanipāta
Pañcakanipāta
Chakkanipāta
Sattakanipāta
Aṭṭhakanipāta
Navakanipāta
Dasakanipāta
Ekādasako nipāta

