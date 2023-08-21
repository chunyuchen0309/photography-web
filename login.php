<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    check();
}else{
    login();
}
function check(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $email=$_SESSION['email'];
        if(!empty($email)){
            echo 1;
        }else{
            echo 0;
        }
    }
   
}
function login(){    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 取得表單資料
        $conn=require_once "config.php";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM member WHERE email ='".$email."'";
    
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result)==1 && $password == $row["password"]){
            $_SESSION['email'] = $email;
            echo '1';
        }else{
            echo "帳號或密碼錯誤";
        }
      }else{
        echo "錯誤";
      }

      mysqli_close($link);
}


?>
