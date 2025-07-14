<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Emprunt;
use Illuminate\Support\Carbon;
use App\Notifications\LivrePretNotification;

class ReservationController extends Controller
{
    public function convertToEmprunt($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Créer l'emprunt à partir de la réservation
        $emprunt = Emprunt::create([
            'user_id' => $reservation->user_id,
            'livre_id' => $reservation->livre_id,
            'date_emprunt' => Carbon::now(),
            'date_reteure' => Carbon::now()->addDays(10), // 10 jours pour l'exemple
            'etat_livre' => 'bon',
            'observation' => 'Créé via réservation',
        ]);

        // Envoyer une notification à l'utilisateur
        $user = $reservation->user;
       $message = "📚 Votre livre '" . $emprunt->livre->titre . "' est prêt à être retiré à la bibliothèque.";

        $user->notify(new LivrePretNotification($message));


    // Supprimer la réservation ou la marquer comme traitée (selon le besoin)
    $reservation->delete();

    return redirect()->route('admin.reservations.index')->with('success', 'Réservation convertie en emprunt avec succès.');
}
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = $request->statut;
        $reservation->save();
    
        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
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
    public function show(Reservation $reservation,$id )
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('destroy', 'Réservation supprimée avec succès.');
    }
  
}
