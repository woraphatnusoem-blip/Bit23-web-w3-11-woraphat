<?php

$name = $_POST["name"];
$payment = $_POST["payment"];
$usege_type = $_POST["usege_type"];
$room_id = $_POST["room_id"];
$image = $_POST["image"];
$orders_id =$_POST['orders_id'];
 include "connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "UPDATE orders 
        SET 
        name='$name',
        payment='$payment',
        usege_type='$usege_type',
        room_id='$room_id',
        image='$image' 
        WHERE orders_id = '$orders_id' ";
         echo $sql;
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        if(!$result){
            echo "Error";
        }else{
            header("location: ../manage_order.php");
            exit;
        }
        // ทดสอบตัวแปร
        // var_dump($result);
