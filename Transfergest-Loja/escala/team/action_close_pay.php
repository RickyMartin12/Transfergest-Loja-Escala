<?php
require_once '../connect.php';

$array = json_decode(stripslashes($_POST['data']));

for ($i = 0; $i <  count($array); $i++) {
    $key=key($array);
    $val=$array[$key];
    if ($val<> ' ') {
        $received = "UPDATE excel SET rec_staf = 'Sim' WHERE id = $val ";
        $result = mysqli_query($conn,$received);
        if ($result)
	$success = 1; 
       else 
	$success = 0;
	echo $success;
     }
     next($array);
    }
mysqli_close($conn);
?>