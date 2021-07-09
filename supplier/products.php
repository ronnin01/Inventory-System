<?php
  include_once('../connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once('../bootstrap.php')?>
  <title>Supplier</title>
</head>
<body>
  <div class="main" style="width: 100%;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkgray;">
      <div class="container-fluid">
        <a class="navbar-brand" style="color: black;" href="http://localhost/canteen/supplier/index.php">Supplier Page</a>
        <a class="navbar-brand" style="color: black;" href="http://localhost/canteen/logout.php">Logout</a>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="container-fluid" style="display: flex;">
        <h2>PRODUCTS:</h2> 
      </div>

      <div class="container">
        <a class="btn btn-primary" style="margin: 7px;" href="http://localhost/canteen/supplier/add.php">Add</a>

        <table class="table table-striped">
          <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Supplier ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Image</th>
                <th scope="col">Date Added</th>
              </tr>
          </thead>
          <tbody>
            <?php  include_once('../supplier/read.php') ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>