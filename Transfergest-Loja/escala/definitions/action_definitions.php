<?php


require_once '../connect.php';

switch ($_POST['action']){

/*OBTER DEFINICOES*/
case '3':
$obter_comp=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn, $obter_comp);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

/*EDITAR DEFINICOES*/
case '4':
    	$fields=array('nome','nif','ravt','morada','cod_postal','tel','tlm','email','site','iban');
    	$query='UPDATE companhia SET ';
		for($i=1;$i<10;$i++){
			$index= 'col_'.$i.'_'.$_POST['id'];
    		$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
			if($i!=9)
				$query.=',';
		}
		$query.=" WHERE id='{$_POST['id']}'";
		$result = mysqli_query($conn,$query);
		if ($result)
			echo 1;
		else 
			echo 0;
break;


/*OBTER TIPO SERVICOS*/
case '5':
$obter_comp=" SELECT * FROM tipo_servico ORDER BY id";
$result = mysqli_query($conn, $obter_comp);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*NOVO TIPO SERVICO*/
case '6':
$tp_servico = $_POST['servicestype'];
$query = "SELECT servico FROM tipo_servico WHERE servico = '{$tp_servico}' LIMIT 1";
$result = mysqli_query($conn, $query);
	$found_product = mysqli_fetch_array($result);
	if( $tp_servico == $found_product['servico']) { 
         $error_message= 99; 
        echo $error_message;
    }
	if ( !isset($error_message) ) {
	$Sql="INSERT INTO tipo_servico (servico) VALUES ('{$_POST['servicestype']}')";
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



/*APAGAR O TIPO DE SERVICO */
case '7':
	$Sql="DELETE FROM tipo_servico WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
		$response = 1;
	} 
	else {
		$response = 0;
	}
	echo $response;
break;


