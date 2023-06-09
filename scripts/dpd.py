import sys
sys.path.append('/var/www/mdict-query')
from mdict_query import IndexBuilder

if len(sys.argv) < 2:
    print("Please provide a word as an argument.")
    sys.exit(1)

word = sys.argv[1]

grammar_builder = IndexBuilder("/var/www/mdict-query/mdx/dpd-grammar-mdict.mdx")
decon_builder = IndexBuilder("/var/www/mdict-query/mdx/dpd-deconstructor-mdict.mdx")
dpd_builder = IndexBuilder("/var/www/mdict-query/mdx/dpd-mdict.mdx")

result_text = ""

result_text += "\n".join(grammar_builder.mdx_lookup(word, ignorecase=True))
result_text += "\n\n"

result_text += "\n".join(decon_builder.mdx_lookup(word, ignorecase=True))
result_text += "\n\n"

result_text += "\n".join(dpd_builder.mdx_lookup(word, ignorecase=True))
result_text += "\n"

print(result_text)

