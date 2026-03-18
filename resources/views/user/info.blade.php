@extends('layouts.main')

@section('title', 'About & Contact')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-10 max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold text-white mb-6">About & Contact</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white/10 p-6 rounded-2xl">
                    <h2 class="text-2xl font-semibold text-white mb-3">About Biddie</h2>
                    <p class="text-gray-200 mb-3">Biddie is an online auction platform where users can post items, bid and
                        interact in a social marketplace. Join our community to trade, follow, and message other sellers and
                        buyers.</p>
                </div>
                <div class="bg-white/10 p-6 rounded-2xl">
                    <h2 class="text-2xl font-semibold text-white mb-3">Contact Support</h2>
                    <p class="text-gray-200 mb-2">Send queries to:</p>
                    <a href="mailto:contact@biddie.com" class="text-indigo-200 hover:text-white">contact@biddie.com</a>
                    <p class="text-gray-200 mt-4">Or use quick help chat below.</p>
                    <div class="mt-3">
                        <input id="chat-input" type="text" placeholder="Ask about shipping, refunds, or bidding..."
                            class="input input-bordered w-full bg-black/20 text-white" disabled>
                        <p class="text-xs text-gray-400 mt-1">Live support chat is coming soon.</p>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('social.feed') }}" class="btn btn-primary">Go to Social Feed</a>
            </div>
        </div>
    </section>
@endsection