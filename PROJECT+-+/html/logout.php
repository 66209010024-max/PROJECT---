<?php
session_start();
session_destroy(); // ล้างข้อมูลการ Login
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background: #1a1a1a;">
    <script>
        Swal.fire({
            title: 'ออกจากระบบเรียบร้อย!',
            text: 'แล้วพบกันใหม่นะครับ',
            icon: 'success',
            background: '#1a1a1a',
            color: '#ffffff',
            iconColor: '#ff3333',
            showConfirmButton: false,
            timer: 2000 
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>
</body>
</html>