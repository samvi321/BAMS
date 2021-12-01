<?php
require '../includes/security.php';
include '../includes/connect.php';
if(!isset($_SESSION['user'])){
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <?php
        include '../assets/common.html';
    ?>
    <title>BAMS</title>
</head>
<body>
<?php
    include '../includes/header.html';
?>
<div class="row">
<div class="col-sm-2 bar pr-0">
        <h5 class="bg-dark text-light mb-0">Account Details</h5>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0">Account Details</button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0">Account Statement</button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0">Fund Transfers</button>
        <div class="py-4"></div>
        <h5 class="bg-dark text-light mb-0">Security Settings</h5>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="change-password.php" class="text-light">Change Password</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="change-pin.php" class="text-light">Change Pin No.</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="../includes/logout.php" class="text-light">Sign/Log Out</a></button>
    </div>
    <div class="col-sm-10 text-center pt-4">
        <h3 class="text-left">Transaction Authorization Code</h3>
        <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                        echo '<small style="color:red;">'.$_SESSION['status'].'</small>';
                        unset($_SESSION['status']);
                } 
                ?> 
<form class="form shadow p-4" method="post" action="../includes/trans.php">
    <div class="text-center login-header text-light"><h4>Transfer Funds</h4></div>
    <div class="p-4">
        <div class="form-group row">
            <label for="code" class="col-sm-6 col-form-label">Transaction Authorization Code</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="code" name="code" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="lbtn btn px-4" name="save">Validate TAC</button>
        </div>
    </div>
</form>
    </div>
</div>
</body>
</html>