<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/asset/css/admin.css">
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

    <!-- Content -->
    <div class="container-fluid px-4 w-100">
        <div class="row mt-3 w-100">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="mb-0">Settings</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/asset/js/admin.js"></script>

</body>
</html>