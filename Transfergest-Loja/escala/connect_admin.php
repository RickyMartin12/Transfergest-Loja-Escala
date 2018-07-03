<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oa1uszym_admin";
$conn_admin = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn_admin) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}
?>