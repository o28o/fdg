#keyword="$(echo $@ | awk '{$1=""; $2=""; print $0}' | sed 's/^ //')"
keyword="$2"
awk -F "@" 'BEGIN { ORS = "" ; print "{ \"draw\": 1, \"recordsTotal\": 57, \"recordsFiltered\": 57, \"data\": ["
        print "\n" } 
{
texttype=$4
urlwithanchor=$5
file_name=$1
sutta=$6
qoute=$8
qoute="test ipsum"
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
        print "[ \"" urlwithanchor, file_name "\", \"" name "\", \"" words  "\", \""  count  "\", \"" mtphr_count  "\", \"" sutta "\", \""  texttype  "\", \""  qoute  "\" ]," 
 
}
END  { 
        print "}"
        print "\n"
    }' "$1"

exit 0

bash new/jsonawk.sh result/finalraw | sed 's@],}@]]}@g' | jq