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
	$data_matricula = $_POST['data_matricula'];
	$date_array=explode('/',trim($data_matricula));
	$data_matricula_val=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0]);
	$v = $data_matricula_val/1000;
	
	$vehicule_new= "INSERT INTO veiculos (matricula,data_matricula,marca,modelo,km_iniciais,lugares) VALUES ('{$_POST['matricula']}','$data_matricula_val','{$_POST['marca']}','{$_POST['modelo']}','{$_POST['km_iniciais']}','{$_POST['lugares']}')";
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

$id = $_POST['id'];
$vehicule_del= "DELETE FROM veiculos WHERE id = $id";
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

$query = "SELECT * FROM veiculos ORDER BY marca ASC";
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
$query = "SELECT * FROM veiculos ORDER BY marca ASC";


$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
             		$valor_data = date("d/m/Y", $row['data_matricula']);
             		$arr3[] = array('id'=> $row['id'], 'matricula' => $row['matricula'], 'data_matricula' => $valor_data, 'modelo' => $row['modelo'], 'marca' => $row['marca'], 'km_iniciais' => $row['km_iniciais'], 'lugares' => $row['lugares']);
             	}
             }

echo json_encode($arr3);
break;






}
mysqli_close($conn);
?>



