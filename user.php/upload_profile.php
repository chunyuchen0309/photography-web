<?php 
$conn=require_once("../config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $oldname=$_SESSION['name'];
    $email=$_SESSION['email'] ;
    $username=$_POST["name"];
    $usercontact=$_POST["contact"];
    $userphone=$_POST["phone"];
    $usergender=$_POST["gender"];
    $userdetail=$_POST["detail"];
    $sql = "UPDATE member SET name = '".$username."',contact = '".$usercontact."', phone = '".$userphone."', gender = '".$usergender."', detail = '".$userdetail."' WHERE email ='".$email."'";
    $sql1 = "UPDATE appliance SET seller = '".$username."' WHERE seller ='".$oldname."'";
    $sql2 = "UPDATE photo SET photographer = '".$username."' WHERE photographer ='".$oldname."'";
    $sql3 = "UPDATE record SET seller = '".$username."' WHERE seller ='".$oldname."'";
    $sql3 = "UPDATE send SET sender = '".$username."' WHERE sender ='".$oldname."'";
    $sql4 = "UPDATE send SET receiver = '".$username."' WHERE receiver ='".$oldname."'";
    $check="SELECT * FROM member WHERE name='".$username."'";
    if($oldname==$username){
        $result0=mysqli_query($conn, $sql);
        echo "更新成功";
    }else{
        if (mysqli_num_rows(mysqli_query($conn,$check))==0) {
            $result1=mysqli_query($conn, $sql1);
            $result2=mysqli_query($conn, $sql2);
            $result3=mysqli_query($conn, $sql3);
            $result4=mysqli_query($conn, $sql4);
            $result0=mysqli_query($conn, $sql);
            echo "更新成功";
        } else {
            echo "名稱不能重複";
        }
    }
    exit;
}
mysqli_close($conn);