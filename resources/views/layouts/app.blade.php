<!DOCTYPE html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
</head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}

                        {{ $slot }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            </main>
        </div>
    </body>
</html>

sistema binario
0,1, 10,11,100,101, 110,111, 10000000  

sistema octal
0,1,2,3,4,5,6,7, 10, 11, 12, 13, 14, 15, 16, 17,20,21,22,23,24,25,26,27,30 

sistema decimal
0,1,2,3,4,5,6,7,8,9,10,11,12,13,14, 15,16, 17, 18, 19, 20

sistema hexadecimal
00,01,02,03,04,05,06,07,08,09,0A,0B,0C,0D,0E,0F, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 1A,1B,1C,1D,1E,1F,20