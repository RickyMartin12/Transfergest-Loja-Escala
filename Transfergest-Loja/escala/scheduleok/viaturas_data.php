<?php

require_once '../connect.php';

$arr_color = array('#6B98FF','#CB9D7C','#01BF00','#FD8E08','#BCE3FF','#97EC7D','#FDABFF','#C89BFF','#FF776B','#FFED5C','#D54344','#B18651','#FF63D8','#7BFD52','#BE8D88','#8BB4D0','#989898','#536BFF','#C4700D','#9245E1','#6881AA','#BCC804','#5EFFDE','#85634A','#B8574E','#343434','#389F82');

$staff_arr=array();

// connection String
$mysqli = new mysqli($servername, $username, $password, $dbname);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
/* todos staff */

$sql_staff = "SELECT equipa FROM pr_admin ORDER BY equipa ASC ";
$result_staff = $mysqli->prepare($sql_staff);
$result_staff->bind_param('ii');
$result_staff->execute();

$result_staff->bind_result($allstaff);
while ($result_staff->fetch())
{
array_push($staff_arr,$allstaff);
}

$result_staff->close();

/* todas matriculas */

$sql = "SELECT matricula FROM veiculos WHERE 1 ";
$result_sql = $mysqli->prepare($sql);
$result_sql->bind_param('ii');
$result_sql->execute();
$result_sql->bind_result($matricula);
$matric_arr[] = array (
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
                   'start' => date('d/m/Y', strtotime("-4 days")),
                   'end' =>date('d/m/Y', strtotime("+8 days")),
                   'background' => 'transparent',
                   'borderColor' => false
                    );
$i=1;
while ($result_sql->fetch())
{

$matricula = $matricula[0].''.$matricula[1].'-'.$matricula[2].''.$matricula[3].'-'.$matricula[4].''.$matricula[5];

$matric_arr[] = array(
                   'id' =>$i,
                   'description' =>false,
                   'service' => false,
                   'location' => false,
                   'location2' => false,
                   'subject' => false,
                   'calendar' => $matricula,
                   'draggable' => false,
                   'hidden' => true,
                   'resizable' => false,
                   'readOnly' => true,
                   'start' => date('d/m/Y'),
                   'end' => date('d/m/Y'),
                   'background' => 'transparent',
                   'borderColor' => false
                    );
$i++;
}



$result_sql->close();


$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00')-259200;//tres dias antes do atual
$time_end = $time+950400; // 11 dias de pesquisa (3 antes do dia atual 8 após)
$query = "SELECT id, hrs, local_entrega, local_recolha, matricula, staff, end, px, cr, bebe, servico, voo FROM excel WHERE data_servico >= $time AND data_servico <= $time_end ORDER BY hrs";

$result = $mysqli->prepare($query);

//$result->bind_param('ii', $from, $to);

$result->bind_param('ii');
$result->execute();


$result->bind_result($id, $hrs, $loc_ent, $loc_rec, $matricula, $staff, $end, $px, $cr, $bebe, $servico, $voo);
   while ($result->fetch())
    {
/*COR ATRIBUIDA BORDER VIATURAS SEM STAFF */
   $border = '#F00';

 /*ATRIBUIR COR BORDER VIATURAS C/ STAFF*/
   for( $g=0 ; $g<count($staff_arr); $g++){
      if ($staff_arr[$g] == $staff) $border = $arr_color[$g];
    }

 /*ATRIBUIR COR AOS EVENTOS DAS VIATURAS */

    if ($servico == 'Partida') $background = '#FFDDDD';

    else if ($servico == 'Interzone') $background = '#FFFFCC';

    else if ($servico == 'Chegada') $background = '#DDFFDD';

    else if ($servico == 'Golf') $background = '#AAFFFF';
   
    else $background = '#EFEFEF';

    $st_i = (string) $id;
    $end = $hrs+$end;
    $hr = date("H:i", $hrs);
    $hr_end = date("H:i", $end);

$matricula ? $matricula = $matricula[0].''.$matricula[1].'-'.$matricula[2].''.$matricula[3].'-'.$matricula[4].''.$matricula[5] : $matricula = 'Atribuir';
    $pax= $px+$cr+$bebe;
    $services[] = array(
                   'id' =>$st_i,
                   'description' =>$servico,
                   'subject' => 'INICIO: '.$hr.' FIM: '.$hr_end.' STAFF: '.$staff.' #'.$st_i.' TIPO: '.$servico.' PAX: '.$pax,
                   'location' => 'DE: '.$loc_rec.' PARA: '.$loc_ent,
                   'calendar' => $matricula,
                   'draggable' => false,
                   'hidden' => false,
                   'resizable' => false,
                   'readOnly' => true,
                   'start' => date("Y-m-d H:i", $hrs),
                   'end' => date("Y-m-d H:i", $end),
                   'background' => $background,
                   'borderColor' => $border
                    ); 
  }

    echo json_encode(array_merge($matric_arr,$services));
    $result->close();

$mysqli->close();
?>
