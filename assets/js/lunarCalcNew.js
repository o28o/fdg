// Улучшенная функция для определения лунных дней по системе сутт
function getLunarDays() {
  const now = new Date();
  const currentHour = now.getHours();
  
  // Базовые параметры (можно уточнить)
  const timeZoneOffset = 6; // Часовой пояс (для Казахстана +6)
  const newMoonDate = new Date('2023-01-21T20:53Z'); // Дата известного новолуния
  
  // Лунные константы
  const LUNAR_CYCLE = 29.530588; // Средняя длина лунного месяца
  const HALF_CYCLE = 14.765294; // Половина цикла (~15 дней)
  
  // Рассчитываем текущий лунный возраст
  const daysSinceNewMoon = (now - newMoonDate) / (1000 * 60 * 60 * 24);
  let lunarAge = daysSinceNewMoon % LUNAR_CYCLE;
  
  // Определяем текущий полумесяц (растущий или убывающий)
  const isWaxing = lunarAge < HALF_CYCLE;
  
  // Текущий лунный день (1-15)
  let currentLunarDay = Math.floor(isWaxing ? lunarAge : lunarAge - HALF_CYCLE) + 1;
  
  // Корректировка на начало суток с 18:00
  if (currentHour >= 18) {
    currentLunarDay = (currentLunarDay % 15) + 1;
  }
  
  // Устанавливаем текущий лунный день
  document.getElementById("lunarDay").textContent = currentLunarDay;
  
  // Функция для расчета дат с учетом 18:00 как начала суток
  function getLunarDayDate(targetDay) {
    // Разница дней до целевого дня
    let daysDiff = (targetDay - currentLunarDay) % 15;
    if (daysDiff < 0) daysDiff += 15;
    
    // Создаем целевую дату
    const targetDate = new Date(now);
    targetDate.setDate(now.getDate() + daysDiff);
    targetDate.setHours(18, 0, 0, 0); // Устанавливаем на 18:00
    
    return targetDate;
  }
  
  // Рассчитываем ближайшие важные дни
  function formatPeriod(startDate, endDate) {
    const options = { day: 'numeric', month: 'long' };
    return `${startDate.toLocaleDateString()} (ночь) - ${endDate.toLocaleDateString()} (день)`;
  }
  
  // 8-й лунный день (ночь+день)
  const eighthDayStart = getLunarDayDate(8);
  const eighthDayEnd = new Date(eighthDayStart);
  eighthDayEnd.setDate(eighthDayStart.getDate() + 1);
  document.getElementById("lunar8").textContent = formatPeriod(eighthDayStart, eighthDayEnd);
  
  // 14-й лунный день (ночь перед полнолунием/новолунием)
  const fourteenthDay = getLunarDayDate(14);
  const fourteenthDayEnd = new Date(fourteenthDay);
  fourteenthDayEnd.setDate(fourteenthDay.getDate() + 1);
  document.getElementById("lunar14").textContent = formatPeriod(fourteenthDay, fourteenthDayEnd);
  
  // 15-й лунный день (день полнолуния/новолуния)
  const fifteenthDay = getLunarDayDate(15);
  const fifteenthDayEnd = new Date(fifteenthDay);
  fifteenthDayEnd.setDate(fifteenthDay.getDate() + 1);
  document.getElementById("lunar15").textContent = formatPeriod(fifteenthDay, fifteenthDayEnd);
  
  // Определяем фазу луны
  const moonPhases = document.documentElement.lang === "ru" ?
    ["🌑 Новолуние", "🌓 Растущая луна", "🌕 Полнолуние", "🌗 Убывающая луна"] :
    ["🌑 New Moon", "🌓 Waxing", "🌕 Full Moon", "🌗 Waning"];
  
  let phaseIndex;
  if (lunarAge < 7.4) phaseIndex = 1;
  else if (lunarAge < 14.8) phaseIndex = 2;
  else if (lunarAge < 22.1) phaseIndex = 3;
  else phaseIndex = 0;
  
  document.getElementById("moonPhase").textContent = moonPhases[phaseIndex];
}

// Обновляем данные ежедневно
window.onload = getLunarDays;
setInterval(getLunarDays, 3600000); // Обновлять каждый час