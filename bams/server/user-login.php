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
    <div class="text-center login-header text-light"><h4>:: User Login ::</h4></div>
    <div class="p-4">
    <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                        echo '<small style="color:red;">'.$_SESSION['status'].'</small>';
                        unset($_SESSION['status']);
                } 
                ?>
        <div class="form-group row">
            <label for="Email" class="col-sm-6 col-form-label">User ID</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="EmailId" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-6 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <button type="submit" class="lbtn btn" name="login-user">Login Now!</button>
            </div>
        </div>
        <div class="form-group text-center">
            <div><strong>New User? Please</strong></div>
            <button type="button" class="lbtn btn px-4"><a href="registration-form.php" class="text-light">Register Now</a></button>
        </div>
    </div>
</form>
</div>
<div class="text-center">
    <button class="btn btn-success"><a href="../index.php" class="text-light"><i class="fa fa-arrow-left pr-2"></i>Back to home</a></button>
</div>
</body>
</html>