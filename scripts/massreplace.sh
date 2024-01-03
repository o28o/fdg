outputfile=/storage/emulated/0/Download/mn9.txt
rm $outputfile

cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/theravada.ru/Teaching/Canon/Suttanta/Texts
#cd /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/html_text/ru/pli/sutta/mn/

#ls mn9-* | sort -V | while read i ; do cat $i >> $outputfile ; done  
ls mn9-* | sort -V | while read i ; do w3m -dump $i >> $outputfile ; done  

#general cleanup
sed -i '/источник: Sam/Id' $outputfile
sed -i '/редакция перевода:/Id' $outputfile
sed -i '/Перевод с английского:/Id' $outputfile
sed -i '/Prepared for SuttaCentral/Id' $outputfile

#4би
sed -i 's/страдание/боль/gI' $outputfile
sed -i 's/страданий/болей/gI' $outputfile
sed -i 's/страдания/боли/gI' $outputfile
sed -i 's/страдании/боли/gI' $outputfile
grep -i "страдан.* " $outputfile

sed -i 's/источник/проявление/gI' $outputfile
sed -i 's/происхождение/проявление/gI' $outputfile

sed -i 's/о прекращении/об устранении/gI' $outputfile
sed -i 's/прекращени/устранени/gI' $outputfile
grep -i "прекращен.* " $outputfile


sed -i 's/путь, ведущий/практика, ведущая/gI' $outputfile
sed -i 's/пути, ведущем/практике, ведущей/gI' $outputfile
sed -i 's/пути, ведущего/практики, ведущей/gI' $outputfile
sed -i 's/путём, ведущим/практикой, ведущей/gI' $outputfile
grep -i "пут.*ведущ.* " $outputfile


#a8m
sed -i 's/правильные воззрения/правильный взгляд/gI' $outputfile
sed -i 's/правильное устремление/правильная привычка/gI' $outputfile
sed -i 's/правильная речь/правильное высказывание/gI' $outputfile
sed -i 's/правильные действия/правильный поступок/gI' $outputfile
sed -i 's/правильные средства к жизни/правильный быт/gI' $outputfile
sed -i 's/правильное усилие/правильное старание/gI' $outputfile
sed -i 's/правильная осознанность/правильное памятование/gI' $outputfile 
sed -i 's/правильное сосредоточение/правильное объединение опыта/gI' $outputfile  

#кп кв зв зп
#jaramarana ca namarupa 
sed -i 's/-и-/-/gI' $outputfile

sed -i 's/существовани/случени/gI' $outputfile
sed -i 's/становлени/случени/gI' $outputfile
grep -i "становлен" $outputfile

sed -i 's/цепляни/поддерживани/gI' $outputfile
grep -i "цеплян" $outputfile

sed -i 's/жажда/цепляние/gI' $outputfile
sed -i 's/жажду/цепляние/gI' $outputfile
sed -i 's/жажды/цепляния/gI' $outputfile
sed -i 's/жаждой/цеплянием/gI' $outputfile
grep -i "жажд" $outputfile

sed -i 's/чувство/ведание/gI' $outputfile
sed -i 's/чувства/ведания/gI' $outputfile
grep -i "чувств" $outputfile

sed -i 's/контакта/касания/gI' $outputfile
sed -i 's/контактом/касанием/gI' $outputfile
sed -i 's/контакт/касание/gI' $outputfile
grep -i "контак" $outputfile


sed -i 's/шесть сфер чувств/шестеричный континуум/gI' $outputfile
sed -i 's/шести сфер чувств/шестеричного континуума/gI' $outputfile
sed -i 's/шестью сферами чувств/шестеричным континуумом/gI' $outputfile
grep -i "контак" $outputfile




sed -i 's/форма/материя/gI' $outputfile
sed -i 's/формой/материей/gI' $outputfile
sed -i 's/формы/материи/gI' $outputfile
grep -i "форм" $outputfile

sed -i 's/сознани/внимани/gI' $outputfile
grep -i "сознан" $outputfile

sed -i 's/волевые формирователи/отождествления/gI' $outputfile
sed -i 's/волевых формирователей/отождествлений/gI' $outputfile
sed -i 's/волевыми формирователями/отождествлениями/gI' $outputfile
sed -i 's/ый волевой формирователь/ое отождествление/gI' $outputfile

sed -i 's/ый формирователь/ое отождествление/gI' $outputfile

sed -i 's/формирователей/отождествлений/gI' $outputfile


grep -i "формироват" $outputfile

sed -i 's/невежество/нераспознавание/gI' $outputfile
sed -i 's/невежеством/нераспознаванием/gI' $outputfile
sed -i 's/невежества/нераспознавания/gI' $outputfile
sed -i 's/невежеству/нераспознаванию/gI' $outputfile
grep -i "невежест" $outputfile


sed -i 's/Неведение/нераспознавание/gI' $outputfile
sed -i 's/Неведением/нераспознаванием/gI' $outputfile
sed -i 's/Неведения/нераспознавания/gI' $outputfile
sed -i 's/Неведению/нераспознаванию/gI' $outputfile
grep -i "невежест" $outputfile

sed -i 's/пятна/брожения/gI' $outputfile
sed -i 's/пятен/брожения/gI' $outputfile
sed -i 's/пятно/брожение/gI' $outputfile
sed -i 's/Пятна умственных загрязнений/брожения/gI' $outputfile
grep -i "пят" $outputfile

#cd /storage/emulated/0/Download