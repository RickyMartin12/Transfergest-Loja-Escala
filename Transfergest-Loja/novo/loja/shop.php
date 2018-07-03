<?php require_once 'acess.php'; ?>
<?php include_once 'modals.php'; ?>


<style>

#select2-all-places-container, #select2-match-places-container, #select2-all-classes-container {
    width: 100%;
}


.select2-container {
    width: 100%!important;
}


#page-top {
    margin-top: 30px;
}

span.btn-primary.input-group-addon:hover {
    background: #272982;
}

.bootstrap-datetimepicker-widget table td.active, .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #272982;
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}


.nav-tabs > li.active a {
    color: #272982!important;
    background: rgba(186, 198, 201, 0.85098)!important;
}

.nav-tabs > li a {
    color: #000!important;
    background: #fff!important;
}


#promo-code{
    border-color: #adadad;
    font-size: 14px;
    color: #000;
    padding: 4px 10px;
}



.btn-success{
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;}



.navbar-header{
background:rgba(0,0,0,0.3);
}

.w3-margin-right {
    margin-right: 5px!important;
}

a{
cursor:pointer!important;
}
.nav-tabs>li{
cursor:pointer;
opacity:0.7;}

.nav-tabs>li:hover{opacity:1;}

.active{opacity:1!important;}
</style>








<div class="container-fluid" id='search-prods' onload='callDefinitions()'>

<div class="row">
<div class="col-lg-12">

<ul class="nav nav-tabs" id="all-cats"></ul>

<form id='transfer-form' style='margin-bottom: 0px;'>
<input type='hidden' name='types' id='types'>
<input type='hidden' name='categoria' id='cat'>

<div class='row  type-1'>


<div class='col-xs-push-6 col-xs-4 col-lg-1 col-lg-push-10' style='z-index:2;'>
<img title ='PT' onclick = "languages('pt'); setTimeout(function(){ showProds($('#types').val(),$('#cat').val()); }, 100);" class='flags active-pt img responsive' src="loja/images/pt.png" />
</div>
<div class='col-xs-push-4 col-xs-4 col-lg-1 col-lg-push-10' style='z-index:1;'>
<img title='EN-GB' onclick = "languages('en-gb'); setTimeout(function(){ showProds($('#types').val(),$('#cat').val()); }, 100); " class='flags active-en-gb' src="loja/images/en.png" />
</div>


  <div class='col-xs-12'>
  <h3 style='text-align:center; margin-top: 10px;' class='QUOTES'></h3>
  </div>
  <div class="col-lg-4 col-md-6 col-xs-12 form-group">
  <span class="glyphicon glyphicon-calendar"></span> 
  <font class='HOUR_RESERVATION'></font>
    <div class='input-group date' id="data_reserva">
    <input type='text' id='not-recomended' readonly name="data_reserva" class="form-control HOUR_RESERVATION_LABEL"/><span class="btn-primary input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-xs-12 form-group">
  <span class="glyphicon glyphicon-map-marker"></span> <font class='FROM'></font>
  <select required class="form-control" id='all-places' name='from' onchange="showMatch(this.value, $('#types').val(), $('#cat').val())"><option value=''> *</option></select>
  </div>
  <div class="col-lg-4 col-md-6 col-xs-12 form-group">
  <span class="glyphicon glyphicon-screenshot"></span> <font class='TO'></font>
  <select required class="form-control" id='match-places' name='to' onchange="showMatch2(this.value, $('#types').val(),$('#all-places').val(), $('#cat').val())"><option value=''>*</option></select>
  </div>
  <div class="col-lg-4 col-md-6 col-xs-12 form-group">
  <span class="glyphicon glyphicon-signal"></span> 
  <font class='PASSENGERS'></font>
  <select required class="form-control" id='all-classes' name='passagers' onchange="showProdPrice(this.value)"><option value=''>*</option></select>
  </div>
  <div class="col-lg-4 col-md-6 col-xs-12 form-group">
  <span class="glyphicon glyphicon-retweet"></span> <font class='RETURN'></font><br>
  <label class="radio-inline">
  <input value='No' id='ret-f' type="radio" name="oneway" checked="checked" onchange='showReturn(this.value)'><font class='NO radio-txt'></font>
  </label>
  <label class="radio-inline">
  <input value='Yes' id='ret-t'  type="radio" name="oneway" onchange='showReturn(this.value)'><font class='YES radio-txt'></font>
  </label>
  </div>

  
  
  
  
  <div class="col-lg-4 col-md-6 col-xs-12 form-group">
    <span class="glyphicon glyphicon-compressed"></span> <font class='PROMO_CODE'></font>
    <div class="input-group">
    <input class="form-control" name='promo' id='promo-code' onkeydown='sizeI(this.value)'> <span class="input-group-btn"><button onclick='showVerificationPromo($("#promo-code").val())' class="btn btn-default check-code VALIDATE" type="button"></button></span>
    </div>
  </div>
    <div class="col-lg-4 col-md-6 col-xs-12 form-group promo-label-display">
      <span class=" glyphicon glyphicon-gift"></span> <font style="text-transform: uppercase; font-size: 16px;" class='PROMO_CODE'></font><br>
      <div class='promo-display'></div>
  </div>
