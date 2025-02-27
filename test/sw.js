const CACHE_NAME = 'pwa-test-v1';
const urlsToCache = [
    '/test/',  // Обновленный путь
    '/test/index.html',  // Обновленный путь
    '/test/icon-192x192.png',  // Обновленный путь
    '/test/icon-512x512.png'  // Обновленный путь
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                return cache.addAll(urlsToCache);
            })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                return response || fetch(event.request);
            })
    );
});
