<?php
namespace App\Http\Controllers;
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
        return view('user/biddingarea');
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