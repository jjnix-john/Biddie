<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function chat(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = strtolower($data['message']);

        $responses = [
            'shipping' => 'Our typical shipping time is 3-5 business days. Can I help you with tracking a specific order?',
            'refund' => 'Refunds are processed in 5-7 business days after the return is received. Please provide your auction ID.',
            'price' => 'Prices are based on current bids and listing details. Let me know the item name or auction ID.',
            'account' => 'You can update your profile from the My Profile page. Need help with your password or 2FA?',
            'default' => 'I am here to help! Tell me more about your issue (shipping, refund, account, bidding).',
        ];

        foreach (['shipping', 'refund', 'price', 'account', 'bid', 'payment'] as $keyword) {
            if (str_contains($message, $keyword)) {
                return response()->json(['reply' => $responses[$keyword] ?? $responses['default']]);
            }
        }

        return response()->json(['reply' => $responses['default']]);
    }
}
