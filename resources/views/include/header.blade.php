<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>
    <link rel="stylesheet" href="{{ asset('/asset/css/Home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <!-- section sẽ chỉ chứa phần nav -->
<section id="Home">
    <nav>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="#">
        </div>

        <ul>
            <li><a href="#Home">Home</a></li>
            <li><a href="#About">About</a></li>
            <li><a href="#Menu">Menu</a></li>
            <li><a href="#Gallery">Gallery</a></li>
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
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<!-- Phần Main tách ra riêng -->
<main>
    <div class="main1">
        <div class="text">
            <div class="men_text">
                <h1>Get Fresh<span>Food</span><br>in an Easy Way</h1>
            </div>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse reiciendis quaerat nobis
                deleniti amet non inventore. Reprehenderit recusandae voluptatibus minus tenetur itaque numquam
                cum quos dolorem maxime. Quas, quaerat nisi. Lorem ipsum dolor sit, amet consectetur adipisicing
                elit. Cumque facilis, quaerat cupiditate nulla quibusdam quo sunt esse tempore inventore vel
                voluptate, amet laudantium adipisci veniam nihil quam molestiae omnis mollitia.
            </p>
        
            <div class="main_btn">
                <a href="#">Order Now</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div class="main_image">
            <img src="{{ asset('images/main_img.png') }}" alt="#">
        </div>
    </div>
