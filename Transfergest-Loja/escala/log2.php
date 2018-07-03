<?php
session_start();

include('nocsrf.php');

$token = NoCSRF::generate( 'csrf_token' );

?>

<!DOCTYPE html>
<html>
<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 4px}

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.bgimg-1 {
    background-image: url('b1.jpg');
    min-height: 100%; 
    background-color:rgba(0,0,0,.9);    
}

</style>
<body class="bgimg-1">
  <!-- Contact Section -->
<div class="w3-padding-16 w3-content w3-text-grey" id="contact">

<div class="w3-row-padding w3-center w3-margin-top">

<div class="w3-col l3 m2 s0">&nbsp;</div>

<div class="w3-col l6 m8 s12 w3-card-2" style="background:rgba(255,255,255,0.65);">


<div class="w3-col l4 m5 s12">
    <div class="w3-center w3-padding-16">
    <img src="definitions/upload/logo1.png" class="w3-image" style="max-width:130px; vertical-align: text-top;">
</div>
</div>
<div class="w3-col l8 m7 s12 w3-center">
    <p><span class="w3-large w3-text-black w3-margin-right">Oseubackoffice, Unip, Lda</span></p>
    <p>Estr. Sta Eulália, 8200-249 Albufeira</p><br>
</div>

<div class="w3-col l12" style="margin-bottom: -20px; margin-top: -10px;">
    <div class="w3-light-grey" style="height:23px;">
      <div id="myBar" class="w3-container w3-center w3-red" style="height:23px;width:0px;">0%</div>
    </div><br>
</div>

<div class="freeform w3-opacity w3-col l12">
    <h3>Login </h3>
    <form id="login" autocomplete="off">
       <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
      <p><input readonly class="w3-input w3-padding-8 w3-border" type="text" placeholder="Utilizador *" required name="name"></p>
      <p><input readonly class="w3-input w3-padding-8 w3-border" type="password" placeholder="Password *" required name="password"></p>
      <p>
        <button class="w3-button w3-sand w3-medium" disabled type="reset"><i class="fa fa-eraser"></i><span class="w3-hide-small"> Limpar</span>
        </button>
        <button class="w3-button w3-green w3-medium" disabled type="submit"><i class="fa fa-check"></i><span class="w3-hide-small"> Submeter</span>
        </button>
      </p>
    </form>
  </div>
    </div>
    </div>
  </div>  

<div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
     <div class="w3-col l3">&nbsp;</div>
      <div class="w3-center w3-col l2 m4 s4 w3-padding-4">
<img class="w3-image" style="max-width:130px;width:95%;" src="css/images/ssl.png">
        <p></p>
      </div>
      <div class="w3-center w3-col l2 m4 s4 w3-padding-4">
<img class="w3-image" style="max-width:130px;width:95%;" src="css/images/slk.png">
        <p></p>
      </div>
      <div class="w3-center w3-col l2 m4 s4 w3-padding-4">
<img class="w3-image" style="max-width:130px;width:95%;" src="css/images/trt.png">
        <p></p>
      </div>
    </div>




<div id="showerrors" class="w3-modal" style="display: none;">
  <div class="w3-modal-content w3-animate-zoom" style="max-width:600px;">
    <div class="w3-container header w3-red">
      <span onclick="document.getElementById('showerrors').style.display='none'" class="w3-button w3-display-topright w3-medium">x</span>
      <h3 class="messagehead"></h3>
    </div>
    <div class="w3-container w3-padding-4">
        <p class="messagetxt"></p>
        <p></p>
    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

setTimeout(function(){ move(); }, 1000);

function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 20);
  function frame() {
  if (width == 100) {
      clearInterval(id);
      $('#myBar').removeClass('w3-red').addClass('w3-light-green');
      $('.freeform').removeClass('w3-opacity'); 
      $('.w3-button').attr('disabled',false);
      $('.w3-input').attr('readonly',false);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}


$(document).ready(function(){

$("#login").on("submit", function(e) {
    datav=$(this).serialize()
    e.preventDefault()
    datav=$(this).serialize()
    $.ajax({
        type: "POST",
        url: "inf.php",
        data: datav,
        cache: false,
        success: function(data) {
          obj = JSON.parse(data)
          if (obj.csrf=='1'){
          $('#showerrors .header').addClass('w3-green').removeClass('w3-red')
          $('#showerrors').css('display','block')
          $('.messagehead').text('Sucesso') 
          $('.messagetxt').html(obj.n+'<br>'+obj.p)
          }
        },
        error: function(data) {
          $('#showerrors .header').addClass('w3-red').removeClass('w3-green')
          $('#showerrors').css('display','block')
          $('.messagehead').text('Aviso')
          $('.messagetxt').html(data)
        }
    })
})
})

</script>

</body>
</html>
 