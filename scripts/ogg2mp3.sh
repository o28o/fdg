#!/data/data/com.termux/files/usr/bin/bash

for ogg in *.ogg; do
    mp3="${ogg%.ogg}.mp3"
    ffmpeg -i "$ogg" -acodec libmp3lame -q:a 7 -ac 1 -ar 16000 "$mp3"
    echo "Конвертирован: $ogg → $mp3 ($(du -h "$mp3" | cut -f1))"
done

echo "Готово!"
