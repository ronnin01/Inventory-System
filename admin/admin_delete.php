

<?php
  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql_delete = "DELETE FROM users WHERE user_id = '$id'";
    $data = mysqli_query($conn, $sql_delete);

    if($data){
      header("location: http://localhost/canteen/admin/manage_admin.php");
    }
  }else{
    header("location: http://localhost/canteen/admin/manage_admin.php");
  }
?>