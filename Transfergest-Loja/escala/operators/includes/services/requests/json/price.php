<?php

require ROOTDIR . '/config/database.php';
require ROOTDIR . '/includes/services/requests/sharedPriceFunctions.php';

//Horario Noturno TODO FROM SERVER
$horarioNoturnoStart = '00:00';
$horarioNoturnoEnd = '08:00';

//TODO


//@TODO validation

$idOperador = $data['id'];
$servico = $data['servico'];
$zonaRecolha = $data['recolha'];
$zonaEntrega = $data['entrega'];
$passageiros = $data['passageiros'];
$passageiros = intval($passageiros);
$retorno = $data['retorno'] === 'true' ? true : false;

if ($retorno) {
    $passageiros_retorno = $data['retorno_passageiros'];
}

$total = 0;
$local = getProductId($conn, $zonaRecolha, $zonaEntrega, $servico);

if ($local !== -1) {
    $label = getLabelId($conn, $passageiros, $servico);
    if ($label != -1) {
        $total = getValor($conn, $local, $label, $idOperador, $servico);
        $total = $total == -1 ? 0 : $total;
    }

}
if ($retorno && $total != 0) {
    if ($passageiros == $passageiros_retorno) {
        $total *= 2;
    } else {
        $label2 = getLabelId($conn, $passageiros_retorno, $servico);
        if ($label2 == -1) {
            $total = 0;
        } else {
            $total2 = getValor($conn, $local, $label2, $idOperador, $servico);
            $total = $total2 == -1 ? 0 : $total + $total2;
        }
    }
}
mysqli_close($conn);

return $total;
