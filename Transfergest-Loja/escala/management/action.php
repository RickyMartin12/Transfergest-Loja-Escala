<?php
require_once '../connect.php';
global $conn;
switch ($_POST['action']){

/*NOVA ENTRADA LOCAL */

case '1':

$local = $_POST['origem_local'];
$local_fim = $_POST['destino_local'];
foreach($_POST as $k => $v){++$i;}
$count=$i;

//TOTAL DE ELEMENTOS NO ARRAY TRANSFERS 6 

$count;
$inicio = 7;

$query = "SELECT * FROM locais WHERE local = '{$local}' AND local_fim ={'$local_fim'} LIMIT 1";
$result = mysqli_query($conn, $query);
	$found_product = mysqli_fetch_array($result);
	if( $local == $found_product['local']) { 
         $error_message= 99; 
        echo $error_message;
    }
	if ( !isset($error_message) ) {
	$Sql="INSERT INTO locais (local,local_fim, visivel ,tipo, duracao, cat) VALUES ('{$_POST['origem_local']}','{$_POST['destino_local']}','{$_POST['visivel']}',{$_POST['tipo']}, {$_POST['duracao']},{$_POST['categoria']})";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
        $mid= mysqli_insert_id($conn);
        if ($mid){
         $t=0;
         while($inicio < $count){
          $quer = "INSERT INTO classe_precos (valor,prod_id, id_label,tipo,cat) VALUES ('{$_POST['tag-0-'.$t]}',$mid,'{$_POST['tag-1-'.$t]}',{$_POST['tipo']},{$_POST['categoria']})";
          $inicio = $inicio+2;
          ++$t;
          $result_p = mysqli_query($conn, $quer);        
          if ($result_p) $response = 1;
         }
        }
       }
	else 
		$response = 0;
}
	echo $response;
break;

/*APRESENTAR LOCAL CRIADO */
case '2':
$get_locais = "SELECT * FROM locais WHERE id = ('{$_POST['id']}')";
$result = mysqli_query($conn, $get_locais);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);break;

/*APAGAR O LOCAL */
case '3':
	$Sql="DELETE FROM locais WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
		$response = 1;
	} 
	else {
		$response = 0;
	}
	echo $response;
break;

/*MOSTRAR O LOCAIS */
case '4':
	$var = array();
	$sql = "SELECT * from locais WHERE 1 ORDER BY local ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
break;

/*EDITAR O LOCAL */
case '5':
	$fields=array('local');
	$query=" SELECT local FROM locais WHERE 1 ";
	$nome= 'col_1_'.$_POST['id'];
    $query.=" AND local ='{$_POST[$local]}' LIMIT 2";
	$result = mysqli_query($conn,$query);
	$rowCount = mysqli_num_rows($result);
	if($rowCount>=2) { 
	$error_message = 99; 
    echo $error_message;
	}

	if ( !isset($error_message) ) {
        $fields=array('local','local_fim','duracao','visivel');
        $query='UPDATE locais SET ';
	 for($i=1;$i<5;$i++){
	 $index= 'col_'.$i.'_'.$_POST['id'];
         $query.= $fields[$i-1].'='."'{$_POST[$index]}'";
 	 if($i!=4)
		$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	$result = mysqli_query($conn,$query);
	
	if ($result) { 
		$response = 1;
	} 
	else {
		$response = 0;
	}
echo $response;
}
break;



/*PROCURAR PARA EDITAR*/
case '6':
 $var = array();

$tipo = $_POST['tipo'];
$cat = $_POST['cat'];

/*TODOS IDS DO RESULTADO*/

$arr_id = array();

$sql = "SELECT id FROM locais WHERE tipo = $tipo AND cat = $cat  AND local LIKE '%{$_POST['search']}%' OR tipo = $tipo AND cat = $cat AND local_fim LIKE '%{$_POST['search']}%'";


$result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {array_push($arr_id, $row["id"]);}
       }

$length = count($arr_id);

