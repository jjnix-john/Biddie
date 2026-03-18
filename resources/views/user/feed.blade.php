@extends('layouts.main')

@section('title', 'Social Feed')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-6 max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-4">Social Feed</h1>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('social.createPost') }}" class="mb-6">
                @csrf
                <textarea name="content" rows="3" placeholder="What's on your mind?"
                    class="textarea textarea-bordered w-full bg-black/20 text-white"
                    required>{{ old('content') }}</textarea>
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
                @error('content')<p class="text-red-400 text-sm">{{ $message }}</p>@enderror
            </form>

            <div class="space-y-5">
                @forelse($posts as $post)
                    <div class="bg-white/10 rounded-xl p-4">
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <strong class="text-lg text-white">{{ $post->user->name }}</strong>
                                <span class="text-xs text-gray-300">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <span class="text-xs text-indigo-200">{{ $post->likes->count() }} likes •
                                {{ $post->shares->count() }} shares</span>
                        </div>
                        <div class="mb-3 text-gray-100">{{ $post->content }}</div>

                        <div class="flex gap-2 mb-3">
                            <form method="POST" action="{{ route('social.like', $post) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-ghost">Like</button>
                            </form>
                            <form method="POST" action="{{ route('social.share', $post) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-ghost">Share</button>
                            </form>
                        </div>

                        <div class="space-y-2">
                            @foreach($post->comments as $comment)
                                <div class="bg-black/30 p-2 rounded-md">
                                    <span class="text-sm text-gray-200"><strong>{{ $comment->user->name }}:</strong>
                                        {{ $comment->content }}</span>
                                </div>
                            @endforeach
                        </div>

                        <form method="POST" action="{{ route('social.comment', $post) }}" class="mt-3">
                            @csrf
                            <div class="flex gap-2">
                                <input type="text" name="content" placeholder="Add a comment..."
                                    class="input input-bordered w-full bg-black/20 text-white" required>
                                <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                            </div>
                        </form>
                    </div>
                @empty
                    <div class="text-gray-200">No posts yet. Create the first post!</div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection