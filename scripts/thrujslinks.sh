dir=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/theravada.ru/Teaching/Canon/Suttanta/Texts    

ls $dir | sort -V | awk -F'-' '{print $1}' | sed 's@_@.@g' | sed 's@\..*htm@@' | sed 's@dhm@dhp@' > keys

ls $dir | sort -V > values

paste -d ' ' keys values | awk '{print "[\""$1"\", \""$2"\"],"}' > thrulinks.js



# thsu online li thrulinks


for dnnumber in {1..33}; do echo dn$dnnumber `grep -m1 "ДН $dnnumber " $thsucurldn | sed 's#href=\"/toc/translations/#href=\"/node/table/#' |awk -F'"' '{print $2}'`; done





#bw links 

cat bwout  | sort -V | awk -F'/' '{print $NF}' | sed 's@.html@@g' | sed 's@tha@thag@'| sed 's@thi@thig@'  | sed 's@bi-vb@pli-tv-bi-vb@'| sed 's@bu-vb@pli-tv-bu-vb@' 