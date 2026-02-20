    <?php
    // ตัวอย่างการเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym";
    

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_status = "success";
} catch(PDOException $e) {
    $db_status = "fail";
    $db_error = $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LET'S GET MOVING</title>
    <link rel="stylesheet" href="../css/AboutUs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
</head>
<body>

    <!-- Navbar -->
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

    <!-- เนื้อหาหลัก (อยู่ระหว่าง Navbar และ Footer) -->
<main class="main-content">
    <section class="about-hero">
        <div class="page-header">
            <h1 class="page-title">About Us</h1>
            <nav class="breadcrumb-nav">
                <span class="current-page">ข้อมูลเกี่ยวกับเรา</span>
            </nav>
        </div>
        <div class="dark-wave-background"></div>
    </section>

    <section class="about-content-section">
        <div class="container">
            <div class="content-wrapper">
                <div class="left-column">
                    <p class="our-story-label">เกี่ยวกับเรา</p>
                    <h2 class="main-headline">
                       Fit® เป็นสถาบันด้านการศึกษา การฝึกอบรม และการรับรองด้านฟิตเนสที่ใหญ่ที่สุดในเอเชียตะวันออกเฉียงใต้
โดยมีเป้าหมายเพื่อพัฒนาผู้เชี่ยวชาญในสายงานนี้ให้มีมาตรฐานระดับสากล
                        <span class="highlight-red">ผู้นำด้านฟิตเนสที่เหนือกว่า</span>
                    </h2>

                    <div class="large-image-block">
                        <img src="../img/fa.png" alt="Team collaborating in a modern office " class="team-image">
                    </div>
                </div>

                <div class="right-column">
                    <div class="small-image-grid">
                        <div class="image-card">
                            <img src="../img/fa.png" alt="Woman working on a laptop" class="grid-image">

                        </div>
                        <div class="image-card">
                            <img src="../img/fa.png" alt="Team working in an office setting" class="grid-image">
                        </div>
                    </div>

                    <p class="about-text">
                        FIT ก่อตั้งขึ้นในปี ค.ศ. 2005 ในฐานะศูนย์การศึกษาและฝึกอบรมสำหรับผู้เชี่ยวชาญด้านฟิตเนสที่มีมาตรฐานระดับนานาชาติ โดยการก่อตั้งเกิดจากความต้องการของเทรนเนอร์ฟิตเนสในกรุงเทพฯ ในขณะนั้น ที่มุ่งยกระดับคุณวุฒิของบุคลากรในสายงานให้เป็นไปตามมาตรฐานการรับรองระดับสากล
                    </p>
                    
                    <p class="about-text">
                        FIT เปิดสอนหลักสูตรเตรียมสอบใบรับรองระดับนานาชาติและเวิร์กช็อประยะสั้นในหลากหลายสาขา อาทิ หลักสูตรผู้ฝึกสอนส่วนบุคคลที่ได้รับการรับรอง (Certified Personal Trainer), หลักสูตรครูโยคะนานาชาติ (International Yoga Teacher Training), หลักสูตรผู้ฝึกสอนพิลาทิส (Pilates Instructor Training), หลักสูตรการฝึกความแข็งแรงและสมรรถภาพทางกีฬา (Certified Strength and Sport Conditioning) และหลักสูตรผู้ฝึกสอนการออกกำลังกายแบบกลุ่ม (Group Exercise Instructor)

นอกจากนี้ FIT® Thailand ยังมีศูนย์ฝึกอบรมที่ได้รับอนุญาตในประเทศมาเลเซีย สิงคโปร์ และฟิลิปปินส์
                    </p>
                    
                    <p class="about-text">
                     เรามุ่งมั่นในการขยายโอกาสให้ผู้เชี่ยวชาญด้านฟิตเนสทั่วเอเชียได้เรียนรู้ ฝึกอบรม และพัฒนาศักยภาพของตนเอง เพื่อมีส่วนร่วมในการพัฒนาและยกระดับอุตสาหกรรมฟิตเนสโดยรวม ดังนั้น หากคุณสนใจเป็นเจ้าภาพจัดการฝึกอบรมฟิตเนสเฉพาะทางสำหรับผู้เชี่ยวชาญในพื้นที่ของคุณ โปรดติดต่อเราได้ตลอดเวลา
                    </p>

                </div>
            </div>
        </div>
    </section>
</main>

    <!-- Footer -->
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