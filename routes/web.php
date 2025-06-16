<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\WedstrijdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoekingController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KlantenBoekingController;
use App\Http\Controllers\BetalingenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pooster/{id}', [WedstrijdController::class, 'pooster'])->name('pooster');
Route::get('/kalender', [DefaultController::class, 'kalender'])->name('kalender');
Route::resource('/boeken', KlantenBoekingController::class);

Route::get('/betalingen/start/{boeking}', [BetalingenController::class, 'startPayment'])->name('betalingen.start');
Route::get('/betalingen/callback/{boeking}', [BetalingenController::class, 'handleCallback'])->name('betalingen.callback');
Route::post('/betalingen/webhook', [BetalingenController::class, 'handleWebhook'])->name('betalingen.webhook');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'check_role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'openDashboard'])->name('admin.dashboard');
    
    Route::resource('/admin/wedstrijd', WedstrijdController::class);
    Route::resource('/admin/categorie', CategorieController::class);
    Route::resource('/admin/boeking', BoekingController::class);
});
Route::post('/betalingen/webhook', [BetalingenController::class, 'webhook'])->name('betalingen.webhook');



require __DIR__.'/auth.php';
