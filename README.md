# Sonora

Aplicación web de música hecha con Laravel, Blade y Tailwind CSS v4, siguiendo el sistema de diseño Sonora. La reproducción es simulada (sin audio): un temporizador avanza el progreso.

## Pantallas

- **Inicio** (`/`): chips de filtro, "Tus mezclas" y "Recién escuchado".
- **Playlist** (`/playlist/{slug}`): portada, datos y lista de canciones.
- **Reproductor** (`/reproductor`): portada grande, progreso, controles y cola.
- **Tema claro y oscuro** con el botón "Cambiar tema" (se recuerda en el navegador).

## Cómo ejecutarlo

Requisitos: PHP, Composer y Node. Con Laravel Herd en Windows:

1. Clona o copia el proyecto dentro de la carpeta de Herd (`C:\Users\TU_USUARIO\Herd\sonora`).
2. En la terminal, dentro del proyecto:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev
```

3. Deja `npm run dev` corriendo y abre http://sonora.test.

Sin Herd: en otra terminal ejecuta `php artisan serve` y abre http://localhost:8000.

## Estructura

| Ruta | Contenido |
| --- | --- |
| `resources/css/app.css` | Tokens del sistema (oscuro y claro) conectados a Tailwind y la clase `.foco` |
| `resources/js/app.js` | Reproductor simulado, filtros y cambio de tema |
| `resources/views/layouts/` | `app` (HTML base) y `panel` (menú lateral y barra del reproductor) |
| `resources/views/components/` | `icon`, `button`, `chip`, `cover`, `media-card`, `song-row`, `progreso`, `controles`, `barra-reproductor` |
| `app/Support/Catalogo.php` | 10 canciones y 4 playlists inventadas |
| `routes/web.php` | Las tres rutas |
| `public/logos/` | Marca de cinco barras (ámbar en oscuro, `#a65500` en claro) |

## Decisiones

**Componentes que reutilicé**

- `cover` lo usan las tarjetas, la portada de la playlist, la miniatura de la barra y la portada grande del Reproductor. Solo cambia el tamaño que se le pasa por clases.
- `song-row` sirve tanto en la lista de la playlist como en la cola del Reproductor.
- `controles` se usa en la barra inferior y, con `:grande="true"`, en el Reproductor.
- `progreso` es la misma barra en ambos sitios, con tiempos en JetBrains Mono.
- `media-card` es un enlace en las playlists y un botón en las canciones recientes.

**Decisiones de diseño**

- Solo clases semánticas de los tokens (`bg-surface-raised`, `text-ink-muted`, `rounded-pill`); ningún hexadecimal suelto en las vistas. Los únicos hex están en `app.css` y en los SVG de `public/logos/`.
- Un solo botón primario ámbar por vista. En Playlist, "Reproducir" es secundario para que el ámbar sea el de la barra del reproductor.
- Todo control lleva anillo de enfoque (`.foco`: 3px en `focus`, 2px de separación). Los botones de solo icono tienen `aria-label`.
- La barra de progreso es un `slider` accesible: se mueve con clic y con las flechas del teclado.
- Las portadas son un marcador `surface-high` con barras ecualizadoras, sin degradados ni imágenes de terceros.
- El estado del reproductor vive en `sessionStorage`, así la música simulada sigue al cambiar de pantalla. El tema vive en `localStorage`.
- Las fuentes se cargan con `<link>` en el layout, porque un `@import` de fuentes dentro de `app.css` rompe el CSS de Tailwind.

**Qué cambiaría**

- Pasar el catálogo a un modelo `Track` con migración y seeder, en lugar de la clase `Catalogo`.
- Que la cola dependa de la playlist elegida; hoy siempre es la lista completa.
- Agregar Buscar, volumen y aleatorio.
- Una versión móvil de 390px revisada con más cuidado.
- Conectar el estado a un elemento `<audio>` real.

## Accesibilidad

- Contraste de los tokens de color en ambos temas.
- Uso completo con teclado y enlace "Saltar al contenido".
- Estados con texto o icono además del color.

## Capturas

Están en la carpeta `capturas/`: Inicio, Playlist y Reproductor en tema oscuro y claro.