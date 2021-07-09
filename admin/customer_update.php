<?php
  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');


  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql_fetch = "SELECT * FROM customers WHERE cus_id = '$id'";
    $data_result = mysqli_query($conn, $sql_fetch);

    while($row = mysqli_fetch_assoc($data_result)){
      $fname = $row['firstname'];
      $lname = $row['lastname'];
      $user = $row['username'];
      $p1 = $row['password'];
      $p2 = $row['password'];

    }

    if(isset($_POST['submit'])){

      $firstname = mysqli_escape_string($conn, trim($_POST['firstname']));
      $lastname = mysqli_escape_string($conn, trim($_POST['lastname']));
      $username = mysqli_escape_string($conn, trim($_POST['username']));
      $password = mysqli_escape_string($conn, trim($_POST['password']));
      $password2 = mysqli_escape_string($conn, trim($_POST['password2']));

      $sql_check = "SELECT username FROM customers WHERE username = '$username'";
      $result = mysqli_query($conn, $sql_check);

      if(strlen($password) < 6){
        echo "<script>alert('Password must be 6 above.')</script>";
      }else if($password != $password2){
        echo "<script>alert('Password not match.')</script>";
      }else{
        $new_pass = md5($password);
        $sql_insert = "UPDATE customers SET firstname='$firstname', lastname='$lastname', username='$username', password='$new_pass'  WHERE cus_id='$id'";
        $data = mysqli_query($conn, $sql_insert);

        if($data){
          header('location: https://localhost/canteen/admin/customer.php');
        }else{
          echo "<script>alert('Unable to update Customer.')</script>";
        }
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
    <?php include_once('../header.php');?>

    <div class="container-fluid">
      <div class="container-fluid" style="display: flex;">
        <h2>CUSTOMERS:</h2> 
      </div>

      <div class="container">
        <div class="login-form">
          <form action="<?= $_SERVER['PHP_SELF']."?id=".$_GET['id']?>" method="POST">
              <h2 class="text-center">Add Customer</h2>
              <div class="form-group">
                  <input type="text" value="<?= $fname?>" name="firstname" class="form-control" placeholder="Firstname" required="required">
              </div>
              <div class="form-group">
                  <input type="text" value="<?= $lname?>" name="lastname" class="form-control" placeholder="Lastname" required="required">
              </div>
              <div class="form-group">
                  <input type="text" value="<?= $user?>" name="username" class="form-control" placeholder="Username" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
              </div>   
              <div class="form-group">
                <a class="btn btn-primary btn-block" href="https://localhost/canteen/admin/customer.php">Back</a>
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