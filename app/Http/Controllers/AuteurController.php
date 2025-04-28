<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $auteurs = Auteur::all();
           return view('admin.auteurs.index', compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.auteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validated();
        Auteur::create($formFields);

        return redirect()->route('admin.auteurs.index')->with('success', 'auteur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auteur $auteur)
    {
        return view('admin.auteurs.show', compact('auteur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur $auteur,$id)
    {
        $auteur= Auteur::findOrFail($id);
        return view('admin.auteurs.edit', compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auteur $auteur)
    {
        $formFields = $request->validated();
        $auteur->update($formFields);

        return redirect()->route('admin.auteurs.index')->with('success', 'auteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auteur $auteur,$id)
    {
        $auteur= Auteur::findOrFail($id);
        $auteur->delete();

        return redirect()->route('admin.auteurs.index')->with('success', 'auteur supprimé avec succès.');
    }
    
}
