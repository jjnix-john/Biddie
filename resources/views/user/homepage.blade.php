@extends('layouts.main')

@section('title', 'Biddie - Home')

@section('content')
    <section class="mt-8 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-8 max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-white mb-8">Live Auction</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <img src="https://via.placeholder.com/600x400" class="w-full h-64 object-cover rounded-xl mb-4"
                        alt="Auction Item">

                    <h3 class="text-2xl font-semibold text-white mb-2">Vintage Headphones</h3>

                    <p class="text-gray-200 mb-4">Rare collectible item in excellent condition.</p>

                    <div class="flex justify-between items-center text-gray-200">
                        <span class="text-lg">Current Bid:
                            <span class="text-indigo-400 font-bold">$120</span>
                        </span>
                        <span class="badge badge-error badge-lg">Ends in 02:14:33</span>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex flex-col">
                    <h4 class="text-xl font-semibold text-white mb-4">Place Your Bid</h4>

                    <form class="space-y-4">
                        <input type="number" min="121" placeholder="Enter your bid amount"
                            class="input input-bordered w-full bg-white/20 text-white placeholder-gray-300">

                        <button type="submit" class="btn btn-primary w-full">Submit Bid</button>
                    </form>

                    <div class="mt-6">
                        <h5 class="text-lg font-semibold text-white mb-3">Recent Bids</h5>
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

        <div class="overlay rounded-3xl p-8 mt-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 text-center">Welcome to Biddie!</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 text-center">Browse auctions, trade items, or sell your own
                products securely.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:scale-105 transform transition duration-300">
                    <img class="w-full h-48 rounded-lg object-cover mb-4" src="https://via.placeholder.com/400x300"
                        alt="Item">
                    <h2 class="text-xl font-semibold mb-2 text-white">Item Title</h2>
                    <p class="text-gray-200 mb-4">Current Bid: $120</p>
                    <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place Bid</a>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:scale-105 transform transition duration-300">
                    <img class="w-full h-48 rounded-lg object-cover mb-4" src="https://via.placeholder.com/400x300"
                        alt="Item">
                    <h2 class="text-xl font-semibold mb-2 text-white">Item Title</h2>
                    <p class="text-gray-200 mb-4">Current Bid: $90</p>
                    <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place Bid</a>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:scale-105 transform transition duration-300">
                    <img class="w-full h-48 rounded-lg object-cover mb-4" src="https://via.placeholder.com/400x300"
                        alt="Item">
                    <h2 class="text-xl font-semibold mb-2 text-white">Item Title</h2>
                    <p class="text-gray-200 mb-4">Current Bid: $75</p>
                    <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place Bid</a>
                </div>
            </div>
        </div>
    </section>
@endsection