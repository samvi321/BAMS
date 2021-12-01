<?php
    require 'security.php';
    include 'connect.php';
    if(isset($_POST['login-user'])) {
        $user =  $_POST['email'];
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $sql = "SELECT * FROM user WHERE email = '{$user}' AND password = '{$password}'";
        $result = mysqli_query($conn,$sql) or die("query failed.");
        $num = mysqli_num_rows($result);
		if($num == 1) {
            $_SESSION['email'] = $user;
            foreach($result as $row){
                $_SESSION['accno'] = $row['accountNo'];
            }
            header("location: ../server/pin.php");
        }
        else {
            $_SESSION['status'] = 'Email id/ Password is invalid';
            header("location: ../server/user-login.php");
        }
    }
    if(isset($_POST['login-admin'])) {
        $user =  $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT emailid FROM admin WHERE emailid = '{$user}' AND password = '{$password}'";
        $result = mysqli_query($conn,$sql) or die("query failed.");
        $num = mysqli_num_rows($result);
		if($num == 1) {
            $_SESSION['user'] = $user;
            header("location: ../server/admin-homepage.php");
        }
        else {
            $_SESSION['status'] = 'Email id/ Password is invalid';
            header("location: ../server/admin-login.php");
        }
    }
?>