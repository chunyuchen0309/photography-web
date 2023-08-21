<?php
// 连接到 MySQL 数据库
$conn=require_once("../config.php");
// 检查数据库连接是否成功
session_start();
$name = $_POST['name'];
$photographer = $_POST['photographer'];
$detail = $_POST['detail'];
$date = $_POST['date'];
$photo = $_FILES["photo"];
// 读取照片数据
$imgData = addslashes(file_get_contents($photo["tmp_name"]));

// 更新照片数据到数据库
$sql="INSERT INTO photo (id,photo,photographer,detail,date,data) VALUES(NULL,'".$name."','".$photographer."','".$detail."','".$date."','".$imgData."')"; //註冊至sql

if (mysqli_query($conn, $sql)) {
  echo "上傳成功";
} else {
  echo "上傳失敗: " . mysqli_error($conn);
}

// 关闭数据库连接
$conn->close();
?>
