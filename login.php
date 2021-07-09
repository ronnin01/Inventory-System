<?php
  include_once('connection.php');

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $new_pass = md5($password);

    switch($role){
      case 'admin':
        $sql_check = "SELECT username, password, role FROM users WHERE username = '$username' AND password = '$new_pass'";
        $result = mysqli_query($conn, $sql_check);

        if(mysqli_num_rows($result) == 1){
          while($row = mysqli_fetch_assoc($result)){
            setcookie('username', $row['username'], time() + (86400*7));
          }
        }else{
          echo "<script>alert('Wrong Username or Password.')</script>";
        }

        header("location: http://localhost/canteen/admin/admin.php");
        break;
      case 'supplier':
        $sql_check2 = "SELECT sup_id, username, password, role FROM suppliers WHERE username = '$username' AND password = '$new_pass'";
        $result2 = mysqli_query($conn, $sql_check2);

        if(mysqli_num_rows($result2) == 1){
          while($row = mysqli_fetch_assoc($result2)){
            setcookie('id', $row['sup_id'], time() + (86400*7));
            
          }

          header("location: http://localhost/canteen/supplier/index.php");
        }else{
          echo "<script>alert('Wrong Username or Password.')</script>";
        }

        
        break;
      case 'customer':
        echo "<script>alert('Its under construction, THANK YOU!.')</script>";
        break;
      default:
        echo "<script>alert('Wrong Username or Password.')</script>";
        break;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once('bootstrap.php')?>
  <link rel="stylesheet" href="css/register.css">
  <title>Log in</title>
</head>
<body>
  <div class="login-form">
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
          <select name="role" class="form-select" aria-label="Default select example">
            <option selected>-- SELECT OPTION --</option>
            <option value="admin">Admin</option>
            <option value="supplier">Supplier</option>
            <option value="customer">Customer</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>       
    </form>
    <p class="text-center"><a href="register.php">Create an Account</a></p>
  </div>
</body>
</html>