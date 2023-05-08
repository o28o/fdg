#fix bw
#download new archive from here
# https://drive.google.com/drive/folders/17DZmO3PaN_bXPyDuQGRkX4dcYQ0tXhe8



cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/
mv bw bw1
mkdir bw
cd bw 
newestbw=`ls -Art /storage/emulated/0/Download | grep bw_.*.zip | tail -n1`
cp /storage/emulated/0/Download/$newestbw  .
unzip bw_*.zip
rm bw_*.zip

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

echo "all done. anykey for diff. don't forget to rm -rf bw1 after testing new bw"
read x

cd ..
diff -qr bw/ bw1/
