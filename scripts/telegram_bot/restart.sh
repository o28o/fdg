#!/bin/bash

restart() {
  local dir=$1
  local name=$2
  local main=$name.py
  local tmp=/tmp/nohup_$name.out

  echo "Restarting $main in $dir"
  cd "$dir" || exit 1

  tail "$tmp"
  rm "$tmp"

  echo "before kill"
  ps -ef | grep "$main" | grep -v grep

  pkill -f "$main"

  nohup ./telegram/bin/python "$main" > "$tmp" 2>&1 &
  echo "after nohup"
  ps -ef | grep "$main" | grep -v grep
  echo
}

restart /var/www/telegram_bot dgift
restart /var/www/telegram_bot bot