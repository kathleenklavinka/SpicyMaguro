<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Spicy Maguro</title>
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

        .reset-container {
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

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>

<div class="reset-container">
    <h4 class="mb-4 text-danger fw-bold">Set New Password</h4>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
        </div>

        <button type="submit" class="btn btn-submit">Reset Password</button>
    </form>
</div>

</body>
</html>
