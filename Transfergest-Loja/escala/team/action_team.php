<?php
require_once '../connect.php';

switch ($_POST['action']){

/*GRAVAR NOVO ELEMENTO EQUIPA*/
case '1':
/*VERIFICA SE EXISTE EQUIPA COM MESMO NOME*/
$nome = ucfirst($_POST['equipa_nome']);
$success;

$query = "SELECT * FROM pr_admin WHERE equipa = '{$_POST['equipa_nome']}' LIMIT 1";
$result = mysqli_query($conn, $query);
$found_product = mysqli_fetch_array($result);
if( $nome ==$found_product['equipa'])
{ 
    $error_message = '99'; 
    echo $error_message;
}
if ( !isset($error_message) )
{
	$pass=md5($_POST['equipa_password']);
	$team_new= "INSERT INTO pr_admin (email,equipa,password,comissao,vencimento,tipo,grupo) VALUES ('{$_POST['equipa_email']}','{$nome}','{$pass}','{$_POST['comissao']}','{$_POST['vencimento']}','{$_POST['sttpcomissao']}','{$_POST['group']}')";
	$result = mysqli_query($conn,$team_new);
	if ($result){
		$success=11; 
	}
	else {
		$success = 10;
	}
	echo $success;
}
	unset($error_message);
break;

/*APAGAR ELEMENTO EQUIPA*/
case '2':
$team_del= "DELETE FROM `pr_admin` WHERE id ='{$_POST['id']}' AND id !=3";
$result = mysqli_query($conn,$team_del);
if ($result){
	$success = 2; 
}
else {
	$success = 0;
}
	echo $success;
break;

/*OBTER ELEMENTOS DA EQUIPA*/
case '3':
$obter_equipa=" SELECT * FROM pr_admin WHERE 1 ORDER BY equipa";
$result = mysqli_query($conn, $obter_equipa);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*EDITAR ELEMENTOS DA EQUIPA*/
case '4':
$fields=array('equipa');
$updnome;
$query=" SELECT equipa FROM pr_admin WHERE equipa ='{$_POST['nome']}' LIMIT 2";
	$result = mysqli_query($conn,$query);
	$rowCount = mysqli_num_rows($result);
	if($rowCount>1) { 
	$error_message = 9;
        }

    echo $rowCount;
	if ( !isset($error_message) ) {
    	$fields=array('equipa','email','tipo','grupo','comissao','vencimento','regua');
    	$query='UPDATE pr_admin SET ';
		for($i=1;$i<8;$i++){
			$index= 'col_'.$i.'_'.$_POST['id'];
			if($i==1)
				$updnome=trim($_POST[$index]);
    		$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
			if($i!=7)
				$query.=',';
		}
		$query.=" where id='{$_POST['id']}'";
		$result = mysqli_query($conn,$query);
		if ($result)
			echo 11;
		else 
			echo 10;
	}
unset($updnome);
break;

/* DESBLOQUEAR SESSAO DO STAFF*/
case '5':
$session= "UPDATE pr_admin SET sessao=0 WHERE id= '{$_POST['id']}'";
$result = mysqli_query($conn,$session);
if ($result){
	$success = 1; 
}
else {
	$success = 0;
}
	echo $success;
break;



/*VERIFICA SE EXISTE ADMIN COM MESMO NOME*/
case '6':
$nome = ucfirst($_POST['admin_nome']);
$success;

$privilegios=explode('*/*',trim($_POST['admin_priv']));
$priv = $privilegios[1];
$tp = $privilegios[0];

$query = "SELECT nome FROM admins WHERE nome = '{$_POST['admin_nome']}' LIMIT 1";
$result = mysqli_query($conn, $query);
$found_product = mysqli_fetch_array($result);
if( $nome == $found_product['nome'])
{ 
    $error_message = 'err'; 
    echo $error_message;
}
if ( !isset($error_message) )
{
	$pass=md5($_POST['admin_password']);

	$admin_new= "INSERT INTO admins (nome,pass,email,privilegios,tipo) 
VALUES('{$nome}','{$pass}','{$_POST['admin_email']}','{$tp}','{$priv}')";
	$result = mysqli_query($conn,$admin_new);
	if ($result){
		$success=11; 
	}
	else {
		$success = 10;
	}
	echo $success;
}
	unset($error_message);


break;

/*OBTER ELEMENTOS ADMINISTRADORES*/
case '7':
$obter_admin=" SELECT id,nome,email,tipo,privilegios,no_del FROM admins WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_admin);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*APAGAR ADMINISTRADOR*/
case '8':
$admin_del= "DELETE FROM admins WHERE id ='{$_POST['id']}' AND no_del != '1' ";
$result = mysqli_query($conn,$admin_del);
if ($result){
	$success = 2; 
}
else {
	$success = 0;
}
	echo $success;
break;



/*EDITAR ELEMENTOS ADMINISTRADORES*/
case '9':

$id= $_POST['id'];
$nome = $_POST['col_1_'.$id];
$email = $_POST['col_3_'.$id];
$priv_arr = $_POST['col_4_'.$id];
$privilegios=explode('*/*',trim($priv_arr));
$priv = $privilegios[0];
$tp = $privilegios[1];
$pass=md5($_POST['col_2_'.$id]);

$success='';

$query=" SELECT nome FROM admins WHERE nome = '$nome' LIMIT 2";
	$result = mysqli_query($conn,$query);
	$rowCount = mysqli_num_rows($result);
	if($rowCount>1) { 
	$error_message = 9;
        $success .= 2;
}


	if ( !isset($error_message) ) {
 $query_upd=" UPDATE admins SET nome='$nome', pass ='$pass', privilegios='$priv', email= '$email', tipo='$tp' WHERE id = $id ";
	$result_upd = mysqli_query($conn,$query_upd);
		if ($result_upd)
			 $success .=1;
		else
			 $success .= 2;
	}

echo $success;
unset($error_message);
break;



/*OBTER VALORES DESPESAS E PROVEITOS DOS STAFF*/
case '11':
$exp='';
$nome= $_POST['nome'];
$date_array = explode('/',trim($_POST['data']));
$in_date = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$obter_admin=" SELECT hrs,id,cobrar_operador,cobrar_direto,staff,local_recolha,local_entrega FROM excel WHERE data_servico = $in_date AND staff LIKE '%".$nome."%' AND rec_staf !='Sim' ORDER BY hrs ";
$result = mysqli_query($conn, $obter_admin);
if ($result){
$exp = 1;
while($obj = mysqli_fetch_object($result)) {
$arr1[prov][]= $obj;}
}
else $exp = 2;

if ($exp){
$desp= " SELECT id AS nid, combustivel,matricula,lavagem,portagem,diversos,parque, total, tipo_despesa
FROM diario WHERE data = $in_date AND validado !='Sim'
AND staff LIKE '%".$nome."%' ORDER BY data";
$res = mysqli_query($conn, $desp); 
 if ($res){
  while($obj = mysqli_fetch_object($res)) {
  $arr2[dev][] = $obj;}
}
}


if(empty($arr2) && empty($arr1) ){
$arr2[dev][]='';
$arr2[prov][]='';  
echo json_encode(array_merge($arr1,$arr2));
}

elseif (empty($arr2)) {
echo json_encode($arr1);
}

elseif (empty($arr1)){
echo json_encode($arr2);
}

elseif($arr1 && $arr2){
echo json_encode(array_merge($arr1,$arr2));
}
break;

case '12':
$tipo_array = explode('-',trim($_POST['tipo']));

$tipo_array[1];
$tipo_array[0];
$_POST['estado'];

if ($tipo_array[1]== '2'){
echo $tipo_array[1];
$priv_a= " UPDATE privilegios SET  $tipo_array[0] ='{$_POST['estado']}'
WHERE tipo = 'Administrator' ";
$result = mysqli_query($conn,$priv_a);
 if ($result)echo 1;   
 else echo 0; 
}


if ($tipo_array[1]== 1){
$priv_a= " UPDATE privilegios SET  $tipo_array[0] ='{$_POST['estado']}'
WHERE tipo = 'GestorPlus' ";
$result = mysqli_query($conn,$priv_a);
 if ($result)echo 1;   
 else echo 0; 
}

if ($tipo_array[1]== 0){
$priv_a= " UPDATE privilegios SET  $tipo_array[0] ='{$_POST['estado']}'
WHERE tipo = 'Gestor' ";
$result = mysqli_query($conn,$priv_a);
 if ($result)echo 1;   
 else echo 0; 
}
break;

case '13':

$table=" SELECT * FROM privilegios WHERE id >= 2 AND id <= 4 ";

$result = mysqli_query($conn, $table);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


case '14':
$obter_equipa=" SELECT equipa AS label FROM pr_admin WHERE 1 ORDER BY equipa";
$result = mysqli_query($conn, $obter_equipa);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

case '15':
$matricula=" SELECT matricula FROM veiculos WHERE 1 ORDER BY matricula";
$result = mysqli_query($conn, $matricula);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $pr = substr($row["matricula"], 0, -4);
    $st = substr($row["matricula"], 2, -2);
    $tr = substr($row["matricula"],4);
    $matricula = $pr.'-'.$st.'-'.$tr;
    $var[] =array('label' =>$matricula);}

}
echo json_encode($var);
break;


