<?php
session_start();
include 'db_connect.php';

// ตั้งค่าข้อมูลเฉพาะของคอร์ส Continuing Education
$course_name = "Continuing Education (Advanced Course)";
$price = 1599;
$duration = "12 บทเรียน (Lifetime Access)";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continuing Education | Professional Fitness</title>
    <link rel="stylesheet" href="../css/Continuing Education.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
    <style>
        .modal-content { background: #1a1a1a !important; color: white !important; border: 1px solid #ff3333; }
        .accent-red { color: #ff3333; }
        
        /* ปุ่ม BACK สไตล์ Sport Conditioning */
        .back-button {
            display: inline-block;
            background: #ff0000;
            color: #fff;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 30px;
            transition: all 0.2s ease;
        }
        .back-button:hover { background: #cc0000; transform: translateY(-2px); }

        select, textarea {
            width: 100%;
            padding: 12px;
            background: #1a1a1a;
            border: 1px solid #333;
            color: white;
            border-radius: 5px;
            margin-top: 5px;
            font-family: 'Prompt', sans-serif;
        }

        /* ลูกศร Bounce ตามแบบที่ชอบ */
        .bounce {
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-10px);}
            60% {transform: translateY(-5px);}
        }
    </style>
</head>
<body>

    <main class="landing-page">
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-text">
                    <a href="javascript:history.back()" class="back-button"><i class="fas fa-arrow-left"></i> BACK</a>
                    
                    <p class="tagline">EVOLUTION STARTS HERE</p>
                    <h1 class="main-title">CONTINUING <br><span class="accent-red">EDUCATION</span></h1>
                    <p class="sub-text">
                        หลักสูตรอัปเกรดทักษะการออกกำลังกายระดับสูง เจาะลึกวิทยาศาสตร์การกีฬาเพื่อเปลี่ยนคุณให้เป็นมืออาชีพ...
                    </p>
                    
                    <div class="hero-price">
                        <span class="label">COURSE ACCESS: <span class="accent-red"><?php echo $duration; ?></span></span><br>
                        <span class="value"><?php echo number_format($price); ?> <small>THB</small></span>
                    </div>
                </div>

                <aside class="enroll-card">
                    <h2 class="card-title">ENROLL NOW</h2>
                    <p class="card-desc">กรอกข้อมูลเพื่อรับสิทธิ์เข้าถึงบทเรียนทันที</p>
                    
                    <form class="enroll-form" id="eduEnrollForm">
                        <div class="form-group">
                            <label>ชื่อ–นามสกุล</label>
                            <input type="text" id="f_name" value="<?php echo $_SESSION['username'] ?? ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="tel" id="f_phone" placeholder="08X-XXX-XXXX" pattern="[0-9]{10}" required>
                        </div>

                        <div class="form-group">
                            <label>ระดับประสบการณ์ปัจจุบัน</label>
                            <select id="f_trainer" required>
                                <option value="">-- โปรดเลือกระดับของคุณ --</option>
                                <option value="Beginner">ผู้เริ่มต้น (Beginner)</option>
                                <option value="Intermediate">ระดับกลาง (Intermediate)</option>
                                <option value="Advance/Coach">ระดับสูง หรือ เทรนเนอร์ (Advance)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>คุณต้องการเน้นความรู้ด้านใดเป็นพิเศษ?</label>
                            <textarea id="f_goal" rows="3" placeholder="เช่น การจัดโปรแกรมฝึก หรือ โภชนาการสำหรับนักกีฬา" required></textarea>
                        </div>
                        
                        <div class="order-summary">
                            <div class="summary-line" style="margin-bottom: 10px;">
                                <span>สถานะการเข้าถึง</span>
                                <span class="accent-red">ตลอดชีพ (Lifetime)</span>
                            </div>
                            <div class="summary-line">
                                <span>ยอดชำระสุทธิ</span>
                                <span class="total-price"><?php echo number_format($price); ?> บาท</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-submit">ชำระเงินเพื่อเริ่มเรียน</button>
                    </form>

                    <div style="text-align: center; margin-top: 20px; color: #555; font-size: 0.8rem; cursor: pointer;" onclick="document.getElementById('about-section').scrollIntoView({behavior: 'smooth'});">
                        <p style="margin-bottom: 5px;">ดูรายละเอียดบทเรียน</p>
                        <i class="fas fa-chevron-down bounce" style="color: #ff3333; font-size: 1.2rem;"></i>
                    </div>
                </aside>
            </div>
        </section>

        <section class="about" id="about-section">
            <div class="container about-grid">
                <div class="about-image-box">
                    <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
.gallery {
  position: relative;
  width: 500px;
  height: 400px;
}

.gallery img {
  width: 100%;
  height: 100%;
  border-radius: 10px;
}

.btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 24px;
  background: rgba(0,0,0,0.5);
  color: white;
  padding: 8px 12px;
  cursor: pointer;
  user-select: none;
}

