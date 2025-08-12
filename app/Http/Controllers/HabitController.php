<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index(Request $request)
    {
        $habits = Habit::latest()->get();

        $editHabit = null;
        if ($request->has('edit')) {
            $editHabit = Habit::findOrFail($request->edit);
        }

        return view('habits.index', compact('habits', 'editHabit'));
    }

    public function create()
    {
        return view('habits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'category' => 'required|in:health,productivity,mindfulness,learning',
        ]);

        $data = $request->all();
        $data['is_completed'] = (int) $request->input('is_completed', 0);

        Habit::create($data);

        return redirect()->route('habits.index');
    }

    public function edit(Habit $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    public function update(Request $request, Habit $habit)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'category' => 'required|in:health,productivity,mindfulness,learning',
        ]);

        $data = $request->all();
        $data['is_completed'] = (int) $request->input('is_completed', 0);

        $habit->update($data);

        return redirect()->route('habits.index');
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();

        return redirect()->route('habits.index');
    }
}
