<?php
    require '../includes/security.php';
    include '../includes/connect.php';
    if(!isset($_SESSION['user'])){
        header('location: ../index.php');
    }

    if(isset($_POST['delete'])){
        $account = $_POST['account'];
        $sql1 = "SELECT * FROM account WHERE accountNo = '$account'";
        $result1 = mysqli_query($conn,$sql1);
        $num = mysqli_num_rows($result1);
        if($num == 1){
        $sql = "DELETE FROM loan WHERE accountNo = '$account'";
        $result = mysqli_query($conn,$sql) or die('query failed1');
        $sql = "DELETE FROM statement WHERE accountNo = '$account'";
        $result = mysqli_query($conn,$sql) or die('query failed2');
        $sql = "DELETE FROM account WHERE accountNo = '$account'";
        $result = mysqli_query($conn,$sql) or die('query failed3');
        $sql = "DELETE FROM user WHERE accountNo = '$account'";
        $result = mysqli_query($conn,$sql) or die('query failed4');
        header('location: ../server/admin-homepage.php');
        }
        else{
            $_SESSION['status'] = "account doesn't exist";
            header('location: ../server/close-account.php');
        }
    }
?>