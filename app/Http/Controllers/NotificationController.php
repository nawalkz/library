<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    // katsifet notification l database

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Veuillez retourner les livres empruntés avant la fin de votre cursus.',
            'etudiant_id' => $notifiable->id,
        ];

        //  comment transferer la notification  a un etudient
        $user = User::find($id);
        $user->notify(new NotificationController());
    }
}
   