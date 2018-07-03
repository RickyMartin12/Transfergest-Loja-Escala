<?php
require_once '../connect.php';
switch ($_POST['action']){

/*PESQUISA POR DIAS DOS SERVIÇOS EFECTUADOS PELA EQUIPA*/
case '0':
$date_array_i=explode('/',trim($_POST['dia']));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$staff = $_POST['staff'];
$sel="SELECT id, cmx_st,local_recolha,local_entrega FROM excel WHERE data_servico = $time AND staff = '$staff' AND pag_staf != 'Sim' ORDER BY hrs";
$result = mysqli_query($conn, $sel);
$i=0;
     while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $cmx = $row['cmx_st'];
      $recolha = $row['local_recolha'];
      $entrega = $row['local_entrega'];
      $i++;
      $obj = array('id'=> $id , 'cmx' =>number_format((float)($cmx), 2, '.', ''),'serv'=>$i,'recolha' =>$recolha,'entrega' =>$entrega);
      $var[] = $obj;}

echo json_encode($var);

break;

/*PESQUISA POR MES DOS SERVIÇOS EFECTUADOS PELA EQUIPA*/
case '1':
$date_array_i=explode('/',trim($_POST['mes']));
$staff = $_POST['staff'];
$d=cal_days_in_month(CAL_GREGORIAN,$date_array_i[0],$date_array_i[1]);
  $time_ini_month = strtotime(date($date_array_i[1].'-'.$date_array_i[0].'-01 00:00:00'));
  $time_end_month = strtotime(date($date_array_i[1].'-'.$date_array_i[0].'-'.$d.' 23:59:59'));

    $sel_v="SELECT vencimento FROM pr_admin WHERE equipa = '$staff' ";
    $result = mysqli_query($conn, $sel_v);
    if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
      $venc_st = $row['vencimento'];
    }
   }


$sel="SELECT id, cmx_st,data_servico,hrs FROM excel WHERE data_servico >= $time_ini_month AND data_servico <= $time_end_month AND staff = '{$_POST['staff']}' AND pag_staf != 'Sim ' ORDER BY hrs";
$result = mysqli_query($conn, $sel);
 while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $cmx = $row['cmx_st'];
      $dia = $row['data_servico'];
      $diaq = date('d', $dia);
      $hora = $row['hrs'];
      $horaq = date('H:i', $hora);
      $i++;
      $obj = array('id'=> $id , 'cmx' =>number_format((float)($cmx), 2, '.', ''),'serv'=>$i,'dia' => $diaq,'hora' => $horaq, 'vencimento' => number_format((float)($venc_st), 2, '.', ''));
      $var_m[] = $obj;}

echo json_encode($var_m);

break;

}
mysqli_close($conn);
?>
