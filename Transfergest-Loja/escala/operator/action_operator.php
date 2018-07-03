<?php
require_once '../connect.php';

switch ($_POST['action']){

/*GRAVAR NOVO OPERADOR*/

case '1':
/*VERIFICA SE EXISTE OPERADOR COM MESMO NOME*/

$nome = ucfirst($_POST['operatornome']);
$query = "SELECT nome FROM operador WHERE nome = '$nome' LIMIT 1";
$result = mysqli_query($conn, $query);
$found_product = mysqli_fetch_array($result);
if( $nome == $found_product['nome'])
{ 
    $error_message = 9; 
    echo $error_message;
}
if (!isset($error_message))
 {
  $gestao  = (isset($_POST['gestao'])) ? 'checked' : 'false';
  $loja = (isset($_POST['loja'])) ? 'checked' : 'false';
  $pass = (isset($_POST['password'])) ? $_POST['password'] : 'admin';
  $utilizador = $_POST['utilizador'];
  $dominio = $_POST['dominio'];
  $salt = '$G.Om3us3gr3do.SalT.StringG$';

  $pass = crypt($pass,$salt);

$operator_new = "INSERT INTO operador (nome,responsavel,email,tipo,comissao,tel,utilizador,password,gestao,loja,dominio)
VALUES ('$nome','{$_POST['operatorresponsavel']}','{$_POST['operatoremail']}','{$_POST['operatortpcomissao']}','{$_POST['operatorcomissao']}','{$_POST['operatortel']}','$utilizador','$pass','$gestao','$loja','$dominio')";
	$result = mysqli_query($conn,$operator_new);
	if ($result)
         echo 1;
	else
	   echo 0;
}
unset($error_message);
break;

/*APAGAR OPERADOR*/
case '2':
$operator_del= "DELETE FROM operador WHERE id ='{$_POST['id']}'";
$result = mysqli_query($conn,$operator_del);
if ($result)
	echo 2; 
else 
	echo 0;
break;


/*OBTER TODOS OS OPERADORES*/
case '3':
$obter_operator=" SELECT id,nome,responsavel,comissao,email,tipo,utilizador,tel,gestao,loja,dominio FROM operador WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_operator);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

/*EDITAR OS OPERADORES*/
case '4':
$updnome;
$query=" SELECT nome FROM operador WHERE nome ='{$_POST['nome']}' LIMIT 2";
	$result = mysqli_query($conn,$query);
	$rowCount = mysqli_num_rows($result);
	if($rowCount>1) { 
 	  $error_message = 9;
          echo $error_message;
        }
        echo $rowCount;
	if ( !isset($error_message) ) {
    	  $fields=array('nome','responsavel','comissao','email','tel','tipo','utilizador','dominio');
    	  $query='UPDATE operador SET ';
		for($i=1;$i<9;$i++){
			$index= 'col_'.$i.'_'.$_POST['id'];
			if($i==1)
				$updnome=trim($_POST[$index]);
    		$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
			if($i!=8)
				$query.=',';
		}
		$query.=" WHERE id='{$_POST['id']}'";
		$result = mysqli_query($conn,$query);
		if ($result)
			echo 1;
		else 
			echo 0;
	}
unset($updnome);
break;



/*OBTER TODOS OPERADORES PARA SELECT*/
case '5':
$obter_operator=" SELECT nome AS label, id AS value, tipo AS tipo FROM operador WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_operator);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;




/*OBTER OPERADOR DO FILTRO P/ EDIÇÃO*/
case '6':
$obter_operator=" SELECT * FROM operador WHERE nome = '{$_POST['operador']}'";
$result = mysqli_query($conn, $obter_operator);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

/*OBTER TODOS VALORES DOS OPERADOR NOS TRANSFERS*/
case '7':
$ob=" SELECT * FROM zonas_operadores WHERE id_operador = '{$_POST['val']}'";
$result = mysqli_query($conn, $ob);

while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

/*CRIAR NOVO REGISTO DE PREÇO POR SERVIÇO E PAX*/
case '8':
$id = $_POST['id_prod'];
$pax_1 = 'col_1_'.$id;
$pax_2 = 'col_2_'.$id;
$pax_3 = 'col_3_'.$id;
$pax_4 = 'col_4_'.$id;
$sql= "INSERT INTO zonas_operadores(id_operador, id_prod,pax_1,pax_2,pax_3,pax_4) VALUES ('{$_POST['id_op']}','{$_POST['id_prod']}', '{$_POST[$pax_1]}','{$_POST[$pax_2]}','{$_POST[$pax_3]}','{$_POST[$pax_4]}')";
$result = mysqli_query($conn,$sql);
if ($result) echo 11;
else 
echo 10;
break;


/*EDITAR REGISTO DE PREÇO POR SERVIÇO E PAX*/
case '9':
$id = $_POST['id_prod'];
$pax_1 = 'col_1_'.$id;
$pax_2 = 'col_2_'.$id;
$pax_3 = 'col_3_'.$id;
$pax_4 = 'col_4_'.$id;
$sql= " UPDATE zonas_operadores SET pax_1='{$_POST[$pax_1]}',pax_2='{$_POST[$pax_2]}',pax_3='{$_POST[$pax_3]}',pax_4='{$_POST[$pax_4]}' 
WHERE id_operador = '{$_POST['id_op']}' AND id_prod='{$_POST['id_prod']}' ";
$result = mysqli_query($conn,$sql);
if ($result) echo 11;
else 
echo 10;
break;







/*CRIAR VALOR DA TABELA OPERADORES*/
case '10':

$response='';

$arr = json_decode(stripslashes($_POST['arr']));

$lgt = count($arr);

for($i=0; $i < $lgt; $i++){
$label= $arr[$i]->label;
$oper = $arr[$i]->oper;
$val = $arr[$i]->val;
$prod = $arr[$i]->prod;
$cat= $arr[$i]->cat;

if(!$val) $val = '0';

$sql= " INSERT INTO operador_precos (valor, prod_id, id_label, id_operador,id_categoria)
VALUES('$val',$prod,$label,$oper,$cat)";

$result = mysqli_query($conn,$sql);

if ($result) $response .= 1;
else $response .= 0;

}
echo $response;

break;



/*EDITAR VALOR DA TABELA OPERADORES*/
case '11':
$response='';
$oper = $_POST['oper'];
$cat = $_POST['cat'];
$arr = json_decode(stripslashes($_POST['arr']));
$lgt = count($arr);
for($i=0; $i < $lgt; $i++){

$id= $arr[$i]->id;
$val = $arr[$i]->val;

if(!$val) $val='0';
$sql= " UPDATE operador_precos SET valor ='$val' WHERE id = $id AND id_categoria = $cat AND id_operador = $oper ";
$result = mysqli_query($conn,$sql);
if ($result) $response .= 1;
else $response .= 0;

}
echo $response;

break;



case '12':

$tipo = $_POST['tipo'];
$estado = $_POST['estado'];

$sql = "UPDATE operador SET $tipo = '$estado' WHERE 1";

$result = mysqli_query($conn,$sql);

if ($result)
  echo 1;
else 
  echo 0;

break;

case '13':
  $pass = (isset($_POST['password'])) ? $_POST['password'] : 'admin';
  $salt = '$G.Om3us3gr3do.SalT.StringG$';
  $pass = crypt($pass,$salt);
  $id = $_POST['id'];
$sql = "UPDATE operador SET password = '$pass' WHERE id = $id ";
$result = mysqli_query($conn,$sql);
if ($result)
  echo 1;
else 
  echo 0;
break;

case '14':

$id = $_POST['id'];
if ($_POST['val'] == 'checked') 
$val = 'false';

if ($_POST['val'] == 'false') 
$val = 'checked';

$tipo = $_POST['tp'];

$sql = "UPDATE operador SET $tipo = '$val' WHERE id = $id";
$result = mysqli_query($conn,$sql);
if ($result)
		$response = 1;
	else
		$response = 0;

$var[] = array('response' => $response,'id' => $id, 'val' => $val, 'tipo'=>$tipo);

echo json_encode($var);
break;









case '15':

$var = array();

$operador = $_POST['operador']; 
$cat = $_POST['cat'];

/*TODOS IDS DO RESULTADO*/

$arr_id = array();

$sql = "SELECT id FROM locais WHERE cat = $cat ";

$result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {array_push($arr_id, $row["id"]);}
       }

