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

        <!-- Add this link to the head of your HTML file -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
{{--            <div>--}}
{{--                <a href="/">--}}
{{--                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--                </a>--}}
{{--            </div>--}}

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex my-10">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('tournaments')" :active="request()->routeIs('tournaments')">
                        {{ __('Tournaments') }}
                    </x-nav-link>

                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Standings') }}
                    </x-nav-link>

                    <x-nav-link :href="route('teams')" :active="request()->routeIs('teams')">
                        {{ __('Teams') }}
                    </x-nav-link>

                    <x-nav-link :href="route('games')" :active="request()->routeIs('games')">
                        {{ __('Games') }}
                    </x-nav-link>

                </div>

            </div>


            <div class="w-full sm:max-w-3xl my-10 px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
