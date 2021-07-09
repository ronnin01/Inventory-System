<?php
include_once('../connection.php');
  $p = 0;
  $id = $_COOKIE['id'];

  $products = "SELECT * FROM products WHERE sup_id = '$id'";
  $pro = mysqli_query($conn, $products);
  while(mysqli_fetch_assoc($pro)){
    $p++;
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/admin.css">
  <?php include_once('../bootstrap.php')?>
  <title>Admin Panel</title>
</head>
<body>
  <div class="main" style="width: 100%;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkgray;">
      <div class="container-fluid">
        <a class="navbar-brand" style="color: black;" href="http://localhost/canteen/supplier/index.php">Supplier Page</a>
        <a class="navbar-brand" name=: style="color: black;" href="http://localhost/canteen/logout.php">Logout</a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="container-fluid" style="display: flex;">
        <h2>TOTAL COUNT:</h2> 
      </div>

      <div class="container">
        <div class="row row-ambot">
          <div class="col-sm-3 card">
            <i class="fa fa-archive" style="font-size: 50px;"></i>
            <h1 style="color: white;"><?= $p?></h1>
            <h4 style="color: white;">PRODUCTS COUNT</h4>
          </div>
        </div>
      </div>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['students', 'contribution'],
            <?php
            $sql = "SELECT * FROM products WHERE sup_id = '$id'";
            $fire = mysqli_query($conn,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                $sum = $result['pro_price'] * $result['pro_quantity'];
                echo"['".$result['pro_name']."',".$sum."],";
              }

            ?>
            ]);

            var options = {
              title: 'Total Product Price'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
      <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
      </div>
    </div>
  </div>
</body>
</html>