for ($i = 0; $i < $length; $i++) {

       $sql = "SELECT id, local, local_fim,duracao,visivel FROM locais WHERE id = $arr_id[$i]";
       $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $local = $row["local"];
            $local_fim = $row["local_fim"];
            $duracao = $row["duracao"];
            $visivel = $row["visivel"];
           }
          }

            $sql3 = "SELECT * FROM classe_precos WHERE prod_id = $arr_id[$i] AND cat = $cat";
	    $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
              $arr3[] = array('valor'=> $row['valor'], 'id_label' => $row['id_label'], 'prod_id' => $row['prod_id'], 'id' => $row['id']);
             }
            }

            $sql2 = "SELECT id, nome FROM classe_prods WHERE tipo = {$_POST['tipo']} AND cat = $cat ORDER BY id ASC";
	    $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
             while($row = mysqli_fetch_assoc($result2)) {
              $arr2[] = array('id' => $row["id"], 'nome' => $row["nome"]);
             }
            }
$arr[] = array('id'=>$id,'local'=>$local,'local_fim'=>$local_fim,'duracao'=>$duracao,'visivel'=>$visivel,'preco'=>$arr3,'labels'=>$arr2);

/*LIMPAR ARRAYS*/

unset($arr3);
unset($arr2);
}
    

echo json_encode($arr);


break;


/*APRESENTAR CAMPOS NOS SELECT CLIENTE*/
case '7':
	$var = array();
	$sql = "SELECT id,local from locais WHERE 1 ORDER BY local ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);break;


/*APRESENTAR RESULTADO PESQUISA CLIENTE*/
case '8':
$l1 = $_POST['l1'];
$l2 = $_POST['l2'];

