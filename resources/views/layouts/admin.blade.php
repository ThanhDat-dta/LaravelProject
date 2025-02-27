<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="asset/css/admin.css">
</head>
<body>

<!-- Sidebar -->
<div class="d-flex" id="wrapper">
    <div class="bg-primary text-white sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="#">
        </div>
        <ul class="list-unstyled px-3">
            <li><a href="{{ route('admin.dashboard_admin') }}" class="text-white d-block py-2"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}" class="text-white d-block py-2"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="{{ route('admin.products.index') }}" class="text-white d-block py-2"><i class="fas fa-box"></i> Product</a></li>
            <li><a href="{{ route('admin.reviews.index') }}" class="text-white d-block py-2"><i class="fas fa-comments"></i> Comment</a></li>
            <li><a href="{{ route('admin.settings') }}" class="text-white d-block py-2"><i class="fas fa-cogs"></i> Settings</a></li>
            <li class="mt-auto" style="padding-top: 360px">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-secondary text-white w-100 text-left"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>

<h1>Wellcome back!</h1>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Custom JS -->
<script src="asset/js/admin.js"></script>

</body>
</html>
