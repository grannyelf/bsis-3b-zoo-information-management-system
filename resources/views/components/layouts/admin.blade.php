<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body
    class="hs-overlay-body-open overflow-hidden bg-background-2 bg-white text-black dark:bg-neutral-900 dark:text-white">
    @include('components.navbar.admin-navbar')
    @include('components.header.admin-header')
    <main class="lg:hs-overlay-layout-open:ps-60 transition-all duration-300 lg:fixed lg:inset-0 pt-13.5 px-3 pb-3">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