if($_POST['tp'] == '1') {
	$sql = "SELECT pax_1 from locais WHERE id = '{$_POST['l2']}'";
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
 else if($_POST['tp'] == '2') {
	$sql = "SELECT pax_2 from locais WHERE id = '{$_POST['l2']}'";
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

 else if($_POST['tp'] == '3') {
	$sql = "SELECT pax_3 from locais WHERE id = '{$_POST['l2']}'";
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

else if($_POST['tp'] == '4') {
	$sql = "SELECT pax_4 from locais WHERE id = '{$_POST['l2']}'";
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

if ($_POST['r'] == "1"){
$response = $response+$response*0.90; 
echo number_format((float)$response, 2, '.', ''); 
}
else
echo $response*1; 
break;


case '9':

$local = $_POST['locations'];
$query = "SELECT * FROM criar_locais WHERE local = '{$local}' LIMIT 1";
$result = mysqli_query($conn, $query);
	$found_product = mysqli_fetch_array($result);
	if( $local == $found_product['local']) { 
         $error_message= 99; 
        echo $error_message;
    }
	if ( !isset($error_message) ) {

	$Sql="INSERT INTO criar_locais (local,tipo) VALUES ('{$_POST['locations']}',{$_POST['tipo']})";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
		$response = 0;
	}
}
	echo $response;
break;


/*MOSTRAR OS LOCAIS CRIADOS */
case '10':
	$var = array();
	$sql = "SELECT * FROM criar_locais WHERE tipo =('{$_POST['tipo']}')  ORDER BY local ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
break;


/*EDITAR OS LOCAIS CRIADOS */
case '11':
    $fields=array('local');
    $query='UPDATE criar_locais SET ';
	for($i=1;$i<2;$i++){
	$index= 'col_'.$i.'_'.$_POST['id'];
    $query.= $fields[$i-1].'='."'{$_POST[$index]}'";
	if($i!=1)
		$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	$result = mysqli_query($conn,$query);
	if ($result) { 
		$response = 1;
	} 
	else {
		$response = 0;
        }
echo $response;
break;


case '12':
$Sql="DELETE FROM criar_locais WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) echo 1; 
	else echo 0;
break;

/*MOSTRAR OS LOCAIS CRIADOS P/ AUTOCOMPLETE*/
case '13':
	$var = array();
	$sql = "SELECT id AS value, local AS label FROM criar_locais ORDER BY local ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
break;



/* VERIFICA SE EXISTE IGUAL SE NAO ESCREVE NA CATEGORIA*/
case '14':
$categoria = $_POST['categoria'];
$query = "SELECT * FROM categoria_prods WHERE nome = '{$categoria}' LIMIT 1";
$result = mysqli_query($conn, $query);
	$found_product = mysqli_fetch_array($result);
	if( $categoria == $found_product['nome']) { 
         $error_message= 99; 
        echo $error_message;
    }
	if ( !isset($error_message) ) {
	$Sql="INSERT INTO categoria_prods (nome, visivel, tipo) VALUES ('{$_POST['categoria']}','{$_POST['visivel']}',{$_POST['tipo']})";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
		$response = 0;
	}
}
	echo $response;
break;

/*MOSTRAR AS CATEGORIAS CRIADAS */

case '15':
	$var = array();
	$sql = "SELECT * FROM categoria_prods WHERE 1 ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
break;

/*APAGA A CATEGORIA*/
case '16':

$del ='';

$sql="DELETE FROM categoria_prods WHERE id = ('{$_POST['id']}')";
$result = mysqli_query($conn,$sql);
$sql1="DELETE FROM classe_precos WHERE cat = ('{$_POST['id']}')";
$result1 = mysqli_query($conn,$sql1);
$sql2="DELETE FROM classe_prods WHERE cat = ('{$_POST['id']}')";
$result2 = mysqli_query($conn,$sql2);
$sql3="DELETE FROM locais WHERE cat = ('{$_POST['id']}')";
$result3 = mysqli_query($conn,$sql3);
$sql4="DELETE FROM operador_precos WHERE id_categoria = ('{$_POST['id']}')";
$result4 = mysqli_query($conn,$sql4);
$sql5=" DELETE FROM operador_noturno WHERE id_categoria =  ('{$_POST['id']}')";
$result5 = mysqli_query($conn,$sql5);
$sql6=" DELETE FROM operador_tab_calc WHERE id_categoria = ('{$_POST['id']}')";
$result6 = mysqli_query($conn,$sql6);
if ($result)
$del .=1; else $del .=0;
if ($result1)
$del .=1; else $del .=0;
if ($result2)
$del .=1; else $del .=0;
if ($result3)
$del .=1; else $del .=0;
if ($result4)
$del .=1; else $del .=0;
if ($result5)
$del .=1; else $del .=0;
if ($result6)
$del .=1; else $del .=0;
echo $del;

break;

/*ATUALIZA CATEGORIA SE NOME NAO EXISTIR */
case '17':

 $fields=array('nome','tipo','visivel');
    $query='UPDATE categoria_prods SET ';
	for($i=1;$i<4;$i++){
	$index= 'col_'.$i.'_'.$_POST['id'];
    $query.= $fields[$i-1].'='."'{$_POST[$index]}'";
	if($i!=3)
		$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	$result = mysqli_query($conn,$query);
	if ($result) { 
		$response = 1;
	} 
	else {
		$response = 0;
        }
echo $response;
break;


/* ESCREVE NOVA CLASSE PRODUTOS*/

case '18':

$Sql="INSERT INTO classe_prods (nome, tipo, min, max, cat) VALUES ('{$_POST['classe']}',{$_POST['tipo']},{$_POST['classe-min']},{$_POST['classe-max']}, {$_POST['categoria']})";

	$result = mysqli_query($conn,$Sql);
        $last_id = mysqli_insert_id($conn);
	if ($result) $response = 1;
	else $response = 0;

        if ($response == 1){

$q_id="SELECT id FROM locais WHERE cat = {$_POST['categoria']} ";
	$result_id = mysqli_query($conn, $q_id);
	if (mysqli_num_rows($result_id) > 0) {
    	while($row = mysqli_fetch_assoc($result_id)) {
    	  $id = $row["id"];

$pr = "INSERT INTO classe_precos (valor, prod_id, id_label,tipo,cat) VALUES ('0', $id, $last_id,{$_POST['tipo']},{$_POST['categoria']}) ";
          $result_pr = mysqli_query($conn,$pr);
	  if ($result_pr) $response = 1;
	  else $response = 0;
    	}
     }
  }
echo $response;

break;

/*OBTER DADOS EXISTENTES DAS CLASSES RESPEITANTES AO ID DA CATEGORIA */

case '19':
	$var = array();
	$sql = "SELECT * FROM classe_prods WHERE tipo =('{$_POST['tipo']}') AND cat = ('{$_POST['categoria']}') ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
break;

case '20':
$Sql="DELETE FROM codigo_promo WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) echo 1; 
	else echo 0;
break;

/*APAGA A CLASSE E O PREÇO CORRESPONDENTE*/

case '21':
        $del1="DELETE FROM classe_prods WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$del1);
	if ($result) $response = 1; 
	else $response = 0;

        if ($response ==1 ){
         $del2="DELETE FROM classe_precos WHERE id_label = ('{$_POST['id']}')";
	 $result2 = mysqli_query($conn,$del2);
	 if ($result2) $response=  1; 
	 else $response = 0;
        }

echo $response;
break;


/*OBTER PRECOS DAS CLASSES APÓS EDIÇÃO*/
case '22':
$Sql="SELECT id, valor FROM classe_precos WHERE prod_id = ('{$_POST['id']}')";
      $result = mysqli_query($conn,$Sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
        break;


/*MOSTRAR CATEGORIAS PRODS P/ AUTOCOMPLETE*/
case '23':
	$var = array();
	$sql = "SELECT tipo AS value, nome AS label, id AS cat FROM categoria_prods ORDER BY nome ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);
break;

/*PROCURAR PARA EDITAR TABELAS OPERADORES*/
case '24':
 $var = array();

$operador = $_POST['OPERADOR']; 
$tipo = $_POST['tipo'];

/*TODOS IDS DO RESULTADO*/

$arr_id = array();

$sql = "SELECT id FROM locais WHERE tipo = $tipo AND local LIKE '%{$_POST['search']}%' OR tipo = $tipo AND local_fim LIKE '%{$_POST['search']}%'";

$result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {array_push($arr_id, $row["id"]);}
       }

$length = count($arr_id);

for ($i = 0; $i < $length; $i++) {

       $sql = "SELECT id, local, local_fim,duracao,visivel FROM locais WHERE id = $arr_id[$i]";
       $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $local = $row["local"];
            $local_fim = $row["local_fim"];
           }
          }
            $sql3 = "SELECT * FROM classe_precos WHERE prod_id = $arr_id[$i] ";
	    $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
              $arr3[] = array('valor'=> $row['valor'], 'id_label' => $row['id_label'], 'prod_id' => $row['prod_id'], 'id' => $row['id']);
             }
            }

            $sql2 = "SELECT id, nome FROM classe_prods WHERE tipo = {$_POST['tipo']} ORDER BY id ASC";
	    $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
             while($row = mysqli_fetch_assoc($result2)) {
              $arr2[] = array('id' => $row["id"], 'nome' => $row["nome"]);
             }
            }

            $sql4 = "SELECT * FROM operador_precos WHERE id_operador = {$_POST['operador']} ORDER BY id ASC";
	    $result4 = mysqli_query($conn, $sql4);
            if (mysqli_num_rows($result4) > 0) {
             while($row = mysqli_fetch_assoc($result4)) {
              $arr4[] = array('id' => $row["id"], 'valor' => $row["valor"], 'label' => $row["id_label"], prod => $row['prod_id'] );
             }
            }