$length = count($arr_id);

for ($i = 0; $i < $length; $i++) {

/* CAMPOS DOS PRODUTOS */
       $sql = "SELECT id, local, local_fim FROM locais WHERE id = $arr_id[$i] ";
       $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $local = $row["local"];
            $local_fim = $row["local_fim"];
           }
          }


/* PREÇOS DO PRODUTO PVP */

            $sql3 = "SELECT * FROM classe_precos WHERE prod_id = $arr_id[$i] ORDER BY id_label ASC ";
	    $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
              $arr3[] = array('valor'=> $row['valor'], 'id_label' => $row['id_label'], 'prod_id' => $row['prod_id'], 'id' => $row['id']);
             }
            }


/* LABELS DOS PRODUTOS */
            $sql2 = "SELECT id, nome FROM classe_prods WHERE cat = $cat ORDER BY id ASC";
	    $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
             while($row = mysqli_fetch_assoc($result2)) {
              $arr2[] = array('id' => $row["id"], 'nome' => $row["nome"]);
             }
            }

            $sql4 = "SELECT * FROM operador_precos WHERE prod_id = $arr_id[$i] AND id_operador = $operador ORDER BY id_label ASC";
	    $result4 = mysqli_query($conn, $sql4);
            if (mysqli_num_rows($result4) > 0) {
             while($row = mysqli_fetch_assoc($result4)) {
             $arr4[] = array('id' => $row["id"], 'valor' => $row["valor"], 'label' => $row["id_label"], prod => $row['prod_id'] );
             }
            }

            $sql5 = "SELECT * FROM operador_noturno WHERE prod_id = $arr_id[$i] AND id_operador = $operador ORDER BY id_label ASC";
	    $result5 = mysqli_query($conn, $sql5);
            if (mysqli_num_rows($result5) > 0) {
             while($row = mysqli_fetch_assoc($result5)) {
             $arr5[] = array('id' => $row["id"], 'valor' => $row["valor"], 'label' => $row["id_label"], prod => $row['prod_id'] );
             }
            }

         else {
               $arr4 = "null";
               $arr5 = "null";
             }

    $arr[] = array('id'=>$id,'local'=>$local,'local_fim'=>$local_fim,'pvp' => $arr3, 'labels' => $arr2, 'po' => $arr4, 'noturno' =>$arr5);

