<?php
require_once 'connect.php';
global $conn;
$headers = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$email_body_supplier='';

$response='';
$sql ="SELECT * FROM pr_admin WHERE id = ('{$_POST['id']}')";
$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$email = $row['email'];
	$nome = $row['equipa'];
	$from = 'noreply';
	$headers .= "From:" . $from;
$email_subject = "Olá $nome, foi alterada a escala.";
$email_body_supplier ="Por favor, clique em <a href='http://escala.programasdegestao.com/equipa></a>";
mail($email,$email_subject,$email_body_supplier,$headers);
	}
}

$conn->close();
?>