/*EDITAR TIPO DE SERVICO */
case '8':
	$query=" SELECT servico FROM tipo_servico WHERE 1 ";
	$tp_serv= 'col_99_'.$_POST['id'];
        $query.=" AND servico ='{$_POST[$tp_serv]}' LIMIT 2";
	$result = mysqli_query($conn,$query);
	$rowCount = mysqli_num_rows($result);
	if($rowCount>=2) { 
	$error_message = 99; 
        echo $error_message;
	}
	if ( !isset($error_message) ) {
        $fields=array('servico');
        $query='UPDATE tipo_servico SET ';
	$index= 'col_99_'.$_POST['id'];
        $query.= $fields[0].'='."'{$_POST[$index]}'";
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


/*OBTER ZONAS COMISSAO*/
case '9':
$obter_comp=" SELECT * FROM comissoes_fixo ORDER BY zonas";
$result = mysqli_query($conn, $obter_comp);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*NOVA ZONA COMISSAO*/
case '10':
$zn_type = $_POST['zonetype'];
$query = "SELECT zonas FROM comissoes_fixo WHERE zonas = '{$zn_type}' LIMIT 1";
$result = mysqli_query($conn, $query);
	$found_product = mysqli_fetch_array($result);
	if( $zn_type == $found_product['zonas']) { 
         $error_message= 99; 
        echo $error_message;
    }
	if ( !isset($error_message) ) {
	$Sql="INSERT INTO comissoes_fixo (zonas ,cmx) VALUES ('{$_POST['zonetype']}','{$_POST['zonevalue']}')";
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



/*APAGAR ZONA COMISSAO*/
case '11':
	$Sql="DELETE FROM comissoes_fixo WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
		$response = 1;
	} 
	else {
		$response = 0;
	}
	echo $response;
break;


/*EDITAR ZONA COMISSAO */
case '12':

	$query=" SELECT comissoes_fixo FROM zonas WHERE 1 ";
        $id= $_POST['id'];
	$zn_type = $_POST['col_101_'.$id];
        $vl_zn = $_POST['col_102_'.$id];


        $query.=" AND zonas ='{$_POST[$zn_type]}' LIMIT 2";
	$result = mysqli_query($conn,$query);
	$rowCount = mysqli_num_rows($result);
	if($rowCount>=2) { 
	$error_message = 99; 
        echo $error_message;
	}

	if ( !isset($error_message) ) {
         $query=" UPDATE comissoes_fixo SET zonas= ('{$zn_type}'), cmx= ('{$vl_zn}') WHERE id= ('{$_POST['id']}')";
	 $result = mysqli_query($conn,$query);
	 if ($result) $response = 1; 
	 else $response = 0;
         echo $response;
        }
break;

/*EDITAR DEFINICOES DO SHOP*/
case '15':

$termos = str_replace("&", "", $_POST['termos']);
$termos = str_replace("'", "´", $termos);

    $query="UPDATE companhia SET termos = '$termos' WHERE 1";
    $result = mysqli_query($conn,$query);
        if ($result){
           $obt_terms="SELECT termos FROM companhia WHERE 1";
           $res = mysqli_query($conn, $obt_terms);
           if (mysqli_num_rows($res) > 0) {
              while($row = mysqli_fetch_assoc($res)) {
                $t= $row['termos'];
              }
           }
           echo $t;
         }		
	else 
	echo 0;
break;

// EDITAR OS TIPOS DE PAGAMENTOS

case '16':


echo $_POST['tipo'].'-->'.$_POST['estado'];
$a = $_POST['tipo'];
$priv_a= " UPDATE companhia SET $a='{$_POST['estado']}' ";
$result = mysqli_query($conn,$priv_a);
 if ($result)
{
  echo 1;
}   
 else 
 {
 echo 0; 
}

break;

//--------------------------------------------------- PROMO - OPCAO ----------------------------------------------------------------------------

/*ADICIONAR DADOS DO PROMO */
case '17':
$promo = $_POST['promo'];

$ini=explode('/',trim($_POST['inicio']));
$date_ini=strtotime($ini[2].'-'.$ini[1].'-'.$ini[0].'-00');

$fim=explode('/',trim($_POST['fim']));
$date_fim=strtotime($fim[2].'-'.$fim[1].'-'.$fim[0].'-00');

if ($date_fim <= $date_ini)
$date_fim = $date_fim + 86400;

$query = "SELECT * FROM codigo_promo WHERE nome = '{$promo}'";
$result = mysqli_query($conn, $query);
	$found_product = mysqli_fetch_array($result);
	if( $promo == $found_product['nome']) { 
         $error_message= 99; 
        echo $error_message;
    }
	if ( !isset($error_message) ) {
	$Sql="INSERT INTO codigo_promo (nome ,percentagem, visivel, ativo, data_ini, data_fim)
        VALUES ('{$_POST['promo']}','{$_POST['promo_val']}',0,0,$date_ini,$date_fim)";
	$result = mysqli_query($conn,$Sql);
	if ($result)
	 $response = 1; 
	else
         $response = 0;
	}
	echo $response ;
break;




/*OBTER TIPO PROMO*/
case '18':
$var='';
$obter_comp=" SELECT * FROM codigo_promo ORDER BY id";
$result = mysqli_query($conn, $obter_comp);
 while($row = mysqli_fetch_assoc($result)) {
 $id = $row['id'];
 $nome = $row['nome'];
 $percentagem = $row['percentagem'];
 $visivel = $row['visivel'];
 $ativo = $row['ativo'];
 $data_ini = date('d/m/Y', $row['data_ini']);
 $data_fim = date('d/m/Y', $row['data_fim']);
 $var[] = array('id' => $id,'nome' => $nome ,'percentagem' => $percentagem,'visivel' => $visivel,'ativo' => $ativo,'data_ini' => $data_ini,'data_fim' => $data_fim);
   }
echo json_encode($var);



break;

/*EDITAR DADOS DO PROMO */



/*REMOVER DADOS DO PROMO */



// ---------------------------------------------------------------------------------------------------------------------------------------------




/*PESQUISA POR MES PARA GRAFICOS*/
case '13':
  $date_array_i=explode('/',trim($_POST['mes']));

  $d=cal_days_in_month(CAL_GREGORIAN,$date_array_i[0],$date_array_i[1]);
  $time_ini_month = strtotime(date($date_array_i[1].'-'.$date_array_i[0].'-01 00:00:00'));
  $time_end_month = strtotime(date($date_array_i[1].'-'.$date_array_i[0].'-'.$d.' 23:59:59'));

/*echo  $date_in = date('Y-m-d H:i:s', $time_ini_month);
echo  $date_end = date('Y-m-d H:i:s', $time_end_month);*/

$income="SELECT cobrar_operador,cobrar_direto,cmx_st,cmx_op FROM excel WHERE data_servico >= $time_ini_month AND data_servico <= $time_end_month";
$result = mysqli_query($conn, $income);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $p_o += $row['cobrar_operador'];
      $p_d += $row['cobrar_direto'];
      $d_s += $row['cmx_st'];
      $d_o += $row['cmx_op'];
    }
}
 $outcame="SELECT * FROM diario WHERE data >= $time_ini_month AND data <= $time_end_month";
 $resul = mysqli_query($conn, $outcame);
 if (mysqli_num_rows($resul) > 0) {
  while($row = mysqli_fetch_assoc($resul)) {
   $a += $row['combustivel'];
   $e += $row['lavagem'];
   $i += $row['portagem'];
   $o += $row['diversos'];
   $u += $row['selo'];
   $p += $row['seguro'];
   $s += $row['inspeccao'];
   $y += $row['revisao']; 
   $p += $row['sinistro'];
   $w += $row['mecanica'];
   $z += $row['parque'];
   }
}

