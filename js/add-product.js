// js/add-product.js

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('add-product-form');
    const imageInput = document.getElementById('p-image');
    const imagePreview = document.getElementById('image-preview');
    const previewContainer = document.getElementById('image-preview-container');

    // Live Image Preview
    imageInput.addEventListener('input', () => {
        if (imageInput.value) {
            imagePreview.src = imageInput.value;
            previewContainer.classList.remove('d-none');
        } else {
            previewContainer.classList.add('d-none');
        }
    });

    // Form Submission
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        // 1. Get values from inputs
        const name = document.getElementById('p-name').value;
        const price = parseFloat(document.getElementById('p-price').value);
        const category = document.getElementById('p-category').value;
        const image = document.getElementById('p-image').value;

        // 2. Create new product object
        const newProduct = {
            id: Date.now(), // Unique ID based on timestamp
            name: name,
            price: price,
            category: category,
            image: image
        };

        // 3. Get existing products from LocalStorage
        const products = JSON.parse(localStorage.getItem('products')) || [];

        // 4. Add the new product to the array
        products.push(newProduct);

        // 5. Save back to LocalStorage
        localStorage.setItem('products', JSON.stringify(products));

        // 6. Success message and redirect
        alert('Success! The product has been added to your store.');
        window.location.href = 'products.html'; // Go see the result!
    });
});