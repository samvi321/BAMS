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
        <h2>Account Details List</h2>
        <h5>View acoount details, credit, debit funds from the account or activate, de-activate them.</h5><br><br>
        <div class="mx-4">
        <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Account No.</th>
      <th scope="col">IFSC Code</th>
      <th scope="col">Balance</th>
      <th scope="col">Account Type</th>
      <th scope="col">Account Status</th>
      <th scope="col">View Statement</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            $sql = "SELECT u.userFirstname,u.userLastname,u.accountNo,a.ifsc,a.accountBalance,a.accountType,a.accountStatus FROM user u, account a WHERE u.accountNo = a.accountNo";
            $result = mysqli_query($conn,$sql) or die("query failed.");
            foreach($result as $row){
        ?> 
    <tr>
      <th scope="row"><?php echo $row['userFirstname'].' '.$row['userLastname'] ?></th>
      <td><?php echo $row['accountNo'] ?></td>
      <td><?php echo $row['ifsc'] ?></td>
      <td><?php echo $row['accountBalance'] ?></td>
      <td><?php echo $row['accountType'] ?></td>
      <td><?php echo $row['accountStatus'] ?></td>
      <td><a href="account-statement.php?value=<?php echo $row['accountNo']; ?>">Statement</a></td>
    </tr>
    <?php } ?>
  </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>