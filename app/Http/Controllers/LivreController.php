<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(Request $request)
    {
         $books= Book::all();
         $categories = Category::where('is_online',1)->get();

         return view('books', compact('books','categories'));
    }
   
    public function viewByCategory(Request $request){

        $books= Book::where('category_id', $request->id)->get();
       $categories= Category::all();
         return view('books', compact('books','categories'));
    }
}

