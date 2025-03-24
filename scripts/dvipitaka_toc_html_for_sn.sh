#!/bin/bash

source ./config/script_config.sh --source-only

assetdir=$apachesitepath/assets/templates
suttapath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta
translationpath=$apachesitepath/suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta
cd $suttapath
cat $assetdir/TocHeader.html

index=0
echo "<div class=\"container\">
    <div class=\"my-3\">
      <button class=\"btn btn-primary btn-sm btn-fixed-width toggle-button\" type=\"button\" id=\"collapseAll\">+</button>
    </div>"

grep -ri vaggasaṁyutta sn* | awk '{print $2, $3}' | sed 's/\..*: "/ /g' | sed 's/"sn//g' | while read line; do
  array[$index]="$line"
  index=$(($index+1))
done

echo "<div class=\"my-3\">
      <div class=\"level1\">
        <h2><a href=# data-bs-toggle=\"collapse\"
          data-bs-target=\"#snCollapse\">Saṁyutta Nikāya</a></h2>
      </div>
	  <div class=\"collapse show showkeep\" id=\"snCollapse\">"
	
# sv loop
grep -ri vaggasaṁyutta sn* | awk '{print $2, $3}' | sed 's/\..*: "/ /g' | sort -V | sed 's/"sn//g' | while read -r samyuttavagga; do
  prevlast=$lastsamyuttainsv
  lastsamyuttainsv=$(echo $samyuttavagga | awk '{print $1}')
  samyuttavagganame=$(echo $samyuttavagga | awk '{print $2}')
  samyuttavagganumber=1
  firstsamyuttainsv=$(( $prevlast + 1 ))
  let "index+=1"
  echo '<div class="level2">
  <h2>'"$samyuttavagganame"'</h2>
</div>'
  #$(( $lastsamyuttainsv - $firstsamyuttainsv + 1 ))
  # SN general loop
  grep -r "saṁyuttaṁ " ./sn* | grep -v "(Y" | sort -V | awk '{print $2, $3}' | sed 's/\.[0-9]*-/\./g' | sed 's/"//g' | sed 's/:.*://g' | sed 's/ ,//g' | sed 's/\. / /g' | sed 's/\./ /g' | while read -r samyuttainfo; do
    samyuttanumber=$(echo $samyuttainfo | awk '{print $1}' | sed 's/sn//g')
    totalsuttasinsamyutta=$(echo $samyuttainfo | awk '{print $2}')
    samyuttaname=$(echo $samyuttainfo | awk '{print $3}')

    if (( $samyuttanumber >= $firstsamyuttainsv )) && (( $samyuttanumber <= $lastsamyuttainsv )); then
      echo '<div class="level3">
	  <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn'"${samyuttanumber}"'Collapse">'"${samyuttanumber}. $samyuttaname"'</a></h4>
	  </div>
	  <div class="collapse" id="'"sn${samyuttanumber}"'Collapse">
	  <div class="my-3">'

    #  prev_vagganame=""
      # "vagga" loop
      for file in $(find ./sn/sn$samyuttanumber -type f | sort -V); do
        # sutta loop
        grep ":0.[23]\":" $file | xargs | awk '{print $1, $2, $3, $6}' | sed 's/:0.2://g' | while read -r info; do
         # suttanumber=$(echo $info | awk '{print $1}')
          suttanumber=$(echo $file | awk -F'/' '{print $NF}'| awk -F'_' '{print $1}')
          vagganumber=$(echo $info | awk '{print $2}' | sed 's/\.//g')
          vagganame=$(echo $info | awk '{print $3}')
          suttaname=$(echo $info | awk '{print $4}')

			prev_vagganame=$(cat "$apachesitepath/tmp")

          if [[ "$vagganame" == "$prev_vagganame" ]]; then
            echo > /dev/null
          else
		  echo "<div class=\"level4 my-3\">
		   <h5>${vagganumber}. $vagganame</h5>
                  </div>"      
          fi
          echo "
		  
		  <div class=\"mt-3\">
                    <span class=\"level5\"><a href=\"/r/?q=${suttanumber}\">$suttanumber</a> $suttaname</span>
                  </div>"

          prev_vagganame="$vagganame"
		  echo $prev_vagganame > $apachesitepath/tmp
        done # sutta loop
      done # "vagga" loop
	  echo "</div>
	  </div>"
    fi
  done # general loop
done # sv loop

echo '</div>
</div>
</div>'
cat $assetdir/TocFooter.html
exit 0

$totalsuttasinsamyutta

egrep -r "saṁyuttaṁ |The Linked Discourses " ./sn* | sort -V
./sn/sn1/sn1.81_translation-en-sujato.json:  "sn1.81:5.5": "The Linked Discourses on Deities are complete. "
./sn/sn2/sn2.30_translation-en-sujato.json:  "sn2.30:18.5": "The Linked Discourses on Gods are complete. "
./sn/sn3/sn3.25_translation-en-sujato.json:  "sn3.25:11.5": "The Linked Discourses with the Kosalan are completed. "
./sn/sn4/sn4.25_translation-en-sujato.json:  "sn4.25:26.5": "The Linked Discourses with Māra are complete. "
>>>>>>> 31c47bc3328fd35c017c39e03bf995db21e3b6fc


n=0
svArray=()
grep -ri vaggasaṁyutta sn* | awk '{print $2, $3}' | sed 's/\..*: "/ /g' | sed 's/"sn//g' | while read -r samyuttavagga
do
lastsamyuttainsv=`echo $samyuttavagga | awk '{print $1}'`
samyuttavagganame=`echo $samyuttavagga | awk '{print $2}'`
echo $lastsamyuttainsv $samyuttavagganame
svArray[$n]="${lastsamyuttainsv} ${samyuttavagganame}"
svArray+=(${lastsamyuttainsv} ${samyuttavagganame})
let "n+=1"
done
echo ${svArray[@]}

# Iterate the loop to read and print each array element

