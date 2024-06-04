<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    $events = \App\Models\Event::where('user_id', auth()->id())->get();
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para el registro
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rutas para manejo de eventos
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');


require __DIR__.'/auth.php';
