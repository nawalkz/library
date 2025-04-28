<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;

class EditeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $editeurs = Editeur::all();
           return view('admin.editeurs.index', compact('editeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.editeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validated();
        Editeur::create($formFields);

        return redirect()->route('admin.editeurs.index')->with('success', 'editeur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Editeur $editeur)
    {
        return view('admin.editeurs.show', compact('editeur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $editeur = Editeur::findOrFail($id);
        return view('admin.editeurs.edit', compact('editeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editeur $editeur)
    {
        $formFields = $request->validated();
        $editeur->update($formFields);

        return redirect()->route('admin.editeurs.index')->with('success', 'editeur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $editeur = Editeur::findOrFail($id);
        $editeur->delete();  

        return redirect()->route('admin.editeurs.index')->with('success', 'editeur supprimé avec succès.');
    }
    
}
