<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprunts = Emprunt::all();
        return view('admin.emprunts.index', compact('emprunts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprunt $emprunt)
{
    return view('admin.emprunts.show', compact('emprunt'));
}

    /**
     * Show the form for editing the specified resource.
     */
   
public function edit(Emprunt $emprunt)
    {
        return view('admin.emprunts.edit', compact('emprunt'));
        
    }

public function update(Request $request, $id)
{
    $request->validate([
        'date_reteure' => 'required|date|after_or_equal:date_emprunt',
    ]);

    $emprunt = Emprunt::findOrFail($id);
    $emprunt->date_reteure = $request->date_reteure;
    $emprunt->save();

    return redirect()->route('admin.emprunts.index')->with('success', 'Date de retour mise à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();

        return redirect()->route('admin.emprunts.index')->with('destroy', 'Emprunt supprimé avec succès.');
    }
}
