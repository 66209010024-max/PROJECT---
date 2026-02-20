<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

// ตรวจสอบสิทธิ์การเข้าถึง
if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// ดึงข้อมูลระบุตัวตนจาก Session
$user_id = $_SESSION['user_id'] ?? 0;
$user_email = $_SESSION['email'] ?? '';
$user_name = $_SESSION['username'] ?? '';

// ดึงข้อมูลโดยเช็คจาก user_id เป็นหลัก หรือ email/fullname เป็นตัวสำรอง
$sql = "SELECT * FROM orders WHERE user_id = ? OR email = ? OR username = ? ORDER BY created_at DESC"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $user_email, $user_name);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History | ประวัติการสั่งซื้อ</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg-black: #000000;
            --card-gray: #121212;
            --accent-red: #e60000;
            --text-white: #ffffff;
            --text-muted: #888888;
        }

        body {
            background-color: var(--bg-black);
            color: var(--text-white);
            font-family: 'Prompt', sans-serif;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .page-header {
            border-bottom: 3px solid var(--accent-red);
            padding-bottom: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: 24px;
            margin: 0;
            text-transform: uppercase;
        }

        .btn-home {
            color: var(--text-white);
            text-decoration: none;
            font-size: 14px;
            border: 1px solid var(--text-muted);
            padding: 8px 20px;
            border-radius: 4px;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: var(--accent-red);
            border-color: var(--accent-red);
        }

        .order-card {
            background: var(--card-gray);
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 20px;
            display: grid;
            grid-template-columns: 1.2fr 2.5fr 1.2fr 1fr;
            align-items: center;
            border-left: 4px solid transparent;
            transition: 0.2s;
        }

        .order-card:hover {
            border-left: 4px solid var(--accent-red);
            background: #1a1a1a;
            transform: scale(1.01);
        }

        .label {
            color: var(--text-muted);
            font-size: 11px;
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .data {
            font-size: 15px;
            font-weight: 600;
        }

        .data.price {
            color: var(--accent-red);
            font-size: 18px;
            font-weight: 800;
        }

        .status-badge {
            background: rgba(0, 230, 0, 0.1);
            color: #00e600; /* สีเขียวสำหรับสถานะ Paid */
            border: 1px solid #00e600;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            text-align: center;
            display: inline-block;
        }

        .status-badge.paid {
            background: rgba(230, 0, 0, 0.1);
            color: var(--accent-red);
            border: 1px solid var(--accent-red);
        }

        @media (max-width: 768px) {
            .order-card {
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1><span style="color: var(--accent-red);">MY</span> ORDERS</h1>
            <a href="index.php" class="btn-home"><i class="fas fa-home"></i> กลับหน้าหลัก</a>
        </div>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="order-card">
                    <div>
                        <span class="label">วันที่สั่งซื้อ</span>
                        <div class="data"><?php echo date('d M Y', strtotime($row['created_at'])); ?></div>
                        <div style="font-size: 11px; color: var(--text-muted);"><?php echo date('H:i', strtotime($row['created_at'])); ?> น.</div>
                    </div>
                    <div>
                        <span class="label">รายการคอร์ส</span>
                        <div class="data"><?php echo htmlspecialchars($row['course_name']); ?></div>
                    </div>
                    <div>
                        <span class="label">ยอดชำระ</span>
                        <div class="data price"><?php echo number_format($row['amount']); ?>.-</div>
                    </div>
                    <div style="text-align: right;">
                        <span class="status-badge <?php echo (strtolower($row['status']) == 'paid') ? 'paid' : ''; ?>">
                            <?php echo strtoupper($row['status'] ?? 'SUCCESS'); ?>
                        </span>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-shopping-basket" style="font-size: 50px; margin-bottom: 20px;"></i>
                <p>ยังไม่มีประวัติการทำรายการในขณะนี้</p>
                <a href="index.php" style="color: var(--accent-red); text-decoration: none; font-weight: bold;">เลือกดูคอร์สออกกำลังกายที่สนใจ →</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>