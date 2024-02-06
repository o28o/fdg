SELECT file_name, 
       SUM((LENGTH(line_text) - LENGTH(REPLACE(lower(line_text), 'kacchap', ''))) / LENGTH('kacchap')) AS count_occurrences
FROM sutta_pi
WHERE lower(line_text) REGEXP '.*kacchap.*'
GROUP BY file_name
HAVING count_occurrences >= 1;