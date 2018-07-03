<?php

require_once '../connect.php';

date_default_timezone_set('Europe/Lisbon');


/*VERIFICAR MAIOR NUMERO EM nid VALOR DAS ENTRADAS DA API 2300 */
$result = mysqli_query($conn, "SELECT nid FROM excel ORDER BY nid DESC LIMIT 1");
$row = mysqli_fetch_array($result);

$db=$row['nid'];

$db < 2350 ?  $nid = 2351 : $nid = $db+1;

$response="";

$success="";

while (!preg_match("/NOBOOK/i", $response)){
 
	$error='';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://api.algarvefaroairporttransfers.com/info/7ad65f59d2a46a0a5644fc2c2c6ac31b97a45b5b/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"id\":$nid}");

	$nid++;

	curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type: application/json"));
	$response = curl_exec($ch);

	curl_close($ch);

	if (isset($response) && $response !='NOBOOK'){

	$out = json_decode($response);

	$id = $out->id;

	$retorno = $out->cliente_pedido->retorno;
 
	$retorno == 1 ? 
	$obs= '(PAX:'.$out->cliente_pedido->pax.' | '.$out->metodo_pag.' | TEM RETORNO) OBS:'.$out->other_obs
	: 
	$obs= '(PAX:'.$out->cliente_pedido->pax.' | '.$out->metodo_pag.' ) OBS:'.$out->other_obs;

	if ($id > $db){
		$success='';
		
		if(!empty($out->cliente_transfer->chegada_data)){
			$date_array=explode('/',trim($out->cliente_transfer->chegada_data));
            $date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
		}
		else {}


		if(!empty($out->cliente_transfer->chegada_tempo)){
			$horas=trim($out->cliente_transfer->chegada_tempo); 
			$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas); 
		}
		
		else {}

		$referencia = $out->metodo_referencia;
		$estado = 'Aguarda';
    	$op = explode("-", $out->metodo_referencia);

        if ($op[0] =='MARS')
        	$operador = 'MARS Algarve';
        elseif($op[0]=='GEH')
         	$operador = 'Golf Escapes';
        else
		$operador = 'Bigeye Tours';

		!empty( $out->cliente_transfer->chegada_voonr) ?  $voo = $out->cliente_transfer->chegada_voonr :  $voo='-/-';

		$nome = $out->cliente_dados->nome.' '.$out->cliente_dados->apelido;
		$email = $out->cliente_dados->email;
		$tel =  $out->cliente_dados->telefone;
		$pais = $out->cliente_dados->morada_pais;
    	$pt_rec = $out->cliente_pedido->origem;

    	!empty($out->cliente_transfer->chegada_morada) ? $cheg_morada = $out->cliente_transfer->chegada_morada : $cheg_morada ='-/-';
    	
    	$pt_ent = trim($out->cliente_pedido->destino).', '.$cheg_morada;
		$adulto = $out->cliente_pedido->a_seats;
		$crianca = $out->cliente_pedido->c_seats;
		$bebe = $out->cliente_pedido->b_seats+$out->cliente_pedido->n_seats;
    	$a_cobrar = $out->valor_total;        
    	$registry_new="INSERT INTO excel
		(data_servico,hrs,referencia,estado,operador,voo,nome_cl,email,telefone,pais,local_recolha,local_entrega,px,cr,bebe,obs,cobrar_direto,nid)
		VALUES
		($date,$timeok,'$referencia','$estado','$operador','$voo','$nome','$email','$tel','$pais','$pt_rec','$pt_ent','$adulto','$crianca','$bebe','$obs','$a_cobrar',$id)";
		$result = mysqli_query($conn,$registry_new);

		if ($result){

            $success .= 1;
	        
	        if ($retorno == 1) {

 				if(!empty($out->cliente_transfer->partida_data)){
		  			$date_array=explode('/',trim($out->cliente_transfer->partida_data));
		  			$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
				}
				else {

				}

				if(!empty($out->cliente_transfer->pickupTime)){
					$horas = str_replace('h',':',$horas);
          			$horas = str_replace('m','',$horas);
	  				$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas); 
				}
	
				else {
			
				}

	  			$referencia = $out->metodo_referencia;
	  			$estado = 'Aguarda';
        		$op = explode("-", $out->metodo_referencia);

        		if ($op[0] =='MARS')
        			$operador = 'MARS Algarve';
        		elseif($op[0]=='GEH')
        			$operador = 'Golf Escapes';
        		else
				$operador = 'Bigeye Tours';

				!empty( $out->cliente_transfer->partida_voonr) ?  $voo = $out->cliente_transfer->partida_voonr :  $voo='-/-';

	  			$nome = $out->cliente_dados->nome.' '.$out->cliente_dados->apelido;
	  			$email = $out->cliente_dados->email;
	  			$tel =  $out->cliente_dados->telefone;
	  			$pais = $out->cliente_dados->morada_pais;

	  			!empty($out->cliente_transfer->partida_morada) ? $partida_morada = $out->cliente_transfer->partida_morada : $partida_morada ='-/-';

          		$pt_rec = trim($out->cliente_pedido->destino).', '.$partida_morada;
          		$pt_ent = $out->cliente_pedido->origem;
	  			$adulto = $out->cliente_pedido->a_seats;
	  			$crianca = $out->cliente_pedido->c_seats;
        		$bebe = $out->cliente_pedido->b_seats+$out->cliente_pedido->n_seats;
		    	$obsr= '(PAX:'.$out->cliente_pedido->pax.' | '.$out->metodo_pag.' | RETORNO) OBS:'.$out->other_obs;

	    		$registry_ret="INSERT INTO excel
	    		(data_servico,hrs,referencia,estado,operador,voo,nome_cl,email,telefone,pais,local_recolha,local_entrega,px,cr,bebe,obs)
	    		VALUES
	    		($date,$timeok,'$referencia','$estado','$operador','$voo','$nome','$email','$tel','$pais','$pt_rec','$pt_ent','$adulto','$crianca','$bebe','$obsr')";
    		
    			$result2 = mysqli_query($conn,$registry_ret);
    			$result2 ? $success .= 1 : $error .='0 #'.$referencia.'-->'.$out->cliente_pedido->mode;
    		
 			}
			
			if (preg_match("/NOBOOK/i", $response)) {
   				mysqli_close($conn); 
   				exit("Sem reservas para adicionar ultimo registo XXXX-$nid");
			} 
		}

		else 
			$error .= '1 #'.$referencia.'-->'.$out->cliente_pedido->mode;
	}
}

if (!empty($error)){
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <noreply@transfergest.com>' . "\r\n";
$subject="Error API Call";
$message="Error Transfer, unable to save" .$error;
mail('suporte@oseubackoffice.com',$subject,$message,$headers);

}


}

mysqli_close($conn);

echo $response."-->".$success."-->".$referencia;

?>