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

    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');

    Route::get('/friends', [App\Http\Controllers\FriendController::class, 'index'])->name('friends.index');
    Route::post('/friends/request', [App\Http\Controllers\FriendController::class, 'sendRequest'])->name('friends.sendRequest');
    Route::post('/friends/respond', [App\Http\Controllers\FriendController::class, 'respond'])->name('friends.respond');
    Route::post('/friends/unfriend', [App\Http\Controllers\FriendController::class, 'unfriend'])->name('friends.unfriend');

    Route::get('/feed', [App\Http\Controllers\SocialController::class, 'feed'])->name('social.feed');
    Route::post('/feed/post', [App\Http\Controllers\SocialController::class, 'createPost'])->name('social.createPost');
    Route::post('/feed/{post}/like', [App\Http\Controllers\SocialController::class, 'like'])->name('social.like');
    Route::post('/feed/{post}/comment', [App\Http\Controllers\SocialController::class, 'comment'])->name('social.comment');
    Route::post('/feed/{post}/share', [App\Http\Controllers\SocialController::class, 'share'])->name('social.share');
});

Route::get('/homepage', [App\Http\Controllers\MainController::class, 'market'])->name('homepage');
Route::get('/shop', [App\Http\Controllers\MainController::class, 'market'])->name('shop');
Route::get('/bidding', [App\Http\Controllers\MainController::class, 'market'])->name('bidding');
Route::get('/about', [App\Http\Controllers\MainController::class, 'about'])->name('about');
Route::get('/contacts', [App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');
Route::get('/info', [App\Http\Controllers\MainController::class, 'about'])->name('info');

Route::middleware('auth')->group(function () {
    Route::get('/auctions/create', [App\Http\Controllers\AuctionController::class, 'create'])->name('auctions.create');
    Route::post('/auctions', [App\Http\Controllers\AuctionController::class, 'store'])->name('auctions.store');
});

Route::post('/support/chat', [App\Http\Controllers\SupportController::class, 'chat'])->name('support.chat');

require __DIR__ . '/auth.php';
