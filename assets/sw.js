const CACHE_NAME = 'pwa-fdg-v1';
const urlsToCache = [
    '/assets/',
    '/ru/',
    '/',
    '/sc',
    '/th',
    '/bw',
    '/new',
    '/config',
    '/scripts',
    '/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/',
    '/suttacentral.net/sc-data/sc_bilara_data/translation/en/',
    '/suttacentral.net/sc-data/sc_bilara_data/translation/ru/',
    '/suttacentral.net/sc-data/html_text/ru',
    '/tipitaka.theravada.su',
    '/theravada.ru',
    '/ru/index.php',
    '/index.php',
    '/assets/img/icon-192x192.png',
    '/assets/img/icon-512x512.png'
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
