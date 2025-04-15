// 6454047b-47db-4fc5-a624-1da588093be5

// 21556dddc27838113f436a1a8aa595f9dab78669943c75372c93b52d79a9265df9d0b5cac4ef4e17a9d5234b528addf3e10f3d0d6f098ece962a2b7d3e05277baecd3479eca190a8e3b620bb937ad8134808b821ab3429d6cfe424a210b3b95fd3ffbb30472a71d68e24f31a6b50fb57
// Конфигурация
const API_KEY = 'ваш_api_ключ'; // Получите бесплатный ключ на astronomyapi.com
const TIMEZONE = 6; // Часовой пояс (для Казахстана +6)

// DOM элементы
const calendarEl = document.getElementById('lunarCalendar');
const currentInfoEl = document.getElementById('currentLunarInfo');

async function fetchLunarData() {
  const today = new Date();
  const nextYear = new Date(today.getFullYear() + 1, 11, 31);
  
  try {
    const response = await fetch(`https://api.astronomyapi.com/api/v2/bodies/positions/moon?from_date=${formatDate(today)}&to_date=${formatDate(nextYear)}&timezone=${TIMEZONE}`, {
      headers: { 'Authorization': `Basic ${btoa(API_KEY + ':')}` }
    });
    
    return await response.json();
  } catch (error) {
    console.error("Ошибка API:", error);
    return null;
  }
}

function formatDate(date) {
  return date.toISOString().split('T')[0];
}

function generateLunarCalendar(data) {
  if (!data) return;
  
  // Парсим данные о фазах луны
  const phases = data.data.reduce((acc, day) => {
    if (day.phase.phase_name === "New Moon" || 
        day.phase.phase_name === "Full Moon" ||
        day.phase.phase_name === "First Quarter" || 
        day.phase.phase_name === "Last Quarter") {
      acc.push({
        date: new Date(day.date),
        type: day.phase.phase_name,
        illumination: day.phase.illumination
      });
    }
    return acc;
  }, []);
  
  // Сортируем по дате
  phases.sort((a, b) => a.date - b