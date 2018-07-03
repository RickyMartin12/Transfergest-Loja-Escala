<?php

require '../dbvars.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}


function closeServiciesPayments ($cmx_st,$cmx_op,$id,$matricula){
  global $conn;
if($matricula){
  $sql=" UPDATE excel SET cmx_st = $cmx_st, cmx_op = $cmx_op, estado ='Fechado', matricula = '$matricula' WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  if ($result)
   $resp = 1;
  else  
   $resp = 0;
}
else{
  $sql=" UPDATE excel SET cmx_st = $cmx_st, cmx_op = $cmx_op, estado ='Fechado' WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  if ($result)
   $resp = 1;
  else  
   $resp = 0;
}

  return $resp;
}

function closeServiciesPaymentsStFixed($cmx_op,$id,$matricula){
  global $conn;
if($matricula){
  $sql=" UPDATE excel SET cmx_op = $cmx_op, estado ='Fechado', matricula = '$matricula' WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  if ($result)
   $resp = 1;
   else  
   $resp = 0;
}

else{
  $sql=" UPDATE excel SET cmx_op = $cmx_op, estado ='Fechado' WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  if ($result)
   $resp = 1;
   else  
   $resp = 0;
}
  return $resp;
}




function getStaffCmxFixed ($ct,$pr,$gr,$tot_pax){
  global $conn;

  $sql=" SELECT id FROM classe_prods WHERE min <= $tot_pax AND max >= $tot_pax AND cat = $ct LIMIT 1";

  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0)
  {  
    while($row = mysqli_fetch_assoc($result))
    {
      $lb = $row["id"];
    }
  }

  if (isset($lb)){

    $sql=" SELECT total FROM staff_calc_values WHERE id_label = $lb AND id_prod = $pr AND id_group = $gr";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)
    {  
      while($row = mysqli_fetch_assoc($result))
      {
        $t = $row["total"];
      }
    }
}

if(isset($t))
  return $t;
  else 
  return 0;

}

function valuesInputs ($vl,$id,$tp_com_op, $tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid,$matricula){
$cob_ope  =  $vl;
    /* PAGAMENTOS COMISSOES LIQUIDO STAFF*/

    if ($tp_com_st == "Percentagem"){

       if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
        $cmx_op = $cob_ope * ($com_op/100);
        $cmx_st = ($cob_ope - $cmx_op)*($com_st/100);
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
        $cmx_st = ($cob_ope - $cmx_op)*($com_st/100);
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $cmx_st = ($cob_ope - $com_op)*($com_st/100);
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_st = $cob_ope*($com_st/100);
         $cmx_op = 0;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

    }

     /* PAGAMENTOS COMISSOES BRUTO STAFF */

    elseif ($tp_com_st == "Percentagem Brt."){

       if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
         $cmx_st = $cob_ope*$com_st/100;
         $cmx_op = $cob_ope * ($com_op/100);
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
        $cmx_st = $cob_ope*$com_st/100;
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $cmx_st = $cob_ope*$com_st/100;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_st = $cob_ope*($com_st/100);
         $cmx_op = 0;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

    }

  /* PAGAMENTOS COMISSOES FIXO TABELA STAFF*/

    else if ($tp_com_st == "Fixo Tabela"){
     $g = explode('-',$grupo_st);
     $gr = $g[0];
     $p = explode('-',$nid);
     $pr = $p[0];
     $ct = $p[1];

      $cmx_st = getStaffCmxFixed ($ct,$pr,$gr,$tot_pax);

       if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
        $cmx_op = $cob_ope * ($com_op/100);
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_op = 0;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id,$matricula);
       }

    }


   /* PAGAMENTOS COMISSOES FIXO STAFF*/

    else {

      if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
        $cmx_op = $cob_ope * ($com_op/100);
        $response .= closeServiciesPaymentsStFixed($cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
       $response .= closeServiciesPaymentsStFixed($cmx_op,$id,$matricula);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $response .= closeServiciesPaymentsStFixed($cmx_op,$id,$matricula);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_op = 0;
         $response .= closeServiciesPaymentsStFixed($cmx_op,$id,$matricula);
       }

    }

return $response;
}