.left { left: 5%; }
.right { right: 5px; }
</style>
</head>
<body>

<div class="gallery">
  <span class="btn left" onclick="prev()">❮</span>
  <img id="photo" src="https://live.siammedia.org/wp-content/uploads/2023/09/AH2.jpg">
  <span class="btn right" onclick="next()">❯</span>
</div>

<script>
const images = [
  "https://live.siammedia.org/wp-content/uploads/2023/09/AH2.jpg",
  "https://img.freepik.com/premium-photo/fitness-sport-exercising-diet-concept-smiling-young-woman-personal-trainer-with-clipboard-writing-exercise-plan-gym_380164-132080.jpg",
  "https://www.krungsri.com/getmedia/222db49b-4c1f-486c-bc5d-51b490f76a7f/personal-trainer-job-detail3.jpg.aspx"
];

let index = 0;

function prev() {
  index = (index - 1 + images.length) % images.length;
  document.getElementById("photo").src = images[index];
}

function next() {
  index = (index + 1) % images.length;
  document.getElementById("photo").src = images[index];
}
</script>

</body>
</html>
                </div>
                <div class="about-content">
                    <h2 class="section-title">WHAT IS <br><span class="accent-red">ADVANCED EDUCATION?</span></h2>
                    <p class="about-desc">
                        ไม่ใช่แค่การสอนออกกำลังกายทั่วไป แต่คือระบบการศึกษาต่อเนื่องที่จะเปลี่ยนวิธีคิดและวิธีการฝึกของคุณด้วยวิทยาศาสตร์ เราเน้นผลลัพธ์ที่วัดผลได้จริงและการป้องกันการบาดเจ็บในระยะยาว
                    </p>
                </div>
            </div>
        </section>
    </main>

    <div id="paymentModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:30px; border-radius:15px; text-align:center; max-width:400px; width:90%;">
            <h2 class="section-title">CHECKOUT</h2>
                        <p>ตรวจสอบการเข้าสู่ระบบก่อนทำการชำระเงิน</p>
            <p>สแกน QR เพื่อชำระค่าลงทะเบียน <strong><?php echo number_format($price); ?> THB</strong></p>
            <div class="qr-placeholder">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=ContinuingEdu_Payment" alt="QR Code">
                <p style="margin-top:15px; color:#ff3333; font-weight:bold;">หลักสูตร: <?php echo $course_name; ?></p>
            </div>
            <button class="btn-submit" onclick="processOrder()" style="margin-top:20px;">ยืนยันการโอนเงิน</button>
            <button onclick="closeModal('paymentModal')" style="background:none; border:none; color:#888; cursor:pointer; margin-top:10px;">ยกเลิก</button>
        </div>
    </div>

    <div id="successModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:40px; border-radius:15px; text-align:center;">
            <div style="font-size: 50px; color: #ff3333;">✔</div>
            <h2 class="main-title">ENROLLMENT SUCCESS!</h2>
            <p>คุณสมัครหลักสูตรต่อเนื่องเรียบร้อยแล้ว<br>ระบบกำลังเตรียมบทเรียนให้คุณภายใน 15 นาที</p>
            <button class="btn-submit" onclick="window.location.href='order-history.php'">ดูประวัติการสมัคร</button>
        </div>
    </div>

    <script>
        document.getElementById('eduEnrollForm').onsubmit = function(e) {
            e.preventDefault();
            document.getElementById('paymentModal').style.display = 'flex';
        }

        function closeModal(id) { document.getElementById(id).style.display = 'none'; }

        function processOrder() {
            const formData = new FormData();
            formData.append('course_name', '<?php echo $course_name; ?>');
            formData.append('amount', '<?php echo $price; ?>');
            formData.append('fullname', document.getElementById('f_name').value);
            formData.append('phone', document.getElementById('f_phone').value);
            formData.append('trainer_name', document.getElementById('f_trainer').value);
            formData.append('user_goal', document.getElementById('f_goal').value);

            fetch('save_order.php', { method: 'POST', body: formData })
            .then(() => {
                document.getElementById('paymentModal').style.display = 'none';
                document.getElementById('successModal').style.display = 'flex';
            });
        }
    </script>
</body>
</html>