<?php
  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');
  if(!isset($_COOKIE['id'])){
    header("location:http://localhost/canteen/login.php ");
  }

  if(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];

    $sql_data = "SELECT * FROM suppliers WHERE sup_id = '$id'";
    $result = mysqli_query($conn, $sql_data);

    while($row = mysqli_fetch_assoc($result)){
      $s_id = $row['sup_id'];
      $s_u = $row['username'];
      $s_p = $row['password'];
      $s_name = $row['sup_name'];
      $s_c_name = $row['sup_company_name'];
    }

    if(isset($_POST['submit'])){
      $sup_user = mysqli_escape_string($conn, trim($_POST['sup_user']));
      $sup_pass = mysqli_escape_string($conn, trim($_POST['sup_pass']));
      $sup_name = mysqli_escape_string($conn, trim($_POST['sup_name']));
      $sup_com_name = mysqli_escape_string($conn, trim($_POST['sup_company_name']));

      $new_pass = md5($sup_pass);
      $sql_update = "UPDATE suppliers SET sup_name = '$sup_name', username = '$sup_user', password='$new_pass',sup_company_name = '$sup_com_name' WHERE sup_id = '$id'";

      $data = mysqli_query($conn, $sql_update);

      if($data){
        header("location: https://localhost/canteen/supplier/index.php");
      }else{
        echo "<script>alert('Unable to update Supplier.')</script>";
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
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkgray;">
      <div class="container-fluid">
        <a class="navbar-brand" style="color: black;" href="http://localhost/canteen/supplier/index.php">Supplier Page</a>
        <a class="navbar-brand" name=: style="color: black;" href="http://localhost/canteen/logout.php">Logout</a>
      </div>
    </nav>
    
    <div class="container-fluid">
      <div class="container-fluid" style="display: flex;">
        <h2>SUPPLIERS:</h2> 
      </div>

      <div class="container">
        <div class="login-form">
          <form action="<?= $_SERVER['PHP_SELF']."?id=".$_COOKIE['id']?>" method="POST" enctype="multipart/form-data">
              <h2 class="text-center">Update Supplier</h2>       
              <div class="form-group">
                  <input value="<?php echo $s_id;?>" readonly type="number" name="sup_id" class="form-control" placeholder="Supplier ID" required="required">
              </div>
              <div class="form-group">
                  <input   value="<?php echo $s_u;?>" type="text" name="sup_user" class="form-control" placeholder="Username" required="required">
              </div>
              <div class="form-group">
                  <input type="password" name="sup_pass" class="form-control" placeholder="Password" required="required">
              </div>
              <div class="form-group">
                  <input   value="<?php echo $s_name;?>" type="text" name="sup_name" class="form-control" placeholder="Supplier Name" required="required">
              </div>
              <div class="form-group">
                  <input value="<?php echo $s_c_name;?>" type="text"  name="sup_company_name" class="form-control" placeholder="Supplier Company Name" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
              </div>   
              <div class="form-group">
                <a class="btn btn-primary btn-block" href="https://localhost/canteen/supplier/index.php">Back</a>
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