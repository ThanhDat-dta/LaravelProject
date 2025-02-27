<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/asset/css/Home.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('include.nav')

    <div class="checkout-container">
        <h1>Checkout</h1>
        <ul class="checkout-items">
            @foreach ($order->items as $item)
                <li class="checkout-item">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="checkout-item-image">
                    <div class="checkout-item-details">
                        <h2>{{ $item->name }}</h2>
                        <p>Price: ${{ $item->price }}</p>
                        <p>Quantity: {{ $item->quantity }}</p>
                        <p>Total: ${{ $item->price * $item->quantity }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="checkout-total">
            <h3>Total: ${{ $order->items->sum(function($item) { return $item->price * $item->quantity; }) }}</h3>
            <button type="button" class="confirm-btn">Confirm Purchase</button>
        </div>
    </div>

    @include('include.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/js/search.js') }}"></script>
    <script src="{{ asset('asset/js/user-menu.js') }}"></script>
    <script src="{{ asset('asset/js/checkout.js') }}"></script>
</body>
</html>