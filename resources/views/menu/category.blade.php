<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - {{ $category }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/asset/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/menu.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('include.nav')

    <div class="container mt-5">
        <h1 class="mb-4">{{ $category }} Menu</h1>
        <div class="menu_box">
            @foreach($foods as $food)
            <div class="menu_container">
                <div class="menu_card food-item" data-name="{{ $food->name }}" data-price="{{ $food->price }}">

                    <div class="menu_image" >
                        <img src="{{ asset($food->image) }}" alt="{{ $food->name }}">
                    </div>

                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                        <i id="cart-icon-header" class="fa-solid fa-cart-shopping"><span id="cart-count"><sup></sup></span></i>
                    </div>

                    <div class="menu_info">
                        <h2>{{ $food->name }}</h2>
                        <p>{{ $food->description }}</p>
                        <h3>${{ $food->price }}</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="{{ route('order.show', ['id' => $food->id]) }}" class="menu_btn">Order Now</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        @if($foods->isEmpty())
            <p class="text-center mt-3">No foods found in this category.</p>
        @endif
    </div>

    @include('include.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/js/search.js') }}"></script>
    <script src="{{ asset('asset/js/user-menu.js') }}"></script>
    <script src="{{ asset('asset/js/cart.js') }}"></script>
</body>
</html>