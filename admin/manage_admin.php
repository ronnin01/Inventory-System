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
  <title>Document</title>
</head>
<body>
  <div class="main" style="width: 100%;">
    <?php include_once('../header.php')?>

    <div class="container-fluid">
      <div class="container-fluid" style="display: flex;">
        <h2>MANAGE ADMIN:</h2> 
      </div>

      <div class="container">
        <a class="btn btn-primary" style="margin: 7px;" href="http://localhost/canteen/admin/admin_add.php">Add</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>              
                <th scope="col">Admin Username</th>
                <th scope="col">Date Added</th>
              </tr>
            </thead>
            <tbody> 
              <?php include_once('../admin/admin_read.php')?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>