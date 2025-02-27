<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Shop Giày') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4>Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}">📊 Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.products') }}">👟 Quản lý Sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.orders') }}">📦 Quản lý Đơn hàng</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.users') }}">👤 Quản lý Người dùng</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger w-100 mt-2">🚪 Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Nội dung -->
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
