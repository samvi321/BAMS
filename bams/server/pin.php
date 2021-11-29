<?php
    require '../includes/security.php';
    include '../includes/connect.php';
    if(!isset($_SESSION['email'])){
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
    <title>Document</title>
</head>
<body>
<?php
    include '../includes/header.html';
?>
<div class="container"> 
<form class="form shadow" action="../includes/pin-submit.php" method="post">
    <div class="text-center login-header text-light"><h4>:: User Login ::</h4></div>
    <div class="p-4">
        <div class="form-group row">
            <label for="pin" class="col-sm-6 col-form-label">Pin Number</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="pin" name="pin" maxlength="4" size="4" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <button type="submit" class="lbtn btn px-4" name="user-pin">Validate Pin</button>
            </div>
        </div>
    </div>
</form>
</div>
</body>
</html>