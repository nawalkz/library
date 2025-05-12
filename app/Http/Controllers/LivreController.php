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
    
    public function search(Request $request)
{
    $query = Livre::query();

    if ($request->has('categorie_id') && !empty($request->categorie_id)) {
        $query->where('categorie_id', $request->categorie_id);
    }

    if ($request->has('auteur_id') && !empty($request->auteur_id)) {
        $query->where('auteur_id', $request->auteur_id);
    }

    if ($request->has('titre') && !empty($request->titre)) {
        $query->where('titre', 'like', '%' . $request->titre . '%');
    }

    $livres = $query->paginate(12)->appends($request->query());

    return response()->json([
        'livres' => view('users.livres.livre_partial', compact('livres'))->render()
    ]);
}


    /**
     * Search for a book by category.
     */

     public function autocompleteTitre(Request $request)
{
    $term = $request->get('term');
    $results = Livre::where('titre', 'LIKE', '%' . $term . '%')
        ->select('id', 'titre as value') // 'value' هو لي كيتعرض فـ jQuery UI
        ->get();

    return response()->json($results);
}
public function autocompleteAuteur(Request $request)
{
    $term = $request->get('term');
    $results = Auteur::where('auteur', 'LIKE', '%' . $term . '%')
        ->select('id', 'auteur as value')
        ->get();

    return response()->json($results);
}
public function livreMedia(Request $request)
{
    $query = Livre::with(['auteur', 'categorie']);

    // Filters إذا كانو
    if ($request->filled('titre')) {
        $query->where('titre', 'like', '%' . $request->titre . '%');
    }

    if ($request->filled('auteur_id')) {
        $query->where('auteur_id', $request->auteur_id);
    }

    if ($request->filled('categorie_id')) {
        $query->where('categorie_id', $request->categorie_id);
    }

    $livres = $query->paginate(12);

    // هاد الشرط خاص باش يرجع فقط جزء الصفحة
    if ($request->ajax()) {
        return response()->json([
            'livres' => view('partials.livres', compact('livres'))->render()
        ]);
    }

    // الصفحة كاملة
    return view('users.livres.livre_media', compact('livres'));
}

}



