<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trainerwedsite"; // ตรวจสอบชื่อให้ตรงกับใน phpMyAdmin นะครับ

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// เพิ่มบรรทัดนี้เพื่อให้รองรับภาษาไทย
mysqli_set_charset($conn, "utf8");
?>