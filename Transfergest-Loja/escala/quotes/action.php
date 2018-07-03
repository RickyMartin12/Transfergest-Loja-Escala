<?php

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require_once '../connect.php';
global $conn;
switch ($_POST['action']){


/*APRESENTAR CAMPOS NOS SELECT CLIENTE*/
case '7':
	$var = array();
        $sql="SELECT local AS local FROM locais UNION SELECT local_fim FROM locais WHERE pax_1 IS NOT NULL AND pax_2 IS NOT NULL AND pax_3 AND pax_4 IS NOT NULL  IS NOT NULL ORDER BY local ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);break;

/*APRESENTAR RESULTADO PESQUISA CLIENTE*/
case '8':
$l1 = $_POST['l1'];
$l2 = $_POST['l2'];

if($_POST['tp'] == '1') {
	$sql = "SELECT pax_1 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
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
	$sql = "SELECT pax_2 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
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
	$sql = "SELECT pax_3 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
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
	$sql = "SELECT pax_4 from locais WHERE local = '$l1' AND local_fim = '$l2' OR local = '$l2' AND local_fim = '$l1' ";
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

if ($_POST['r'] == 1){
$sql = "SELECT desconto from companhia";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	 while($row = mysqli_fetch_assoc($result)) {
    		$discount = $row["desconto"];
    	 }
        }
if($discount != 0){
$response = 2*($response*(1-($discount/100))); 
}
else $response=2*$response;
}

if ($_POST['r'] == 0){
$sql = "SELECT desconto from companhia";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	 while($row = mysqli_fetch_assoc($result)) {
    		$discount = $row["desconto"];
    	 }
        }
if($discount != 0){
$response = $response*(1-($discount/100));
}
else $response; 
}

echo $response; 

break;

/*NOVO TRANSFER*/
case '9':
if($_POST['local_recolha'] == 'Faro Airport') $servico = 'Chegada';
if($_POST['local_entrega'] == 'Faro Airport') $servico = 'Partida';
$success='';
$date_array=explode('/',trim($_POST['dia-recolha']));
$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$horas=trim($_POST['hora-recolha']); 
$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0]." ".$horas);
        $staff = 'A definir';
        $voo = $_POST['voo-n'];
        $nome_cl = ucfirst($_POST['name-n']);
        $local_recolha = $_POST['local_recolha'];
        $local_entrega = $_POST['local_entrega'];
        $px = $_POST['px'];
        $operador = 'Direto';
        $cobrar_direto = $_POST['value'];
        $estado = 'Aguarda';
        $obs = 'Pagamento:' .$_POST['payment'].' Obs:' .$_POST['obs-n'];
        $email=$_POST['email-n'];
	$telefone=$_POST['phone-n'];
        $pais= $_POST['pais'];
        $referencia = dechex(round(microtime(true)));
        $cobrar_operador = '';

$registry_new="INSERT INTO excel
(data_servico,staff,hrs,servico,voo,nome_cl,local_recolha,local_entrega,px,obs,operador,cobrar_direto,estado,referencia,email,telefone,pais,cobrar_operador)
VALUES
($date,'$staff',$timeok,'$servico','$voo','$nome_cl','$local_recolha','$local_entrega','$px','$obs','$operador','$cobrar_direto','$estado','$referencia','$email','$telefone','$pais','$cobrar_operador')";

if (mysqli_query($conn, $registry_new)) {
    $last_id = mysqli_insert_id($conn);
    $success = '#FF'.$last_id.'/'.$referencia;
}
else  $success = 20;


/* NOVO TRANSFER COM RETORNO*/
if($_POST['return'] == 1){
$date_array=explode('/',trim($_POST['dia-retorno']));
$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$horas=trim($_POST['hora-retorno']); 
$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0]." ".$horas);

if($_POST['local_entrega'] == 'Faro Airport') $servico = 'Chegada';
if($_POST['local_recolha'] == 'Faro Airport') $servico = 'Partida';
       $staff = 'A definir';
        $voo = $_POST['voo-n'];
        $nome_cl = ucfirst($_POST['name-n']);
        $local_recolha = $_POST['local_recolha'];
        $local_entrega = $_POST['local_entrega'];
        $px = $_POST['px'];
        $operador = 'Direto';
        $cobrar_direto = '0';
        $estado = 'Aguarda';
        $obs = 'Pagamento:' .$_POST['payment'].' Obs:' .$_POST['obs-n'];
        $email=$_POST['email-n'];
	$telefone=$_POST['phone-n'];
        $pais= $_POST['pais'];
        $referencia = dechex(round(microtime(true)));
        $cobrar_operador = '';
       $registry_two="INSERT INTO excel
