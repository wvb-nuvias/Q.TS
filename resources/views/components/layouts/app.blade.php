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

        @livewireStyles
    </head>
    <body class="m-0 font-sans text-base antialiased font-normal text-left leading-default dark:bg-slate-900 bg-gray-50 text-slate-500  dark:text-white">
        <x-navbar.sidebar />

        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl ps ps--active-y">
            <x-navbar.topbar />

            {{ $slot }}

            <div class="ps__rail-y" style="top: 0px; height: 200px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
        </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
