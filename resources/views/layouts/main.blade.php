<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Biddie')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background: rgba(10, 30, 63, 0.7);
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body class="text-white min-h-screen">
    <header class="fixed inset-x-0 top-0 z-50 bg-black/40 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('homepage') }}" class="text-2xl font-bold tracking-tight">Biddie</a>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('homepage') }}" class="text-white hover:text-gray-200 font-semibold">Market</a>
                    <a href="{{ route('info') }}" class="text-white hover:text-gray-200 font-semibold">About/Contact</a>
                    <a href="{{ route('social.feed') }}" class="text-white hover:text-gray-200 font-semibold">Feed</a>
                    <a href="{{ route('friends.index') }}"
                        class="text-white hover:text-gray-200 font-semibold">Friends</a>
                    <a href="{{ route('messages.index') }}"
                        class="text-white hover:text-gray-200 font-semibold">Messages</a>
                </div>

                <div class="hidden md:flex items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-secondary">Profile</a>
                        <a href="{{ route('social.feed') }}" class="btn btn-sm btn-secondary">Feed</a>
                        <a href="{{ route('friends.index') }}" class="btn btn-sm btn-secondary">Friends</a>
                        <a href="{{ route('messages.index') }}" class="btn btn-sm btn-secondary">Messages</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-ghost">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-ghost">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>
                        @endif
                    @endauth
                </div>

                <button id="mobile-menu-button"
                    class="md:hidden p-2 rounded-lg text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/30">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-black/60 border-t border-white/10">
            <div class="px-4 py-4 space-y-1">
                <a href="{{ route('homepage') }}"
                    class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Market</a>
                <a href="{{ route('info') }}"
                    class="block px-3 py-2 rounded-md text-white hover:bg-white/10">About/Contact</a>
                <a href="{{ route('social.feed') }}"
                    class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Feed</a>
                <a href="{{ route('friends.index') }}"
                    class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Friends</a>
                <a href="{{ route('messages.index') }}"
                    class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Messages</a>
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Dashboard</a>
                    <a href="{{ route('profile.edit') }}"
                        class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Profile</a>
                    <a href="{{ route('social.feed') }}"
                        class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Feed</a>
                    <a href="{{ route('friends.index') }}"
                        class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Friends</a>
                    <a href="{{ route('messages.index') }}"
                        class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Messages</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-3 py-2 rounded-md text-white hover:bg-white/10">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block px-3 py-2 rounded-md text-white hover:bg-white/10">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <main class="pt-24">
        @yield('content')
    </main>

    <footer class="mt-16 py-10 text-center text-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <p class="text-sm">&copy; {{ date('Y') }} Biddie. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
    });
    </script>

    @stack('scripts')
</body>

</html>