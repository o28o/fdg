source ./config/script_config.sh --source-only

#downloaddir=/media/c/Users/o28o/Downloads
#trndir=/media/c/soft/fdg/assets/texts/sutta/

cd $downloaddir
for file in `find .  -maxdepth 1 -type f -name "*root-pli-ms.json"`
do
newname=$(echo $file | sed 's@root-pli-ms@translation-ru-o@g')
echo renamed $file $newname
mv $file $newname
done

cd - 2>&1 >/dev/null

for file in `find "$downloaddir" -maxdepth 1 -type f -name "*translation*.json"`
do 
suttaname=$(echo $file | sed -E 's/_translation.*//' | awk -F'/' '{print $NF}')

if [[ $suttaname =~ snp|iti|thig|thag|ud ]]; then
    nikaya=kn/$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
booknumber=vagga$(echo $suttaname | sed -E 's/\..*//' | sed 's/[a-z]*//g')
else
booknumber=$(echo $suttaname | sed -E 's/\..*//')
    nikaya=$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
fi

mv $file $trndir/$nikaya/$booknumber/
echo "moved $suttaname to ./$nikaya/$booknumber" 
done

if [[ "`uname -a`" != *"Android"* ]]; then 
exit 0
fi

audioSrcdir=/storage/emulated/0/Music/VoiceChangerWithEffects
audioSrcdir2='/storage/emulated/0/Recordings/Voice Recorder'
audioDestdir=/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/audio

find "$audioSrcdir" "$audioSrcdir2" -maxdepth 1 -type f -name "*_*" | while IFS= read -r file 
do
suttaname=$(echo "$file" | sed -E 's/_.*//' | awk -F'/' '{print $NF}')

if [[ $suttaname =~ snp|iti|thig|thag|ud ]]; then
    nikaya=kn/$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
booknumber=vagga$(echo $suttaname | sed -E 's/\..*//' | sed 's/[a-z]*//g')
elif [[ $suttaname =~ mn|dn ]]; then
    nikaya=$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
booknumber=
else
booknumber=$(echo $suttaname | sed -E 's/\..*//')
    nikaya=$(echo "$suttaname" | sed -E 's/[0-9]+.*//')
fi

if [[ "$file" =~ "Recorder" ]]; then
newfn=$(echo "$file" | sed 's/_.*/_pi_puriso_jiv.m4a/g')
else
newfn=$(echo "$file" | sed 's/_.*/_pi_puriso_mod.mp3/g')
fi 
mv "$file" "$newfn" >/dev/null 2>&1
mv "$newfn" $audioDestdir/$nikaya/$booknumber/
echo "moved $suttaname to audio/$nikaya/$booknumber" 
done

exit 0