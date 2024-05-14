<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid; // Import the UUID class

class Cart extends Model
{
    public $incrementing = false; // Disable auto-incrementing for UUID

    protected $keyType = 'string'; // Specify primary key type as string (UUID)

    protected $table = 'cart';

    public $timestamps = false;


    

    protected $fillable = [
        'id', // Include 'id' in fillable array to allow mass assignment
        'user_id',
        'name',
        'price',
        'image',
        'quantity',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for 'id' field before saving new model instance
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString(); // Generate UUID
        });
        
    }
    

    // Your model relationships and other methods go here
}


