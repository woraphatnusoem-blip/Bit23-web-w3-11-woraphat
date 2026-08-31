 <?php

$id = $_GET["id"];

include "connect.php";

$sql = "DELETE FROM orders WHERE orders_id = '$id'";

$result = mysqli_query($con, $sql);

if(!$result){
    echo "Error";
}else{
    header("location: ../manage_order.php");
    exit;
}