<?php
$servername = "localhost";
$username = "root"; // ده اليوزر الافتراضي في XAMPP
$password = "";     // مفيش باسورد افتراضياً
$dbname = "techzone_db";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التأكد من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully"; // جربها عشان تتأكد بس
?>