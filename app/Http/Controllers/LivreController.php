<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use App\Models\Editeur;
use App\Models\Auteur;
use App\Models\Categorie;


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
    public function store(Request $request)
    {
        $formFields = $request->validated();
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
    public function update(Request $request, Livre $livre)
    {
        $formFields = $request->validated();
        $livre->update($formFields);

        return redirect()->route('admin.livres.index')->with('success', 'Livre mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre,$id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('admin.livres.index')->with('success', 'Livre supprimé avec succès.');
    }
    
}
