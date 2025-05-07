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
});

Route::get('/livres/livre_media/', function () {
    return view('users.livres.livre_media');
})->name('users.livres.livre_media');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
Route::get('reservation/', function () {
    return view('users.reservations.index');
})->name('users.reservations.index');
=======

>>>>>>> 56b7740eb84d76a03307609104d56f434a0ca9fb

Route::middleware('auth')->group(function () {

    // ======= Users routes =======
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/create/reservation', [App\Http\Controllers\User\ReservationController::class, 'create'])->name('users.create.reservation');
    Route::post('/users/store', [App\Http\Controllers\User\ReservationController::class, 'store'])->name('users.store');

    Route::get('/ticket/{id}', [App\Http\Controllers\User\ReservationController::class, 'show'])->name('ticket.show');
    Route::get('/ticket/{id}/download', [App\Http\Controllers\User\ReservationController::class, 'download'])->name('ticket.download');

    Route::get('/users/profile/reservations', [App\Http\Controllers\User\Profile\ReservationController::class, 'index'])->name('users.profile.reservations.index');
    Route::get('/users/profile/dashboard', [App\Http\Controllers\User\Profile\DashboardController::class, 'index'])->name('users.profile.dashboard.index');
    Route::get('/users/profile/monprofile', [App\Http\Controllers\User\Profile\MonprofileController::class, 'index'])->name('users.profile.monprofile.index');
    Route::get('/users/profile/parametres', [App\Http\Controllers\User\Profile\ParametreController::class, 'index'])->name('users.profile.parametres.index');
    Route::put('/users/profile/parametres', [App\Http\Controllers\User\Profile\ParametreController::class, 'update'])->name('users.profile.parametres.update');
    Route::get('/users/profile/parametres/dropprofileimage', [App\Http\Controllers\User\Profile\ParametreController::class, 'removeprofileimage'])->name('users.profile.parametres.removeImage');

    Route::delete('/profile/delete-image', [App\Http\Controllers\User\Profile\ParametreController::class, 'deleteProfileImage'])
    ->name('profile.delete-image');




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
        'parameters' => ['livres' => 'livre']]);
    Route::resource('notifications', NotificationController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('emprunts', EmpruntController::class);
    Route::resource('notifications', NotificationController::class,);

});
<<<<<<< HEAD
// ======= User routes =======

use App\Http\Controllers\User\ReservationController as UserReservationController;


// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {

    // Réservations - côté utilisateur
    Route::prefix('user')->name('user.')->group(function () {

        // Voir toutes les réservations de l'utilisateur
        Route::get('/reservations', [UserReservationController::class, 'index'])->name('reservations.index');



        // Créer une réservation (formulaire)
        Route::get('/reservations/create/{livre}', [UserReservationController::class, 'create'])->name('reservations.create');

        // Enregistrer une réservation
        Route::post('/reservations', [UserReservationController::class, 'store'])->name('reservations.store');
    });
=======
>>>>>>> 56b7740eb84d76a03307609104d56f434a0ca9fb
});

require __DIR__.'/auth.php';