/* LIMPAR ARRAYS */
unset($arr2);
unset($arr3);
unset($arr4);
unset($arr5);
}


echo json_encode($arr);
break;





/*PROCURAR PARA EDITAR TABELAS OPERADORES
case '11115':
 $var = array();

$operador = $_POST['operador']; 
$cat = $_POST['cat'];

/*TODOS IDS DO RESULTADO*/

$arr_id = array();

$sql = "SELECT id FROM locais WHERE cat = $cat ";

$result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {array_push($arr_id, $row["id"]);}
       }

$length = count($arr_id);

for ($i = 0; $i < $length; $i++) {

       $sql = "SELECT id, local, local_fim FROM locais WHERE id = $arr_id[$i]";
       $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $local = $row["local"];
            $local_fim = $row["local_fim"];
           }
          }
            $sql3 = "SELECT * FROM classe_precos WHERE prod_id = $arr_id[$i] ORDER BY id_label ASC ";
	    $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
              $arr3[] = array('valor'=> $row['valor'], 'id_label' => $row['id_label'], 'prod_id' => $row['prod_id'], 'id' => $row['id']);
             }
            }

            $sql2 = "SELECT id, nome FROM classe_prods WHERE cat = $cat ORDER BY id ASC";
	    $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
             while($row = mysqli_fetch_assoc($result2)) {
              $arr2[] = array('id' => $row["id"], 'nome' => $row["nome"]);
             }
            }

            $sql4 = "SELECT * FROM operador_precos WHERE prod_id = $arr_id[$i] AND id_operador = $operador ORDER BY id_label ASC";
	    $result4 = mysqli_query($conn, $sql4);
            if (mysqli_num_rows($result4) > 0) {
             while($row = mysqli_fetch_assoc($result4)) {
             $arr4[] = array('id' => $row["id"], 'valor' => $row["valor"], 'label' => $row["id_label"], prod => $row['prod_id'] );
             }
            }
            $sql5 = "SELECT * FROM operador_noturno WHERE prod_id = $arr_id[$i] AND id_operador = $operador ORDER BY id_label ASC";
	    $result5 = mysqli_query($conn, $sql5);
            if (mysqli_num_rows($result5) > 0) {
             while($row = mysqli_fetch_assoc($result5)) {
             $arr5[] = array('id' => $row["id"], 'valor' => $row["valor"], 'label' => $row["id_label"], prod => $row['prod_id'] );
             }

            }

else {$arr4 = "null"; $arr5 = "null";}

    $arr[] = array('id'=>$id,'local'=>$local,'local_fim'=>$local_fim,'preco'=>$arr3,'labels'=>$arr2,'operador' =>$arr4, 'noturno' =>$arr5);

/* LIMPAR ARRAYS */
unset($arr2);
unset($arr3);
unset($arr4);
unset($arr5);
}

echo json_encode($arr);
break;





/*ALTERAR TODOS OS PREÇOS PO COM BASE NA PERCENTAGEM INSERIDA*/

case 16:

$id_operador = $_POST['oper']; 
$percentagem = $_POST['vl']/100;
$id_categoria = $_POST['cat']; 

