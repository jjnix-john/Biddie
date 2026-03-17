<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/homepage', [App\Http\Controllers\MainController::class, 'index'])->name('homepage');
Route::get('/shop', [App\Http\Controllers\MainController::class, 'shop'])->name('shop');
Route::get('/bidding', [App\Http\Controllers\MainController::class, 'bidding'])->name('bidding');
Route::get('/about', [App\Http\Controllers\MainController::class, 'about'])->name('about');
Route::get('/contacts', [App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');

Route::middleware('auth')->group(function () {
    Route::get('/auctions/create', [App\Http\Controllers\AuctionController::class, 'create'])->name('auctions.create');
    Route::post('/auctions', [App\Http\Controllers\AuctionController::class, 'store'])->name('auctions.store');
});

Route::post('/support/chat', [App\Http\Controllers\SupportController::class, 'chat'])->name('support.chat');

require __DIR__ . '/auth.php';
