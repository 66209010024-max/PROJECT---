<?php
session_start();
include 'db_connect.php';

// ตรวจสอบว่ามีการส่งข้อมูลมาและ Login อยู่หรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])) {
    
    // รับค่าจากฟอร์มและป้องกัน SQL Injection
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);

    // ตรวจสอบข้อมูลเบื้องต้น
    if (!empty($comment_text)) {
        $sql = "INSERT INTO reviews (username, comment_text) VALUES ('$username', '$comment_text')";
        
        if (mysqli_query($conn, $sql)) {
            // บันทึกสำเร็จ กลับไปหน้า Reviews
            header("Location: Reviews.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        header("Location: Reviews.php");
        exit();
    }
} else {
    // ถ้าเข้าถึงไฟล์นี้โดยตรงหรือไม่ได้ Login
    header("Location: login.php");
    exit();
}
?>