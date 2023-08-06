variant=/drives/c/soft/suttacentral.net/sc-data/sc_bilara_data/variant/pli/ms/
root=/drives/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/
type=sutta
type=vinaya

for i in `cat 2vbpm.files` 
do 
jq -r 'to_entries[] | "\(.key)|\(.value)"' $variant/$type/${i}_* | awk -F'|' '{print $2}'
jq -r 'to_entries[] | "\(.key)|\(.value)"' $root/$type/${i}_* | awk -F'|' '{print $2}'
done 

| awk -F'|' '{print $2}' | tr '[:upper:]' '[:lower:]'  | tr " " "\n" | sed 's/[)(\.:;!?—“…]//g' | sort | uniq 



exit 0
| tr '[:upper:]' '[:lower:]' 
| sed 's/.*/\L&/'
| awk '{print tolower($0)}'

’ti
’nti
