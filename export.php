<?php
$con = mysqli_connect("localhost","root","","city");
if(!$con){
  die("Connection Failed: ".mysqli_connect_erro());
}

$query = $con->query("SELECT * FROM tblcity");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "exported-data_".date('Y-m-d').".csv";

    $f = fopen('php://memory','w');

    $fields = array('id','city_name');
    fputcsv($f,$fields,$delimiter);

    while($row = $query->fetch_assoc()){
        $lineData = array($row['id'],$row['city_name']);
        fputcsv($f,$lineData,$delimiter);
    }

    fseek($f,0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'. $filename .'";');

    fpassthru($f);
}
exit;
?>