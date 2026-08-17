<?php

namespace App\Models;
use App\Http\Controllers\BooksController;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'rating',
        'publish',
    ];
}

