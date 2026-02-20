<?php
session_start();
include 'db_connect.php';

$error_auth = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    if (!empty($email) && !empty($pass)) {
        
        // 1. ตรวจสอบสิทธิ์ ADMIN ก่อน (Hardcode ตามที่คุณต้องการ)
        // ใช้ "admin" ในช่องอีเมล หรือ "admin@fitness.com" ก็ได้ครับ
        if (($email === 'admin' || $email === 'admin@fitness.com') && $pass === '123456') {
            $_SESSION['user_id'] = 0;
            $_SESSION['username'] = 'admin';
            $_SESSION['email'] = 'admin@fitness.com';
            header("Location: admin-orders.php"); // ไปหน้า Admin
            exit();
        }

        // 2. ถ้าไม่ใช่ Admin ให้ตรวจสอบผู้ใช้ทั่วไปจากฐานข้อมูล
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // ตรวจสอบรหัสผ่าน (Hash)
            if (password_verify($pass, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email']; // สำคัญ: ต้องเก็บ email ลง session เพื่อใช้ในหน้า order-history
                
                header("Location: index.php"); // ไปหน้าแรก
                exit();
            } else {
                $error_auth = "รหัสผ่านไม่ถูกต้อง";
            }
        } else {
            $error_auth = "ไม่พบข้อมูลผู้ใช้นี้ในระบบ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — GYM Admin</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/login.css">
         <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
</head>
<body>

  <main class="container">
    <section class="left-panel">
      <div class="brand">
        <div class="logo">GYM</div>
        <div class="brand-text">
          <h1>เข้าสู่ระบบเพื่อจัดการคอร์สออกกำลังกายของคุณ</h1>
          <p>คอร์สออกกำลังกาย</p>
        </div>
      </div>
      <div class="hero">
        <h2>ยินดีต้อนรับกลับ🗿 </h2>
        <p>พวกเราจะมาฟิตหุ่นไปด้วยกัน</p>
      </div>
      <footer class="left-footer">
        <p>© <span id="year"></span> Company. All rights reserved.</p>
      </footer>
    </section>

    <section class="right-panel">
      <form class="login-card" id="loginForm" method="POST" action="login.php" autocomplete="on">
        <h3>เข้าสู่ระบบ</h3>
        <p class="sub">ใส่อีเมลและรหัสผ่านของคุณ</p>

        <?php if($error_auth != ""): ?>
            <p style="color: #ff4d4d; font-size: 0.9rem; margin-bottom: 1rem; background: rgba(255,77,77,0.1); padding: 10px; border-radius: 5px;">
              <?php echo $error_auth; ?>
            </p>
        <?php endif; ?>

        <label class="field">
          <span>อีเมล</span>
          <input type="email" name="email" id="email" placeholder="you@example.com" required>
        </label>

        <label class="field">
          <span>รหัสผ่าน</span>
          <div class="password-wrap">
            <input type="password" name="password" id="password" placeholder="••••••••" required minlength="6">
            <button type="button" id="togglePw">แสดง</button>
          </div>
        </label>

        <div class="row">
          <label class="checkbox">
            <input type="checkbox" name="remember" id="remember">
            <span>จดจำฉัน</span>
          </label>
          <a class="forgot" href="#">ลืมรหัสผ่าน?</a>
        </div>

        <button type="submit" class="btn primary">Login</button>

        <div class="divider"><span>หรือ</span></div>
        <div class="socials">
          <button type="button" class="btn social google">เข้าสู่ระบบด้วย Google</button>
          <button type="button" class="btn social apple">เข้าสู่ระบบด้วย Apple</button>
        </div>
        <p class="signup">ไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a></p>
      </form>
    </section>
  </main>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
    const toggle = document.getElementById('togglePw');
    const pw = document.getElementById('password');
    
    toggle.addEventListener('click', () => {
      const type = pw.type === 'password' ? 'text' : 'password';
      pw.type = type;
      toggle.textContent = type === 'password' ? 'แสดง' : 'ซ่อน';
    });

    document.getElementById('loginForm').addEventListener('submit', (e) => {
      const email = document.getElementById('email');
      if (!email.checkValidity()) {
        e.preventDefault();
        alert('กรุณากรอกอีเมลให้ถูกต้อง');
        email.focus();
      } else if (!pw.checkValidity()) {
        e.preventDefault();
        alert('กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร');
        pw.focus();
      }
    });
  </script>
</body>
</html>