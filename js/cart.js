document.addEventListener('DOMContentLoaded', () => {
    const cartContainer = document.getElementById('cart-items-container');
    const subtotalElement = document.getElementById('cart-subtotal');
    const totalElement = document.getElementById('cart-total');
    const checkoutBtn = document.getElementById('checkout-btn');

    function renderCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartContainer.innerHTML = '';
        let total = 0;

        if (cart.length === 0) {
            cartContainer.innerHTML = `
                <div class="text-center py-5">
                    <h4 class="text-muted">Your cart is currently empty.</h4>
                </div>`;
            checkoutBtn.classList.add('disabled');
        } else {
            checkoutBtn.classList.remove('disabled');
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                cartContainer.innerHTML += `
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="row g-0 align-items-center p-3">
                            <div class="col-md-2 text-center">
                                <img src="${item.image}" class="img-fluid rounded" alt="${item.name}" style="max-height: 80px; object-fit: cover;">
                            </div>
                            <div class="col-md-4 px-3 mt-3 mt-md-0">
                                <h6 class="mb-1 fw-bold">${item.name}</h6>
                                <small class="text-muted d-block">$${item.price.toFixed(2)} each</small>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-center mt-3 mt-md-0">
                                <button class="btn btn-sm btn-outline-secondary px-3" onclick="changeQuantity(${index}, -1)">-</button>
                                <span class="mx-3 fw-bold">${item.quantity}</span>
                                <button class="btn btn-sm btn-outline-secondary px-3" onclick="changeQuantity(${index}, 1)">+</button>
                            </div>
                            <div class="col-md-2 text-center mt-3 mt-md-0 fw-bold text-primary">
                                $${itemTotal.toFixed(2)}
                            </div>
                            <div class="col-md-1 text-end mt-3 mt-md-0">
                                <button class="btn btn-sm btn-danger rounded-circle" onclick="removeItem(${index})">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        subtotalElement.textContent = `$${total.toFixed(2)}`;
        totalElement.textContent = `$${total.toFixed(2)}`;
        updateCartBadge(); 
    }

    // Change item quantity
    window.changeQuantity = function(index, change) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart[index].quantity += change;
        if (cart[index].quantity <= 0) {
            cart.splice(index, 1); // Remove if quantity drops to 0
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    };

    // Remove item completely
    window.removeItem = function(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    };

    renderCart();
});