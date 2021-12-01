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
$rndno = time() . rand(10*45, 100*98);
$sql = "SELECT * FROM account WHERE accountNo = '{$saccount}' AND accountPin = '{$code}' AND accountBalance > 0";
$result = mysqli_query($conn,$sql) or die("query failed1.");
$num = mysqli_num_rows($result);
if($num == 1){
    $sql1 = "UPDATE account SET account.accountBalance = account.accountBalance + '{$amount}' WHERE accountNo = '{$raccount}'";
$result1 = mysqli_query($conn,$sql1) or die("query failed2.");
$sql2 = "UPDATE account SET account.accountBalance = account.accountBalance - '{$amount}' WHERE accountNo = '{$saccount}'";
$result2 = mysqli_query($conn,$sql2) or die("query failed3."); 
$sql3 = "INSERT INTO statement(accountNo,transactionDate,referenceNo,transactiondes,debit,credit,status) VALUES ('{$saccount}','{$date}','{$rndno}','{$des}','{$amount}','','success')";
$result3 = mysqli_query($conn,$sql3) or die("query failed4.");
$sql = "INSERT INTO statement(accountNo,transactionDate,referenceNo,transactiondes,debit,credit,status) VALUES ('{$raccount}','{$date}','{$rndno}','{$des}','','{$amount}','success')";
$result = mysqli_query($conn,$sql) or die("query failed5.");
header('location: ../server/trans-success.php');
    }
else{
$_SESSION['status'] = 'invalid pin or low balance!';
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
$rndno = time() . rand(10*45, 100*98);
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