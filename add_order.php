<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลการเข้าพัก - StayManager</title>
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
            --input-bg: #261b3e;
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
            max-width: 550px;
            width: 100%;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
            flex: 1;
        }

        /* --- Form Card Minimalist --- */
        .form-card {
            background-color: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(255, 0, 127, 0.3);
        }

        .form-header {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #00ffcc;
        }

        .form-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.01em;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        }

        .form-subtitle {
            font-size: 0.88rem;
            color: #00ffcc;
            margin-top: 0.2rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            font-size: 0.88rem;
            font-weight: 600;
            color: #ffe600;
            margin-bottom: 0.4rem;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 0.7rem 0.85rem;
            background-color: var(--input-bg);
            border: 2px solid #2a2144;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            color: #ffffff;
            transition: all 0.2s ease;
            outline: none;
        }

        input[type="text"]:focus,
        select:focus {
            background-color: #1a162b;
            border-color: #00ffcc;
            box-shadow: 0 0 12px #00ffcc;
        }

        button {
            width: 100%;
            background-color: var(--accent-color);
            color: #ffffff;
            border: none;
            padding: 0.8rem;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: all 0.2s ease;
            box-shadow: 0 0 12px var(--accent-color);
        }

        button:hover {
            background-color: #ffe600;
            color: #0f0c1b;
            box-shadow: 0 0 18px #ffe600;
        }

        button:active {
            transform: scale(0.98);
        }

        .back-link-wrapper {
            margin-top: 1.25rem;
            text-align: center;
        }

        .back-link-wrapper a {
            display: inline-block;
            text-decoration: none;
            color: #00ffcc;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .back-link-wrapper a:hover {
            color: #ffe600;
            background-color: var(--hover-bg);
            box-shadow: 0 0 8px #ff007f;
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
        }

        .footer-links a:hover {
            color: #ffe600;
            text-shadow: 0 0 8px #ffe600;
        }

        @media (max-width: 768px) {
            .nav-container, .footer-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .nav-menu {
                flex-wrap: wrap;
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
                <li><a href="manage_order.php" class="nav-link">จัดการรายการ</a></li>
               
                <li><a href="add_order.php" class="nav-link btn-add active">+ เพิ่มข้อมูล</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Form Container -->
    <main class="main-container">
        
        <div class="form-card">
            <div class="form-header">
                <h1 class="form-title">เพิ่มข้อมูลการเข้าพัก</h1>
                <p class="form-subtitle">กรอกรายละเอียดเพื่อบันทึกรายการเข้าพักใหม่</p>
            </div>

            <form action="action/insert_order.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อผู้เข้าพัก</label>
                    <input type="text" id="name" name="name"><br>
                </div>

                <div class="form-group">
                    <label for="payment">การใช้เงิน</label>
                    <input type="text" id="payment" name="payment"><br>
                </div>

                <div class="form-group">
                    <label for="usage_type">ประเภคการใช้งาน</label>
                    <input type="text" id="usege_type" name="usage_type"><br>
                </div>

                <div class="form-group">
                    <label for="image">ภาพผู้เข้าพัก</label>
                    <input type="text" id="image" name="image"><br>
                </div>

                <?php
                include "action/connect.php";
                // ดึงทั้งหมด จากตาราง rooms
                $sql = "SELECT * FROM rooms";
                $result = mysqli_query($con, $sql);
                ?>

                <div class="form-group">
                    <label for="room_id">เลือกห้องพัก</label>
                    <select name="room_id" id="room_id">
                        <?php 
                        foreach($result as $room){
                            ?>
                            <option value="<?= $room["room_id"]?>">
                                <?= $room["room_id"]."_". $room["price"] . "บาท"?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <button type="submit">บันทึก</button>
            </form>
        </div>

        <div class="back-link-wrapper">
            <a href="index.php">กลับหน้าindex</a>
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