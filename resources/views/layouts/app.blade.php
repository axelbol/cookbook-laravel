<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel Cookbook') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    {{-- BODY FOR BREEZE --}}
    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body> --}}

    {{-- BODY FOR PROJECT --}}
    <body class="font-sans antialiased text-gray-900">
        <div class="min-h-screen bg-gray-100">

            <div class="bg-blue-600 text-white">
                <nav class="container mx-auto px-4 py-4 space-x-6">
                    <a href="/" class="hover:text-gray-200">Home</a>
                    <a href="/charts" class="hover:text-gray-200">Charts</a>
                </nav>
            </div>

            <!-- Page Content -->
            <main class="container mx-auto px-4 py-4">
                {{ $slot }}
            </main>
        </div>

        <!-- Scripts -->
        @stack('scripts')
    </body>
</html>
