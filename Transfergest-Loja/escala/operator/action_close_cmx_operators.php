<?php
require_once '../connect.php';

$value = $_POST['action'];
$value  == '1' ? $t = 'Sim' : $t ='Não';
$array = json_decode(stripslashes($_POST['data']));
for ($i = 0; $i < count($array); $i++) {
    $key=key($array);
    $val=$array[$key];
    if ($val<> ' ') {
        $received = "UPDATE excel SET pag_ope = '$t' WHERE id = $val ";
        $result = mysqli_query($conn,$received);
        if ($result)
	$success .=  1; 
       else 
	$success .= 0;
     }
     next($array);
    }
$e = array('success' => $success, 'value' => $t);
echo json_encode($e);
mysqli_close($conn);
?>