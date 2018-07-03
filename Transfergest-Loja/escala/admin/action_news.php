<?php
require_once '../connect_admin.php';

switch ($_POST['action']){

/*OBTER NOTICIAS*/
case '1':
$obter_comp=" SELECT * FROM noticias WHERE mostrar = 'S' ORDER BY datacriacao DESC ";
$result = mysqli_query($conn_admin, $obter_comp);
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result))
{
$data_criacao = $row['datacriacao'];
$noticias =  $row['noticias'];
$id = $row['id'];
$not = substr($noticias, 0, 20) . '...';
$not = "ID".$id.":".$not;
$not= "'$not'";
if (strlen($data_criacao) > 16)
$data_criacao = substr($data_criacao, 0, 16) . '';
$news[] = array('datacriacao' =>$data_criacao,'noticias' =>'<a href="#" style="font-size:18px; cursor:pointer;" onclick="seeMore('.$not.')" title="Saber mais">'.$noticias.'</a>');
}
echo json_encode($news);
}
else {

$news[] = array('inicio' =>$latest);

$news='';
echo json_encode($news);
}
break;


case '2':

$admins="SELECT nome,email FROM administradores WHERE no_del = '1' ";
$result = mysqli_query($conn_admin, $admins);
if(mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result))
 {
  $nome_ad = $row['nome'];
  $email_ad =  $row['email'];
 }
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$dominio = $_POST['dominio'];
$obs = $_POST['obs'];

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: <suporte@programasdegestao.com>' . "\r\n";
$headers .= 'Cc: noreply' . "\r\n";

$email_subject_client ="Olá ".$nome.", obrigado pelo seu contacto.";
$email_body_to_client='
<p>
<strong>Nome: </strong> '.$nome.'<br>
<strong>Email: </strong> '.$email.'<br>
<strong>Assunto: </strong> '.$assunto.'<br>
<strong>Dominio: </strong> '.$dominio.'<br>
<strong>Obs: </strong> '.$obs.'</p>';

mail($email,$email_subject_client,$email_body_to_client,$headers);

if($email_ad){

$email_subject_supplier ="Olá ".$nome_ad.", recebeu um pedido de informações.";
$email_body_to_supplier ='
<p>
<strong>Nome: </strong> '.$nome.'<br>
<strong>Email: </strong> '.$email.'<br>
<strong>Assunto: </strong> '.$assunto.'<br>
<strong>Dominio: </strong> '.$dominio.'<br>
<strong>Obs: </strong> '.$obs.'</p>';
     mail($email_ad,$email_subject_supplier,$email_body_to_supplier,$headers);
}
echo 11;

break;
}








mysqli_close($conn_admin);
?>
