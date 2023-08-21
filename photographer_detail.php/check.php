<?php 
$conn=require_once("../config.php");
session_start();

    $name=$_POST['name'];
    $sql = "SELECT * FROM member WHERE name ='".$name."'";   
    if (mysqli_num_rows(mysqli_query($conn,$sql))==0) {
        echo '0';
    } else {
        echo "1";
    }
    exit;