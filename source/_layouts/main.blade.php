<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <title>{{ $page->title ? $page->title . ' — ' : '' }}{{ $page->siteName }}</title>
        <meta name="description" content="{{ $page->description }}">

        <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">

        @include('_partials.opengraph')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
        <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
    </head>
    <body class="flex min-h-screen flex-col bg-white font-sans text-gray-600 antialiased">
        @include('_partials.header')

        <main class="flex-1">
            @yield('body')
        </main>

        @include('_partials.footer')
    </body>
</html>
