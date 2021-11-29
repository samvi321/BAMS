<?php
    require '../includes/security.php';
    include '../includes/connect.php';
    if(!isset($_SESSION['user'])){
        header('location: ../index.php');
    }

if(isset($_POST['loan-submit']))
{
$account = $_POST['account'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$date = date('Y-m-d');
$interest = $_POST['interest'];
$sql2 = "SELECT * FROM account WHERE accountNo = '$account'";
$result2 = mysqli_query($conn,$sql2) or die("query failed2.");
$num = mysqli_num_rows($result2);
if($num == 1){
$sql = "INSERT INTO loan(accountNo,loanType,loanAmount,interest,issuedDate,remaining) VALUES ('{$account}','{$type}','{$amount}','{$interest}','{$date}','{$amount}')";
$result = mysqli_query($conn,$sql) or die("query failed1.");
$sql1 = "UPDATE account SET accountBalance = accountBalance + '{$amount}' WHERE accountNo = '$account'";
$result1 = mysqli_query($conn,$sql1) or die("query failed2.");
header('location: ../server/admin-homepage.php');
}
else{
    $_SESSION['status'] = "account doesn't exist";
    header('location: ../server/grant-loan.php');
}
}
?>