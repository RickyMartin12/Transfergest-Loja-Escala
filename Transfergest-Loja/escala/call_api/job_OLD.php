<?php

require_once '../connect.php';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.algarvefaroairporttransfers.com/info/7ad65f59d2a46a0a5644fc2c2c6ac31b97a45b5b/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{
\"id\":\"2352\"}");
curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type: application/json"));
$response = curl_exec($ch);
curl_close($ch);
var_dump($response);
echo var_dump($response);








mysqli_close($conn);


?>