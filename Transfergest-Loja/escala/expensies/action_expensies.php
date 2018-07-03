<?php
require_once '../connect.php';

switch ($_POST['action']){


case '1':

$id = $_POST['id'];
$sql="DELETE FROM diario WHERE id = $id";
$result = mysqli_query($conn,$sql);
if ($result)
	echo 1; 
else 
	 echo 0;
break;



case '2':

$id = $_POST['id'];

$date_array = explode('/',trim($_POST['data']));
$data = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

$entidade = $_POST['entidade'];
$fatura = $_POST['fatura'];
$staff = $_POST['staff'];
$responsavel = $_POST['responsavel'];
$matricula = str_replace("-","",$_POST['matricula']);
$tipo_manutencao = $_POST['tipo_manutencao']; 
$tipo_despesa = $_POST['tipo_despesa'];
$localidade = $_POST['localidade'];
$km_inicio = $_POST['km_inicio'];
$km_fim = $_POST['km_inicio'];
$proximo_km = $_POST['proximo_km'];
$lat_inicio = $_POST['lat_inicio'];
$long_inicio = $_POST['long_inicio'];
$lat_fim = $_POST['lat_fim'];
$long_fim = $_POST['long_fim'];
/*VAR PARTE FIXA*/

$tipo_periodicidade = $_POST['periodicidade'];

$date_array_i = explode('/',trim($_POST['data_inicio']));
$data_inicio = strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');

$date_array_f = explode('/',trim($_POST['data_fim']));
$data_fim = strtotime($date_array_f[2].'-'.$date_array_f[1].'-'.$date_array_f[0].'-00');

    if ($_POST['horas_inicio']){
      $dur=explode(':',trim($_POST['horas_inicio']));
      $hora_inicio = $dur[0]*60*60 + $dur[1]*60;
    }
else $hora_inicio = 0;

    if ($_POST['horas_fim']){
      $dur=explode(':',trim($_POST['horas_fim']));
      $hora_fim = $dur[0]*60*60 + $dur[1]*60;
    }
else $hora_fim = 0;

$_POST['dia'] && $_POST['dia'] != 0 ? $dia = filter_var($_POST['dia'], FILTER_VALIDATE_INT,array('options' => array('min_range' => 1))) : $dia = 1;

/*VAR PARTE COBRANÇAS*/
$descricao = $_POST['descricao'];
$total = $_POST['total'];

$sql =" UPDATE diario SET data = $data, entidade = '$entidade',fatura= '$fatura',staff ='$staff',responsavel='$responsavel', matricula ='$matricula', tipo_manutencao = '$tipo_manutencao',tipo_despesa = '$tipo_despesa', localidade = '$localidade', km_inicio = '$km_inicio', km_fim = '$km_fim', proximo_km = '$proximo_km', lat_inicio = '$lat_inicio', long_inicio = '$long_inicio', lat_fim = '$lat_fim', long_fim = '$long_fim', data_inicio = $data_inicio, data_fim = $data_fim, hora_inicio = $hora_inicio, horas_fim = $hora_fim, dia = $dia, tipo_periodicidade = '$tipo_periodicidade', descricao = '$descricao', total = '$total'  WHERE id = $id";

 $result = mysqli_query($conn,$sql);
  if ($result)
  echo 1;
else  
  echo 0;
break;



}
mysqli_close($conn);
?>


