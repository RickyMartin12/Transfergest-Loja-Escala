<?php
require_once '../connect.php';

$var = [];
$before_date='';
$next_date='';

switch ($_POST['action']){
case 'ver_ontem':
$user = $_POST['user'];
$before_date = date('d/m/Y', strtotime( "$before_date - 1 day" )); 
$date_array_i=explode('/',trim($before_date));
$time_before=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $before_date (Ontem)";
$sel_ontem=" SELECT * FROM excel WHERE data_servico = $time_before AND staff = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_ontem);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo  json_encode($var);break;

case 'long':
$sql_location="UPDATE excel SET ponto_referencia ='{$_POST['location']}' WHERE id = '{$_POST['id']}'";
$result = mysqli_query($conn,$sql_location);
 if ($result)
   $response = 1;
 else
  $response = 0; 

echo $response;break;


case 'ver_hoje':
$user = $_POST['user'];
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $date (Hoje)";
$sel_hoje="SELECT * FROM excel WHERE data_servico = $time AND staff = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_hoje);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);break;


case 'ver_amanha':
$user = $_POST['user'];
$next_date = date('d/m/Y', strtotime( "$next_date + 1 day" )); 
$date_array_i=explode('/',trim($next_date));
$time_next=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $next_date (Amanha)";
$sel_amanha=" SELECT * FROM excel WHERE data_servico = $time_next AND staff = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_amanha);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);break;


case 'check_transfers':
$user = $_POST['user'];
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $date (Hoje)";
$sel_hoje="SELECT * FROM excel WHERE data_servico = $time AND equipa = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_hoje);
$count;
while($obj = mysqli_fetch_object($result)) {
$i++;
$count=$i;
}
echo $count;break;

}


mysqli_close($conn);
?>