<?php
require_once '../connect.php';

switch ($_POST['action']){

/*OBTER ELEMENTOS DA EQUIPA PARA MARCAR PONTOS NO MAPA DAS COORDENADAS RECEBIDAS PELOS DISPOSITIVOS MOVEIS  */
case '1':
$qr='';
$gps= array();
$qr=" SELECT equipa,lat,lng FROM pr_admin WHERE 1";
$result = mysqli_query($conn, $qr);
if($result){
	while($obj = mysqli_fetch_object($result)) {
	$gps[] = $obj;}
	echo json_encode($gps);
}
else {
echo json_encode($gps);
}
break;


/*CAMPOS DO LOGFILE DO STAFF PARA VERIFICAR ESTADO DOS SERVIÇOS ATUALIZA DE 30 EM 30*/
case '2':
$qrlog='';
$log= array();
$tm= time()-5400; 
$qrlog=' SELECT * FROM logfile WHERE datetime >= '.$tm.' ORDER BY datetime DESC';
$result = mysqli_query($conn, $qrlog);
if($result){
	while($obj = mysqli_fetch_object($result)) {
	$log[] = $obj;}
	echo json_encode($log);
}
else {
echo json_encode($log);
}
break;

case '3':
$real='';
$log= array();
$tm= time()+5400; /*90m*/
$now = time()-1800;
$real=' SELECT hrs, estado, staff, servico,id, matricula FROM excel WHERE hrs <= '.$tm.' AND hrs >='.$now.' ORDER BY hrs ASC';
$result = mysqli_query($conn, $real);
if($result){
	while($obj = mysqli_fetch_object($result)) {
	$log[] = $obj;}
	echo json_encode($log);
}
else {
echo json_encode($log);
}
break;



case '4': 

$m = $_POST['matricula'];

$tm= time()+10400;
$now = time()-3600;
$carRoute=' SELECT lat,lng, matricula, datetime FROM logfile WHERE matricula = "'.$m.'" AND datetime <= '.$tm.' AND datetime >='.$now.' ORDER BY datetime ASC';
$result = mysqli_query($conn, $carRoute);
if($result){
while($row = $result->fetch_assoc()) {
$lat = floatval($row["lat"]);
$lng = floatval($row["lng"]);
$arr [] = array(lat =>$lat, lng => $lng, time_=> $row[datetime], 'matricula' => $row[matricula]);
}

echo json_encode($arr);
}
else {
echo json_encode($arr);
}

case'5':
$st = $_POST['staff'];
$qrl=' SELECT lat,lng FROM pr_admin WHERE equipa= "'.$st.'"';
$result = mysqli_query($conn, $qrl);
	while($obj = mysqli_fetch_object($result)) {
	$log[] = $obj;}
	echo json_encode($log);
break;
}

mysqli_close($conn);
?>