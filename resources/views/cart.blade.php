<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/asset/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/Home.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('include.nav')

    <div class="cart-container">
        <h1>Your Cart</h1>
        @if ($cart && $cart->items->count())
            <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
                @csrf
                <ul class="cart-items">
                    @foreach ($cart->items as $item)
                        <li class="cart-item" data-item-id="{{ $item->id }}">
                            <input type="checkbox" name="items[]" value="{{ $item->id }}" class="cart-item-checkbox" data-price="{{ $item->price }}" onchange="updateTotal()">
                            <input type="hidden" name="quantity_{{ $item->id }}" value="{{ $item->quantity }}" class="cart-item-quantity">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="cart-item-image">
                            <div class="cart-item-details">
                                <h2>{{ $item->name }}</h2>
                                <p class="cart-item-price">Price: $<span class="price">{{ $item->price }}</span></p>
                                <div class="cart-item-quantity">
                                    <label for="quantity_{{ $item->id }}"></label>
                                    <div class="quantity-buttons">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button type="button" class="quantity-btn {{ $item->quantity == $i ? 'selected' : '' }}" data-item-id="{{ $item->id }}" data-quantity="{{ $i }}" onclick="updateQuantity({{ $item->id }}, {{ $i }})">{{ $i }}</button>
                                        @endfor
                                    </div>
                                </div>
                                <p class="cart-item-total-price">Total: $<span class="total-price">{{ $item->price * $item->quantity }}</span></p>
                            </div>
                            <button class="remove-item-btn" type="button" onclick="removeItem({{ $item->id }})"><i class="fa-solid fa-trash"></i></button>
                        </li>
                    @endforeach
                </ul>
                <div class="cart-total">
                    <h3>Total: $<span id="total-price">0.00</span></h3>
                    <button type="button" class="checkout-btn" onclick="submitCheckout()">Proceed to Checkout</button>
                </div>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>

    @include('include.footer')

    <script>
        function updateTotal() {
            const checkboxes = document.querySelectorAll('.cart-item-checkbox:checked');
            let total = 0;
            checkboxes.forEach(checkbox => {
                const price = parseFloat(checkbox.getAttribute('data-price'));
                const itemId = checkbox.value;
                const quantity = parseInt(document.querySelector('.quantity-btn.selected[data-item-id="' + itemId + '"]').textContent);
                total += price * quantity;
            });
            document.getElementById('total-price').textContent = total.toFixed(2);
        }

        function updateQuantity(itemId, quantity) {
            document.querySelectorAll('.quantity-btn[data-item-id="' + itemId + '"]').forEach(btn => {
                btn.classList.remove('selected');
            });
            const selectedBtn = document.querySelector('.quantity-btn[data-item-id="' + itemId + '"][data-quantity="' + quantity + '"]');
            selectedBtn.classList.add('selected');

            const price = parseFloat(selectedBtn.closest('.cart-item').querySelector('.price').textContent);
            const totalPriceElement = selectedBtn.closest('.cart-item').querySelector('.total-price');
            totalPriceElement.textContent = (price * quantity).toFixed(2);

            const checkbox = document.querySelector('.cart-item-checkbox[value="' + itemId + '"]');
            if (checkbox.checked) {
                updateTotal();
            }

            // Update the hidden input value
            document.querySelector('.cart-item-quantity[name="quantity_' + itemId + '"]').value = quantity;
        }

        function removeItem(itemId) {
            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to remove item.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function submitCheckout() {
            const form = document.getElementById('checkout-form');
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Initialize total price on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateTotal();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/js/search.js') }}"></script>
    <script src="{{ asset('asset/js/user-menu.js') }}"></script>
    <script src="{{ asset('asset/js/cart.js') }}"></script>
</body>
</html>