</main>




    <!--About-->

    <div class="about" id="About">
        <div class="about_main">

            <div class="image">
                <img src="{{ asset('images/Food-Plate.png') }}" alt="#">
            </div>

            <div class="about_text">
                <h1><span>About</span>Us</h1>
                <h3>Why Choose us?</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, est. Doloremque 
                    sapiente veritatis laboriosam corrupti optio et maxime. Ad, amet explicabo eaque labore 
                    cupiditate quasi nostrum nemo recusandae id quibusdam? Lorem ipsum dolor sit amet 
                    consectetur adipisicing elit. Doloremque ab, dolores pariatur cum exercitationem, illo nisi 
                    veritatis vitae ea deleniti fugiat quisquam tempora, accusantium corrupti excepturi optio. 
                    Inventore, cupiditate recusandae.
                </p>
            </div>

        </div>

        <a href="#" class="about_btn">Order Now</a>

    </div>

    <!--Browes-Menu-->

    <div class="browse-menu">
        <div class="browse-our-menu">
            <h1>Browse Our <span>Menu</span></h1>
        </div>
        <div class="br-menu">
    
            <div class="container">
                <div class="bg-img">
                    <img src="{{ asset('images/breakfast.png') }}" alt="#">
                </div>
                <h2><a href="{{ route('menu.category', 'Breakfast') }}">Breakfast</a></h2>
                <p>In the new era of technology we <br> look in the future with certainty <br> and pride for our life.</p>
                <a href="{{ route('menu.category', 'Breakfast') }}"><p>Explore Menu</p></a>
            </div>
    
            <div class="container">
                <div class="bg-img">
                    <img src="{{ asset('images/hot-dish.png') }}" alt="#">
                </div>
                <h2><a href="{{ route('menu.category', 'Main Dishes') }}">Main Dishes</a></h2>
                <p>In the new era of technology we <br> look in the future with certainty <br> and pride for our life.</p>
                <a href="{{ route('menu.category', 'Main Dishes') }}"><p>Explore Menu</p></a>
            </div>
    
            <div class="container">
                <div class="bg-img">
                    <img src="{{ asset('images/cocktail.png') }}" alt="#">
                </div>
                <h2><a href="{{ route('menu.category', 'Drinks') }}">Drinks</a></h2>
                <p>In the new era of technology we <br> look in the future with certainty <br> and pride for our life.</p>
                <a href="{{ route('menu.category', 'Drinks') }}"><p>Explore Menu</p></a>
            </div>
    
            <div class="container">
                <div class="bg-img">
                    <img src="{{ asset('images/cake.png') }}" alt="#">
                </div>
                <h2><a href="{{ route('menu.category', 'Desserts') }}">Desserts</a></h2>
                <p>In the new era of technology we <br> look in the future with certainty <br> and pride for our life.</p>
                <a href="{{ route('menu.category', 'Desserts') }}"><p>Explore Menu</p></a>
            </div>
    
        </div>
    </div>
    
    <!--Menu-->

    <div class="menu" id="Menu">
        <h1>Our<span>Menu</span></h1>

        <div class="menu_box">
            <div class="menu_card food-item" data-name="Burger" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/burger.jpg') }}" alt="Burger">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Burger</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 1]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 
            
            <div class="menu_card food-item" data-name="Pasta" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/pasta.jpg') }}" alt="Pasta">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Pasta</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 2]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Lasagna" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/lasagna.webp') }}" alt="Lasagna">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Lasagna</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 3]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Drink" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/chocolate_Drink.jpg') }}" alt="Drink">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Drink</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 4]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Pizza" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/pizza.jpg') }}" alt="Pizza">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Pizza</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 5]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Hot Dog" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/Hot_dog.jpg') }}" alt="Hot Dog">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Hot Dog</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 6]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Juse" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/juse.jpg') }}" alt="Juse">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Juse</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 7]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Biryani" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/biryani.webp') }}" alt="Biryani">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Biryani</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 8]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Chocolate" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/chocolate.jpg') }}" alt="Chocolate">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Chocolate</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 9]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Ice Cream" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/ice_cream.jpg') }}" alt="Ice Cream">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Ice Cream</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 10]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Spanchi" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/Spanchi.jpg') }}" alt="Spanchi">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Spanchi</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 11]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 

            <div class="menu_card food-item" data-name="Sandwich" data-price="20.00">

                <div class="menu_image">
                    <img src="{{ asset('images/sandwich.jpg') }}" alt="Sandwich">
                </div>

                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping add-to-cart"></i>
                </div>

                <div class="menu_info">
                    <h2>Sandwich</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                    </p>
                    <h3>$20.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="{{ route('order.show', ['id' => 12]) }}" class="menu_btn">Order Now</a>
                </div>

            </div> 
            
        </div>

    </div>




    <!--Gallary-->

    <div class="gallary" id="Gallary">
        <h1>Our<span>Gallary</span></h1>

        <div class="gallary_image_box">
            <div class="gallary_image">
                <img src="{{ asset('images/gallary_1.jpg') }}" alt="#">

                <h3>Food</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="{{ asset('images/gallary_2.jpg') }}" alt="#">

                <h3>Food</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="{{ asset('images/gallary_3.jpg') }}" alt="#">

                <h3>Food</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="{{ asset('images/gallary_4.jpg') }}" alt="#">

                <h3>Food</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="{{ asset('images/gallary_5.jpg') }}" alt="#">

                <h3>Food</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="{{ asset('images/gallary_6.jpg') }}" alt="#">

                <h3>Food</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

        </div>

    </div>




    <!--Review-->

    <div class="review" id="Review">
        <h1>Customer<span>Review</span></h1>

        <div class="review_box">
            <div class="review_card">

                <div class="review_profile">
                    <img src="{{ asset('images/review_1.png') }}" alt="#">
                </div>

                <div class="review_text">
                    <h2 class="name">John Deo</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere 
                        blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti 
                        asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum, 
                        dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates 
                        repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo 
                        pariatur. Fuga aperiam impedit illo atque repellendus!
                    </p>

                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="{{ asset('images/review_2.png') }}" alt="#">
                </div>

                <div class="review_text">
                    <h2 class="name">John Deo</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere 
                        blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti 
                        asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum, 
                        dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates 
                        repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo 
                        pariatur. Fuga aperiam impedit illo atque repellendus!
                    </p>

                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="{{ asset('images/review_3.png') }}" alt="#">
                </div>

                <div class="review_text">
                    <h2 class="name">John Deo</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere 
                        blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti 
                        asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum, 
                        dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates 
                        repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo 
                        pariatur. Fuga aperiam impedit illo atque repellendus!
                    </p>

                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="{{ asset('images/review_4.png') }}" alt="#">
                </div>

                <div class="review_text">
                    <h2 class="name">John Deo</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere 
                        blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti 
                        asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum, 
                        dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates 
                        repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo 
                        pariatur. Fuga aperiam impedit illo atque repellendus!
                    </p>

                </div>

            </div>

        </div>

    </div>



    <!--Order-->

    <div class="order" id="Order">
        <h1><span>Book a table</span>Now</h1>

        <div class="order_main">

            <div class="order_image">
                <img src="{{ asset('images/order_image.png') }}" alt="#">
            </div>

            <form action="#">

                <div class="input">
                    <p>Name</p>
                    <input type="text" placeholder="you name">
                </div>

                <div class="input">
                    <p>Email</p>
                    <input type="email" placeholder="you email">
                </div>

                <div class="input">
                    <p>Number</p>
                    <input placeholder="you number">
                </div>

                <div class="input">
                    <p>How Much</p>
                    <input type="number" placeholder="how many order">
                </div>

                <div class="input">
                    <p>You Order</p>
                    <input placeholder="food name">
                </div>

                <div class="input">
                    <p>Address</p>
                    <input placeholder="you Address">
                </div>

                <a href="#" class="order_btn">Order Now</a>

            </form>

        </div>

    </div>



    <!--Team-->

    <div class="team">
        <h1>Our<span>Team</span></h1>

        <div class="team_box">
            <div class="profile">
                <img src="{{ asset('images/chef1.png') }}" alt="#">

                <div class="info">
                    <h2 class="name">Chef</h2>
                    <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

            <div class="profile">
                <img src="{{ asset('images/chef2.png') }}" alt="#">

                <div class="info">
                    <h2 class="name">Chef</h2>
                    <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

            <div class="profile">
               <img src="{{ asset('images/chef3.jpg') }}" alt="#">

                <div class="info">
                    <h2 class="name">Chef</h2>
                    <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

            <div class="profile">
                <img src="{{ asset('images/chef4.jpg') }}" alt="#">

                <div class="info">
                    <h2 class="name">Chef</h2>
                    <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>



    <!--Footer-->

    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>Location</h2>
                <p>Sri Lanka</p>
                <p>USA</p>
                <p>India</p>
                <p>Japan</p>
                <p>Italy</p>
            </div>

            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Home</p>
                <p>About</p>
                <p>Menu</p>
                <p>Gallary</p>
                <p>Order</p>
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+94 12 3456 789</p>
                <p>+94 25 5568456</p>
                <p>johndeo123@gmail.com</p>
                <p>foodshop123@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Our Service</h2>
                <p>Fast Delivery</p>
                <p>Easy Payments</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

        </div>

        <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> ThanhDat Code</span></p>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/js/search.js') }}"></script>
    <script src="{{ asset('asset/js/user-menu.js') }}"></script>
    <script src="{{ asset('asset/js/cart.js') }}"></script>
</body>
</html>