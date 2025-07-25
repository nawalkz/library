<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEditeurRequest;
use App\Http\Requests\UpdateEditeurRequest;

class EditeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $editeurs = Editeur::paginate(10);
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
    public function store(StoreEditeurRequest $request)
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
    public function edit(Editeur $editeur)

    {
        return view('admin.editeurs.edit', compact('editeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEditeurRequest $request, Editeur $editeur)
    {
        $formFields = $request->validated();
        $editeur->update($formFields);

        return redirect()->route('admin.editeurs.index')->with('update', 'editeur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editeur $editeur)
    {
    
        $editeur->delete();  

        return redirect()->route('admin.editeurs.index')->with('destroy', 'editeur supprimé avec succès.');
    }
    
}
