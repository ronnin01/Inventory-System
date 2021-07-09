<?php
  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

  if(isset($_GET['id'])){
    $userid = $_GET['id'];

    $sql_delete = "DELETE FROM products WHERE pro_id = '$userid'";
    $data = mysqli_query($conn, $sql_delete);

    if($data){
      header("location: http://localhost/canteen/admin/products.php");
    }
  }else{
    header("location: http://localhost/canteen/admin/products.php");
  }

?>