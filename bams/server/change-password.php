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
        <h3 class="text-left">Change Password</h3>
        <p class="text-left">If you feel that you have a weaker strength password, then please change it. We recommend you to change your password every 45 days tomake it secure.</p> 
<form class="form shadow p-4" action="../includes/change-security.php" method="post">
    <div class="text-center login-header text-light"><h4>Change Password</h4></div>
    <div class="p-4">
        <div class="form-group border row mb-0">
            <label for="name" class="col-sm-4 col-form-label" id=" info-label">User Fullname</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="name" name="name" value="<?php echo $_SESSION['user'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="account" class="col-sm-4 col-form-label" id=" info-label">Account Number</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="account" name="account" value="<?php echo $_SESSION['accno'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="password" class="col-sm-4 col-form-label" id=" info-label">New Password</label>
            <div class="col-sm-8 text-left">
            <input type="password" class="form-control m-2 w-50" id="password" name="password" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="cpassword" class="col-sm-4 col-form-label" id=" info-label">Confirm New Password</label>
            <div class="col-sm-8 text-left">
            <input type="password" class="form-control m-2 w-50" id="cpassword" name="cpassword" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" name="change-password" class="lbtn btn px-4 m-2">Change Password</button>
        </div>
    </div>
</form>
    </div>
</div>
</body>
<script src="../assets/js/signup.js"></script>
</html>