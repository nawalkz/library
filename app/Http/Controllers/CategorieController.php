<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all(); 

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        $formFields = $request->validated();
       Categorie::create($formFields);

        return redirect()->route('admin.categories.index')->with('success', 'categorie ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return view('admin.categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie,$id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $formFields = $request->validated();
        $categorie->update($formFields);

        return redirect()->route('admin.categories.index')->with('success', 'categorie mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie,$id)
    {
        $categorie=Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.categories.index')->with('success', 'categorie supprimé avec succès.');
    }
    
}
