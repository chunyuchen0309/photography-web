<?php
// 连接到 MySQL 数据库
$conn=require_once("../config.php");
// 检查数据库连接是否成功
session_start();
$buyer = $_SESSION['email'];
$appliance = $_POST['appliance'];
$format = $_POST['format'];
$price = $_POST['price'];
$seller = $_POST['seller'];
$pay = $_POST['pay'];
$trade = $_POST['trade'];
$time = $_POST['time'];
$uid = $_POST['uid'];
$detail = $_POST['detail'];

date_default_timezone_set('Asia/Taipei');
$current_time = date("Y-m-d H:i");

// 更新照片数据到数据库
$sql="INSERT INTO record (id,appliance,detail,format,price,seller,pay,trade,buyer,time,uid) VALUES(NULL,'".$appliance."','".$detail."','".$format."','".$price."','".$seller."','".$pay."','".$trade."','".$buyer."','".$current_time."','".$uid."')"; //註冊至sql

if (mysqli_query($conn, $sql)) {
  echo "上傳成功";
} else {
  echo "上傳失敗: " . mysqli_error($conn);
}

// 关闭数据库连接
$conn->close();
?>
