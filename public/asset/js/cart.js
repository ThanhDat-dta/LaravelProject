document.addEventListener('DOMContentLoaded', function() {
    console.log("Script loaded!");

    const menuCartIcons = document.querySelectorAll('.menu_card .fa-cart-shopping.add-to-cart');
    const homeCartIcon = document.querySelector('#cart-icon-header');
    const cartCountElement = document.querySelector("#cart-count");

    fetch('/cart/count', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.count > 0) {
            cartCountElement.innerHTML = `<sup>${data.count}</sup>`;
        }
    })
    .catch(error => {
        console.error('❌ Lỗi khi lấy số lượng món trong giỏ hàng:', error);
    });

    menuCartIcons.forEach(icon => {
        icon.addEventListener('click', function(event) {
            event.preventDefault();

            const foodItem = this.closest('.food-item');
            if (!foodItem) {
                console.error('❌ Không tìm thấy phần tử food-item');
                return;
            }

            const itemName = foodItem.getAttribute('data-name');
            const itemPrice = foodItem.getAttribute('data-price');
            const itemImage = foodItem.querySelector('img').getAttribute('src');

            console.log("🛒 Thêm vào giỏ hàng:", itemName, itemPrice, itemImage);

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    name: itemName,
                    price: itemPrice,
                    quantity: 1,
                    image: itemImage
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert('✅ ' + data.message);
                } else {
                    alert('❌ Có lỗi xảy ra khi thêm vào giỏ hàng');
                }
                cartCountElement.innerHTML = `<sup>${parseInt(cartCountElement.textContent) + 1}</sup>`;
            })
            .catch(error => {
                console.error('❌ Lỗi khi thêm vào giỏ hàng:', error);
            });
        });
    });

    if (homeCartIcon) {
        homeCartIcon.addEventListener('click', function() {
            window.location.href = '/cart';
        });
    } else {
        console.warn("⚠ Không tìm thấy #cart-icon-header");
    }
});