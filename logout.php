<?php
  if(isset($_COOKIE['username'])){
    
    $u = $_COOKIE['username'];

    setcookie($u,"", time() - 3600);
    
    header('location: http://localhost/canteen/login.php');

  }else{
    echo "<script>alert('Cannot Logout admin.')</script>";
  }

?>