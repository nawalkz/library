<?php

namespace App\Http\Controllers;

use App\Models\Notification;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

use App\Models\User;


    /**
     * Display a listing of the resource.
     */
    
    // katsifet notification l database

    /* public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Veuillez retournez les livres empruntés avant la fin de votre cursus.',
            'etudiant_id' => $notifiable->id,
        ];

          comment transferer la notification  a un etudient
        $user = User::find($id);
        $user->notify(new NotificationController());
    }
}
    */
   


class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('etudiant')->latest()->paginate(10);
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $etudiants = User::all();
        return view('admin.notifications.create', compact('etudiants'));
    }

    public function store(StoreNotificationRequest $request)
    {
        Notification::create($request->validated());
        return redirect()->route('notifications.index')->with('success', 'Notification envoyée avec succès.');
    }

    public function edit(Notification $notification)
    {
        $etudiants = User::all();
        return view('admin.notifications.edit', compact('notification', 'etudiants'));
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->validated());
        return redirect()->route('notifications.index')->with('success', 'Notification mise à jour avec succès.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notification supprimée avec succès.');
    }
}