switch ($_POST['action']){

/*CONFIRMAÇÃO SERVIÇOS RECEBIDOS E ATUALIZADOS PELA EQUIPA PARA LOGFILE */
case '0':
$Sql=" INSERT INTO logfile (lat,lng,staff,accao,hora,datetime) VALUES ('{$_POST['lat']}','{$_POST['lng']}','{$_POST['equipa']}','{$_POST['accao']}','{$_POST['hora']}',unix_timestamp(now()))";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
	$response = 0;
	}
echo $response;
break;

/*SERVICO ACEITE*/
case '1':
$Sql=" INSERT INTO logfile (lat,lng,staff,servico,accao,hora,tipo,datetime,matricula) VALUES ('{$_POST['lat']}','{$_POST['lng']}','{$_POST['equipa']}','{$_POST['servico']}','{$_POST['accao']}','{$_POST['hora']}','{$_POST['tipo']}',unix_timestamp(now()),'{$_POST['matricula']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
	$response = 0;
	}

if ($response == 1){
$Sql_close=" UPDATE excel SET estado = '{$_POST['accao']}' WHERE id = '{$_POST['servico']}'";
	$result = mysqli_query($conn,$Sql_close);
	if ($result)
        $response = 1;
else
$response = 0;
} 

echo $response;
break;

/*SERVIÇO REJEITADO PARA LOGFILE */
case '2':
$Sql=" INSERT INTO logfile (lat,lng,staff,servico,accao,causa,hora,tipo,datetime,matricula) VALUES ('{$_POST['lat']}','{$_POST['lng']}','{$_POST['equipa']}','{$_POST['servico']}','{$_POST['accao']}','{$_POST['causa']}','{$_POST['hora']}','{$_POST['tipo']}',unix_timestamp(now()),'{$_POST['matricula']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
	$response = 0;
	}

if ($response == 1){
$Sql_close=" UPDATE excel SET estado = '{$_POST['accao']}' WHERE id = '{$_POST['servico']}'";
	$result = mysqli_query($conn,$Sql_close);
	if ($result)
        $response = 1;
else
$response = 0;
} 
echo $response;
break;

/*SERVICO INICIADO*/
case '3':
$Sql=" INSERT INTO logfile (lat,lng,staff,servico,accao,hora,tipo,datetime,matricula) VALUES ('{$_POST['lat']}','{$_POST['lng']}','{$_POST['equipa']}','{$_POST['servico']}','{$_POST['accao']}','{$_POST['hora']}','{$_POST['tipo']}',unix_timestamp(now()),'{$_POST['matricula']}')";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
	$response = 0;
	}

if ($response == 1){
$Sql_close=" UPDATE excel SET estado = '{$_POST['accao']}' WHERE id = '{$_POST['servico']}'";
	$result = mysqli_query($conn,$Sql_close);
	if ($result)
        $response = 1;
else
$response = 0;
} 
echo $response;
break;


/*SERVICO FECHADO*/
case '4':

$response = 1;

$id= $_POST['servico'];

isset($_POST['matricula'])&& $_POST['matricula'] && $_POST['matricula'] !== null && $_POST['matricula'] !== undefined && $_POST['matricula'] != '' ? $matricula = str_replace('-','',$_POST['matricula']) : $matricula = '';

$sql_ser=" SELECT operador,cobrar_operador,staff,cobrar_direto,px,cr,bebe,nid FROM excel WHERE id = $id";
         $result = mysqli_query($conn,$sql_ser);
         if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result))
          {
           $operador = $row["operador"];
           $cob_ope = $row["cobrar_operador"];
           $cob_dir = $row["cobrar_direto"];
           $staff = $row["staff"];
           $tot_pax = $row["px"]+$row["cr"]+$row["bebe"];
           $nid = $row["nid"];
          }
          $response .= 1;
        }
        else 
         $response .= 0 ;
 

/*OBTER DADOS DO STAFF*/

if ($staff){
$sql_cmx_st=" SELECT comissao,tipo,grupo FROM pr_admin WHERE equipa = '$staff'";
$result = mysqli_query($conn,$sql_cmx_st);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
      $com_st = $row["comissao"];
      $tp_com_st = $row["tipo"];
      $grupo_st = $row["grupo"];
    }
$response .= 1;
 }
else $response .= 0;
}


/*OBTER DADOS DO OPERADOR*/
if ($operador){
$sql_cmx_op=" SELECT comissao,tipo,email FROM operador WHERE nome = '$operador'";
$result = mysqli_query($conn,$sql_cmx_op);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
      $tp_com_op = $row["tipo"];
      $com_op = $row["comissao"];
      $email_op =$row["email"];
    }
  $response .=1; 
  }
