<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechZone | Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
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
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="index.php">Home</a></li>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white"><h4>Add New Product</h4></div>
                    <div class="card-body">
                        <form action="save_product.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="p_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price ($)</label>
                                <input type="number" name="p_price" step="0.01" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="p_category" class="form-select" required>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Laptops">Laptops</option>
                                    <option value="Phones">Phones</option>
                                    <option value="Headphones">Headphones</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Choose Image from Device</label>
                                <input type="file" name="p_image" class="form-control" accept="image/*" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary w-100">Save Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>