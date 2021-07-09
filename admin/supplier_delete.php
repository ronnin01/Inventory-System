<?php

  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

  if(isset($_GET['id'])){
    $userid = $_GET['id'];

    $sql_delete = "DELETE FROM suppliers WHERE sup_id = '$userid'";
    mysqli_query($conn, $sql_delete);

    header("location: http://localhost/canteen/admin/supplier.php");
  }else{
    header("location: http://localhost/canteen/admin/supplier.php");
  }

?>