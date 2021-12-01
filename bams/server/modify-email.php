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
        <button type="button" class="btn btn-succes btn-lg btn-block rounded-0"><a href="../includes/logout.php" class="text-light">Sign/Log Out</a></button>
    </div>
    <div class="col-sm-10 text-center">
        <div class="mx-4 border">
        <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                        echo '<small style="color:red;">'.$_SESSION['status'].'</small>';
                        unset($_SESSION['status']);
                } 
                ?>
        <form class="form shadow" action="../includes/modify-email-script.php" method="post">
    <div class="p-4">
        <div class="form-group border row mb-0 text-left">
        <label for="name" class="col-sm-12 col-form-label" id=" info-label">Change Email Address</label>
        </div>
        <div class="form-group border row mb-0">
            <label for="name" class="col-sm-4 col-form-label" id=" info-label">Old Email ID</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="Email" placeholder="EmailId" name="oemail" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="name" class="col-sm-4 col-form-label" id=" info-label">New Email ID</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="Email" placeholder="EmailId" name="nemail" required>
            </div>
        </div>
        <div class="form-group row mb-0 mt-2">
            <div class="col-sm-4 col-form-label"></div>
            <div class="col-sm-8 text-left">
            <button type="submit" class="lbtn btn" name="modify-email">Modify Email ID</button>
            <button type="button" class="lbtn btn"><a href="user-profile.php" class="text-light">Cancel</a></button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>