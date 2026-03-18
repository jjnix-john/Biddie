<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pendingReceived = FriendRequest::where('receiver_id', $user->id)->where('status', 'pending')->get();
        $pendingSent = FriendRequest::where('sender_id', $user->id)->where('status', 'pending')->get();
        $friends = FriendRequest::where(function ($q) use ($user) {
            $q->where('sender_id', $user->id)->orWhere('receiver_id', $user->id);
        })->where('status', 'accepted')->get();

        $otherUsers = User::where('id', '!=', $user->id)->get();

        return view('user.friends', compact('pendingReceived', 'pendingSent', 'friends', 'otherUsers'));
    }

    public function sendRequest(Request $request)
    {
        $user = Auth::user();

        $request->validate(['receiver_id' => 'required|exists:users,id']);

        $receiverId = $request->input('receiver_id');

        if ($receiverId == $user->id) {
            return back()->withErrors(['receiver_id' => 'Cannot send a friend request to yourself.']);
        }

        FriendRequest::updateOrCreate(
            ['sender_id' => $user->id, 'receiver_id' => $receiverId],
            ['status' => 'pending']
        );

        return back()->with('success', 'Friend request sent.');
    }

    public function respond(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'request_id' => 'required|exists:friend_requests,id',
            'action' => 'required|in:accept,reject',
        ]);

        $friendRequest = FriendRequest::findOrFail($request->input('request_id'));

        if ($friendRequest->receiver_id !== $user->id) {
            abort(403);
        }

        $friendRequest->status = $request->input('action') === 'accept' ? 'accepted' : 'rejected';
        $friendRequest->save();

        if ($friendRequest->status === 'accepted') {
            Follow::firstOrCreate(['follower_id' => $friendRequest->sender_id, 'followee_id' => $friendRequest->receiver_id]);
            Follow::firstOrCreate(['follower_id' => $friendRequest->receiver_id, 'followee_id' => $friendRequest->sender_id]);
        }

        return back()->with('success', 'Friend request ' . $friendRequest->status . '.');
    }

    public function unfriend(Request $request)
    {
        $user = Auth::user();

        $request->validate(['friend_id' => 'required|exists:users,id']);

        $friendId = $request->input('friend_id');

        FriendRequest::where(function ($q) use ($user, $friendId) {
            $q->where('sender_id', $user->id)->where('receiver_id', $friendId);
        })->orWhere(function ($q) use ($user, $friendId) {
            $q->where('sender_id', $friendId)->where('receiver_id', $user->id);
        })->delete();

        Follow::where('follower_id', $user->id)->where('followee_id', $friendId)->delete();
        Follow::where('follower_id', $friendId)->where('followee_id', $user->id)->delete();

        return back()->with('success', 'Friend removed.');
    }
}
