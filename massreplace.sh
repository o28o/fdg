while read -r word1 word2; do  
echo $word1 $word2
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/an/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/dhp/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/dn/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/it/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/kn/*
sed -i 's/\b'${word1}'\b/'${word2}'/g'  ./bw/kp/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/mn/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/sn/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/snp/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/tha/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/thi/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/ud/*
sed -i 's/\b'${word1}'\b/'${word2}'/g' ./bw/vi/*
done < table

