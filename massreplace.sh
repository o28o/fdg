while read -r word1 word2; do  
echo $word1 $word2
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/an/* ./bw/dhp/* ./bw/dn/* ./bw/it/* ./bw/kn/* ./bw/kp/* ./bw/mn/* ./bw/sn/* ./bw/snp/* ./bw/tha/* ./bw/thi/* ./bw/ud/* ./bw/vi/*  
done < table

