<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Biddie - Home</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background: rgba(10, 30, 63, 0.8);
            backdrop-filter: blur(6px);
        }
    </style>
</head>
<body class="text-gray-100">

    <!-- Navbar -->
    <nav class="bg-white/20 backdrop-blur-md border-b border-gray-300 fixed w-full z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <!-- Logo -->
                <a href="#" class="text-2xl font-bold text-white hover:text-gray-200">Biddie</a>

                <!-- Menu Links -->
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="#" class="text-white hover:text-gray-200 font-semibold">Home</a>
                    <a href="#" class="text-white hover:text-gray-200 font-semibold">View Listings</a>
                    <a href="#" class="text-white hover:text-gray-200 font-semibold">View Trades</a>
                    <a href="#" class="text-white hover:text-gray-200 font-semibold">My Shop</a>
                    <a href="#" class="text-white hover:text-gray-200 font-semibold">Notifications</a>
                </div>

                <!-- Profile Icon -->
                <div class="ml-4 relative">
                    <button class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <img class="h-10 w-10 rounded-full object-cover" src="https://via.placeholder.com/150" alt="Profile">
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 rounded-md text-white hover:bg-indigo-600">Home</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white hover:bg-indigo-600">View Listings</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white hover:bg-indigo-600">View Trades</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white hover:bg-indigo-600">My Shop</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white hover:bg-indigo-600">Notifications</a>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="pt-28 max-w-7xl mx-auto px-6 lg:px-8">

        <section class="mt-16">
    <div class="overlay rounded-3xl p-8 max-w-5xl mx-auto">

        <h2 class="text-3xl font-bold text-center text-white mb-8">
            Live Auction
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Item Preview -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                <img src="https://via.placeholder.com/600x400"
                     class="w-full h-64 object-cover rounded-xl mb-4"
                     alt="Auction Item">

                <h3 class="text-2xl font-semibold text-white mb-2">
                    Vintage Headphones
                </h3>

                <p class="text-gray-200 mb-4">
                    Rare collectible item in excellent condition.
                </p>

                <div class="flex justify-between items-center text-gray-200">
                    <span class="text-lg">
                        Current Bid:
                        <span class="text-indigo-400 font-bold">$120</span>
                    </span>
                    <span class="badge badge-error badge-lg">
                        Ends in 02:14:33
                    </span>
                </div>
            </div>

            <!-- Bid Panel -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex flex-col">

                <h4 class="text-xl font-semibold text-white mb-4">
                    Place Your Bid
                </h4>

                <form class="space-y-4">
                    <input type="number"
                           min="121"
                           placeholder="Enter your bid amount"
                           class="input input-bordered w-full bg-white/20 text-white placeholder-gray-300">

                    <button type="submit" class="btn btn-primary w-full">
                        Submit Bid
                    </button>
                </form>

                <!-- Bid History -->
                <div class="mt-6">
                    <h5 class="text-lg font-semibold text-white mb-3">
                        Recent Bids
                    </h5>

                    <div class="space-y-3 max-h-48 overflow-y-auto pr-2">
                        <div class="flex justify-between bg-white/10 rounded-lg px-4 py-2 text-gray-200">
                            <span>User123</span>
                            <span>$120</span>
                        </div>
                        <div class="flex justify-between bg-white/10 rounded-lg px-4 py-2 text-gray-200">
                            <span>BidMaster</span>
                            <span>$115</span>
                        </div>
                        <div class="flex justify-between bg-white/10 rounded-lg px-4 py-2 text-gray-200">
                            <span>AuctionKing</span>
                            <span>$110</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

        <div class="overlay rounded-3xl p-8">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 text-center">Welcome to Biddie!</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 text-center">Browse auctions, trade items, or sell your own products securely.</p>

            <!-- Example grid for listings -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Example card -->
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:scale-105 transform transition duration-300">
                    <img class="w-full h-48 rounded-lg object-cover mb-4" src="https://via.placeholder.com/400x300" alt="Item">
                    <h2 class="text-xl font-semibold mb-2 text-white">Item Title</h2>
                    <p class="text-gray-200 mb-4">Current Bid: $120</p>
                    <a href="#" class="btn btn-primary w-full">Place Bid</a>
                </div>
                <!-- Repeat cards dynamically -->
            </div>
        </div>
    </main>

    <!-- Mobile Menu Script -->
    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
