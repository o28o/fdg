    var TextInfo = {
        "dn15": {
            "Title Pali": "Mahānidānasutta",
            "Title English": "Маха Нидана Сутта",
            "Title Russian": "Маха Нидана Сутта",
            "Metaphor count": 2
        },
                "dn1": {
            "Title Pali": "ānasutta",
            "Title English": "а Сутта",
            "Title Russian": "на Сутта",
            "Metaphor count": ""
        },
                "sn35.240": {
            "Title Pali": "Mahāasutta",
            "Title English": "Moresutt Сутта",
            "Title Russian": "Еще Сутта",
            "Metaphor count": 5
        }
        // Другие записи справочника
    };
    
    
    
    /*
    SELECT 
    tn.file_name,
    json_object(
        'Title Pali', tn.line_text,
        'Metaphor count', s.metaphor_count
    )
 AS TextInfo
FROM text_names tn
LEFT JOIN similes s ON tn.file_name = s.file_name;
    
    SELECT tn.file_name,
     json_object(
      'Title Pali', tp.line_text,  
 'Title English', te.line_text  ,
   'Metaphor count', s.metaphor_count 
   )
FROM text_names tn
LEFT JOIN sutta_en te ON te.line_id = tn.line_id
LEFT JOIN sutta_pi tp ON tp.line_id = tn.line_id
LEFT JOIN similes s ON s.file_name = tn.file_name
GROUP BY tn.file_name, te.line_text, tp.line_text;
    
    
    
    SELECT file_name, line_text
FROM sutta_en
WHERE line_id IN (SELECT line_id FROM text_names);
    
    */