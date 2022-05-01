<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(Request $request)
    {
         $books= Book::paginate(3);
         $categories = Category::where('is_online',1)->get();

         return view('books', compact('books','categories'));
    }

    public function bookdetails(Request $request){

        $book= Book::find($request->id);
        return view('bookdetails', compact('book'));
    }
   
    public function viewByCategory(Request $request){

        $books= Book::where('category_id', $request->id)->paginate(3);
       $categories= Category::all();
         return view('books', compact('books','categories'));
    }
}

