
<?php 
$conn=require_once("../config.php");

$name=$_POST['name'];
// 执行查询语句获取照片数据
$sql = "SELECT * FROM photo WHERE photographer ='".$name."'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {

      $photoData = $row['data'];
    
      $encodedPhotoData = base64_encode($photoData);
      $photo = array(
        'photo' => $row['photo'],
        'date' => $row['date'],
        'detail' => $row['detail'],
        'data' => $encodedPhotoData,
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