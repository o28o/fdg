echo '{
  "html_text":'
  cat ./html/pli/ms/sutta/sn/sn56/sn56.11_html.json
echo ',
  "root_text":'
  cat ./root/pli/ms/sutta/sn/sn56/sn56.11_root-pli-ms.json
  
echo ',
  "translation_text":'
  cat  ./translation/en/sujato/sutta/sn/sn56/sn56.11_translation-en-sujato.json
echo ',
  "variant_text":' 
  cat ./variant/pli/ms/sutta/sn/sn56/sn56.11_variant-pli-ms.json
echo ',
  "keys_order": ['
   cat ./root/pli/ms/sutta/sn/sn56/sn56.11_root-pli-ms.json | sed 's@[}{]@@g'| awk -F': ' '{print $1","}' | sed '$ s@,$@@'
  
echo '  ]
}'

