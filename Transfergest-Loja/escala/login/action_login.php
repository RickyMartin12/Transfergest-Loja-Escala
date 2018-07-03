<?php
  session_start();
  
  require_once 'nocsrf.php';
  include '../dbvars.php';

  $folder = explode('_',$dbname);

  $err='';
/*
  if (!$_POST['acessos'])
  $err .= '- Acessos * <br>';
  else if ($_POST['acessos']){
   $contribuinte = filter_var($_POST['acessos'], FILTER_SANITIZE_NUMBER_INT);
   $contribuinte = str_replace('+','',$contribuinte);
   $contribuinte = str_replace('-','',$contribuinte);
   if ($_POST['acessos'] != $contribuinte)
      $err.= '- Acesso inválido *<br>';
   else if (strlen($contribuinte) < 9)
      $err .= '- Acessos Min. 9 digítos *<br>';
   else if (strlen($contribuinte) > 10)
      $err .= '- Acessos Máx. 10 digítos *<br>';
   else 
      $_SESSION['acess'] = $contribuinte;
  }
*/
  if (!$_POST['utilizador'])
  $err .= '- Utilizador * <br>';
  else 
  $utilizador = $_POST['utilizador']; 
  
  if (!$_POST['password'])
    $err .= '- Password * <br>';
  else 
    $password=$_POST['password']; 
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        // Run CSRF check, on POST data, in exception mode, periodo valido token, in one-time mode.

        NoCSRF::check('csrf_token', $_POST, true, 240, true);

      if(!$err){
        require_once '../connect.php';
        $utilizador = $_POST['utilizador'];
        $password   = $_POST['password'];
        $utilizador = stripslashes($utilizador);
        $password = stripslashes($password);
        $utilizador = mysqli_real_escape_string($conn, $utilizador);
        $password = mysqli_real_escape_string($conn, $password);
        $password = md5(trim($_POST['password']));

/*TABELA ADMINISTRADORES VERIFICAR DADOS*/

        $sql = "SELECT * FROM admins WHERE nome='$utilizador' AND pass='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['pr_uid']=$row['id'];
            $_SESSION['name']=$row['nome'];
            $_SESSION['privilegios'] = $row['tipo'];
            $_SESSION['start'] = time();
            $success ='login.php';
          }         
        }
        else{
        $sql = "SELECT * FROM su_sudo WHERE nome='$utilizador' AND pass='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['pr_uid']=$row['id'];
            $_SESSION['name']=$row['nome'];
            $_SESSION['privilegios'] = $row['tipo'];
            $_SESSION['start'] = time();
            $success ='login.php';
         }
       }

}

if(!isset($success))
$err ='Utilizador ou Password incorretos';
else{

 $setpriv = "SELECT * FROM privilegios WHERE tipo= '".$_SESSION['privilegios']."' ";
      $res = mysqli_query($conn, $setpriv);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
           $_SESSION['m10'] = $row['m10'];
           $_SESSION['m11'] = $row['m11'];
           $_SESSION['m12'] = $row['m12'];
           $_SESSION['m13'] = $row['m13'];
           $_SESSION['m14'] = $row['m14'];
           $_SESSION['m20'] = $row['m20'];
           $_SESSION['m21'] = $row['m21'];
           $_SESSION['m22'] = $row['m22'];
           $_SESSION['m23'] = $row['m23'];
           $_SESSION['m24'] = $row['m24'];
           $_SESSION['m25'] = $row['m25'];
           $_SESSION['m30'] = $row['m30'];
           $_SESSION['m31'] = $row['m31'];
           $_SESSION['m32'] = $row['m32'];
           $_SESSION['m33'] = $row['m33'];
           $_SESSION['m34'] = $row['m34'];
           $_SESSION['m40'] = $row['m40'];
           $_SESSION['m41'] = $row['m41'];
           $_SESSION['m42'] = $row['m42'];
           $_SESSION['m43'] = $row['m43'];
           $_SESSION['m50'] = $row['m50'];
           $_SESSION['m51'] = $row['m51'];
           $_SESSION['m52'] = $row['m52'];
           $_SESSION['m53'] = $row['m53'];
           $_SESSION['m60'] = $row['m60'];
           $_SESSION['m61'] = $row['m61'];
           $_SESSION['m62'] = $row['m62'];
           $_SESSION['m63'] = $row['m63'];
           $_SESSION['m70'] = $row['m70'];
           $_SESSION['m71'] = $row['m71'];
           $_SESSION['m72'] = $row['m72'];
           $_SESSION['m73'] = $row['m73'];
           $_SESSION['m80'] = $row['m80'];
           $_SESSION['m81'] = $row['m81'];
           $_SESSION['m82'] = $row['m82'];
           $_SESSION['start'] = time();
           $_SESSION['folder'] = $folder[1];
           $success = 'index.php';
       }
     }
   }
  }                           
  $arr = array('error'=>$err, 'id'=>$id, 'success'=>$success);
  }
  catch ( Exception $e )
  {
  // CSRF attack detected
  $arr = array('error'=>'Atualize a página (tecla F5), e tente novamente!', 'id'=>'', 'success'=>'');
  }
  }

          echo json_encode($arr);
?>
