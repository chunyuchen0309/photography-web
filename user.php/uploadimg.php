<?php
// 连接到 MySQL 数据库
$conn=require_once("../config.php");
// 检查数据库连接是否成功
session_start();
$photo = $_FILES["photo"];
$email=$_SESSION['email'] ;
// 读取照片数据
$imgData = addslashes(file_get_contents($photo["tmp_name"]));

// 更新照片数据到数据库
$sql = "UPDATE member SET img = '$imgData' WHERE email ='".$email."' ";

if (mysqli_query($conn, $sql)) {
  echo "頭像更新成功";
} else {
  echo "頭像更新失敗: " . mysqli_error($conn);
}

// 关闭数据库连接
$conn->close();
?>
