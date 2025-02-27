<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="asset/css/admin.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            width: 100%;
        }
        .card {
            height: 100%;
            width: 100%;
        }
        #wrapper {
            display: flex;
            height: 100%;
        }
        .sidebar {
            width: 300px;
        }
        .content {
            flex: 1;
            overflow-y: auto;
        }
        .card {
            margin-bottom: 0;
        }
        a {
            text-decoration: none;
        }
        .logo img {
            height: 40px;
            width: auto;
            padding-left: 50px;
            margin-bottom: 30px;
            margin-top: 30px;   
        }
    </style>
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
        <div class="card mt-4">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-3">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h3 class="mb-0">Edit User</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password (leave blank to keep current password)</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="is_admin">Role</label>
                                    <select class="form-control" id="is_admin" name="is_admin">
                                        <option value="0" {{ $user->is_admin ? '' : 'selected' }}>User</option>
                                        <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="asset/js/admin.js"></script>

</body>
</html>