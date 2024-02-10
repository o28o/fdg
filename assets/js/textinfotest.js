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
    
    
    */