<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ Request::segment(1) == 'sekretariat' ? 'Dashboad Sekretariat' : (Request::segment(1) == 'admin' ? 'Dashboard Admin '  : (Request::segment(1) == 'kearsipan' ? 'Dashboard Bidang Kearsipan' : (Request::segment(1) == 'layanan' ? 'Dashboard layanan' : (Request::segment(1) == 'pengembangan' ? 'Dashboard pengembangan' : 'Aplikasi Agenda Surat') ))) }}
        </title>

        <link rel="icon" type="image/png" href="{{ asset('logo_Dis.png') }}">



        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
    
        <x-banner />
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            

            <x-notifikasi />
            @stack('modals')
            @livewireScripts


        </div>
    </body>
</html>