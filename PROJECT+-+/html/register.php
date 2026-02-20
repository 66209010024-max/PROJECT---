<?php
session_start();
include 'db_connect.php'; // เรียกใช้ไฟล์เชื่อมต่อ

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($pass !== $confirm) {
        $message = "รหัสผ่านไม่ตรงกัน กรุณาลองใหม่";
    } else {
        $check_user = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $check_user);
        
        if (mysqli_num_rows($result) > 0) {
            $message = "อีเมลนี้ถูกใช้งานแล้ว";
        } else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed_password')";
            
            if (mysqli_query($conn, $sql)) {
                // 1. ตั้งค่าตัวแปรเพื่อบอกว่าสมัครสำเร็จ
                $success_register = true; 
            } else {
                $message = "เกิดข้อผิดพลาด: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register — GYM</title>
  
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/register.css">
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
</head>
<body>
  <main class="container">
    <section class="left-panel">
      <div class="welcome">
        <h1> เริ่มต้นสร้างบัญชีใหม่</h1>
        <p>สมัครสมาชิกเพื่อเข้าสู่ระบบจัดการคอร์สออกกำลังกายของคุณ<br>ใช้งานง่าย ปลอดภัย และรวดเร็ว</p>
      </div>
      <footer class="left-footer">
        <p>© <span id="year"></span> Fitness Course Admin</p>
      </footer>
    </section>

    <section class="right-panel">
      <form class="register-card" id="registerForm" method="POST" action="register.php" autocomplete="on">
        <h3>สมัครสมาชิก</h3>
        <p class="sub">กรอกข้อมูลเพื่อสร้างบัญชีของคุณ</p>

        <?php if($message != ""): ?>
            <p style="color: #ff4d4d; background: rgba(255,77,77,0.1); padding: 10px; border-radius: 5px; font-size: 0.9rem;">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <label class="field">
          <span>ชื่อผู้ใช้</span>
          <input type="text" name="username" id="username" placeholder="ชื่อของคุณ" required>
        </label>
        <br>
        <label class="field">
          <span>อีเมล</span>
          <input type="email" name="email" id="email" placeholder="you@example.com" required>
        </label>
        <br>
        <label class="field">
          <span>รหัสผ่าน</span>
          <div class="password-wrap">
            <input type="password" name="password" id="password" placeholder="อย่างน้อย 6 ตัว" required minlength="6">
            <button type="button" id="togglePw">แสดง</button>
          </div>
        </label>
        <br>
        <label class="field">
          <span>ยืนยันรหัสผ่าน</span>
          <div class="password-wrap">
            <input type="password" name="confirm" id="confirm" placeholder="พิมพ์ซ้ำอีกครั้ง" required minlength="6">
            <button type="button" id="toggleConfirm">แสดง</button>
          </div>
        </label>
        <br>
        <button type="submit" class="btn primary">สร้างบัญชี</button>

        <div class="divider"><span>หรือ</span></div>
        <div class="socials">
          <button type="button" class="btn social google">สมัครด้วย Google</button>
          <button type="button" class="btn social apple">สมัครด้วย Apple</button>
        </div>
        <p class="login">มีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
      </form>
    </section>
  </main>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();

    const pw = document.getElementById('password');
    const cf = document.getElementById('confirm');

    document.getElementById('togglePw').onclick = () => {
      pw.type = pw.type === "password" ? "text" : "password";
    };
    document.getElementById('toggleConfirm').onclick = () => {
      cf.type = cf.type === "password" ? "text" : "password";
    };

    document.getElementById('registerForm').addEventListener('submit', (e) => {
      if (pw.value !== cf.value) {
        e.preventDefault();
        alert("รหัสผ่านทั้งสองไม่ตรงกัน");
        cf.focus();
      }
    });
  </script>

<?php if(isset($success_register)): ?>
    <script>
        Swal.fire({
            title: 'สมัครสมาชิกสำเร็จ!',
            text: 'เตรียมตัวฟิตหุ่นไปกับเราได้เลย',
            icon: 'success',
            
            // ปรับแต่งสีที่นี่
            background: '#1a1a1a',      /* สีพื้นหลัง Pop-up (ดำเทา) */
            color: '#ffffff',            /* สีตัวหนังสือ (ขาว) */
            iconColor: '#ff3333',        /* สีไอคอนติ๊กถูก (แดง) */
            
            confirmButtonColor: '#ff3333', /* สีปุ่มตกลง (แดง) */
            confirmButtonText: 'ตกลง',
            customClass: {
                popup: 'my-custom-popup-class'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });
    </script>
  <?php endif; ?>

</body>
</html>