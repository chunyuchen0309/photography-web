<?php 
$conn=require_once("../config.php");
session_start();

    $scarch=$_POST['name'];
    $sql = "SELECT * FROM appliance WHERE CONCAT(appliance) LIKE '%".$scarch."%'";   
    if (mysqli_num_rows(mysqli_query($conn,$sql))==0) {
        echo '0';
    } else {
        $data = array();
        $result=mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
    
          $photoData = $row['pic'];
        
          $encodedPhotoData = base64_encode($photoData);
          $photo = array(
            'id' => $row['id'],
            'appliance' => $row['appliance'],
            'price' => $row['price'],
            'format' => $row['format'],
            'seller' => $row['seller'],
            'detail' => $row['detail'],
            'trade' => $row['trade'],
            'pic' => $encodedPhotoData,
          );
          $data[] = $photo;
        }   
            //header('Content-Type: application/json');
            $responseJson=json_encode($data);
        echo $responseJson;
    }
exit;