$outcamefixed="SELECT valor FROM despesa_fixa WHERE data >= $time_ini_month AND data <= $time_end_month";
 $resul = mysqli_query($conn, $outcamefixed);
 if (mysqli_num_rows($resul) > 0) {
  while($row = mysqli_fetch_assoc($resul)) {
   $d_f += $row['valor'];
   }
}


$d_v = $a+$e+$i+$o+$u+$p+$s+$y+$p+$w+$z;
$arr = array('d_f'=> number_format((float)($d_f), 2, '.', ''),'p_o'=> number_format((float)($p_o), 2, '.', ''), 'p_d' =>number_format((float)($p_d), 2, '.', ''),'d_v' =>number_format((float)($d_v), 2, '.', ''),'d_s' =>number_format((float)($d_s), 2, '.', ''),'d_o' =>number_format((float)($d_o), 2, '.', ''));
echo json_encode($arr);
break;

/*PESQUISA ENTRE MESES PARA GRAFICOS*/

case '14':
  $date_array_ini=explode('/',trim($_POST['mesini']));
  $date_array_fim=explode('/',trim($_POST['mesfim']));

  $d=cal_days_in_month(CAL_GREGORIAN,$date_array_fim[0],$date_array_fim[1]);

  $time_ini_month = strtotime(date($date_array_ini[1].'-'.$date_array_ini[0].'-01 00:00:00'));

  $time_end_month = strtotime(date($date_array_fim[1].'-'.$date_array_fim[0].'-'.$d.' 23:59:59'));

/*echo  $date_in = date('Y-m-d H:i:s', $time_ini_month);
echo  $date_end = date('Y-m-d H:i:s', $time_end_month);*/

$income="SELECT cobrar_operador,cobrar_direto,cmx_st, cmx_op FROM excel WHERE data_servico >= $time_ini_month AND data_servico <= $time_end_month";
$result = mysqli_query($conn, $income);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $p_o += $row['cobrar_operador'];
      $p_d += $row['cobrar_direto'];
      $d_s += $row['cmx_st'];
      $d_o += $row['cmx_op'];
    }
}

 $outcame="SELECT * FROM diario WHERE data >= $time_ini_month AND data <= $time_end_month";
 $resul = mysqli_query($conn, $outcame);
 if (mysqli_num_rows($resul) > 0) {
  while($row = mysqli_fetch_assoc($resul)) {
   $a += $row['combustivel'];
   $e += $row['lavagem'];
   $i += $row['portagem'];
   $o += $row['diversos'];
   $u += $row['selo'];
   $p += $row['seguro'];
   $s += $row['inspeccao'];
   $y += $row['revisao']; 
   $p += $row['sinistro'];
   $w += $row['mecanica'];
   $z += $row['parque'];
   }
}


$outcamefixed="SELECT valor FROM despesa_fixa WHERE data >= $time_ini_month AND data <= $time_end_month";
 $resul = mysqli_query($conn, $outcamefixed);
 if (mysqli_num_rows($resul) > 0) {
  while($row = mysqli_fetch_assoc($resul)) {
   $d_f += $row['valor'];
   }
}



