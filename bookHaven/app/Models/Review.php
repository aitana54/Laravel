<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'content',
        'rating',
        'book_id',
        'user_id',
    ];
}
