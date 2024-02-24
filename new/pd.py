import pandas as pd

# Загрузка данных из файла с разделителем "@" и указанием символа кавычек
df = pd.read_csv('/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/result/readyforawk', sep='@', quotechar='"', header=None, names=["type", "text_index", "text_type", "line_id", "text"])

# Сортировка DataFrame по нескольким столбцам
df_sorted = df.sort_values(by=["type", "text_index", "line_id", "text_type"])

# Поменять местами столбцы "type" и "text_index" в DataFrame
df_sorted = df_sorted[['text_index', 'type', 'line_id', 'text_type', 'text']]

# Объединение столбцов "text_type" и "text" с разделителем "@" и замена исходных столбцов

df_sorted['text'] = df_sorted['line_id'].astype(str) + '@' + df_sorted['text_type'].astype(str) + '@' + df_sorted['text'].astype(str)

pd.set_option('display.max_columns', None)
print(df_sorted)

# Группировка данных по столбцу "line_id" и сбор строк текста в массив
grouped_df = df_sorted.groupby(['text_index', 'type'])['text'].agg(lambda x: x.tolist())

# Сброс индекса, чтобы получить DataFrame вместо Series
grouped_df = grouped_df.reset_index()

grouped_df = grouped_df.sort_values(by=["type", "text_index"])
print(grouped_df)



# Записать DataFrame в файл CSV
df_sorted.to_csv('/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/sorted.csv', index=False)
grouped_df.to_csv('/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/grouped.csv', index=False)