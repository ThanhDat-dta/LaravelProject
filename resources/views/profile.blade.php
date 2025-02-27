@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">

<div class="profile-container">
    <!-- Nút đóng -->
    <span class="close-btn" id="closeBtn">&times;</span>

    <!-- Ảnh đại diện & thông tin -->
    <div class="profile-header">
        <img src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : asset('images/default-avatar.png') }}" 
             class="profile-avatar" alt="Avatar">
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->email }}</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form chỉnh sửa -->
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
        @csrf

        <div class="form-group">
            <label>Full Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label>Email Address:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required>
        </div>

        <div class="form-group">
            <label>New Password:</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <label>Confirm New Password:</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="form-group">
            <label>Choose Avatar:</label>
            <input type="file" name="avatar">
        </div>

        <button type="submit" class="save-btn">Save Changes</button>
    </form>
</div>

<!-- Thêm JavaScript để đóng trang khi nhấn "X" -->
<script>
    document.getElementById("closeBtn").addEventListener("click", function() {
        // Điều hướng về trang chủ khi đóng
        window.location.href = "{{ url('/') }}"; // Quay về trang chủ
    });
</script>

@endsection