else $response .= 0;
}

/*SERVIÇOS COM VALOR EM A COBRAR OPERADOR*/

if ($cob_ope)

valuesInputs($cob_ope,$id,$tp_com_op,$tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid,$matricula);

else if ($cob_dir) 

valuesInputs($cob_dir,$id,$tp_com_op, $tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid,$matricula);

else 
valuesInputs('0',$id,$tp_com_op, $tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid,$matricula);

if ($response == 1111){
$to_log=" INSERT INTO logfile (lat,lng,staff,servico,accao,hora,tipo,datetime,matricula) VALUES ('{$_POST['lat']}','{$_POST['lng']}','{$_POST['equipa']}','{$_POST['servico']}','{$_POST['accao']}','{$_POST['hora']}','{$_POST['tipo']}',unix_timestamp(now()),'{$_POST['matricula']}')";
$result = mysqli_query($conn,$to_log);
if ($result)
$response .= 1;
else  
  $response .= 0;
}
echo $response;
break;


/*GRAVAR COORDENADAS GPS DA EQUIPA*/
case '5':
$Sql="UPDATE pr_admin SET lat='{$_POST['lat']}',lng='{$_POST['lng']}' WHERE equipa='{$_POST['equipa']}'";
	$result = mysqli_query($conn,$Sql);
	if ($result) {
	$response = 1;
    } 
	else {
	$response = 0;
	}
echo $response;
break;

/*PESQUISA POR DIAS DOS SERVIÇOS EFECTUADOS PELA EQUIPA*/
case '6':
$date_array_i=explode('/',trim($_POST['date']));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');

$sel_hoje="SELECT id,cmx_st FROM excel WHERE data_servico = $time AND staff = '{$_POST['equipa']}' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_hoje);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*PESQUISA POR MES DOS SERVIÇOS EFECTUADOS PELA EQUIPA*/
case '7':
$date_array_i=explode('/',trim($_POST['date']));
$d=cal_days_in_month(CAL_GREGORIAN,$date_array_i[0],$date_array_i[1]);
  $time_ini_month = strtotime(date($date_array_i[1].'-'.$date_array_i[0].'-01 00:00:00'));
  $time_end_month = strtotime(date($date_array_i[1].'-'.$date_array_i[0].'-'.$d.' 00:00:00'));

/*DATAS VISUALIZAR
echo  $date_in = date('Y-m-d H:i:s', $time_ini_month);
echo  $date_end = date('Y-m-d H:i:s', $time_end_month);*/

$sel="SELECT cmx_st FROM excel WHERE data_servico >= $time_ini_month AND data_servico <= $time_end_month AND staff = '{$_POST['equipa']}'";
$result = mysqli_query($conn, $sel);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $count += $row['cmx_st'];
      $i++;
    }
    $sel_v="SELECT vencimento FROM pr_admin WHERE equipa = '{$_POST['equipa']}'";
    $result = mysqli_query($conn, $sel_v);
    if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
      $venc_st = $row['vencimento'];
    }
}
}

if ($count >= $venc_st)
$objetivo = number_format((float)($count), 2, '.', '').'€';
else
$objetivo = number_format((float)($venc_st), 2, '.', '').'€';
$arr = array('vencimento'=>number_format((float)($venc_st), 2, '.', '').'€', 'cmx_st' =>number_format((float)($count), 2, '.', '').'€', 'objetivo' => $objetivo, 'servico' => $i);
echo json_encode($arr);
break;


/*INSERCAO DESPESAS EQUIPA*/
case '8':
$date_array_i=explode('/',trim($_POST['data']));
$dia=strtotime($date_array_i[2].'-'.$date_array_i[0].'-'.$date_array_i[1].'-00');

$total = array();

if(isset($_POST['lava']) && $_POST['lava'] !=''){ $tp_m = 'Lavagem'; array_push($total,$_POST['lava']);}

if(isset($_POST['port']) && $_POST['port'] !=''){ $tp_m = 'Portagem'; array_push($total,$_POST['port']);}

if(isset($_POST['dive']) && $_POST['dive'] !=''){ $tp_m = 'Diversos'; array_push($total,$_POST['dive']);}

