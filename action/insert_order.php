<?php


$name = $_POST["name"];
$payment = $_POST["payment"];
$usege_type = $_POST["usege_type"];
$room_id = $_POST["room_id"];
$image = $_POST["image"];

 include "connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "INSERT INTO orders
        ( name, payment, usege_type, room_id, image) VALUES 
        ('$name','$payment','$usege_type','$room_id','$image')";

        //  echo $sql;
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        if(!$result){
            echo "Error";
        }else{
            header("location: ../index.php");
            exit;
        }
        // ทดสอบตัวแปร
        // var_dump($result);
