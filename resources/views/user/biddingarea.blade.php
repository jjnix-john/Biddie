@extends('layouts.main')

@section('title', 'Bidding Area')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-10 max-w-5xl mx-auto">
            <h1 class="text-4xl font-bold text-white mb-6">Bidding Area</h1>
            <p class="text-gray-200 mb-8">Here you can place your bids on various items. Select a listing below to start
                bidding.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <h2 class="text-2xl font-semibold text-white mb-3">Vintage Watch</h2>
                    <p class="text-gray-200 mb-4">Classic timepiece in excellent condition.</p>
                    <div class="flex justify-between items-center mb-4 text-gray-200">
                        <span>Current Bid: <span class="text-indigo-300 font-bold">$220</span></span>
                        <span class="badge badge-info">Ends in 01:45:12</span>
                    </div>
                    <form class="space-y-3">
                        <input type="number" placeholder="Your bid"
                            class="input input-bordered w-full bg-white/20 text-white" min="221">
                        <button type="submit" class="btn btn-primary w-full">Place Bid</button>
                    </form>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <h2 class="text-2xl font-semibold text-white mb-3">Collector's Coin</h2>
                    <p class="text-gray-200 mb-4">Rare coin from 1952 with certificate of authenticity.</p>
                    <div class="flex justify-between items-center mb-4 text-gray-200">
                        <span>Current Bid: <span class="text-indigo-300 font-bold">$95</span></span>
                        <span class="badge badge-info">Ends in 03:20:10</span>
                    </div>
                    <form class="space-y-3">
                        <input type="number" placeholder="Your bid"
                            class="input input-bordered w-full bg-white/20 text-white" min="96">
                        <button type="submit" class="btn btn-primary w-full">Place Bid</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection