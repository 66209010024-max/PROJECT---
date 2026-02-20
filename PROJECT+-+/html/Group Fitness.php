<?php
session_start();
include 'db_connect.php';

// ตั้งค่าข้อมูลสำหรับหน้า Group Fitness (ปรับให้สอดคล้องกับธีมที่ต้องการ)
$course_name = "Group Fitness (6-Month Membership)";
$price = 5940; // ตัวอย่างราคาสมาชิกรวม 6 เดือน (หรือปรับตามจริง)
$duration = "6 เดือน (6 Months)";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Fitness | Energy & Community</title>
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

        /* สไตล์ลูกศรเด้ง (Bounce) */
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
                    
                    <p class="tagline">STRONGER TOGETHER</p>
                    <h1 class="main-title">GROUP <br><span class="accent-red">FITNESS</span></h1>
                    <p class="sub-text">
                        ปลดปล่อยพลังไปกับคลาสออกกำลังกายที่สนุกที่สุด ขับเคลื่อนด้วยเสียงเพลงและแรงผลักดันจากเพื่อนร่วมคลาสที่คุณจะหาจากที่ไหนไม่ได้...
                    </p>
                    
                    <div class="hero-price">
                        <span class="label">MEMBERSHIP DURATION: <span class="accent-red"><?php echo $duration; ?></span></span><br>
                        <span class="value"><?php echo number_format($price); ?> <small>THB</small></span>
                    </div>
                </div>

                <aside class="enroll-card">
                    <h2 class="card-title">JOIN THE CLASS</h2>
                    <p class="card-desc">กรอกข้อมูลเพื่อสมัครสมาชิกและรับสิทธิ์เข้าคลาส</p>
                    
                    <form class="enroll-form" id="groupFitnessForm">
                        <div class="form-group">
                            <label>ชื่อ–นามสกุล</label>
                            <input type="text" id="f_name" value="<?php echo $_SESSION['username'] ?? ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="tel" id="f_phone" placeholder="08X-XXX-XXXX" pattern="[0-9]{10}" required>
                        </div>

                        <div class="form-group">
                            <label>เลือกคลาสที่สนใจ (Preferred Class)</label>
                            <select id="f_trainer" required>
                                <option value="">-- เลือกประเภทคลาสที่คุณสนใจ --</option>
                                <option value="Zumba (Dance)">Zumba (คลาสเต้นสนุกสนาน)</option>
                                <option value="BodyPump (Strength)">BodyPump (สร้างกล้ามเนื้อ)</option>
                                <option value="HIIT (Cardio)">HIIT (เผาผลาญขั้นสุด)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>เป้าหมายการออกกำลังกาย</label>
                            <textarea id="f_goal" rows="3" placeholder="เช่น ลดน้ำหนัก, กระชับสัดส่วน หรือเพื่อความสนุก" required></textarea>
                        </div>
                        
                        <div class="order-summary">
                            <div class="summary-line" style="margin-bottom: 10px;">
                                <span>ประเภทสมาชิก</span>
                                <span class="accent-red"><?php echo $duration; ?></span>
                            </div>
                            <div class="summary-line">
                                <span>ยอดชำระรวม</span>
                                <span class="total-price"><?php echo number_format($price); ?> บาท</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-submit">ชำระเงินและสมัคร</button>
                    </form>

                    <div style="text-align: center; margin-top: 20px; color: #555; font-size: 0.8rem; cursor: pointer;" onclick="document.getElementById('about-section').scrollIntoView({behavior: 'smooth'});">
                        <p style="margin-bottom: 5px;">ดูรายละเอียดคอร์ส</p>
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
  <img id="photo" src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_700,h_500/https://allwellhealthcare.com/wp-content/uploads/2024/04/tips-lose-weight-3.jpg">
  <span class="btn right" onclick="next()">❯</span>
</div>

<script>
const images = [
  "https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_700,h_500/https://allwellhealthcare.com/wp-content/uploads/2024/04/tips-lose-weight-3.jpg",
  "https://images.squarespace-cdn.com/content/v1/57577e5b2b8dde200e3e6486/1480001054208-H83NNOMVECQHJIJY7LVM/07.jpg?format=2500w",
  "https://zenvibex.com/cdn/shop/files/custom_resized_8b96e0a8-befa-47c0-9170-0dc6fb3fe6f5_550x.jpg?v=1701487128"
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
                    <h2 class="section-title">WHY JOIN <br><span class="accent-red">OUR COMMUNITY?</span></h2>
                    <p class="about-desc">
                        การออกกำลังกายเป็นกลุ่มช่วยเพิ่มประสิทธิภาพการฝึกได้มากกว่าการฝึกคนเดียว ด้วยพลังงานจากเสียงเพลงและเพื่อนร่วมคลาสที่จะคอยผลักดันให้คุณก้าวข้ามขีดจำกัดของตัวเองในทุกๆ เซสชั่น
                    </p>
                </div>
            </div>
        </section>
    </main>

    <div id="paymentModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:30px; border-radius:15px; text-align:center; max-width:400px; width:90%;">
            <h2 class="section-title">CHECKOUT</h2>
                        <p>ตรวจสอบการเข้าสู่ระบบก่อนทำการชำระเงิน</p>
            <p>สแกน QR เพื่อชำระค่าสมาชิก <strong><?php echo number_format($price); ?> THB</strong></p>
            <div class="qr-placeholder">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=GroupFitness_Membership" alt="QR Code">
                <p style="margin-top:15px; color:#ff3333; font-weight:bold;">คอร์ส: <?php echo $course_name; ?></p>
            </div>
            <button class="btn-submit" onclick="processOrder()" style="margin-top:20px;">ยืนยันการโอนเงิน</button>
            <button onclick="closeModal('paymentModal')" style="background:none; border:none; color:#888; cursor:pointer; margin-top:10px;">ยกเลิก</button>
        </div>
    </div>

    <div id="successModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:40px; border-radius:15px; text-align:center;">
            <div style="font-size: 50px; color: #ff3333;">✔</div>
            <h2 class="main-title">MEMBERSHIP ACTIVE!</h2>
            <p>คุณสมัครสมาชิก Group Fitness เรียบร้อยแล้ว<br>เจอกันในคลาสออกกำลังกายนะครับ!</p>
            <button class="btn-submit" onclick="window.location.href='order-history.php'">ดูประวัติการสมัคร</button>
        </div>
    </div>

    <script>
        document.getElementById('groupFitnessForm').onsubmit = function(e) {
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
            formData.append('trainer_name', document.getElementById('f_trainer').value); // ในที่นี้คือชื่อประเภทคลาส
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