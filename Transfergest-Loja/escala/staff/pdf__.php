<?php
require('fpdf.php');

require_once('connect.php');

class PDF extends FPDF
{
function Header()
{
$user_serv= $_POST['user'];
$user_day= $_POST['day'];

if ($user_day == 0)
$day = date('d/m/Y', strtotime( "- 1 day" ));
else if ($user_day == 1)
$day = date('d/m/Y');
else if ($user_day == 2 )
$day = date('d/m/Y', strtotime( "+ 1 day" ));
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','',14);
    // Title
    $titulo = utf8_decode($user_serv.', os transfers para o dia '.$day);
    $this->Cell(0,0,$titulo,0,0,'C');
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);


$user_day= $_POST['day'];
$user_serv= $_POST['user'];

if ($user_day == 0){
$before_date = date('d/m/Y', strtotime( "$before_date - 1 day" )); 
$date_array_i=explode('/',trim($before_date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0]);
}


else if ($user_day == 1){
$date = date('d/m/Y');
$date_array_i=explode('/',trim($date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0]);
}


else if ($user_day == 2){
$next_date = date('d/m/Y', strtotime( "$next_date + 1 day" )); 
$date_array_i=explode('/',trim($next_date));
$time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');
}


$sel_sql=" SELECT * FROM excel WHERE equipa = '$user_serv' AND data_servico=$time ORDER BY hrs";
$result = mysqli_query($conn, $sel_sql);
//initialize counter
$i = 0;

//Set maximum rows per page
$max = 4;

//Set Row Height
$row_height = 6;

if (mysqli_num_rows($result) > 0) {
		
    while($row = mysqli_fetch_assoc($result)) {
        $t=$i+1;
        $nr = "Nº ".$t; 
        $id = "ID: #".$row['id'];
	$data_servico = date('d/m/Y',$row['data_servico']);
	$hrs ="Hora: ".date('H:i',$row['hrs']);
	$tp_serv = $row['servico'];
        $equipa = "Equipa: ".$row['equipa'];
        $voo ="Voo: ".$row['voo'];
        $nome="Nome: ".$row['nome'];
        $local_pick_up = "Pick-up: ".$row['local_pick_up'];
        $local_destino= "Destino: ".$row['local_destino'];
        $destino_endereco =  "Dest.Endereço: ".$row['destino_endereco'];
        $px = "Nº Px: ".$row['px'];
        $cr = "Nº Cr: ".$row['cr'];
        $bebe = "Nº Bb: ".$row['bebe'];
        $obs = "Obs: ".$row['obs'];
        $companhia = "Companhia: ".$row['conpanhia'];
        $ticket = "Ticket: ".$row['ticket'];
        $acobrar = " A Cobrar: ".$row['acobrar'];
        $comissao = " Comissão: ".$row['comissao'];
        $str = "\n".$nr."  |  ".$tp_serv."  |  ".$id."  |  Data: ".$data_servico ."  |  ".$hrs." \n ".$equipa."  |  ".$voo." |  ".$nome."\n".$local_pick_up."  | ".$local_destino." |  ".$destino_endereco."\n".$px."  |  ".$cr."  |  ".$bebe."  |   ".$obs."\n".$companhia."  | ".$ticket." |  ".$acobrar."  |  ".$comissao."\n\n";


$str = utf8_decode($str);
	$pdf->MultiCell(190,6,$str, 'TB', 'C', 0);
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}
}

mysqli_close($conn);

//Send file

$pdf->Output();
?>