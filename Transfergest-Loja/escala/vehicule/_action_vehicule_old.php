<?php
require_once '../connect.php';

switch ($_POST['action']){

/*GRAVAR NOVA VIATURA*/
case '1':
/*VERIFICA SE EXISTE A MATRICULA IGUAL*/
$matricula = ucfirst($_POST['matricula']);
$success;

$query = "SELECT * FROM veiculos WHERE matricula = '{$_POST['matricula']}' LIMIT 1";
$result = mysqli_query($conn, $query);
$found_product = mysqli_fetch_array($result);
if( $matricula == $found_product['matricula'])
{ 
	$error_message = 'err'; 
    echo $error_message;
}

if ( !isset($error_message) )
{
	$vehicule_new= "INSERT INTO veiculos (matricula,marca) VALUES ('{$_POST['matricula']}','{$_POST['marca']}')";
	$result = mysqli_query($conn,$vehicule_new);
	if ($result){
         $vehicule_diario= "INSERT INTO diario (matricula) VALUES ('{$_POST['matricula']}')";
	 $result_in = mysqli_query($conn,$vehicule_diario);
          if ($result_in){
             $success=11;
           }
	  else {
		$success = 10;
	  }

		$success=11; 
	}
	else {
		$success = 10;
	}
	echo $success;


}
	unset($error_message);
break;


/*APAGAR VIATURA*/
case '2':
$vehicule_del= "DELETE FROM veiculos WHERE id ='{$_POST['id']}'";
$result = mysqli_query($conn,$vehicule_del);
if ($result){
	$success = 2; 
}
else {
	$success = 0;
}
	echo $success;
break;

/*OBTER TODAS VIATURAS*/
case '3':
$query = "SELECT * FROM veiculos";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while($obj = mysqli_fetch_object($result)) {
$array[] = $obj;
}
}
echo json_encode($array);
break;


/*OBTER TODAS VIATURAS E KM*/
case '4':
$query = "SELECT * FROM veiculos";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while($obj = mysqli_fetch_object($result)) {
$array[] = $obj;
}
}

foreach ($array as $key => $jsons) {
foreach($jsons as $key => $value) {
$get_kmf ="SELECT MAX( diario.km_fim ) AS km, veiculos. * 
FROM diario
INNER JOIN veiculos ON diario.matricula = veiculos.matricula 
WHERE diario.matricula ='$value'";
     $result = mysqli_query($conn, $get_kmf);
   if (mysqli_num_rows($result) > 0) {
    while($obj = mysqli_fetch_object($result))
     {$var[] = $obj;}
    }
  }
}

echo json_encode($var);
break;






}
mysqli_close($conn);
?>



