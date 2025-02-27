<section id="Home">
    <nav>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="#">
        </div>

        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#About">About</a></li>
            <li><a href="#Menu">Menu</a></li>
            <li><a href="#Gallary">Gallary</a></li>
            <li><a href="#Review">Review</a></li>
            <li><a href="#Order">Booking</a></li>
        </ul>

        <div class="search-container">
            <input type="text" name="query" id="search-box" placeholder="Search Here ...">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <div id="search-results" class="search-results-container"></div>
        </div>

        <div class="icon">
            <i class="fa-solid fa-heart"></i>
            <i id="cart-icon-header" class="fa-solid fa-cart-shopping"><span id="cart-count"><sup></sup></span></i>
        </div>

        <div class="user-icon" onclick="toggleAccountPopup()">
            <img src="{{ asset('images/user.png') }}" alt="#">
            <div id="account-popup" class="account-popup">
                <span class="close-btn" onclick="toggleAccountPopup()">&times;</span>
                <ul class="account-popup-content">
                    <li><a href="/profile">Profile</a></li>
                    <li><a href="/order-history">Order History</a></li>
                    <li><a href="/settings">Setting</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</section>