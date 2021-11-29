<?php
    require 'security.php';
    include 'connect.php';
    if(!isset($_SESSION['user'])){
        header('location: ../index.php');
    }
    if(isset($_POST['change-password'])){
        $accountno = $_SESSION['accno'];
        $new_password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $sql = "UPDATE user SET password = '$new_password' WHERE accountNo = '$accountno'";
        $result = mysqli_query($conn,$sql);
        header('location: ../server/user-profile-home.php');
    }
    if(isset($_POST['change-pin'])){
        $accountno = $_SESSION['accno'];
        $new_pin = $_POST['pin'];
        $sql1 = "UPDATE account SET accountPin = '$new_pin' WHERE accountNo = '$accountno'";
        $result1 = mysqli_query($conn,$sql1) or die('query failed');
        header('location: ../server/user-profile-home.php');
    }
?>