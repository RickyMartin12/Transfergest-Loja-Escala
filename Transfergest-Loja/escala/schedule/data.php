<?php

require_once '../connect.php';


/*LISTAR DATA C/ STAFF ENTRE 2 DIAS ANTES E 8 DIAS APOS*/

$st_arr[] = array (
                   'id' => 0,
                   'description' => false,
                   'service' => false,
                   'location' => false,
                   'location2' => false,
                   'subject' => false,
                   'calendar' => 'Atribuir',
                   'draggable' => false,
                   'hidden' => true,
                   'resizable' => false,
                   'readOnly' => true,
                   'start' => date('d/m/Y', strtotime("-2 days")),
                   'end' =>date('d/m/Y', strtotime("+8 days")),
                   'background' => $background
                    );


// connection String
$mysqli = new mysqli($servername, $username, $password, $dbname);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}

  $sql = "SELECT equipa FROM pr_admin WHERE regua = 'Staff' ORDER BY equipa ASC ";
  $result_sql = $mysqli->prepare($sql);
  $result_sql->bind_param('ii');
  $result_sql->execute();
  $result_sql->bind_result($allstaff);
  $i=1;
  while ($result_sql->fetch())
  {
   $st_arr[] = array(
                   'id' =>$i,
                   'description' =>false,
                   'service' => false,
                   'location' => false,
                   'location2' => false,
                   'subject' => false,
                   'calendar' => $allstaff,
                   'draggable' => false,
                   'hidden' => true,
                   'resizable' => false,
                   'readOnly' => true,
                   'start' => date('d/m/Y'),
                   'end' => date('d/m/Y'),
                   'background' => 'transparent'
                    );
$i++;
}

$result_sql->close();




// escrever na regua resultados de hoje e adiante
 
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00')-259200;//tres dias antes do atual
$time_end = $time+28551200; //33 dias de pesquisa (3 antes do dia atual 30 apos)
$query = "SELECT id, hrs, local_entrega, local_recolha, staff, end, px, cr, bebe, servico, voo, morada_recolha, nome_cl, operador 
FROM excel WHERE data_servico >= $time AND data_servico <= $time_end ORDER BY hrs";

$result = $mysqli->prepare($query);

$result->bind_param('ii');
$result->execute();

$result->bind_result($id, $hrs, $loc_ent, $loc_rec, $staff, $end, $px, $cr, $bebe, $servico, $voo, $m_recolha, $nome, $operador);

while ($result->fetch())
	{

/*ATRIBUIR COR AOS EVENTOS DAS VIATURAS */

    switch ($servico){
    case 'Partida' : $background = '#FFDDDD'; break;
    case 'Interzone' : $background = '#FFFFCC'; break;
    case 'Chegada' : $background = '#DDFFDD'; break;
    case 'Golf' : $background = '#AAFFFF'; break;  
    default : $background = '#EFEFEF';
    }


$st_i = (string) $id;
$end = $hrs+$end;
$hr = date("H:i", $hrs);
$hr_end = date("H:i", $end);
if(!$staff)$staff = 'Atribuir';
$pax= $px+$cr+$bebe;
$services[] = array(
                   'id' =>$st_i,
                   'description' =>'',
                   'location' =>'DE: '.$loc_rec.','.$m_recolha.' PARA: '.$loc_ent.' | #'.$st_i.' / '.$operador,
                   'subject' => 'NOME: '.$nome.' PAX:'.$pax.' IN:'.$hr.' FIM:'.$hr_end.' '.$servico,
                   'calendar' => $staff,
                   'draggable' => true,
                   'hidden' => false,
                   'resizable' => false,
                   'readOnly' => true,
                   'start' => date("Y-m-d H:i", $hrs),
                   'end' => date("Y-m-d H:i", $end),
                   'background' => $background
                    ); }

 echo json_encode(array_merge($st_arr,$services));

$result->close();

$mysqli->close();
?>
