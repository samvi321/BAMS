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
    <div class="col-sm-10 text-center">
        <h1>Admin Main Page</h1>
        <h5>Choose a menu from the left navigation to get started</h5><br><br>
        <div class="row">
        <div class="col-sm-2"></div>
            <div class="col-sm-4 info text-left">
                <div>
                    <h3><a href="account-info.php">Account Information</a></h3>
                    <p>Get the account details of any customer, credit, debit funds from it or active, deactivate fund transfers.</p>
                </div>
            </div>
            <div class="col-sm-4 info text-left">
            <div>
                    <h3><a href="user-info.php">User Details</a></h3>
                    <p>View all your customer details, Activate or Inactive them for login to the system, or delete them.</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>
</body>
</html>