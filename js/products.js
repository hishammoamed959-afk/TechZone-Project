document.addEventListener('DOMContentLoaded', () => {
    const productsContainer = document.getElementById('products-container');
    const products = JSON.parse(localStorage.getItem('products')) || [];

    // Render products dynamically
    function renderProducts() {
        productsContainer.innerHTML = '';
        products.forEach(product => {
            productsContainer.innerHTML += `
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card product-card h-100">
                        <img src="${product.image}" class="card-img-top" alt="${product.name}">
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary mb-2 align-self-start">${product.category}</span>
                            <h5 class="card-title fw-bold">${product.name}</h5>
                            <p class="card-text text-primary fw-bold fs-5 mb-4">$${product.price.toFixed(2)}</p>
                            <button onclick="addToCart(${product.id})" class="btn btn-primary mt-auto">
                                <i class="fa-solid fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    // Add to cart logic
    window.addToCart = function(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const product = products.find(p => p.id === productId);
        const existingItem = cart.find(item => item.id === productId);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ ...product, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartBadge(); // Update the navbar badge
        
        // Simple visual feedback
        alert(`${product.name} has been added to your cart!`);
    };

    renderProducts();
});