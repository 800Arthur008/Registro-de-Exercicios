<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;

use Illuminate\Http\Request as HttpRequest;

Route::get('/dashboard', function (HttpRequest $request) {
    $user = Auth::user();

    if (! $user) {
        return view('dashboard', [
            'exercises' => collect(),
            'totalExercises' => 0,
            'totalMinutes' => 0,
            'totalCalories' => 0,
            'filterStart' => null,
            'filterEnd' => null,
            'filterName' => null,
        ]);
    }

    $filterDate = $request->query('date');
    $filterName = $request->query('name');

    $query = $user->exercises()
        ->when($filterDate, function ($q) use ($filterDate) {
            $q->whereDate('date', $filterDate);
        })
        ->when($filterName, function ($q) use ($filterName) {
            $q->where('name', 'like', "%{$filterName}%");
        });

    $totalExercises = (int) $query->count();
    $totalMinutes = (int) $query->sum('duration_minutes');
    $totalCalories = (int) $query->sum('calories');

    $exercises = $query->latest('date')->take(5)->get();

    return view('dashboard', [
        'exercises' => $exercises,
        'totalExercises' => $totalExercises,
        'totalMinutes' => $totalMinutes,
        'totalCalories' => $totalCalories,
        'filterDate' => $filterDate,
        'filterName' => $filterName,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Exercises
    Route::get('/exercises/create', [\App\Http\Controllers\ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('/exercises', [\App\Http\Controllers\ExerciseController::class, 'store'])->name('exercises.store');
    Route::get('/exercises', [\App\Http\Controllers\ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/exercises/{exercise}/edit', [\App\Http\Controllers\ExerciseController::class, 'edit'])->name('exercises.edit');
    Route::put('/exercises/{exercise}', [\App\Http\Controllers\ExerciseController::class, 'update'])->name('exercises.update');
    Route::delete('/exercises/{exercise}', [\App\Http\Controllers\ExerciseController::class, 'destroy'])->name('exercises.destroy');
});

require __DIR__.'/auth.php';
