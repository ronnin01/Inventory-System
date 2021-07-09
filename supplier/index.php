<?php
  include_once('../connection.php');


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
  <title>Supplier</title>
</head>
<body>
  <div class="main" style="width: 100%;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkgray;">
      <div class="container-fluid">
        <a class="navbar-brand" style="color: black;" href="http://localhost/canteen/supplier/index.php">Supplier Page</a>
        <a class="navbar-brand" name=: style="color: black;" href="http://localhost/canteen/logout.php">Logout</a>
      </div>
    </nav>

    <div class="container">
      <h2>DASHBOARD:</h2>

      <div class="row row-ambot">

        <a href="http://localhost/canteen/supplier/products.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
          <div class="pick">
            <i class="fa fa-archive" style="font-size: 50px;"></i>
            <h2>PRODUCTS</h2>
          </div>
        </a>
        <a href="http://localhost/canteen/supplier/supplier_update.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
          <div class="pick">
            <i class="fa fa-user" style="font-size: 50px;"></i>
            <h2>UDATE SUPPLIER</h2>
          </div>
        </a>
        <a href="http://localhost/canteen/admin/products.php" class="col-sm-3 card" style="text-decoration: none; color: white;">
          <div class="pick">
            <i class="fa fa-archive" style="font-size: 50px;"></i>
            <h2>PRODUCTS</h2>
          </div>
        </a>
      </div>
    </div>
  </div>


  <style>
    .main{
      width: 100%;
    }
    .card{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      background-color: darkgray;
      height: 45vh;
      margin: 10px;
    }

    .row-ambot{
      display: flex;
      justify-content: center;
    }
    .row-ambot a, i{
      text-decoration: none;
      color: white;
    }
    .card:hover{
      transform: translateY(-2px);
      transition: 0.5s;
      box-shadow: 0px 2px 8px 0px black;
    }
    .pick{
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
  </style>
</body>
</html>