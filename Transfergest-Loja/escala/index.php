<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');

session_start();
if(!$_SESSION['name'] && !$_SESSION['folder']){
header("Location:login.php");
}

if(time() - $_SESSION['start'] > 9000) {
unset($_SESSION['name'], $_SESSION['start'], $_SESSION['folder']);
session_destroy();
echo '
<html lang="pt-br"> 
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

<link rel="stylesheet" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<hr style="margin-top:10%;">
<h2 style="text-align:center;">Sessão Expirou!</h2><br><h3 style="text-align:center;">Por favor, inicie a sessão. <br><br><a class="btn btn-success btn-lg" href="login.php"><span class="glyphicon glyphicon-log-in">
</span><font class="hidden-xs"> Iniciar</font></a></h3>
<hr>';
}

else{

$_SESSION['start'] = time();

require_once 'connect.php';
require_once 'connect_admin.php';

unset($_POST);
?>

<!DOCTYPE html> 

<?php echo str_replace(' ', '',$_SESSION['folder']); ?>

<html lang="pt-br"> 
<head>
 <title>TransferGest V2.0.1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css"> 
    <link rel="stylesheet" href="css/system.css">
    <link href="css/highlight.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-switch.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jqx.base.css" type="text/css"/>
    <link rel="stylesheet" href="css/select2.min.css" type="text/css"/>
    <link href="css/color-picker.min.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet">
    <link href="manifest.json" rel="manifest">  
    <script src="js/jquery-2.1.1.min.js"></script>
</head>

<body onload="detectmob(),transfersLinks(0), callServicesTemplate(),callAdminNews()">
  <input id='val' type='hidden'>  
  <div class="back" style="display:block;">
    <div class='load'></div>
    <h4 id="waiting" class="waiting">Por favor, aguarde a sincronizar...</h4> 
  </div>
  <?php require_once 'modals.php'; ?>
  <?php require_once 'newnav.php'; ?>
  <div class="container-fluid main-container" style="margin-left:205px; padding-right: 0px; padding-left: 0px;">
    <div class="row"style="padding-left:0px!important; padding-right:0px!important; margin-right:0px; margin-left:0px;" >
      <div class="col-lg-12">
        <div id="services"></div>  
        <div id="insert">
        </div>
      <span class="to_top btn btn-default no print" title="To top...">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </span>
    </div>
  </div> 
  <h3 class="col-xs-8 col-xs-offset-2 complete_in"></h3>
</div>
  <input type="hidden" id="myvalid">
</body>

  <script src="js/firebase.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap-switch.min.js"></script>
  <script src="js/moment-with-locales.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>
  <script src="js/system_team.js"></script>
  <script src="js/system_admin.js"></script>
  <script src="js/system_operator.js"></script>
  <script src="js/system_registries.js"></script>
  <script src="js/comuns.js"></script>
  <script src="js/select2.full.min.js"></script>
  <script src="js/system_schedules.js"></script>
  <script src="js/bootbox.min.js"></script>
  <script src="js/highlight.js"></script>
  <script src="js/main.js"></script>
  <script src="js/admin_news.js"></script>

<!-- OK -->
<!--
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDStLYcYnL_jyIcmrChfZ3rGp71WBHHBmc&libraries=place"></script>
-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDStLYcYnL_jyIcmrChfZ3rGp71WBHHBmc&libraries=places&sensor=false"></script>
  <script src="js/system_services.js"></script>
  <script src="js/system_map.js"></script>
  <script src="js/system_expensies.js"></script>
  <script src="js/system_management.js"></script>
  <script src="js/system_definitions.js"></script>
  <script src="js/system_vehicules.js"></script>
  <script src="js/system_despesas.js"></script>
  <script src="js/system_reports_despesas.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/charts.js"></script> 
  <script> google.charts.load('current', {'packages':['corechart']});</script>
  <script src="js/tinymce/tinymce.min.js"></script>


<script>
    var config = {
        apiKey: "AIzaSyA3HsZjV69iFG8B6lpMURDrqxk8nxyoBeU",
        authDomain: "myprj-22464.firebaseapp.com",
        databaseURL: "https://myprj-22464.firebaseio.com",
        storageBucket: "myprj-22464.appspot.com",
        messagingSenderId: "757526252782"
    };
    firebase.initializeApp(config);
</script>
<script>
    $(function () {
        //firebase cloud messaging
        const messaging = firebase.messaging();

        //check if token already has been generated
        if (window.localStorage.getItem('FirebaseTokenSentToServer') != 1) {
            messaging.requestPermission()
                .then(function () {
                    messaging.getToken()
                        .then(function (token) {

                            //register user to topic
                            $.ajax({
                                url: '/operators/json.php',
                                type: 'POST',
                                data: {
                                    action: 11,
                                    token: token
                                },
                                cache: false,
                                error: function (error) {
                                   // alert('error');
                                   $('.debug-url').html('Surgiu um erro!');
                                   $("#Modalko").modal();
                                }
                            });
                        })
                        .catch(function (err) {
                           // alert('Unable to retrieve token ', err);
                           $('.debug-url').html('Não foi possivel obter token de notificações.');
                           $("#Modalko").modal();
                        });
                    window.localStorage.setItem('FirebaseTokenSentToServer', 1);
                })
                .catch(function (err) {
                       //alert('Não foi possivel obter permissão para notificar.', err);
                       $('.debug-url').html('Não foi possivel obter permissões para notificações.');
                       $("#Modalko").modal();
                });
        }

        //TODO
        messaging.onMessage(function (payload) {
      
   $('.debug-url').html('Recebeu um novo Serviço de Operador.');
   $("#Modalok").modal();

            //alert("Me received. ", JSON.stringify(payload));
        });
    });

function getEventsData(vl){
if (vl == 1) window.open("/schedule/shedule_day.php");
else {
StopgetAnalitics();
$('.back').show();
  setTimeout(function(){
   $.ajax({url: "registries/call_registries_actions.php",error:function(){
   $('.debug-url').html('Erro ao obter o formulário de Edição de Serviços Base, p.f. verifique a ligação Wi-Fi.');
   $("#Modalko").modal();}
 })
 .done(function( html ) { $( "#insert" ).html(html); operatorsPending(vl);});
 }, 500);
}

}

function getOperatorServices(){
   url = window.location.href;
   if (url.match(/service/g) && url.match(/type/g)){
    url = url.replace("#","");
    id = /service=([^&]+)/.exec(url)[1];
    tipo = /type=([^&]+)/.exec(url)[1];
    if(id && tipo){
      $('.back').show();
      $('#myvalid').val(id);
      setTimeout(function(){
         $.ajax({url: "registries/call_registries_actions_byidref.php",error:function(){
       	   $('.debug-url').html('Não foi possivel obter o Serviço por Id/Refº, p.f. verifique a ligação Wi-Fi.');
     	   $("#mensagem_ko").trigger('click');}
         })
      	.done(function( html ) {$( "#insert" ).html(html);});
        setTimeout(function(){searchServicesId($('#myvalid').val()); }, 500);
      	}, 1500);
    }
  }
}

</script>

</html>

<?php

}

?>