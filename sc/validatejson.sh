
source ./config/script_config.sh --source-only
cd $apachesitepath/assets/texts/sutta
for i in `find . -type f -name "*.json" `; do  cat $i | json_pp -t null; if [[ $? != 0 ]]; then  echo $i; echo; fi ; done