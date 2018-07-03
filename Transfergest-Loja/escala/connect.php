<?php


require 'dbvars.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}

date_default_timezone_set('Europe/Lisbon');

include 'dbGetdomains.php';

$http_origin = $_SERVER['HTTP_ORIGIN'];

$allowed = getDomains($conn);

/*TRES DOMINIOS APENAS PODEM LIGAR A LOJAS*/

if ($http_origin == "http://".$allowed[0] || $http_origin == "http://www.".$allowed[0] || $http_origin == "https://".$allowed[0] || $http_origin == "https://www.".$allowed[0])
{ 
  header("Access-Control-Allow-Origin: $http_origin");
}

else if ($http_origin == "http://".$allowed[1] || $http_origin == "http://www.".$allowed[1] || $http_origin == "https://".$allowed[1] || $http_origin == "https://www.".$allowed[1])
{ 
  header("Access-Control-Allow-Origin: $http_origin");
}

else if ($http_origin == "http://".$allowed[2] || $http_origin == "http://www.".$allowed[2] || $http_origin == "https://".$allowed[2] || $http_origin == "https://www.".$allowed[2])
{ 
  header("Access-Control-Allow-Origin: $http_origin");
}

header('Access-Control-Allow-Methods: POST');


?>