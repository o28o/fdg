
mkdir ../dpr
cd ../dpr/
git clone https://github.com/digitalpalireader/digitalpalireader ./
pkg install yarn
yarn global add live-server
dos2unix /data/data/com.termux/files/home/.config/yarn/global/node_modules/live-server/live-server.js

echo 'alias dpr="apa; cd ../dpr/ ;  /data/data/com.termux/files/usr/bin/live-server --port=8085 --quiet "' > ~/.profile



#history | cut -c 8-
