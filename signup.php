<?php 
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email=$_POST["email"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check="SELECT * FROM member WHERE email='".$email."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){ //沒有搜尋到行 代表沒有註冊過
        //(mysqli_num_rows() 裡面必須包含查詢語法會回傳有幾行
        $sql="INSERT INTO member (id,email,password) 
            VALUES(NULL,'".$email."','".$password."')"; //註冊至sql
        if(mysqli_query($conn, $sql)){
            //echo "$check<br>";
            echo "註冊成功!";
            
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "該帳號已有註冊!";
        //echo "<a href='register.html'>轉至登入介面</a>";
        
    }
    exit;
}


mysqli_close($conn);