</div>

<div class="col-lg-3 col-xs-6 col-lg-push-6">
<h2 class='prod-price' id='prod-price'></h2>
</div>
<div class="col-lg-3 col-xs-6 col-lg-push-6">
<button style='float:right;margin-top: 10px; margin-bottom:10px;' type='submit' class="book-now btn btn-success BOOK_NOW"></button>
</div>
<div class="row pd-tp-bo">
<div class='col-lg-6 col-xs-12 col-lg-pull-6'>

<div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1" style='padding-top:8px;'>

<img style='margin:0 auto; max-height:30px;' class='img-responsive available-payments'/>

</div>


</div>
</div>
</form>

<div id="info-client"></div> 
</div>
</div>

<input type='hidden' class='CHOOSE'>
<input type='hidden' class='TOTAL'>
<input type='hidden' class='NO_CONNECTION'>
<input type='hidden' class='NO_CODE'>
<input type='hidden' class='NO_ORIGIN'>
<input type='hidden' class='NO_DESTINATION'>
<input type='hidden' class='REQUIRED'>
<input type='hidden' class='SESSION_EXPIRED'>
<input type='hidden' class='LANGUAGE'>
<input type='hidden' class='CONFIRM_DETAILS'>
<input type='hidden' class='PURCHASE'>
<input type='hidden' class='CLOSE'>
<input type='hidden' class='YOUR_ORDER'>
<input type='hidden' class='DATA_ERROR'>
<input type='hidden' class='MIN_PAX'>
<input type='hidden' class='TRY_AGAIN'>
<input type='hidden' class='MAX_PAX'>
<input type='hidden' class='ERROR_PAX'>
<input type='hidden' class='PAYMENT_TO_DRIVER'>
<input type='hidden' class='PAYMENT_PAYPAL'>
<input type='hidden' class='PAYMENT_BANK'>
<input type='hidden' class='EMAIL_KO'>
<input type='hidden' class='EMAIL_OK'>
<input type='hidden' class='THANK_YOU'>
<input type='hidden' class='PAYPAL_PAY'>
<input type='hidden' class='REDIRECT'>
<input type='hidden' class='BANK_TRANSFER'>
<input type='hidden' class='PAYPAL'>
<input type='hidden' class='TO_DRIVER'>
<input type='hidden' class='color'>
<input type='hidden' class='nm_code'>
<input type='hidden' class='percentagem'>
<input type='hidden' id='reserved_time'>
<input type='hidden' class='dominio' value='<?php echo str_replace("www.","",$_SERVER['HTTP_HOST']); ?>'>
<input type='hidden' id='pp_tax'>
<input type='hidden' id='driver_active'>
<input type='hidden' id='paypal_active'>
<input type='hidden' id='bank_active'>

<div id='include'></div>
<script>


