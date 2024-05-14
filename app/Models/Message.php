<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'contacts'; // Specify the table name

    protected $fillable = [
        'name',
        'email',
        'number',
        'message',
        'user_id',
    ];

    public $timestamps = true; // Enable automatic handling of created_at and updated_at timestamps
}
