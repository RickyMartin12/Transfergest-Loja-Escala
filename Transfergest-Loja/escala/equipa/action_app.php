<?php


require '../dbvars.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}

date_default_timezone_set('Europe/Lisbon');

$var = [];
$before_date='';
$next_date='';

switch ($_POST['action']){

/*LOGIN VERIFICAR USER E PASSWORD */
case 'login':
    $sql = "SELECT * FROM pr_admin WHERE equipa='".trim($_POST['equipa'])."' AND password='".md5(trim($_POST['password']))."'";
   // global $conn;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row['equipa'];
        }
    }
    else{ echo "Palavra passe ou nome inválido.";}

    break;

/*LOGOUT VERIFICAR USER E PASSWORD */
case 'logout':
    $sql = "SELECT * FROM pr_admin WHERE equipa='".trim($_POST['equipa'])."' AND password='".md5(trim($_POST['password']))."'";
    //global $conn;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row['equipa'];
        }
    
$clear=" UPDATE pr_admin SET lat='', lng='' WHERE equipa= '".trim($_POST['equipa'])."'";
$cresult = mysqli_query($conn, $clear);
    if (mysqli_num_rows($cresult) > 0) {}
   else{}
}
    else{ echo "Palavra passe inválida.";}
break;

case 'ver_ontem':
$user = $_POST['user'];
$before_date = date('d/m/Y', strtotime( "$before_date - 1 day" )); 
$date_array_i=explode('/',trim($before_date));
$time_before=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $before_date (Ontem)";
$sel_ontem=" SELECT 

servico,id, data_servico, hrs, estado,voo, from_unixtime((voo_horario-3600), '%H:%i') AS voo_horario, staff,nome_cl, local_recolha,local_entrega,ponto_referencia,px,cr,bebe,obs,operador,ticket,cobrar_direto, morada_recolha, morada_entrega ,morada_recolha_gps, morada_entrega_gps

 FROM excel WHERE data_servico = $time_before AND staff = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_ontem);
if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $lr = ''; 
            $le = '';
            !$row['estado'] ?  $estado = '-/-' : $estado = $row['estado'];
            !$row['voo'] ?  $voo = $row['voo'] : $voo = $row['voo'] .'@'. $row['voo_horario']; 
            if ($row['morada_recolha_gps']) $lr .= $row['morada_recolha_gps'].'/<br>';
            if ($row['morada_recolha']) $lr .= $row['morada_recolha'].', ';
            if ($row['local_recolha'])$lr .= $row['local_recolha'];
            if ($row['morada_entrega_gps']) $le .= $row['morada_entrega_gps'].'/<br>';
            if ($row['morada_entrega']) $le .= $row['morada_entrega'].', ';
            if ($row['local_entrega'])$le .= $row['local_entrega'];

            $obj = array('data_servico' =>$row['data_servico'],
                         'servico' => $row['servico'],
                         'id' => $row['id'],
                         'hrs' => $row['hrs'],
                         'voo' => $voo,
                         'staff' => $row['staff'],
                         'nome_cl' => $row['nome_cl'],
                         'local_recolha' => $lr,
                         'local_entrega' => $le,
                         'ponto_referencia' => $row['ponto_referencia'],
                         'px' => $row['px'],
                         'cr' => $row['cr'],
                         'bebe' =>  $row['bebe'],
                         'obs' => $row['obs'],
                         'operador' => $row['operador'],   
                         'ticket' => $row['ticket'], 
                         'cobrar_direto' => $row['cobrar_direto'],
                         'estado' => $estado);
$var[] = $obj;
        }
    }

echo  json_encode($var);break;

case 'long':
$sql_location="UPDATE excel SET destino_endereco ='{$_POST['location']}' WHERE id = '{$_POST['id']}'";
global $conn;
mysqli_query($conn,$sql_location);
echo "location";break;

case 'ver_hoje':
$user = $_POST['user'];
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $date (Hoje)";

$sel_hoje="SELECT servico,id, data_servico, hrs, estado,voo, from_unixtime((voo_horario-3600), '%H:%i') AS voo_horario, staff,nome_cl, local_recolha,local_entrega,ponto_referencia,px,cr,bebe,obs,operador,ticket,cobrar_direto, morada_recolha, morada_entrega ,morada_recolha_gps, morada_entrega_gps

