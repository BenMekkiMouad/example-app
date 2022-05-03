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
 
    /*CRUD */
    public function create(){
        
        return view('ouvrage.create');
    }
    public function store(livreRequest $request){
        $ouvrage = new Ouvrage();

        $ouvrage->title = $request->input('title');
        $ouvrage->filiere = $request->input('filiere');
        $ouvrage->descr = $request->input('descr');

        $ouvrage->auteur = $request->input('auteur');
        $ouvrage->editeur = $request->input('editeur');
        $ouvrage->edition = $request->input('edition');
        $ouvrage->user_id = Auth::user()->id;
        
        if ($request->file('photo') == null) {
            $file = "";
        }else{
           $file = $request->file('photo')->store('images');  
        }
       
        Image::make($request->file('photo')->getRealPath());

        $ouvrage->photo=$file;
        $ouvrage->save();
        session()->flash('success','Le Livre a été bien enregistré');
        return redirect('ouvrages');
    }
    public function edit($id){
       
        $ouvrage = Ouvrage::find($id);
        $this->authorize('update',$ouvrage);
        return view('ouvrage.edit',['ouvrage' => $ouvrage]);

        
    }
    public function update(livreRequest $request,Ouvrage $ouvrage){
        // dd($ouvrage);
        // $ouvrage = Ouvrage::find($id);
        $ouvrage->title = $request->input('title');
        $ouvrage->auteur = $request->input('auteur');
        // $ouvrage->photo = $request->input('photo');
        if ($request->file('photo') != null) {
           
           $ouvrage->photo = $request->file('photo')->store('images');  
        }
        $ouvrage->editeur = $request->input('editeur');
        $ouvrage->edition = $request->input('edition');

        $ouvrage->filiere = $request->input('filiere');

        $ouvrage->save();
        return redirect('ouvrages');
    }
    public function destroy(Request $request,$id){
        $ouvrage=Ouvrage::find($id);
        // dd($livre);
        $ouvrage->delete();
        return redirect('ouvrages');
    }
    public function show($id){
        $ouvrage = Ouvrage::findOrFail($id);
        return view('ouvrage.show',['id' => $id],compact('ouvrage'));
    }
    

}


