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


/* use App\Models\Emprunt;
use App\Notifications\RetourLivreRetardNotification;

Route::get('/test-notification', function () {
    $user = User::find(1); // remplace 1 par ton user_id
    $livreTitre = "Laravel 10 Avancé";

    $user->notify(new RetourLivreRetardNotification($livreTitre));

    return "Notification envoyée à " . $user->name;
});
 */

Route::get('/autocomplete/titre', [LivreController::class, 'autocompleteTitre'])->name('livres.autocomplete.titre');
Route::get('/autocomplete/auteur', [LivreController::class, 'autocompleteAuteur'])->name('livres.autocomplete.auteur');

Route::get('/livres/search', [LivreController::class, 'search'])->name('livres.search');
Route::get('/livres/media', [LivreController::class, 'livreMedia'])->name('users.livres.livre_media');
Route::middleware('preventIfAdminExists')->group(function () {
    Route::get('/register-admin', [AdminRegisterController::class, 'create'])->name('register.admin');
    Route::post('/register-admin', [AdminRegisterController::class, 'store'])->name('register.admin.store');
});
Route::middleware('auth')->group(function () {
    // ======= Users routes =======
    Route::get('/reservations/index', [UserReservationController::class, 'index'])->name('users.reservations.index');
    Route::get('reservations/emprunt', [UserReservationController::class, 'emprunt'])->name('users.reservations.emprunt');
    //Route::get('/reservations/ticket', [UserReservationController::class, 'showTicket'])->name('users.reservations.ticket');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/livres', [LivreController::class, 'usersIndex'])->name('livres.users.index');

    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });



/* Route::get('/autocomplete/auteurs', [AuteurController::class, 'autocomplete'])->name('autocomplete.auteurs');
Route::get('/autocomplete/categories', [CategorieController::class, 'autocomplete'])->name('autocomplete.categories');
Route::get('/autocomplete/editeurs', [EditeurController::class, 'autocomplete'])->name('autocomplete.editeurs');
 */
    // Tickets
    Route::get('/autocomplete-email', [EmpruntController::class, 'autocompleteEmail'])->name('autocomplete.email');
    Route::get('/admin/emprunts/{id}/rapport/download', [EmpruntController::class, 'downloadRapport'])->name('emprunts.downloadRapport');
    Route::get('/admin/emprunts/rapport', [EmpruntController::class, 'rapport'])->name('admin.emprunts.rapport');
    Route::post('/admin/emprunts/search', [EmpruntController::class, 'search'])->name('admin.rapport.search');

    // Voir toutes les réservations de l'utilisateur
    Route::get('/reservations', [UserReservationController::class, 'index'])->name('users.reservations.index');

    // Créer une réservation (formulaire)
    Route::get('/reservations/create/{livre}', [UserReservationController::class, 'create'])->name('users.reservations.create');


    // Enregistrer une réservation
    Route::post('/reservations', [UserReservationController::class, 'store'])->name('users.reservations.store');;

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');


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
       /*  Route::resource('notifications', NotificationController::class); */
        Route::resource('roles', RoleController::class);
        Route::resource('reservations', ReservationController::class);
        Route::resource('emprunts', EmpruntController::class);
        Route::resource('notifications', NotificationController::class,);
    });



    Route::post('admin/reservations/{id}/convert', [ReservationController::class, 'convertToEmprunt'])->name('admin.reservations.convert');
    Route::put('admin/reservations/{id}/statut', [ReservationController::class, 'updateStatus'])->name('admin.reservations.updateStatus');
});
require __DIR__ . '/auth.php';
