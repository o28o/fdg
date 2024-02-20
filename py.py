import os
import re

def find_in_files(directory, keywords):
    patterns = [re.compile(keyword) for keyword in keywords]
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(".json"):  # Или другое расширение файла, если необходимо
                file_path = os.path.join(root, file)
                found_keywords = set()
                with open(file_path, "r", encoding="utf-8") as f:
                    for line in f:
                        for keyword_pattern in patterns:
                            if re.search(keyword_pattern, line):
                                found_keywords.add(keyword_pattern.pattern)
                                break
                    if len(found_keywords) == len(keywords):
                        print(f"Файл: {file_path}")
                        break

directory_path = "/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms"
keywords = ["adhivacanasam", "paṭighasamphass"]
find_in_files(directory_path, keywords)