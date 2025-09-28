<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Exercises
    Route::get('/exercises/create', [\App\Http\Controllers\ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('/exercises', [\App\Http\Controllers\ExerciseController::class, 'store'])->name('exercises.store');
});

require __DIR__.'/auth.php';
