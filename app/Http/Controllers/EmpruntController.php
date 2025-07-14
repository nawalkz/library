<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprunts = Emprunt::orderBy('id', 'desc')->paginate(10);

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
        'date_retour_reelle' => 'required|date|after_or_equal:date_emprunt',
        'etat_livre' => 'required|string',
        'observation' => 'nullable|string',
    ]);

    $emprunt = Emprunt::findOrFail($id);
    $emprunt->date_retour_reelle = $request->date_retour_reelle;
    $emprunt->etat_livre = $request->etat_livre;
    $emprunt->observation = $request->observation;
    $emprunt->save();

    return redirect()->route('admin.emprunts.index')->with('success', 'Livre retourné avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();

        return redirect()->route('admin.emprunts.index')->with('destroy', 'Emprunt supprimé avec succès.');
    }
    public function downloadRapport($id)
{
    $user = User::findOrFail($id);
    $emprunts = Emprunt::where('user_id', $user->id)->with('livre')->get();

    // Statistiques
    $total = $emprunts->count();
    $returnedOnTime = $emprunts->filter(fn($e) =>
        $e->date_retour_reelle !== null && $e->date_retour_reelle <= $e->date_retour_prevue
    )->count();

    $late = $emprunts->filter(fn($e) =>
        $e->date_retour_reelle !== null && $e->date_retour_reelle > $e->date_retour_prevue
    )->count();

    $notReturned = $emprunts->filter(fn($e) =>
        $e->date_retour_reelle === null
    )->count();

    // Générer PDF
    $pdf = Pdf::loadView('admin.emprunts.rapport-pdf', compact(
        'user', 'emprunts', 'total', 'returnedOnTime', 'late', 'notReturned'
    ))->setPaper('a4', 'portrait');

    return $pdf->download('rapport-emprunts-' . $user->id . '.pdf');
}

public function rapport(Request $request)
{
    $user = null;
    $emprunts = collect();
    $total = 0;
    $returnedOnTime = 0;
    $late = 0;
    $notReturned = 0;

    if ($request->filled('email')) {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $emprunts = Emprunt::where('user_id', $user->id)->with('livre')->get();

            $total = $emprunts->count();
            $returnedOnTime = $emprunts->filter(fn($e) =>
                $e->date_retour_reelle !== null && $e->date_retour_reelle <= $e->date_retour_prevue
            )->count();

            $late = $emprunts->filter(fn($e) =>
                $e->date_retour_reelle !== null && $e->date_retour_reelle > $e->date_retour_prevue
            )->count();

            $notReturned = $emprunts->filter(fn($e) =>
                $e->date_retour_reelle === null
            )->count();
        }
    }

    return view('admin.emprunts.rapport', compact(
        'user', 'emprunts', 'total', 'returnedOnTime', 'late', 'notReturned'
    ));
}

public function autocompleteEmail(Request $request)
{
    $search = $request->query('query');

    $results = User::where('email', 'like', "%{$search}%")
                ->limit(10)
                ->get(['email']);

    return response()->json($results);
}


public function search(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $emprunts = Emprunt::with(['livre'])
                    ->where('user_id', $user->id)
                    ->get();

        return view('admin.rapport.resultat', compact('user', 'emprunts'));
    }

}
