<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
     protected $table = 'category_books';

    protected $fillable = ['book_id', 'category_id'];
    use HasFactory;
}
