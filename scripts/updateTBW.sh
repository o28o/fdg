#fix bw
#download new archive from here
# https://drive.google.com/drive/folders/17DZmO3PaN_bXPyDuQGRkX4dcYQ0tXhe8

pip install gdown


cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/
mv bw bw1
mkdir bw
cd bw 
gdown --folder https://drive.google.com/drive/folders/17DZmO3PaN_bXPyDuQGRkX4dcYQ0tXhe8
#newestbw=`ls -Art /storage/emulated/0/Download | grep bw_.*.zip | tail -n1`
#cp /storage/emulated/0/Download/$newestbw  .
echo downlad complete
read x
mv "Buddha's Words"/bw_*.zip ./
unzip bw_*.zip
rm -rf bw_*.zip "Buddha's Words"

#fix control panel
grep "top: 15px" css/css.css
sed -i  "s@top: 15px@bottom: 15px@" css/css.css
grep "bottom: 15px" css/css.css

#fix font
grep 'font: normal normal 1.15em/1.3em "URWPalladioITU", serif;' css/css.css
sed -i  's@font: normal normal 1.15em/1.3em "URWPalladioITU", serif;@font: normal normal 1.15em/1.3em Helvetica, serif;@' css/css.css
grep 'font: normal normal 1.15em/1.3em' css/css.css

#remove bw header image
ls -laht ./images/headerlogo.png
cp ../assets/img/headerlogo.png ./images
ls -laht ./images/headerlogo.png
cd ..

echo "all done. anykey for diff. don't forget to rm -rf bw1 after testing new bw"
read x

for i in $(grep -lri "<li>.*Translated" bw/); do 
echo $i; 
textindex=$(echo "$i" | awk -F'/' '{print $NF}' | sed 's/.html//g'); sed -i -e '/<\/body>/i\<script>document.addEventListener("click",e=>{if(e.target.closest("a.dg-link")){e.preventDefault();const s=new URLSearchParams(window.location.search).get("s");window.location.href=e.target.closest("a").href+(s?`&s=${encodeURIComponent(s)}`:"");}})<\/script>' -e '/<li>.*Translated/s/<li>/<li><a class="dg-link" href="\/r\/?q='"$textindex"'">DG<\/a> <a href="https:\/\/suttacentral.net\/'"$textindex"'">SC<\/a> /' "$i"; 
done



diff -qr bw/ bw1/

exit 0


#old

for i in `grep -lri "<li>.*Translated" bw/`
do 
echo $i
textindex=`echo $i | awk -F'/' '{print $NF}'  | sed 's/.html//g'`
sed -i '/<li>.*Translated/s/<li>/<li><a href="\/ru\/read\/?q='$textindex'">DG<\/a> <a href="https:\/\/suttacentral.net\/'$textindex'">SC<\/a> /' $i
done 

