<?php
require('fpdf.php');

require_once('connect.php');

$response = '';


class PDF extends FPDF
{
var $admin;
var $logo;
var $morada;
var$cod_postal;
var $tel;
var $tlm;
var $email;
var $site;
var $nif;
var $ravt;

function companhia($admin,$logo,$morada,$cod_postal,$tel,$tlm,$email,$site,$nif,$ravt) {
$this->nome = $admin;
$this->logo = $logo;
$this->morada = $morada;
$this->cod_postal = $cod_postal;
$this->tel = $tel;
$this->tlm = $tlm;
$this->email = $email;
$this->site = $site;
$this->nif = $nif;
$this->ravt = $ravt;
}

// Page header
function Header()
{   
    $titulo2 = utf8_decode($this->morada.' '.$this->cod_postal);
                             //(esquerda,cima,altura)
    $this->Image('definitions/'.$this->logo,20,10,50);
    $this->SetFont('Arial','B',9);
    $this->Cell(80);
    $this->Cell(0,0,utf8_decode($this->nome),0,0,'L');
    $this->Ln(4);
    $this->SetFont('Arial','B',9);
    $this->Cell(80);
    $this->Cell(8,0,'NIF:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(20,0,$this->nif,0,0,'L');
    $this->SetFont('Arial','B',9);
    $this->Cell(13,0,'RNAVT:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(15,0,$this->ravt,0,0,'L');
    $this->Ln(4);
    $this->Cell(80);
    $this->SetFont('Arial','',8);
    $this->Cell(0,0,$titulo2,0,0,'L');
    $this->Ln(4);
    $this->SetFont('Arial','B',9);
    $this->Cell(80);
    $this->Cell(8,0,'TEL:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(25,0,$this->tel,0,0,'L');
    $this->SetFont('Arial','B',9);
    $this->Cell(9,0,'TLM:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(25,0,$this->tlm,0,0,'L');
    $this->Ln(4);
    $this->Cell(80);
    $this->SetFont('Arial','B',9);
    $this->Cell(12,0,'EMAIL:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(0,0,utf8_decode($this->email),0,0,'L');
    $this->Ln(4);
    $this->Cell(80);
    $this->SetFont('Arial','B',9);
    $this->Cell(9,0,'URL:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(0,0,utf8_decode($this->site),0,0,'L');
    $this->Ln(5);

}


// Page footer
function Footer()
{

    $titulo1 = utf8_decode($this->nome .' | NIF:'.$this->nif.' | RNAVT:'.$this->ravt);
    $titulo2 = utf8_decode('TEL:'.$this->tel .' | TLM:'.$this->tlm);
    $titulo3 = utf8_decode($this->email.' | '.$this->site);
    $this->SetY(-15);
    $this->SetFont('Arial','',6);
    $this->Cell(0,0,$titulo1.' | '.$titulo2.' | '.$titulo3,0,0,'C');
    //$this->Ln(3);
    //$this->Cell(0,0,$titulo2,0,0,'L');
    //$this->Cell(0,0,$titulo3,0,0,'R');
    // Position at 1.5 cm from bottom
    // Arial italic 5
    $this->Ln(4);
    $this->SetFont('Arial','I',5);
    // Page number
    $this->Cell(0,0,'Powered by transfergest.com',0,0,'C');
    $this->Cell(0,0,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
}
}

// Instanciation of inherited class

$pdf = new PDF();

$sql=" SELECT nome,logo,morada,cod_postal,tel,tlm,email,site,nif,ravt FROM companhia WHERE 1";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$pdf->companhia($row['nome'],$row['logo'],$row['morada'],$row['cod_postal'],$row['tel'],$row['tlm'],$row['email'],$row['site'],$row['nif'],$row['ravt']);
$from = $row['email'];
$dmn = $row['site'];
mysqli_free_result($result); 

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->SetAutoPageBreak(false);

$response = 1;

/* 1 ou 0*/

if ($response == 1){


switch ($_POST['action']){

case'send_mail':

$id_equipa = $_POST['id'];

$senddate='';
$senddate = date('d/m/Y', strtotime( "$senddate + 1 day" )); 


$sql=" SELECT equipa,email FROM pr_admin WHERE id = $id_equipa";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $nome_equipa = $row['equipa'];
        $to = $row['email'];
    }
$response .= 1;
}
else {
unset($nome_equipa, $to);
$response .= 0;
}break;

case '1':

$senddate = $_POST['data'];
$id_equipa = $_POST['id'];

$sql=" SELECT equipa,email FROM pr_admin WHERE equipa = '$id_equipa'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $nome_equipa = $row['equipa'];
        $to = $row['email'];
    }
$response .= 1;
}
else {
unset($nome_equipa, $to);
$response .= 0;
}break;
}
}

/*11 ou 10*/

if (isset($nome_equipa) && isset($to)){

    //$day = date('d/m/Y', strtotime()); 
    $pdf->SetFont('Arial','',9);


    $pdf->Cell(0,6,utf8_decode('Olá '.$nome_equipa.', este são os seus serviços para o dia, '.$senddate.'.       Bom trabalho...'),1,0,'C');
    $pdf->Ln(9);


$date_array_i=explode('/',trim($senddate));

$time_next=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0]."-00");

$sql=" SELECT *,from_unixtime((voo_horario-3600), '%H:%i') AS voo_horario FROM excel WHERE data_servico = $time_next AND staff = '$nome_equipa' ORDER BY hrs ASC";
$result = mysqli_query($conn, $sql);

//initialize counter
$i=0;

//total services
$t=0;

//mais de 7 services por pagina cria pagina

$max = 7;
if (mysqli_num_rows($result) > 0) {
    $response .= 1; 
    while($row = mysqli_fetch_assoc($result))
    {
    
 if ($i == $max)
    {
        $pdf->AddPage();
        $i=0;
    }
        $t=$t+1;
        $nr =" Nº ".$t; 
        $id = $row['id'];
        $data_servico = date('d/m/Y',$row['data_servico']);
        $hrs = date('H:i',$row['hrs']);
        $tp_serv = $row['servico'];
        $equipa = "Staff: ".$row['staff'];
        $row['voo'] ? $voo =  $voo = $row['voo'].'@'.$row['voo_horario'] : $voo =  '-/-';
        $nome = $row['nome_cl'];
        $local_pick_up = $row['local_recolha'].', '.$row['morada_recolha'];
        $local_destino=$row['local_entrega'].', '.$row['morada_entrega'];
        $pt_ref = $row['ponto_referencia'];
        $px = $row['px'];
        $cr = $row['cr'];
        $bebe =$row['bebe'];
        $obs = $row['obs'];
        $operador = $row['operador'];
        $ticket = $row['ticket'];
        $acobrar = number_format($row['cobrar_direto'], 2, '.', '')."Eur";
        /*if($row['cmx_st'])
        $comissao = "Comissão : ".number_format($row['cmx_st'], 2, '.', '')." Eur.";
        else $comissao = "-/-";*/
        if (!$px) $px=0;
        if (!$cr) $cr=0;
        if (!$bebe) $bebe=0;
        if (!$voo) $voo='-/-';
        if (!$row['cobrar_direto']) $acobrar='-/-';
        if (!$obs) $obs='-/-';
        if (strlen($obs) > 130){
         $length = strlen($obs);
         $obs_cont = substr($obs, 130, $length);
         $obs = substr($obs, 0, 130);
        }
        if (!$obs_cont) $cont_cont='-/-';
        if (!$ticket) $ticket='-/-';
        if (!$pt_ref) $pt_ref='-/-';
    $pdf->SetTextColor(5,5,5);
    $pdf->Cell(0,30,"",1,0,'L');
    $pdf->Ln(3);   
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(6,0,utf8_decode('Nº:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(5,0,$t,0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,0,utf8_decode('Serviço:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,0,utf8_decode($tp_serv),0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(5,0,utf8_decode('ID:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(10,0,$id,0,0,'L'); 
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10,0,utf8_decode('Hora:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(10,0,$hrs,0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(9,0,utf8_decode('Voo:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(22,0,utf8_decode($voo),0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(11,0,utf8_decode('Nome:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(10,0,utf8_decode($nome),0,0,'L');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,0,utf8_decode('Recolha:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,0,utf8_decode($local_pick_up),0,0,'L');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,0,utf8_decode('Entrega:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,0,utf8_decode($local_destino),0,0,'L');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(24,0,utf8_decode('Pt.Referência:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,0,utf8_decode($pt_ref),0,0,'L');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10,0,utf8_decode('Adultos:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(13,0,$px,0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(13,0,utf8_decode('Crianças:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(11,0,$cr,0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(8,0,utf8_decode('Bébé:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(11,0,$bebe,0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(18,0,utf8_decode('Operador:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(50,0,utf8_decode($operador),0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(12,0,utf8_decode('Ticket:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(15,0,utf8_decode($ticket),0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,0,utf8_decode('Cobrar:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(13,0,utf8_decode($acobrar),0,0,'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(9,0,utf8_decode('Obs:'),0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(10,0,utf8_decode($obs),0,0,'L');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(10,0,utf8_decode($obs_cont),0,0,'L');  
    $pdf->Ln(6);
    $i = $i + 1;
    $obs_cont='';
}
}
else $response .= 0;

if($t>0){

$subject = "Os meus transfers para o dia $data_servico"; 
$message = utf8_decode("<h3>Boas $nome_equipa, foram-lhe atribuidos $t transfers, por favor visualize o pdf em anexo.<br/><br/>Se verificar algum erro,
por favor clique <a href='mailto:$from'>Administrador</a>.<br/><br/>Obrigado</h3>");

$subject_admin = "Enviados transfers para o Staff, $nome_equipa, do dia $data_servico"; 
$message_admin = utf8_decode("<h3>Boas administrador, foram enviados os $t transfers, para o Staff $nome_equipa, por favor visualize o pdf em anexo.<br/></h3>");


// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "Servicos_$nome_equipa_$data_servico.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: noreply@".$dmn.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //
$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= $eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";


// no more headers after this, we start the body! //
$body_admin = "--".$separator.$eol;
$body_admin .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body_admin .= $eol;

// message
$body_admin .= "--".$separator.$eol;
$body_admin .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body_admin .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body_admin .= $message_admin.$eol;

$body_admin .= "--".$separator.$eol;
$body_admin .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body_admin .= "Content-Transfer-Encoding: base64".$eol;
$body_admin .= "Content-Disposition: attachment".$eol.$eol;
$body_admin .= $attachment.$eol;
$body_admin .= "--".$separator."--";

mail($to, $subject, $body, $headers);
mail($from, $subject_admin, $body_admin, $headers);
$response .= 1;
}
}

echo $response;

mysqli_close($conn);

?>