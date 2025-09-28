<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // List all exercises for the authenticated user (paginated)
    public function index()
    {
        $user = Auth::user();
        $exercises = $user ? $user->exercises()->latest('date')->paginate(10) : collect();
        return view('exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:0',
            'calories' => 'required|integer|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();

        Exercise::create($data);

        return redirect()->route('dashboard')->with('success', 'Exercício criado com sucesso.');
    }

    public function edit(Exercise $exercise)
    {
        if ($exercise->user_id !== Auth::id()) {
            abort(403);
        }

        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        if ($exercise->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:0',
            'calories' => 'required|integer|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $exercise->update($data);

    return redirect()->route('dashboard')->with('success', 'Exercício atualizado com sucesso.');
    }

    public function destroy(Exercise $exercise)
    {
        if ($exercise->user_id !== Auth::id()) {
            abort(403);
        }

        $exercise->delete();

        return redirect()->back()->with('success', 'Exercício removido.');
    }
}
