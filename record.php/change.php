<?php 
$conn=require_once("../config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $appliance=$_POST["appliance"];
    $price=$_POST["price"];
    $format=$_POST["format"];
    $detail=$_POST['detail'];
    $id=$_POST["id"];
    
    $sql = "UPDATE appliance  SET appliance	 = '".$appliance."', price = '".$price."', format = '".$format."', detail = '".$detail."' WHERE id ='".$id."' ";
    
    if (mysqli_query($conn, $sql)) {
        echo "数据更新成功";
    } else {
        echo "更新失败: " . mysqli_error($conn);
    }
}else{
    echo 1111;
}
    exit;