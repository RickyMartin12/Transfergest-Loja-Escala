<?php
require_once '../connect.php';

switch ($_POST['action']){

/*GRAVAR NOVO LOCAL OPERADOR*/

case '1':

$error='';

$nome = $_POST['nome_local'];

$zona = $_POST['zones_locations'];

$morada_gps = $_POST['local_gps'];

$morada = $_POST['morada'];

$referencias = $_POST['referencias'];

if ($nome =='')
$error .='- Nome<br>';
if ($zona =='')
$error .='- Zona<br>';
if ($morada =='')
$error .= '- Morada<br>';

if ($error ==''){
  $sql=" INSERT INTO locais_frequentes (nome, zona, morada_gps, morada, referencias)
  VALUES ('$nome','$zona','$morada_gps','$morada','$referencias')";
	$result = mysqli_query($conn,$sql);
	if ($result){
		echo 1; 
	}
	else {
		echo 0;
	}
  }
  else 
  echo $error;

break;

/*APAGAR LOCAL OPERADOR*/
case '2':
$sql= "DELETE FROM locais_frequentes WHERE id ='{$_POST['id']}'";
$result = mysqli_query($conn,$sql);
if ($result){
	echo 2; 
}
else {
	echo 0;
}
break;

/*OBTER TODOS OS LOCAIS OPERADORES*/

case '3':
$sql = " SELECT * FROM locais_frequentes WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*EDITAR OS LOCAIS OPERADORES*/
case '4':

      $id= $_POST['id'];

    	$fields=array('nome', 'zona', 'morada_gps', 'morada', 'referencias');

	$query='UPDATE locais_frequentes SET ';
	for($i=1;$i<6;$i++){
	   $index = 'col_'.$i.'_'.$_POST['id'];
           $query.= $fields[$i-1].'='."'{$_POST[$index]}'";
	   if($i!=5)
	   $query.=',';
	}

	$query.=" WHERE id= $id ";
	mysqli_query($conn,$query);

	$result = mysqli_query($conn,$query);
	if ($result)
	  echo 1;
	else 
          echo 0;

break; 

/* OS CAMPOS DE OPERATOR PARA NOVO LOCAL*/
case '5':
$obter_operator=" SELECT id,nome FROM operador WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_operator);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
$operator = json_encode($var);
echo  $operator;
break;


/*OBTER TODOS OS LOCAIS OPERADORES*/
case '6':
$obtain_locations=" SELECT * FROM recolha_operadores WHERE operador_nome='{$_POST['id']}' ORDER BY local_recolha";
$result = mysqli_query($conn, $obtain_locations);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;




}
mysqli_close($conn);
?>