(data_servico,staff,hrs,servico,voo,nome_cl,local_recolha,local_entrega,px,obs,operador,cobrar_direto,estado,referencia,email,telefone,pais,cobrar_operador)
VALUES
($date,'$staff',$timeok,'$servico','$voo','$nome_cl','$local_recolha','$local_entrega','$px','$obs','$operador','$cobrar_direto','$estado','$referencia','$email','$telefone','$pais','$cobrar_operador')";
    if (mysqli_query($conn, $registry_two)) {
    $last_id = mysqli_insert_id($conn);
    $success .= 'F##'.$last_id.'/'.$referencia;
}
else  $success = 20;
}

/* ENVIAR EMAILS PARA CLIENTE E FORNECEDOR SOBRE TIPO DE PAGAMENTO*/
if ($_POST['payment'] =='Ao Motorista' && $_POST['return'] == 0){

$sql_admin=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql_admin);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
    $ad_nome = $row["nome"];
    $ad_morada = $row["morada"];
    $ad_cod_postal = $row["cod_postal"];
    $ad_tel = $row["tel"];
    $ad_tlm = $row["tlm"];
    $ad_mail = $row["email"];
    $ad_site = $row["site"];
    $ad_nif = $row["nif"];
    $ad_iban = $row["iban"];
    $ad_desconto = $row["desconto"];
    }
  }


if ($ad_mail){
$phone = $_POST['phone-n'];
$dia_rec = $_POST['dia-recolha'];
$hora_rec = $_POST['hora-recolha'];
$email_cl = $_POST['email-n'];
$pick_up = $_POST['local_recolha'];
$delivery = $_POST['local_entrega'];
$pay_type = $_POST['payment'];
$obsrv = $_POST['obs-n'];

$payment = number_format((float)$_POST['value'], 2, '.', '').'€'; 
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: <'.$ad_mail.'>' . "\r\n";
$headers .= 'Cc: noreply' . "\r\n";

$email_subject_client ="Hello ".$nome_cl.", your transfer details can be seen below:";

$email_body_to_client='
<h3>Main:</h3>
<p>
<strong>Name: </strong> '.$nome_cl.'<br>
<strong>Passengers: </strong> '.$px.'<br>
<strong>Fly nr: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Phone: </strong> '.$phone.'<br>
<strong>Return: </strong> No<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Pick-Up:</h3>
<p>
<strong>Ticket ID: </strong> '.$id.'<br>
<strong>Date: </strong>'.$dia_rec.'<br>
<strong>Hour: </strong>'.$hora_rec.'<br>
<strong>From: </strong> '.$pick_up.'<br>
<strong>To: </strong> '.$delivery.'</p>
<hr>
<h3>Payment:</h3>
<p>
<strong>Type: </strong> To Driver<br>
<strong>Total: </strong> '.$payment.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';

$email_subject_supplier ='Olá '.$ad_nome.', recebeu um novo transfer, pode ver os detalhes abaixo:';

$email_body_to_supplier ='
<h3>Dados:</h3>
<p>
<strong>Nome: </strong> '.$nome_cl.'<br>
<strong>Passageiros: </strong> '.$px.'<br>
<strong>Voo nº: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Telefone: </strong> '.$phone.'<br>
<strong>Retorno: </strong> Não<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Recolha:</h3>
<p>
<strong>Transfer ID: </strong> '.$id.'<br>
<strong>Data: </strong>'.$dia_rec.'<br>
<strong>Hora: </strong>'.$hora_rec.'<br>
<strong>Recolha: </strong> '.$pick_up.'<br>
<strong>Entrega: </strong> '.$delivery.'</p>
<hr>
<h3>Pagamento:</h3>
<p>
<strong>Tipo: </strong> Ao Motorista<br>
<strong>Total: </strong> '.$payment.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';

     mail($email_cl,$email_subject_client,$email_body_to_client,$headers);
     mail($ad_mail,$email_subject_supplier,$email_body_to_supplier,$headers);
}
}


/* ENVIAR EMAILS PARA CLIENTE E FORNECEDOR SOBRE TIPO DE PAGAMENTO*/
if ($_POST['payment'] =='Ao Motorista' && $_POST['return'] == 1){
$sql_admin=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql_admin);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
    $ad_nome = $row["nome"];
    $ad_morada = $row["morada"];
    $ad_cod_postal = $row["cod_postal"];
    $ad_tel = $row["tel"];
    $ad_tlm = $row["tlm"];
    $ad_mail = $row["email"];
    $ad_site = $row["site"];
    $ad_nif = $row["nif"];
    $ad_iban = $row["iban"];
    $ad_desconto = $row["desconto"];
    }
  }

