<?php 
$conn=require_once("../config.php");
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['name'];
    $sql = "SELECT * FROM member WHERE name ='".$name."'";   
    if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['name']=$row["name"];
        
        $responseData = array("name" => "".$row["name"]."","contact" => "".$row["contact"]."","phone" => "".$row["phone"]."","gender" => "".$row["gender"]."","detail" => "".$row["detail"]."",);
        $responseJson = json_encode($responseData);
        echo $responseJson;
    } else {
        echo "更新失败: " . mysqli_error($conn);
    }
    exit;
    
}


mysqli_close($conn);