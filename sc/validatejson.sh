source ../config/script_config.sh --source-only
cd $apachesitepath/assets/texts/sutta

for i in `find . -type f -name "*.json" `; do
cat $i | jq 1>/dev/null
if [[ $? != 0 ]]; then
echo;
echo "</br>
error in $i"; echo; fi ; done

cd $apachesitepath/assets/texts/vinaya

for i in `find . -type f -name "*.json" `; do
cat $i | jq 1>/dev/null
if [[ $? != 0 ]]; then
echo;
echo "</br>
error in $i"; echo; fi ; done
# json_pp -t null

