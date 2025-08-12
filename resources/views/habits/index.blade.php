@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
        }

        .habit-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .habit-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
        }

        .btn-primary {
            background-color: #4f46e5;
        }

        .btn-primary:hover {
            background-color: #6366f1;
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-ongoing {
            background-color: #fef3c7;
            color: #d97706;
        }

        .status-completed {
            background-color: #d1fae5;
            color: #059669;
        }

        .status-skipped {
            background-color: #fee2e2;
            color: #dc2626;
        }
    </style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <header class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-slate-800 mb-2">Habit Tracker</h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto">Build better habits, one day at a time. Track your progress and stay accountable.</p>
    </header>

    {{-- Grid dua kolom dengan tinggi layar penuh --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 h-screen overflow-hidden">

        {{-- DAFTAR HABIT --}}
        <div class="overflow-y-auto pr-2" style="max-height: calc(100vh - 250px);">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-slate-800">Daftar Habit</h2>
                <form>
                    <input type="text" placeholder="Cari habit..."
                        class="px-4 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </form>
            </div>

                @forelse ($habits as $habit)
                    <div class="habit-card bg-white rounded-xl p-4 mb-4 fade-in">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800">{{ $habit->name }}</h3>
                                <span class="text-sm text-indigo-600 font-medium">{{ ucfirst($habit->category) }}</span>
                            </div>
                            <span class="status-badge 
                                {{ $habit->is_completed == 1 ? 'status-completed' : 'status-ongoing' }}">
                                {{ $habit->is_completed == 1 ? 'Completed' : 'Ongoing' }}
                            </span>
                        </div>
                        <p class="text-slate-600 text-sm mb-3">{{ $habit->description }}</p>
                        <div class="flex justify-between items-center text-sm text-slate-500">
                            <span>Started: {{ \Carbon\Carbon::parse($habit->start_date)->format('d M Y') }}</span>
                            <div class="flex space-x-2">
                                <a href="{{ route('habits.index', ['edit' => $habit->id]) }}" class="text-indigo-600 hover:text-indigo-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('habits.destroy', $habit) }}" method="POST" onsubmit="return confirm('Yakin hapus habit ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="text-center py-12 bg-white rounded-xl shadow-lg">
                    <img src="https://placehold.co/300x200" alt="Empty list" class="mx-auto mb-6 rounded-lg" />
                    <h3 class="text-xl font-medium text-slate-700 mb-2">Belum ada habit</h3>
                    <p class="text-slate-500 mb-6">Ayo buat habit pertamamu sekarang juga!</p>
                </div>
            @endforelse
        </div>

        {{-- FORM TAMBAH / EDIT --}}
        <div class="bg-white rounded-xl p-6 shadow-lg h-fit">
            <h2 class="text-2xl font-semibold text-slate-800 mb-6">
                {{ isset($editHabit) ? 'Edit Habit' : 'Tambah Habit Baru' }}
            </h2>

            <form action="{{ isset($editHabit) ? route('habits.update', $editHabit) : route('habits.store') }}" method="POST">
                @csrf
                @if(isset($editHabit))
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Habit</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $editHabit->name ?? '') }}" required
                        class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $editHabit->description ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date"
                        value="{{ old('start_date', isset($editHabit) ? \Carbon\Carbon::parse($editHabit->start_date)->format('Y-m-d') : '') }}"
                        required
                        class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-slate-700 mb-1">Kategori Habit</label>
                    <select name="category" id="category"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Pilih Kategori</option>
                        <option value="health" {{ old('category', $editHabit->category ?? '') == 'health' ? 'selected' : '' }}>Health</option>
                        <option value="productivity" {{ old('category', $editHabit->category ?? '') == 'productivity' ? 'selected' : '' }}>Productivity</option>
                        <option value="mindfulness" {{ old('category', $editHabit->category ?? '') == 'mindfulness' ? 'selected' : '' }}>Mindfulness</option>
                        <option value="learning" {{ old('category', $editHabit->category ?? '') == 'learning' ? 'selected' : '' }}>Learning</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="is_completed" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                    <select name="is_completed" id="is_completed"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="0" {{ old('is_completed', $editHabit->is_completed ?? '') == 0 ? 'selected' : '' }}>Ongoing</option>
                        <option value="1" {{ old('is_completed', $editHabit->is_completed ?? '') == 1 ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md flex items-center">
                        <i class="fas fa-save mr-2"></i> {{ isset($editHabit) ? 'Update Habit' : 'Tambah Habit' }}
                    </button>
                    <a href="{{ route('habits.index') }}" class="bg-slate-200 text-slate-800 px-4 py-2 rounded-md flex items-center">
                        <i class="fas fa-undo mr-2"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
