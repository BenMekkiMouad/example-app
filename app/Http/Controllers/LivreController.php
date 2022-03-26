<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $books= Book::inRandomOrder()->take(5)->get();
        $categories = Category::all();

        return view('books')->with(['books'=> $books,'categories'=>$categories,]);
        //$arr=Array('books'=>$books);
        // return view('books',$arr);
    }
}
