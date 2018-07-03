<?php
session_start();


require_once '../connect.php';
$auth_error='';
if(isset($_POST['login'])){
    $sql = "SELECT * FROM pr_admin WHERE equipa='".trim($_POST['equipa'])."' AND password='".md5(trim($_POST['password']))."'";
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
{
        while($row = mysqli_fetch_assoc($result))
{          /* $_SESSION['sessao'] = $row['sessao'];*/
            $_SESSION['pr_uid'] = $row['id'];
            $_SESSION['equipa'] = $row['equipa'];
            $_SESSION['email'] = $row['email'];
        }
}


if (isset($_SESSION['pr_uid']) && isset($_SESSION['equipa']))
 {
 $auth_error="Login com sucesso.";
 $_SESSION['start'] = time();
 header('Location:index.php');
 }

 else if (isset($_SESSION['pr_uid']) && isset($_SESSION['equipa']))
 {
 $auth_error="Palavra passe ou nome inválido";
 }

mysqli_close($conn);
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="equipa_1.1">
  <meta name="autor" content="Pedro Viegas">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="css/system.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
</head>

<style>

.jumbotro{box-shadow: 1px 1px 24px #bbb;
width:350px; margin:0 auto; height: 430px;
padding: 30px 5px;
border-radius: 20px;}


.bg-danger{
    font-size: 16px;
    padding: 10px;
background-color: #f2dede;
    border: 1px solid #ebccd1;
 color: #a94442;
    border-radius: 4px;}

body{
padding-top:0px;
    min-height: 100vh;
    background-image: url("/css/fundo.png");
}

</style>

<body>
<div class="container">
<div class='row'>
<?php if (trim($auth_error)){ ?>
	<p class="bg-danger col-xs-10 col-md-4 col-sm-6 col-md-offset-4 col-xs-offset-1 col-sm-offset-3"><?php echo $auth_error;?></p>
<?php } ?>
</div>

<form class="form-horizontal" method="post">
<div class="row">
<div class="jumbotro">
<div class="" style="margin:0 auto ;height:150px; border-radius:50%; width:150px;border:1px solid #ccc;background:#FFF; ">
<p style="text-align:center; vertical-align: middle;"><img class="logo_insert" style="margin-top: 39px;width: 125px;" src="css/logo-ini.png"></p>
<p style="text-align: center; font-size: 10px;">Staff</p>
</div>
<div class="col-md-12" style="margin-top: 15px;">
 <div class="form-group-lg">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" required class="form-control" name="equipa" id="inputEquipa" placeholder="Nome *">
</div>
</div>
</div>
<div class="col-xs-12" style="margin-top: 15px;">
 <div class="form-group-lg">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-asterisk"></span></span>
<input type="password" required class="form-control" name="password" id="inputPassword" placeholder="Password *">
</div>
</div>
</div>
<div class='col-xs-12' style="margin-top: 15px;">
<div class="form-group-lg">
<button type="submit" name="login" value="login" class="col-xs-12 btn btn-success btn-lg"><span class="glyphicon glyphicon-ok"></span> Entrar</button>
</div>
</div>
</div>
</div>
</form>

</div>
</body>
</html>


