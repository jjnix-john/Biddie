@extends('layouts.main')

@section('title', 'Shop')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-10 max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-4xl font-bold text-white">Shop</h1>
                    <p class="text-gray-200 mt-2">Browse listings and discover items available for auction or sale.</p>
                </div>
                <a href="{{ route('bidding') }}" class="btn btn-primary">Go to Bidding Area</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400x300"
                        alt="Item">
                    <h2 class="text-xl font-semibold text-white mb-2">Retro Gaming Console</h2>
                    <p class="text-gray-200 mb-4">A classic console bundle with controllers and games.</p>
                    <div class="flex items-center justify-between text-gray-200 mb-4">
                        <span class="font-semibold">Starting Bid:</span>
                        <span class="text-indigo-300 font-bold">$75</span>
                    </div>
                    <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place a Bid</a>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400x300"
                        alt="Item">
                    <h2 class="text-xl font-semibold text-white mb-2">Designer Sneakers</h2>
                    <p class="text-gray-200 mb-4">Limited edition sneakers in mint condition.</p>
                    <div class="flex items-center justify-between text-gray-200 mb-4">
                        <span class="font-semibold">Starting Bid:</span>
                        <span class="text-indigo-300 font-bold">$140</span>
                    </div>
                    <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place a Bid</a>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400x300"
                        alt="Item">
                    <h2 class="text-xl font-semibold text-white mb-2">Antique Vase</h2>
                    <p class="text-gray-200 mb-4">Beautiful hand-painted vase with intricate design.</p>
                    <div class="flex items-center justify-between text-gray-200 mb-4">
                        <span class="font-semibold">Starting Bid:</span>
                        <span class="text-indigo-300 font-bold">$55</span>
                    </div>
                    <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place a Bid</a>
                </div>
            </div>
        </div>
    </section>
@endsection