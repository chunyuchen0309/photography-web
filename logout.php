<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //echo $_POST['do'];
    //echo 1;
    unset($_SESSION['email']);
    unset($_SESSION['name']);    
    echo 1;
}
exit();
?>