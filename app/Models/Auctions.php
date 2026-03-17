<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    /** @use HasFactory<\Database\Factories\AuctionsFactory> */
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'category_id',
        'title',
        'description',
        'starting_price',
        'current_price',
        'start_time',
        'end_time',
        'status',
    ];
}
