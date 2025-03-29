const CACHE_NAME = 'pwa-fdg-v1';
const LAZY_CACHE_NAME = 'pwa-fdg-lazy-v1'; // Отдельный кэш для тяжёлых файлов

// Основные файлы (кэшируются сразу)
const urlsToCache = [
    '/assets/js/paliLookup.js',
    '/assets/js/autopali.js',
    '/ru/index.php',
    '/index.php',
    '/assets/img/icon-192x192.png',
    '/assets/img/icon-512x512.png'
];

// Тяжёлые файлы (кэшируются в фоне)
const lazyFilesToCache = [
    '/js/standalone-dpd/dpd_deconstructor.js',
    '/js/standalone-dpd/dpd_ebts.js',
    '/js/standalone-dpd/dpd_i2h.js'
];

// --- Установка SW (кэшируем только основные файлы) ---
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => cache.addAll(urlsToCache))
            .then(() => self.skipWaiting()) // Активируем SW сразу
    );
});

// --- Фоновая загрузка тяжёлых файлов (когда браузер простаивает) ---
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.open(LAZY_CACHE_NAME).then((cache) => {
            // Если файлов ещё нет в кэше — начинаем фоновую загрузку
            return Promise.all(
                lazyFilesToCache.map(url => {
                    return cache.match(url).then(res => {
                        if (!res) {
                            return fetch(url).then(networkRes => {
                                return cache.put(url, networkRes.clone());
                            }).catch(() => null); // Игнорируем ошибки
                        }
                        return res;
                    });
                })
            );
        })
    );
});

// --- Перехват запросов (отдаём из кэша если есть) ---
self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                return response || fetch(event.request);
            })
    );
});