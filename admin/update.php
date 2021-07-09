<?php
  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');
  if(!isset($_COOKIE['username'])){
    header("location:http://localhost/canteen/login.php ");
  }

  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql_data = "SELECT * FROM products WHERE pro_id = '$id'";
    $results = mysqli_query($conn, $sql_data);

    while($row = mysqli_fetch_assoc($results)){
      $sup_id1 = $row['sup_id'];
      $pro_name1 = $row['pro_name'];
      $pro_desc1 = $row['pro_desc'];
      $pro_quantity1 = $row['pro_quantity'];
      $pro_price1 = $row['pro_price'];
    }


    //form submit ni diri.

    if(isset($_POST['submit'])){

      $sup_id = mysqli_escape_string($conn, trim($_POST['sup_id']));
      $pro_name = mysqli_escape_string($conn, trim($_POST['pro_name']));
      $pro_desc = mysqli_escape_string($conn, trim($_POST['pro_desc']));
      $pro_quantity = mysqli_escape_string($conn, trim($_POST['pro_quantity']));
      $pro_price = mysqli_escape_string($conn, trim($_POST['pro_price']));

      $sql_check = "SELECT sup_id FROM suppliers WHERE sup_id = '$sup_id'";
      $result = mysqli_query($conn, $sql_check);

      if(mysqli_num_rows($result) == 1){
        $id_cookie = $_GET['id'];

        $sql_update = "UPDATE products ".
                      "SET sup_id = '$sup_id', pro_name = '$pro_name', pro_desc = '$pro_desc', pro_quantity = '$pro_quantity', pro_price = '$pro_price' WHERE pro_id = '$id_cookie'";

        mysqli_query($conn, $sql_update);

        header("location: http://localhost/canteen/admin/products.php");
      }else{
        echo "<script>alert('There is no such Supplier ID')</script>";
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
        <h2>PRODUCTS:</h2> 
      </div>

      <div class="container">
        <div class="login-form">
          <form action="<?= $_SERVER['PHP_SELF']."?id=".$_GET['id']?>" method="POST">
              <h2 class="text-center">Update Product</h2>       
              <div class="form-group">
                  <input type="number" value="<?= $sup_id1?>" name="sup_id" class="form-control" placeholder="Supplier ID" required="required">
              </div>
              <div class="form-group">
                  <input type="text" value="<?= $pro_name1?>" name="pro_name" class="form-control" placeholder="Product Name" required="required">
              </div>
              <div class="form-group">
                  <textarea name="pro_desc" value="<?= $pro_desc1?>" placeholder="Product Description" cols="65" rows="10" style="resize: none;"></textarea>
              </div>
              <div class="form-group">
                  <input type="number" value="<?= $pro_quantity1?>" name="pro_quantity" class="form-control" placeholder="Product Quantity" required="required">
              </div>
              <div class="form-group">
                  <input type="number" value="<?= $pro_price1?>" name="pro_price" class="form-control" placeholder="Product Price" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
              </div>   
              <div class="form-group">
                <a class="btn btn-primary btn-block" href="https://localhost/canteen/admin/products.php">Back</a>
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