$("#all-places, #match-places, #all-classes").select2();




var pp = '';
var id_prods = '';
var duracao ='';
url = '<?php echo $allowed; ?>';
url_forms = '<?php echo $allowed_forms; ?>';
user_lang = 'en-gb';
tel='';
min = '0';
max = '0';





















/*TAMANHO DO INPUT DO COD PROMO PASSAR PARA VERDE*/
function sizeI(vl){


vl.length+1 >= 1 ? $('.check-code').addClass('btn-success') : $('.check-code').removeClass('btn-success');}
var id_prods='';

/*OBTER TODAS AS CATEGORIAS VISIVEIS*/
function getCategorias(){
    $('.load').show();

    

    
    
    $('#all-places, #match-places, #all-classes').prop("disabled", true);  
    $('#promo-code').val('').prop('readonly', true);
    cats='';
    dataValue="&action=1&dominio="+$('.dominio').val();
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    loaded = 1;
    arr=[];
    
    $('.load').hide();
    arr =  JSON.parse(data);
 if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){

      i== 0 ?   
      cats += "<li class='active'><a class='w3-red w3-text-white' data-toggle='tab' onclick='showProds("+arr[i].tipo+","+arr[i].id+")'><i class='fa fa-plane w3-margin-right'></i>"+arr[i].nome+"</a></li>" :
       cats += "<li><a class='w3-red w3-text-white' data-toggle='tab' onclick='showProds("+arr[i].tipo+","+arr[i].id+")'><span class='glyphicon glyphicon-tags'></span>&nbsp; "+arr[i].nome+"</a></li>";

     }
    $('.loader-container').hide();
    $("#all-cats").empty().html(cats);
    showProds(arr[0].tipo,arr[0].id);
    $('#types').val(arr[0].tipo);
    $('#search-prods').fadeIn();
    $('#search-prods').show();
   }
   /*COR DO CLIENTE*/
   $('.panel-body,  .type-1 ,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover').css('background',$('.color').val());
   },
   error:function(data){
   $('.load').hide();
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}

/*OBTER TODOS OS LOCAIS DOS PRODUTOS PARA CAMPO ORIGEM*/

function showProds(tipo,cat){
  $('#promo-code').val('');
  $(".BOOK_NOW").attr('disabled','disabled');



  $("#not-recomended").val('');
  $('#all-places, #match-places, #all-classes, #promo-code').prop("disabled", true);  
  $('.load #content-order').show();
  $("#cat").val(cat);
  dataValue="categoria="+cat+"&tipo="+tipo+"&action=2";
   places='';
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $('.load').hide();
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){
      !arr[i].f ? false : arr[i].f;
      places += "<option value='"+arr[i].f+"'>"+arr[i].f+"</option>"
     }
     $("#all-places").html("<option value=''>"+$('.CHOOSE').val()+" *</option>"+places);
     $('#match-place, #all-classes').val('');
     $('#info-client, #prod-price, #include').empty();
     $('.check-code').removeClass('btn-success');
     $('#all-classes, #match-places').html("<option value=''>"+$('.CHOOSE').val()+" *</option>");
     }
   },
   error:function(data){

    $('.load').hide();
    $('.load').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}

