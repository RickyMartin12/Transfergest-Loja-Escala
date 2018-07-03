<?php
require_once '../connect.php';
global $conn;

$l1 = $_GET['l1'];
$l2 = $_GET['l2'];
$tp = $_GET['tp'];
$r = $_GET['r'];

if($_GET['tp'] == '1') {
	$sql = "SELECT pax_1 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
        $response = $row["pax_1"];
    	}
	}
	else {
		$response ="Sorry, error occur". mysqli_error($conn);
    	}
}
 else if($_GET['tp'] == '2') {
	$sql = "SELECT pax_2 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    		$response = $row["pax_2"];
    	}
	}
	else {
		$response ="Sorry, error occur". mysqli_error($conn);
    	}
   }

 else if($_GET['tp'] == '3') {
	$sql = "SELECT pax_3 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    		$response = $row["pax_3"];
    	}
	}
	else {
		$response ="Sorry, error occur". mysqli_error($conn);
    	}
    }

else if($_GET['tp'] == '4') {
	$sql = "SELECT pax_4 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    		$response = $row["pax_4"];
    	}
	
	}
	else {
		$response ="Sorry, error occur". mysqli_error($conn);
    	}
 }

if ($_GET['r'] == 1){
$sql = "SELECT desconto from companhia";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	 while($row = mysqli_fetch_assoc($result)) {
    		$discount = $row["desconto"];
    	 }
        }
if($discount != 0){
$response = 2*($response*(1-($discount/100))); 
}
else $response=2*$response;
}

if ($_GET['r'] == 0){
$sql = "SELECT desconto from companhia";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	 while($row = mysqli_fetch_assoc($result)) {
    		$discount = $row["desconto"];
    	 }
        }
if($discount != 0){
$response = $response*(1-($discount/100));
}
else $response; 
}
 if ($tp == 1)
$tp='1-4'; 
 elseif (tp == 2)
$tp='5-8'; 
 elseif ($tp == 3)
$tp='9-12'; 
 elseif ($tp == 4)
$tp='13-16'; 


 if ($r == 0)
$r='No'; 
 elseif ($r == 1)
$r='Yes'; 


$arr = array ('Company'=>'Transfers-Team', 'From' => $l1,'To' => $l2, 'Passengers' => $tp, 'Return'=>$r, 'Total' => $response);
echo json_encode($arr);

mysqli_close($conn);
?>

