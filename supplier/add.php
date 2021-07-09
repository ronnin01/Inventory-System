<?php
  include_once('../connection.php');

  if(isset($_POST['submit'])){

    $sup_id = $_COOKIE['id'];
    $pro_name = mysqli_escape_string($conn, trim($_POST['pro_name']));
    $pro_desc = mysqli_escape_string($conn, trim($_POST['pro_desc']));
    $pro_quantity = mysqli_escape_string($conn, trim($_POST['pro_quantity']));
    $pro_price = mysqli_escape_string($conn, trim($_POST['pro_price']));

    $targetdir = "../upload/";
    $filename = basename($_FILES['pro_img']['name']);
    $targetfilepath = $targetdir.$filename;
    
    $sql_check = "SELECT sup_id FROM suppliers WHERE sup_id = '$sup_id'";
    $result = mysqli_query($conn, $sql_check);

    if($pro_quantity <= 0){
      echo "<script>alert('Quantity must be atleast 1')</script>";
    }else if($pro_price <= 0){
      echo "<script>alert('Price must be not zero')</script>";
    }else{
      if(mysqli_num_rows($result) == 1){
      
        if(move_uploaded_file($_FILES['pro_img']['tmp_name'], $targetfilepath)){
          $sql_insert = "INSERT INTO products(sup_id, pro_name,pro_desc, pro_quantity, pro_price, pro_img)".
                        "VALUES('$sup_id', '$pro_name', '$pro_desc', '$pro_quantity', '$pro_price', '$filename')";
  
          mysqli_query($conn, $sql_insert);
  
          echo "<script>alert('Product Added.')</script>";
        }
  
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
  <?php include_once('../bootstrap.php');?>
  <title></title>
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

      <div class="contianer">
        <div class="login-form">
          <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
              <h2 class="text-center">Add Product</h2>       
              <div class="form-group">
                  <input type="text" name="pro_name" class="form-control" placeholder="Product Name" required="required">
              </div>
              <div class="form-group">
                  <textarea name="pro_desc" placeholder="Product Description" required="required" cols="65" rows="10" style="resize: none;"></textarea>
              </div>
              <div class="form-group">
                  <input type="number" name="pro_quantity" class="form-control" placeholder="Product Quantity" required="required">
              </div>
              <div class="form-group">
                  <input type="number" name="pro_price" class="form-control" placeholder="Product Price" required="required">
              </div>
              <div class="form-group">
                  <input type="file" name="pro_img" placeholder="file" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
              </div>   
              <div class="form-group">
                <a class="btn btn-primary btn-block" href="https://localhost/canteen/supplier/products.php">Back</a>
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