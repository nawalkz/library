<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ======= Admin routes =======
Route::middleware('admin')->group(function () {
    Route::get('/admin', function () {return view('admin.Layout.app');})->name('admin');
    Route::resource('auteurs', AuteurController::class);
    Route::resource('categories', CategorieController::class, [
        'parameters' => ['categories' => 'categorie']]);
    Route::resource('editeurs', EditeurController::class);
    Route::resource('livres', LivreController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('roles', RoleController::class);

    Route::resource('reservations', ReservationController::class);

    Route::resource('emprunts', EmpruntController::class);

    
    Route::get('/filter-voyages', [LivreController::class, 'filter'])->name('voyages.filter');
    Route::get('/filter-multiple', [LivreController::class, 'filter_sidebar'])->name('voyages.filtermultiple');
    Route::get('/filter-search', [LivreController::class, 'search'])->name('voyages.search');

        });
        

require __DIR__.'/auth.php';



