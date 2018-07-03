<?php


function isoDtFormat($i){
$d= date('Y-m-d H:i:s', $i);
return str_replace(" ","T",$d);
}

include  '../../connect.php';

$mysqli = new mysqli($servername, $username, $password, $dbname);

$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$time_end = $time+172800; //2 dias de pesquisa

$query = "SELECT id, hrs, local_entrega, local_recolha, staff, end, px,cr,bebe, servico, matricula FROM excel
WHERE data_servico BETWEEN $time AND $time_end ORDER BY hrs";

$result = $mysqli->prepare($query);

$result->bind_param('ii');
$result->execute();


$result->bind_result($id, $hrs, $loc_ent, $loc_rec, $staff, $end, $px,$cr,$bebe, $servico,$matricula);
while ($result->fetch())
	{
$t= $px+$cr+$bebe; 
$hr = date("H:i", $hrs);
$ini = isoDtFormat($hrs);
$fim = isoDtFormat($end+$hrs);

$dur = gmdate("H:i", $end);

switch ($servico){
  case 'Partida': $bck ='#ffdddd';break;
  case 'Chegada': $bck ='#ddffdd';break;
  case 'Interzone': $bck ='#ffffcc';break;
  case 'Golf': $bck ='#aaffff';break;
  default: $bck ='#fff';break;
}

!$staff || staff == null ? $staff = '0' : $staff = $staff;

$services[] = array(
      "start" => $ini,
      "end" => $fim,
      "id" => $id,
      "resource" => $staff,
      "text" => "<div class='nopdf' style='line-height:16px;'><i title='Total Passageiros' class='w3-text-red fa fa-users'></i> <b>" .$t. "</b> <i title='Duração do Serviço' class='w3-text-orange fa fa-clock-o'></i> " .$dur. " <i title='Identficador do Serviço' class='w3-text-purple fa fa-hashtag'></i>  ". $id ."  <i title='Tipo do Serviço' class='fa fa-tag'></i>  ". $servico ." <br><i title='Recolha' class='w3-text-green fa fa-crosshairs'></i> " .$loc_rec."<br><i title='Entrega' class='w3-text-blue fa fa-map-marker'></i> ".$loc_ent."<br><i title='Matricula' class='w3-text-brown fa fa-car'></i> ".$matricula." </div>",
      "backColor" => $bck,
      "barVisible" => false,
      "moveVDisabled" => false,
      "moveHDisabled" => true);
}

echo json_encode($services);
$result->close();
$mysqli->close();
?>