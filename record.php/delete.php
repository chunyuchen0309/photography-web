<?php 
$conn=require_once("../config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id=$_POST["id"];
    
    $sql = "DELETE FROM appliance WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "数据更新成功";
    } else {
        echo "更新失败: " . mysqli_error($conn);
    }
}else{
    echo 1111;
}
    exit;