<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }

    protected $fillable = [
        'name',
        'price',
        'image',
    ];

    // Optional: If you want to cast 'price' attribute to a specific type
    protected $casts = [
        'price' => 'decimal:2', // Cast 'price' to decimal with 2 decimal places
    ];
}
