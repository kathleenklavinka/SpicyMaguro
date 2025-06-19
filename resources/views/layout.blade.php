<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spicy Maguro</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 240px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
        }
        .sidebar .profile {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #495057;
        }
        .sidebar .profile img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        .sidebar .profile h6 {
            margin-top: 10px;
            margin-bottom: 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background-color: white;
            padding: 15px 30px;
            border-bottom: 1px solid #dee2e6;
        }
        .content {
            padding: 30px;
            flex-grow: 1;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="profile">
        @auth
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff" alt="Avatar">
            <h6>{{ Auth::user()->name }}</h6>
            <small>{{ Auth::user()->email }}</small>
        @endauth
    </div>
    <a href="{{ route('stock.tampil') }}">📦 Stock</a>
    <a href="{{ route('penjualan.tampil') }}">💰 Penjualan</a>
    <a href="{{ route('supplier.tampil') }}">🚚 Supplier</a>
    <a href="{{ route('user.tampil') }}">🔒 User</a>
    <form action="{{ route('logout') }}" method="POST" class="text-center mt-3">
        @csrf
        <button class="btn btn-danger btn-sm">Logout</button>
    </form>
</div>

<div class="main-content">
    <div class="topbar">
        <h5 class="mb-0">Spicy Maguro Dashboard</h5>
    </div>

    <div class="content">
        @yield('konten')
    </div>
</div>

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#stockTable').DataTable();
        $('#penjualanTable').DataTable();
        $('#supplierTable').DataTable();
        $('#userTable').DataTable();
    });
</script>

@yield('scripts') <!-- Supaya toast jalan -->
</body>
</html>
