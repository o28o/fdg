    // Функция для определения текущего лунного дня
    function getLunarDay() {
      let currentDate = new Date();
      currentDate.setHours(-6);
      let midnightDate = new Date();
      midnightDate.setHours(0, 0, 0, 0);
      let diffMilliseconds = currentDate - midnightDate;
      let diffDays = Math.floor(diffMilliseconds / (1000 * 60 * 60 * 24));
      let lunarDayCustom = (diffDays + 14) % 30;

      document.getElementById("lunarDay").textContent = lunarDayCustom;

//let dayOfMonth = new Date(10);
    let dayOfMonth = currentDate.getDate();
      document.getElementById("dayOfMonth").textContent = dayOfMonth;

      // Рассчитываем даты для 14, 15 и 8 лунных дней
      let lunar14Date = new Date(currentDate);
      lunar14Date.setDate(dayOfMonth + (15 - lunarDayCustom));
      document.getElementById("lunar14").textContent = lunar14Date.toLocaleDateString();

      let lunar15Date = new Date(currentDate);
      lunar15Date.setDate(dayOfMonth + (16 - lunarDayCustom));
      document.getElementById("lunar15").textContent = lunar15Date.toLocaleDateString();

      let lunar8Date = new Date(currentDate);
      lunar8Date.setDate(dayOfMonth + (9 - lunarDayCustom));
      document.getElementById("lunar8").textContent = lunar8Date.toLocaleDateString();
    }

    getLunarDay();