else $arr4='';

$arr[] = array('id'=>$id,'local'=>$local,'local_fim'=>$local_fim,'preco'=>$arr3,'labels'=>$arr2, 'operador' =>$arr4);

/* LIMPAR ARRAYS */

unset($arr3);
unset($arr2);
unset($arr4);
}

echo json_encode($arr);
break;


/*EDITAR LABELS DOS PRODS */
case '25':
    $fields=array('nome','min','max');
    $query='UPDATE classe_prods SET ';
	for($i=1;$i<4;$i++){
	$index= 'col_'.$i.'_'.$_POST['id'];
    $query.= $fields[$i-1].'='."'{$_POST[$index]}'";
	if($i!=3)
		$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	$result = mysqli_query($conn,$query);
	if ($result) { 
		$response = 1;
	} 
	else {
		$response = 0;
        }
echo $response;
break;


/*ATUALIZA PROMO SE NOME EXISTE NA BASE DE DADOS */
case '26':

 $fields=array('nome','percentagem','visivel','ativo');
    $query='UPDATE codigo_promo SET ';
	for($i=1;$i<5;$i++){
	$index= 'col_'.$i.'_'.$_POST['id'];
    $query.= $fields[$i-1].'='."'{$_POST[$index]}'";
	if($i!=4)
		$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	$result = mysqli_query($conn,$query);
	if ($result) { 
		$response = 1;
	} 
	else {
		$response = 0;
        }
echo $response;
break;


}mysqli_close($conn);
?>