function showMatch(origem,tipo,cat){

  if ($("#all-places").val() == "Choose *")
  {
    $("#match-places").val('Choose *');
  }
  if (!origem){
   /*CAMPOS DE PESQUISA A NULL */
   $('#match-places, #all-classes, #promo-code').val('');
   $('#prod-price, #info-client, #include').empty();
   $('.check-code').removeClass('btn-success');
   $("#ret-t").removeAttr('checked');
   $("#ret-f").prop('checked',true);
   $('#match-places, #all-classes').prop("disabled", true);
   $('#promo-code').prop('readonly', true);
}

else{
  $(".BOOK_NOW").attr('disabled','disabled');
   $('.load').show();
  dataValue="action=3&origem="+origem+"&tipo="+tipo+"&categoria="+cat;
  response ='';
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.load').hide();
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){}
    else {

     for(i=0;i<arr.length;i++){ 
       arr[i].local == origem ? false : to = arr[i].local;
       arr[i].local_fim == origem ? false : to= arr[i].local_fim;
      response += ("<option value='"+to+"'>"+to+"</option>");
      }

     $("#match-places").html("<option value=''>"+$('.CHOOSE').val()+" *</option>"+response);
     $('#all-classes').val('');
     $('#info-client, #prod-price, #include').empty();
     $('#show-prod-price, .img-best_price').hide();
     $("#ret-t").removeAttr('checked');
     $("#ret-f").prop('checked',true);
     $('#match-places').prop("disabled", false);
     $('.check-code').removeClass('btn-success');
     $('#promo-code').val('').prop('readonly', true);
    }
   },
   error:function(data){
    $('.load').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showMatch2(destino,tipo,origem, cat){
  if (!destino){
   /*CAMPOS DE PESQUISA A NULL */
   $('#all-classes, #promo-code').val('');
   $('#prod-price, #info-client, #include').empty();
   $('.check-code').removeClass('btn-success');
   $("#ret-t").removeAttr('checked');
   $("#ret-f").prop('checked',true);
   $('#match-places, #all-classes').prop("disabled", true);
   $('#promo-code').prop('readonly', true);
}
else{
  $(".BOOK_NOW").attr('disabled','disabled');
 $('.load').show();
dataValue="&action=4&origem="+origem+"&tipo="+tipo+"&destino="+destino+"&categoria="+cat;
response ='';
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.load').hide();
    arr=[];
    arr =  JSON.parse(data);
    id_prods = arr[0].id;
    duracao=arr[0].duracao;
    showClasses();
   },
   error:function(data){
    $('.load').hide();
    $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showClasses(){
  $('.load').show();
 dataValue="&action=5&categoria="+$("#cat").val();
 response ='';
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $('.load').hide();
    arr=[];    
    arr =  JSON.parse(data);
     for(i=0;i<arr.length;i++){ 
      response += ("<option data-min='"+arr[i].min+"' data-max='"+arr[i].max+"' value='"+arr[i].id+"'>"+arr[i].nome+"</option>");
      }
      $("#all-classes").html("<option value=''>"+$('.CHOOSE').val()+" *</option>"+response).prop("disabled", false);
      $('#promo-code').val('').prop('readonly', true);
      $('#prod-price, #info-client, #include').empty();
      $('.check-code').removeClass('btn-success');
      $("#ret-t").removeAttr('checked');
      $("#ret-f").prop('checked',true);
   },
   error:function(data){
   $('.load').hide();
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}

function showProdPrice(vl){

min = $('#all-classes option:selected').data('min');
max = $('#all-classes option:selected').data('max');

$('#promo-code').prop("disabled", false);  

response ='';
if( !$('#all-places').val() || !$('#match-places').val() || !$('#all-classes').val()){
  $(".BOOK_NOW").attr('disabled','disabled');
 $('#match-place, #all-classes').val(''); 
 $('#info-client, #prod_price, #include').empty(); 
 $('#show-prod-price, .img-best_price').hide();
 $('.check-code').removeClass('btn-success');
 return;
}

else{
     $('.load').show();
     $(".BOOK_NOW").removeAttr('disabled');

     $(".BOOK_NOW").click(function()
     {
      $("#include").css('display','block');
    });

     

    dataValue="&action=6&id_label="+vl+"&id_prod="+id_prods+"&categoria="+$("#cat").val()+"&dominio="+$(".dominio").val()+"&data_reserva="+$("#not-recomended").val();
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $('.load').hide();
    arr=[];
    arr =  JSON.parse(data);
    var from = $("#all-places option:selected").text();
    var to = $("#match-places option:selected").text();
    var pax = $("#all-classes option:selected").text();
    $('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='loja/images/bestprice.png';/>");
    $('#show-prod-price').fadeIn();
    $('#promo-code').prop('readonly', false);
    $('.check-code').removeClass('btn-success');
    $("#ret-t").removeAttr('checked');
    $("#ret-f").prop('checked',true);
    pp = arr[0].valor;
    $("input[type=radio]:checked").val() == 'No' ? oneway = "<font>"+$('.NO').val()+"</font>" : oneway = "<font>"+$('.YES').val()+"</font>" ;

    $('#info-client').html("<label>"+$('.FROM').text()+"</label> "+from+" <label> "+$('.TO').text()+" </label> "+to+" <label> "+$('.PASSENGERS').text()+" </label> "+pax+" <label>"+$('.RETURN').text()+"</label> "+oneway+" <label>"+$('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");

   },
   error:function(data){
     $('.load').hide();
    $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showReturn(vl){
response ='';
if( !$('#all-places').val() || !$('#match-places').val() || !$('#all-classes').val()){
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.REQUIRED').text());
   $('#prod-price, #info-client, #include').empty();
   $('.check-code').removeClass('btn-success');
   $("#ret-t").removeAttr('checked');
   $("#ret-f").prop('checked',true);
 return;
}
else{
     $('.load').show();
dataValue="action=7&id_label="+$('#all-classes').val()+"&id_prod="+id_prods+"&return="+vl+"&categoria="+$("#cat").val()+"&dominio="+$(".dominio").val()+"&data_reserva="+$("#not-recomended").val();
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.load').hide();
    arr=[];
    arr =  JSON.parse(data);
     $('#info-client').html("<h2>"+parseFloat(arr[0].valor).toFixed(2)+"€</h2>");
    var from = $("#all-places option:selected").text();
    var to = $("#match-places option:selected").text();
    var pax = $("#all-classes option:selected").text();
    $('#include').empty();
    $('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='loja/images/bestprice.png';/>");
    $('#show-prod-price').fadeIn();
    pp = arr[0].valor;
    $("input[type=radio]:checked").val() == 'No' ? oneway = "<font>"+$('.NO').text()+"</font>" : oneway = "<font>"+$('.YES').text()+"</font>" ;
    $('#info-client').html("<label>"+$('.FROM').text()+"</label> "+from+" <label> "+$('.TO').text()+" </label> "+to+" <label> "+$('.PASSENGERS').text()+" </label> "+pax+" <label>"+$('.RETURN').text()+"</label> "+oneway+" <label>"+$('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");
  
  $('.check-code').removeClass('btn-success');

   },
   error:function(data){
    $('.load').hide();
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showVerificationPromo(vl){
response ='';
var oneway = $("input[type=radio]:checked").val();
if( !$('#all-places').val() || !$('#match-places').val() || !$('#all-classes').val()){
   $('#match-place, #all-classes').val(''); 
   $('#info-client').empty();
   $('#show-prod-price, .img-best_price').hide();
 return;
}

else{
   $('.load').show();
dataValue="&action=8&id_label="+$('#all-classes').val()+"&id_prod="+id_prods+"&return="+oneway+"&promo="+vl+"&categoria="+$("#cat").val()+"&dominio="+$(".dominio").val()+"&data_reserva="+$("#not-recomended").val();
    $.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.load').hide();
    arr=[];
    arr =  JSON.parse(data);
    $('#info-client').html("<h2>"+parseFloat(arr[0].valor).toFixed(2)+"€");
    var from = $("#all-places option:selected").text();
    var to = $("#match-places option:selected").text();
    var pax = $("#all-classes option:selected").text()
    $('#show-prod-price').fadeIn();
    $("input[type=radio]:checked").val() == 'No' ? oneway = "<font class='NO'>"+$('.NO').text()+"</font>" : oneway = "<font class='YES'>"+$('.YES').text()+"</font>" ;
    
 /* SE CODIGO INVALIDO NA RESPOSTA*/

    if (arr[0].promo == 0 ){

    $('#info-client').html("<label class='FROM'>"+$('.FROM').text()+"</label> "+from+" <label class='TO'> "+$('.TO').text()+" </label> "+to+" <label class='PASSENGERS'> "+$('.PASSENGERS').text()+" </label> "+pax+" <label class='RETURN'>"+$('.RETURN').text()+"</label> "+oneway+" <label class='TOTAL'>"+$('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");
  pp = arr[0].valor;
 $('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='loja/images/bestprice.png';/>");
    $("#pop-modal-ko").trigger( "click" );
    $('#info-user-ko').html($('.NO_CODE').text());
   }

/* SE CODIGO VALIDO NA RESPOSTA*/
 
   else if (arr[0].promo == 1 ){
    pp = arr[0].desconto;
    $('#info-client').html("<label class='FROM'>"+$('.FROM').text()+"</label> "+from+" <label class='TO'> "+$('.TO').text()+" </label> "+to+" <label class='PASSENGERS'> "+$('.PASSENGERS').text()+" </label> "+pax+" <label class='RETURN'>"+$('.RETURN').text()+"</label> "+oneway+" <label class='TOTAL'>"+$('.TOTAL').text()+"</label> "+parseFloat(arr[0].desconto).toFixed(2)+"€");
    $('#prod-price').html("<font style='font-size:15px; color:#d9534f; text-decoration: line-through;'>"+parseFloat(arr[0].valor).toFixed(2)+"€</font>&nbsp;<font style='color:#333;'>"+parseFloat(arr[0].desconto).toFixed(2)+"€</font><img class='low-price hidden-xs' src='loja/images/bestprice.png';/>");
}
},
   error:function(data){
    $('.load').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function callDefinitions(){

  $('.promo-label-display').hide();

 $('#all-places').html("<option value=''>"+$('.CHOOSE').val()+" *</option>");

 $("#all-places").attr('disabled', 'disabled');
$(".BOOK_NOW").attr('disabled','disabled');
 dataValue='action=99';
 $.ajax({ url:url+'requests.php',
   data:dataValue,
   type:'POST', 
   success:function(data){
     arr=[];
     arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){}
     else {

          



          $('#reserved_time').val(arr[0].hora_reserva);
          tel = arr[0].tel;
          arr[0].termos ? $('#info-user-terms').html(arr[0].termos) : $('#info-user-terms').html('Terms & Conditions');
          arr[0].promo_name;
          arr[0].promo_value;

          antes=parseInt($('#reserved_time').val());
          !antes ? antes = 0 : false; 
          var date = new Date();
          d = date.setDate(date.getDate());
          h = date.setHours(date.getHours() + antes);


         

        
         $('#data_reserva').datetimepicker({useCurrent: false, ignoreReadonly: true, locale: $('.LANGUAGE').val(), sideBySide: true, minDate: h, defaultDate: h, format: 'DD/MM/YYYY HH:mm'});


         





         



         
          
          $('#data_reserva').on('dp.change', function(e) {

              $("#all-places").removeAttr('disabled');
               showProdPrice($("#all-classes").val());
              $("#include").css('display','none');
           });


          

          

          


          $('#driver_active').text(arr[0].motorista);
          $('#paypal_active').text(arr[0].paypal);
          $('#bank_active').text(arr[0].trans_bancaria);
          $('#pp_tax').text(arr[0].pp_taxa);
          arr[0].color ? $('.color').val(arr[0].color) : $('.color').val('#EEE');
          arr[1].nm_code ? $('.nm_code').val(arr[1].nm_code) : $('.nm_code').val('');
          arr[1].percentagem ?  $('.percentagem').val(arr[1].percentagem) : $('.percentagem').val('');
          if( arr[1].nm_code && arr[1].percentagem){
          $('.promo-label-display').show();
          $('.promo-display').html("<font class='GET'></font><strong> "+$('.percentagem').val()+"% </strong><font class='CODE_TXT'></font><strong> "+$('.nm_code').val()+" </strong>");
          $('.promo-label-display').show();
          }
     }
     /*CARREGAR TAGS DA LINGUAGEM*/


user_lang ? languages(user_lang) :  languages('en-gb');
    },
    error:function(data){
       $('.load').hide();
       
     }
  });
}

</script>

