<?php 
// 1. ربط قاعدة البيانات
include 'db_connect.php'; 

// 2. جلب المنتجات من الداتابيز (الجديد يظهر الأول)
$sql = "SELECT * FROM products ORDER BY id DESC"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone | All Products</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        .product-card { transition: all 0.3s ease; border: none !important; }
        .product-card:hover { transform: translateY(-10px); shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .card-img-top { transition: transform 0.5s ease; }
        .product-card:hover .card-img-top { transform: scale(1.1); }
        #cart-badge { font-size: 0.7rem; padding: 4px 6px; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html"><i class="fa-solid fa-microchip text-primary"></i> TECHZONE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link fw-semibold" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
                
                <div class="d-flex align-items-center">
                    <a href="add-product.php" class="btn btn-primary btn-sm me-3 fw-bold rounded-pill px-3">
                        <i class="fa-solid fa-plus-circle me-1"></i> Add Product
                    </a>
                    <a href="cart.html" class="btn btn-outline-dark position-relative rounded-circle">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-uppercase mb-2">Our Tech Inventory</h2>
            <p class="text-muted">Discover the latest gear in our store</p>
            <hr class="mx-auto" style="width: 50px; height: 3px; background: #0d6efd;">
        </div>
        
        <div class="row g-4" id="products-container">
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card h-100 shadow-sm product-card">
                            <div class="position-relative overflow-hidden" style="border-radius: 15px 15px 0 0;">
                                <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 250px; object-fit: cover;">
                                <span class="position-absolute top-0 end-0 m-2 badge bg-primary px-3 py-2 rounded-pill"><?php echo $row['category']; ?></span>
                            </div>
                            <div class="card-body text-center p-4">
                                <h5 class="card-title fw-bold mb-2"><?php echo $row['name']; ?></h5>
                                <p class="text-primary fs-5 fw-bold mb-3">$<?php echo number_format($row['price'], 2); ?></p>
                                
                                <button class="btn btn-dark w-100 rounded-pill py-2 mb-2 fw-bold" 
                                        onclick="addToCart('<?php echo $row['name']; ?>', <?php echo $row['price']; ?>, '<?php echo $row['image_url']; ?>')">
                                    <i class="fa-solid fa-cart-plus me-2"></i> Add to Cart
                                </button>

                                <button class="btn btn-outline-danger w-100 rounded-pill py-1 btn-sm fw-semibold" 
                                        onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                    <i class="fa-solid fa-trash-can me-1"></i> Delete Product
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "
                <div class='col-12 text-center py-5'>
                    <i class='fa-solid fa-box-open fa-4x text-muted mb-3'></i>
                    <h3 class='fw-bold'>Store is Empty!</h3>
                    <p class='text-muted'>Start adding some cool gadgets now.</p>
                    <a href='add-product.php' class='btn btn-primary mt-3 px-4 rounded-pill'>Add First Product</a>
                </div>";
            }
            ?>
        </div>
    </main>

    <footer class="bg-white text-dark py-4 mt-auto border-top">
        <div class="container text-center">
            <p class="mb-0 small text-muted">&copy; 2026 TechZone Store. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // 1. وظيفة الإضافة للسلة بـ Toast رايق
    function addToCart(name, price, image) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let existingProduct = cart.find(item => item.name === name);
        
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push({ name, price, image, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartBadge();

        // الـ Toast الرايق
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: 'success',
            title: `<span style="font-family: 'Inter', sans-serif;">${name} added to cart!</span>`,
            background: '#ffffff',
            color: '#333'
        });
    }

    // 2. وظيفة تأكيد الحذف بـ Popup احترافي
    function confirmDelete(id) {
        Swal.fire({
            title: 'Wait a second!',
            text: "Do you really want to delete this product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it',
            background: '#ffffff',
            borderRadius: '15px'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'delete_product.php?id=' + id;
            }
        });
    }

    // 3. تحديث الـ Badge
    function updateCartBadge() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        let badge = document.getElementById('cart-badge');
        if (badge) {
            badge.innerText = totalItems;
        }
    }

    window.onload = updateCartBadge;
    </script>

    <?php $conn->close(); ?>
</body>
</html>