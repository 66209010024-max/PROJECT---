<?php
session_start();
include 'db_connect.php';

// ตั้งค่าข้อมูลสำหรับหน้า Sport Conditioning
$course_name = "Sport Conditioning (Pro Athlete)";
$price = 1290;
$duration = "6 เดือน (6 Months)"; 
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Conditioning | Unleash Your Athlete</title>
    <link rel="stylesheet" href="../css/Group Fitness.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
    <style>
        .modal-content { background: #1a1a1a !important; color: white !important; border: 1px solid #ff3333; }
        .accent-red { color: #ff3333; }
        
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
    </style>
</head>
<body>

    <main class="landing-page">
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-text">
                    <a href="javascript:history.back()" class="back-button"><i class="fas fa-arrow-left"></i> BACK</a>
                    
                    <p class="tagline">UNLEASH YOUR ATHLETE</p>
                    <h1 class="main-title">SPORT <br><span class="accent-red">CONDITIONING</span></h1>
                    <p class="sub-text">
                        ยกระดับสมรรถภาพร่างกายให้ถึงขีดสุด ด้วยโปรแกรมการฝึกที่ออกแบบมาเพื่อเพิ่มความแข็งแกร่ง ความเร็ว และความทนทานในระดับนักกีฬาอาชีพ...
                    </p>
                    
                    <div class="hero-price">
                        <span class="label">PROGRAM DURATION: <span class="accent-red"><?php echo $duration; ?></span></span><br>
                        <span class="value"><?php echo number_format($price); ?> <small>THB / MONTH</small></span>
                    </div>
                </div>

                <aside class="enroll-card">
                    <h2 class="card-title">START TRAINING</h2>
                    <p class="card-desc">กรอกข้อมูลเพื่อให้โค้ชออกแบบโปรแกรมให้คุณ</p>
                    
                    <form class="enroll-form" id="sportEnrollForm">
                        <div class="form-group">
                            <label>ชื่อ–นามสกุล</label>
                            <input type="text" id="f_name" value="<?php echo $_SESSION['username'] ?? ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="tel" id="f_phone" placeholder="08X-XXX-XXXX" pattern="[0-9]{10}" required>
                        </div>

                        <div class="form-group">
                            <label>เลือกโค้ช (Performance Coach)</label>
                            <select id="f_trainer" required>
                                <option value="">-- เลือกโค้ชตามความเชี่ยวชาญ --</option>
                                <option value="Coach Mike (Strength)">โค้ชไมค์ (Strength & Power)</option>
                                <option value="Coach Sarah (Agility)">โค้ชซาร่า (Agility & Speed)</option>
                                <option value="Coach Alex (Endurance)">โค้ชอเล็กซ์ (Endurance Specialist)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>กีฬาที่เล่น หรือเป้าหมายที่ต้องการเน้น</label>
                            <textarea id="f_goal" rows="3" placeholder="เช่น ฟุตบอล, วิ่งมาราธอน หรือต้องการเพิ่มความเร็ว" required></textarea>
                        </div>
                        
                        <div class="order-summary">
                            <div class="summary-line" style="margin-bottom: 10px;">
                                <span>ระยะเวลาโปรแกรม</span>
                                <span class="accent-red"><?php echo $duration; ?></span>
                            </div>
                            <div class="summary-line">
                                <span>ยอดชำระเบื้องต้น</span>
                                <span class="total-price"><?php echo number_format($price); ?> บาท</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-submit">ชำระเงินและสมัคร</button>
                    </form>
                    <div style="text-align: center; margin-top: 20px; color: #555; font-size: 0.8rem;">
                        <p style="margin-bottom: 5px;">ดูรายละเอียดคอร์ส</p>
                        <i class="fas fa-chevron-down bounce" style="color: #ff3333; font-size: 1.2rem;"></i>
                    </div>
                </aside>
            </div>
        </section>

        <section class="about">
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
  <img id="photo" src="https://sustainptperformance.com/wp-content/uploads/2024/10/Sport-Specific-Training-vs-Strength-and-Conditioning.jpg">
  <span class="btn right" onclick="next()">❯</span>
</div>

<script>
const images = [
  "https://sustainptperformance.com/wp-content/uploads/2024/10/Sport-Specific-Training-vs-Strength-and-Conditioning.jpg",
  "https://thaiboxinguniversity.com/wp-content/uploads/2025/12/Muay-Thai-training.png",
  "https://www.fitthai.com/wp-content/uploads/2024/09/691703.jpg"
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
                    <h2 class="section-title">WHY TRAIN LIKE <br><span class="accent-red">AN ATHLETE?</span></h2>
                    <p class="about-desc">
                        การฝึกแบบ Sport Conditioning ตลอดระยะเวลา 6 เดือน จะช่วยปรับปรุงระบบประสาทและกล้ามเนื้อ (Neuromuscular) ให้ทำงานประสานกันอย่างมีประสิทธิภาพสูงสุด เพื่อให้คุณก้าวข้ามขีดจำกัดเดิมและป้องกันการบาดเจ็บจากการเล่นกีฬาได้อย่างยั่งยืน
                    </p>
                </div>
            </div>
        </section>
    </main>

    <div id="paymentModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:30px; border-radius:15px; text-align:center; max-width:400px; width:90%;">
            <h2 class="section-title">CHECKOUT</h2>
                        <p>ตรวจสอบการเข้าสู่ระบบก่อนทำการชำระเงิน</p>
            <p>สแกน QR เพื่อชำระค่าโปรแกรม <strong><?php echo number_format($price); ?> THB</strong></p>
            <div class="qr-placeholder">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=SportConditioning_Pro" alt="QR Code">
                <p style="margin-top:15px; color:#ff3333; font-weight:bold;">คอร์ส: <?php echo $course_name; ?></p>
            </div>
            <button class="btn-submit" onclick="processOrder()" style="margin-top:20px;">ยืนยันการโอนเงิน</button>
            <button onclick="closeModal('paymentModal')" style="background:none; border:none; color:#888; cursor:pointer; margin-top:10px;">ยกเลิก</button>
        </div>
    </div>

    <div id="successModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:40px; border-radius:15px; text-align:center;">
            <div style="font-size: 50px; color: #ff3333;">✔</div>
            <h2 class="main-title">REGISTRATION SUCCESSFUL!</h2>
            <p>โค้ชจะติดต่อกลับเพื่อประเมินร่างกายเบื้องต้นภายใน 30 นาที</p>
            <button class="btn-submit" onclick="window.location.href='order-history.php'">ดูประวัติการสมัคร</button>
        </div>
    </div>

    <script>
        document.getElementById('sportEnrollForm').onsubmit = function(e) {
            e.preventDefault();
            document.getElementById('paymentModal').style.display = 'flex';
        }

        function closeModal(id) { document.getElementById(id).style.display = 'none'; }

        function processOrder() {
            const formData = new FormData();
            formData.append('course_name', '<?php echo $course_name; ?> (6 Months)');
            formData.append('amount', '<?php echo $price; ?>');
            formData.append('fullname', document.getElementById('f_name').value);
            formData.append('phone', document.getElementById('f_phone').value);
            formData.append('trainer_name', document.getElementById('f_trainer').value);
            formData.append('user_goal', document.getElementById('f_goal').value);

            fetch('save_order.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('paymentModal').style.display = 'none';
                document.getElementById('successModal').style.display = 'flex';
            })
            .catch(error => {
                Swal.fire('Error', 'การบันทึกข้อมูลล้มเหลว', 'error');
            });
        }
    </script>
</body>
</html>