/*OBTER VALORES DESPESAS E PROVEITOS DOS STAFF ENTRE DATAS*/
case '16':

$exp='';

$nome= $_POST['nome'];

$date_arr_ini = explode('/',trim($_POST['data_ini']));
$ini_date = strtotime($date_arr_ini[2].'-'.$date_arr_ini[1].'-'.$date_arr_ini[0].'-00');

$date_arr_fim = explode(' ',trim($_POST['data_fim']));
$dates = explode('/',$date_arr_fim[0]);
$fim_date = strtotime($dates[2].'-'.$dates[1].'-'.$dates[0].' '.$date_arr_fim[1]);

$obter_admin=" SELECT hrs,id,cobrar_operador,cobrar_direto,staff,local_recolha,local_entrega 

FROM excel WHERE data_servico >= $ini_date AND hrs <= $fim_date

AND staff LIKE '%".$nome."%' AND rec_staf !='Sim' ORDER BY hrs ";

$result = mysqli_query($conn, $obter_admin);
if ($result){
$exp = 1;
while($obj = mysqli_fetch_object($result)) {
$arr1[prov][]= $obj;}
}
else $exp = 2;

if ($exp){
$desp= " SELECT id AS nid, combustivel,matricula,lavagem,portagem,diversos,parque,total, tipo_despesa
FROM diario WHERE validado != 'Sim' AND
data >= $ini_date AND data <= $fim_date
AND staff LIKE '%".$nome."%' ORDER BY data";
$res = mysqli_query($conn, $desp); 
 if ($res){

  while($obj = mysqli_fetch_object($res)) {
  $arr2[dev][] = $obj;}
}
}


