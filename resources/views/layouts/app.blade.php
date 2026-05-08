<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'YPTQ Asy-Syams') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- AlpineJS CDN -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Custom Loader CSS -->
        <style>
            #preloader {
                position: fixed;
                top: 0; 
                left: 0;
                width: 100%; 
                height: 100vh;
                background-color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                opacity: 1;
                visibility: visible;
                transition: opacity 0.5s ease, visibility 0.5s ease;
            }

            .loader-hidden {
                opacity: 0;
                visibility: hidden;
            }

            /* Animasi Kustom Asy-Syams */
            .loader {
                position: relative;
                width: 2.5em;
                height: 2.5em;
                transform: rotate(165deg);
            }

            .loader:before, .loader:after {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                display: block;
                width: 0.5em;
                height: 0.5em;
                border-radius: 0.25em;
                transform: translate(-50%, -50%);
            }

            /* Durasi dipercepat ke 1.5s agar lebih responsif */
            .loader:before { animation: before8 1.5s infinite; }
            .loader:after { animation: after6 1.5s infinite; }

            @keyframes before8 {
                0% { 
                    width: 0.5em; 
                    box-shadow: 1em -0.5em rgba(24, 63, 59, 0.75), -1em 0.5em rgba(212, 175, 55, 0.75); 
                } /* Hijau & Emas */
                35% { 
                    width: 2.5em; 
                    box-shadow: 0 -0.5em rgba(24, 63, 59, 0.75), 0 0.5em rgba(212, 175, 55, 0.75); 
                }
                70% { 
                    width: 0.5em; 
                    box-shadow: -1em -0.5em rgba(24, 63, 59, 0.75), 1em 0.5em rgba(212, 175, 55, 0.75); 
                }
                100% { 
                    box-shadow: 1em -0.5em rgba(24, 63, 59, 0.75), -1em 0.5em rgba(212, 175, 55, 0.75); 
                }
            }

            @keyframes after6 {
                0% { 
                    height: 0.5em; 
                    box-shadow: 0.5em 1em rgba(212, 175, 55, 0.75), -0.5em -1em rgba(24, 63, 59, 0.75); 
                } /* Emas & Hijau */
                35% { 
                    height: 2.5em; 
                    box-shadow: 0.5em 0 rgba(212, 175, 55, 0.75), -0.5em 0 rgba(24, 63, 59, 0.75); 
                }
                70% { 
                    height: 0.5em; 
                    box-shadow: 0.5em -1em rgba(212, 175, 55, 0.75), -0.5em 1em rgba(24, 63, 59, 0.75); 
                }
                100% { 
                    box-shadow: 0.5em 1em rgba(212, 175, 55, 0.75), -0.5em -1em rgba(24, 63, 59, 0.75); 
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Elemen Preloader -->
        <div id="preloader">
            <div class="loader"></div>
        </div>

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

        <!-- Script untuk menyembunyikan loader -->
        <script>
            window.addEventListener("load", function() {
                const preloader = document.getElementById("preloader");
                if (preloader) {
                    // Jeda 500ms agar user sempat melihat animasi indah Asy-Syams
                    setTimeout(() => {
                        preloader.classList.add("loader-hidden");
                    }, 500); 
                }
            });
        </script>
    </body>
</html>