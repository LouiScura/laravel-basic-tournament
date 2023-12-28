<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tournament') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="font-sans text-gray-900 antialiased">

        <x-nav-wrapper/>

        <div class="min-h-screen flex flex-col sm:justify-start items-center pt-6 sm:pt-0 bg-[#171717]">
            <div class="w-full sm:max-w-3xl my-10 dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
