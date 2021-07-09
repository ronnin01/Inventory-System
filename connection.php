<?php

  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

  if(!$conn){
    die("Unable to connect database");
  }
?>