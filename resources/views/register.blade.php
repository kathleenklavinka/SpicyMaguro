<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Spicy Maguro</title>
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

        .register-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            max-width: 900px;
            width: 100%;
            display: flex;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .register-logo {
            flex: 1;
            text-align: center;
            border-right: 1px solid #ddd;
            padding-right: 30px;
        }

        .register-logo img {
            width: 150px;
            margin-bottom: 20px;
        }

        .register-form {
            flex: 1.5;
            padding-left: 30px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-register {
            background-color: #800000;
            color: #fff;
            border-radius: 10px;
            width: 100%;
        }

        .btn-register:hover {
            background-color: #a00000;
        }

        .small-text {
            font-size: 0.9rem;
            color: #666;
        }

        /* Ubah warna text-danger jadi maroon */
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

<div class="register-container">
    <div class="register-logo">
        <img src="{{ asset('images/spicyMaguroLogo.jpg') }}" alt="Logo"> 
        <h4 class="text-danger fw-bold">Spicy Maguro</h4>
        <p class="small-text">Where flavor meets precision.</p>
    </div>

    <div class="register-form">
        <h4 class="mb-4 text-danger fw-bold">Create Account</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="btn btn-register">Register</button>

            <div class="mt-3 small-text text-end">
                <a href="{{ route('login.form') }}">Already have an account?</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
