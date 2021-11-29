<?php
require 'security.php';
include 'connect.php';
if(!isset($_SESSION['email'])){
    header('location: ../index.php');
}
if(isset($_POST['user-pin'])){
    $user = $_SESSION['email'];
    $pin = $_POST['pin'];
    $accno = $_SESSION['accno'];
    $sql = "SELECT * FROM account WHERE accountNo = '{$accno}' AND accountPin = '{$pin}'";
    $result = mysqli_query($conn,$sql) or die("query failed.");
    $num = mysqli_num_rows($result);
    if($num == 1){
        $_SESSION['user'] = $user;
        header("location: ../server/user-profile-home.php");
    }
    else {
        $_SESSION['status'] = 'pin is invalid';
        header("location: ../server/user-login.php");
    }
}
?>