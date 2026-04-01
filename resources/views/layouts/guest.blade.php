<!DOCTYPE html>
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
    @vite(['resources/css/app.css', 'resources/css/biddie-auth.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-white antialiased bg-slate-950">
    <div
        class="min-h-screen w-full relative bg-[radial-gradient(circle_at_top,_rgba(96,165,250,0.16),transparent_25%),radial-gradient(circle_at_bottom_right,_rgba(168,85,247,0.18),transparent_20%)]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>
            <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>