if(isset($_POST['comb']) && $_POST['comb'] !=''){ $tp_m = 'Combustivel'; array_push($total,$_POST['comb']);}

if(isset($_POST['parq']) && $_POST['parq'] !=''){ $tp_m = 'Parque'; array_push($total,$_POST['parq']);}

$t = array_sum($total);

$rel="INSERT INTO diario
(matricula, km_inicio, km_fim, staff, data, tipo_despesa, tipo_manutencao,total)

VALUES

('{$_POST['matri']}','{$_POST['kmini']}','{$_POST['kmfim']}','{$_POST['user']}','$dia','$tp_m','Diária','$t')";


$result = mysqli_query($conn,$rel);
if ($result)
  $response = 1; 
	else
  $response = 0;

echo $response;

break;


/*GRAVA NOVOS VALORES NO SERVIÇO PELO STAFF */
case '9':
$sql_val=" UPDATE excel SET local_entrega = '{$_POST['pt_entrega']}', cobrar_direto = '{$_POST['cobrar_direto']}' WHERE id = '{$_POST['servico']}'";
 $result = mysqli_query($conn,$sql_val);
  if ($result){
    $response = 1;
  }
 else{
 $response = 0;
}

echo $response;
break;



/*OBTER TODAS VIATURAS E KM*/
case '10':
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





/*OBTER TODOS OS OPERADORES*/
case '11':
$obter_operator=" SELECT * FROM operador WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_operator);
if (result){
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
}
else {
$var ='';
json_encode($var);
}
break;




/*GRAVAR NOVO TRANSFER DA APP STAFF*/
case '12':
$success='';

$date_array=explode('/',trim($_POST['data_servico']));
$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$horas=trim($_POST['hrs']); 
        $timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0]." ".$horas);
        $equipa = $_POST['staff'];
        $local_pick_up = $_POST['local_recolha'];
        $local_destino = $_POST['local_entrega'];
        $px = $_POST['px'];
        $cr = $_POST['cr'];
        $obs = $_POST['obs'];
        $companhia = $_POST['operador'];
        $a_cobrar = $_POST['cobrar_operador'];
        $total = $_POST['cobrar_direto'];
        $estado = $_POST['estado'];
        $servico = $_POST['servico'];
        $ticket = $_POST['ticket'];
        $nome_cl = $_POST['nome_cl'];
       $registry_new="INSERT INTO excel
(data_servico,staff,hrs,local_recolha,local_entrega,px,cr,obs,operador,cobrar_operador,cobrar_direto,estado,servico,ticket,nome_cl)
VALUES
($date,'$equipa',$timeok,'$local_pick_up','$local_destino','$px','$cr','$obs','$companhia','$a_cobrar','$total','$estado','$servico','$ticket','$nome_cl')";
		$result = mysqli_query($conn,$registry_new);
		if ($result){
		$success = 11; 
		}
		else {
		$success = 20;
		}
echo $success;
break;


/*OBTER TODOS OS OPERADORES*/
case '20':
$obter_operator=" SELECT nome as label FROM operador WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_operator);
if (result){
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
}
else {
$var ='';
json_encode($var);
}
break;



/*OBTER TIPO SERVICOS*/
case '21':
$obter_comp=" SELECT servico FROM tipo_servico ORDER BY id";
$result = mysqli_query($conn, $obter_comp);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


/*INSERCAO DESPESAS EQUIPA NOVA APP*/
case '22':

$dates = strtotime(date('Y-m-d -00'));

$staff = $_POST['user'];
isset($_POST['matricula'])&& $_POST['matricula'] && $_POST['matricula'] !== null && $_POST['matricula'] !== undefined && $_POST['matricula'] != '' ? $matricula = str_replace('-','',$_POST['matricula']) : $matricula = '';
$km_atuais = $_POST['km_atuais'];
$tipo_despesa = $_POST['tipo_despesa'];
$tipo_manutencao = 'Diária';
$valor = $_POST['valor'];

$sql ="INSERT INTO diario(matricula, km_fim, staff, data,tipo_manutencao, tipo_despesa, data_inicio,total) 
VALUES
('$matricula','$km_atuais','$staff',$dates,'$tipo_manutencao', '$tipo_despesa',$dates,'$valor')";

$result = mysqli_query($conn,$sql);
if ($result)
  $response = 1; 
	else
  $response = 0;
echo $response;
break;


}
mysqli_close($conn);
?>