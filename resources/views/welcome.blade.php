<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Spicy Maguro</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #800000;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .welcome-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0,0,0,0.1);
            text-align: center;
            padding: 50px 30px;
            width: 100%;
            max-width: 500px;
        }
        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }
        .title {
            font-size: 28px;
            font-weight: bold;
            color: #800000;
        }
        .slogan {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .btn-maroon {
            background-color: #800000;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #a00000;
        }
    </style>
</head>
<body>

<div class="welcome-container">
    <img src="{{ asset('images/spicyMaguroLogo.jpg') }}" alt="Spicy Maguro Logo" class="logo">
    <div class="title">Welcome to Spicy Maguro</div>
    <div class="slogan">Where flavor meets precision.</div>

    <div class="d-grid gap-2 mt-4">
        <a href="{{ route('login.form') }}" class="btn btn-maroon btn-lg">Login</a>
        <a href="{{ route('register.form') }}" class="btn btn-outline-secondary btn-lg">Register</a>
    </div>
</div>

</body>
</html>
