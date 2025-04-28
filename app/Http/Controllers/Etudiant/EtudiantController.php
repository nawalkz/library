<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Livre;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    public function index()
    // afficher toutes les reservations de l'etudiant connecté
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();//auth= kat3tina l id diyal letudiant connecté
        return view('etudiant.reservations.index', compact('reservations'));
    }

    // afficher le formulaire de réservation
    public function create()
    {
        $livres = Livre::all();
        return view('etudiant.reservations.create', compact('livres'));
    }
// enregistrer une nouvelle reservation
    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'livre_id' => $request->livre_id,
            'date_reservation' => now(),
            'status' => 'en_attente', // statut par défaut
        ]);

        return redirect()->route('etudiant.reservations.index')->with('success', 'Reservation effectuée avec succès.');
    }
    // voir une seule reservation 
    public function show($id)
    {
        $reservation = Reservation::where('user_id', Auth::id())->findOrFail($id);
        return view('etudiant.reservations.show', compact('reservation'));
    }
}

//l' etudiant khas idir ghireservation maikonch 3ndo crud kolo