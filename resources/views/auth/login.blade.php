<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitude - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0d6efd; /* Biru Bootstrap */
            --secondary-color: #0b5ed7;
            --accent-color: #f7b731; /* Warna aksen gold */
            --card-bg-color: rgba(255, 255, 255, 0.95);
            --bg-gradient-start: #1c5e9f; /* Biru yang lebih dalam */
            --bg-gradient-end: #4a91d4; /* Biru yang lebih terang */
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%231a56a6" fill-opacity="0.5" d="M0,192L60,197.3C120,203,240,213,360,208C480,203,600,181,720,170.7C840,160,960,160,1080,154.7C1200,149,1320,139,1380,133.3L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>') no-repeat bottom center/cover;
            opacity: 0.2;
            z-index: -1;
        }

        .login-container {
            padding: 3rem 1rem;
            max-width: 1200px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .intro-section {
            padding: 2rem;
            animation: fadeInRight 1s ease-out;
        }

        .login-card {
            border: none;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            background: var(--card-bg-color);
            backdrop-filter: blur(15px);
            padding: 2.5rem;
            animation: fadeInLeft 1s ease-out;
        }

        .intro-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            margin-bottom: 0.5rem;
        }

        .intro-text .accent {
            color: var(--accent-color);
        }

        .intro-text p {
            font-size: 1.1rem;
            font-weight: 300;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .feature-item i {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-right: 1rem;
            width: 30px;
            text-align: center;
            animation: float 2s ease-in-out infinite;
        }

        .feature-item p {
            margin-bottom: 0;
            font-weight: 400;
        }

        .login-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            color: #555;
            font-weight: 500;
        }

        .form-control {
            border-radius: 12px;
            background: #f0f4f8;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            border-color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .signup-text {
            color: #888;
        }

        .signup-text a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 768px) {
            .intro-text {
                text-align: center;
                margin-bottom: 2rem;
            }

            .intro-text h1 {
                font-size: 2.5rem;
            }
            .feature-item {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row w-100 justify-content-center align-items-center">
            <div class="col-md-6 intro-section">
                <div class="intro-text">
                    <h1>Selamat Datang <span class="accent">di Habitude</span></h1>
                    <p class="mt-4 mb-5">
                        Habitude adalah aplikasi pelacak kebiasaan yang membantu Anda tetap konsisten,
                        mencapai target, dan membangun kebiasaan positif setiap hari.
                    </p>
                    <div class="feature-list">
                        <div class="feature-item">
                            <i class="fas fa-calendar-check"></i>
                            <p class="mb-0">Atur target harian, mingguan, dan bulanan</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <p class="mb-0">Pantau progres Anda dengan grafik interaktif</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-award"></i>
                            <p class="mb-0">Raih pencapaian dan badge motivasi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card login-card">
                    <h3 class="text-center login-title">Login</h3>
                    
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="john.doe@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>
                    
                    <p class="mt-4 text-center signup-text">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>