<?php
require_once '../connect.php';

function closeServiciesPayments ($cmx_st,$cmx_op,$id){
  global $conn;
  $sql=" UPDATE excel SET cmx_st = $cmx_st, cmx_op = $cmx_op, estado ='Fechado' WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  if ($result)
   $resp = 1;
   else  
   $resp = 0;

  return $resp;
}

function closeServiciesPaymentsStFixed($cmx_op,$id){
  global $conn;
  $sql=" UPDATE excel SET cmx_op = $cmx_op, estado ='Fechado' WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  if ($result)
   $resp = 1;
   else  
   $resp = 0;

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



function valuesInputs ($vl,$id, $tp_com_op, $tp_com_st, $com_op, $com_st, $tot_pax, $grupo_st, $nid){
$cob_ope  =  $vl;




    /* PAGAMENTOS COMISSOES LIQUIDO STAFF*/

    if ($tp_com_st == "Percentagem"){

       if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
        $cmx_op = $cob_ope * ($com_op/100);
        $cmx_st = ($cob_ope - $cmx_op)*($com_st/100);
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
        $cmx_st = ($cob_ope - $cmx_op)*($com_st/100);
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $cmx_st = ($cob_ope - $com_op)*($com_st/100);
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_st = $cob_ope*($com_st/100);
         $cmx_op = 0;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

    }

     /* PAGAMENTOS COMISSOES BRUTO STAFF */

    elseif ($tp_com_st == "Percentagem Brt."){

       if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
         $cmx_st = $cob_ope*$com_st/100;
         $cmx_op = $cob_ope * ($com_op/100);
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
        $cmx_st = $cob_ope*$com_st/100;
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $cmx_st = $cob_ope*$com_st/100;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_st = $cob_ope*($com_st/100);
         $cmx_op = 0;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
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
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
        $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_op = 0;
         $response .= closeServiciesPayments($cmx_st,$cmx_op,$id);
       }

    }

   /* PAGAMENTOS COMISSOES FIXO STAFF*/

    else {

      if ($tp_com_op == "Tabela Percentagem" || $tp_com_op == "Percentagem" )
       {
        $cmx_op = $cob_ope * ($com_op/100);
        $response .= closeServiciesPaymentsStFixed($cmx_op,$id);
       }

       elseif($tp_com_op == "PorPax")
       {
        $cmx_op =$com_op * $tot_pax;
       $response .= closeServiciesPaymentsStFixed($cmx_op,$id);
       }

       elseif($tp_com_op == "Fixo")
       {
         $cmx_op  =  $com_op;
         $response .= closeServiciesPaymentsStFixed($cmx_op,$id);
       }

       elseif ($tp_com_op == "Tabela")
       {
         $cmx_op = 0;
         $response .= closeServiciesPaymentsStFixed($cmx_op,$id);
       }

    }

return $response;
}












switch ($_POST['action']){

/*GRAVAR NOVO REGISTO*/
  case '1':


/*GRAVAR NOVO UTILIZADOR*/

    $err='';

    if (!$_POST['data_servico'])
      $err .= "- Data Serviço <span class='w3-text-red'> *</span><br>";
    else{
      $date_array=explode('/',trim($_POST['data_servico']));
      $data_servico=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
    }

    if ($_POST['hrs']){
      $horas = trim($_POST['hrs']); 
      $hrs = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas);
    }
    else
      $hrs = $data_servico;

    $staff = $_POST['staff'];

    $servico = $_POST['servico'];

    $referencia = $_POST['referencia'];

    if ($_POST['matricula'])
      $matricula = str_replace('-','',$_POST['matricula']);
    else
      $matricula = '';

    $estado = $_POST['estado'];
    if ($_POST['duracao']){
      $dur=explode(':',trim($_POST['duracao']));
      $end = $dur[0]*60*60 + $dur[1]*60;
    }
    else
    $end = 0;

    if (!$_POST['operador'])
      $err .= "- Operador <span class='w3-text-red'> *</span><br>";
    else
      $operador = $_POST['operador'];
      $ticket = $_POST['ticket'];

      if(!$_POST['px'])
        $err .= "- Adultos (Insira valor ou 0)<span class='w3-text-red'> *</span><br>";
      else 
         $px = $_POST['px'];
 
      $nome = $_POST['nome_cl'];
      $email = $_POST['email'];
      $pais = $_POST['pais'];
      $tel = $_POST['tel'];

      if(!$_POST['cr'])
        $cr = 0;
      else 
        $cr = $_POST['cr'];

      if(!$_POST['bebe'])
        $bebe = 0;
      else
        $bebe = $_POST['bebe'];

      $local_recolha = $_POST['local_recolha'];
      $morada_recolha = $_POST['morada_recolha'];
      $morada_recolha_gps = $_POST['morada_recolha_gps'];

      $voo = $_POST['voo'];
  
      if ($_POST['voo_horario']){
        $cdt = explode(' ',trim($_POST['voo_horario']));
        $cd = explode('/',trim($cdt[0]));
        $voo_horario = strtotime($cd[2].'-'.$cd[1].'-'.$cd[0].' '.$cdt[1]);
      }

      else  $voo_horario = 0;

      $local_entrega = $_POST['local_entrega'];
      $morada_entrega = $_POST['morada_entrega'];
      $morada_entrega_gps = $_POST['morada_entrega_gps'];
      $ponto_referencia = $_POST['ponto_referencia'];
      $obs = $_POST['obs'];

      if(!$_POST['cobrar_a'])
         $err .="- Cobranças<span class='w3-text-red'> *</span><br>"; 
       else 
         $vl = $_POST['cobrar_a'];


      if($_POST['valor'] || $_POST['valor']== '0')
        $valor = $_POST['valor'];
      else
      $err .="- A Cobrar (Insira valor ou 0)<span class='w3-text-red'> *</span><br>"; 

      $cmx_st = $_POST['cmx_st'];
      $criado_em = $_POST['criado_em'];
      $nid = $_POST['nid'];
      $created_by = $_POST['created_by'].'@'.date("d/m/Y H:i:s");

