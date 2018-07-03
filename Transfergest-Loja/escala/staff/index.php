<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if(!$_SESSION['equipa']){
header("Location:login.php");
}
/* TEMPO DA SESSÃO
if(time() - $_SESSION['start'] > 300) {
unset($_SESSION['equipa'], $_SESSION['start']);
session_destroy();
echo "
<html lang='pt><head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<h3 style='text-align:center; padding-bottom:30px;'>Sessﾃ｣o Expirou!</h3>
<button style='padding:10px;'><a href='login.php'>Inicie a sessﾃ｣o aqui</a></button></head></html>";
}
*/

else{
$_SESSION['start'] = time();
unset($_POST);
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
  
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="equipa_1.1">
  <meta name="autor" content="Pedro Viegas">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/system.css">
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment-with-locales.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>
  <script src="js/system.js"></script>
</head>

<script>
</script>

<?php include('modals.php');?>
<body onload ="getHoje('<?php echo $_SESSION['equipa'];?>');">
<div class="container-fluid">
<audio id="myAudio">
  <source src="alarm.mp3" type="audio/mpeg">
</audio>
<div class="mynav">
<div class="row">
<div class="btn-group" role="group" aria-label="teamnav2">


<form id="seepdf" action="pdf.php" method="post">
<input type="hidden" id="userrec" name="user" value="<?php echo $_SESSION['equipa'];?>">
<input type="hidden" id="changedaynr" name="day" value="1">
<button type="submit" class="btn btn-default" title="Ver/Guardar PDF" value="Submit"><span class="glyphicon glyphicon-save-file"></span> PDF</button>
</form>

</div>
<div class="btn-group" style="float:right;" role="group" aria-label="teamnav3">
<button  class="btn btn-warning no_print" onclick="logOut('<?php echo $_SESSION['equipa'];?>');"><span class="glyphicon glyphicon-log-out"></span> Sair, <?php echo $_SESSION['equipa'];?></button>
</div>
</div>
<div class="row">
<div class="btn-group" role="group" aria-label="teamnav1">
<button onclick ="getOntem('<?php echo $_SESSION['equipa'];?>');" class="btn btn-default"/><span class="glyphicon glyphicon-search"></span> Ontem</button>
<button onclick ="getHoje('<?php echo $_SESSION['equipa'];?>');" class="btn btn-primary new_transfer"/><span class="glyphicon glyphicon-search"></span> Hoje</button>
<button onclick ="getAmanha('<?php echo $_SESSION['equipa'];?>');" class="btn btn-info"/><span class="glyphicon glyphicon-search"></span> Amanhã</button>
</div>
</div>
</div>

<h3 id="search" class="search"></h3>
<div id="servicos" class="servicos"></div>

<span class="to_top btn btn-default" title="To top...">
<span class="glyphicon glyphicon-chevron-up"></span>
</span>

</div>
<script>

/*
$('#seepdf').on('submit',function(){
dataValue=$(this).serialize();
  $.ajax({ url:'pdf.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     console.log(data);
    },
    error: function(){
console.log(data);
    }
  });
});

*/




var x = document.getElementById("myAudio");
function playAudio() { 
    x.play(); 
} 
</script>
</body>
</html>
<?php
}
?>