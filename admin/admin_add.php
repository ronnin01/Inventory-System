<?php
  include_once('../connection.php');

  if(isset($_POST['submit'])){
    $user = mysqli_escape_string($conn, trim($_POST['user']));
    $pass = mysqli_escape_string($conn, trim($_POST['pass']));
    $pass2 = mysqli_escape_string($conn, trim($_POST['pass2']));

    $sql_check = "SELECT username FROM users WHERE username = '$user'";
    $data = mysqli_query($conn, $sql_check);

    if(mysqli_num_rows($data) == 1){
      echo "<script>alert('The username has been used.')</script>";
    }else if(strlen($pass) < 6){
      echo "<script>alert('Password must be 6 above.')</script>";
    }else if($pass != $pass2){
      echo "<script>alert('Password not match.')</script>";
    }else{

      $new = md5($pass);
      $sql_insert = "INSERT INTO users(username,password) VALUES('$user','$new')";
      $result = mysqli_query($conn, $sql_insert);

      if($result){
        echo "<script>alert('Admin Added.')</script>";
      }else{
        echo "<script>alert('Unable to add admin.')</script>";
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
        <h2>MANAGE ADMIN:</h2> 
      </div>

      <div class="container">
        <div class="login-form">
          <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
              <h2 class="text-center">Add Admin</h2>       
              <div class="form-group">
                  <input type="text" name="user" class="form-control" placeholder="Admin Username" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="pass" class="form-control" placeholder="Password" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="pass2" class="form-control" placeholder="Confirm Password" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
              </div>   
              <div class="form-group">
                <a class="btn btn-primary btn-block" href="https://localhost/canteen/admin/manage_admin.php">Back</a>
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