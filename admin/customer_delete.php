<?php
  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

  if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql_delete = "DELETE FROM customers WHERE cus_id = '$id'";

    $data = mysqli_query($conn, $sql_delete);

    if($data){
      header("location: https://localhost/canteen/admin/customer.php");
    }
  }

?>