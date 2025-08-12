<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;

class DashboardController extends Controller
{
    /**
     * Tampilkan data habits di dashboard.
     */
    public function index()
    {
        // Ambil semua data habits dari database
        $habits = Habit::all();

        // Kirim data ke view dashboard
        return view('dashboard', compact('habits'));
    }

    
}
