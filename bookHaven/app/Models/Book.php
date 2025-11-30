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
        'add_by_user_id',
        'currently_reading_user_id',
    ];

    // Relationship

    //The user who added the book
    public function creator()
    {
        return $this->belongsTo(User::class, 'add_by_user_id');
    }

    // The user who is currently reding the book
    public function currentReader()
    {
        return $this->belongsTo(User::class, 'currently_reading_user_id');
    }
}
