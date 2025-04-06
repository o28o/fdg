import json
import os
import logging
from functools import lru_cache
from rapidfuzz import fuzz, process
from telegram import (
    Update,
    InlineQueryResultArticle,
    InputTextMessageContent,
    InlineKeyboardButton,
    InlineKeyboardMarkup
)
from telegram.ext import (
    Application,
    CommandHandler,
    MessageHandler,
    InlineQueryHandler,
    filters,
    CallbackContext,
)

# === Настройка логирования ===
logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s",
    handlers=[logging.FileHandler("bot.log"), logging.StreamHandler()],
)
logger = logging.getLogger(__name__)

# === Загрузка конфигурации ===
try:
    with open("config.json", "r") as config_file:
        config = json.load(config_file)
        TOKEN = config.get("TOKEN", "")
        if not TOKEN:
            raise ValueError("Токен не найден в config.json")
        
        # Параметры поиска
        search_config = config.get("search", {})
        FUZZY_ENABLED = search_config.get("fuzzy_enabled", True)
        MIN_QUERY_LENGTH = search_config.get("min_query_length", 2)
        MAX_SUGGESTIONS = search_config.get("max_suggestions", 28)
        FUZZY_MIN_SCORE = search_config.get("fuzzy_min_score", 70)
        NORMALIZE_DIGRAPHS = search_config.get("normalize_digraphs", True)
        NORMALIZE_DOUBLE_CONSONANTS = search_config.get("normalize_double_consonants", True)
        CACHE_SIZE = search_config.get("cache_size", 100_000)

except Exception as e:
    logger.error(f"Ошибка загрузки конфига: {e}")
    raise

# === Загрузка словаря ===
def load_words():
    try:
        path = os.path.join("assets", "sutta_words.txt")
        with open(path, "r", encoding="utf-8") as f:
            words = [line.strip() for line in f if line.strip()]
            logger.info(f"Загружено {len(words)} слов")
            return words
    except Exception as e:
        logger.error(f"Ошибка загрузки словаря: {e}")
        return []

WORDS = load_words()

# === Улучшенная нормализация ===
def get_normalization_table():
    """Генерирует таблицу замен для str.translate()"""
    replacements = {
        'ṁ': 'm', 'ṃ': 'm', 'ṭ': 't', 'ḍ': 'd', 'ṇ': 'n',
        'ṅ': 'n', 'ñ': 'n', 'ā': 'a', 'ī': 'i', 'ū': 'u'
    }
    if NORMALIZE_DIGRAPHS:
        replacements.update({
            'ph': 'p', 'th': 't', 'dh': 'd', 'gh': 'g',
            'bh': 'b', 'jh': 'j', 'kh': 'k', 'ch': 'c'
        })
    return str.maketrans(replacements)

NORM_TABLE = get_normalization_table()

def normalize(text: str) -> str:
    """Оптимизированная нормализация с str.translate()"""
    text = text.lower().translate(NORM_TABLE)
    if NORMALIZE_DOUBLE_CONSONANTS:
        for cons in "kgcjṭḍtdpbmnrlvs":
            text = text.replace(cons * 2, cons)
    return text

@lru_cache(maxsize=CACHE_SIZE)
def cached_normalize(text: str) -> str:
    """Кешированная версия normalize()"""
    return normalize(text)

# === Предварительная обработка слов ===
NORMALIZED_WORDS = {word: cached_normalize(word) for word in WORDS}

