#!/bin/bash

# Чтение значений из файла и формирование SQL-запроса
awk '{
    if (NR == 1) {
        printf "SELECT temp_ids.file_name, t.line_text, s.metaphor_count\n";
        printf "FROM (\n";
        printf "    SELECT '\''%s'\'' AS file_name\n", $1;
    } else {
        printf "    UNION ALL SELECT '\''%s'\''\n", $1;
    }
}
END {
    printf ") AS temp_ids\n";
    printf "LEFT JOIN text_names t ON temp_ids.file_name = t.file_name\n";
    printf "LEFT JOIN similes s ON temp_ids.file_name = s.file_name;\n";
}' "$1"
