<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if (isset($title))
            <title>{{$title}}</title>
        @else
            <title>ArenaLol</title>
        @endif

        <link rel="stylesheet" href="{{asset('assets/css/champions.css')}}">
        

        <meta name=robots content="index,follow">
        <meta name=cache-control content=Public>        
        <meta name="Generator" content="CMS">  
  
        <meta property="fb:pages" content="" />    
        <meta name="robots" content="index, follow" />
        <meta name="googlebot"  content="index, follow" />
        <meta name="google" content="index, follow" />
        <meta name="twitter:card" content="summary_large_image">
        <script type="application/ld+json">
            {
                "@context":"http://schema.org",
                "@type":"WebSite",
                "name":"",
                "@id":"/#website"
            }
            </script>
            <script type="application/ld+json">
            {
                "@context":"http://schema.org",
                "@type":"Organization",
                "name":"",
                "url":"",
                "logo": {
                "@type":"ImageObject",
                "url": "", 
                "width":"226", 
                "height":"85"
                },
                "sameAs":[
                "",
                ""
                ]
            }
        </script>
        @php
       
            $keywords = 'ArenaLol, 2v2v2v2,Sinergias ArenaLol,Sinergias Arena,Sinergias League of Legends,Sinergias campeones LoL,Mejores sinergias LoL,Combos League of Legends,Estrategias sinergia Arena,Estrategias sinergia 2v2v2v2,Estrategias sinergia LoL,Sinergias equipo LoL,Sinergias equipo Arena,Sinergias equipo 2v2v2v2,Composiciones Arena,Composiciones League of Legends,Sinergias meta LoL,Guía de sinergias LoL,,Mejores sinergias 2v2v2v2,Counter de sinergias Arena,Counter de sinergias 2v2v2v2,Modo de juego Arena LoL,Arena 8 jugadores LoL,Composiciones Arena LoL,Sinergias para Arena LoL,Mejores combinaciones Arena LoL,Estrategias para modo Arena LoL,Equipos 2 jugadores Arena LoL,Composiciones meta Arena LoL,Argumentos campeones Arena LoL,Habilidades campeones Arena LoL,Estadísticas campeones Arena LoL,Itemización para Arena LoL,Mejores ítems Arena LoL,Guía Arena League of Legends,Tips y trucos Arena LoL,Campeones destacados para Arena LoL,Mejores duplas Arena LoL,Estrategias de equipo Arena LoL,Cómo ganar en el modo Arena LoL,Tier list Arena LoL';
            $description = 
            'Descubre las mejores composiciones y sinergias para el emocionante modo de juego Arena en League of Legends. Domina las partidas con equipos conformados por dos jugadores en intensas batallas 2v2. Nuestra guía te proporcionará estrategias, estadísticas y habilidades de campeones, junto con la itemización clave para maximizar tu rendimiento en el campo de batalla. Conviértete en un experto en el meta de Arena y lleva tu juego al siguiente nivel con nuestras recomendaciones. ¡Prepárate para la victoria en este desafiante modo de League of Legends!'      
            @endphp
    <meta name="description" content="{{$description}}">                   
    <meta name="keywords" content="{{$keywords}}" />
    <meta property="og:description" content="{{$description}}">        
    <link rel="canonical" href="{{url()->full()}}">       
    
    <script type="application/ld+json">
      {
        "@context":"http://schema.org",
        "@type":"WebPage",
        "headline":"",
        "url":"/",
        "datePublished":"2018-08-31T15:46:05-03:00",
        "dateModified":"2018-10-08T13:55:11-03:00",
        "author":{
          "@type":"Organization",
	        "name":"",
	        "url":"",
	        "logo": {
	          "@type":"ImageObject",
	          "url": "/assets/logo-226x85.jpg", 
	          "width":"226", 
	          "height":"85"
	        },
	        "sameAs":[
	          "",
	          ""
	        ]
        },
        "publisher":{
          "@type":"Organization",
	        "name":"",
	        "url":"",
	        "logo": {
	          "@type":"ImageObject",
	          "url": "/assets/logo-226x85.jpg", 
	          "width":"226", 
	          "height":"85"
	        },
	        "sameAs":[
	          "",
	          ""
	        ]
        },
        "mainEntityOfPage":"/"
      }
    </script>   
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

        
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