if ($ad_mail){

$phone = $_POST['phone-n'];
$dia_rec = $_POST['dia-recolha'];
$hora_rec = $_POST['hora-recolha'];
$email_cl = $_POST['email-n'];
$pick_up = $_POST['local_recolha'];
$delivery = $_POST['local_entrega'];
$pay_type = $_POST['payment'];
$obsrv = $_POST['obs-n'];

$voo = $_POST['voo-n'];

$dia_ret = $_POST['dia-retorno'];
$hora_ret =  $_POST['hora-retorno'];
$pt_ref = $_POST['pt_referencia'];
$pick_up_ret = $_POST['local_entrega'];
$delivery_ret = $_POST['local_recolha'];
$idret = $id+1;

$payment = number_format((float)$_POST['value'], 2, '.', '').'€'; 
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: <'.$ad_mail.'>' . "\r\n";
$headers .= 'Cc: noreply' . "\r\n";

$email_subject_client ="Hello ".$nome_cl.", your Transfer details can be seen below:";

$email_body_to_client='
<h3>Main:</h3>
<p>
<strong>Name: </strong> '.$nome_cl.'<br>
<strong>Passengers: </strong> '.$px.'<br>
<strong>Fly nr: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Phone: </strong> '.$phone.'<br>
<strong>Return: </strong> Yes<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Pick-Up:</h3>
<p>
<strong>Ticket ID: </strong> '.$id.'<br>
<strong>Date: </strong>'.$dia_rec.'<br>
<strong>Hour: </strong>'.$hora_rec.'<br>
<strong>From: </strong> '.$pick_up.'<br>
<strong>To: </strong> '.$delivery.'</p>
<hr>
<h3>Return:</h3>
<p>
<strong>Ticket ID: </strong> '.$idret.'<br>
<strong>Date: </strong> '.$dia_ret.' <br>
<strong>Hour: </strong>'.$hora_ret.'<br>
<strong>Address: </strong>'.$pt_ref.'<br>
<strong>From: </strong>'.$pick_up_ret.'<br>
<strong>To: </strong>'.$delivery_ret.'</p>
<hr>
<h3>Payment:</h3>
<p>
<strong>Type: </strong> To Driver<br>
<strong>Total: </strong> '.$payment.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';


$email_subject_supplier ='Olá '.$ad_nome.', recebeu um novo transfer, pode ver os detalhes abaixo:';

$email_body_to_supplier ='
<h3>Dados:</h3>
<p>
<strong>Nome: </strong> '.$nome_cl.'<br>
<strong>Passageiros: </strong> '.$px.'<br>
<strong>Voo nº: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Telefone: </strong> '.$phone.'<br>
<strong>Retorno: </strong> Sim<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Recolha:</h3>
<p>
<strong>Transfer ID: </strong> '.$id.'<br>
<strong>Data: </strong>'.$dia_rec.'<br>
<strong>Hora: </strong>'.$hora_rec.'<br>
<strong>Recolha: </strong> '.$pick_up.'<br>
<strong>Entrega: </strong> '.$delivery.'</p>
<hr>
<h3>Retorno:</h3>
<p>
<strong>Transfer ID: </strong> '.$idret.'<br>
<strong>Data: </strong> '.$dia_ret.' <br>
<strong>Hora: </strong>'.$hora_ret.'<br>
<strong>Morada: </strong>'.$pt_ref.'<br>
<strong>Recolha: </strong>'.$pick_up_ret.'<br>
<strong>Entrega: </strong>'.$delivery_ret.'</p>
<hr>
<h3>Pagamento:</h3>
<p>
<strong>Tipo: </strong> Ao Motorista<br>
<strong>Total: </strong> '.$payment.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';

     mail($email_cl,$email_subject_client,$email_body_to_client,$headers);
     mail($ad_mail,$email_subject_supplier,$email_body_to_supplier,$headers);
}
}


/* ENVIAR EMAILS PARA CLIENTE E FORNECEDOR SOBRE TIPO DE PAGAMENTO*/
if ($_POST['payment'] =='Trans.Bancaria' && $_POST['return'] == 0){
$sql_admin=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql_admin);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
    $ad_nome = $row["nome"];
    $ad_morada = $row["morada"];
    $ad_cod_postal = $row["cod_postal"];
    $ad_tel = $row["tel"];
    $ad_tlm = $row["tlm"];
    $ad_mail = $row["email"];
    $ad_site = $row["site"];
    $ad_nif = $row["nif"];
    $ad_iban = $row["iban"];
    $ad_desconto = $row["desconto"];
    }
  }
