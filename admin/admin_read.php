<?php
  include_once('../connection.php');

  $sql_select = "SELECT * FROM users WHERE role = 'admin'";
  $data = mysqli_query($conn, $sql_select);

  while($row = mysqli_fetch_assoc($data)){?>

    <tr>
      <th><?= $row['user_id']?></th>
      <th><?= $row['username']?></th>
      <th><?= $row['date_added']?></th>
      <td><a class="btn btn-success" style="margin-left: -150px;" href="http://localhost/canteen/admin/admin_update.php?id=<?php echo $row['user_id']?>">Update</a></td>
        <td><a class="btn btn-danger" style="margin-left: -100px;"  href="http://localhost/canteen/admin/admin_delete.php?id=<?php echo $row['user_id']?>">Delete</a></td>
    </tr>

  <?php }
?>