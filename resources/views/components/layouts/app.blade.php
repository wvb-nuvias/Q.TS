<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ auth()->user()->setting("theme") }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="img/icon/favicon-16.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])

        <!-- Styles -->
        <link href="argon-dashboard-tailwind.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        @livewireStyles
    </head>
    <body class="m-0 font-sans text-base antialiased font-normal text-left leading-default dark:bg-slate-900 bg-gray-50 text-slate-500  dark:text-white">
        <livewire:side-bar />

        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl ps ps--active-y">
            <livewire:top-bar />
            <livewire:side-bar-settings />

            {{ $slot }}

            <div class="ps__rail-y" style="top: 0px; height: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
        </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
