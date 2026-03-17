<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function create()
    {
        return view('user.auctions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'starting_price' => 'required|numeric|min:0.01',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
        ]);

        $auction = Auctions::create([
            'seller_id' => Auth::id(),
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'starting_price' => $data['starting_price'],
            'current_price' => $data['starting_price'],
            'start_time' => $data['start_time'] ?? now(),
            'end_time' => $data['end_time'] ?? now()->addDays(7),
            'status' => 'active',
        ]);

        return redirect()->route('bidding')->with('success', 'Auction item created successfully.');
    }
}
