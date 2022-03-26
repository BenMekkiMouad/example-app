<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    use HasFactory;
}