if ($ad_mail){

$phone = $_POST['phone-n'];
$dia_rec = $_POST['dia-recolha'];
$hora_rec = $_POST['hora-recolha'];
$email_cl = $_POST['email-n'];
$pick_up = $_POST['local_recolha'];
$delivery = $_POST['local_entrega'];
$pay_type = $_POST['payment'];
$obsrv = $_POST['obs-n'];

$payment = number_format((float)$_POST['value'], 2, '.', '').'€';

$type = 'Please transfer the amount <strong>'.$payment.'</strong> to '.$ad_iban.', and send the <strong>confirmation to '.$ad_mail.'</strong>.<br>Thank you.';

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: <'.$ad_mail.'>' . "\r\n";
$headers .= 'Cc: noreply' . "\r\n";

$email_subject_client ="Hello ".$nome_cl.", your Transfer details can be seen below:";

$email_body_to_client='
<h3>Main:</h3>
<p>
<strong>Name: </strong> '.$nome_cl.'<br>
<strong>Passengers: </strong> '.$px.'<br>
<strong>Fly nr: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Phone: </strong> '.$phone.'<br>
<strong>Return: </strong> No<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Pick-Up:</h3>
<p>
<strong>Ticket ID: </strong> '.$id.'<br>
<strong>Date: </strong>'.$dia_rec.'<br>
<strong>Hour: </strong>'.$hora_rec.'<br>
<strong>From: </strong> '.$pick_up.'<br>
<strong>To: </strong> '.$delivery.'</p>
<hr>
<h3>Payment:</h3>
<p>
<strong>Type: </strong> Bank Transfer<br>
<strong>Total: </strong> '.$payment.'<br>
<strong>Conditions: </strong> '.$type.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';

$email_subject_supplier ='Olá '.$ad_nome.', recebeu um novo transfer, pode ver os detalhes abaixo:';
$email_body_to_supplier ='
<h3>Dados:</h3>
<p>
<strong>Nome: </strong> '.$nome_cl.'<br>
<strong>Passageiros: </strong> '.$px.'<br>
<strong>Voo nº: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Telefone: </strong> '.$phone.'<br>
<strong>Retorno: </strong> Não<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Recolha:</h3>
<p>
<strong>Transfer ID: </strong> '.$id.'<br>
<strong>Data: </strong>'.$dia_rec.'<br>
<strong>Hora: </strong>'.$hora_rec.'<br>
<strong>Recolha: </strong> '.$pick_up.'<br>
<strong>Entrega: </strong> '.$delivery.'</p>
<hr>
<h3>Pagamento:</h3>
<p>
<strong>Tipo: </strong> Trans.Bancaria<br>
<strong>Total: </strong> '.$payment.'</p>

<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';

     mail($email_cl,$email_subject_client,$email_body_to_client,$headers);
     mail($ad_mail,$email_subject_supplier,$email_body_to_supplier,$headers);
}
}

/* ENVIAR EMAILS PARA CLIENTE E FORNECEDOR SOBRE TIPO DE PAGAMENTO*/
if ($_POST['payment'] =='Trans.Bancaria' && $_POST['return'] == 1){
$sql_admin=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql_admin);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
    $ad_nome = $row["nome"];
    $ad_morada = $row["morada"];
    $ad_cod_postal = $row["cod_postal"];
    $ad_tel = $row["tel"];
    $ad_tlm = $row["tlm"];
    $ad_mail = $row["email"];
    $ad_site = $row["site"];
    $ad_nif = $row["nif"];
    $ad_iban = $row["iban"];
    $ad_desconto = $row["desconto"];
    }
  }

