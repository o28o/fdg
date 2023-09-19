import json

# Исходная структура JSON
source_json = {
  "sn1.1:0.1": "Saṁyutta Nikāya 1.1",
  "sn1.1:0.2": "1. Naḷavagga",
  "sn1.1:0.3": "Oghataraṇasutta",
  "sn1.1:1.1": "Evaṁ me sutaṁ—",
  "sn1.1:1.2": "ekaṁ samayaṁ bhagavā sāvatthiyaṁ viharati jetavane anāthapiṇḍikassa ārāme."
}

# Преобразование в желаемую структуру JSON
result_json = {
  "textID": "sn1.1",
  "text": [
    {"lineID": key, "line": value.strip()} for key, value in source_json.items()
  ]
}

# Вывод результата в виде JSON
print(json.dumps(result_json, ensure_ascii=False, indent=2))