FROM excel WHERE data_servico = $time AND staff = '$user' ORDER BY hrs ASC";

 $result = mysqli_query($conn, $sel_hoje);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $lr = ''; 
            $le = '';
            !$row['estado'] ?  $estado = '-/-' : $estado = $row['estado'];
            !$row['voo'] ?  $voo = $row['voo'] : $voo = $row['voo'] .'@'. $row['voo_horario']; 
            if ($row['morada_recolha_gps']) $lr .= $row['morada_recolha_gps'].'/<br>';
            if ($row['morada_recolha']) $lr .= $row['morada_recolha'].', ';
            if ($row['local_recolha'])$lr .= $row['local_recolha'];
            if ($row['morada_entrega_gps']) $le .= $row['morada_entrega_gps'].'/<br>';
            if ($row['morada_entrega']) $le .= $row['morada_entrega'].', ';
            if ($row['local_entrega'])$le .= $row['local_entrega'];

            $obj = array('data_servico' =>$row['data_servico'],
                         'servico' => $row['servico'],
                         'id' => $row['id'],
                         'hrs' => $row['hrs'],
                         'voo' => $voo,
                         'staff' => $row['staff'],
                         'nome_cl' => $row['nome_cl'],
                         'local_recolha' => $lr,
                         'local_entrega' => $le,
                         'ponto_referencia' => $row['ponto_referencia'],
                         'px' => $row['px'],
                         'cr' => $row['cr'],
                         'bebe' =>  $row['bebe'],
                         'obs' => $row['obs'],
                         'operador' => $row['operador'],   
                         'ticket' => $row['ticket'], 
                         'cobrar_direto' => $row['cobrar_direto'],
                         'estado' => $estado);
$var[] = $obj;
        }
    }


echo json_encode($var);break;


case 'ver_amanha':
$user = $_POST['user'];
$next_date = date('d/m/Y', strtotime( "$next_date + 1 day" )); 
$date_array_i=explode('/',trim($next_date));
$time_next=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $next_date (Amanha)";
$sel_amanha="SELECT 
servico,id, data_servico, hrs, voo, from_unixtime((voo_horario-3600), '%H:%i') AS voo_horario, staff,nome_cl, estado, local_recolha,local_entrega,ponto_referencia,px,cr,bebe,obs,operador,ticket,cobrar_direto, morada_recolha, morada_entrega ,morada_recolha_gps, morada_entrega_gps

FROM excel WHERE data_servico = $time_next AND staff = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_amanha);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $lr = ''; 
            $le = '';
            !$row['estado'] ?  $estado = '-/-' : $estado = $row['estado'];
            !$row['voo'] ?  $voo = $row['voo'] : $voo = $row['voo'] .'@'. $row['voo_horario']; 
            if ($row['morada_recolha_gps']) $lr .= $row['morada_recolha_gps'].'/<br>';
            if ($row['morada_recolha']) $lr .= $row['morada_recolha'].', ';
            if ($row['local_recolha'])$lr .= $row['local_recolha'];
            if ($row['morada_entrega_gps']) $le .= $row['morada_entrega_gps'].'/<br>';
            if ($row['morada_entrega']) $le .= $row['morada_entrega'].', ';
            if ($row['local_entrega'])$le .= $row['local_entrega'];

            $obj = array('data_servico' =>$row['data_servico'],
                         'servico' => $row['servico'],
                         'id' => $row['id'],
                         'hrs' => $row['hrs'],
                         'voo' => $voo,
                         'staff' => $row['staff'],
                         'nome_cl' => $row['nome_cl'],
                         'local_recolha' => $lr,
                         'local_entrega' => $le,
                         'ponto_referencia' => $row['ponto_referencia'],
                         'px' => $row['px'],
                         'cr' => $row['cr'],
                         'bebe' =>  $row['bebe'],
                         'obs' => $row['obs'],
                         'operador' => $row['operador'],   
                         'ticket' => $row['ticket'], 
                         'cobrar_direto' => $row['cobrar_direto'],
                         'estado' => $estado);
$var[] = $obj;
        }
    }


echo json_encode($var);break;


case 'check_transfers':
$user = $_POST['user'];
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
$search_out="Serviços do Dia: $date (Hoje)";
$sel_hoje="SELECT * FROM excel WHERE data_servico = $time AND staff = '$user' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sel_hoje);
$count;
while($obj = mysqli_fetch_object($result)) {
$i++;
$count=$i;
}
echo $count;break;

default:echo "put";break;

}


mysqli_close($conn);
?>