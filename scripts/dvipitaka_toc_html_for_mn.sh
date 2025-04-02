#!/bin/bash

source ./config/script_config.sh --source-only


#apachesitepath=/drives/c/soft/fdg/
assetdir=$apachesitepath/assets/templates

#suttapath=/drives/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/an/an1
suttapath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/mn

translationpath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta

cat $assetdir/TocHeader.html
nikayaabr=mn
nikaya="Majjhima Nikāya"
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
	
    #anbook=$(cat /tmp/tmp | grep Nikāya | awk '{print $NF}' | awk -F'.' '{print $1}')
   # vagga=$(cat /tmp/tmp | grep vagga | awk '{print $2, $3}')
 
    suttanum=$(echo $file | awk -F'/' '{print $NF}' | awk -F'_' '{print $1}')
        suttanumwoletters=`echo $suttanum | sed 's/[^0-9]//g'`
 suttaname=$(cat /tmp/tmp | grep -E "sutta\\b " | awk '{print $2}')
    link=$(echo "$file" | awk -F'/' '{print $NF}' | awk -F'_' '{print "/r/?q="$1}')

if [[ $suttanumwoletters -ge 1 && $suttanumwoletters -le 10 ]]; then
    vagga="Mūlapariyāyavagga"
elif [[ $suttanumwoletters -ge 11 && $suttanumwoletters -le 20 ]]; then
    vagga="Sīhanādavagga"
elif [[ $suttanumwoletters -ge 21 && $suttanumwoletters -le 30 ]]; then
    vagga="Opammavagga"
elif [[ $suttanumwoletters -ge 31 && $suttanumwoletters -le 40 ]]; then
    vagga="Mahāyamakavagga"
elif [[ $suttanumwoletters -ge 41 && $suttanumwoletters -le 50 ]]; then
    vagga="Cūḷayamakavagga"
elif [[ $suttanumwoletters -ge 51 && $suttanumwoletters -le 60 ]]; then
    vagga="Gahapativagga"
elif [[ $suttanumwoletters -ge 61 && $suttanumwoletters -le 70 ]]; then
    vagga="Bhikkhuvagga"
elif [[ $suttanumwoletters -ge 71 && $suttanumwoletters -le 80 ]]; then
    vagga="Paribbājakavagga"
elif [[ $suttanumwoletters -ge 81 && $suttanumwoletters -le 90 ]]; then
    vagga="Rājavagga"
elif [[ $suttanumwoletters -ge 91 && $suttanumwoletters -le 100 ]]; then
    vagga="Brāhmaṇavagga"
elif [[ $suttanumwoletters -ge 101 && $suttanumwoletters -le 110 ]]; then
    vagga="Devadahavagga"
elif [[ $suttanumwoletters -ge 111 && $suttanumwoletters -le 120 ]]; then
    vagga="Anupadavagga"
elif [[ $suttanumwoletters -ge 121 && $suttanumwoletters -le 130 ]]; then
    vagga="Suññatavagga"
elif [[ $suttanumwoletters -ge 131 && $suttanumwoletters -le 142 ]]; then
    vagga="Vibhaṅgavagga"
elif [[ $suttanumwoletters -ge 143 && $suttanumwoletters -le 152 ]]; then
    vagga="Saḷāyatanavagga"
fi

    # Вывод извлеченных данных

#    if [[ "$nikaya" != "$prev_nikaya" ]]; then
#        echo "$nikaya Nikāya"
#    fi

#mn100_root-pli-ms.json:  "mn100:45.5": "Majjhimapaṇṇāsakaṁ samattaṁ. "
#mn152_root-pli-ms.json:  "mn152:20.5": "Uparipaṇṇāsakaṁ samattaṁ. ",
#mn50_root-pli-ms.json:  "mn50:33.5": "Mūlapaṇṇāsakaṁ samattaṁ. "
	
	
	if [[ "$suttanumwoletters" -le 50 ]]
then
mnbook=Mūlapaṇṇāsaka
mnbookind=1
elif [[ "$suttanumwoletters" -ge 51 ]] && [[  "$suttanumwoletters" -le 100 ]]
then
mnbook=Majjhimapaṇṇāsaka
mnbookind=2
elif [[ "$suttanumwoletters" -ge 101 ]] 
then
mnbook=Uparipaṇṇāsaka
mnbookind=3
fi


	
	#nipata div
    if [[ "$mnbook" != "$prev_mnbook" ]]; then

if [[ "$prev_mnbook" != "" ]] ; then 
echo '</div> <!-- my-3 inside nipata collapse close prev my div -->
</div> <!-- nipata collapse close prev nipata div -->
</div> <!-- nipata collapse close prev nipata div -->'
fi

echo '<div class="level2">
	  <h3><a href=# data-bs-toggle="collapse" data-bs-target="#'${nikayaabr}$mnbookind'Collapse">'$mnbook'</a></h3>
	  </div> 
	  <div class="collapse" id="'${nikayaabr}$mnbookind'Collapse">
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
<span class="level5"><a href="/r/?q='$suttanum'">'$suttanum'</a> '"$suttaname"'</span>
</div>'
	echo "  "
    
	
    # Обновление предыдущих значений vagga, nikaya и anbook
    prev_vagga="$vagga"
    prev_nikaya="$nikaya"
    prev_mnbook="$mnbook"
done

echo '</div> <!-- Nikaya collapse -->
</div> <!-- Nikaya title + Nikaya collapse inside -->
</div> <!-- Container -->'
# Удаление временного файла
rm /tmp/tmp

cat $assetdir/TocFooter.html



exit 0



grep -ri vaggo * | grep niṭṭhito | sort -V | awk -F'"' '{
    sub(/:.*/, "", $2);
    suttanum = substr($2, 3);
    print suttanum-9, suttanum, $4;
}' | sed 's/vaggo.*/vagga/g'



