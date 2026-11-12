<!doctype html>
<html lang="es" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Sonora')</title>
    <link rel="icon" href="/logos/sonora-mark-dark.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400&family=Manrope:wght@400;500;700;800&display=swap">
 <script>try { document.documentElement.dataset.theme = localStorage.getItem('tema') || 'dark'; } catch (e) {}</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a href="#principal" class="sr-only rounded-pill bg-accent px-4 py-2 text-sm font-bold text-on-accent focus:not-sr-only focus:absolute focus:left-2 focus:top-2 focus:z-10 foco">Saltar al contenido</a>
    @yield('cuerpo')
    <script>window.pistas = @json($pistas);</script>
</body>
</html>