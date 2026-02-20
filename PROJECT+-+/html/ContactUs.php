<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LET'S GET MOVING</title>
    <link rel="stylesheet" href="../css/ContactUs.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
</head>
<body>

    <header class="navbar">
         <div class="navbar-left">
            <a href="#" class="logo-link">
                <svg width="250" height="40" viewBox="0 0 250 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="0" y="30" font-family="Montserrat, sans-serif" font-size="30" fill="white" font-weight="500">
                        Power
                    </text>
                    <text x="100" y="30" font-family="Montserrat, sans-serif" font-size="30" fill="white" font-weight="550">
                        GYM
                    </text>
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
            <a href="login.php" class="icon-link"><i class="fas fa-user-circle"></i></a>
            <a href="#" class="icon-link"><i class="fa-solid fa-clock-rotate-left"></i></i></a>
        </div>
    </header>

    <main class="main-content">
    <div class="content-header" style="text-align: center; margin-bottom: 60px;">
        <h2 style="font-family: 'Montserrat', sans-serif; font-size: 3rem; font-weight: 900; margin: 0; letter-spacing: 5px;">
            CONTACT <span style="color: #ff3333; text-shadow: 0 0 20px rgba(255, 51, 51, 0.4);">INFO</span>
        </h2>
        <div style="width: 50px; height: 3px; background: #ff3333; margin: 15px auto;"></div>
    </div>

    <div class="info-block-container" style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 40px; max-width: 1200px; margin: 0 auto;">
        
        <div class="info-details" style="background: #0a0a0a; padding: 40px; border-radius: 10px; border-left: 5px solid #ff3333;">
            <div class="contact-box" style="margin-bottom: 35px;">
                <h4 style="color: #ff3333; letter-spacing: 2px; margin-bottom: 10px; font-size: 0.9rem;">LOCATION</h4>
                <p style="color: #fff; font-size: 1.1rem; line-height: 1.6; margin: 0;">
                    99/1 พาวเวอร์ ทาวเวอร์ ชั้น 18<br>
                    ถนนรัชดาภิเษก แขวงห้วยขวาง<br>
                    กรุงเทพมหานคร 10310
                </p>
            </div>

            <div class="contact-box" style="margin-bottom: 35px;">
                <h4 style="color: #ff3333; letter-spacing: 2px; margin-bottom: 10px; font-size: 0.9rem;">PHONE & EMAIL</h4>
                <p style="color: #fff; font-size: 1.1rem; margin: 0;">Hotline: 02-999-8888</p>
                <p style="color: #fff; font-size: 1.1rem; margin: 0;">Support: contact@powergym.com</p>
            </div>

            <div class="contact-box" style="margin-bottom: 35px;">
                <h4 style="color: #ff3333; letter-spacing: 2px; margin-bottom: 10px; font-size: 0.9rem;">OPENING HOURS</h4>
                <p style="color: #fff; font-size: 1.1rem; margin: 0;">เปิดให้บริการทุกวัน</p>
                <p style="color: #fff; font-size: 1.1rem; margin: 0;">06:00 AM - 12:00 PM</p>
            </div>

            <div class="contact-box">
                <h4 style="color: #ff3333; letter-spacing: 2px; margin-bottom: 15px; font-size: 0.9rem;">CONNECT</h4>
                <div style="display: flex; gap: 20px;">
                    <a href="#" style="color: #fff; font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" style="color: #fff; font-size: 1.5rem;"><i class="fab fa-line"></i></a>
                    <a href="#" style="color: #fff; font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="map-area" style="border-radius: 10px; overflow: hidden; border: 1px solid #222; position: relative;">
            <div style="position: absolute; top: 15px; left: 15px; background: rgba(0,0,0,0.7); padding: 5px 15px; border: 1px solid #ff3333; font-size: 0.7rem; color: #fff; z-index: 5; letter-spacing: 1px;">
                GOOGLE MAPS VIEW
            </div>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.553255104278!2d100.5724217!3d13.758887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s10x30e29e8d324be80d%3A0x6734c890130f14a6!2sRatchadapisek%20Road!5e0!3m2!1sen!2sth!4v1700000000000!5m2!1sen!2sth" 
                width="100%" 
                height="100%" 
                style="border:0; filter: grayscale(1) invert(0.9) contrast(1.2); min-height: 450px;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</main>

    <footer class="contact-footer">
        <div class="footer-content">
            <div class="footer-left">
                <h3 class="footer-name">MICHAEL RYAN</h3>
                <p class="footer-role">FITNESS COACH</p>
                <div class="contact-info">
                    <p>500 Terry Francois Street</p>
                    <p>San Francisco, CA 94158</p>
                    <p>Tel: 123-456-7890</p>
                    <p>Fax: 123-456-7890</p>
                    <a href="mailto:info@mysite.com" class="footer-email">info@mysite.com</a>
                </div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-right">
                <p class="quote">“I believe that the right training can transform your life. Let’s start the journey to a healthier and stronger you.”</p>
                <p class="quote">“Your body can stand almost anything. It’s your mind you have to convince.”</p>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>