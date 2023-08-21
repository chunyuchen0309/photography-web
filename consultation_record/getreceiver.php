<?php 
$conn=require_once("../config.php");
session_start();

// 执行查询语句获取照片数据
$id=$_POST['id'];
$sql = "SELECT 	photographer  FROM photo WHERE id ='".$id."'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    
    $photoData = $row['photographer'];
    
        // 输出图片数据
    echo $photoData;
    
    
  } else {
    echo "失敗";
  }
$conn->close();
?>