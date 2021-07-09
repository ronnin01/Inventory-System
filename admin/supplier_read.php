<?php

  $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

  $sql_check = "SELECT * FROM suppliers";
  $data = mysqli_query($conn, $sql_check);

  while($row = mysqli_fetch_assoc($data)){?>

    <tr>
      <td><?= $row['sup_id']?></td>
      <td><?= $row['username']?></td>
      <td><?= $row['sup_name']?></td>
      <td><?= $row['sup_company_name']?></td>
      <td><?= $row['date_added']?></td>
      <td><a class="btn btn-success" style="margin-left: -150px;" href="http://localhost/canteen/admin/supplier_update.php?id=<?php echo $row['sup_id']?>">Update</a></td>
        <td><a class="btn btn-danger" style="margin-left: -100px;"  href="http://localhost/canteen/admin/supplier_delete.php?id=<?php echo $row['sup_id']?>">Delete</a></td>
    </tr>

  <?php }

?>