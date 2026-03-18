@extends('layouts.main')

@section('title', 'Messages')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-6 max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-6">Messages</h1>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1 bg-white/10 p-4 rounded-xl">
                    <h2 class="text-xl font-semibold">Contacts</h2>
                    <ul class="mt-4 space-y-2">
                        @forelse($otherUsers as $other)
                            <li>
                                <a href="{{ route('messages.index', ['user' => $other->id]) }}"
                                    class="flex justify-between items-center p-3 rounded-lg hover:bg-white/10 {{ optional($selectedUser)->id === $other->id ? 'bg-white/15' : '' }}">
                                    <span>{{ $other->name }}</span>
                                    @php
                                        $unread = $unreadCounts[$other->id] ?? 0;
                                    @endphp
                                    @if($unread > 0)
                                        <span class="badge badge-info">{{ $unread }}</span>
                                    @endif
                                </a>
                            </li>
                        @empty
                            <li class="text-gray-300">No other users found.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="lg:col-span-2 bg-white/10 p-4 rounded-xl">
                    @if(!$selectedUser)
                        <div class="text-gray-200">Select a contact to start messaging.</div>
                    @else
                        <h2 class="text-xl font-semibold mb-4">Conversation with {{ $selectedUser->name }}</h2>

                        <div class="space-y-3 max-h-[60vh] overflow-y-auto mb-4">
                            @forelse($messages as $message)
                                <div
                                    class="p-3 rounded-lg {{ $message->sender_id === auth()->id() ? 'bg-indigo-600 text-white ml-auto' : 'bg-white/20 text-white' }} max-w-[80%]">
                                    <div class="text-sm text-gray-200 mb-1">{{ $message->sender->name }} •
                                        {{ $message->created_at->diffForHumans() }}</div>
                                    <div>{{ $message->body }}</div>
                                </div>
                            @empty
                                <div class="text-gray-200">No messages yet. Say hello!</div>
                            @endforelse
                        </div>

                        <form action="{{ route('messages.store') }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $selectedUser->id }}">

                            <textarea name="body" rows="3" placeholder="Type your message..."
                                class="textarea textarea-bordered w-full bg-black/20 text-white"
                                required>{{ old('body') }}</textarea>
                            @error('body')
                                <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection