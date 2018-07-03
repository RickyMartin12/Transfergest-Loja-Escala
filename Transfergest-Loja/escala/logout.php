<?php
     session_start();
     unset($_SESSION['privilegios']);
     session_unset(); 
     session_destroy();
$t ="Nova versão, por favor instale qr code da google store e proceda à instalação, é obrigatório permitir a instalação de aplicacões a partir de fontes descohnecidas. Para aceder no dispositivo android por favor clique em Definições -> Segurança -->  Fontes Desconhecidas e check nessa opção";


echo'
<html lang="pt-br"> 
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<link rel="stylesheet" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<hr style="margin-top:10%;">
<h2 style="text-align:center;">Sessão Expirou!</h2><br><h3 style="text-align:center;">Para, iniciar clique: <br><br><a class="btn btn-success btn-lg" href="login.php"><span class="glyphicon glyphicon-log-in">
</span><font class="hidden-xs"> Iniciar</font></a></h3>
<hr>
<p style="text-align:center;">
<img title="'.$t.'" src="transfergest2.jpg" style="width:152px;">
</p>';

 //    header('Location:login.php');
?>