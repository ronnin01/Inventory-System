<?php
  function read_data(){
    $conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

    $sql_select = "SELECT * FROM customers";
    $data = mysqli_query($conn, $sql_select);

    while($row = mysqli_fetch_assoc($data)){?>

      <tr>
        <th><?= $row['cus_id']?></th>
        <th><?= $row['firstname']?></th>
        <th><?= $row['lastname']?></th>
        <th><?= $row['username']?></th>
        <th><?= $row['date_added']?></th>
        <td><a class="btn btn-success" style="margin-left: -100px;" href="http://localhost/canteen/admin/customer_update.php?id=<?php echo $row['cus_id']?>">Update</a></td>
        <td><a class="btn btn-danger" style="margin-left: -50px;"  href="http://localhost/canteen/admin/customer_delete.php?id=<?php echo $row['cus_id']?>">Delete</a></td>
      </tr>

    <?php }
  }
?>