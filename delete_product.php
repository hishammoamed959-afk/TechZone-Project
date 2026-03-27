<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // مسح الصورة من الفولدر
    $res = $conn->query("SELECT image_url FROM products WHERE id = $id");
    $row = $res->fetch_assoc();
    if (file_exists($row['image_url'])) unlink($row['image_url']);

    // مسح من الداتابيز
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: products.php");
    exit();
}
?>