if(empty($arr2) && empty($arr1) ){
$arr2[dev][]='';
$arr2[prov][]='';  
echo json_encode(array_merge($arr1,$arr2));
}

elseif (empty($arr2)) {
echo json_encode($arr1);
}

elseif (empty($arr1)){
echo json_encode($arr2);
}

elseif($arr1 && $arr2){
echo json_encode(array_merge($arr1,$arr2));
}
break;

/*OBTER VALOR ZONAS STAFF FIXO*/
case '17':
$obt=" SELECT zonas AS label, cmx AS value FROM comissoes_fixo WHERE 1 ORDER BY zonas";
$result = mysqli_query($conn, $obt);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*MODIFICAR PALAVRA PASSE STAFF*/
case '18':
$pass=md5($_POST['pss']);
$id=$_POST['id'];
$team_pss =" UPDATE pr_admin SET password='$pass' WHERE id = $id";
$result = mysqli_query($conn,$team_pss);
if ($result)
echo 1; 
else echo 0;
break;

/*CRIAR CATEGORIA PARA TABELAS FIXO STAFF*/

case '19';

	$response='';
 	$err='';
	$cat = $_POST['categoria'];
	if ($cat =='' || !$cat)
 		$err .= 'Insira nome da Categoria<br>';
 	else
        	$c = filter_var($cat, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);
 
 	if (!$err){
		$query = "SELECT nome FROM staff_cat_tabela WHERE nome = '$c'";
		$result = mysqli_query($conn, $query);
		$found_product = mysqli_fetch_array($result);
		if( $c == $found_product['nome'])
		{ 
    		  $error_message = 99; 
    		  echo $error_message;
		}
		if ( !isset($error_message) )
		{
			$sql= "INSERT INTO staff_cat_tabela (nome) VALUES ('$c')";
			$result = mysqli_query($conn,$sql);
			if ($result)
	  			$response = 1;
			else 
	 			$response = 0;
		}
	unset($error_message);
	}
