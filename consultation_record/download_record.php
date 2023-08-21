
<?php 
session_start();

$conn=require_once("../config.php");
$uname=$_SESSION['name'];
// 执行查询语句获取照片数据
$sql = "SELECT * FROM send WHERE receiver ='".$uname."' ORDER BY id DESC ";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      
        $record = array(
          'id' => $row['id'],
          'sender' => $row['sender'],
          'receiver' => $row['receiver'],
          'title' => $row['title'],
          'comment' => $row['comment'],
          'time' => $row['time'],
        );
        $data[] = $record;
      
      
    }   
        //header('Content-Type: application/json');
        $responseJson=json_encode($data);
        echo $responseJson;
              
  } else {
    echo "失敗";
  }
$conn->close();
?>