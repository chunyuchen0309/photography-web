<?php
// 连接到 MySQL 数据库
$conn=require_once("../config.php");
// 检查数据库连接是否成功
session_start();
$id=$_POST['id'];


$sql0 = "SELECT * FROM send WHERE id ='".$id."'";
$result0 = mysqli_query($conn, $sql0);
$row0 = mysqli_fetch_assoc($result0);

$receiver=$row0['sender'];

$sender = $_SESSION['name'];
$title = $_POST['title'];
$comment = $_POST['comment'];

$current_time = date("Y-m-d H:i:s");
// 更新照片数据到数据库
$sql="INSERT INTO send (id,sender,receiver,title,comment,time) VALUES(NULL,'".$sender."','".$receiver."','".$title."','".$comment."','".$current_time."')";

if (mysqli_query($conn, $sql)) {
  echo "上傳成功";
} else {
  echo "上傳失敗: " . mysqli_error($conn);
}

// 关闭数据库连接
$conn->close();
?>
