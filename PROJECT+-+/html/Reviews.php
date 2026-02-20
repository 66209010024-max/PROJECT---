<?php
session_start();
include 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVIEWS | Power GYM</title>
    <link rel="stylesheet" href="../css/Reviews.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
    <style>
        /* สไตล์เสริมเพื่อให้ UI กลมกลืน */
        .comment-input-section { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        .comment-form textarea {
            width: 100%; padding: 20px; background: #141414; border: 1px solid #333;
            color: white; border-radius: 12px; font-family: 'Prompt', sans-serif;
            resize: vertical; transition: 0.3s; box-sizing: border-box;
        }
        .comment-form textarea:focus { border-color: #ff3333; outline: none; box-shadow: 0 0 10px rgba(255,51,51,0.2); }
        .btn-post {
            margin-top: 15px; background: #ff3333; color: white; border: none;
            padding: 12px 35px; border-radius: 8px; cursor: pointer;
            font-weight: bold; font-family: 'Montserrat'; transition: 0.3s;
        }
        .btn-post:hover { background: #cc0000; transform: translateY(-2px); }
        .client-avatar-default {
            width: 50px; height: 50px; border-radius: 50%; background: #222;
            display: flex; align-items: center; justify-content: center; font-size: 20px; color: #555;
        }
    </style>
</head>
<body>

<header class="navbar">
    <div class="navbar-left">
        <a href="index.php" class="logo-link">
            <svg width="250" height="40" viewBox="0 0 250 40" fill="none">
                <text x="0" y="30" font-family="Montserrat" font-size="30" fill="white" font-weight="500">Power</text>
                <text x="100" y="30" font-family="Montserrat" font-size="30" fill="white" font-weight="600">GYM</text>
                <circle cx="180" cy="20" r="5" fill="#ff3333"/> 
            </svg>
        </a>
    </div>

    <div class="navbar-center">
        <nav class="main-nav">
            <a href="index.php" class="nav-item">หน้าแรก</a>
            <a href="AboutUs.php" class="nav-item">เกี่ยวกับเรา</a>
            <div class="dropdown">
                <a href="#" class="nav-item">คอร์สเรียน ▼</a>
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
            <a href="Reviews.php" class="nav-item active" style="color:#ff3333">รีวิว</a>
        </nav>
    </div>

    <div class="navbar-right">
        <a href="admin_panel.php" class="icon-link"><i class="fa-solid fa-users"></i></a>
        <a href="login.php" class="icon-link"><i class="fas fa-user-circle"></i></a>
        <a href="order-history.php" class="icon-link"><i class="fa-solid fa-clock-rotate-left"></i></a>
    </div>
</header>

<main class="minimal-review-container">
    <header class="page-title">
        <span class="sub-title">MEMBERS SUCCESS</span>
        <h1>RESULTS THAT <span class="text-red">SPEAK</span></h1>
    </header>

    <section class="comment-input-section">
        <h2 style="color: white; font-family: 'Montserrat'; font-weight: 900; margin-bottom: 20px;">SHARE YOUR STORY</h2>
        <?php if(isset($_SESSION['username'])): ?>
            <form action="save_comment.php" method="POST" class="comment-form">
                <textarea name="comment_text" rows="4" placeholder="แชร์ความประทับใจของคุณ..." required></textarea>
                <button type="submit" class="btn-post">POST REVIEW</button>
            </form>
        <?php else: ?>
            <div style="background: #111; padding: 20px; border-radius: 10px; border-left: 4px solid #ff3333; color: #ccc;">
                กรุณา <a href="login.php" style="color: #ff3333; font-weight: bold; text-decoration: none;">เข้าสู่ระบบ</a> เพื่อแชร์ประสบการณ์ของคุณ
            </div>
        <?php endif; ?>
    </section>

    <div class="minimal-grid">
        <?php
        $sql = "SELECT * FROM reviews ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="minimal-card">
                <div class="card-head-with-avatar">
                    <div class="client-avatar-default">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="card-info">
                        <strong><?php echo htmlspecialchars($row['username']); ?></strong>
                        <small><?php echo date('d M Y', strtotime($row['created_at'])); ?></small>
                    </div>
                </div>
                <div class="card-accent"></div>
                <p>"<?php echo htmlspecialchars($row['comment_text']); ?>"</p>
            </div>
        <?php 
            endwhile;
        endif; 
        ?>
    </div>
</main>

<script src="../js/script.js"></script>
</body>
</html>