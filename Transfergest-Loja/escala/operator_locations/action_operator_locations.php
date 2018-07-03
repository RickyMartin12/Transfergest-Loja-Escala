<?php
require_once '../connect.php';

switch ($_POST['action']){

/*GRAVAR NOVO LOCAL OPERADOR*/
case '1':
$operator = explode('/',trim($_POST['operator_nid']));
$id_operador = $operator[0];
$operador_nome = $operator[1];

$location_new= "INSERT INTO recolha_operadores (local_recolha,operador_nome,id_operador,pt_ref_recolha) VALUES ('{$_POST['loc_recolha']}','$operador_nome',$id_operador,'{$_POST['pt_ref_recolha']}')";
	$result = mysqli_query($conn,$location_new);
	if ($result){
		echo 11; 
	}
	else {
		echo 10;
	}
break;


/*APAGAR LOCAL OPERADOR*/
case '2':
$location_del= "DELETE FROM recolha_operadores WHERE id ='{$_POST['id']}'";
$result = mysqli_query($conn,$location_del);
if ($result){
	echo 2; 
}
else {
	echo 0;
}
break;

/*OBTER TODOS OS LOCAIS OPERADORES*/
case '3':
$obtain_locations=" SELECT * FROM recolha_operadores WHERE id_operador='{$_POST['id']}' ORDER BY local_recolha";
$result = mysqli_query($conn, $obtain_locations);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*EDITAR OS LOCAIS OPERADORES*/
case '4':
    	$fields=array('local_recolha','pt_ref_recolha','operador_nome',);
	$query='UPDATE recolha_operadores SET ';
	for($i=1;$i<4;$i++){
	 $index = 'col_'.$i.'_'.$_POST['id'];
			$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
		if($i!=3)
			$query.=',';
	}

	$query.=" WHERE id='{$_POST['id']}'";
	mysqli_query($conn,$query);
	$result = mysqli_query($conn,$query);

/*SE SUCESSO NA ALTERAÇÃO ENVIA DADOS DO REGISTO E SUBSTITUI NA RESPECTIVA ID ROW */
	if ($result){
	$get_reg=" SELECT * FROM recolha_operadores WHERE id ='{$_POST['id']}'";
	$result_ = mysqli_query($conn, $get_reg);
	if ($result_){
	while($obj = mysqli_fetch_object($result_)) {
	$var[] = $obj;}
	echo json_encode($var);
	}
}

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



