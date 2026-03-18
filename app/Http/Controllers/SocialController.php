<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function feed()
    {
        $user = Auth::user();

        $followedIds = Follow::where('follower_id', $user->id)->pluck('followee_id')->toArray();
        $followedIds[] = $user->id;

        $posts = Post::with('user', 'comments.user', 'likes', 'shares')
            ->whereIn('user_id', $followedIds)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.feed', compact('posts'));
    }

    public function createPost(Request $request)
    {
        $request->validate(['content' => 'required|string|max:1000']);

        Post::create(['user_id' => Auth::id(), 'content' => $request->input('content')]);

        return back()->with('success', 'Post created.');
    }

    public function like(Request $request, Post $post)
    {
        $user = Auth::user();

        Like::firstOrCreate([
            'user_id' => $user->id,
            'likeable_type' => Post::class,
            'likeable_id' => $post->id,
        ]);

        return back();
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate(['content' => 'required|string|max:500']);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        return back();
    }

    public function share(Post $post)
    {
        Share::firstOrCreate(['user_id' => Auth::id(), 'post_id' => $post->id]);

        return back()->with('success', 'Post shared.');
    }
}
