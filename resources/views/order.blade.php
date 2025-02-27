<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="{{ asset('/asset/css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/Home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/cart.css') }}">
</head>
<body>
    @include('include.nav')

    <main>
        <div class="product">
            <div class="product-image">
                <img src="{{ asset($foodItem->image) }}" alt="{{ $foodItem->name }}">
            </div>
            
            <div class="product-tag">
                <div class="product-info">
                    <h1>{{ $foodItem->name }}</h1>
                    <div class="price">${{ number_format($foodItem->price, 2) }}</div>

                    <div class="product-rating">
                        @for($i = 0; $i < floor($foodItem->rating); $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                        @if($foodItem->rating - floor($foodItem->rating) >= 0.5)
                            <i class="fa-solid fa-star-half-stroke"></i>
                        @endif
                    </div>
                    
                    <div class="quantity-container">
                        <label for="quantity">Quantity:</label>
                        <div class="quantity-buttons">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" class="quantity-btn {{ $i == 1 ? 'active' : '' }}" data-value="{{ $i }}">
                                    {{ $i }}
                                </button>
                            @endfor
                            <input type="hidden" id="quantity" name="quantity" value="1">
                        </div>
                    </div>

                    <div class="product-buttons">
                        <form id="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="name" value="{{ $foodItem->name }}">
                            <input type="hidden" name="price" value="{{ $foodItem->price }}">
                            <input type="hidden" name="image" value="{{ $foodItem->image }}">
                            <input type="hidden" name="quantity" id="form-quantity" value="1">
                            <button type="submit" class="btn-cart">
                                <i class="fa-solid fa-cart-shopping add-to-cart"></i> Add to Cart
                            </button>
                        </form>
                        <button type="button" class="btn-buy" onclick="buyNow({{ $foodItem->id }})">
                            <i class="fa fa-bolt"></i> Buy Now
                        </button>
                        <a href="#" class="btn-contact">
                            <i class="fa fa-phone"></i> Contact Us
                        </a>
                    </div>

                    <div id="cart-message" style="display: none;"></div>
                    <div id="buy-now-message" style="display: none;"></div>
                </div>
                <div class="product-follows">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
            </div>
        </div>
        
        <div class="product-tabs">
            <button class="tab-link active" onclick="toggleTab(event, 'description')">Description</button>
            <button class="tab-link" onclick="toggleTab(event, 'reviews')">Reviews</button>
            <button class="tab-link" onclick="toggleTab(event, 'additional-info')">Additional Info</button>
        </div>

        <div id="description" class="tab-content active">
            <p>Fresh and delicious, with an appealing color and an irresistible aroma.</p>
            <p>Expertly prepared to retain the natural taste of the ingredients, offering an exceptional dining experience.</p>
            <p>This dish has a rich and well-balanced flavor with perfectly blended spices.</p>
            <p>Made with fresh and high-quality ingredients, carefully cooked to preserve both taste and nutrition.</p>
        </div>
        <div id="reviews" class="tab-content">
            @auth
                <form action="{{ route('order.storeReview', ['id' => $foodItem->id]) }}" method="POST">
                    @csrf
                    <div>
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" class="comment-box" rows="4"></textarea>
                    </div>
                    <div>
                        <label for="rating">Rating:</label>
                        <div class="star-rating">
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="fa-solid fa-star"></label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="fa-solid fa-star"></label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="fa-solid fa-star"></label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="fa-solid fa-star"></label>
                            <input type="radio" id="1-stars" name="rating" value="1" />
                            <label for="1-stars" class="fa-solid fa-star"></label>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Submit Review</button>
                </form>
            @else
                <p><a href="{{ route('login') }}">Login</a> to submit a review.</p>
            @endauth

            <div class="reviews-list">
                @foreach($reviews as $review)
                    <div class="review-item">
                        <p><strong>{{ $review->user->name }}</strong> - {{ $review->rating }} <i class="fa-solid fa-star"></i></p>
                        <p>{{ $review->comment }}</p>
                        <p><small>{{ $review->created_at->format('d/m/Y H:i') }}</small></p>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="additional-info" class="tab-content">
            <p>Product information is being updated...</p>
        </div>

        <div class="related-products">
            <h2>Related Products</h2>
            <div class="product-gallery">
                @foreach($relatedProducts as $product)
                    <div class="product-item">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                        <p class="related-price">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('order.show', ['id' => $product->id]) }}" class="btn-view">View Now</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    @include('include.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/js/search.js') }}"></script>
    <script src="{{ asset('asset/js/user-menu.js') }}"></script>
    <script src="{{ asset('asset/js/order.js') }}"></script>
    <script src="{{ asset('asset/js/cart.js') }}"></script>
    <script>
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.quantity-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('quantity').value = this.dataset.value;
                document.getElementById('form-quantity').value = this.dataset.value;
            });
        });

        document.querySelector('#add-to-cart-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const jsonData = {};
            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-message').style.display = 'block';
                document.getElementById('cart-message').innerText = data.message;
                setTimeout(() => {
                    document.getElementById('cart-message').style.display = 'none';
                }, 3000);
            })
            .catch(error => {
                console.error('Error adding item to cart:', error);
            });
        });

        function buyNow(foodItemId) {
            const quantity = document.getElementById('quantity').value;

            fetch('{{ route('order.buyNow') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ foodItemId, quantity })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('buy-now-message').style.display = 'block';
                document.getElementById('buy-now-message').innerText = data.message;
                setTimeout(() => {
                    document.getElementById('buy-now-message').style.display = 'none';
                }, 3000);
            })
            .catch(error => {
                console.error('Error placing order:', error);
            });
        }
    </script>
</body>
</html>