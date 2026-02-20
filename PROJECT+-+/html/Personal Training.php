<?php
session_start();
include 'db_connect.php';

// ตั้งค่าข้อมูลคอร์ส Personal Training
$course_name = "Personal Training (10 Sessions)";
$price = 4599; 
$duration = "6 เดือน (6 Months)"; 
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Training | Power GYM</title>
    <link rel="stylesheet" href="../css/Group Fitness.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/vector-premium/culturista-dibujado-mano-grabado-pluma-tinta-ilustracion-vectorial_712895-7543.jpg?semt=ais_hybrid&w=740&q=80">
    <style>
        /* ปรับแต่ง Style เพิ่มเติมให้ตรงกับหน้า Yoga */
        .modal-content { background: #1a1a1a !important; color: white !important; border: 1px solid #ff0000; }
        .accent-red { color: #ff0000; }
        
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

        .bounce { animation: bounce 2s infinite; }
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
                    
                    <p class="tagline">ELITE PERSONAL COACHING</p>
                    <h1 class="main-title">PERSONAL <br><span class="accent-red">TRAINING</span></h1>
                    <p class="sub-text">
                        ยกระดับการออกกำลังกายของคุณด้วยโปรแกรมที่ออกแบบมาเพื่อสรีระและเป้าหมายของคุณโดยเฉพาะ 
                        ไม่ว่าจะเป็นการสร้างกล้ามเนื้อ ลดไขมัน หรือเสริมสร้างสมรรถภาพการกีฬา
                    </p>
                    
                    <div class="hero-price">
                        <span class="label">PACKAGE DURATION: <span class="accent-red"><?php echo $duration; ?></span></span><br>
                        <span class="value"><?php echo number_format($price); ?> <small>THB</small></span>
                    </div>
                </div>

                <aside class="enroll-card">
                    <h2 class="card-title">สมัครสมาชิกคอร์ส</h2>
                    <p class="card-desc">กรอกข้อมูลเพื่อดำเนินการชำระเงิน</p>
                    
                    <form class="enroll-form" id="ptEnrollForm">
                        <div class="form-group">
                            <label>ชื่อ–นามสกุล</label>
                            <input type="text" id="f_name" value="<?php echo $_SESSION['username'] ?? ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="tel" id="f_phone" placeholder="08X-XXX-XXXX" pattern="[0-9]{10}" required>
                        </div>

                        <div class="form-group">
                            <label>เลือกเทรนเนอร์ (Coach Selection)</label>
                            <select id="f_trainer" required>
                                <option value="">-- กรุณาเลือกเทรนเนอร์ --</option>
                                <option value="Coach Mike">Coach Mike (ชาย)</option>
                                <option value="Coach Sarah">Coach Sarah (หญิง)</option>
                                <option value="Coach Alex">Coach Alex (ชาย)</option>
                                <option value="Coach Uri">Coach Uri (หญิง)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>เป้าหมายในการเทรน</label>
                            <textarea id="f_goal" rows="3" placeholder="เช่น ลดน้ำหนัก 10 กิโลกรัม, สร้างกล้ามเนื้ออก หรือ แก้ออฟฟิศซินโดรม" required></textarea>
                        </div>
                        
                        <div class="order-summary">
                            <div class="summary-line" style="margin-bottom: 10px;">
                                <span>ระยะเวลาสมาชิก</span>
                                <span class="accent-red"><?php echo $duration; ?></span>
                            </div>
                            <div class="summary-line">
                                <span>ยอดชำระสุทธิ</span>
                                <span class="total-price"><?php echo number_format($price); ?> บาท</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-submit">ไปที่หน้าชำระเงิน</button>
                    </form>
                    <div style="text-align: center; margin-top: 20px; color: #555; font-size: 0.8rem;">
                        <p style="margin-bottom: 5px;">ดูรายละเอียดคอร์ส</p>
                        <i class="fas fa-chevron-down bounce" style="color: #ff0000; font-size: 1.2rem;"></i>
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
  <img id="photo" src="https://mindyourfitness.in/wp-content/uploads/2022/12/20221227_172938_0010.png">
  <span class="btn right" onclick="next()">❯</span>
</div>

<script>
const images = [
  "https://mindyourfitness.in/wp-content/uploads/2022/12/20221227_172938_0010.png",
  "https://luckyssportsclub.com/wp-content/uploads/2024/08/rehab.webp",
  "https://www.shutterstock.com/image-photo/full-body-strong-african-american-600nw-2342051543.jpg"
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
                    <h2 class="section-title">A 6-MONTH PATH TO <br><span class="accent-red">TRANSFORMATION</span></h2>
                    <p class="about-desc">
                        การเปลี่ยนแปลงที่ยั่งยืนเริ่มต้นจากวินัยและความเข้าใจในร่างกายตนเอง ในช่วง 6 เดือนนี้ เทรนเนอร์จะคอยแนะนำทั้งเทคนิคการฝึก (Form) การจัดระเบียบร่างกาย และแผนการโภชนาการที่เหมาะสม เพื่อให้คุณบรรลุเป้าหมายได้อย่างรวดเร็วและปลอดภัยที่สุด
                    </p>
                </div>
            </div>
        </section>
    </main>

    <div id="paymentModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:30px; border-radius:15px; text-align:center; max-width:400px; width:90%;">
            <h2 class="section-title">CHECKOUT</h2>
            <p>ตรวจสอบการเข้าสู่ระบบก่อนทำการชำระเงิน</p>
            <p>สแกน QR เพื่อชำระเงิน <strong><?php echo number_format($price); ?> THB</strong></p>
            <div class="qr-placeholder">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=PTPayment_<?php echo time(); ?>" alt="QR Code">
                <p style="margin-top:15px; color:#ff0000; font-weight:bold;">คอร์ส: <?php echo $course_name; ?></p>
            </div>
            <button class="btn-submit" onclick="processOrder()" style="margin-top:20px;">ยืนยันการโอนเงิน</button>
            <button onclick="closeModal('paymentModal')" style="background:none; border:none; color:#888; cursor:pointer; margin-top:10px;">ยกเลิก</button>
        </div>
    </div>

    <div id="successModal" class="modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="padding:40px; border-radius:15px; text-align:center;">
            <div style="font-size: 50px; color: #ff0000;">✔</div>
            <h2 class="main-title">SUCCESSFUL!</h2>
            <p>ลงทะเบียนคอร์ส Personal Training เรียบร้อยแล้ว</p>
            <button class="btn-submit" onclick="window.location.href='order-history.php'">ไปที่ประวัติการสั่งซื้อ</button>
        </div>
    </div>

    <script>
        document.getElementById('ptEnrollForm').onsubmit = function(e) {
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
                Swal.fire('Error', 'ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้', 'error');
            });
        }
    </script>
</body>
</html>