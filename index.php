<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* รีเซ็ตฟอนต์และพื้นหลังภาพรวม */
        body {
            font-family: 'ChulaCharasNew', 'Sarabun', 'Segoe UI', sans-serif;
            background-color: #f8fafc;
            color: #334155;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ตกแต่งตารางหลัก (และล้างขอบ border=1 เดิมให้ดูแพงขึ้น) */
        table {
            width: 100%;
            border-collapse: collapse !important; /* บังคับลบเส้นซ้ำซ้อน */
            border: none !important; /* ซ่อนขอบดำแบบเก่า */
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        /* ส่วนหัวของตาราง (ดึงความโดดเด่น) */
        thead {
            background: linear-gradient(135deg, #49080815 0%, #209b24 100%);
            color: #ffffff;
        }

        th {
            padding: 16px 20px;
            font-size: 16px;
            font-weight: 600;
            text-align: left;
            letter-spacing: 0.5px;
            border: none !important;
        }

        /* ส่วนเนื้อหาข้อมูลในตาราง */
        td {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0 !important;
            border-left: none !important;
            border-right: none !important;
            border-top: none !important;
            font-size: 15px;
            color: #475569;
            vertical-align: middle;
        }

        /* ไฮไลท์แถวสลับสี (Zebra Striping) ช่วยให้มองง่ายขึ้น */
        tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        /* เอฟเฟกต์ตอนเอาเมาส์ชี้แถว */
        tr:hover {
            background-color: #e2e8f0;
            transition: background-color 0.2s ease;
        }

        /* ตกแต่งรูปภาพภายในตาราง */
        td img {
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
            display: block;
        }

        /* ซูมรูปภาพเล็กน้อยเมื่อเอาเมาส์ส่อง */
        td img:hover {
            transform: scale(1.05);
        }

        /* ตกแต่งปุ่มลิงก์ "ไปหน้าroom" ด้านล่าง */
        a[href="room.php"] {
            display: inline-block;
            padding: 12px 24px;
            background-color: #1ea7128c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 550;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
            transition: all 0.2s ease;
        }

        a[href="room.php"]:hover {
            background-color: #db5d5d;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
        }
    </style>
</head>
</head>
<body>
    
    <?php
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM orders";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?>

    <table border=1>
        <thead>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>ภาพ</th>
        </thead>

        <?php
            foreach($result as $order){
                ?>
                <tr>
                    <td><?= $order["order_id"] ?></td>
                    <td><?= $order["name_id"] ?></td>
                    <td><?= $order["payment"] ?></td>
                    <td><?= $order["usage_type"] ?></td>
                    <td><?= $order["room_id"] ?></td>
                    <td>
                        <img 
                            src="<?= $order["image"] ?>"
                            style="width:200px"
                        >
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
     <a href="room.php">ไปหน้าroom</a> 
</body>
</html>