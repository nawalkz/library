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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('reservation/', function () {
    return view('users.reservations.index');
})->name('users.reservations.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
        'parameters' => ['livres' => 'livre']]);
    Route::resource('notifications', NotificationController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('emprunts', EmpruntController::class);
    Route::resource('notifications', NotificationController::class,);

});
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
});

require __DIR__.'/auth.php';



