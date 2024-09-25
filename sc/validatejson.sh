source ../config/script_config.sh --source-only

state_file=$apachesitepath/assets/texts/lastupdate_state_file
error_found=0  # Флаг для отслеживания ошибок

cd $apachesitepath/assets/texts/sutta

if [ -e "$state_file" ]; then
  allOrNewerOnly="-newer $state_file"
else
  allOrNewerOnly=""
fi

# Проверка файлов в директории sutta
for i in `find . -type f $allOrNewerOnly -name "*.json" `; do
  cat $i | jq 1>/dev/null
  if [[ $? != 0 ]]; then
    echo "</br>error in $i"
    error_found=1  # Устанавливаем флаг ошибки
  fi
done

cd $apachesitepath/assets/texts/vinaya

# Проверка файлов в директории vinaya
for i in `find . -type f $allOrNewerOnly -name "*.json" `; do
  cat $i | jq 1>/dev/null
  if [[ $? != 0 ]]; then
    echo "</br>error in $i"
    error_found=1  # Устанавливаем флаг ошибки
  fi
done

# Если не было ошибок, создаем/обновляем state_file
if [[ $error_found -eq 0 ]]; then
  touch $state_file
fi

exit 0




source ../config/script_config.sh --source-only

state_file=$apachesitepath/assets/texts/lastupdate_state_file

cd $apachesitepath/assets/texts/sutta

if [ -e "$state_file" ]; then
  allOrNewerOnly="-newer $state_file"
else
  allOrNewerOnly=""
fi

for i in `find . -type f $allOrNewerOnly -name "*.json" `; do
cat $i | jq 1>/dev/null
if [[ $? != 0 ]]; then
echo;
echo "</br>
error in $i"; echo; fi ; done

cd $apachesitepath/assets/texts/vinaya

for i in `find . -type f $allOrNewerOnly -name "*.json" `; do
cat $i | jq 1>/dev/null
if [[ $? != 0 ]]; then
echo;
echo "</br>
error in $i"; echo; fi ; done
# json_pp -t null

touch $state_file
#chown apache:apache lastupdate_state_file


