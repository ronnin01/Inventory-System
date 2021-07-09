<?php
  include_once("../connection.php");
  if(!isset($_COOKIE['username'])){
    header("location:http://localhost/canteen/login.php ");
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once('../bootstrap.php')?>
  <title>Admin Panel</title>
</head>
<body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT * FROM products";
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

  <div class="main" style="width: 100%;">
      <?php include_once('../header.php')?>

      <div class="container-fluid">
        <div class="container-fluid" style="display: flex;">
          <h2>REPORTS:</h2> 
        </div>

        <div class="container-fluid">
          <div style="display: flex; justify-content: center; align-items: center;">
            <div id="piechart" style="width: 900px; height: 500px;"></div>
          </div>
        </div>
      </div>
  </div>
</body>
</html>
