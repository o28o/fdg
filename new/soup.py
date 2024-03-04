#to run script in bash use line below. you versoon of python, imdtsll BeautifulSoup4, your nale of the script
#find bw/sn/ -type f | xargs -I {} python3.11 new/soup.py {}
import sys
from bs4 import BeautifulSoup
import os
import json

# path to file from args
file_path = sys.argv[1]
filename = os.path.splitext(os.path.basename(file_path))[0]

# set of texts only name sn mn dn 
sn_variable = ''.join(filter(str.isalpha, filename))

# mkdir if not exsist function
def create_directory_if_not_exists(directory):
    if not os.path.exists(directory):
        os.makedirs(directory)

# making dirs
create_directory_if_not_exists(f"roottbw/{sn_variable}")
create_directory_if_not_exists(f"translation/{sn_variable}")

# reading HTML-file
with open(file_path, 'r', encoding='utf-8') as file:
    html_content = file.read()

# parsing HTML-content
soup = BeautifulSoup(html_content, 'html.parser')

# lang list
languages = ['pi', 'en']
#languages = ['en']

# iterate langs
for lang in languages:
    # dict 
    parno_content = {}

    # iterate throught <span class="parno"> inside <div lang="{lang}">
    for parno_tag in soup.select(f'div[lang="{lang}"] span.parno'):
        # get parno <span class="parno">
        parno_number = parno_tag.get_text(strip=False)
        # get text from parent element of the <span class="parno">,
        # exclude tag itself
        parno_text = parno_tag.parent.get_text(strip=True).replace(parno_tag.get_text(strip=True), '')
        # transform keys to format
        key = f"{filename}:{parno_number}"
        # add data to dict
        parno_content[key] = parno_text.strip()

    # dict to JSON 
    json_output = json.dumps(parno_content, indent=4, ensure_ascii=False)

    # get path for langs accordingly
    if lang == 'pi':
        output_path = f"roottbw/{sn_variable}/{filename}_rootbw-pli-ms.json"
    elif lang == 'en':
        output_path = f"translation/{sn_variable}/{filename}_translation-en-bodhi.json"
        #output_filename = f"{filename}_translation-en-brahmali.json"
        #output_filename = f"{filename}_translation-en-sujato.json"
    else:
        # if no 'pi' or 'en' save to _output.json
        output_path = f"{filename}_output.json"

    # write JSON-data to file
    with open(output_path, 'w', encoding='utf-8') as output_file:
        output_file.write(json_output)

    print(f"JSON for {lang} saved in: {output_path}")