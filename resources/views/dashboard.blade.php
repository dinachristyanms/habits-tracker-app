@extends('layouts.app')

@section('title', 'Habitude - Habit Tracker')

@section('content')
<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


<style>
    :root {
        --primary: #6366f1;
        --primary-dark: #4f46e5;
        --secondary: #f43f5e;
        --success: #10b981;
        --dark: #1e293b;
        --light: #f8fafc;
    }
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f1f5f9;
        color: var(--dark);
    }

    .card-container {
        display: flex;
        flex-wrap: wrap; /* Biar turun ke baris berikutnya */
        gap: 10px; /* Jarak antar card */
        
    }

    .habit-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        width: 320px;
        margin: 15px auto;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: 0.3s;
        flex: 1 1 calc(25% - 10px); /* 4 card per baris */
        box-sizing: border-box; /* Biar padding nggak nambah lebar */
    }
    .habit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    .habit-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .habit-category {
        display: inline-block;
        background: #ffd6e0;
        color: #ff4d6d;
        padding: 4px 10px;
        font-size: 16px;
        border-radius: 50px;
        margin-bottom: 15px;
    }
    .progress-bar {
        background: #e0e0e0;
        border-radius: 50px;
        height: 12px;
        width: 100%;
        margin: 10px 0;
        overflow: hidden;
    }
    .progress {
        background: linear-gradient(90deg, #ff8fa3, #ff4d6d);
        height: 100%;
        width: 65%;
    }
    .target-info {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }
    .badge {
        display: inline-block;
        background: gold;
        color: #333;
        font-size: 12px;
        padding: 5px 12px;
        border-radius: 50px;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .streak-count {
        background: linear-gradient(135deg, #fccb90 0%, #d57eeb 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Static Example Cards -->
<div class="card-container">
        <div class="habit-card">
            <div class="habit-category">Mindfulness</div>
            <div class="progress-bar"><div class="progress"></div></div>
            <div class="target-info">Target Bulanan: 20 Hari | Tercapai: 13 Hari</div>
        </div>

        <div class="habit-card">
            <div class="habit-category" style="background:#d4f1f4;color:#0077b6;">Health</div>
            <div class="progress-bar">
                <div class="progress" style="width:80%;background:linear-gradient(90deg,#48cae4,#0096c7);"></div>
            </div>
            <div class="target-info">Target Bulanan: 15 Hari | Tercapai: 12 Hari</div>
        </div>

        <div class="habit-card">
            <div class="habit-category" style="background:#fff3b0; color:#b58900;">Productivity</div>
            <div class="progress-bar">
                <div class="progress" style="width:80%;background:linear-gradient(90deg,#ffe066,#fab005);"></div>
            </div>
            <div class="target-info">Target Bulanan: 15 Hari | Tercapai: 12 Hari</div>
        </div>

        <div class="habit-card">
            <div class="habit-category" style="background:#d4f8d4; color:#2e7d32;">Learning</div>
            <div class="progress-bar">
                <div class="progress" style="width:80%;background:linear-gradient(90deg,#81c784,#388e3c);"></div>
            </div>
            <div class="target-info">Target Bulanan: 15 Hari | Tercapai: 12 Hari</div>
        </div>
</div>

<div x-data="{ category: 'All' }">
    <!-- Categories -->
    <div class="flex overflow-x-auto pb-2 mb-6 scrollbar-hide animate-fadeIn">
        @php
            $categories = ['All', 'Health', 'Productivity', 'Mindfulness', 'Learning'];
        @endphp
        @foreach ($categories as $cat)
            <button 
                @click="category = '{{ $cat }}'" 
                :class="category === '{{ $cat }}' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                class="px-4 py-2 mr-2 rounded-full text-sm font-medium whitespace-nowrap">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <!-- Dynamic Habit List -->
    <div class="card-container">
        @forelse ($habits as $habit)
            @php
                $categoryColors = [
                    'health' => ['bg' => 'bg-red-100', 'text' => 'text-red-500', 'icon' => 'fas fa-dumbbell'],
                    'learning' => ['bg' => 'bg-green-100', 'text' => 'text-green-500', 'icon' => 'fas fa-book'],
                    'productivity' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-500', 'icon' => 'fas fa-tasks'],
                    'mindfulness' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-500', 'icon' => 'fas fa-brain'],
                ];
                $catInfo = $categoryColors[strtolower($habit->category)] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-500', 'icon' => 'fas fa-star'];
            @endphp
            <div 
                class="habit-card bg-white rounded-xl overflow-hidden shadow-sm mb-4 p-6" 
                x-show="category === 'All' || category.toLowerCase() === '{{ strtolower($habit->category) }}'">
                
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-lg {{ $catInfo['bg'] }} flex items-center justify-center {{ $catInfo['text'] }}">
                            <i class="{{ $catInfo['icon'] }}"></i>
                        </div>
                        <h3 class="ml-3 font-bold text-lg">{{ $habit->name }}</h3>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('habits.index', ['edit' => $habit->id]) }}" class="text-gray-400 hover:text-indigo-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('habits.destroy', $habit) }}" method="POST" onsubmit="return confirm('Yakin hapus habit ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-600">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <p class="text-gray-500 mb-4">{{ $habit->description }}</p>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-sm font-medium text-gray-500">Status</span>
                    <span class="text-sm font-bold streak-count">{{ $habit->is_completed ? 'Completed' : 'Ongoing' }}</span>
                </div>
                <div class="flex justify-between items-center space-x-2 mb-6">
                    <span class="text-sm font-medium text-gray-500">Started: {{ \Carbon\Carbon::parse($habit->start_date)->format('d M Y') }}</span>
                    <span class="text-sm font-medium text-gray-500">Completion: {{ $habit->completion_rate ?? '0%' }}</span>
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-white rounded-xl shadow-lg col-span-full">
                <img src="https://placehold.co/300x200" alt="Empty list" class="mx-auto mb-6 rounded-lg" />
                <h3 class="text-xl font-medium text-slate-700 mb-2">Belum ada habit</h3>
                <p class="text-slate-500 mb-6">Ayo buat habit pertamamu sekarang juga!</p>
            </div>
        @endforelse
    </div>
</div>


<!-- Scripts -->
<script>
    const newHabitBtn = document.querySelectorAll('#newHabitBtn');
    const habitModal = document.getElementById('habitModal');
    const closeModalBtn = document.getElementById('closeModalBtn');

    newHabitBtn.forEach(btn => btn.addEventListener('click', () => habitModal.classList.remove('hidden')));
    closeModalBtn.addEventListener('click', () => habitModal.classList.add('hidden'));
    habitModal.addEventListener('click', (e) => {
        if (e.target === habitModal) habitModal.classList.add('hidden');
    });
</script>
@endsection
