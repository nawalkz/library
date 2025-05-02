<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use App\Models\Editeur;
use App\Models\Auteur;
use App\Models\Categorie;
use App\Http\Requests\StoreLivreRequest;
use App\Http\Requests\UpdateLivreRequest;


class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $livres = Livre::paginate(10);
       return view('admin.livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.livres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivreRequest $request)
{
   
    $formFields = $request->validated();

    if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('livres', 'public');
    }

    Livre::create($formFields);

    return redirect()->route('admin.livres.index')->with('success', 'Livre ajouté avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        return view('admin.livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        return view('admin.livres.edit', compact('livre'));
        
    }

    /**
     * Update the specified resource in storage.
     */
   

    public function update(UpdateLivreRequest $request, Livre $livre)
{  
    $formFields = $request->validated();
    
    if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('livres', 'public');
    }

    $livre->update($formFields);

    return redirect()->route('admin.livres.index')->with('update', 'Livre mis à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
       
        $livre->delete();

        return redirect()->route('admin.livres.index')->with('destroy', 'Livre supprimé avec succès.');
    }
    
}
