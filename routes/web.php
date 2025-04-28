<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
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
    Route::resource('categories', CategorieController::class);
    Route::resource('editeurs', EditeurController::class);
    Route::resource('livres', LivreController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('roles', RoleController::class);

    route::get('/emprunt/admin/list', [App\Http\Controllers\EmpruntController::class, 'indexAdmin'])->name('emprunt.admin.index');
    route::get('/emprunt/admin/{emprunt}/show', [App\Http\Controllers\EmpruntController::class, 'show'])->name('emprunt.admin.show');

    route::get('/reservation/admin/list', [App\Http\Controllers\ReservationController::class, 'indexAdmin'])->name('reservation.admin.index');
    route::get('/reservation/admin/{reservation}/show', [App\Http\Controllers\ReservationController::class, 'show'])->name('reservation.admin.show');
    
    Route::get('/filter-voyages', [LivreController::class, 'filter'])->name('voyages.filter');
    Route::get('/filter-multiple', [LivreController::class, 'filter_sidebar'])->name('voyages.filtermultiple');
    Route::get('/filter-search', [LivreController::class, 'search'])->name('voyages.search');

        });
        

require __DIR__.'/auth.php';


