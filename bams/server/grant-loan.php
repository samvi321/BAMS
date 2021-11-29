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
<div class="row home-row">
<div class="col-sm-2 bar pr-0">
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="admin-homepage.php" class="text-light">Admin Home</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="user-info.php" class="text-light">User Details</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="account-info.php" class="text-light">Account Details</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="close-account.php" class="text-light">Close Account</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="grant-loan.php" class="text-light">Grant Loan</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="loan.php" class="text-light">View Loans</a></button>
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="../includes/logout.php" class="text-light">Sign/Log Out</a></button>
    </div>
    <div class="col-sm-10 text-center pt-4">
    <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                        echo '<small style="color:red;">'.$_SESSION['status'].'</small>';
                        unset($_SESSION['status']);
                } 
                ?>
<form class="form shadow p-4" action="../includes/grant-loan-script.php" method="post">
    <div class="text-center login-header text-light"><h4>Grant Loan</h4></div>
    <div class="p-4">
        <div class="form-group border row mb-0">
            <label for="account" class="col-sm-4 col-form-label" id=" info-label">Account Number</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="account" name="account" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="type" class="col-sm-4 col-form-label" id=" info-label">Loan Type</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="type" name="type" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="amount" class="col-sm-4 col-form-label" id=" info-label">Loan Amount</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="amount" name="amount" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="interest" class="col-sm-4 col-form-label" id=" info-label">Interest(%)</label>
            <div class="col-sm-8 text-left">
            <input type="number" class="form-control m-2 w-50" id="interest" name="interest" max="100" min="0" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="lbtn btn px-4 m-2" name="loan-submit">Submit</button>
        </div>
    </div>
</form>
    </div>
</div>
</body>
</html>