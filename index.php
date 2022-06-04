<?php
$con = mysqli_connect("localhost","root","","city");
if(!$con){
  die("Connection Failed: ".mysqli_connect_erro());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Export Database Record into CSV in PHP and MYSQL</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
      <div class="card-header bg">
        <h1>Export Database Record into CSV in PHP and MYSQL</h1>
      </div>
          <div class="card-body">
        <a href="export.php" class="btn btn-success">Export to CSV</a>

        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#ID</th>
              <th>City</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = $con->query("SELECT * FROM tblcity");
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){?>
                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['city_name'];?></td>
              </tr>
              <?php 
              }
            }
            else{ ?>
            <tr>
              <td colspan="7">No data Found...</td>
            </tr>
            </tbody>
            <?php 
            }
            ?>
          </tbody>
        </table>
          </div>
      </div>
    </div>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>