$arr_id = array();
$arr_val = array();

$sql0 = "UPDATE operador_tab_calc SET valor = $percentagem WHERE id_operador = $id_operador AND id_categoria = $id_categoria";
$result0 = mysqli_query($conn,$sql0);

$sql = "SELECT id,valor FROM operador_precos WHERE id_operador = $id_operador AND id_categoria = $id_categoria ";

$result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)){
             array_push($arr_id, $row["id"]);
             array_push($arr_val, $row["valor"]);
              
         }
       }


$length = count($arr_id);

for ($i = 0; $i < $length; $i++) {

$new = number_format(($arr_val[$i] * $percentagem + $arr_val[$i]),2);

$value =explode('.',trim($new));

$decimals = $value[1];

   if($decimals  < 25) $decimals = 0;
   else if($decimals  >= 25 && $decimals  <= 74 ) $decimals = 0.5;
   else if( $decimals  >= 75 ) $decimals  = 1;

$units = $value[0]+$decimals;

$new = money_format('%i', $units);

$sql = "UPDATE operador_precos SET valor =$new WHERE id =$arr_id[$i]";
$result = mysqli_query($conn,$sql);

$result ? $response .= 1 : $response .= 0;

}

echo $response;
break;


/*APAGAR TODOS OS PREÇOS PRODUTOS DOS OPERADORES DA CATEGORIA*/

case 101:
$operador = $_POST['operador']; 
$cat = $_POST['cat'];

$sql0 = "DELETE FROM operador_tab_calc WHERE id_operador = $operador AND id_categoria = $cat";
$result0 = mysqli_query($conn,$sql0);

$sql1 = "DELETE FROM operador_noturno WHERE id_operador = $operador AND id_categoria = $cat";
$result1 = mysqli_query($conn,$sql1);

$sql = "DELETE FROM operador_precos WHERE id_operador = $operador AND id_categoria = $cat";
$result = mysqli_query($conn,$sql);

$result ? $response = 1 : $response = 0;

echo $response;
break;



/*CRIAR TABELA DA CATEGORIA PARA O OPERADOR COM PRECOS PVP */

case 102:

  $operador = $_POST['operador'];
  $cat = $_POST['cat'];

  /* CRIAR CAMPO CALCULO PARA TABELA */

  $sql = " SELECT id, local, local_fim FROM locais WHERE cat = $cat ";
  $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row["id"];
      $local = $row["local"];
      $local_fim = $row["local_fim"];

      /*OBTER TODAS AS LABELS DO PRODUTO  DA CATEGORIA*/

      $sql1 = "SELECT id, nome 
               FROM classe_prods WHERE cat = $cat ORDER BY id ASC";
      $result1 = mysqli_query($conn, $sql1);
       while($row = mysqli_fetch_assoc($result1)) {
         $l_id = $row["id"];
         $l_nome= $row["nome"];
         $labels[] = array('id '=> $l_id, 'nome' => $l_nome);
       }

     /* OBTER TODOS OS PREÇOS PVP */

               $sql2 = "SELECT id, valor, id_label,prod_id 
                        FROM classe_precos WHERE prod_id = $id ORDER BY id_label ASC";
                 $result2 = mysqli_query($conn, $sql2);
                 while($row = mysqli_fetch_assoc($result2)) {
                   $pvp_id = $row["id"];
                   $pvp_valor = $row["valor"];
                   $pvp_prod_id = $row["prod_id"];
                   $pvp_label= $row["id_label"];


                $sql3 = "INSERT INTO operador_precos(valor, prod_id, id_label, id_operador, id_categoria)
                         VALUES('$pvp_valor',$pvp_prod_id,$pvp_label,$operador,$cat)";
                    $result3 = mysqli_query($conn,$sql3);
                 

                 $sql4 = "INSERT INTO operador_noturno(valor, prod_id, id_label, id_operador, id_categoria)
                         VALUES('$pvp_valor',$pvp_prod_id,$pvp_label,$operador,$cat)";
                    $result4 = mysqli_query($conn,$sql4);
                 }



           }

$sql0 = "INSERT INTO operador_tab_calc(valor, id_operador, id_categoria)VALUES ('',$operador,$cat)";
$result0 = mysqli_query($conn,$sql0);

echo 1;

break;




/* PREÇOS PO COM BASE EM PVP */

