
    // Функция для транслитерации пали в русские символы
    function transliteratePali(title) {
        const translitMap = {
            "a": "а", "ā": "а", "i": "и", "ī": "и", "u": "у", "ū": "у",
            "e": "э", "o": "о", "k": "к", "kh": "кх", "g": "г", "gh": "гх",
            "c": "ч", "ch": "чх", "j": "дж", "jh": "джх", "ṭ": "т", "ṭh": "тх",
            "ḍ": "д", "ḍh": "дх", "ṇ": "н", "t": "т", "th": "тх", "d": "д",
            "dh": "дх", "n": "н", "ññ": "ннь", "ñ": "нь", "p": "п", "ph": "пх", 
            "b": "б", "bh": "бх", "m": "м", "y": "й", "r": "р", "l": "л", 
            "v": "в", "s": "с", "ṣ": "ш", "h": "х"
        };

        // Добавляем поддержку заглавных букв
        const upperTranslitMap = Object.fromEntries(
            Object.entries(translitMap).map(([key, value]) => [key.toUpperCase(), value.toUpperCase()])
        );

        // Объединяем карты транслитерации
        const fullTranslitMap = { ...translitMap, ...upperTranslitMap };

        // Заменяем пали на русский
        let result = title.replace(/[a-zA-Zāīūñ]/g, (match) => fullTranslitMap[match] || match);
        
        return result.charAt(0).toUpperCase() + result.slice(1); // Делаем первую букву заглавной
    }

    // Функция для обработки названий глав
    function processTitles(titles) {
        return titles.map(title => {
            // Удаляем номер и пробел
            let cleanedTitle = title.replace(/^\d+\.\s*/, '').trim();
            
            // Удаляем суффиксы "vagga" и "vaggo"
            cleanedTitle = cleanedTitle.replace(/(vagga|vaggo)$/i, '').trim();

            // Транслитерируем название
            let transliteratedTitle = transliteratePali(cleanedTitle);
            
            // Возвращаем окончательное название
            return `Глава ${transliteratedTitle}`;
        });
    }

    // Пример названий глав
    const titles = [
        "7. Devatāvagga",
        "10. Loṇakapallavagga",
        "3. Suttavagga",
        "5. Anussativaggo"
    ];

    // Обработка названий глав
    const processedTitles = processTitles(titles);
    
    console.log(processedTitles); // Вывод обработанных названий
