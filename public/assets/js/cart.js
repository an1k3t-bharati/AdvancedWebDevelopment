document.addEventListener('DOMContentLoaded', function () {
document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const productPrice = this.dataset.price;
            const productImage = this.dataset.image;

            fetch('/cart/ajaxAdd', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `product_id=${productId}&product_name=${encodeURIComponent(productName)}&product_price=${productPrice}&product_image=${encodeURIComponent(productImage)}`
            })
            .then(response => response.json())
            .then(data => {
                console.log("🔁 Response:", data);
                if (data.status === 'success') {
                    const cartBadge = document.querySelector('.bi-cart3 + .badge') || document.querySelector('.nav-link .badge');
                    if (cartBadge) {
                        cartBadge.textContent = data.cart_count;
                    } else {
                        const cartLink = document.querySelector('.bi-cart3')?.parentElement;
                        if (cartLink) {
                            const badge = document.createElement('span');
                            badge.className = "position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger";
                            badge.textContent = data.cart_count;
                            cartLink.appendChild(badge);
                        }
                    }
                    alert(data.message);
                } else {
                    alert(data.message);
                    window.location.href = '/user/login';
                }
            })
            .catch(error => {
                console.error("Fetch error:", error);
            });
        });
    });
});
