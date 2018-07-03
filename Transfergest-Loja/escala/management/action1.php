<?php
require_once '../connect.php';
global $conn;
$obj = $_POST['myData'];
$response='';
foreach($obj as $row){
$valor = $row['preco'];
$id = $row['id'];

  $query = "UPDATE classe_precos SET valor = $valor WHERE id = $id ";
   $result = mysqli_query($conn,$query);
	if ($result) $response .= 1;
	else $response .= 0;
}
echo $response;

mysqli_close($conn);
?>
