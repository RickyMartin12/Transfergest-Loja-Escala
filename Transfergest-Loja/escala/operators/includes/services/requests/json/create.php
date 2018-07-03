<?php

//require ROOTDIR . '/vendor/autoload.php';

$idOperador = $data['operadorId'];
$created_by = $data['username'].'@'.date("d/m/Y H:i:s");

//Horario Noturno TODO FROM SERVER
$horarioNoturnoStart = '00:00';
$horarioNoturnoEnd = '08:00';
//TODO

//selection inputs
$tiposDeServicos = require ROOTDIR . '/includes/services/repository/type_of_services.php';
$formasDePagamento = require ROOTDIR . '/includes/new-transfer/repository/payments_methods.php';
$estadosDePagamento = require ROOTDIR . '/includes/new-transfer/repository/payment_status.php';
$listaDePaises = require ROOTDIR . '/includes/new-transfer/repository/countries.php';
$emailCompanhia = require ROOTDIR . '/includes/services/repository/email_company.php';

require ROOTDIR . '/includes/services/requests/sharedPriceFunctions.php';

//require '../fpdf.php';

//VALIDATION


//check for booleans values

//$retorno            false | true
//$isAero             false | true
//$isValidByGps       false | true
//$clienteGuardar     false | true

if ((!isset($data['isAero']) || empty($data['isAero']))
    ||
    (!isset($data['retorno']) || empty($data['retorno']))
    ||
    (!isset($data['isValidByGps']) || empty($data['isValidByGps']))
    ||
    (!isset($data['cliente_guardar']) || empty($data['cliente_guardar']))
) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Estes campos sao obrigatórios.', 'type' => -1];
}

/**
 * Servico
 **/
if (!isset($data['servico']) || empty($data['servico'])) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Este campo é obrigatório.', 'type' => 1];
}

/**
 * Zona de Recolha
 **/
if (!isset($data['zonaDeRecolha']) || empty($data['zonaDeRecolha'])) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Este campo é obrigatório.', 'type' => 2];
}

/**
 * Zona de Entrega
 **/
if (!isset($data['zonaDeEntrega']) || empty($data['zonaDeEntrega'])) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Este campo é obrigatório.', 'type' => 3];
}

/**
 * Agendamento
 **/
if (!isset($data['agendamento']) || empty($data['agendamento'])) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Este campo é obrigatório.', 'type' => 4];
}

/**
 * Cliente Email
 **/
if (isset($data['cliente_email']) && !empty($data['cliente_email'])) {
    if (strlen($data['cliente_email']) > 50) {
        mysqli_close($conn);
        return ['success' => false, 'data' => 'Este campo é grande demais. Deve ter 50 caracteres ou menos.', 'type' => 5];
    } else if (!filter_var($data['cliente_email'], FILTER_VALIDATE_EMAIL)) {
        mysqli_close($conn);
        return ['success' => false, 'data' => 'Este campo deve ser um email válido.', 'type' => 6];
    }
}

/**
 * Cliente Nome
 **/
if (!isset($data['cliente_nome']) || empty($data['cliente_nome'])) {
    return ['success' => false, 'data' => 'Este campo é obrigatório.', 'type' => 7];
} else if (strlen($data['cliente_nome']) < 2) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Este campo é pequeno demais. Deve ter 2 caracteres ou mais.', 'type' => 8];

} else if (strlen($data['cliente_nome']) > 50) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'Este campo é grande demais. Deve ter 50 caracteres ou menos.', 'type' => 9];
}

//inputs
$servico = $data['servico'];
$zonaDeRecolha = $data['zonaDeRecolha'];
$zonaDeEntrega = $data['zonaDeEntrega'];
$agendamento = $data['agendamento'];
list($agendamento_data, $agendamento_hora) = explode(" ", $agendamento);
$retorno = $data['retorno'] === 'true' ? true : false;
$isAero = $data['isAero'] === 'true' ? true : false;
$isValidByGps = $data['isValidByGps'] === 'true' ? true : false;
$clienteGuardar = $data['cliente_guardar'] === 'true' ? true : false;
$clienteEmail = $data['cliente_email'];
$clienteNome = $data['cliente_nome'];
$clienteTelefone = $data['cliente_telefone'];
$clientePais = $data['cliente_pais'];
$data['cliente_quarto'] ? $obsclienteQuarto = '(Quarto n: '.$data['cliente_quarto'].')' : $obsclienteQuarto;
$clienteQuarto = $data['cliente_quarto'];
$moradaEntrega = $data['moradaEntrega'];
$adultos = $data['adultos'];
$criancas = $data['criancas'];
$criancas = $criancas == "" ? 0 : $criancas;
$bebes = $data['bebes'];
$bebes = $bebes == "" ? 0 : $bebes;
$observacoes = $data['observacoes'];
$estadoDePagamento = 'Pendente'; //$estadosDePagamento[$data['estadoDePagamento']];
$formaDePagamento = $formasDePagamento[$data['formaDePagamento']];

$passageiros = intval($adultos) + intval($criancas) + intval($bebes);

