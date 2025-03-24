#keyword="$(echo $@ | awk '{$1=""; $2=""; print $0}' | sed 's/^ //')"
keyword="$3"
awk -F "@" -v keyword="$keyword" 'BEGIN { ORS = "" } NR==FNR { 
    # Обработка первого файла (file1)
    countsAndNames[$0] = 1
    next;  
}
{

file_name=$1
textclass=$2
qoute=$3 
line_id=$4
name=$5
mtphr_count=$6

    qoute = $3
    
    words = ""
    split(qoute, wordsArray, " ")
    for (i = 1; i <= length(wordsArray); i++) {
    
if (match(wordsArray[i], /.*'"$keyword"'.*/)) {
            words = words " " wordsArray[i]
            gsub(/[[:punct:]]/, "", words)
        }
    }


    if (index(file_name, "-") != 0) { 
anchorpart = $4
} else { 
  anchorpart = $4
    gsub(".*:", "", anchorpart)
}
 textAndAnchor = file_name "#" anchorpart
 urlwithanchor = "/read/?s=" keyword "&q=" textAndAnchor 
sutta=$4
 gsub(":.*", "", sutta)
 
    if ( name == "" ) { 
name=sutta
} 
 
 hiddenlink="<a class=\"text-white text-decoration-none\" href=\"" urlwithanchor "\">&nbsp;</a>"
 if ( textclass == 1 ) {
   language="pi"
   htmlclass="pli-lang"
 } else {
   language="en" 
   htmlclass="eng-lang text-muted font-weight-light"
 }

        if (prev_file != file_name && NR != 1) {
        print "</p></td></tr>"
        print "\n"
    } 
if (NR == 1 || (file_name != prev_file && textclass == 1)) {
    
        for (key in countsAndNames) {
        split(key, array, "@")
        filenamefromArray = array[1]
        
            if (file_name == filenamefromArray) {
            count = array[3]
        metaphor = array[5]
        name = array[6]
           }
    }
        print "<tr><td><a href=\"" urlwithanchor "\">" file_name "</a></td><td><input type=checkbox data-index=" file_name "></td><td><strong class=\"pli-lang inputscript-ISOPali\">" name "</strong></td><td>" words "</td><td>" count "</td><td>" metaphor "</td><td><a href=\"\" onclick=openDpr(\"" sutta "\") >Pi</a>&nbsp;<a class=\"bwLink\"  href=\"\" data-slug=" sutta ">En</a>&nbsp;<a class=\"ruLink\"  href=\"\" data-slug=" sutta ">Ru</a>&nbsp;</td><td><p><span class=\"" htmlclass "\" lang=\"" language "\">" qoute, hiddenlink "</span>"
    } else {
        print "<span class=\"" htmlclass "\" lang=\"" language "\">" qoute, hiddenlink "</span><br class=\"styled\">"
    }

    prev_file = $1
    prev_line = NR}
END  { 
        print "</p></td></tr>"
        print "\n"
    }' "$1" "$2"


exit 0
if (prev_file != file_name && NR != 1) {
        print "</p></td></tr>"
    }  else  

 print count, metaphor, text_name, prev_file, file_name

mn129@mn129:21.3@4@mn129@13@Bālapaṇḍitasutta     dn1@dn1:1.22.2@1@dn1@2@Brahmajālasutta           dn2@dn2:57.2@1@dn2@30@Sāmaññaphalasutta          sn56.48@sn56.48:1.4@3@sn56.48@1@Dutiyachiggaḷayugasutta
sn56.47@sn56.47:1.1@3@sn56.47@1@Paṭhamachiggaḷayugasutta