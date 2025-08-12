@extends('layouts.app')

@section('content')

<!-- Styles -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#4F46E5',
                    secondary: '#10B981',
                    accent: '#F59E0B',
                    dark: '#1F2937',
                    light: '#F3F4F6'
                }
            }
        }
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body { font-family: 'Inter', sans-serif; transition: all 0.3s ease; }
    .calendar-day:hover { transform: scale(1.05); box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .event-dot { width: 6px; height: 6px; border-radius: 50%; }
    .fade-in { animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-dark mb-2">KALENDER</h1>
            <p class="text-lg text-gray-600">Atur waktu Anda dengan lebih mudah</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Calendar Header -->
            <div class="flex flex-col md:flex-row justify-between items-center bg-primary p-6">
                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <button id="prev-year" class="text-white hover:text-accent transition-colors">◀</button>
                    <h2 id="current-year" class="text-2xl font-bold text-white">2023</h2>
                    <button id="next-year" class="text-white hover:text-accent transition-colors">▶</button>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="prev-month" class="text-white hover:text-accent transition-colors">◀</button>
                    <h2 id="current-month" class="text-2xl font-bold text-white">Desember</h2>
                    <button id="next-month" class="text-white hover:text-accent transition-colors">▶</button>
                </div>
            </div>

            <!-- Calendar Grid -->
            <div class="p-4">
                <div class="grid grid-cols-7 gap-2 mb-4">
                    @foreach(['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $day)
                        <div class="text-center font-medium text-gray-500 py-2">{{ $day }}</div>
                    @endforeach
                </div>
                <div id="calendar-days" class="grid grid-cols-7 gap-2"></div>
            </div>

            <!-- Calendar Footer -->
            <div class="bg-gray-50 p-4 border-t flex flex-wrap items-center justify-between">
                <div class="flex items-center space-x-2"><span class="event-dot bg-primary"></span><span class="text-sm">Habit</span></div>
            </div>
        </div>

        <!-- Selected Date Info -->
        <div id="selected-date-info" class="mt-8 bg-white rounded-xl shadow-lg p-6 fade-in hidden">
            <h3 id="selected-date-title" class="text-xl font-bold text-dark mb-4"></h3>
            <div id="habit-list" class="space-y-4"></div>
        </div>
    </div>
</div>

<script>
    const habits = @json($habits); // Data dari Laravel
    let currentDate = new Date();

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        document.getElementById('current-year').textContent = year;
        document.getElementById('current-month').textContent = new Intl.DateTimeFormat('id-ID', { month: 'long' }).format(currentDate);

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const calendarDays = document.getElementById('calendar-days');
        calendarDays.innerHTML = '';

        // Kosong awal bulan
        for (let i = 0; i < firstDay; i++) {
            const blank = document.createElement('div');
            blank.className = 'py-2';
            calendarDays.appendChild(blank);
        }

        // Tanggal bulan ini
        for (let day = 1; day <= daysInMonth; day++) {
            const dayEl = document.createElement('div');
            dayEl.className = 'calendar-day text-center py-2 rounded-lg cursor-pointer transition-all';

            const dateStr = `${year}-${String(month + 1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
            dayEl.innerHTML = `<div>${day}</div>`;

            // Tanda habit
            if (habits.some(h => h.formatted_date === dateStr)) {
                const dot = document.createElement('div');
                dot.className = 'event-dot bg-primary mx-auto mt-1';
                dayEl.appendChild(dot);
            }

            // Highlight hari ini
            const today = new Date();
            if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                dayEl.classList.add('bg-primary', 'text-white');
            } else {
                dayEl.classList.add('hover:bg-gray-100');
            }

            // Klik tanggal
            dayEl.addEventListener('click', () => showHabits(dateStr));

            calendarDays.appendChild(dayEl);
        }
    }

    function showHabits(dateStr) {
        const list = document.getElementById('habit-list');
        const title = document.getElementById('selected-date-title');
        list.innerHTML = '';

        const selectedHabits = habits.filter(h => h.formatted_date === dateStr);
        title.textContent = new Intl.DateTimeFormat('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }).format(new Date(dateStr));

        if (selectedHabits.length === 0) {
            list.innerHTML = '<p class="text-gray-500">Tidak ada habit pada tanggal ini.</p>';
        } else {
            selectedHabits.forEach(habit => {
                const item = document.createElement('div');
                item.className = 'p-4 border rounded-lg';
                item.innerHTML = `<h4 class="font-bold">${habit.name}</h4><p>${habit.description || ''}</p>`;
                list.appendChild(item);
            });
        }

        document.getElementById('selected-date-info').classList.remove('hidden');
    }

    document.getElementById('prev-month').addEventListener('click', () => { currentDate.setMonth(currentDate.getMonth() - 1); renderCalendar(); });
    document.getElementById('next-month').addEventListener('click', () => { currentDate.setMonth(currentDate.getMonth() + 1); renderCalendar(); });
    document.getElementById('prev-year').addEventListener('click', () => { currentDate.setFullYear(currentDate.getFullYear() - 1); renderCalendar(); });
    document.getElementById('next-year').addEventListener('click', () => { currentDate.setFullYear(currentDate.getFullYear() + 1); renderCalendar(); });

    renderCalendar();
</script>

@endsection
