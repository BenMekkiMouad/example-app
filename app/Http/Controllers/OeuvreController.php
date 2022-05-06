<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Oeuvre;
use App\Http\Requests\StoreOeuvreRequest;
use App\Http\Requests\UpdateOeuvreRequest;

class OeuvreController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oeuvre =new Oeuvre;
        $oeuvre =  $oeuvre::all();
       // return $oeuvre;
       //return view('admin.admin')->with('oeuvre', $oeuvre);
        return view('admin.admin', compact('oeuvre'));
      
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOeuvreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOeuvreRequest $request)
    {
        
  
         $ouvrage = new Oeuvre;

        $ouvrage->titre = $request->input('titre');
        $ouvrage->auteur = $request->input('auteur');
        $ouvrage->annee = $request->input('annee');
        $ouvrage->description = $request->input('description');
        $ouvrage->qt = $request->input('qt');
        $ouvrage->save();
        session()->flash('success','Le Livre a été bien enregistré');
        return redirect('Oeuvre/create');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oeuvre  $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function show(Oeuvre $oeuvre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oeuvre  $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function edit(Oeuvre $oeuvre)
    {
        return view ('admin.operations.edit')->with('oeuvre', $oeuvre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOeuvreRequest  $request
     * @param  \App\Models\Oeuvre  $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOeuvreRequest $request, Oeuvre $oeuvre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oeuvre  $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oeuvre $oeuvre,$id)
    {  
        $oeuvre = Oeuvre::find($id);

       $oeuvre->delete();
       return redirect()->back();
    }
}
