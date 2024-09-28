#keyword="$(echo $@ | awk '{$1=""; print $0}' | sed 's/^ //')"
keyword="$2"
awk -F "@" 'BEGIN { ORS = "" }  { OFS = "" } 
{
texttype=$1
file_name=$2
textclass=$3
gsub(/[ \t]+$/, "", $5)
qoute=$5
line_id=$4

if (match(file_name, /[0-9]-[0-9]/)) {
anchorpart = $4
} else { 
  anchorpart = $4
    gsub(".*:", "", anchorpart)
}
 textAndAnchor = file_name "#" anchorpart
 urlwithanchor = textAndAnchor
sutta=$4
 gsub(":.*", "", sutta)
 
    if ( name == "" ) { 
name=sutta
} 
 hiddenlink="<a class=\"fdgLink text-white text-decoration-none\" href=\"\" data-slug=\"" urlwithanchor "\">&nbsp;</a>"
 
 if ( textclass == 1 ) {
   language="pi"
   htmlclass="pli-lang"
   } else if ( textclass == 2 ) {
   language="ru" 
   htmlclass="eng-lang text-muted font-weight-light"
 } else {
   language="en" 
   htmlclass="eng-lang text-muted font-weight-light"
 }

        if (prev_file != file_name && NR != 1) {
        print "</p></div></td></tr>"
        print "\n"
    } 
if (NR == 1 || (file_name != prev_file && textclass == 1)) {
    
        print texttype "@" urlwithanchor "@" file_name "@" sutta "@<td><div class=sutta><p><span class=\"" htmlclass " quote\" lang=\"" language "\">" qoute, hiddenlink "</span>;;;"
    } else {
        print "<span class=\"" htmlclass " quote\" lang=\"" language "\">" qoute, hiddenlink "</span><br class=\"styled\">;;;"
    }

    prev_file = $2
    prev_line = NR}
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