$d_v = $a+$e+$i+$o+$u+$p+$s+$y+$p+$w+$z;
$arr = array(
'd_f'=> number_format((float)($d_f), 2, '.', ''),'p_o'=> number_format((float)($p_o), 2, '.', ''), 'p_d' =>number_format((float)($p_d), 2, '.', ''),'d_v' =>number_format((float)($d_v), 2, '.', ''),'d_s' =>number_format((float)($d_s), 2, '.', ''),'d_o' =>number_format((float)($d_o), 2, '.', ''));
echo json_encode($arr);
break;


case '20':
$Sql="DELETE FROM codigo_promo WHERE id = ('{$_POST['id']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) echo 1; 
	else echo 0;
break;




/*EDITAR CODIGO PROMO */
case '21':
    $fields=array('nome','percentagem','data_ini','data_fim');
    $query='UPDATE codigo_promo SET ';
	for($i=1;$i<5;$i++){
	$index= 'col_'.$i.'_'.$_POST['id'];

		if($i===3){
			$date_array=explode('/',trim($_POST[$index]));
			$date_ini=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
			$query.= $fields[$i-1].'='."'".$date_ini."'";
		}
		elseif($i==4){
                      $date_array=explode('/',trim($_POST[$index]));
			$date_fim=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
			$query.= $fields[$i-1].'='."'".$date_fim."'";
		}

else{
			$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
		}


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


/*FAVORITO NO FRONT END LOJA, A EXIBIR*/

case '22':
$_POST['id'];

$query="UPDATE codigo_promo SET visivel = 0 WHERE id != '{$_POST['id']}'";
$result = mysqli_query($conn,$query);
	if ($result)
		$response = 1;
	else
		$response = 0;

$query2="UPDATE codigo_promo SET visivel = 1, ativo = 1 WHERE id = '{$_POST['id']}'";
$result2 = mysqli_query($conn,$query2);
	if ($result2)
		$response = 1;
	else
		$response = 0;

echo $response;
break;

case '23':
$var='';
$_POST['id'];
if ($_POST['val'] == 1) 
$val = 0;
if ($_POST['val'] == 0) 
$val = 1;

$query="UPDATE codigo_promo SET ativo = $val WHERE id = '{$_POST['id']}'";
$result = mysqli_query($conn,$query);
	if ($result)

		$response = 1;
	else
		$response = 0;

$var[] = array('response' => $response,'id' => $_POST['id'], 'val' => $val);
echo json_encode($var);
break;


case '24':
$query="UPDATE codigo_promo SET visivel = 0 WHERE 1";
$result = mysqli_query($conn,$query);
	if ($result)
		$response = 1;
	else
		$response = 0;

$var[] = array('response' => $response,'id' => $_POST['id'], 'val' => $val);
echo json_encode($var);
break;



case '25':

$noturno = $_POST['noturno'];

$query="UPDATE companhia SET noturno = '$noturno' WHERE 1";
$result = mysqli_query($conn,$query);
	if ($result)
	   echo 1;
	else
           echo 0;
break;


case '26':

$recomendacoes = filter_var($_POST['recomendacoes'], FILTER_SANITIZE_STRING);

$query="UPDATE companhia SET publicidade = '$recomendacoes' WHERE 1";
$result = mysqli_query($conn,$query);
	if ($result)
	   echo 1;
	else
           echo 0;
break;

case '27':

$colors = $_POST['colors'];
$query="UPDATE companhia SET color = '$colors' WHERE 1";
$result = mysqli_query($conn,$query);
	if ($result)
	   echo 1;
	else
           echo 0;
break;

case '28':

$pp_email = $_POST['pp_email'];
$iban = $_POST['iban'];
$pp_taxa = $_POST['pp_taxa'];
$hora_reserva = $_POST['hora_reserva'];

$query="UPDATE companhia SET pp_email = '$pp_email', iban='$iban', pp_taxa = '$pp_taxa', hora_reserva = '$hora_reserva' WHERE 1";
$result = mysqli_query($conn,$query);
	if ($result)
	   echo 1;
	else
           echo 0;
break;

}



mysqli_close($conn);
?>


