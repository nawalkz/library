<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Emprunt;
use App\Notifications\RetourLivreRetardNotification;
use Illuminate\Support\Carbon;

class NotificationController extends Controller
{
    public function index()
{
    $notifications = auth()->user()->notifications; // Ou Notification::all() si tu veux tout voir

    return view('admin.notifications.index', compact('notifications'));
}

public function verifierRetards()
{
    $emprunts = Emprunt::where('date_retoure', '<', Carbon::today())->get();

    foreach ($emprunts as $emprunt) {
        $user = User::find($emprunt->user_id);
        if ($user) {
            $livre = $emprunt->livre; // Assure-toi que la relation existe
            $user->notify(new RetourLivreRetardNotification($livre->titre ?? 'Inconnu'));
        }
    }

    return redirect()->back()->with('success', 'Notifications envoyées aux utilisateurs en retard.');
}

}
