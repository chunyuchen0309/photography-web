<?php
// 连接到 MySQL 数据库
$conn=require_once("../config.php");
// 检查数据库连接是否成功
session_start();
$appliance = $_POST['appliance'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$format = $_POST['format'];
$seller = $_POST['seller'];
$photo = $_FILES["photo"];
// 读取照片数据
$imgData = addslashes(file_get_contents($photo["tmp_name"]));

// 更新照片数据到数据库
$sql="INSERT INTO appliance (id,appliance,price,format,seller,detail,pic) VALUES(NULL,'".$appliance."','".$price."','".$format."','".$seller."','".$detail."','".$imgData."')"; //註冊至sql

if (mysqli_query($conn, $sql)) {
  echo "上傳成功";
} else {
  echo "上傳失敗: " . mysqli_error($conn);
}

// 关闭数据库连接
$conn->close();
?>
