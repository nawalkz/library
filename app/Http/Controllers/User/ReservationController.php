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
    // Afficher les réservations de l'utilisateur connecté
    public function index()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        $reservations = Reservation::where('user_id', $user->id)->with('livre')->get();
    
        return view('user.reservations.index', compact('reservations'));
    }
    
    
    public function create(Request $request)
    {
        $livre = Livre::find($request->livre_id);
        return view('user.reservations.create', compact('livre'));
    }
    
    public function store(Request $request)
{
    $user = auth()->user(); // L'utilisateur connecté
    $livre_id = $request->livre_id;

    // Vérification du rôle
    if ($user->role == 'etudiant') {
        // Vérifier s'il a déjà un livre réservé
        $hasReservation = Reservation::where('user_id', $user->id)->whereNull('date_reteure')->exists();

        if ($hasReservation) {
            return redirect()->back()->with('error', 'Vous avez déjà un livre réservé. Vous devez le retourner avant d’en réserver un autre.');
        }

        // Date de retour = aujourd'hui + 10 jours
        $date_retour = now()->addDays(10);

    } elseif ($user->role == 'professeur') {
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

    return redirect()->route('user.reservations.index')->with('success', 'Réservation effectuée avec succès.');
}

     // Afficher une réservation spécifique
     public function show($id)
     {
         $reservation = Reservation::with('livre')
             ->where('user_id', Auth::id())
             ->findOrFail($id);
 
         return view('user.reservations.show', compact('reservation'));
     }
 }
 
    
