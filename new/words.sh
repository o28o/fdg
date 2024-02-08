#keyword="$(echo $@ | awk '{$1=""; print $0}' | sed 's/^ //')"
keyword="$2"
awk -F ":" -v keyword="$keyword" 'BEGIN { ORS = "" }  { OFS = "" } 
{
file_name=$1
word=$2

print file_name, word

    prev_file = $1
    prev_line = NR}
END  { 
        print "\n"
    }' "$1" 


exit 0
