<?php
    require 'security.php';
    include 'connect.php';
    if(!isset($_SESSION['user'])){
        header('location: ../index.php');
    }
    if(isset($_POST['fund-transfer'])){
        $ifsc = $_POST['ifsc'];
        $raccount = $_POST['raccount'];
        $saccount = $_POST['saccount'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $des = $_POST['des'];
        $sql = "SELECT * FROM account WHERE ifsc = '{$ifsc}' AND accountNo = '{$raccount}'";
        $result = mysqli_query($conn,$sql) or die("query failed.");
        $num = mysqli_num_rows($result);
        $sql1 = "SELECT * FROM account WHERE accountNo = '{$saccount}' AND accountBalance > $amount";
        $result1 = mysqli_query($conn,$sql1) or die("query failed.");
        $num1 = mysqli_num_rows($result1);
        if($num == 1 and $num1 == 1){
            $_SESSION['amount'] = $amount;
            $_SESSION['raccount'] = $raccount;
            $_SESSION['saccount'] = $saccount;
            $_SESSION['date'] = $date;
            $_SESSION['des'] = $des;
            header('location: ../server/trans-auth.php');
        }
        else{
            $_SESSION['status'] = "Either wrong receiver's account details or account balance is low";
            header('location: ../server/user-profile-home.php');
        }
    }
?>