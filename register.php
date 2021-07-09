<?php
  include_once("connection.php");

  if(isset($_POST['submit'])){

    $firstname = mysqli_escape_string($conn, trim($_POST['firstname']));
    $lastname = mysqli_escape_string($conn, trim($_POST['lastname']));
    $username = mysqli_escape_string($conn, trim($_POST['username']));
    $password = mysqli_escape_string($conn, trim($_POST['password']));
    $password2 = mysqli_escape_string($conn, trim($_POST['password2']));
    $role = "customer";

    $sql_check = "SELECT username FROM customers WHERE username = '$username'";
    $result = mysqli_query($conn, $sql_check);

    if(mysqli_num_rows($result) == 1){
      echo "<script>alert('Username has been used.')</script>";
    }else if(strlen($password) < 6){
      echo "<script>alert('Password must be 6 up.')</script>";
    }else if($password != $password2){
      echo "<script>alert('Password not match.')</script>";
    }else{
      $new_pass = md5($password);
      $sql_insert = "INSERT INTO customers(cus_id, firstname, lastname, username, password, role)".
                    "VALUES(0, '$firstname', '$lastname', '$username', '$new_pass', '$role')";
      
      $data = mysqli_query($conn, $sql_insert);

      if($data){
        echo "<script>alert('User added.')</script>";
      }else{
        echo "<script>alert('Unable to add user.')</script>";
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
  <?php include_once("bootstrap.php");?>
  <link rel="stylesheet" href="css/register.css">
  <title>Register</title>
</head>
<body>
  <div class="login-form">
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
    <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="firstname" class="form-control" placeholder="Firstname" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Lastname" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        </div>       
    </form>
    <p class="text-center"><a href="login.php">Login now!</a></p>
  </div>
</body>
</html>