echo $err.''.$response;

break;

/*OBTER CATEGORIAS STAFF FIXO*/

case '20':
$sql=" SELECT * FROM staff_cat_tabela WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*APAGAR CATEGORIA STAFF FIXO*/

case '21':
$id = $_POST['id'];
$s=" DELETE FROM staff_cat_tabela WHERE id = $id";
$result = mysqli_query($conn, $s);
if ($result)
  $response = 1; 
else
  $response = 0;

$sq=" DELETE FROM staff_calc_tab WHERE id_cat_staff = $id";
$result = mysqli_query($conn, $sq);
if ($result)
  $response = 1; 
else
   $response = 0; 

$sql = "DELETE FROM staff_calc_values WHERE id_group = $id";
$result = mysqli_query($conn, $sql);
if ($result)
 $response = 1; 
else
  $response = 0; 

echo $response;


break;


/*CRIAR INDEX TABELA STAFF*/

case '22':
$s= $_POST['s_id'];
$p = $_POST['p_id'];

$sql="INSERT INTO staff_calc_tab ( id_cat_staff, id_cat_prod) VALUES ($s, $p)";
$result = mysqli_query($conn, $sql);
if ($result)
  echo 1; 
else
  echo 0;
break;

case '23':
$s= $_POST['s_id'];
$p = $_POST['p_id'];
$sql=" SELECT * FROM staff_calc_tab WHERE 1";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

case '24':
$s= $_POST['s_id'];
$p = $_POST['p_id'];
$sql=" DELETE FROM staff_calc_tab WHERE id_cat_prod = $p AND id_cat_staff= $s";
$result = mysqli_query($conn, $sql);
if ($result)
  $response = 1; 
else
   $response = 0; 

$sq = "DELETE FROM staff_calc_values WHERE id_group = $s AND id_category = $p";
$result = mysqli_query($conn, $sq);
if ($result)
 $response = 1; 
else
  $response = 0; 

echo $response;
break;


/*DADOS PARA TABELA DE EDITAR/VISUALIZAR PREÇOS STAFF FIXO*/

case '25':
$s= $_POST['s_id'];
$p = $_POST['p_id'];

/*todos prods com na cat*/

$prod='';
$cl='';
$vl='';

$sql=" SELECT id, local, local_fim FROM locais WHERE cat = $p ORDER BY local";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$prod[] = $obj;}

if ($prod){
$sql=" SELECT id, nome FROM classe_prods WHERE cat = $p ORDER by nome";
$result = mysqli_query($conn, $sql);
  while($obj = mysqli_fetch_object($result)) {
    $cl[] = $obj;
}
}

if ($cl){
$sql=" SELECT id_group, id_prod, id_label, total FROM staff_calc_values WHERE id_group = $s AND id_category = $p ORDER BY id";
$result = mysqli_query($conn, $sql);
  while($obj = mysqli_fetch_object($result)) {
    $vl[] = $obj;
}
}



$result = array('p' => $prod, 'c' => $cl, 'v' => $vl);
echo json_encode($result);

break;


case '26':
echo var_dump($_POST);

$id_group =  $_POST['group'];

$id_category =  $_POST['cat'];

$id_prod =  $_POST['prod'];

$labels = explode(',',trim($_POST['labels']));

for($i = 0 ; $i<count($labels);$i++){

$label = explode('-',$labels[$i]);

$id_label = $label[0];

$total = $label[1];

$sq = "DELETE FROM staff_calc_values WHERE id_group = $id_group AND id_category = $id_category AND id_prod = $id_prod AND id_label = $id_label";
$result = mysqli_query($conn, $sq);
if ($result)
  echo 1; 
else
  echo 0;

$sql = "INSERT INTO staff_calc_values
(id_group,id_category,id_prod,id_label,total) VALUES 
($id_group, $id_category,$id_prod,$id_label,'$total')";
$result = mysqli_query($conn, $sql);
if ($result)
  echo 1; 
else
  echo 0;

}

break;


}









mysqli_close($conn);
?>



