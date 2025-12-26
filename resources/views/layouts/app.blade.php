<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Biddie</title>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet">

    <!-- Bootstrap (optional, if you want) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        /* Overlay for readability */
        .overlay {
            background: rgba(10, 30, 63, 0.7); /* Navy blue overlay */
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="overlay text-center px-8 py-16 rounded-3xl shadow-2xl max-w-lg mx-4">
        <!-- System Name -->
        <h1 class="text-6xl md:text-7xl font-extrabold mb-6 tracking-tight text-white drop-shadow-lg">Biddie</h1>

        <!-- Welcome Message -->
        <p class="text-lg md:text-2xl mb-10 text-gray-200 leading-relaxed drop-shadow-md">
            Welcome to Biddie! Start bidding, trading, and selling securely.
        </p>

        <!-- Home Button -->
        <a href="{{ route('homepage') }}" class="btn btn-primary btn-lg px-10 py-3 text-white font-bold rounded-xl shadow-lg hover:scale-105 transition transform duration-300">
            Go to Home
        </a>
    </div>

</body>
</html>
