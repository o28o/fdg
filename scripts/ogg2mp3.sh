#!/data/data/com.termux/files/usr/bin/bash

for ogg in *.ogg; do
    ffmpeg -i "$ogg" -acodec libmp3lame -q:a 4 -joint_stereo 1 "${ogg%.ogg}.mp3"
done

echo "Готово!"
