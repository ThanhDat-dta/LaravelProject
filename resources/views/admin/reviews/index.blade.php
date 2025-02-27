<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Management</title>
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
                        <h3 class="mb-0">Review List</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Food</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->user ? $review->user->name : 'N/A' }}</td>
                                        <td>{{ $review->food ? $review->food->name : 'N/A' }}</td>
                                        <td>{{ $review->comment }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>
                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                            <form action="{{ route('admin.reviews.reply', $review->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <input type="text" name="reply" placeholder="Reply..." required>
                                                <button type="submit" class="btn btn-sm btn-primary">Reply</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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