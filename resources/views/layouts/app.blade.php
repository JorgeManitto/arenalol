<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="{{asset('assets/css/champions.css')}}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <style>
            .parent {
                display: grid;
                grid-template-columns: repeat(8, 1fr);
                grid-template-rows: repeat(5, 1fr);
                grid-column-gap: 0px;
                grid-row-gap: 0px;
                padding: 1em;
                width: 100%;
                margin: auto;
            }
            .parent > div{
                margin: auto;
            }
            .styleName {
                display: block;
                overflow: hidden;
                background-color: rgb(6, 28, 37);
                padding: 6% 8%;
                transition: background-color 300ms cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
                cursor: pointer;
            }
            .styleText {
                display: inline-block;
                color: white;
                white-space: nowrap;
                font-size: 14px;
                font-family: "Beaufort for LOL", serif;
                font-weight: 800;
                letter-spacing: 0.08em;
                text-overflow: ellipsis;
                transition: transform 300ms cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
                cursor: pointer;
                text-transform: uppercase;
            }
            .contentChampion{
                width: 120px;
                margin: 0.5em auto;
            }
            .text-lol-gold{
                color: #C89B3C;
            }
            .bg-lol-gold{
                background-color: #C89B3C;
            }
            .bg-lol-dark{
                background-color: #010A13;
            }
            .bg-lol-blue{
                background-color: #0A1428;
            }
            .bg-success{
                background-color: #13DEB9; 
            }
            .bg-info{
                background-color: #539BFF; 
            }
            .bg-warning{
                background-color: #FFAE1F; 
            }
            .bg-danger{
                background-color: #FA896B; 
            }
            .bg-primary{
                background-color: #5D87FF; 
            }
            .bg-dark{
                background-color: #2A3547; 
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-lol-blue ">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-lol-dark shadow">
                    <div class="text-lol-gold max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-lol-dark">
            <!-- Logo -->
            <div class="shrink-0 flex items-center" style="padding: 2em;">
                <a href="{{ route('inicio') }}" style="margin: auto;">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            </div>
        </footer>
        @stack('modals')

        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    </body>
</html>
