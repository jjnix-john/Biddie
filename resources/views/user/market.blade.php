@extends('layouts.main')

@section('title', 'Biddie Market')

@section('content')
    <section class="mt-8 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-8 max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h1 class="text-4xl font-bold text-white">Biddie Market</h1>
                    <p class="text-gray-200 mt-2">Browse auctions, bid on items, and join the social trade community.</p>
                </div>
                <a href="{{ route('messages.index') }}" class="btn btn-secondary">Go to messages</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                @forelse($auctions as $auction)
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                        <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400x300"
                            alt="Auction item">
                        <h2 class="text-xl font-semibold text-white mb-2">{{ $auction->title }}</h2>
                        <p class="text-gray-200 mb-4">{{ Str::limit($auction->description, 90, '...') }}</p>
                        <div class="flex items-center justify-between text-gray-200 mb-4">
                            <span>Current Bid: <strong
                                    class="text-indigo-300">${{ number_format($auction->current_price, 2) }}</strong></span>
                            <span class="badge badge-info">{{ optional($auction->end_time)->diffForHumans() ?? 'N/A' }}</span>
                        </div>
                        <a href="{{ route('bidding') }}" class="btn btn-primary w-full">Place Bid</a>
                    </div>
                @empty
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-gray-200 col-span-full">
                        No active auctions at the moment. Check back soon!
                    </div>
                @endforelse
            </div>

            <div class="overlay rounded-3xl p-6">
                <h2 class="text-3xl font-bold text-white mb-4">Featured Community</h2>
                <p class="text-gray-200 mb-4">Participate in the social feed, follow friends and share your auction finds.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('social.feed') }}" class="btn btn-primary">Open Feed</a>
                    <a href="{{ route('friends.index') }}" class="btn btn-secondary">Manage Friends</a>
                </div>
            </div>
        </div>
    </section>
@endsection