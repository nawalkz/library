<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;        
use App\Models\Livre;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Http\Controllers\Controller;

/* use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB; */


class ReservationController extends Controller
{
    
    public function index()
{
    // Récupère les réservations de l'utilisateur connecté
    $reservations = Reservation::where('user_id', auth()->id())->with('livre')->get();
return view('users.reservations.index', compact('reservations'));

}

public function emprunt()
{
    $user = auth()->user();
    $emprunts = Reservation::where('user_id', $user->id)->with('livre')->get();

    return view('users.reservations.emprunt', compact('user', 'emprunts'));
}
/* public function showTicket()
{
    $user = auth()->user();
    $reservations = Reservation::where('user_id', $user->id)->with('livre')->get();

    return view('users.reservations.ticket', compact('user', 'reservations'));
} */
    
   public function create(Livre $livre)
{
    return view('users.reservations.create', compact('livre'));
}

    
    public function store(Request $request)
{
    $user = auth()->user(); // L'utilisateur connecté
    $livre_id = $request->livre_id;


if (!$user) {
    return redirect()->route('login')->with('error', 'Vous devez être connecté pour réserver un livre.');
}

    // Vérification du rôle
    if ($user->role_id == 2) {
        // Vérifier s'il a déjà un livre réservé
        $hasReservation = Reservation::where('user_id', $user->id)->whereNull('date_reteure')->exists();

        if ($hasReservation) {
            return redirect()->back()->with('error', 'Vous avez déjà un livre réservé. Vous devez le retourner avant d’en réserver un autre.');
        }

        // Date de retour = aujourd'hui + 10 jours
        $date_retour = now()->addDays(10);

    } elseif ($user->role_id == 1) {
        // Pas de limite, mais tu peux ajouter des contrôles si besoin
        $date_retour = null; // pas de limite imposée
    } else {
        return redirect()->back()->with('error', 'Rôle non autorisé à faire des réservations.');
    }

    // Création de la réservation
    Reservation::create([
        'user_id' => $user->id,
        'livre_id' => $livre_id,
        'date_reservation' => now(),
        'date_reteure' => $date_retour,
    ]);

    return redirect()->route('users.reservations.index')->with('success', 'Réservation effectuée avec succès.');
}

     // Afficher une réservation spécifique
     public function show($id)
     {
         $reservation = Reservation::with('livre')
             ->where('user_id', Auth::id())
             ->findOrFail($id);
 
         return view('users.reservations.show', compact('reservation'));
     }
     
 }
 
    