if ($isValidByGps) {
    if (!$isAero) {
        $moradaRecolhaGps = $data['moradaRecolhaGps'];
    }
    $moradaEntregaGps = $data['moradaEntregaGps'];
}

if ($retorno) {
    $retornoMoradaRecolha = $data['retorno_moradaRecolha'];
    $retornoMoradaEntrega = $data['retorno_moradaEntrega'];
    $retornoAdultos = $data['retorno_adultos'];
    $retornoCriancas = $data['retorno_criancas'];
    $retornoCriancas = $retornoCriancas == "" ? 0 : $retornoCriancas;
    $retornoBebes = $data['retorno_bebes'];
    $retornoBebes = $retornoBebes == "" ? 0 : $retornoBebes;
    $retornoObservacoes = $data['retorno_observacoes'];
    $retornoAgendamento = $data['retorno_agendamento'];
    list($retornoAgendamento_data, $retornoAgendamento_hora) = explode(" ", $retornoAgendamento);
    $passageiros_retorno = intval($retornoAdultos) + intval($retornoCriancas) + intval($retornoBebes);
}

if ($isAero) {
    $voo = $data['voo'];

    if($data['horaChegadaVoo']);

      list($datetimechegadaVoo_data, $datetimechegadaVoo_hora) = explode(" ", $data['horaChegadaVoo']);
      $vooDtarr = explode("/", $datetimechegadaVoo_data);           
      $agendamentoVoo = strtotime($vooDtarr[2].'-'.$vooDtarr[1].'-'.$vooDtarr[0].' '.$datetimechegadaVoo_hora); 

} else {

    $moradaRecolha = $data['moradaRecolha'];
}

require ROOTDIR . '/config/database.php';

//Guardar Cliente
if ($clienteGuardar == true) {
    $query = "SELECT * FROM clientes WHERE operador_id={$idOperador} AND email='{$clienteEmail}'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $query2 = "INSERT INTO clientes (email, nome, telefone, quarto, pais,operador_id) VALUES ('{$clienteEmail}', '{$clienteNome}', '{$clienteTelefone}', '{$clienteQuarto}', '{$clientePais}', {$idOperador}
            )";
        $result2 = mysqli_query($conn, $query2);
    } else {
        $query3 = "UPDATE clientes SET nome='{$clienteNome}', telefone ='{$clienteTelefone}', quarto='{$clienteQuarto}', pais='{$clientePais}' WHERE operador_id={$idOperador} AND email='{$clienteEmail}'";
        $result3 = mysqli_query($conn, $query3);
    }
}

$total = 0;
$totalPartida = 0;
$local = getProductId($conn, $zonaDeRecolha, $zonaDeEntrega, $servico);

if ($local !== -1) {
    $label = getLabelId($conn, $passageiros, $servico);
    if ($label != -1) {
        $atNight = strtotime($agendamento_hora) >= strtotime($horarioNoturnoStart) && strtotime($agendamento_hora) <= strtotime($horarioNoturnoEnd);
        $total = getValor($conn, $local, $label, $idOperador, $servico, $atNight);
        $totalPartida = $total == -1 ? 0 : $total;
    }

}

$totalRetorno = 0;
if ($retorno && $total != 0) {
    if ($passageiros == $passageiros_retorno) {
        $totalRetorno = $total;
        $total *= 2;
    } else {
        $label2 = getLabelId($conn, $passageiros_retorno, $servico);
        if ($label2 == -1) {
            $total = 0;
        } else {
            $atNight = strtotime($retornoAgendamento_hora) >= strtotime($horarioNoturnoStart) && strtotime($retornoAgendamento_hora) <= strtotime($horarioNoturnoEnd);
            $totalRetorno = getValor($conn, $local, $label2, $idOperador, $servico, $atNight);
            $total = $totalRetorno == -1 ? 0 : $total + $totalRetorno;
        }
    }
}


//Obter Nome operador
$queryOperador = "SELECT * from operador WHERE id={$idOperador} LIMIT 1";
$resultOperador = mysqli_query($conn, $queryOperador);
$nomeOperador = '';
if (mysqli_num_rows($resultOperador) > 0) {
    while ($row = $resultOperador->fetch_array()) {
        $nomeOperador = $row['nome'];
        $emailOperador = $row['email'];
        break;
    }
}

//Preparation to data partida to Insert
/*
$agendamento_data = strtotime(str_replace("/", "-", $agendamento_data));
*/
$agendamento_hora = strtotime(str_replace("/", "-", $agendamento));



  $date_array=explode('/',trim($agendamento_data));
      $agendamento_data=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 










if (isset($tiposDeServicos[$servico])) {
    $servico = $tiposDeServicos[$servico];
}

$clienteNome = ucwords($clienteNome);
if (isset($listaDePaises[$clientePais])) {
    $clientePais = $listaDePaises[$clientePais];
}

if ($isAero) {
    $moradaRecolha = '';
} else {
    $voo = '';
    $datetimechegadaVoo = '';
}
if (!$isValidByGps) {
    $moradaEntregaGps = '';
    $moradaRecolhaGps = '';

}

