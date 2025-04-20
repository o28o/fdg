#!/data/data/com.termux/files/usr/bin/bash
for ogg in *.ogg; do
    echo "Конвертирую: $ogg → ${ogg%.ogg}.mp3"
    ffmpeg -i "$ogg" -acodec libmp3lame -q:a 2 "${ogg%.ogg}.mp3"
done
echo "Готово!"
