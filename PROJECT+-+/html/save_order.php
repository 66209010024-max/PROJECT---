<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. รับค่าและป้องกัน SQL Injection
    $user_id   = $_SESSION['user_id'] ?? 0; 
    $course    = mysqli_real_escape_string($conn, $_POST['course_name']);
    $fullname  = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email     = mysqli_real_escape_string($conn, $_POST['email'] ?? $_SESSION['email'] ?? '');
    $phone     = mysqli_real_escape_string($conn, $_POST['phone']);
    $amount    = mysqli_real_escape_string($conn, $_POST['amount']);
    
    // ✅ รับค่าเป้าหมายและป้องกัน SQL Injection ด้วยครับ
    $user_goal = mysqli_real_escape_string($conn, $_POST['user_goal']); 
    
    // รับค่าเพิ่มเติม เช่น ชื่อโค้ช
    $trainer   = isset($_POST['trainer_name']) ? " (Coach: ".$_POST['trainer_name'].")" : "";
    $final_course = $course . $trainer;

    // 2. ตรวจสอบค่าว่างเบื้องต้น
    if (empty($fullname) || empty($phone) || empty($amount)) {
        echo "error: Missing required fields";
        exit();
    }   

    // 3. คำสั่ง SQL (เพิ่มคอลัมน์ user_goal และค่า $user_goal เข้าไป)
    // ✅ แก้ไขตรงส่วน (..., user_goal, ...) และ VALUES (..., '$user_goal', ...)
    $sql = "INSERT INTO orders (user_id, course_name, user_goal, fullname, email, phone, amount, status) 
            VALUES ('$user_id', '$final_course', '$user_goal', '$fullname', '$email', '$phone', '$amount', 'Paid')";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>