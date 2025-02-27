<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="{{ asset('/asset/css/order-history.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/Home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @include('include.nav')

    <div class="order-history-container">
        <h1>Order History</h1>
        @if($orders->isEmpty())
            <p>You have no orders.</p>
        @else
            @foreach($orders as $order)
                <div class="order-card">
                    <div class="order-header">
                        <h2>Order</h2>
                        <p>Order Date: {{ $order->created_at->format('d/m/Y') }}</p>
                        <p>Status: <span class="order-status">{{ $order->status }}</span></p>
                    </div>
                    <div class="order-items">
                        @foreach($order->items as $item)
                            <div class="order-item">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="order-item-image">
                                <div class="order-item-details">
                                    <h3>{{ $item->name }}</h3>
                                    <p>Price: ${{ number_format($item->price, 2) }}</p>
                                    <p>Quantity: {{ $item->quantity }}</p>
                                    <p>Total: ${{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @include('include.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/js/search.js') }}"></script>
    <script src="{{ asset('asset/js/user-menu.js') }}"></script>
    <script src="{{ asset('asset/js/cart.js') }}"></script>
</body>
</html>