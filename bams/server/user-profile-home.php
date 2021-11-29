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
        <h3 class="text-left">Welcome, <?php echo $_SESSION['email'] ?></h3>
<div id="accordion">
<p class="d-flex flex-row">
  <button class="btn btn-succes btn-block rounded-0 w-25" type="button" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Account Statements</button>
  <button class="btn btn-succes btn-block rounded-0 w-25" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Account Details</button>
  <butto<button class="btn btn-succes btn-block rounded-0 w-25" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Fund Transfers</button>
</p>
    <!-- first collapse -->
    <div class="collapse multi-collapse" id="multiCollapseExample1"  data-parent="#accordion">
      <div class="card card-body">
      <h2>Account Statement</h2>
        <h5>View list of all credit/debit/fund transfer transaction summary by this user.</h5><br><br>
        <div class="mx-4">
        <table class="table table-striped table-bordered">
  <thead> 
    <tr>
      <th scope="col">Transaction Date</th>
      <th scope="col">Reference No.</th>
      <th scope="col">Transaction Description</th>
      <th scope="col">Debit</th>
      <th scope="col">Credit</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            $sql1 = "SELECT a.accountNo,a.accountBalance,s.transactionDate,s.referenceNo,s.transactiondes,s.debit,s.credit,s.status FROM account a, statement s WHERE a.accountNo = s.accountNo AND a.accountNo = '{$_SESSION['accno']}'";
            $result1 = mysqli_query($conn,$sql1) or die("query failed.");
            foreach($result1 as $row1){
        ?>
    <tr>
      <th scope="row"><?php echo $row1['transactionDate'] ?></th>
      <td><?php echo $row1['referenceNo'] ?></td>
      <td><?php echo $row1['transactiondes'] ?></td>
      <td><?php echo $row1['debit'] ?></td>
      <td><?php echo $row1['credit'] ?></td>
      <td><?php echo $row1['status'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
        </div>
        <h4 class="text-left">Available Credit Balance: <?php echo '$'.$row1['accountBalance'].'.00' ?></h4>
      </div>
    </div>
   <!-- second collapse -->
    <div class="collapse multi-collapse" id="multiCollapseExample2" data-parent="#accordion">
      <div class="card card-body">
      <div class="text-center pt-4 m-4">
        <h2>User Account Details</h2>
        <p>If you feel that you have a weaker strength password, then please change it. We recmment you to change your password in every 45 days to make it secure</p>
        <?php 
            $sql = "SELECT u.userFirstname,u.userLastname,u.email,u.phone,u.address,u.city,u.state,u.zipCode,u.accountNo,a.ifsc,a.accountBalance,a.accountPin FROM user u, account a WHERE u.accountNo = a.accountNo AND u.accountNo = '{$_SESSION['accno']}'";
            $result = mysqli_query($conn,$sql) or die("query failed.");
            foreach($result as $row){
        ?> 
        <form class="form shadow">
        <div class="text-center login-header text-light p-2"><h5>User Account Details</h5></div>
        <div class="px-4">
        <div class="form-group border row mb-0">
            <label for="name" class="col-sm-4 col-form-label" id=" info-label">User Fullname</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="name" name="name"  value="<?php echo $row['userFirstname'].' '.$row['userLastname'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="email" class="col-sm-4 col-form-label" id=" info-label">Email ID</label>
            <div class="col-sm-8 text-left">
            <input type="email" readonly class="form-control m-2 w-50" id="email" name="email" value="<?php echo $row['email'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="phone" class="col-sm-4 col-form-label" id=" info-label">Phone No.</label>
            <div class="col-sm-8 text-left">
            <input type="tel" readonly class="form-control m-2 w-50" id="phone" name="phone" value="<?php echo $row['phone'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="address" class="col-sm-4 col-form-label" id=" info-label">Address</label>
            <div class="col-sm-8 text-left">
            <input class="form-control m-2 w-75" readonly id="address" rows="2" value="<?php echo $row['address'] ?>"></input>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="city" class="col-sm-4 col-form-label" id=" info-label">City</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="city" name="city" value="<?php echo $row['city'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="state" class="col-sm-4 col-form-label" id=" info-label">State</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="state" name="state" value="<?php echo $row['state'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="zip" class="col-sm-4 col-form-label" id=" info-label">Zip Code</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="zip" name="zip" value="<?php echo $row['zipCode'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="account" class="col-sm-4 col-form-label" id=" info-label">Account Number</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="account" name="account" value="<?php echo $row['accountNo'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="ifsc" class="col-sm-4 col-form-label" id=" info-label">IFSC Code</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="ifsc" name="ifsc" value="<?php echo $row['ifsc'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="balace" class="col-sm-4 col-form-label" id=" info-label">Account Balance</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="balance" name="balance" value="<?php echo '$'.$row['accountBalance'].'.00' ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="pin" class="col-sm-4 col-form-label" id=" info-label">Account Pin</label>
            <div class="col-sm-8 text-left">
            <input type="pin" readonly class="form-control m-2 w-50" id="pin" name="pin" maxlength="4" size="4" value="<?php echo $row['accountPin'] ?>">
            </div>
        </div>
    </div>
</form>
<?php } ?>
</div>
</div>
</div>
  <!-- third collapse -->
  <div class="collapse multi-collapse" id="multiCollapseExample3" data-parent="#accordion">
      <div class="card card-body">
      <div class="text-center pt-4 m-4">
        <h2>Transfer Funds</h2>
        <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                        echo '<small style="color:red;">'.$_SESSION['status'].'</small>';
                        unset($_SESSION['status']);
                } 
                ?>
        <p>Fund transfer is the process of transferring funds from your account to other account in same bank. Please make sure that you have enough funds available in your account to transfer.</p>
        <form class="form shadow" action="../includes/fund-validate.php" method="post">
        <div class="text-center login-header text-light p-2"><h5>Transfer Funds</h5></div>
        <div class="px-4">
        <div class="form-group border row mb-0">
            <label for="ifsc" class="col-sm-4 col-form-label" id=" info-label">Receiver's Bank IFSC Code</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="ifsc" name="ifsc" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="name" class="col-sm-4 col-form-label" id=" info-label">Receiver's Name</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="name" name="name" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="raccount" class="col-sm-4 col-form-label" id=" info-label">Receiver's Account Number</label>
            <div class="col-sm-8 text-left">
            <input type="text" class="form-control m-2 w-50" id="raccount" name="raccount" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="saccount" class="col-sm-4 col-form-label" id=" info-label">Sender's Account Number</label>
            <div class="col-sm-8 text-left">
            <input type="text" readonly class="form-control m-2 w-50" id="saccount" name="saccount" value="<?php echo $row['accountNo'] ?>">
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="amount" class="col-sm-4 col-form-label" id=" info-label">Amount to Transfer USD</label>
            <div class="col-sm-8 text-left">
            <input type="text"class="form-control m-2 w-50" id="amount" name="amount" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="date" class="col-sm-4 col-form-label" id=" info-label">Date of Transfer</label>
            <div class="col-sm-8 text-left">
            <input type="date" class="form-control m-2 w-50" readonly id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <label for="address" class="col-sm-4 col-form-label" id=" info-label">Transfer Description</label>
            <div class="col-sm-8 text-left">
            <textarea class="form-control m-2 w-75" id="address" rows="2" name="des" required></textarea>
            </div>
        </div>
        <div class="form-group border row mb-0">
            <div class="col-sm-12">
                <button type="submit" class="lbtn btn px-4 m-2" name="fund-transfer">Fund Transfer</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>