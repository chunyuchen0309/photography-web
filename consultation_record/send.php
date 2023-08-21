<?php
// 连接到 MySQL 数据库
$conn=require_once("../config.php");
// 检查数据库连接是否成功
session_start();

date_default_timezone_set('Asia/Taipei');
$current_time = date("Y-m-d H:i:s");

$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$title = $_POST['title'];
$comment = $_POST['comment'];

// 更新照片数据到数据库
$sql="INSERT INTO send (id,sender,receiver,title,comment,time) VALUES(NULL,'".$sender."','".$receiver."','".$title."','".$comment."','".$current_time."')"; //註冊至sql

if (mysqli_query($conn, $sql)) {
  echo "上傳成功";
} else {
  echo "上傳失敗: " . mysqli_error($conn);
}

// 关闭数据库连接
$conn->close();
?>
