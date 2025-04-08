#!/bin/bash

restart() {
  local dir=$1
  local name=$2
  local config=$3
  local tmp=/tmp/nohup_$name.out

  echo
  echo "Restarting $name"
  echo 
  cd "$dir" || exit 1

tail "$tmp" 2>/dev/null
rm "$tmp" 2>/dev/null

  echo "before kill"
  ps -ef | grep telegram | grep $name | grep -v grep

  pkill -f "$name"
  nohup ./telegram/bin/python main.py "$config" > "$tmp" 2>&1 &
  echo "after nohup"
  ps -ef | grep "$name" | grep -v grep
  echo
  echo
}

restart /var/www/telegram_bot dgift_bot config.dgift_bot.json
restart /var/www/telegram_bot dhammagift_bot config.dhammagift_bot.json
