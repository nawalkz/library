<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emprunt;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Get count of currently borrowed books (not yet returned)
        $borrowedBooksCount = Emprunt::where('user_id', $userId)
            ->whereNull('date_retour_reelle') // Not returned yet
            ->count();

        // Get count of overdue books (past due date, not returned)
        $overdueBooks = Emprunt::where('user_id', $userId)
            ->whereNull('date_retour_reelle')
            ->where('date_retour_prevue', '<', Carbon::now())
            ->get();

        // Get count of books borrowed in current month
        $booksThisMonth = Emprunt::where('user_id', $userId)
            ->whereMonth('date_emprunt', now()->month)
            ->whereYear('date_emprunt', now()->year)
            ->count();

        // Get count of pending requests (waiting for approval)
        $pendingRequests = Emprunt::where('user_id', $userId)
            ->where('statut', 'en_attente')
            ->count();

        return view('dashboard', [
            'borrowedBooksCount' => $borrowedBooksCount,
            'overdueBooks' => $overdueBooks,
            'booksThisMonth' => $booksThisMonth,
            'pendingRequests' => $pendingRequests,
        ]);
    }
}
