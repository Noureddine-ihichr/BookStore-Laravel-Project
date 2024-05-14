<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'number', 'email', 'method', 'address', 'total_products', 'total_price', 'placed_on', 'payment_status'
    ];

    // Assuming 'created_at' and 'updated_at' columns exist in your 'orders' table
    // If you want to disable timestamps for this model, you can set $timestamps to false
    // public $timestamps = false;
}
