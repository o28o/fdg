keyword=$2

awk -F "|" -v keyword="$keyword" '{file_name=$1
textclass=$2
qoute=$3 
line_id=$4
name=$5
mtphr_count=$6
   anchorlink = "/sc/?q=" $4 
    gsub(":", "#", anchorlink)
sutta=$4
 gsub(":.*", "", sutta)
 hiddenlink="<a class=\"text-white text-decoration-none\" href=\"" anchorlink "\">&nbsp;</a>"
 if ( textclass == 1 ) {
   language="pi"
   htmlclass="pli-lang"
 } else {
   language="en" 
   htmlclass="eng-lang text-muted font-weight-light"
 }
    if (NR == 1 || (file_name != prev_file && textclass == 1)) {
        print "<tr><td><a href=\"" anchorlink "\">" file_name "</a></td><td><input type=checkbox data-index=" file_name "></td><td><strong class=\"pli-lang inputscript-ISOPali\">" name "</strong></td><td>" mtphr_count "</td><td><a href=\"\" onclick=openDpr(\"" sutta "\") >Pi</a>&nbsp;<a class=\"bwLink\"  href=\"\" data-slug=" sutta ">En</a>&nbsp;<a class=\"ruLink\"  href=\"\" data-slug=" sutta ">Ru</a>&nbsp;</td><td><p><span class=\"" htmlclass "\" lang=\"" language "\">" qoute, hiddenlink "</span>"
    } else if (prev_line == NR && NR != 1) {
        print "</p></td></tr>"
    } else {
        print "<span class=\"" htmlclass "\" lang=\"" language "\">" qoute, hiddenlink "</span><br class=\"styled\">"
    }
    prev_file = $1
    prev_line = NR
}' "$1"


exit 0

<a  href='' onclick=openDpr('$suttanumber') >Pi</a>"` 


    if (NR == 1 && class == 1) {
        print "<tr><td><a href=\"" line_id "\">" file_name "</a></td>
        <td>" file_name " " file_name " " file_name "</td><td><p class=\"" class "\">" qoute " <a href=\"" line_id "\"></a></p>"
    } else if (class == 2 || class == 3) {
        print "<p class=\"" class "\">" qoute " <a href=\"" line_id "\"></a></p>"
    } else if (class == 1) {
        print "</td></tr>"
        print "<tr><td><a href=\"" line_id "\">" file_name "</a></td><td><input type=checkbox data-index=" file_name "></td><td>" file_name " " file_name " " file_name "</td><td><p class=\"" class "\">" qoute " <a href=\"" line_id "\"></a></p>"
    } else if (NR == prev_line && NR != 1) {
        print "</td></tr>"
    }
    prev_file = $1
    prev_line = NR
}' "$1"
