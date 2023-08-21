
<?php 
session_start();
$uname=$_SESSION['name'];
$conn=require_once("../config.php");
$id=$_POST['id'];

$sql0 = "SELECT * FROM send WHERE id ='".$id."'";
$result0 = mysqli_query($conn, $sql0);
$row0 = mysqli_fetch_assoc($result0);

$sender0=$row0['sender'];


// 执行查询语句获取照片数据
$sql = "SELECT * FROM send WHERE (sender = '$sender0' AND receiver = '$uname') or (sender = '$uname' AND receiver = '$sender0') ";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      
        $record = array(
          'time' => $row['time'],
          'id' => $row['id'],
          'sender' => $row['sender'],
          'receiver' => $row['receiver'],
          'title' => $row['title'],
          'comment' => $row['comment'],
          
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