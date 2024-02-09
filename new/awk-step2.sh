#keyword="$(echo $@ | awk '{$1=""; $2=""; print $0}' | sed 's/^ //')"
keyword="$2"
awk -F "@" -v keyword="$keyword" 'BEGIN { ORS = "" } 
{
urlwithanchor=$1
file_name=$2
sutta=$3
qoute=$4
count=$7

mtphr_count=$NF
name=$9
qoutetoparse=qoute

gsub(/<\/?[^>]+>/, "", qoutetoparse); 
gsub(/[[:punct:]]/, "", qoutetoparse)

    words = ""
    split(qoutetoparse, quoteArray, " ");  # Разбиваем строку на массив
    for (i = 1; i <= length(quoteArray); i++) {
        word = quoteArray[i];    # Текущее слово
        if (match(word, /.*'"$keyword"'.*/)) {  # Проверяем, содержит ли слово ключевое слово
        
            if (!(word in seen)) {  # Проверяем, не содержится ли слово уже в массиве seen
                words = words " " word; 
                seen[word] = 1;  # Помечаем слово как увиденное
            }
        }
    } 
 
 
gsub(/;;;/, "\n", qoute)
        if (prev_file != file_name && NR != 1) {
        print "\n"
    } 

        print "<tr><td><a href=\"" urlwithanchor "\">" file_name "</a></td><td><input type=checkbox data-index=" file_name "></td><td><strong class=\"pli-lang inputscript-ISOPali\">" name "</strong></td><td>" words "</td><td>" count "</td><td>" mtphr_count "</td><td><a href=\"\" onclick=openDpr(\"" sutta "\") >Pi</a>&nbsp;<a class=\"bwLink\"  href=\"\" data-slug=" sutta ">En</a>&nbsp;<a class=\"ruLink\"  href=\"\" data-slug=" sutta ">Ru</a>&nbsp;</td>" qoute
delete seen;    
}
END  { 
        print "</p></td></tr>"
        print "\n"
    }' "$1"


exit 0
if (prev_file != file_name && NR != 1) {
        print "</p></td></tr>"
    }  else  

 print count, metaphor, text_name, prev_file, file_name

mn129@mn129:21.3@4@mn129@13@Bālapaṇḍitasutta     dn1@dn1:1.22.2@1@dn1@2@Brahmajālasutta           dn2@dn2:57.2@1@dn2@30@Sāmaññaphalasutta          sn56.48@sn56.48:1.4@3@sn56.48@1@Dutiyachiggaḷayugasutta
sn56.47@sn56.47:1.1@3@sn56.47@1@Paṭhamachiggaḷayugasutta