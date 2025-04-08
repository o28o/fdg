
function restart() {
cd $dir
tail $tmp
rm  $tmp
echo before kill 
ps -ef | grep $main | grep -v grep 
pkill -f $main
nohup ./telegram/bin/python $main > $tmp 2>&1 &
echo after nohup
ps -ef | grep $main | grep -v grep 
#tail -f $tmp
}

dir=/var/www/telegram_bot
name=dgift
main=$name.py
tmp=/tmp/nohup_$name.out
restart()

echo 
echo 
echo 

dir=/var/www/telegram_bot
name=bot
main=$name.py
tmp=/tmp/nohup_$name.out
restart()