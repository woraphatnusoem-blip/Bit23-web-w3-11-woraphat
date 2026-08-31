<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลการเข้าพัก - StayManager</title>
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
            --danger-color: #ff0055;
            --danger-hover: #ff007f;
            --edit-color: #00ffcc;
            --edit-hover: #ffe600;
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

        /* --- Action Buttons --- */
        .btn-action {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            font-size: 0.825rem;
            font-weight: 700;
            transition: all 0.2s ease;
            margin-right: 0.35rem;
        }

        .btn-edit {
            background-color: transparent;
            color: #00ffcc;
            border: 1px solid #00ffcc;
            box-shadow: 0 0 5px rgba(0, 255, 204, 0.3);
        }

        .btn-edit:hover {
            background-color: #00ffcc;
            color: #0f0c1b;
            box-shadow: 0 0 12px #00ffcc;
        }

        .btn-delete {
            background-color: transparent;
            color: #ff0055;
            border: 1px solid #ff0055;
            box-shadow: 0 0 5px rgba(255, 0, 85, 0.3);
        }

        .btn-delete:hover {
            background-color: #ff0055;
            color: #ffffff;
            box-shadow: 0 0 12px #ff0055;
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
                <li><a href="index.php" class="nav-link">รายชื่อเข้าพัก</a></li>
                <li><a href="room.php" class="nav-link">ห้องพัก</a></li>
                <li><a href="manage_order.php" class="nav-link active">จัดการรายการ</a></li>
                
                <li><a href="add_order.php" class="nav-link btn-add">+ เพิ่มข้อมูล</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-container">
        
        <?php
        include "action/connect.php";
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($con, $sql);
        ?>

        <header class="page-header">
            <div>
                <h1 class="page-title">จัดการข้อมูลการเข้าพัก</h1>
                <p class="page-subtitle">แก้ไขหรือลบรายการข้อมูลผู้เข้าพัก</p>
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
                        <th>จัดการ</th>
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
                        <td>
                            <a href="edit_order.php?id=<?= $order["orders_id"] ?>" class="btn-action btn-edit">แก้ไข</a>
                            <a href="action/delete_order.php?id=<?= $order["orders_id"] ?>" class="btn-action btn-delete" onclick="return confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?')">ลบ</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- ปุ่มกดลิงก์เดิม -->
        <div class="action-bar">
            <a href="add_order.php" class="action-link">เพิ่ม</a>
            <a href="index.php" class="action-link">กลับหน้า index</a>
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