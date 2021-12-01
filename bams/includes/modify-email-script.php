<?php
    require '../includes/security.php';
    include '../includes/connect.php';
    if(!isset($_SESSION['user'])){
        header('location: ../index.php');
    }

    if(isset($_POST['modify-email'])){
        $oemail = $_POST['oemail'];
        $nemail = $_POST['nemail'];
        $sql1 = "SELECT * FROM user WHERE email = '$oemail'";
        $result1 = mysqli_query($conn,$sql1);
        $num = mysqli_num_rows($result1);
        if($num == 1){
        $sql = "UPDATE user SET email = '$nemail' WHERE email = '$oemail'";
        $result = mysqli_query($conn,$sql);
        header('location: ../server/admin-homepage.php');
        }
        else{
            $_SESSION['status'] = "email doesn't exist";
            header('location: ../server/modify-email.php');
        }
    }
?>