$adultos = intval($adultos);
$criancas = intval($criancas);
$bebes = intval($bebes);

$cobrarOperador = '';
$cobrarDireto = '';
if ($formaDePagamento == 'Operador') {
    $cobrarOperador = $totalPartida == 0 ? '' : number_format((float)$totalPartida, 2, '.', '');
} else if ($formaDePagamento == 'Motorista') {
    $cobrarDireto = $totalPartida == 0 ? '' : number_format((float)$totalPartida, 2, '.', '');
}
//se nao ha valor a cobrar
if ($cobrarDireto == '' && $cobrarOperador == '') {
    $estadoDePagamento = 'Pendente';
}


$referencia = dechex(strtotime(date("Y-m-d") . date("H:i:s")))."/".$idOperador;
$observacoes .= $obsclienteQuarto;  

$queryDadosPartida = "INSERT INTO excel (data_servico, hrs, servico, local_recolha, local_entrega, morada_recolha, morada_entrega, morada_recolha_gps, morada_entrega_gps,voo, voo_horario,px, cr, bebe, estado, nome_cl, email, obs,cobrar_operador, cobrar_direto, telefone, pais, operador, referencia, ponto_referencia, staff, matricula, ticket, nid, data_criacao, criado_direto,created_by) values({$agendamento_data}, {$agendamento_hora}, '{$servico}', '{$zonaDeRecolha}', '{$zonaDeEntrega}','{$moradaRecolha}', '{$moradaEntrega}', '{$moradaRecolhaGps}', '{$moradaEntregaGps}','{$voo}', '{$agendamentoVoo}','{$adultos}','{$criancas}', '{$bebes}','{$estadoDePagamento}','{$clienteNome}','{$clienteEmail}','{$observacoes}','{$cobrarOperador}', '{$cobrarDireto}','{$clienteTelefone}','{$clientePais}', '{$nomeOperador}', '{$referencia}', '', '', '', '', 0, 0, 2,'$created_by')";

$isSuccessPartida = mysqli_query($conn, $queryDadosPartida);


if (!$isSuccessPartida) {
    mysqli_close($conn);
    return ['success' => false, 'data' => mysqli_error($conn), 'type' => 90];
}

if ($retorno) {

    $date_array=explode('/',trim($retornoAgendamento_data));
    $retornoAgendamento_data=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 


    $retornoAgendamento_hora = strtotime(str_replace("/", "-", $retornoAgendamento));

    $retornoAdultos = intval($retornoAdultos);
    $retornoCriancas = intval($retornoCriancas);
    $retornoBebes = intval($retornoBebes);

    $cobrarOperador = '';
    $cobrarDireto = '';
    if ($formaDePagamento == 'Operador') {
        $cobrarOperador = $totalRetorno == 0 ? '' : number_format((float)$totalRetorno, 2, '.', '');
    } else if ($formaDePagamento == 'Motorista') {
        $cobrarDireto = $totalRetorno == 0 ? '' : number_format((float)$totalRetorno, 2, '.', '');
    }

    //se nao ha valor a cobrar
    if ($cobrarDireto == '' && $cobrarOperador == '') {
        $estadoDePagamento = 'Pendente';
    }
    $queryDadosRetorno = "INSERT INTO excel (data_servico, hrs, servico, local_recolha, local_entrega, morada_recolha, morada_entrega, morada_recolha_gps, morada_entrega_gps,voo, voo_horario,px, cr, bebe, estado, nome_cl, email, obs,cobrar_operador, cobrar_direto, telefone, pais, operador, referencia, ponto_referencia, staff, matricula, ticket, nid, data_criacao, criado_direto,created_by) values({$retornoAgendamento_data}, {$retornoAgendamento_hora} , '{$servico}', '{$zonaDeEntrega}', '{$zonaDeRecolha}','{$moradaEntrega}', '{$moradaRecolha}', '{$moradaEntregaGps}', '{$moradaRecolhaGps}','', '','{$retornoAdultos}','{$retornoCriancas}', '{$retornoBebes}','{$estadoDePagamento}','{$clienteNome}','{$clienteEmail}','{$retornoObservacoes}','{$cobrarOperador}', '{$cobrarDireto}','{$clienteTelefone}','{$clientePais}', '{$nomeOperador}', '{$referencia}', '', '', '', '', 0, 0, 2,'$created_by')";
    $isSuccessRetorno = mysqli_query($conn, $queryDadosRetorno);

    if (!$isSuccessRetorno) {
        return ['success' => false, 'data' => mysqli_error($conn), 'type' => 90];
    }
}
$inserted_id = mysqli_insert_id($conn);

mysqli_close($conn);

return ['success' => true, 'id' => $inserted_id];


/*--*/

//~$subject = "Foi gerado um transfer com Ref.: $referencia";

//~mail($emailOperador,$subject,$agendamento_data);

//~mail($emailCompanhia,$subject,$retornoAgendamento_data);