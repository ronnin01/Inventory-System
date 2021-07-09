<?php

  $id = $_COOKIE['id'];


  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');
  $sql_check = "SELECT * FROM products WHERE sup_id = '$id'";

  $results = mysqli_query($conn, $sql_check);

  while($row = mysqli_fetch_assoc($results)){?>
    <?php $imgurl = "../upload/".$row['pro_img']; ?>
    <tr>
      <td><?= $row['pro_id']?></td>
      <td><?= $row['sup_id']?></td>
      <td><?= $row['pro_name']?></td>
      <td><?= $row['pro_quantity']?></td>
      <td>PHP <?= $row['pro_price']?>.00</td>
      <td><img style="width: 35px;height: 35px;" src="<?= $imgurl?>" alt=""></td>
      <td><?= $row['date_added']?></td>
      <td><a class="btn btn-success" style="margin-left: -70px;" href="http://localhost/canteen/supplier/update.php?id=<?php echo $row['pro_id']?>">Update</a></td>
      <td><a class="btn btn-danger" style="margin-left: -15px;"  href="http://localhost/canteen/supplier/delete.php?id=<?php echo $row['pro_id']?>">Delete</a></td>
    </tr>
  <?php }

?>