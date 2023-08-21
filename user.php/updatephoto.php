<?php 
$conn=require_once("../config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $photo=$_POST["photo"];
    $detail=$_POST["detail"];
    $date=$_POST["date"];
    $id=$_POST["id"];
    
    $sql = "UPDATE photo SET photo = '".$photo."', date = '".$date."', detail = '".$detail."' WHERE id ='".$id."' ";
    
    if (mysqli_query($conn, $sql)) {
        echo "数据更新成功";
    } else {
        echo "更新失败: " . mysqli_error($conn);
    }
}else{
    echo 1111;
}
    exit;