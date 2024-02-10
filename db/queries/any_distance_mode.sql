SELECT DISTINCT(File_name)
FROM sutta_pi
WHERE File_name IN (
    SELECT File_name
    FROM sutta_pi
    WHERE Line_text regexp ('.*\btaṇh.*')
) AND File_name IN (
    SELECT File_name
    FROM sutta_pi
    WHERE Line_text regexp ('.*\barati.*')
) AND File_name IN (
    SELECT File_name
    FROM sutta_pi
    WHERE Line_text regexp ('.*\brāg.*')
);