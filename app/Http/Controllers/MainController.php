<?php
namespace App\Http\Controllers;
use App\Models\Auctions;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function market()
    {
        $auctions = Auctions::where('status', 'active')->orderBy('end_time')->limit(12)->get();
        return view('user/market', compact('auctions'));
    }

    public function about()
    {
        return view('user/info');
    }

    public function contacts()
    {
        return view('user/info');
    }
}