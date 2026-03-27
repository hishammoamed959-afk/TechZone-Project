<?php
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $price = $_POST['p_price'];
    $category = $_POST['p_category'];

    $folder = "uploads/";
    if (!is_dir($folder)) mkdir($folder, 0777, true);

    $image_name = time() . "_" . $_FILES['p_image']['name'];
    $path = $folder . $image_name;

    if (move_uploaded_file($_FILES['p_image']['tmp_name'], $path)) {
        $sql = "INSERT INTO products (name, price, category, image_url) VALUES ('$name', '$price', '$category', '$path')";
        if ($conn->query($sql) === TRUE) {
            header("Location: products.php");
            exit();
        }
    }
}
?>