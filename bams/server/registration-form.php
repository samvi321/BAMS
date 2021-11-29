<?php
    require '../includes/security.php';
    require '../includes/connect.php';
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
<div class="text-center pt-4 m-4">
        <h2>Register Account</h2>
        <p>Please register your account with us to get the benefits of our BAMS facilities.</p>
        <form action="../includes/register-script.php" method="post">
        <div class="text-center login-header text-light p-0"><h5>Personal Information</h5></div>
        <div class="px-4">
        <div class="form-group border row mb-0">
            <label for="fname" class="col-sm-4 col-form-label" id=" info-label">First Name</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="fname" name="fname" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="lname" class="col-sm-4 col-form-label" id=" info-label">Last Name</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="lname" name="lname" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="password" class="col-sm-4 col-form-label" id=" info-label">Password</label>
            <div class="col-sm-8 text-left">
            <input type="password" class="form-control m-2 w-50" id="password" name="password" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="cpassword" class="col-sm-4 col-form-label" id=" info-label">Confirm Password</label>
            <div class="col-sm-8 text-left">
            <input type="password" class="form-control m-2 w-50" id="cpassword" name="cpassword" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="email" class="col-sm-4 col-form-label" id=" info-label">Email ID</label>
            <div class="col-sm-8 text-left">
            <input type="email" class="form-control m-2 w-50" id="email" name="email" required>
            <?php
                                        if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                                            echo '<small style="color:red;">'.$_SESSION['status'].'</small>';
                                            unset($_SESSION['status']);
                                        } 
                                    ?>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="phone" class="col-sm-4 col-form-label" id=" info-label">Phone No.</label>
            <div class="col-sm-8 text-left">
            <input type="tel" class="form-control m-2 w-50" id="phone" name="phone" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="date" class="col-sm-4 col-form-label" id=" info-label">Date of Birth</label>
            <div class="col-sm-8 text-left">
            <input type="date" class="form-control m-2 w-50" id="date" name="date" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="type" class="col-sm-4 col-form-label" id=" info-label">Gender</label>
            <div class="col-sm-8 text-left">
            <div class="input-group my-3">
                <select class="custom-select" id="inputGroupSelect01" name="gender">
                    <option selected Hidden>-Choose-</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center login-header text-light p-0"><h5>Address Information</h5></div>
    <div class="px-4">
        <div class="form-group border row mb-0">
            <label for="address" class="col-sm-4 col-form-label" id=" info-label">Address</label>
            <div class="col-sm-8 text-left">
            <textarea class="form-control m-2 w-75" id="address" rows="2" name="address" required></textarea>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="city" class="col-sm-4 col-form-label" id=" info-label">City</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="city" name="city" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="state" class="col-sm-4 col-form-label" id=" info-label">State</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="state" name="state" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="zip" class="col-sm-4 col-form-label" id=" info-label">Zip Code</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="zip" name="zip" required>
            </div>
        </div>
    </div>
    <div class="text-center login-header text-light p-0"><h5>Bank Account Information</h5></div>
    <div class="px-4 pb-4">
    <div class="form-group border row mb-0">
            <label for="type" class="col-sm-4 col-form-label" id=" info-label">Account Type</label>
            <div class="col-sm-8 text-left">
            <div class="input-group my-3">
                <select class="custom-select" id="inputGroupSelect02" name="acctype">
                    <option selected Hidden>-Choose-</option>
                    <option value="saving">Saving</option>
                    <option value="current">Current</option>
                    <option value="business">Business</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="account" class="col-sm-4 col-form-label" id=" info-label">Account Number</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="account" name="accnumber" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="ifsc" class="col-sm-4 col-form-label" id=" info-label">IFSC Code</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="ifsc" name="ifsc" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="pin" class="col-sm-4 col-form-label" id=" info-label">Account Pin</label>
            <div class="col-sm-8 text-left">
            <input type="pin" class="form-control m-2 w-50" id="pin" name="pin" maxlength="4" size="4" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="pin" class="col-sm-4 col-form-label" id=" info-label">Verify Pin</label>
            <div class="col-sm-8 text-left">
            <input type="pin" class="form-control m-2 w-50" id="vpin" name="vpin" maxlength="4" size="4" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="pin" class="col-sm-4 col-form-label" id=" info-label"></label>
            <div class="col-sm-8 text-left">
            Already Registered? Please: <button type="button" class="lbtn btn px-4 m-2"><a href="user-login.php" class="text-light">Login Now</a></button>
            </div>
        </div>
    </div>
    <div class="text-center p-0"><button class="lbtn btn px-4" id="register" name="register">Register Now</button></div>
    <div class="px-4 pb-4"></div>
</form>
</div>
</div>
</body>
<script src="../assets/js/signup.js"></script>
</html>