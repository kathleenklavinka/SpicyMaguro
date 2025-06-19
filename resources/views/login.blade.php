<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Spicy Maguro</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #800000;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            max-width: 900px;
            width: 100%;
            display: flex;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .login-logo {
            flex: 1;
            text-align: center;
            border-right: 1px solid #ddd;
            padding-right: 30px;
        }

        .login-logo img {
            width: 150px;
            margin-bottom: 20px;
        }

        .login-form {
            flex: 1.5;
            padding-left: 30px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-login {
            background-color: #800000;
            color: #fff;
            border-radius: 10px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #a00000;
        }

        .small-text {
            font-size: 0.9rem;
            color: #666;
        }

        /* Ubah semua text-danger jadi maroon */
        .text-danger, .alert-danger {
            color: #800000 !important;
        }

        .alert-danger {
            border-color: #800000;
            background-color: #fcecec;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-logo">
        <img src="{{ asset('images/spicyMaguroLogo.jpg') }}" alt="Logo"> 
        <h4 class="text-danger fw-bold">Spicy Maguro</h4>
        <p class="small-text">Where flavor meets precision.</p>
    </div>

    <div class="login-form">
        <h4 class="mb-4 text-danger fw-bold">Welcome Back!</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label small-text" for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-login">Login</button>

            <div class="mt-3 small-text d-flex justify-content-between">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
                <a href="{{ route('register.form') }}">Register</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
