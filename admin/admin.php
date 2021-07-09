<?php
  if(!isset($_COOKIE['username'])){
    header("location:http://localhost/canteen/login.php ");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php include_once('../bootstrap.php')?>
  <title>Admin Page</title>
</head>
<body>
  <div class="main">
    <?php include_once('../header.php')?>
    <div class="container">
      <h2>DASHBOARD:</h2>
        <div class="row row-ambot">
          <a href="http://localhost/canteen/admin/products.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
            <div class="pick">
              <i class="fa fa-archive" style="font-size: 50px;"></i>
              <h2>PRODUCTS</h2>
            </div>
          </a>
          <a href="http://localhost/canteen/admin/supplier.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
              <div class="pick">
                <i class="fa fa-th-large" style="font-size: 50px;"></i>
                <h2>SUPPLIERS</h2>
              </div>
          </a>
          <a href="https://localhost/canteen/admin/customer.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
              <div class="pick">
                <i class="fa fa-users" style="font-size: 50px;"></i>
                <h2>CUSTOMERS</h2>
              </div>
          </a>
          <a href="https://localhost/canteen/admin/manage_admin.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
              <div class="pick">
                <i class="fa fa-lock" style="font-size: 50px;"></i>
                <h2>ADMIN</h2>
              </div>
          </a>
        </div>
        <div class="row row-ambot">
            <a href="https://localhost/canteen/admin/inventory.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
                <div class="pick">
                  <i class="fa fa-book" style="font-size: 50px;"></i>
                  <h2>TOTAL COUNT</h2>
                </div>
            </a>
          </div>
    </div>
  </div>
</body>
</html>