<?php

require_once '../connect.php';

switch ($_POST['action']){

case '17':
$st =  $_POST['staff'];

if ($st == 'Atribuir' || $st =='0')
$st='';

$id =  $_POST['id'];
$upd = "UPDATE excel SET staff = '$st' WHERE id = $id";
 $result = mysqli_query($conn,$upd);
  if ($result)
  echo 1; 
  else  
   echo 0;
break;


case '18':

$vt =  $_POST['viatura'];

$vt == 'Atribuir' ? $vt='' : $vt = str_replace('-','',$vt);

$id =  $_POST['id'];
$upd = "UPDATE excel SET matricula = '$vt' WHERE id = $id";
 $result = mysqli_query($conn,$upd);
  if ($result)
  echo 1;
else  
 echo 0;
break;


}mysqli_close($conn);

?>
