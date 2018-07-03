<?php
session_start();
if(isset($_SESSION['equipa'])){
 $id= $_SESSION['pr_uid'];
 require_once '../connect.php';
 $sql_sess = "UPDATE pr_admin SET sessao = 0 WHERE id=$id";
 global $conn;
 $res = mysqli_query($conn,$sql_sess);
 if ($res == 1){
 session_unset(); 
 session_destroy();
 header('Location:login.php');
}
else {
 echo "Erro ".$_SESSION['equipa'].", p.f tente logout novamente.";
 header('Location:index.php');
 }
}
$mysqli->close();
?>