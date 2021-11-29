<?php
require '../includes/security.php';
include '../includes/connect.php';
include '../assets/common.html';
if(!isset($_SESSION['user'])){
    header('location: ../index.php');
}
if(isset($_POST['save']))
{
$code = $_POST['code'];
$amount = $_SESSION['amount'];
$raccount = $_SESSION['raccount'];
$saccount = $_SESSION['saccount'];
$date = $_SESSION['date'];
$des = $_SESSION['des'];
$rndno = 'XXX'.rand(100000, 999999).'XXX';
$sql = "SELECT * FROM account WHERE accountNo = '{$saccount}' AND accountPin = '{$code}'";
    $result = mysqli_query($conn,$sql) or die("query failed.");
    $num = mysqli_num_rows($result);
    if($num == 1){
        $sql1 = "UPDATE account SET account.accountBalance = account.accountBalance + '{$amount}' WHERE accountNo = '{$raccount}'";
$result1 = mysqli_query($conn,$sql1) or die("query failed.");
$sql2 = "UPDATE account SET account.accountBalance = account.accountBalance - '{$amount}' WHERE accountNo = '{$saccount}'";
$result2 = mysqli_query($conn,$sql2) or die("query failed."); 
$sql3 = "INSERT INTO statement(accountNo,transactionDate,referenceNo,transactiondes,debit,credit,status) VALUES ('{$saccount}','{$date}','{$rndno}','{$des}','{$amount}','','success')";
$result3 = mysqli_query($conn,$sql3) or die("query failed.");
$sql4 = "INSERT INTO statement(accountNo,transactionDate,referenceNo,transactiondes,debit,credit,status) VALUES ('{$raccount}','{$date}','{$rndno}','{$des}','','{$amount}','success')";
$result4 = mysqli_query($conn,$sql4) or die("query failed.");
header('location: ../server/trans-success.php');
    }
else{
$_SESSION['status'] = 'invalid pin!';
header("location: ../server/trans-auth.php");
}
}

if(isset($_POST['admin-save']))
{
$account = $_SESSION['acc'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$date = $_POST['date'];
$des = $_POST['des'];
$rndno = 'XXX'.rand(100000, 999999).'XXX';
if($type == 'debit'){
    $debit = $amount;
    $credit = 0;
    $sql = "UPDATE account SET accountBalance = accountBalance - '{$amount}' WHERE accountNo = $account";
}
else{
    $debit = 0;
    $credit = $amount;
    $sql = "UPDATE account SET accountBalance = accountBalance + '{$amount}' WHERE accountNo = $account";
}
$result = mysqli_query($conn,$sql) or die('query failed1');
$sql1 = "INSERT INTO statement(accountNo,transactionDate,referenceNo,transactiondes,debit,credit,status) VALUES ('{$account}','{$date}','{$rndno}','{$des}','{$debit}','{$credit}','success')";
$result1 = mysqli_query($conn,$sql1) or die("query failed2.");
unset($_SESSION['acc']); 
header('location: admin-trans.php');
}
?>