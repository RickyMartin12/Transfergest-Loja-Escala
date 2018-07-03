<?php

function getDomains($conn){

$sql = "SELECT dominio FROM operador WHERE loja = 'checked' ORDER BY nome ASC LIMIT 3";

  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0)
  {  
    while($row = mysqli_fetch_assoc($result))
    {
      $domains[] = $row["dominio"];
    }
  }

return $domains;

mysqli_close($conn);
}



?>

