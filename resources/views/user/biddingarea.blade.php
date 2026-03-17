@extends('layouts.main')

@section('title', 'Bidding Area')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-10 max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-white">Bidding Area</h1>
                    <p class="text-gray-200">Place bids on items or list your own item for auction.</p>
                </div>
                @auth
                    <a href="{{ route('auctions.create') }}" class="btn btn-primary mt-4 md:mt-0">Add Your Item</a>
                @endauth
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($auctions ?? [] as $auction)
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                        <h2 class="text-2xl font-semibold text-white mb-2">{{ $auction->title }}</h2>
                        <p class="text-gray-200 mb-3">{{ Str::limit($auction->description, 110, '...') }}</p>
                        <div class="flex justify-between items-center mb-4 text-gray-200">
                            <span>Current Bid: <span
                                    class="text-indigo-300 font-bold">${{ number_format($auction->current_price, 2) }}</span></span>
                            <span class="badge badge-info">Ends:
                                {{ optional($auction->end_time)->diffForHumans() ?? 'N/A' }}</span>
                        </div>
                        <form class="space-y-3">
                            <input type="number" name="bid" placeholder="Your bid"
                                class="input input-bordered w-full bg-white/20 text-white"
                                min="{{ $auction->current_price + 1 }}">
                            <button type="submit" class="btn btn-primary w-full">Place Bid</button>
                        </form>
                    </div>
                @empty
                    <div class="col-span-full bg-white/10 backdrop-blur-md rounded-2xl p-6 text-gray-200">
                        No active auctions found. Add your item to launch a new auction now.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection