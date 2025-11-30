<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Massive assignable fields
    protected $fillable = [
        'title',
        'author',
        'genre',
        'total_pages',
        'status',
        'summary',
        'added_by_user_id',
        'currently_reading_user_id',
    ];
}
