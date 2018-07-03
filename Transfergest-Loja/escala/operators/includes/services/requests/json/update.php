<?php

     //$time = time();


    $operador = $_POST['op'];
    $usr = $_POST['usr'];
    $id = $_POST['id'];
    $datahora =   $_POST['dt'];
    $estado = $_POST['st'];
    require $_SERVER['DOCUMENT_ROOT'].'/connect.php';
    if ($_POST['dt'] !=0 || $_POST['dt']){
      $dt = explode(' ',trim($_POST['dt']));
      $dt_d = explode('/',trim($dt[0]));
      $dataservico = strtotime($dt_d[2].'-'.$dt_d[1].'-'.$dt_d[0].'-00');
      $hrs = strtotime($dt_d[2].'-'.$dt_d[1].'-'.$dt_d[0].' '.$dt[1]);
    }
    else $dataservico = 0;
    $query = "UPDATE excel SET estado='$estado', hrs=$hrs, data_servico = $dataservico WHERE id=$id AND operador = '$operador' AND criado_direto = '2'";
    $result = mysqli_query($conn, $query);
    if ($result){
echo 1;
}
else echo 0;
mysqli_close($conn);


/*
    $formasDePagamento = require ROOTDIR . '/includes/new-transfer/repository/payments_methods.php';
    $estadosDePagamento = require ROOTDIR . '/includes/new-transfer/repository/payment_status.php';

    $estadoDePagamentoUpdated = $_POST['estadoDePagamentoUpdated'] === 'true' ? true : false;
    $estadoDePagamento = $estadosDePagamento[$_POST['estadoDePagamento']];
    $oldEstadoDePagamento = $estadosDePagamento[$_POST['oldEstadoDePagamento']];

    $formaDePagamentoUpdated = $_POST['formaDePagamentoUpdated'] === 'true' ? true : false;
    $formaDePagamento = $formasDePagamento[$_POST['formaDePagamento']];
    $oldFormaDePagamento = $formasDePagamento[$_POST['oldFormaDePagamento']];
     
    $agendamentoUpdated = $_POST['agendamentoUpdated'] === 'true' ? true : false;
    $agendamento = $_POST['agendamento'];
    $oldAgendamento = $_POST['oldAgendamento'];

    list($agendamento_data, $agendamento_hora) = explode(" ", $agendamento);
    $agendamento_data = strtotime(str_replace("/", "-", $agendamento_data));
    $agendamento_hora = strtotime(str_replace("/", "-", $agendamento));


    $date = date('d/m/Y', $time);
    $partials = [];
    if ($estadoDePagamentoUpdated == true) {
        $partials[] = '<strong>Estado de Pagamento:</strong> \"' . $oldEstadoDePagamento . "\" -> \"" . $estadoDePagamento . "\"";
    }
    if ($formaDePagamentoUpdated == true) {
        $partials[] = '<strong>Forma de Pagamento:</strong> \"' . $oldFormaDePagamento . "\" -> \"" . $formaDePagamento . "\"";
    }
    if ($agendamentoUpdated == true) {
        $partials[] = '<strong>Agendamento:</strong> \"' . $oldAgendamento . "\" -> \"" . $agendamento . "\"";
    }
    if ($obsUpdated == true) {
        $partials[] = '<strong>Observações:</strong> \"' . $oldObs . "\" -> \"" . $obs . "\"";
    }

    $modifications = '';
    for ($i = 0; $i < count($partials); $i++) {
        if ($i == count($partials)) {
            $modifications .= $partials[$i];
        } else {
            $modifications .= $partials[$i] . '<br>';
        }
    }
    $modifications = trim($modifications);

    $text = "O operador <strong>{$username}</strong> atualizou o serviço #{$id}.";

    $query2 = "INSERT INTO timeline_logs (text, modifications, critical, servico_id) VALUES ('{$text}', '{$modifications}', 1, {$id})";
    mysqli_query($conn, $query2);
    mysqli_close($conn);

    return ['success' => true];

*/

?>