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
            $acc = $_GET['value'] ;
            $sql = "SELECT s.transactionDate,s.referenceNo,s.transactiondes,s.debit,s.credit,s.status FROM statement s WHERE s.accountNo = '$acc'";
            $result = mysqli_query($conn,$sql) or die("query failed.");
            foreach($result as $row){
        ?>
    <tr>
      <th scope="row"><?php echo $row['transactionDate'] ?></th>
      <td><?php echo $row['referenceNo'] ?></td>
      <td><?php echo $row['transactiondes'] ?></td>
      <td><?php echo $row['debit'] ?></td>
      <td><?php echo $row['credit'] ?></td>
      <td><?php echo $row['status'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
        </div>
    </div>
</div>
</body>
</html>