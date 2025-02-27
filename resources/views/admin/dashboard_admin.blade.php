<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-secondary text-white w-100 text-left"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="container-fluid px-4">
        <div class="row mt-3">
            <!-- Thống kê các món ăn đã bán -->
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">FOOD SOLD</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $foodSold }}</h5>
                        <p class="card-text text-white-50">Total food items sold</p>
                    </div>
                </div>
            </div>

            <!-- Hoạt động của khách hàng -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">CUSTOMER ACTIVITY</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $customerActivity }}</h5>
                        <p class="card-text text-white-50">Active customers</p>
                    </div>
                </div>
            </div>

            <!-- Các món ăn bán chạy -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">BEST SELLING FOODS</div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($bestSellingFoods as $food)
                                <li>{{ $food->name }} - {{ $food->orders_count }} orders</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Doanh thu theo ngày tháng năm -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">REVENUE</div>
                    <div class="card-body">
                        <h5 class="card-title">${{ $revenue }}</h5>
                        <p class="card-text text-white-50">Total revenue</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Placeholder -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Sales Overview</h5>
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Custom JS -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($revenueData->pluck('date')) !!},
            datasets: [{
                label: 'Revenue',
                data: {!! json_encode($revenueData->pluck('total')) !!},
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

</body>
</html>