<?php

require_once '../connect.php';

// connection String
$mysqli = new mysqli($servername, $username, $password, $dbname);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
// get data and store in a json array
//$from = 0;
//$to = 25;

// escrever na regua resultados de hoje e adiante
 
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00')-259200;//tres dias antes do atual
$time_end = $time+15552000;

$query = "SELECT id, hrs, local_entrega, local_recolha, staff, end, px, cr, bebe, servico, voo FROM excel WHERE data_servico >= $time AND data_servico <= $time_end ORDER BY hrs";
// ASC LIMIT ?,?";

$result = $mysqli->prepare($query);

//$result->bind_param('ii', $from, $to);

$result->bind_param('ii');
$result->execute();

/* bind result variables */

$result->bind_result($id, $hrs, $loc_ent, $loc_rec, $staff, $end, $px, $cr, $bebe, $servico, $voo);
while ($result->fetch())
	{
$st_i = (string) $id;
$end = $hrs+$end;
$hr = date("H:i", $hrs);
$hr_end = date("H:i", $end);
if(!$staff)$staff = 'Serviços por atribuir';
$pax= $px+$cr+$bebe;
$services[] = array(
                   'id' =>$st_i,
                   'description' =>'',
                   'location' =>'DE: '.$loc_rec.' PARA: '.$loc_ent.' | #'.$st_i,
                   'subject' =>'INICIO:'.$hr.' FIM:'.$hr_end.' '.$servico.' PAX: '.$pax,
                   'calendar' => $staff,
                   'draggable' => false,
                   'hidden' => false,
                   'resizable' => false,
                   'readOnly' => true,
                   'start' => date("Y-m-d H:i", $hrs),
                   'end' => date("Y-m-d H:i", $end)
                    ); }
echo json_encode($services);
$result->close();
$mysqli->close();
?>
