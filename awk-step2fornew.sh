#keyword="$(echo $@ | awk '{$1=""; $2=""; print $0}' | sed 's/^ //')"
keyword="$2"
awk -F "@" -v keyword="$keyword" 'BEGIN { ORS = "" } 
{
urlwithanchor=$1
file_name=$2
sutta=$3
qoute=$4
count=$7

mtphr_count=""
name=$9

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