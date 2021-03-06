<?php
  include_once('../connection.php');
  if(!isset($_COOKIE['username'])){
    header("location:http://localhost/canteen/login.php ");
  }

  if(isset($_POST['submit'])){
    $sup_id = mysqli_escape_string($conn, trim($_POST['sup_id']));
    $sup_user = mysqli_escape_string($conn, trim($_POST['sup_user']));
    $sup_pass = mysqli_escape_string($conn, trim($_POST['sup_pass']));
    $sup_pass2 = mysqli_escape_string($conn, trim($_POST['sup_pass2']));
    $sup_name = mysqli_escape_string($conn, trim($_POST['sup_name']));
    $sup_company_name = mysqli_escape_string($conn, trim($_POST['sup_company_name']));

    $sql_check = "SELECT sup_id, username FROM suppliers WHERE sup_id = '$sup_id'";
    $data = mysqli_query($conn, $sql_check);

    if(mysqli_num_rows($data) == 1){
      echo "<script>alert('The Supplier ID or Username has been used')</script>";
    }else if(strlen($sup_pass) < 6){
      echo "<script>alert('Password must be 6 and above.')</script>";
    }else if($sup_pass != $sup_pass2){
      echo "<script>alert('Password is not match.')</script>";
    }else if(strlen($sup_id) < 1){
      echo "<script>alert('Supplier must be greater 1.')</script>";
    }else{
      $new_pass = md5($sup_pass);
      $sql_insert = "INSERT INTO suppliers(sup_id,username,password, sup_name, sup_company_name)".
                    "VALUES('$sup_id', '$sup_user', '$new_pass','$sup_name', '$sup_company_name')";

      $data = mysqli_query($conn, $sql_insert);

      if($data){
        echo "<script>alert('Supplier Added.')</script>";
      }else{
        echo "<script>alert('Unable to add Supplier.')</script>";
      }
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once('../bootstrap.php')?>
  <title>Admin Panel</title>
</head>
<body>
  <div class="main" style="width: 100%;">
    <?php include_once('../header.php')?>
    
    <div class="container-fluid">
      <div class="container-fluid" style="display: flex;">
        <h2>SUPPLIERS:</h2> 
      </div>

      <div class="container">
        <div class="login-form">
          <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
              <h2 class="text-center">Add Supplier</h2>       
              <div class="form-group">
                  <input type="number" name="sup_id" class="form-control" placeholder="Supplier ID" required="required">
              </div>
              <div class="form-group">
                  <input type="text" name="sup_user" class="form-control" placeholder="Username" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="sup_pass" class="form-control" placeholder="Password" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="sup_pass2" class="form-control" placeholder="Password" required="required">
              </div>
              <div class="form-group">
                  <input type="text" name="sup_name" class="form-control" placeholder="Supplier Name" required="required">
              </div>
              <div class="form-group">
                  <input type="text" name="sup_company_name" class="form-control" placeholder="Supplier Company Name" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
              </div>   
              <div class="form-group">
                <a class="btn btn-primary btn-block" href="https://localhost/canteen/admin/supplier.php">Back</a>
              </div>    
          </form>
          
        </div>
      </div>

    </div>

  </div>

  <style type="text/css">
    .login-form {
      width: 540px;
      margin: 10px auto;
      }
      .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
      }
      .login-form h2 {
        margin: 0 0 15px;
      }
      .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
      }
      .btn {        
        font-size: 15px;
        font-weight: bold;
      }
      
  </style>
</body>
</html>