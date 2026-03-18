<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $otherUsers = User::where('id', '!=', $user->id)->orderBy('name')->get();
        $selectedUser = null;

        if ($request->filled('user')) {
            $selectedUser = $otherUsers->where('id', $request->input('user'))->first();
        }

        if (!$selectedUser) {
            $selectedUser = $otherUsers->first();
        }

        $messages = collect();
        $unreadCounts = [];

        foreach ($otherUsers as $other) {
            $unreadCounts[$other->id] = Message::where('sender_id', $other->id)
                ->where('receiver_id', $user->id)
                ->whereNull('read_at')
                ->count();
        }

        if ($selectedUser) {
            $messages = Message::where(function ($q) use ($user, $selectedUser) {
                $q->where('sender_id', $user->id)->where('receiver_id', $selectedUser->id);
            })->orWhere(function ($q) use ($user, $selectedUser) {
                $q->where('sender_id', $selectedUser->id)->where('receiver_id', $user->id);
            })->orderBy('created_at')->get();

            // mark unread messages as read for current user
            Message::where('sender_id', $selectedUser->id)
                ->where('receiver_id', $user->id)
                ->whereNull('read_at')
                ->update(['read_at' => now()]);

            $unreadCounts[$selectedUser->id] = 0;
        }

        return view('user.messages', compact('otherUsers', 'selectedUser', 'messages', 'unreadCounts'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'body' => 'required|string|max:1000',
        ]);

        if ($data['receiver_id'] == $user->id) {
            return back()->withErrors(['receiver_id' => 'You cannot send a message to yourself.']);
        }

        Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $data['receiver_id'],
            'body' => $data['body'],
        ]);

        return redirect()->route('messages.index', ['user' => $data['receiver_id']])
            ->with('success', 'Message sent.');
    }
}
