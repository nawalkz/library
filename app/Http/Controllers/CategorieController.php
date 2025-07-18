<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategorieRequest;

class CategorieController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::paginate(10); 

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
    public function edit(Categorie $categorie)
{
    return view('admin.categories.edit', compact('categorie'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $formFields = $request->validated();
        $categorie->update($formFields);

        return redirect()->route('admin.categories.index')->with('update', 'categorie mis à jour avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
       
        $categorie->delete();

        return redirect()->route('admin.categories.index')->with('destroy', 'categorie supprimé avec succès.');
    }
    
}
