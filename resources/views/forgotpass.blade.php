<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password - Spicy Maguro</title>
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

        .forgot-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .btn-submit {
            background-color: #800000;
            color: #fff;
            border-radius: 10px;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #a00000;
        }

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

<div class="forgot-container">
    <h4 class="mb-4 text-danger fw-bold">Reset Password</h4>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" required>
        </div>

        <button type="submit" class="btn btn-submit">Send Reset Link</button>
    </form>
</div>

</body>
</html>
