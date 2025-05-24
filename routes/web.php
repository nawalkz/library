<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegisterController;
use App\Models\Livre;
use App\Models\User;
use App\Http\Controllers\User\ReservationController as UserReservationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 

Route::get('/autocomplete/titre', [LivreController::class, 'autocompleteTitre'])->name('livres.autocomplete.titre');
Route::get('/autocomplete/auteur', [LivreController::class, 'autocompleteAuteur'])->name('livres.autocomplete.auteur');

Route::get('/livres/search', [LivreController::class, 'search'])->name('livres.search');
Route::get('/livres/media', [LivreController::class, 'livreMedia'])->name('users.livres.livre_media');

Route::middleware('auth')->group(function () {
    // ======= Users routes =======
Route::get('/reservations/index', [UserReservationController::class, 'index'])->name('users.reservations.index');
 Route::get('reservations/emprunt', [UserReservationController::class, 'emprunt'])->name('users.reservations.emprunt');
//Route::get('/reservations/ticket', [UserReservationController::class, 'showTicket'])->name('users.reservations.ticket');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
        

        // Voir toutes les réservations de l'utilisateur
        Route::get('/reservations', [UserReservationController::class, 'index'])->name('users.reservations.index');

        // Créer une réservation (formulaire)
        Route::get('/reservations/create/{livre}', [UserReservationController::class, 'create'])->name('users.reservations.create');


        // Enregistrer une réservation
        Route::post('/reservations', [UserReservationController::class, 'store'])->name('users.reservations.store');
  
});

    Route::middleware('preventIfAdminExists')->group(function () {
        Route::get('/register-admin', [AdminRegisterController::class, 'create'])->name('register.admin');
        Route::post('/register-admin', [AdminRegisterController::class, 'store'])->name('register.admin.store');
    });

    // ======= Admin routes =======
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.Layout.app');
        })->name('dashboard');


        Route::resource('auteurs', AuteurController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategorieController::class, [
            'parameters' => ['categories' => 'categorie']
        ]);
        Route::resource('editeurs', EditeurController::class);
        Route::resource('livres', LivreController::class, [
            'parameters' => ['livres' => 'livre']
        ]);
        Route::resource('notifications', NotificationController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('reservations', ReservationController::class);
        Route::resource('emprunts', EmpruntController::class);
        Route::resource('notifications', NotificationController::class,);
    });



Route::post('admin/reservations/{id}/convert', [ReservationController::class, 'convertToEmprunt'])->name('admin.reservations.convert');
Route::put('admin/reservations/{id}/statut', [ReservationController::class, 'updateStatus'])->name('admin.reservations.updateStatus');
require __DIR__.'/auth.php';




