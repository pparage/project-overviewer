<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project Overview') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>

        // Function to toggle between dark and light mode
        function toggleDarkMode() {
            const currentTheme = localStorage.theme;
            if (currentTheme === 'dark') {
                localStorage.theme = 'light';
                document.getElementById('flexSwitchCheckDefault').checked = false;
                document.documentElement.classList.remove('dark');
            } else {
                localStorage.theme = 'dark';
                document.documentElement.classList.add('dark')
                document.getElementById('flexSwitchCheckDefault').checked = true;
            }
        }

        // Check the initial theme and set the class accordingly
        if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');

            document.getElementById('flexSwitchCheckDefault').checked = true;
        }

    </script>
    <!-- Style -->
    <link type="text/css" rel="stylesheet" href="{{asset('/css/custom.css')}}">
    @livewireStyles

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    {{ $header }}
                </div>
            </div>
        </header>
    @endif
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('components.error')
    </div>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
@livewireScripts
</body>

</html>
