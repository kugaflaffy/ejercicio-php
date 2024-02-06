
// permite que tu aplicación web funcione offline, mejore el rendimiento y maneje otras tareas en segundo plano.


const cacheName = 'lista-organizadora-cache-v1';
const filesToCache = [
  '/',
  '/index.html',
  '/manifest.json',
  '/icon.png',
  // Agrega aquí más archivos que deseas que se almacenen en la caché
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(cacheName).then(cache => {
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request);
    })
  );
});