if ($ad_mail){

$phone = $_POST['phone-n'];
$dia_rec = $_POST['dia-recolha'];
$hora_rec = $_POST['hora-recolha'];
$email_cl = $_POST['email-n'];
$pick_up = $_POST['local_recolha'];
$delivery = $_POST['local_entrega'];
$pay_type = $_POST['payment'];
$obsrv = $_POST['obs-n'];

$voo = $_POST['voo-n'];

$dia_ret = $_POST['dia-retorno'];
$hora_ret =  $_POST['hora-retorno'];
$pt_ref = $_POST['pt_referencia'];
$pick_up_ret = $_POST['local_entrega'];
$delivery_ret = $_POST['local_recolha'];
$idret = $id+1;

$payment = number_format((float)$_POST['value'], 2, '.', '').'€'; 

$type = 'Please transfer the amount <strong>'.$payment.'</strong> to '.$ad_iban.', and send the <strong>confirmation to '.$ad_mail.'</strong>.<br>Thank you.';

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: <'.$ad_mail.'>' . "\r\n";
$headers .= 'Cc: noreply' . "\r\n";

$email_subject_client ="Hello ".$nome_cl.", your Transfer details can be seen below:";

$email_body_to_client='
<h3>Main:</h3>
<p>
<strong>Name: </strong> '.$nome_cl.'<br>
<strong>Passengers: </strong> '.$px.'<br>
<strong>Fly nr: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Phone: </strong> '.$phone.'<br>
<strong>Return: </strong> Yes<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Pick-Up:</h3>
<p>
<strong>Ticket ID: </strong> '.$id.'<br>
<strong>Date: </strong>'.$dia_rec.'<br>
<strong>Hour: </strong>'.$hora_rec.'<br>
<strong>From: </strong> '.$pick_up.'<br>
<strong>To: </strong> '.$delivery.'</p>
<hr>
<h3>Return:</h3>
<p>
<strong>Ticket ID: </strong> '.$idret.'<br>
<strong>Date: </strong> '.$dia_ret.' <br>
<strong>Hour: </strong>'.$hora_ret.'<br>
<strong>Address: </strong>'.$pt_ref.'<br>
<strong>From: </strong>'.$pick_up_ret.'<br>
<strong>To: </strong>'.$delivery_ret.'</p>
<hr>
<h3>Payment:</h3>
<p>
<strong>Type: </strong> Bank Transfer<br>
<strong>Total: </strong> '.$payment.'<br>
<strong>Conditions: </strong> '.$type.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';


$email_subject_supplier ='Olá '.$ad_nome.', recebeu um novo transfer, pode ver os detalhes abaixo:';

$email_body_to_supplier ='
<h3>Dados:</h3>
<p>
<strong>Nome: </strong> '.$nome_cl.'<br>
<strong>Passageiros: </strong> '.$px.'<br>
<strong>Voo nº: </strong> '.$voo.'<br>
<strong>Email: </strong> '.$email_cl.'<br>
<strong>Telefone: </strong> '.$phone.'<br>
<strong>Retorno: </strong> Sim<br>
<strong>Obs: </strong> '.$obsrv.'</p>
<hr>
<h3>Recolha:</h3>
<p>
<strong>Transfer ID: </strong> '.$id.'<br>
<strong>Data: </strong>'.$dia_rec.'<br>
<strong>Hora: </strong>'.$hora_rec.'<br>
<strong>Recolha: </strong> '.$pick_up.'<br>
<strong>Entrega: </strong> '.$delivery.'</p>
<hr>
<h3>Retorno:</h3>
<p>
<strong>Transfer ID: </strong> '.$idret.'<br>
<strong>Data: </strong> '.$dia_ret.' <br>
<strong>Hora: </strong>'.$hora_ret.'<br>
<strong>Morada: </strong>'.$pt_ref.'<br>
<strong>Recolha: </strong>'.$pick_up_ret.'<br>
<strong>Entrega: </strong>'.$delivery_ret.'</p>
<hr>
<h3>Pagamento:</h3>
<p>
<strong>Tipo: </strong> Trans.Bancária<br>
<strong>Total: </strong> '.$payment.'</p>
<hr>
'.$ad_nome.' - NIF: '.$ad_nif.'<br>
'.$ad_morada.' - Cod.Postal: '.$ad_cod_postal.'<br>
Tlf: '.$ad_tel.' - Tlm: '.$ad_tlm.'<br>
@: '.$ad_mail.' - WWW: '.$ad_site.'<br>';

     mail($email_cl,$email_subject_client,$email_body_to_client,$headers);
     mail($ad_mail,$email_subject_supplier,$email_body_to_supplier,$headers);
}
}







echo $success;

break;

case 10:
	$var = array();
        $sql="SELECT local AS local FROM locais UNION SELECT local_fim FROM locais WHERE local ='{$_POST['local_fim']}' ORDER BY local ASC";
	$result = mysqli_query($conn, $sql);
	while($obj = mysqli_fetch_object($result)) {
	$var[] = $obj;}
	echo json_encode($var);break;

/*OBTER DEFINICOES*/
case '11':
$obter_comp=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn, $obter_comp);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);
break;


}


function getLastId() {
    $result = mysqli_fetch_assoc(mysqli_query("select @@IDENTITY as id"));
   $success = '#FF'.$result['id'];
return $success;
}





mysqli_close($conn);
?>





