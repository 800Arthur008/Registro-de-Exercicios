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
}
