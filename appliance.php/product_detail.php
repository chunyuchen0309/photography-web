
<?php 
$conn=require_once("../config.php");

// 执行查询语句获取照片数据
$inputid=$_POST['id'];
$sql = "SELECT * FROM appliance WHERE id ='".$inputid."'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {

      $photoData = $row['pic'];
    
      $encodedPhotoData = base64_encode($photoData);
      $product = array(
        'id' => $row['id'],
        'appliance' => $row['appliance'],
        'price' => $row['price'],
        'format' => $row['format'],
        'seller' => $row['seller'],
        'detail' => $row['detail'],
        'trade' => $row['trade'],
        'pic' => $encodedPhotoData,
      );
    }   
        //header('Content-Type: application/json');
        $responseJson=json_encode($product);
        echo $responseJson;
              
  } else {
    echo "失敗";
  }
$conn->close();
?>