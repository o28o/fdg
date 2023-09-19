#!/bin/bash


user=elastic
password='Dq3=BLp=JI*wfbipMCMs' #localhost
#password='vtDx+Hnh4cSpvuCfRgnL' #centos

#set bigger limit in index
#curl --insecure -u $user:$password -X PUT "https://localhost:9200/text/_settings" -H 'Content-Type: application/json' -d "{\"index.mapping.total_fields.limit\": 4000}"



json_folder="/mnt/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta"

# Итерируемся по файлам .json в указанных папках
for json_file in $(find "$json_folder" -name '*.json'); do
  # Извлекаем имя файла без расширения и пути
  filename=$(basename -- "$json_file")
  filename_no_ext="${filename%.json}"

  # Удаляем часть "_root-pli-ms" из имени файла
  filename_no_ext_cleaned=$(echo "$filename_no_ext" | sed 's/_root-pli-ms//')

  # Формируем URL на основе имени файла без "_root-pli-ms"
  url="https://localhost:9200/sutta/_doc/$filename_no_ext_cleaned"
echo $filename_no_ext_cleaned

  # Отправляем содержимое файла с помощью curl
  curl --insecure -u $user:$password -X POST "$url" -H 'Content-Type: application/json' --data-binary "@$json_file"
  sleep 1
  echo
done



exit 0



curl --insecure -u $user:$password -X POST "https://localhost:9200/pali/_doc/sn1.1" -H 'Content-Type: application/json' -d'
{
  "textType": "dhamma",
  "nikayaID": "sn",
  "nikaya": "samyutta nikaya",
  "samyuttaNumber": 35,
  "samyuttaName": "salayatanasamyutta",
  "vaggaNumber": 19,
  "vaggaName": "Āsīvisavagga",
  "language": "pali",
  "edition": "ms",
  "textID": "sn35.245",
  "textName": "Kiṁsukopamasutta",
  "inVaggaSuttanumber": "sattamam",
  "text": [
  "sn35.245:0.1": "Saṁyutta Nikāya 35.245 ",
  "sn35.245:0.2": "19. Āsīvisavagga ",
  "sn35.245:0.3": "Kiṁsukopamasutta ",
  "sn35.245:1.1": "Atha kho aññataro bhikkhu yenaññataro bhikkhu tenupasaṅkami; upasaṅkamitvā taṁ bhikkhuṁ etadavoca: ",
  "sn35.245:1.2": "“kittāvatā nu kho, āvuso, bhikkhuno dassanaṁ suvisuddhaṁ hotī”ti? "
]
}
'

curl --insecure -u $user:$password -X POST "https://localhost:9200/pali/_doc/sn1.1" -H 'Content-Type: application/json' -d'
{
  "textID" : "sn1.1",
  "text" : [ 
    {
      "lineID" : "sn35.245:0.1",
      "line" :  "Āsīvisavagga"
    },
    {
      "lineID" : "sn35.245:0.2",
      "line" :  "Atha kho aññataro bhikkhu yenaññataro bhikkhu tenupasaṅkami; upasaṅkamitvā taṁ bhikkhuṁ etadavoca:"
    }
  ]
}
'


curl --insecure -u $user:$password -X POST "https://localhost:9200/pali/_doc/sn1.1" -H 'Content-Type: application/json' -d'
{
  "group" : "fans",
  "user" : [ 
    {
      "first" : "John",
      "last" :  "Smith"
    },
    {
      "first" : "Alice",
      "last" :  "White"
    }
  ]
}
'



curl --insecure -u $user:$password -X GET "https://localhost:9200/pali/_doc/sn1.1?pretty"



curl --insecure -u $user:$password  -X PUT -H "Content-Type: application/json"  \
http://{elasticsearch_ip}:9200/{index_name}/_settings




curl --insecure -u $user:$password  -X POST "https://localhost:9200/pali/_doc/1?pretty" -H 'Content-Type: application/json' -d'
{
  "firstname": "Jennifer",
  "lastname": "Walters"
}
'



#manuals
#install elastic search and kibana with docker
https://www.elastic.co/guide/en/elasticsearch/reference/current/run-elasticsearch-locally.html#_add_data

#install elastic enterprise search 
https://www.elastic.co/guide/en/enterprise-search/current/docker.html

#nested filed type 
https://www.elastic.co/guide/en/elasticsearch/reference/current/nested.html




docker run --name enterprise-search --net elastic --publish 3002:3002 --env "secret_management.encryption_keys= [10c366389cbabe3962f36b7d26c66f87c05da6ee6c6dd0bc1278293e89ac2641]" -t docker.elastic.co/enterprise-search/enterprise-search:8.10.1

