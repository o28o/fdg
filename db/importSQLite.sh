cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta
find . -type f | sort -V | while read filename 
do

sub_division=`echo $filename | awk -F'/' '{print $NF}' | awk -F'.' '{print $1}' `
text_type=sutta
file_name=$filename


line_id 
line_text
text_num


cat ./sn/sn56/sn56.131_root-pli-ms.json | jq
"sn56.131:0.1": "Saṁyutta Nikāya 56.131 ",                        "sn56.131:0.2": "11. Pañcagatipeyyālavagga ",                     "sn56.131:0.3": "Pettidevapettivisayasutta ",                     "sn56.131:1.1": "… “Evameva kho, bhikkhave, appakā te




DROP TABLE IF EXISTS pi_text;


CREATE TABLE pi_text (
line_id TEXT(20) PRIMARY KEY NOT NULL UNIQUE,
 TEXT(15) NOT NULL,
 TEXT NOT NULL,
 TEXT NOT NULL,
 TEXT NOT NULL DEFAULT 'sutta',
 TEXT NOT NULL,
FOREIGN KEY(sub_division) REFERENCES samyutta_info(samyutta_num));

