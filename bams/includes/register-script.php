<?php
    require 'security.php';
    include 'connect.php';
    if(isset($_POST['register'])){
        $user = $_POST['email'];
        $sql = "SELECT * FROM user WHERE email='$user'";
        $result = mysqli_query($conn,$sql) or die("query failed.");
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['status'] = "Email already exists.";
            header('location: ../server/registration-form.php');
        }
        else{ 
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $password = mysqli_real_escape_string($conn,md5($_POST['password']));
        $user = mysqli_real_escape_string($conn,$_POST['email']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $date = mysqli_real_escape_string($conn,$_POST['date']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $zip = mysqli_real_escape_string($conn,$_POST['zip']);
        $acctype = mysqli_real_escape_string($conn,$_POST['acctype']);
        $accnumber = mysqli_real_escape_string($conn,$_POST['accnumber']);
        $ifsc = mysqli_real_escape_string($conn,$_POST['ifsc']);
        $pin = mysqli_real_escape_string($conn,$_POST['pin']);
        $sql1 = "INSERT INTO user(userFirstname,userLastname,password,email,phone,dob,gender,address,city,state,zipCode,accountNo) VALUES ('{$fname}','{$lname}','{$password}','{$user}','{$phone}','{$date}','{$gender}','{$address}','{$city}','{$state}','{$zip}','{$accnumber}')";
        $result1 = mysqli_query($conn,$sql1) or die("qeury 1 failed.");
        $sql2 = "INSERT INTO account(accountNo,accountType,ifsc,accountPin,accountBalance,accountStatus) VALUES ('{$accnumber}','{$acctype}','{$ifsc}','{$pin}',100,'active')";
        $result2 = mysqli_query($conn,$sql2) or die("qeury 2 failed.");
        header('location: ../server/register-success.php');
        }
    }
?>