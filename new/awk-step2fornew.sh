#keyword="$(echo $@ | awk '{$1=""; $2=""; print $0}' | sed 's/^ //')"
keyword="$2"
awk -F "@" 'BEGIN { ORS = "" } 
{
texttype=$4
urlwithanchor=$5
file_name=$1
sutta=$6
qoute=$8
count=$3
words=$10
mtphr_count=""
name=""

gsub(/;;;/, "\n", qoute)
        if (prev_file != file_name && NR != 1) {
        print "\n"
    } 
gsub(/;;;/, "\n", qoute)
while (sub(/;;;/, "\n", qoute)){}
        print "<tr><td><a class=\"fdgLink\" href=\"\" data-slug=\"" urlwithanchor "\">" file_name "</a></td><td><strong class=\"pli-lang inputscript-ISOPali\">" name "</strong></td><td class=\" unique_words \"><span class=\"pli-lang inputscript-ISOPali \">" words "</span></td><td class=\"count\">" count "</td><td class=\"mtphr_count\">" mtphr_count "</td><td><a class=\"dprLink\"  href=\"\" data-slug=" sutta ">Pi</a>&nbsp;<a class=\"bwLink\"  href=\"\" data-slug=" sutta ">En</a>&nbsp;<a class=\"ruLink\"  href=\"\" data-slug=" sutta ">Ru</a>&nbsp;</td><td>" texttype "</td>" qoute
}
END  { 
        print "</p></td></tr>"
        print "\n"
    }' "$1"

exit 0