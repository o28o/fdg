

text=${@}_
file=$(find ./pli/ -name "${text}*" )
dest=${text}dev.txt
~/aksharamukha/bin/python scripts/paliDev.py $file | jq -r '.[]' > $dest
echo "done $dest"