<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />

    <title>@yield('title', 'Dashboard')</title>
    <!-- SB Admin 2 CSS -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sb-temp/assets/images/logos/favicon.png') }}">
    <link href="{{ asset('sb-temp/assets/css/styles.min.css') }}" rel="stylesheet">



    @stack('styles') <!-- Untuk CSS tambahan dari halaman tertentu -->
</head>
<body>
    {{-- Topbar --}}
    @include('partials.topbar')

    <!-- Content Layout -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    
    <script src="{{ asset('sb-temp/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-temp/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb-temp/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('sb-temp/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('sb-temp/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('sb-temp/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('sb-temp/assets/js/dashboard.js') }}"></script>

    @stack('scripts') <!-- Untuk JS tambahan dari halaman tertentu -->
</body>
</html>
