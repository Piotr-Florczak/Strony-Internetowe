if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('ServiceWorker.js').then(function () {
        console.info("Instalowanie ServiceWorker'a... zrobione");
    }).catch(function (err) {
        console.info('ServiceWorker nie zainstalowany, sprawdź błąd:', err)
    });
}

const APP_CACHE = 'appCache';
const MY_FILES = [
'images/icons/index.html',
'images/icons/icon512.png',
'Start.html',
'End.html'

];
/*
 */


self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(APP_CACHE).then(function(cache) {
      return cache.addAll(MY_FILES);
    })
  );
});

self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          return cacheName !== APP_CACHE;
        }).map(function(cacheName) {
          return caches.delete(cacheName);
        })
      );
    })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    fetch(event.request).catch(function() {
      return caches.match(event.request);
    })
  );
});