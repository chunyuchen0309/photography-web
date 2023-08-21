
<?php 
$conn=require_once("../config.php");
session_start();
$email=$_SESSION['email'] ;

// 执行查询语句获取照片数据

$sql = "SELECT img FROM member WHERE email ='".$email."'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    
    $photoData = $row['img'];
    if($photoData=="NULL"){
        echo 0;
    }else{
        $encodedPhotoData = base64_encode($photoData);
        // 设置响应头为图片类型
        header("Content-type: image/jpeg");
      
        // 输出图片数据
        echo $encodedPhotoData;
    }
    
  } else {
    echo "无法获取图片数据";
  }
$conn->close();
?>