if (!$err) {

if ($nome && $email || $nome !=null && $email != null){

  $sql = "SELECT email FROM clientes WHERE email = '$email' LIMIT 1" ;
  $result = mysqli_query($conn,$sql);

  if (mysqli_num_rows($result) > 0)
    {  
      while($row = mysqli_fetch_assoc($result))
      {
        $exists = $row["email"];
      }
    }
  else {
     $sql = "INSERT INTO  clientes(email, nome, telefone, pais) VALUES ('$email', '$nome', '$tel', '$pais')";
     $result = mysqli_query($conn,$sql);
  }

}


$sql =" INSERT INTO excel (data_servico,hrs,staff,servico,referencia,matricula,estado,end,operador,ticket,nome_cl,email,pais,telefone,px,cr,bebe,
local_recolha,morada_recolha,morada_recolha_gps,voo,voo_horario,local_entrega,morada_entrega,morada_entrega_gps,ponto_referencia,obs,".$vl.",cmx_st,criado_direto,nid,created_by)
VALUES
($data_servico,$hrs,'$staff','$servico','$referencia','$matricula','$estado',$end,'$operador','$ticket','$nome','$email','$pais','$tel','$px','$cr','$bebe','$local_recolha','$morada_recolha','$morada_recolha_gps','$voo',$voo_horario,'$local_entrega','$morada_entrega','$morada_entrega_gps','$ponto_referencia','$obs','$valor','$cmx_st', '$criado_em', '$nid','$created_by')";

$result = mysqli_query($conn,$sql);
  if ($result) {
    $response = 1; 
    $last_id = mysqli_insert_id($conn);
  }  
  else {
    $response = 0;
    $last_id = 0; 
  }

  $r=array('error'=>'','success' => $response,'id' => $last_id);
  echo json_encode($r);
 }
 else{
  $r = array('error' =>$err, 'success' =>'','id' =>'');
  echo json_encode($r);
}

break;




/*APAGAR REGISTO*/
case '2':
$reg_del= "DELETE FROM excel WHERE id ='{$_POST['id']}'";
$result = mysqli_query($conn,$reg_del);
if ($result){
	echo 2; 
}
else {
	echo 0;
}
break;

/*NORMAL VISUALIZAÇAO DOS REGISTOS DO DIA DE ONTEM AO DIA DE AMANHA*/

case '3':
$next_date='';
$before_date='';

$next_date = date('d/m/Y', strtotime( "$next_date + 1 day" )); 
$date_array_i=explode('/',trim($next_date));
$time_next=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');

$before_date = date('d/m/Y', strtotime( "$before_date - 1 day" )); 
$date_array_i=explode('/',trim($before_date));
$time_before=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');

$get_reg=" SELECT * FROM excel WHERE data_servico >= $time_before AND data_servico <= $time_next ORDER BY data_servico,hrs";

$result = mysqli_query($conn, $get_reg);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;

/*ACTUALIZAR DADOS DO REGISTOS*/
case '4':
	$fields=array(referencia,'data_servico','hrs','staff','servico','estado','matricula','voo','nome_cl','email','telefone','pais','local_recolha','local_entrega','ponto_referencia','px','cr','bebe','obs','operador','ticket','cobrar_operador','cobrar_direto');
	$query='UPDATE excel SET ';
	for($i=1;$i<24;$i++){
		$index = 'col_'.$i.'_'.$_POST['id'];
		if($i===2){
			$mydate = trim($_POST[$index]);
			$date_array=explode('/',trim($_POST[$index]));
			$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
			$query.= $fields[$i-1].'='."'".$date."'";
		}
		elseif($i==3){
                        $horas = trim($_POST[$index]);
			$timeok = ($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas);
			$query.= $fields[$i-1].'='."'".strtotime($timeok)."'";		
		}

              elseif($i==7){
                        $matri = str_replace('-','',trim($_POST[$index]));
                        $query.= $fields[$i-1].'='."'".$matri."'";
                }
else{
			$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
		}
		if($i!=23)
			$query.=',';
	}

	$query.=" WHERE id='{$_POST['id']}'";
	mysqli_query($conn,$query);
	$result = mysqli_query($conn,$query);

/*SE SUCESSO NA ALTERAÇÃO ENVIA DADOS DO REGISTO E SUBSTITUI NA RESPECTIVA ID ROW */

	if ($result){
	$get_reg=" SELECT * FROM excel WHERE id ='{$_POST['id']}'";
	$result_ = mysqli_query($conn, $get_reg);
	if ($result_){
	while($obj = mysqli_fetch_object($result_)) {
	$var[] = $obj;}
	echo json_encode($var);
	}
}

break;

/* TODOS OS CAMPOS DE TEAM E OPERATOR PARA FORMULARIO NOVO REGISTRY*/
case '5':

$obter_equipa=" SELECT equipa FROM pr_admin WHERE 1 ORDER BY equipa";
$result = mysqli_query($conn, $obter_equipa);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
$team = json_encode($var);

$obter_operator=" SELECT nome FROM operador WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $obter_operator);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
$operator = json_encode($var);

echo  $operator;
break;

case '6':

$search= array();

$query =" SELECT * FROM excel WHERE 1 ";

