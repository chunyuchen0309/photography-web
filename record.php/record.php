<?php 
    $conn=require_once("../config.php");

    // 执行查询语句获取照片数据
    session_start();
    $email=$_SESSION['email'];
    $name=$_POST['name'];
    $sql1 = "SELECT * FROM record WHERE buyer ='".$email."'";
    $sql2 = "SELECT * FROM record WHERE seller ='".$name."'";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

      $count = array(
        'in' => mysqli_num_rows($result1),
        'out' => mysqli_num_rows($result2),
      );

        //header('Content-Type: application/json');
        $responseJson=json_encode($count);
        echo $responseJson;

$conn->close();
?>