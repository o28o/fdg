self.addEventListener("install", (event) => {
    console.log("Service Worker установлен");
    event.waitUntil(self.skipWaiting());
});

self.addEventListener("activate", (event) => {
    console.log("Service Worker активирован");
});

self.addEventListener("fetch", (event) => {
    console.log("Обрабатывается запрос:", event.request.url);
});