if (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['sn']) && isset($_POST['on']) && isset($_POST['pr'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$sn = trim($_POST['sn']);
$on = trim($_POST['on']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}





elseif (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['on']) && isset($_POST['pr'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$on = trim($_POST['on']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.'  AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.'  AND operador LIKE "%'.$on.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.'  AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND operador LIKE "%'.$on.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND operador LIKE "%'.$on.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}


elseif (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['sn']) && isset($_POST['pr'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$sn = trim($_POST['sn']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}


elseif (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['pr'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}


elseif (isset($_POST['dd']) && isset($_POST['sn']) && isset($_POST['on']) && isset($_POST['pr']) ){
$date_array=explode('/',trim($_POST['dd']));
$sn = trim($_POST['sn']);
$on = trim($_POST['on']);
$pr = trim($_POST['pr']);
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
switch ($pr)
{
case '1' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}

elseif (isset($_POST['dd']) && isset($_POST['sn']) && isset($_POST['pr']) ){
$date_array=explode('/',trim($_POST['dd']));
$sn = trim($_POST['sn']);
$pr = trim($_POST['pr']);
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
switch ($pr)
{
case '1' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}



elseif (isset($_POST['dd']) && isset($_POST['on']) && isset($_POST['pr']) ){
$date_array=explode('/',trim($_POST['dd']));
$on = trim($_POST['on']);
$pr = trim($_POST['pr']);
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
switch ($pr)
{
case '1' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}

elseif (isset($_POST['dd']) && isset($_POST['pr']) ){
$date_array=explode('/',trim($_POST['dd']));
$pr = trim($_POST['pr']);
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
switch ($pr)
{
case '1' : 
$query .= ' AND data_servico = '.$dd.' AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND data_servico = '.$dd.' AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND data_servico = '.$dd.' AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND data_servico = '.$dd.' AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND data_servico = '.$dd.' AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND data_servico = '.$dd.' AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND data_servico = '.$dd.' AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND data_servico = '.$dd.' AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}


elseif (isset($_POST['sn']) && isset($_POST['on']) && isset($_POST['pr']) ){
$sn = trim($_POST['sn']);
$on = trim($_POST['on']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}

elseif (isset($_POST['on']) && isset($_POST['pr']) ){
$on = trim($_POST['on']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND operador LIKE "%'.$on.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}


else if (isset($_POST['sn']) && isset($_POST['pr']) ){
$sn = trim($_POST['sn']);
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND rec_staf="Não" '; break;
case '5' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND staff LIKE "%'.$sn.'%" AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}


elseif (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['sn']) && isset($_POST['on'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$sn = trim($_POST['sn']);
$on = trim($_POST['on']);
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%"';
}

elseif (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['sn'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$sn = trim($_POST['sn']);
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND staff LIKE "%'.$sn.'%"';
}

elseif (isset($_POST['di']) && isset($_POST['df']) && isset($_POST['on'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$on = trim($_POST['on']);
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' AND operador LIKE "%'.$on.'%"';
}


elseif (isset($_POST['dd']) && isset($_POST['sn']) && isset($_POST['on']) ){
$date_array=explode('/',trim($_POST['dd']));
$sn = trim($_POST['sn']);
$on = trim($_POST['on']);
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$query .= ' AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" ';
}

elseif (isset($_POST['dd']) && isset($_POST['on'])){
$date_array=explode('/',trim($_POST['dd']));
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$on = trim($_POST['on']);
$query .= ' AND data_servico = '.$dd.' AND operador LIKE "%'.$on.'%"';
}


elseif (isset($_POST['dd']) && isset($_POST['sn'])){
$date_array=explode('/',trim($_POST['dd']));
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$sn = trim($_POST['sn']);
$query .= 'AND data_servico = '.$dd.' AND staff LIKE "%'.$sn.'%"';
}



/*FILTRO LIQUIDADOS */
elseif (isset($_POST['pr'])){
$pr = trim($_POST['pr']);
switch ($pr)
{
case '1' : 
$query .= ' AND rec_ope = "Não" AND rec_staf = "Não" AND pag_ope="Não" AND pag_staf ="Não" '; break;
case '2' : 
$query .= ' AND rec_ope = "Não" AND rec_staf="Não" '; break;
case '3' : 
$query .= ' AND rec_ope = "Não" '; break;
case '4' : 
$query .= ' AND rec_ope="Não" '; break;
case '5' : 
$query .= ' AND pag_ope="Sim" AND pag_staf ="Sim" '; break;
case '6' : 
$query .= ' AND pag_ope="Sim" '; break;
case '7' : 
$query .= ' AND pag_staf ="Sim" '; break;
case '8' : 
$query .= ' AND cobrar_operador !="0" AND cobrar_operador !="" '; break;
}
}

/*FILTRO POR DATAS */
elseif (isset($_POST['di']) && isset($_POST['df'])){
$di = trim($_POST['di']);
$df = trim($_POST['df']);
$query .= ' AND hrs >= '.$di.' AND hrs <= '.$df.' ';
}

/*FILTRO NA DATA */
elseif (isset($_POST['dd'])){
$date_array=explode('/',trim($_POST['dd']));
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$query .= ' AND data_servico = '.$dd.' ';
}

/*FILTRO POR OPERADOR E STAFF */
elseif (isset($_POST['sn']) && isset($_POST['on'])){
$sn = trim($_POST['sn']);
$on = trim($_POST['on']);
$query .= ' AND staff LIKE "%'.$sn.'%" AND operador LIKE "%'.$on.'%" ';
}

/*FILTRO POR OPERADOR */
elseif (isset($_POST['on'])){
$on = trim($_POST['on']);
$query .= ' AND operador LIKE "%'.$on.'%"';
}

/*FILTRO POR STAFF */
elseif (isset($_POST['sn'])){
$sn = trim($_POST['sn']);
$query .= ' AND staff LIKE "%'.$sn.'%"';
}


$query .= ' ORDER BY hrs';

$result = mysqli_query($conn, $query);
if($result){
	while($obj = mysqli_fetch_object($result)) {
	$search[] = $obj;}
	echo json_encode($search);
}

else {
echo json_encode($search);
}


break;

/*PESQUISA DE SERVIÇO POR ID PARA EDIÇÃO*/
case '7':
if(isset ($_POST['id'])){
$obter_data='';
$id = $_POST['id'];

  $obter_data = "SELECT *  FROM excel WHERE referencia LIKE '$id' OR id LIKE '$id' ORDER BY hrs";
  $result = mysqli_query($conn, $obter_data);
  if($result){
	while($obj = mysqli_fetch_object($result))
        {
	 $search[] = $obj;
        }
	echo json_encode($search);
   }
   else {
    echo json_encode($search);
  }
}
break;

/*EDITAR CAMPOS DO RELATÓRIO SERVIÇOS*/
case '8':
	$fields=array('data_servico','hrs','staff','servico','estado','voo','nome_cl','local_recolha','local_entrega','ponto_referencia','px','cr','bebe','obs','operador','ticket','cobrar_operador','rec_ope','cobrar_direto','rec_staf','cmx_op','pag_ope','cmx_st','pag_staf');
	$query='UPDATE excel SET ';
	for($i=1;$i<25;$i++){
		$index = 'col_'.$i.'_'.$_POST['id'];
		if($i===1){
			$mydate = trim($_POST[$index]);
			$date_array=explode('/',trim($_POST[$index]));
			$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
			$query.= $fields[$i-1].'='."'".$date."'";
		}
		elseif($i==2){
            $horas = trim($_POST[$index]);
			$timeok = $date_array[2].'-'.$date_array[1].'-'.$date_array[0]." ".$horas;
			$query.= $fields[$i-1].'='."'".strtotime($timeok)."'";		
		}else{
			$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
		}
		if($i!=24)
			$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	mysqli_query($conn,$query);
	$result = mysqli_query($conn,$query);

/*SE SUCESSO NA ALTERAÇÃO ENVIA DADOS DO REGISTO E SUBSTITUI NA RESPECTIVA ID COLUNA */
	if ($result){
	$get_reg=" SELECT * FROM excel WHERE id ='{$_POST['id']}'";
	$result_ = mysqli_query($conn, $get_reg);
	if ($result_){
	while($obj = mysqli_fetch_object($result_)) {
	$var[] = $obj;}
	echo json_encode($var);
	}
}
break;

case '9':
$response = 1;

/*OBTER CAMPOS DO SERVIÇO A FECHAR*/

$id = $_POST['id'];

$sql=" SELECT operador,cobrar_operador,staff,cobrar_direto,px,cr,bebe,nid FROM excel WHERE id = '{$_POST['id']}'";
  $result = mysqli_query($conn,$sql);

  if (mysqli_num_rows($result) > 0)
  {  
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

if ($staff)
{
  $sql_cmx_st=" SELECT comissao,tipo,grupo FROM pr_admin WHERE equipa = '$staff'";
  $result = mysqli_query($conn,$sql_cmx_st);
  if (mysqli_num_rows($result) > 0)
  {
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
if ($operador)
{
  $sql_cmx_op=" SELECT comissao,tipo FROM operador WHERE nome = '$operador'";
  $result = mysqli_query($conn,$sql_cmx_op);
  if (mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $com_op = $row["comissao"];
      $tp_com_op = $row["tipo"];
    }
  $response .=1; 
  }
  else $response .= 0;
}

/*SERVIÇOS COM VALOR EM A COBRAR OPERADOR*/

if ($cob_ope)

valuesInputs($cob_ope,$id,$tp_com_op,$tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid);

else if ($cob_dir) 

valuesInputs($cob_dir,$id,$tp_com_op, $tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid);
/*
else 
valuesInputs('0',$id,$tp_com_op, $tp_com_st, $com_op, $com_st,$tot_pax,$grupo_st,$nid);
*/
echo $response;
break;


/*EDITAR CAMPOS DO RELATÓRIO SERVIÇOS*/
case '10':
	$fields=array('data_servico','hrs','staff','servico','voo','px','cr','bebe','local_recolha','local_entrega','ponto_referencia','nome_cl','estado','end','obs','operador','referencia','ticket','cobrar_operador','cobrar_direto');
	$query='UPDATE excel SET ';
	for($i=1;$i<21;$i++){
		$index = 'col_'.$i.'_'.$_POST['id'];
		if($i===1){
			$mydate = trim($_POST[$index]);
			$date_array=explode('/',trim($_POST[$index]));
			$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
			$query.= $fields[$i-1].'='."'".$date."'";
		}
		elseif($i===2){
            $horas = trim($_POST[$index]);
			$timeok = $date_array[2].'-'.$date_array[1].'-'.$date_array[0]." ".$horas;
			$query.= $fields[$i-1].'='."'".strtotime($timeok)."'";		
		}else{
			$query.= $fields[$i-1].'='."'{$_POST[$index]}'";
		}
		if($i!=20)
			$query.=',';
	}
	$query.=" WHERE id='{$_POST['id']}'";
	mysqli_query($conn,$query);
	$result = mysqli_query($conn,$query);

/*SE SUCESSO NA ALTERAÇÃO ENVIA DADOS DO REGISTO E SUBSTITUI NA RESPECTIVA ID COLUNA */

	if ($result){
	$get_reg=" SELECT * FROM excel WHERE id ='{$_POST['id']}'";
	$result_ = mysqli_query($conn, $get_reg);
	if ($result_){
	while($obj = mysqli_fetch_object($result_)) {
	$var[] = $obj;}
	echo json_encode($var);
	}
}
break;


/*CHECK PARA SIM OU NÃO RECEBIDO DO OPERADOR*/
case '11':
$vl =  $_POST['vl'];
$id =  $_POST['id'];
 $sql_checks=" UPDATE excel SET rec_ope = '$vl' WHERE id = $id ";
 $result = mysqli_query($conn,$sql_checks);
  if ($result)
  $response .= 1;
else  
  $response .= 0;
echo $response;
break;


/*CHECK PARA SIM OU NÃO RECEBIDO DO STAFF*/
case '12':
$vl =  $_POST['vl'];
$id =  $_POST['id'];
 $sql_checks=" UPDATE excel SET rec_staf = '$vl' WHERE id = $id ";
 $result = mysqli_query($conn,$sql_checks);
  if ($result)
  $response .= 1;
else  
  $response .= 0;
echo $response;
break;

/*CHECK PARA SIM OU NÃO PAGO A OPERADOR*/
case '13':
$vl =  $_POST['vl'];
$id =  $_POST['id'];
 $sql_checks=" UPDATE excel SET pag_ope = '$vl' WHERE id = $id ";
 $result = mysqli_query($conn,$sql_checks);
  if ($result)
  $response .= 1;
else  
  $response .= 0;
echo $response;
break;

/*CHECK PARA SIM OU NÃO PAGO A STAFF*/
case '14':
$vl =  $_POST['vl'];
$id =  $_POST['id'];
 $sql_checks=" UPDATE excel SET pag_staf = '$vl' WHERE id = $id ";
 $result = mysqli_query($conn,$sql_checks);
  if ($result)
  $response .= 1;
else  
  $response .= 0;
echo $response;
break;


/*NOVO REGISTO PROCURAR LOCAIS SE EXISTEM NA BD PARA ENVIO DA ID DO PRODUTO*/
case '15':
$pt1 =  $_POST['pt1'];
$pt2 =  $_POST['pt2'];
$id_oper = $_POST['id_oper'];
$pax = $_POST['total'];

$id_cat = $_POST['id_categoria'];


if ($_POST['horas']){
$periodo = explode(':',trim($_POST['horas']));
$isnoturno = $periodo[0]*60*60+$periodo[1]*60;
}
else $isnoturno = 0;


/*ENCONTRAR periodo noturno DO PRODUTO*/
$sql=" SELECT noturno FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$noturno = $row['noturno'];
 }
}


if($noturno){
 $n = explode(',',trim($noturno));
 $isnoturno <= $n[1] || $isnoturno >= $n[0] && $n[0] != $n[1] ? $g = 'operador_noturno' : $g = 'operador_precos';
}


/*ENCONTRAR ID DO PRODUTO*/
$sql=" SELECT id,duracao FROM locais WHERE cat = $id_cat AND (local='$pt1' AND local_fim = '$pt2' OR local_fim='$pt1' AND local= '$pt2') LIMIT 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$prod_id = $row["id"];
$duracao = $row["duracao"];
 }
}


if (isset($prod_id)){
$sql=" SELECT id FROM classe_prods WHERE cat = $id_cat AND min <= $pax AND max >= $pax LIMIT 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$label_id = $row["id"];
 }
} 
}

/*ID PRODUTO E ID OPERADOR ID LABEL PRECOS DIA */
if (isset($label_id) ){
$sql= " SELECT valor FROM $g WHERE id_operador = $id_oper AND prod_id = $prod_id AND id_label = $label_id AND id_categoria = $id_cat";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
 $valor = $row["valor"];
 }
} 
}



if ($duracao || $valor ){
$hours = floor($duracao / 3600);
$mins = floor($duracao  / 60 % 60);
$secs = floor($duracao  % 60);
$duracao = sprintf('%02d:%02d', $hours, $mins);
}

$r=array('success'=>1 ,'valor'=>$valor, 'duracao'=>$duracao,'nid'=>$prod_id."-".$id_cat);

echo json_encode($r);
break;

case '16':
$date=strtotime(date("Y-m-d").'-00');

$sql = " SELECT count(*) AS total FROM excel WHERE data_servico = $date;";
$sql .= "SELECT count(*) AS clo FROM excel WHERE data_servico = $date AND estado = 'Fechado';";
$sql .= "SELECT count(*) AS opp FROM excel WHERE data_servico >= $date AND estado ='Pendente' AND criado_direto = '2';";
$sql .= "SELECT count(*) AS opc FROM excel WHERE data_servico >= $date AND estado ='Cancelado' AND criado_direto = '2';";
$sql .= "SELECT count(*) AS ljn FROM excel WHERE data_servico >= $date AND criado_direto != '0' AND criado_direto != '1' AND criado_direto != '2' AND estado ='Pendente';";
$sql .= "SELECT count(*) AS nost FROM excel WHERE data_servico = $date AND estado !='Fechado' AND (staff is null or staff = '')";

if (mysqli_multi_query($conn,$sql))
{
  do
    {
    if ($result=mysqli_store_result($conn)) {
      while ($row=mysqli_fetch_row($result))
        {
        $arr[]=$row[0];
        }
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($conn));
}
echo json_encode($arr);

break;



case '17':
   $date=strtotime(date("Y-m-d").'-00');
   $sql = "SELECT * FROM excel WHERE data_servico >= $date AND estado ='Pendente' AND criado_direto = '2'";
   $result = mysqli_query($conn, $sql); 
     if ($result){
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
     echo json_encode($var);
    }
break;


case '18':
   $date=strtotime(date("Y-m-d").'-00');
   $sql = "SELECT * FROM excel WHERE data_servico >= $date AND estado ='Cancelado' AND criado_direto = '2'";
   $result = mysqli_query($conn, $sql); 
     if ($result){
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
     echo json_encode($var);
    }
break;



case '19':
   $sql = "SELECT * FROM locais_frequentes WHERE 1 ORDER BY nome";
   $result = mysqli_query($conn, $sql); 
     if ($result){
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
     echo json_encode($var);
    }
break;

case '20':

$id = $_POST['id'];

$date_array = explode('/',trim($_POST['data_servico']));
$data_servico = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$horas = $_POST['hrs'];
$hrs = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas);
$servico = $_POST['servico'];
$referencia = $_POST['referencia'];
$staff = $_POST['staff'];
$matricula = str_replace("-","",$_POST['matricula']);
$estado = $_POST['estado'];
$parsed = date_parse($_POST['end']);
$end = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];

$operador = $_POST['operador'];
$ticket = $_POST['ticket'];

$nome_cl = $_POST['nome_cl'];
$email = $_POST['email'];
$pais = $_POST['pais'];
$telefone = $_POST['telefone'];
$px = $_POST['px'];
$cr = $_POST['cr'];
$bebe = $_POST['bebe'];

$voo = $_POST['voo'];

if ($_POST['voo_horario'] !=0 || $_POST['voo_horario']){
$dt_flight = explode(' ',trim($_POST['voo_horario']));
$dt_flight_d = explode('/',trim($dt_flight[0]));
$voo_horario = strtotime($dt_flight_d[2].'-'.$dt_flight_d[1].'-'.$dt_flight_d[0].' '.$dt_flight[1]);
}
else $voo_horario = 0;

$local_recolha =  $_POST['local_recolha'];
$morada_recolha_gps = $_POST['morada_recolha_gps'];
$morada_recolha = $_POST['morada_recolha'];
$local_entrega =  $_POST['local_entrega'];
$morada_entrega_gps = $_POST['morada_entrega_gps'];
$morada_entrega = $_POST['morada_entrega'];
$obs = $_POST['obs'];
$ponto_referencia = $_POST['ponto_referencia'];

$cobrar_operador = $_POST['cobrar_operador'];
$cobrar_direto = $_POST['cobrar_direto'];
$cmx_op = $_POST['cmx_op'];
$cmx_st = $_POST['cmx_st'];

$sql =" UPDATE excel SET data_servico= $data_servico, hrs=$hrs, servico='$servico',referencia = '$referencia',staff = '$staff',matricula='$matricula',estado='$estado', end = $end, operador = '$operador',ticket = '$ticket',
nome_cl = '$nome_cl', email = '$email',pais = '$pais',telefone = '$telefone',px = $px,cr = $cr, bebe = $bebe,
voo = '$voo',voo_horario = $voo_horario,local_recolha = '$local_recolha',morada_recolha_gps = '$morada_recolha_gps',
morada_recolha = '$morada_recolha',local_entrega = '$local_entrega',morada_entrega_gps = '$morada_entrega_gps',
morada_entrega = '$morada_entrega',obs = '$obs',ponto_referencia ='$ponto_referencia',cobrar_operador = '$cobrar_operador',cobrar_direto = '$cobrar_direto', cmx_op = '$cmx_op',cmx_st ='$cmx_st' WHERE id = $id";

 $result = mysqli_query($conn,$sql);
  if ($result)
  echo 1;
else  
  echo 0;
break;


case '21':

$op = $_POST['op'];

$date=strtotime(date("Y-m-d").'-00');

$sql = " SELECT count(*) AS total FROM excel WHERE data_servico = $date AND operador = '$op';";
$sql .= "SELECT count(*) AS opp FROM excel WHERE data_servico >= $date AND estado ='Pendente' AND operador = '$op'";

if (mysqli_multi_query($conn,$sql))
{
  do
    {
    if ($result=mysqli_store_result($conn)) {
      while ($row=mysqli_fetch_row($result))
        {
        $arr[]=$row[0];
        }
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($conn));
}
echo json_encode($arr);

break;

case '22':
   $date=strtotime(date("Y-m-d").'-00');
$sql = "SELECT * FROM excel WHERE data_servico >= $date AND criado_direto != '0' AND criado_direto != '1' AND criado_direto != '2' AND estado ='Pendente' ORDER BY hrs";

   $result = mysqli_query($conn, $sql); 
     if ($result){
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
     echo json_encode($var);
    }
break;

case '23':
    $err='';
    if (!$_POST['data_servico'])
      $err .= "- Data Serviço <span class='w3-text-red'> *</span><br>";
    else{
      $date_array=explode('/',trim($_POST['data_servico']));
      $data_servico=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
    }

    if ($_POST['hrs']){
      $horas = trim($_POST['hrs']); 
      $hrs = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas);
    }
    else
      $hrs = $data_servico;

    $staff = $_POST['staff'];
    $servico = $_POST['servico'];
    $referencia = $_POST['referencia'];
    if ($_POST['matricula'])
      $matricula = str_replace('-','',$_POST['matricula']);
    else
      $matricula = '';

    if ($_POST['duracao']){
      $dur=explode(':',trim($_POST['duracao']));
      $end = $dur[0]*60*60 + $dur[1]*60;
    }
    else
    $end = 0;

    if (!$_POST['operador'])
      $err .= "- Operador <span class='w3-text-red'> *</span><br>";
    else
      $operador = $_POST['operador'];
      $ticket = $_POST['ticket'];

      $nome = $_POST['nome_cl'];
      $email = $_POST['email']; 
      $pais = $_POST['pais'];
      $tel = $_POST['tel'];

      if(!$_POST['px'])
        $err .= "- Adultos<span class='w3-text-red'> *</span><br>";
      else 
      {
        if (!filter_var($_POST['px'], FILTER_VALIDATE_INT) === false ) {
          $px = $_POST['px'];
        }
        else {
          $err .= "- Adultos, valor inválido<br>";
        }
      }
     
      $cr = $_POST['cr'];
      $bebe = $_POST['bebe'];

      $local_recolha = $_POST['local_recolha'];
      $morada_recolha = $_POST['morada_recolha'];
      $morada_recolha_gps = $_POST['morada_recolha_gps'];

      $voo = $_POST['voo'];
  
      if ($_POST['voo_horario']){
        $cdt = explode(' ',trim($_POST['voo_horario']));
        $cd = explode('/',trim($cdt[0]));
        $voo_horario = strtotime($cd[2].'-'.$cd[1].'-'.$cd[0].' '.$cdt[1]);
      }

      else  $voo_horario = 0;

      $local_entrega = $_POST['local_entrega'];
      $morada_entrega = $_POST['morada_entrega'];
      $morada_entrega_gps = $_POST['morada_entrega_gps'];
      $ponto_referencia = $_POST['ponto_referencia'];
      $obs = $_POST['obs'];

      $cobrar_operador = $_POST['cobrar_operador'];
      $cobrar_direto = $_POST['cobrar_direto'];

      $cmx_st = $_POST['cmx_st'];
      $cmx_op = $_POST['cmx_op'];
      $criado_em = $_POST['criado_em'];
      $created_by = $_POST['created_by'].'@'.date("d/m/Y H:i:s");

if (!$err) {

$sql =" INSERT INTO excel (data_servico,hrs,staff,servico,referencia,matricula,estado,end,operador,ticket,nome_cl,email,pais,telefone,px,cr,bebe,
local_recolha,morada_recolha,morada_recolha_gps,voo,voo_horario,local_entrega,morada_entrega,morada_entrega_gps,ponto_referencia,obs,cmx_st,criado_direto,created_by,cmx_op, cobrar_direto,cobrar_operador)
VALUES
($data_servico,$hrs,'$staff','$servico','$referencia','$matricula','Pendente',$end,'$operador','$ticket','$nome','$email','$pais','$tel','$px','$cr','$bebe','$local_recolha','$morada_recolha','$morada_recolha_gps','$voo',$voo_horario,'$local_entrega','$morada_entrega','$morada_entrega_gps','$ponto_referencia','$obs','$cmx_st', '$criado_em','$created_by','$cmx_op','$cobrar_direto','$cobrar_operador')";

$result = mysqli_query($conn,$sql);
  if ($result) {
    $response = 1; 
    $last_id = mysqli_insert_id($conn);
  }  
  else {
    $response = 0;
    $last_id = 0; 
  }

  $r=array('error'=>'','success' => $response,'id' => $last_id);
  echo json_encode($r);
 }
 else{
  $r = array('error' =>$err, 'success' =>'','id' =>'');
  echo json_encode($r);
}
break;

case '24':
    $err='';
    if (!$_POST['data_servico'])
      $err .= "- Data Serviço <span class='w3-text-red'> *</span><br>";
    else{
      $date_array=explode('/',trim($_POST['data_servico']));
      $data_servico=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
    }

    if ($_POST['hrs']){
      $horas = trim($_POST['hrs']); 
      $hrs = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas);
    }
    else
      $hrs = $data_servico;

    $staff = $_POST['staff'];
    $servico = $_POST['servico'];
    $referencia = $_POST['referencia'];
    if ($_POST['matricula'])
      $matricula = str_replace('-','',$_POST['matricula']);
    else
      $matricula = '';

    if ($_POST['duracao']){
      $dur=explode(':',trim($_POST['duracao']));
      $end = $dur[0]*60*60 + $dur[1]*60;
    }
    else
    $end = 0;

    if (!$_POST['operador'])
      $err .= "- Operador <span class='w3-text-red'> *</span><br>";
    else
      $operador = $_POST['operador'];
      $ticket = $_POST['ticket'];

      $nome = $_POST['nome_cl'];
      $email = $_POST['email']; 
      $pais = $_POST['pais'];
      $tel = $_POST['tel'];

      if(!$_POST['px'])
        $err .= "- Adultos<span class='w3-text-red'> *</span><br>";
      else 
      {
        if (!filter_var($_POST['px'], FILTER_VALIDATE_INT) === false ) {
          $px = $_POST['px'];
        }
        else {
          $err .= "- Adultos, valor inválido<br>";
        }
      }
     
      $cr = $_POST['cr'];
      $bebe = $_POST['bebe'];

      $local_recolha = $_POST['local_entrega'];
      $morada_recolha = $_POST['morada_entrega'];
      $morada_recolha_gps = $_POST['morada_entrega_gps'];

      $local_entrega = $_POST['local_recolha'];
      $morada_entrega = $_POST['morada_recolha'];
      $morada_entrega_gps = $_POST['morada_recolha_gps'];


      $ponto_referencia = $_POST['ponto_referencia'];

      $obs = $_POST['obs'];

       $voo = $_POST['voo'];
  
      if ($_POST['voo_horario']){
        $cdt = explode(' ',trim($_POST['voo_horario']));
        $cd = explode('/',trim($cdt[0]));
        $voo_horario = strtotime($cd[2].'-'.$cd[1].'-'.$cd[0].' '.$cdt[1]);
      }

      else  $voo_horario = 0;

      $cobrar_operador = $_POST['cobrar_operador'];
      $cobrar_direto = $_POST['cobrar_direto'];

      $cmx_st = $_POST['cmx_st'];
      $cmx_op = $_POST['cmx_op'];
      $criado_em = $_POST['criado_em'];
      $created_by = $_POST['created_by'].'@'.date("d/m/Y H:i:s");

if (!$err) {

$sql =" INSERT INTO excel (data_servico,hrs,staff,servico,referencia,matricula,estado,end,operador,ticket,nome_cl,email,pais,telefone,px,cr,bebe,
local_recolha,morada_recolha,morada_recolha_gps,voo,voo_horario,local_entrega,morada_entrega,morada_entrega_gps,ponto_referencia,obs,cmx_st,criado_direto,created_by,cmx_op, cobrar_direto,cobrar_operador)
VALUES
($data_servico,$hrs,'$staff','$servico','$referencia','$matricula','Pendente',$end,'$operador','$ticket','$nome','$email','$pais','$tel','$px','$cr','$bebe','$local_recolha','$morada_recolha','$morada_recolha_gps','$voo',$voo_horario,'$local_entrega','$morada_entrega','$morada_entrega_gps','$ponto_referencia','$obs','$cmx_st', '$criado_em','$created_by','$cmx_op','$cobrar_direto','$cobrar_operador')";

$result = mysqli_query($conn,$sql);
  if ($result) {
    $response = 1; 
    $last_id = mysqli_insert_id($conn);
  }  
  else {
    $response = 0;
    $last_id = 0; 
  }

  $r=array('error'=>'','success' => $response,'id' => $last_id);
  echo json_encode($r);
 }
 else{
  $r = array('error' =>$err, 'success' =>'','id' =>'');
  echo json_encode($r);
}
break;


case '25': 

$id = $_POST['operador'];

/*APENAS TIPO TABELA PODE RECEBER CATEGORIAS PARA SELECCIONAR NOVO REGISTO*/

  $sql=" SELECT tipo FROM operador WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $tipo = $row['tipo'];

if (preg_match("/Tabela/i", $tipo)) {

  $sql=" SELECT id_categoria FROM operador_tab_calc WHERE id_operador = $id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   $ar=array();
   while($row = mysqli_fetch_assoc($result)){
     array_push($ar,$row['id_categoria']);
   }
} 
 
$l = count($ar);

if($l > 0){

   for($i=0;$i<$l;$i++){
    $sql=" SELECT id, nome FROM categoria_prods WHERE id = $ar[$i]";
    $result = mysqli_query($conn, $sql);
    if ($result){
       while($row = mysqli_fetch_assoc($result)){
         $r[]= array('id'=>$row['id'],'nome' => $row['nome']);
       }
     }
    }
 }
}



echo json_encode($r);
break;

/*TODOS CAMPOS CLIENTES PARA NOVO SERVIÇO NO AUTOCOMPLETE*/

case '26':
$sql=" SELECT nome AS value, email AS label, pais, telefone FROM clientes WHERE 1 ORDER BY nome";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);

break;

/*TODAS AS CLASSES DA CATEGORIA SELECCIONADA*/
case '27':

$cat = $_POST['cat'];
$sql=" SELECT id, nome FROM classe_prods WHERE cat = $cat ORDER BY nome";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;
}
echo json_encode($var);
break;





/*NOVO REGISTO PROCURAR LOCAIS SE EXISTEM NA BD PARA ENVIO DA ID DO PRODUTO*/
case '28':

$pt1 =  $_POST['pt1'];
$pt2 =  $_POST['pt2'];
$id_oper = $_POST['id_oper'];
$id_cat = $_POST['id_categoria'];
$id_class = $_POST['id_class'];

if ($_POST['horas']){
$periodo = explode(':',trim($_POST['horas']));
$isnoturno = $periodo[0]*60*60+$periodo[1]*60;
}
else $isnoturno = 0;

/*ENCONTRAR periodo noturno DO PRODUTO*/
$sql=" SELECT noturno FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$noturno = $row['noturno'];
 }
}


if($noturno){
 $n = explode(',',trim($noturno));
 $isnoturno <= $n[1] || $isnoturno >= $n[0] && $n[0] != $n[1] ? $g = 'operador_noturno' : $g = 'operador_precos';
}


/*ENCONTRAR ID DO PRODUTO*/
$sql=" SELECT id,duracao FROM locais WHERE cat = $id_cat AND (local='$pt1' AND local_fim = '$pt2' OR local_fim='$pt1' AND local= '$pt2') LIMIT 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
  $prod_id = $row["id"];
  $duracao = $row["duracao"];
 }
}


$sql= " SELECT valor FROM $g WHERE id_operador = $id_oper AND prod_id = $prod_id AND id_label = $id_class AND id_categoria = $id_cat";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
 $valor = $row["valor"];
 }
} 




if ($duracao || $valor ){
$hours = floor($duracao / 3600);
$mins = floor($duracao  / 60 % 60);
$secs = floor($duracao  % 60);
$duracao = sprintf('%02d:%02d', $hours, $mins);
}

$r=array('success'=>1 ,'valor'=>$valor, 'duracao'=>$duracao,'nid'=>$prod_id."-".$id_cat);

echo json_encode($r);
break;



}
mysqli_close($conn);

?>



