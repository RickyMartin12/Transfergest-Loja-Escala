<?php
$user = trim($_POST['user']);
$lat =  round(trim($_POST['lat']), 6);
$long = round(trim($_POST['long']), 6);

$gps=$lat."º,".$long."º";

$gps_out='';

$sql_gpsdb="SELECT gps FROM pr_admin WHERE equipa = '$user' ";

$result = mysqli_query($conn, $sql_gpsdb);
if (mysqli_num_rows($result) > 0) {	
    while($row = mysqli_fetch_assoc($result)) {
        $gps_out = $row['gps'];}
}

$gps_out .= $gps;

$sql_gps="UPDATE pr_admin SET gps='$gps_out' WHERE equipa = '$user' ";
$result = mysqli_query($conn, $sql_gps);
if (mysqli_num_rows($result) > 0) {	
    while($row = mysqli_fetch_assoc($result)) {
        $gps_out_rec = $row['gps'];}
echo $gps_out_rec;
}
else echo "err";

?>
