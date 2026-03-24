<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<<body class="bg-white dark:bg-neutral-900">
    @include('components.header.zookeeper-header')

    <main class="min-h-screen p-6 flex flex-col bg-white border border-gray-200 shadow-xs rounded-lg dark:bg-neutral-800 dark:border-neutral-700">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
