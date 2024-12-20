<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Agenda Surat</title>
    <link rel="icon" type="image/png" href="{{ asset('logo_Dis.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="antialiased font-sans">
    <div class="bg-gray-50 text-black dark:bg-black  dark:text-white">
        <div class="relative flex flex-col min-h-screen">
            <!-- Navbar -->
            <header class="fixed top-0 left-0 w-full py-4 bg-gray-800 bg-opacity-70 backdrop-blur-md text-white shadow-md z-50">
                <div class="container mx-auto flex items-center justify-between px-4">
                    <div class="text-lg font-semibold inline-block">
                        <div class="flex items-center space-x-2">
                            <x-application-logo class="block h-9 w-auto fill-current  dark:text-gray-200" />
                            <p class=" dark:text-gray-200">Aplikasi Angenda Surat</p>
                        </div>
                        
                    </div>
                    <nav id="nav-menu" class="hidden sm:flex space-x-4">
                        <a href="/"  wire:navigate class="hover:text-gray-300" style="border-bottom: 2.2px solid white;">Beranda</a>
                    <a href="/login"  wire:navigate cclass="hover:text-gray-300">Login</a>

          
                    </nav>
                    <button id="hamburger-btn" class="sm:hidden flex items-center text-white hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
                <!-- Dropdown Menu -->
                <div id="dropdown-menu" class="hidden bg-gray-800 sm:hidden">
                    <a href="/"  wire:navigate class="block py-2 px-4 hover:bg-gray-700">Beranda</a>
                    <a href="/login"  wire:navigate class="btn block py-2 px-4 hover:bg-gray-700">Login</a>

                </div>
            </header>

            <main class="flex-grow">


                        <section class="min-h-screen flex justify-center items-center dark:bg-gray-900 p-6">
                            <div class="card lg:card-side bg-base-100 shadow-xl w-full max-w-4xl">
                                <figure class="flex-1">
                                    <img
                                        src="{{ asset('agenda_surat.png') }}"
                                        alt="Aplikasi Agenda Surat"
                                        class="w-full h-full object-cover rounded-l-lg" />
                                </figure>
                                <div class="card-body flex-1 p-6 lg:p-8">
                                    <h2 class="card-title text-2xl font-bold dark:text-gray-300">Aplikasi Agenda Surat</h2>
                                    <p class="dark:text-gray-400 leading-relaxed">
                                        Aplikasi Agenda Surat adalah solusi digital untuk mengelola surat masuk dan surat keluar 
                                        dengan mudah dan terorganisir. Dilengkapi dengan fitur pencatatan, pelacakan, dan pengarsipan surat, 
                                        aplikasi ini membantu meningkatkan efisiensi pengelolaan dokumen dalam organisasi Anda.
                                    </p>
                                    <div class="card-actions justify-end">
                                        <a href="/login" wire:navigate class="btn btn-primary px-6 py-2 text-lg font-medium">Login Agenda</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                



            <!-- Footer -->
            <footer class="dark:bg-gray-900 dark:text-white">
                <div class="container mx-auto px-4 py-8 text-center">
                    <p>&copy; 2024 Dispunsip. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </div>

    <!-- Script -->
    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const dropdownMenu = document.getElementById('dropdown-menu');

        document.addEventListener('click', (event) => {
            if (hamburgerBtn.contains(event.target) || dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.toggle('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
