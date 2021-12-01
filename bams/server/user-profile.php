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
        <h2>User Details</h2>
        <div class="mx-4 border">
        <?php
           $acc = $_GET['value'] ;
           $_SESSION['acc'] = $acc;
            $sql = "SELECT u.userFirstname,u.userLastname,u.email,u.phone,u.address,u.city,u.state,u.zipCode,u.accountNo,a.accountBalance,a.accountType FROM user u, account a WHERE u.accountNo = a.accountNo AND u.accountNo = '$acc'";
            $result = mysqli_query($conn,$sql) or die("query failed.");
            $row = mysqli_fetch_assoc($result);
        ?> 
        <form class="form shadow" action="../includes/trans.php" method="post">
    <div class="p-4">
        <div class="form-group border row mb-0">
            <label for="name" class="col-sm-4 col-form-label" id=" info-label">Account Holder Name</label>
            <div class="col-sm-8 text-left">
                <p name="name">Name: <?php echo $row['userFirstname'].' '.$row['userLastname'] ?></p>
                <p name="email">Email: <?php echo $row['email'] ?><a href="modify-email.php">|EDIT eMAIL|</a></p>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="mobile" class="col-sm-4 col-form-label" id=" info-label">Mobile Number</label>
            <div class="col-sm-8 text-left">
                <p name="phone">Phone: <?php echo $row['phone'] ?></p>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="address" class="col-sm-4 col-form-label" id=" info-label">Full Address</label>
            <div class="col-sm-8 text-left">
                <p name="address"><?php echo $row['address'].' '.$row['city'].' '.$row['state'].' '.$row['zipCode'] ?></p>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="account" class="col-sm-4 col-form-label" id=" info-label">Account Number</label>
            <div class="col-sm-8 text-left">
                <p name="accNo"><?php echo $acc;?></p>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="balance" class="col-sm-4 col-form-label" id=" info-label">Current Balance</label>
            <div class="col-sm-8 text-left">
                <p name="balance">Balance: <?php echo '$'.$row['accountBalance'].'.00' ?></p>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="history" class="col-sm-4 col-form-label" id=" info-label">Transaction History</label>
            <div class="col-sm-8 text-left">
                <p><a href="account-statement.php?value=<?php echo $row['accountNo']; ?>">View Transaction History</a></p>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="type" class="col-sm-4 col-form-label" id=" info-label">Transaction Type</label>
            <div class="col-sm-8 text-left">
            <div class="input-group my-3">
                <select class="custom-select" id="inputGroupSelect01" name="type">
                    <option selected Hidden>-Select Transaction Type-</option>
                    <option value="credit">Deposit</option>
                    <option value="debit">Withdrawal</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="balance" class="col-sm-4 col-form-label" id=" info-label">Amount(Cr/Dr)</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="number" placeholder="Enter Amount" name="amount">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="date" class="col-sm-4 col-form-label" id=" info-label">Date of Transfer</label>
            <div class="col-sm-8 text-left">
            <input type="date" readonly class="form-control m-2 w-50" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="des" class="col-sm-4 col-form-label" id=" info-label">Transfer Description</label>
            <div class="col-sm-8 text-left">
            <textarea class="form-control m-2 w-75" id="des" rows="2" name="des"></textarea>
            </div>
        </div>
        <div class="form-group row mb-0 mt-2">
            <div class="col-sm-4 col-form-label"></div>
            <div class="col-sm-8 text-left">
            <button type="button" class="lbtn btn"><a href="user-info.php" class="text-light">Back</a></button>
            <button type="submit" name="admin-save" class="lbtn btn">Proceed Transaction</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>