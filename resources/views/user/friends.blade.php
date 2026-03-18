@extends('layouts.main')

@section('title', 'Friends')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-6 max-w-5xl mx-auto">
            <h1 class="text-3xl font-bold mb-4">Friends & Connections</h1>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white/10 p-4 rounded-xl">
                    <h2 class="text-xl font-semibold">People you may know</h2>
                    <form method="POST" action="{{ route('friends.sendRequest') }}" class="space-y-3 mt-3">
                        @csrf
                        <div class="flex gap-2">
                            <select name="receiver_id" class="select select-bordered w-full bg-black/20 text-white">
                                @foreach($otherUsers as $other)
                                    <option value="{{ $other->id }}">{{ $other->name }} ({{ $other->email }})</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                </div>

                <div class="bg-white/10 p-4 rounded-xl">
                    <h2 class="text-xl font-semibold">Friend requests</h2>
                    <div class="mt-3 space-y-3">
                        @forelse($pendingReceived as $req)
                            <div class="p-3 rounded-lg bg-white/10 flex justify-between items-center">
                                <span>{{ $req->sender->name }} wants to connect.</span>
                                <form method="POST" action="{{ route('friends.respond') }}" class="flex gap-2">
                                    @csrf
                                    <input type="hidden" name="request_id" value="{{ $req->id }}">
                                    <button name="action" value="accept" class="btn btn-sm btn-success">Accept</button>
                                    <button name="action" value="reject" class="btn btn-sm btn-error">Reject</button>
                                </form>
                            </div>
                        @empty
                            <div class="text-gray-300">No incoming requests.</div>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white/10 p-4 rounded-xl lg:col-span-2">
                    <h2 class="text-xl font-semibold mb-3">Friends</h2>
                    <ul class="space-y-2">
                        @forelse($friends as $friend)
                            @php
                                $friendUser = $friend->sender_id === auth()->id() ? $friend->receiver : $friend->sender;
                            @endphp
                            <li class="p-3 rounded-lg bg-white/10 flex justify-between items-center">
                                <span>{{ $friendUser->name }}</span>
                                <form method="POST" action="{{ route('friends.unfriend') }}">
                                    @csrf
                                    <input type="hidden" name="friend_id" value="{{ $friendUser->id }}">
                                    <button type="submit" class="btn btn-sm btn-secondary">Unfriend</button>
                                </form>
                            </li>
                        @empty
                            <li class="text-gray-300">No friends yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection