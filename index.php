<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการการเข้าพัก - Index</title>
    <!-- Google Fonts for clean minimalist typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
:root {
            --bg-color: #0f0c1b;
            --card-bg: #1a162b;
            --text-primary: #ffffff;
            --text-secondary: #00ffcc;
            --border-color: #ff007f;
            --accent-color: #ff0055;
            --hover-bg: #321347;
            --badge-bg: #ffe600;
            --badge-text: #0f0c1b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Prompt', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        /* --- Navbar Minimalist --- */
        .navbar {
            background-color: var(--card-bg);
            border-bottom: 2px solid var(--border-color);
            padding: 1.25rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 0 15px rgba(255, 0, 127, 0.4);
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-logo {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #00ffcc;
            text-shadow: 0 0 8px #00ffcc;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .brand-logo::before {
            content: '';
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: #ffe600;
            box-shadow: 0 0 8px #ffe600;
            border-radius: 50%;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: #00ffcc;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.5rem 0.85rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: #ffffff;
            background-color: var(--hover-bg);
            box-shadow: 0 0 10px #ff007f;
        }

        .nav-link.btn-add {
            background-color: var(--accent-color);
            color: #ffffff;
            font-weight: 700;
            margin-left: 0.5rem;
            box-shadow: 0 0 12px var(--accent-color);
        }

        .nav-link.btn-add:hover {
            background-color: #ffe600;
            color: #0f0c1b;
            box-shadow: 0 0 15px #ffe600;
            transform: translateY(-2px);
        }

        /* --- Layout Container --- */
        .main-container {
            max-width: 1100px;
            width: 100%;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
            flex: 1;
        }

        /* --- Header Section --- */
        .page-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding-bottom: 1.25rem;
            border-bottom: 2px solid #00ffcc;
        }

        .page-title {
            font-size: 1.65rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .page-subtitle {
            font-size: 0.9rem;
            color: #00ffcc;
            margin-top: 0.25rem;
        }

        /* --- Table Styling --- */
        .table-card {
            background-color: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(255, 0, 127, 0.25);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background-color: #261b3e;
            border-bottom: 2px solid var(--border-color);
        }

        th {
            padding: 1.1rem 1.25rem;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #ffe600;
        }

        td {
            padding: 1.1rem 1.25rem;
            font-size: 0.95rem;
            color: var(--text-primary);
            border-bottom: 1px solid #2a2144;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: all 0.15s ease;
        }

        tbody tr:hover {
            background-color: var(--hover-bg);
        }

        /* Cell Specifics */
        .order-id {
            font-family: monospace;
            font-size: 0.9rem;
            color: #00ffcc;
            font-weight: 700;
            text-shadow: 0 0 5px #00ffcc;
        }

        .guest-name {
            font-weight: 600;
        }

        .room-badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            background-color: var(--badge-bg);
            color: var(--badge-text);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 800;
            box-shadow: 0 0 10px var(--badge-bg);
        }

        .img-thumb {
            width: 64px;
            height: 48px;
            object-fit: cover;
            border-radius: 6px;
            border: 2px solid #00ffcc;
            display: block;
            background-color: #2a2144;
            box-shadow: 0 0 8px rgba(0, 255, 204, 0.5);
        }

        /* --- Quick Action Links Bar --- */
        .action-bar {
            margin-top: 1.5rem;
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            padding: 0.65rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #00ffcc;
            background-color: var(--card-bg);
            border: 2px solid #00ffcc;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 0 8px rgba(0, 255, 204, 0.3);
        }

        .action-link:hover {
            background-color: #00ffcc;
            color: #0f0c1b;
            box-shadow: 0 0 15px #00ffcc;
            transform: translateY(-2px);
        }

        /* --- Footer Minimalist --- */
        .footer {
            background-color: var(--card-bg);
            border-top: 2px solid var(--border-color);
            padding: 1.5rem 2rem;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #00ffcc;
        }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            color: #00ffcc;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: #ffe600;
            text-shadow: 0 0 8px #ffe600;
        }

        @media (max-width: 768px) {
            .nav-container, .page-header, .footer-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .nav-menu {
                flex-wrap: wrap;
            }
            th, td {
                padding: 0.75rem 0.5rem;
            }
            .img-thumb {
                width: 50px;
                height: 40px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Bar (เชื่อมโยง 5 หน้าหลัก) -->
    <nav class="navbar">
        <div class="nav-container">
            
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link active">รายชื่อเข้าพัก</a></li>
                <li><a href="room.php" class="nav-link">ห้องพัก</a></li>
                <li><a href="manage_order.php" class="nav-link">จัดการรายการ</a></li>

                <li><a href="add_order.php" class="nav-link btn-add">+ เพิ่มข้อมูล</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-container">
        
        <?php
            include "action/connect.php";
            // ดึงข้อมูลทั้งหมดจากตาราง orders
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($con, $sql);
        ?>

        <header class="page-header">
            <div>
                <h1 class="page-title">รายชื่อผู้เข้าพัก</h1>
                <p class="page-subtitle">รายการและข้อมูลการเข้าพักทั้งหมดในระบบ</p>
            </div>
        </header>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>รหัสรายการ</th>
                        <th>ชื่อผู้เข้าพัก</th>
                        <th>ชำระเงิน</th>
                        <th>ประเภท</th>
                        <th>ห้อง</th>
                        <th>ภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $order){
                            ?>
                            <tr> 
                                <td class="order-id">#<?= htmlspecialchars($order["orders_id"]) ?></td>
                                <td class="guest-name"><?= htmlspecialchars($order["name"]) ?></td>
                                <td><?= htmlspecialchars($order["payment"]) ?></td>
                                <td><?= htmlspecialchars($order["usege_type"]) ?></td>
                                <td><span class="room-badge">ห้อง <?= htmlspecialchars($order["room_id"]) ?></span></td>
                                <td>
                                    <img 
                                        src="<?= htmlspecialchars($order["image"]) ?>"
                                        alt="ภาพสลิป/ผู้เข้าพัก"
                                        class="img-thumb"
                                    >
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- ปุ่มลิงก์เชื่อมโยงตามโจทย์เดิม -->
        <div class="action-bar">
            <a href="room.php" class="action-link">ไปหน้า Room</a>  
            <a href="add_order.php" class="action-link">เพิ่มข้อมูล</a> 
            <a href="manage_order.php" class="action-link">ไปหน้าแก้ไข</a> 
         
        </div>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
        <p>&copy; <?= date("Y") ?> woraphat nusoem</p>
            <div class="footer-links">
                <a href="index.php">หน้าแรก</a>
                <a href="room.php">ห้องพัก</a>
                <a href="add_order.php">เพิ่มข้อมูล</a>
                <a href="manage_order.php">แก้ไขข้อมูล</a>
               
            </div>
        </div>
    </footer>

</body>
</html>
