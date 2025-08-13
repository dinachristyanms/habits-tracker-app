<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Habitude</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0px 8px 30px rgba(0,0,0,0.2);
        }
        .form-control {
            border-radius: 10px;
            padding-left: 40px;
        }
        .form-group {
            position: relative;
        }
        .form-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .btn-custom {
            background: #2575fc;
            color: white;
            border-radius: 10px;
            font-weight: bold;
        }
        .btn-custom:hover {
            background: #1a5edb;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <h3 class="text-center mb-4 fw-bold text-primary">Daftar Akun</h3>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3 form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3 form-group">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3 form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-3 form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Daftar</button>
                </form>

                <p class="text-center mt-3 mb-0 text-muted">
                    Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold text-decoration-none text-primary">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
