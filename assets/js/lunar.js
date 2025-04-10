// Улучшенная функция для определения лунных дней
function getLunarDays() {
  const now = new Date();
  
  // Базовые параметры (можно уточнить для вашего местоположения)
  const timeZoneOffset = 6; // Часовой пояс
  const newMoonDate = new Date('2023-01-21T20:53Z'); // Дата известного новолуния
  
  // Рассчитываем текущий лунный цикл
  const lunarCycle = 29.530588; // Средняя продолжительность лунного месяца в днях
  const daysSinceNewMoon = (now - newMoonDate) / (1000 * 60 * 60 * 24);
  let lunarAge = daysSinceNewMoon % lunarCycle;
  
  // Корректировка лунного дня (начало с заката)
  const lunarDay = Math.floor(lunarAge) + 1;
  const adjustedLunarDay = (lunarDay > 29) ? 1 : lunarDay;
  
  // Устанавливаем значения на странице
  document.getElementById("lunarDay").textContent = adjustedLunarDay;
  document.getElementById("dayOfMonth").textContent = now.getDate();
  
  // Рассчитываем даты будущих лунных дней
  function getNextLunarDay(targetDay) {
    const daysToAdd = (targetDay - adjustedLunarDay + 29) % 29;
    const date = new Date(now);
    date.setDate(now.getDate() + daysToAdd);
    return date.toLocaleDateString();
  }
  
  document.getElementById("lunar8").textContent = getNextLunarDay(8);
  document.getElementById("lunar14").textContent = getNextLunarDay(14);
  document.getElementById("lunar15").textContent = getNextLunarDay(15);
  
  // Дополнительно: определяем фазу луны
  const moonPhases = ["🌑 Новолуние", "🌓 Растущая луна, первая четверть", "🌕 Полнолуние", "🌗 Убывающая луна, последняя четверть."];
  let phaseIndex;
  if (lunarAge < 7.4) phaseIndex = 1;
  else if (lunarAge < 14.8) phaseIndex = 2;
  else if (lunarAge < 22.1) phaseIndex = 3;
  else phaseIndex = 0;
  
  document.getElementById("moonPhase").textContent = moonPhases[phaseIndex];
}

// Вызываем функцию при загрузке
window.onload = getLunarDays;