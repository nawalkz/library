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
    $notifications = auth()->user()->notifications()
        ->where('created_at', '>=', now()->subDays(7))
        ->get();

    return view('users.notifications.index', compact('notifications'));
}


public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->back();
    }
public function markAllAsRead()
{
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
}

}