# === Улучшенный автокомплит ===
def autocomplete(query: str) -> list[str]:
    """Комбинированный поиск с фаззи-матчингом"""
    if len(query) < MIN_QUERY_LENGTH:
        return []

    query_norm = cached_normalize(query)
    
    # 1. Точный поиск в начале слова
    exact_matches = [
        word for word, norm_word in NORMALIZED_WORDS.items()
        if norm_word.startswith(query_norm)
    ]
    
    # 2. Поиск по подстроке (если результатов мало)
    if len(exact_matches) < MAX_SUGGESTIONS:
        substring_matches = [
            word for word, norm_word in NORMALIZED_WORDS.items()
            if query_norm in norm_word and word not in exact_matches
        ]
        exact_matches.extend(substring_matches)
    
    # 3. Фаззи-поиск (если включен и результатов мало)
    if FUZZY_ENABLED and len(exact_matches) < MAX_SUGGESTIONS // 2:
        fuzzy_matches = process.extract(
            query,
            WORDS,
            scorer=fuzz.token_sort_ratio,
            limit=MAX_SUGGESTIONS,
            score_cutoff=FUZZY_MIN_SCORE
        )
        exact_matches.extend(word for word, score in fuzzy_matches if word not in exact_matches)
    
    # Удаляем дубликаты и сортируем
    results = list(dict.fromkeys(exact_matches))
    results.sort(key=lambda x: (
        not NORMALIZED_WORDS[x].startswith(query_norm),  # Сначала точные совпадения
        len(x)  # Короткие слова выше
    ))
    
    return results[:MAX_SUGGESTIONS]

# === Создание клавиатуры ===
def create_keyboard(query: str) -> InlineKeyboardMarkup:
    search_url = f"https://dhamma.gift/ru/?p=-kn&q={query.replace(' ', '+')}"
    dict_url = f"https://dict.dhamma.gift/ru/search_html?q={query.replace(' ', '+')}"
    
    return InlineKeyboardMarkup([
        [
            InlineKeyboardButton(text="🔎 Dhamma.gift", url=search_url),
            InlineKeyboardButton(text="📚 Словарь", url=dict_url)
        ]
    ])

# === Обработчики команд ===
async def start(update: Update, context: CallbackContext):
    user = update.effective_user
    logger.info(f"Команда /start от {user.id} ({user.full_name})")
    await update.message.reply_text(
        "Добро пожаловать! Используйте:\n"
        "• Прямые запросы (например, 'sn12.2' или 'dukkha')\n"
        "• Для подсказок в любом чате: @dhammagift_bot слово"
    )

async def cache_stats(update: Update, context: CallbackContext):
    """Статистика кеша"""
    stats = cached_normalize.cache_info()
    await update.message.reply_text(
        f"📊 Статистика кеша:\n"
        f"• Использовано: {stats.currsize}/{stats.maxsize}\n"
        f"• Попаданий (hits): {stats.hits}\n"
        f"• Промахов (misses): {stats.misses}\n"
        f"• Эффективность: {stats.hits / (stats.hits + stats.misses) * 100:.1f}%"
    )

# === Инлайн-режим ===
async def inline_query(update: Update, context: CallbackContext):
    query = update.inline_query.query.strip()
    if not query:
        return

    logger.info(f"Инлайн-запрос: '{query}' от {update.inline_query.from_user.id}")
    suggestions = autocomplete(query)

    results = []
    for idx, word in enumerate(suggestions):
        keyboard = create_keyboard(word)
        results.append(
            InlineQueryResultArticle(
                id=f"{word}_{idx}",
                title=word,
                input_message_content=InputTextMessageContent(word),
                description=f"Нажмите, чтобы отправить '{word}'",
                reply_markup=keyboard
            )
        )

    if results:
        await update.inline_query.answer(results, cache_time=10)

# === Обработка сообщений ===
async def handle_message(update: Update, context: CallbackContext):
    text = update.message.text.strip()
    user = update.effective_user
    logger.info(f"Сообщение от {user.id}: {text}")

    # Автокомплит для коротких слов
    if len(text) < 5 and text.isalpha():
        suggestions = autocomplete(text)
        if suggestions:
            reply = "Возможные варианты:\n" + "\n".join(f"- {w}" for w in suggestions[:8])
            await update.message.reply_text(reply)
            return

    # Все сообщения с кнопками
    await update.message.reply_text(
        text,
        reply_markup=create_keyboard(text)
    )

# === Запуск бота ===
def main():
    logger.info("Запуск бота...")
    try:
        app = Application.builder().token(TOKEN).build()

        # Команды
        app.add_handler(CommandHandler("start", start))
        app.add_handler(CommandHandler("cache_stats", cache_stats))

        # Инлайн-режим
        app.add_handler(InlineQueryHandler(inline_query))

        # Обработка сообщений
        app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))

        logger.info("Бот запущен")
        app.run_polling()
    except Exception as e:
        logger.critical(f"Ошибка запуска: {e}")

if __name__ == "__main__":
    main()