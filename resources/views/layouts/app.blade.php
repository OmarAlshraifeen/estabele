<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h5>Navigation</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('admins.index') }}" class="nav-link">Admins</a></li>
                <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users</a></li>
                <li class="nav-item"><a href="{{ route('stables.index') }}" class="nav-link">Stables</a></li>
                <li class="nav-item"><a href="{{ route('horses.index') }}" class="nav-link">Horses</a></li>
                <li class="nav-item"><a href="{{ route('paths.index') }}" class="nav-link">Paths</a></li>
                <li class="nav-item"><a href="{{ route('bookings.index') }}" class="nav-link">Bookings</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
