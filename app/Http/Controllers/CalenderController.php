<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller; // Pastikan ini di-import
use App\Models\Habit; // Sesuaikan dengan model kamu
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalenderController extends Controller
{
    public function index(): View
    {
        $habits = Habit::all()->map(function ($habit) {
            $habit->formatted_date = \Carbon\Carbon::parse($habit->start_date)->format('Y-m-d');
            return $habit;
        });

        return view('kalender', compact('habits'));
    }
}