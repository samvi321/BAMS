<?php
    require '../includes/security.php';
    include '../includes/connect.php';
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
<form class="form shadow" action="../includes/login-submit.php" method="post">
    <div class="text-center login-header text-light"><h4>:: Admin Login ::</h4></div>
    <div class="p-4">
        <div class="form-group row">
            <label for="Email" class="col-sm-6 col-form-label">Username</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="EmailId" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-6 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <button type="submit" class="lbtn btn" name="login-admin">Login Now!</button>
            </div>
        </div>
    </div>
</form>
</div>
<div class="text-center">
    <button class="btn btn-succes"><a href="../index.php" class="text-light"><i class="fa fa-arrow-left pr-2"></i>Back to home</a></button>
</div>
</body>
</html>