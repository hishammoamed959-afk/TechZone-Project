<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone | Premium Electronics Store</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">
                <i class="fa-solid fa-microchip text-primary"></i> TECHZONE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="cart.html" class="btn btn-dark position-relative rounded-pill px-4">
                        <i class="fa-solid fa-cart-shopping me-2"></i> Cart
                        <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">NEW ARRIVALS 2026</span>
                    <h1 class="display-3 fw-800 mb-4">Future of Tech <br> <span class="text-primary">In Your Hands.</span></h1>
                    <p class="lead mb-5 text-light opacity-75">Experience the next generation of gadgets. High-performance hardware, sleek designs, and smart integration for your daily life.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a href="products.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold rounded-pill">Explore Store</a>
                        <a href="about.html" class="btn btn-lg px-5 py-3 fw-bold rounded-pill border text-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5 bg-light border-bottom">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <i class="fa-solid fa-truck-fast fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold">Free Shipping</h5>
                    <p class="text-muted small">On all orders over $500</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-shield-halved fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold">Secure Payment</h5>
                    <p class="text-muted small">100% protected transactions</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-rotate-left fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold">Easy Returns</h5>
                    <p class="text-muted small">30-day money back guarantee</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white text-dark py-5 border-top mt-auto">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4"><i class="fa-solid fa-microchip text-primary"></i> TECHZONE</h5>
                    <p class="text-muted small">Leading the way in consumer electronics. We provide the highest quality tech gadgets with a focus on durability and innovation.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-dark"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-dark"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-dark"><i class="fa-brands fa-x-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 offset-lg-2">
                    <h6 class="fw-bold mb-4">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="index.html" class="text-decoration-none text-muted">Home</a></li>
                        <li class="mb-2"><a href="products.php" class="text-decoration-none text-muted">Products</a></li>
                        <li class="mb-2"><a href="about.html" class="text-decoration-none text-muted">About Us</a></li>
                        <li class="mb-2"><a href="contact.html" class="text-decoration-none text-muted">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4">
                    <h6 class="fw-bold mb-4">Store Location</h6>
                    <p class="text-muted small"><i class="fa-solid fa-location-dot me-2"></i>New Valley, Cairo</p>
                    <p class="text-muted small"><i class="fa-solid fa-phone me-2"></i>+20 1220876389</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0 text-muted small">&copy; 2026 TechZone Store. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>