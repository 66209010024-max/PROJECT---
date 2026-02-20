<?php
session_start();
include 'db_connect.php';

// 1. ตรวจสอบสิทธิ์ Admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// 2. ฟังก์ชันการลบข้อมูล
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM orders WHERE id = $id");
    header("Location: admin-orders.php");
    exit();
}

// 3. ดึงยอดรวมและจำนวนออเดอร์ (ใช้ SQL SUM เพื่อความเร็ว)
$summary = $conn->query("SELECT COUNT(id) as total_count, SUM(amount) as total_sum FROM orders")->fetch_assoc();
$total_orders = $summary['total_count'] ?? 0;
$total_revenue = $summary['total_sum'] ?? 0;

// 4. ดึงข้อมูลออเดอร์ทั้งหมด
$sql = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | GYM Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg: #050505; --card: #121212; --accent: #ff3333; --text: #ffffff; --gray: #888;
        }
        body { background-color: var(--bg); color: var(--text); font-family: 'Prompt', sans-serif; margin: 0; display: flex; }
        
        /* Sidebar */
        .sidebar { width: 260px; height: 100vh; background: var(--card); padding: 30px 20px; position: fixed; border-right: 1px solid #222; }
        .sidebar .brand { font-size: 24px; font-weight: 800; color: var(--accent); margin-bottom: 50px; text-align: center; border-bottom: 1px solid #333; padding-bottom: 20px; }
        .nav-menu a { display: block; color: var(--gray); text-decoration: none; padding: 15px; border-radius: 8px; margin-bottom: 10px; transition: 0.3s; }
        .nav-menu a.active, .nav-menu a:hover { background: rgba(255, 51, 51, 0.1); color: var(--accent); font-weight: 600; }
        
        /* Main Content */
        .main { margin-left: 260px; padding: 40px; width: calc(100% - 260px); }
        .dashboard-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .card { background: var(--card); padding: 25px; border-radius: 12px; border-bottom: 4px solid var(--accent); }
        .card .label { color: var(--gray); font-size: 14px; margin-bottom: 10px; }
        .card .value { font-size: 28px; font-weight: 700; color: #fff; }

        /* Table */
        .table-container { background: var(--card); border-radius: 12px; overflow: hidden; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; color: var(--accent); font-size: 13px; text-transform: uppercase; border-bottom: 2px solid #222; }
        td { padding: 18px 15px; border-bottom: 1px solid #222; font-size: 14px; vertical-align: top; }
        tr:hover { background: #1a1a1a; }
        
        .client-name { font-weight: 600; display: block; color: #fff; }
        .client-contact { color: var(--gray); font-size: 12px; }
        .goal-text { color: #00d4ff; font-style: italic; font-size: 13px; margin-top: 5px; display: block; }
        
        .badge { background: rgba(0, 255, 128, 0.1); color: #00ff80; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 600; border: 1px solid #00ff80; }
        .btn-delete { color: var(--gray); transition: 0.3s; font-size: 16px; }
        .btn-delete:hover { color: var(--accent); }
        .btn-logout { margin-top: 50px; color: #ff4d4d !important; border: 1px solid #ff4d4d; text-align: center; }
        .btn-logout:hover { background: #ff4d4d; color: #fff !important; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">GYM <span style="color:#fff">ADMIN</span></div>
        <nav class="nav-menu">
            <a href="admin-orders.php" class="active"><i class="fas fa-shopping-cart"></i> รายการสั่งซื้อ</a>
            <a href="index.php"><i class="fas fa-home"></i> กลับหน้าหลักเว็บ</a>
            <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
        </nav>
    </aside>

    <main class="main">
        <header style="margin-bottom: 30px;">
            <h2 style="margin:0;">ORDER <span style="color: var(--accent);">MANAGEMENT</span></h2>
            <p style="color: var(--gray); font-size: 14px;">จัดการและตรวจสอบข้อมูลการสมัครสมาชิกคอร์สต่างๆ</p>
        </header>

        <div class="dashboard-cards">
            <div class="card">
                <div class="label"><i class="fas fa-users"></i> จำนวนรายการทั้งหมด</div>
                <div class="value"><?php echo number_format($total_orders); ?> <small style="font-size: 14px;">ออเดอร์</small></div>
            </div>
            <div class="card">
                <div class="label"><i class="fas fa-wallet"></i> รายได้รวมสะสม</div>
                <div class="value" style="color: #00ff80;"><?php echo number_format($total_revenue); ?> <small style="font-size: 14px;">฿</small></div>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th width="15%">วัน/เวลา</th>
                        <th width="25%">ลูกค้า</th>
                        <th width="30%">คอร์ส / เป้าหมาย</th>
                        <th width="15%">ยอดชำระ</th>
                        <th width="10%">สถานะ</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td style="color: var(--gray);">
                                <?php echo date('d/m/Y', strtotime($row['created_at'])); ?><br>
                                <small><?php echo date('H:i', strtotime($row['created_at'])); ?> น.</small>
                            </td>
                            <td>
                                <span class="client-name"><?php echo htmlspecialchars($row['username']); ?></span>
                                <span class="client-contact"><i class="fas fa-phone"></i> <?php echo htmlspecialchars($row['phone']); ?></span><br>
                                <span class="client-contact"><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($row['email']); ?></span>
                            </td>
                            <td>
                                <div style="font-weight: 600; color: var(--accent);">
                                    <?php echo htmlspecialchars($row['course_name']); ?>
                                </div>
                                <span class="goal-text">
                                    <i class="fas fa-bullseye"></i> Goal: 
                                    <?php echo !empty($row['user_goal']) ? htmlspecialchars($row['user_goal']) : 'ไม่ระบุเป้าหมาย'; ?>
                                </span>
                            </td>
                            <td style="font-weight: 700; font-size: 16px;">
                                <?php echo number_format($row['amount']); ?> ฿
                            </td>
                            <td><span class="badge">ชำระแล้ว</span></td>
                            <td style="text-align: center;">
                                <a href="javascript:void(0)" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn-delete" title="ลบออเดอร์">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 80px; color: var(--gray);">
                                <i class="fas fa-box-open" style="font-size: 40px; margin-bottom: 15px;"></i><br>
                                ไม่พบข้อมูลออเดอร์ในระบบ
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
    function confirmDelete(id) {
        if (confirm('ยืนยันการลบรายการออเดอร์ #ORD-' + id + '?\nการกระทำนี้ไม่สามารถย้อนกลับได้')) {
            window.location.href = 'admin-orders.php?delete_id=' + id;
        }
    }
    </script>
</body>
</html>