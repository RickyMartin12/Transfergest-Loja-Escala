<?php
define('ROOTDIR', dirname(__FILE__));
session_start();
require ROOTDIR . "/login/nocsrf.php";
$token = NoCSRF::generate( 'csrf_token' );
?>

<!doctype html>
<html lang="pt_PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3n.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<style>



input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0;
}

</style>


<body class="bgimg-1">
<div class="back">
    <div class="load"></div>
</div>

  <!-- Contact Section -->
<div class="w3-padding-16 w3-content w3-text-grey" id="contact">

<div class="w3-row-padding w3-center w3-margin-top">

<div class="w3-col l3 m2 s0">&nbsp;</div>

<div class="w3-col l6 m8 s12 w3-card-2" style="background:rgba(255,255,255,0.65);">

<div class="w3-col l4 m5 s12">
    <div class="w3-center w3-padding-8">
    <img class="w3-animate-zoom w3-image logo_insert" style="max-width:130px; vertical-align: text-top;">
</div>
</div>
<div class="w3-col l8 m7 s12 w3-center w3-padding-8">
    <span class="w3-large w3-text-black w3-center nome_txt"></span><br>
    <span class="morada_txt"></span>
</div>
<div class="freeform w3-col l12">
    <span  title="Periodo para validar os dados são 4 minutos, se expirar tem que actualizar a página (tecla F5)" class="w3-center w3-large">Administração</span>
    <form class="form-signin">      
      <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
      <p><input readonly title="Acessos" class="w3-input w3-padding-8 w3-border" type="number" id="acessos" placeholder="Acessos *" name="acessos" autofocus></p>
      <p><input readonly title="Insira Utilizador" class="w3-input w3-padding-8 w3-border" type="text" id="utilizador" placeholder="Utilizador *" name="utilizador"></p>
      <p><input readonly title="Insira Password" class="w3-input w3-padding-8 w3-border" type="password" id="password" placeholder="Password *" name="password"></p>
      <!--
 
       -->

     <div class="w3-row w3-padding-16">
     <div class="w3-col s2">&nbsp;</div>
     <div class="w3-col s4">
        <button title="Limpar campos Utilizador e Password "class="w3-button btn w3-sand w3-medium" disabled type="reset">
           <i class="fa fa-eraser"></i><span class="w3-hide-small"> Limpar</span>
        </button>
</div>
     <div class="w3-col s4 w3-light-grey">
        <button title="Submeter Utilizador e Password" class="percentagem w3-red w3-left w3-button w3-medium" disabled type="submit">0
        </button>
     </div>
</div>     
    </form>
  </div>
    </div>
    </div>
  </div>  
<div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
     <div class="w3-col l3">&nbsp;</div>
      <div class="w3-center w3-col l2 m4 s4 w3-padding-4">
<img class="w3-image w3-hide img-1" src="css/images/ssl.png">
        <p></p>
      </div>
      <div class="w3-center w3-col l2 m4 s4 w3-padding-4">
<img class="w3-image w3-hide img-2" src="css/images/slk.png">
        <p></p>
      </div>
      <div class="w3-center w3-col l2 m4 s4 w3-padding-4">
<img class="w3-image w3-hide img-3" src="css/images/trt.png">
        <p></p>
      </div>
    </div>

<div id="showerrors" class="w3-modal" style="display: none;">
  <div class="w3-modal-content w3-animate-zoom" style="max-width:600px;">
    <div class="w3-container header w3-red">
      <span onclick="$('#showerrors').css('display','none')" class="w3-button w3-display-topright w3-medium">x</span>
      <h3 class="messagehead"></h3>
    </div>
    <div class="w3-container w3-padding-4">
        <p class="messagetxt"></p>
        <p></p>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/loader2.js"></script>
<script>
loaderInit(1);
x = -1
carousel();
function carousel() {
    x++
    if (x < 4){ 
      $('.img-'+x).addClass('w3-animate-zoom').removeClass('w3-hide')
      setTimeout(carousel, 1100)
    }
}
</script>
</body>
</html>