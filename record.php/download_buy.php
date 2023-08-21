<?php 
$conn=require_once("../config.php");
session_start();
// 执行查询语句获取照片数据
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$sql = "SELECT * FROM record WHERE buyer ='".$email."'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
   
      //$encodedPhotoData = base64_encode($photoData);
      $photo = array(
        'id' => $row['id'],
        'appliance' => $row['appliance'],
        'price' => $row['price'],
        'format' => $row['format'],
        'detail' => $row['detail'],
        'seller' => $row['seller'],
        'pay' => $row['pay'],
        'trade' => $row['trade'],
        'buyer' => $row['buyer'],
        'time' => $row['time'],
        'uid' => $row['uid'],
      );
      $data[] = $photo;
    }   
        //header('Content-Type: application/json');
        $responseJson=json_encode($data);
        echo $responseJson;
              
  } else {
    echo "失敗";
  }
$conn->close();
?>