<?php
namespace App\Http\Controllers;
use App\Models\Auctions;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function index()
    {
        return view('user/homepage');
    }

    public function shop()
    {
        return view('user/shop');
    }

    public function bidding()
    {
        $auctions = Auctions::where('status', 'active')->orderBy('end_time')->limit(12)->get();
        return view('user/biddingarea', compact('auctions'));
    }

    public function about()
    {
        return view('user/about');
    }

    public function contacts()
    {
        return view('user/contacts');
    }
}