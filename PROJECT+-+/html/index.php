<?php
session_start(); 
include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power GYM — LET'S GET MOVING</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
</head>
<body>

    <div class="background-container">
        <div class="background-image active" id="bg1" style="background-image: url('../img/a1.jpg');"></div>
        <div class="background-image" id="bg2" style="background-image: url('../img/a2.jpg');"></div>
        <div class="background-image" id="bg3" style="background-image: url('../img/a3.jpg');"></div>
    </div>

    <header class="navbar">
        <div class="navbar-left">
            <a href="index.php" class="logo-link">
                <svg width="250" height="40" viewBox="0 0 250 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="0" y="30" font-family="Montserrat, sans-serif" font-size="30" fill="white" font-weight="500">Power</text>
                    <text x="100" y="30" font-family="Montserrat, sans-serif" font-size="30" fill="white" font-weight="550">GYM</text>
                    <circle cx="180" cy="20" r="5" fill="#ff3333"/> 
                </svg>
            </a>
        </div>
        <div class="navbar-center">
            <nav class="main-nav">
                <a href="index.php" class="nav-item">หน้าแรก</a>
                <a href="AboutUs.php" class="nav-item">เกี่ยวกับเรา</a>
                
                <div class="dropdown">
                    <a href="#" class="nav-item dropdown-toggle">คอร์สเรียน ▼</a>
                    <div class="dropdown-menu">
                        <a href="Personal Training.php">เทรนส่วนตัว</a>
                        <a href="Pilates.php">พิลาทิส</a>
                        <a href="Yoga.php">โยคะ</a>
                        <a href="Sport Conditioning.php">การฝึกสมรรถภาพทางกีฬา</a>
                        <a href="Group Fitness.php">การออกกำลังกายแบบกลุ่ม</a>
                        <a href="Continuing Education.php">การศึกษาต่อเนื่อง</a>
                    </div>
                </div>
                
                <a href="ContactUs.php" class="nav-item">ติดต่อเรา</a>
                <a href="Article.php" class="nav-item">บทความ</a>
                <a href="Reviews.php" class="nav-item">รีวิว</a>
            </nav>
        </div>

        <div class="navbar-right">
            <a href="#" class="icon-link"><i class="fas fa-users"></i></a>
            
            <?php if(isset($_SESSION['username'])): ?>
                <span style="color: #ffffff; font-weight: bold; font-size: 0.9rem; margin-right: 10px;">
                     Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <a href="logout.php" class="icon-link" title="ออกจากระบบ"><i class="fas fa-sign-out-alt"></i></a>
            <?php else: ?>
                <a href="login.php" class="icon-link" title="เข้าสู่ระบบ"><i class="fas fa-user-circle"></i></a>
            <?php endif; ?>

            <a href="order-history.php" class="icon-link"><i class="fa-solid fa-clock-rotate-left"></i></a>
        </div>
    </header>

    <div class="social-icons-left">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>

    <main class="hero-section">
        <h1>LETS GET MOVING</h1>
        <h3>ไมเคิล ไรอัน – เทรนเนอร์ฟิตเนสออนไลน์</h3>
    </main>

    <section class="about-section">
        <div class="about-image">
            <img src="../img/fa.png" alt="Michael Ryan">
        </div>
        <div class="about-content">
            <h4>เกี่ยวกับฉัน</h4>
            <h2>MICHAEL RYAN</h2>
            <p> <style>
  .btn{
    background: #da0606;
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    font-size: 20px;
    border-radius: 8px;
    transition: 0.3s;
  }

  .btn:hover{
    background: #870202;
  }
</style>

<a href="AboutUs.php" class="btn">ไปหน้า AboutUs</a>
 </p>
            
        </div>
    </section>

    <main class="workout-section">
        <div class="workout-content-container">
            <div class="text-content">
                <h1 class="main-heading">CHOOSE YOUR <br> ONLINE WORKOUT</h1>
            </div>
            
            <div class="workout-grid-container">
                <div class="workout-item"><a href="Personal Training.php" class="workout-name-link">เทรนส่วนตัว</a>   <a href="Personal Training.php" class="workout-number">1</a></div>
                <div class="workout-item"><a href="Pilates.php" class="workout-name-link">พิลาทิส</a>   <a href="Pilates.php" class="workout-number">2</a></div>
                <div class="workout-item"><a href="Yoga.php" class="workout-name-link">โยคะ</a>   <a href="Yoga.php" class="workout-number">3</a></div>
                <div class="workout-item"><a href="Sport Conditioning.php" class="workout-name-link">การฝึกสมรรถภาพทางกีฬา</a>  <a href="Sport Conditioning.php" class="workout-number">4</a></div>
                <div class="workout-item"><a href="Group Fitness.php" class="workout-name-link">การออกกำลังกายแบบกลุ่ม</a>  <a href="Group Fitness.php" class="workout-number">5</a></div>
                <div class="workout-item"><a href="Continuing Education.php" class="workout-name-link">การศึกษาต่อเนื่อง</a>  <a href="Continuing Education.php" class="workout-number">6</a></div>
            </div>
        </div>
    </main>

    <footer class="contact-footer">
        <div class="footer-content">
            <div class="footer-left">
                <h3 class="footer-name">MICHAEL RYAN</h3>
                <p class="footer-role">FITNESS COACH</p>
                <div class="contact-info">
                    <p>Tel: 123-456-7890</p>
                    <a href="mailto:info@mysite.com" class="footer-email">info@mysite.com</a>
                </div>
            </div>
            <div class="footer-right">
                <p class="quote">“I believe that the right training can transform your life.”</p>
            </div>
        </div>
    </footer>
    
    <footer class="bottom-bar">
        <p>© <span id="year"></span> Power GYM. "WHAT SEEMS IMPOSSIBLE TODAY WILL SOON BECOME YOUR WARM UP!"</p>
    </footer>

    <script src="../js/script.js"></script>
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>