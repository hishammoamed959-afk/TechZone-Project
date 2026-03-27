// js/main.js

const defaultProducts = [
    // Tech Products with WORKING images
    { id: 1, name: "Wireless Headphones", price: 99.99, image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&q=80", category: "Audio" },
    { id: 2, name: "Smart Fitness Watch", price: 149.99, image: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80", category: "Wearables" },
    { id: 4, name: "Mechanical Keyboard", price: 129.99, image: "https://images.unsplash.com/photo-1595225476474-87563907a212?w=500&q=80", category: "Accessories" },
    { id: 5, name: "4K Action Camera", price: 199.99, image: "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=500&q=80", category: "Cameras" },
    { id: 6, name: "Bluetooth Speaker", price: 59.99, image: "https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500&q=80", category: "Audio" }
];

// Temporarily uncomment this line (remove the //) to reset everything on page load
// This will force the products to reload with the new links.
// localStorage.clear(); 

if (!localStorage.getItem('products')) {
    localStorage.setItem('products', JSON.stringify(defaultProducts));
}

if (!localStorage.getItem('cart')) {
    localStorage.setItem('cart', JSON.stringify([]));
}

function updateCartBadge() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const badge = document.getElementById('cart-badge');
    if(badge) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        badge.textContent = totalItems;
    }
}

document.addEventListener('DOMContentLoaded', updateCartBadge);