case 103: 
$calc =  $_POST['vl']/100;
$operador = $_POST['oper'];
$cat = $_POST['cat'];

  $sqld = "DELETE FROM operador_precos WHERE id_operador = $operador AND id_categoria = $cat";
  $resultd = mysqli_query($conn,$sqld);
  $resultd ? $response = 1 : $response = 0;

  $sql = " SELECT id, local, local_fim FROM locais WHERE cat = $cat ";
  $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row["id"];
      $local = $row["local"];
      $local_fim = $row["local_fim"];

      /*OBTER TODAS AS LABELS DO PRODUTO  DA CATEGORIA*/

      $sql1 = "SELECT id, nome 
               FROM classe_prods WHERE cat = $cat ORDER BY id ASC";
      $result1 = mysqli_query($conn, $sql1);
       while($row = mysqli_fetch_assoc($result1)) {
         $l_id = $row["id"];
         $l_nome= $row["nome"];
         $labels[] = array('id '=> $l_id, 'nome' => $l_nome);
       }

     /* OBTER TODOS OS PREÇOS PVP */

               $sql2 = "SELECT id, valor, id_label,prod_id 
                        FROM classe_precos WHERE prod_id = $id ORDER BY id_label ASC";
                 $result2 = mysqli_query($conn, $sql2);
                 while($row = mysqli_fetch_assoc($result2)) {
                   $pvp_id = $row["id"];
                   $pvp_valor = $row["valor"];
                   $pvp_prod_id = $row["prod_id"];
                   $pvp_label= $row["id_label"];

                   $new = number_format(($pvp_valor * $calc + $pvp_valor),2);
                   $value =explode('.',trim($new));
                   $decimals = $value[1];
                   if($decimals  < 25) $decimals = 0;
                   else if($decimals  >= 25 && $decimals  <= 74 ) $decimals = 0.5;
                   else if( $decimals  >= 75 ) $decimals  = 1;
                   $units = $value[0]+$decimals;
                    $new = money_format('%i', $units);

                    $sql3 = "INSERT INTO operador_precos(valor, prod_id, id_label, id_operador, id_categoria)
                             VALUES('$new',$pvp_prod_id,$pvp_label,$operador,$cat)";
                      $result3 = mysqli_query($conn,$sql3);

                      $result3 ? $response .= 1 : $response .= 0;
                 }
           }

        $sql11 = "UPDATE operador_tab_calc SET valor = $calc WHERE id_operador = $operador AND id_categoria = $cat";
        $result11 = mysqli_query($conn,$sql11);

echo $response;

break;


case 110:
  $op_pr = " SELECT DISTINCT id_operador AS id_op, id_categoria AS id_cat
  FROM operador_precos 
  ORDER BY id_categoria ASC";
  $result = mysqli_query($conn, $op_pr);
  if (mysqli_num_rows($result) > 0) {
    while($obj = mysqli_fetch_object($result)) {
      $arr1[] = $obj;
    }
  }
  else $arr1 = "null";

$sqlcp = " SELECT cat, count(cat) AS total FROM classe_prods GROUP BY cat ";

$resultcp = mysqli_query($conn, $sqlcp);

 if (mysqli_num_rows($resultcp) > 0) {
             while($row = mysqli_fetch_assoc($resultcp)) {
             $arr2[] = array('cat' => $row["cat"], 'total' => $row["total"]);
             }
            }

else $arr2 = "null";
$sqlprod = " SELECT cat, COUNT(cat) AS total FROM locais GROUP BY cat ";
$resultprod = mysqli_query($conn, $sqlprod);

 if (mysqli_num_rows($resultprod) > 0) {
             while($row = mysqli_fetch_assoc($resultprod)) {
             $arr3[] = array('cat' => $row["cat"], 'total' => $row["total"]);
             }
            }

else $arr3 = "null";

$actions = " SELECT * FROM operador_tab_calc WHERE 1";
$result3 = mysqli_query($conn, $actions);
     while($obj = mysqli_fetch_object($result3)) {
        $arr4[] = $obj;
      }
   $arr[] = array('tables'=>$arr1, 'labels'=>$arr2, 'prods'=>$arr3, 'actions'=>$arr4);

echo json_encode($arr);
break;




/*EDITAR VALOR DA TABELA OPERADORES*/
case '91':
$response='';
$oper = $_POST['oper'];
$cat = $_POST['cat'];
$arr = json_decode(stripslashes($_POST['arr']));
$lgt = count($arr);
for($i=0; $i < $lgt; $i++){

$id= $arr[$i]->id;
$val = $arr[$i]->val;

if(!$val) $val='0';
$sql= " UPDATE operador_noturno SET valor ='$val' WHERE id = $id AND id_categoria = $cat AND id_operador = $oper ";
$result = mysqli_query($conn,$sql);
if ($result) $response .= 1;
else $response .= 0;

}
echo $response;

break;




}mysqli_close($conn);
?>



