$(function() {
$('.to_top').click(function(){
$("html, body").animate({ scrollTop: $("#debug").scrollTop() }, 500);});
});


function callDefinitions(){
 dataValue='action=11';
     $.ajax({ url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    promo ='';
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){}
      else {
        $("#delete_team").empty();
        for(i=0;i<arr.length;i++){
          id = arr[i].id;
          !arr[i].logo ? arr[i].logo ='..definitions/upload/noimg.jpg' : false;
          path = "../definitions/"+arr[i].logo;
          $('#reserved_time').val(arr[i].hora_reserva);
          arr[i].desconto != 0 ? promo="<span style='font-size: 25px;float: right;margin-top: -45px;'><span class='label label-pill label-info'>"+arr[i].desconto+"% OFF</span></span>" : promo='';
$('.termsConditions').html('<p/>'+arr[i].termos+'</p>');
      }


      $('#logo').html("<img class='img-responsive' style='max-height:50px;' src='"+path+"'/>"+promo).fadeIn();
}
    },
    error:function(data){}
  });
}

/*CARREGAR LOCAIS ORIGEM*/
multi =0;
flag = 0;
function getLocation(){
if (flag=="1")return;
else {
flag=1;  

    dataValue="action=7";
    $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $(".back").fadeOut();
     r1 ='';
     arr=[];
     arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){
     $('#location-1').append("<option value=''>Não existem locais</option>");
     }
    else { 
      for(i=0;i<arr.length;i++){
       r1 += "<option value='"+arr[i].local+"'>"+arr[i].local+"</option>";
       }
       inicial = "<option value=''>Please Choose:</option>";
       $('#location-1').append(inicial+""+r1);
     }
    },
    error:function(data){
     $(".back").fadeOut();
     $('.debug-url').html('Erro ao obter os locais, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
    }
  });
}
}

/*CARREGAR LOCAIS DESTINO APÓS SELECCÃO DA ORIGEM*/
function getDestination(vl){
  inicial = "<option value=''></option>";
  if(!vl){
  $('#location-2').empty().append(inicial);
  $('#multi').fadeOut();
  clearBuy();}
  else{
    dataValue="action=10&local_fim="+vl;
    $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $(".back").fadeOut();
     res ='';
     arr=[];
     arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){
     $('#location-2').append("<option value=''>No destinations available</option>");
     }
    else if (arr.length == 1 ) { 
    $('#location-2').empty();
       for(i=0;i<arr.length;i++){
      if( $('#location-1').val() == arr[i].local ){ arr[i].local='';}
       $('#location-2').append("<option value='"+arr[i].local+"'>"+arr[i].local+"</option>");
      }
     Elm = $('#location-2');
     Elm.find('option[value=""]').remove();
     getPrices();
     }
     else {
      $('#location-2').empty();
      for(i=0;i<arr.length;i++){
       if( $('#location-1').val() == arr[i].local ){ arr[i].local='--';}
       res +="<option value='"+arr[i].local+"'>"+arr[i].local+"</option>";
      }
      inicial = "<option value=''>Please Choose:</option>";
      $('#location-2').append(inicial+""+res);
      Elm = $('#location-2');
      Elm.find('option[value="--"]').remove();    
     }
    },
    error:function(data){
     $(".back").fadeOut();
     $('.debug-url').html('Unable to get you <strong>Quotes</strong>, please check your Wi-Fi connection!');
     $("#mensagem_ko").trigger('click');
    }
  });
}
}

/*MUDAR SELECTS DOS QUOTES RETORNA VALORES DOS TRANSFERS*/
function getPrices(){
l1 = $("#location-1").val();
l2 = $("#location-2").val();
tp = $("#total-pax").val();
r = $("#return").val();
 if(!l1){
     $('.debug-url').html('Please choose a valid <strong>Location</strong>!');
     $("#mensagem_ko").trigger('click');
}

 else if(!l2){
     $('.debug-url').html('Please choose a valid <strong>Destination</strong>!');
     $("#mensagem_ko").trigger('click');
}

else {
dataValue="action=8&l1="+l1+"&l2="+l2+"&tp="+tp+"&r="+r;
    $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
 if (data == 0){
     clearBuy();
     $('#multi').fadeOut();
     $('.debug-url').html('Sorry, the requested Quote for <strong> Passengers </strong> isn´t available.<br>Please call us, or lower the number of Passengers.');
     $("#mensagem_ko").trigger('click');
}
else{
   data = parseFloat(data).toFixed(2)+'€';
   if (multi =="0"){
   $("#multi").fadeIn();

    $("html, body").animate({ scrollTop: $(document).height() }, 250);
    
$('#results').html("<h1 id='always_show' style='text-align:center;'>"+data+"<h1><p id='scroller' style='text-align:center;'><button id='multi'  class='btn-lg btn-success' onclick='callFormData()'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Buy Now</button></p>");
        }
$("#multi").fadeIn();
        if (multi =="1"){
    $('#results').html("<h1 id='always_show' style='text-align:center;'>"+data+"<h1><p id='scroller' style='text-align:center;'><button id='multi' class='btn-lg btn-info' onclick='proceedBuy()'><i class='fa fa-refresh' aria-hidden='true'></i> Update</button></p>");
        }
}
    },
    error:function(data){
     $('.debug-url').html('Unable to get your <strong>quotes</strong>, please check your Wi-Fi connection!');
     $("#mensagem_ko").trigger('click');
    }
  });
}
}

function callFormData(){
$.ajax({url: "formdata.php"})
.done(function( html ) {$( "#formdata" ).html(html);proceedBuy();});
}

function proceedBuy(){
$("#multi").fadeOut();
$('#quote_total').html("Total: "+$('#always_show').text());
if (multi =="0"){
multi = 1;
$('html, body').animate({scrollTop: $("#always_show").offset().top}, 500);
$("#transfer_buy").fadeIn();
$("#buy_from_txt").text($("#location-1 option:selected" ).text());
$("#buy_from_val").val(l1);
$("#buy_to_txt").text($( "#location-2 option:selected" ).text());
$("#buy_to_val").val(l2);
$("#total_pax_txt").text($( "#total-pax option:selected" ).text());
$("#total_pax_val").val(tp);
$("#return_txt").text($( "#return option:selected" ).text());
$("#return_val").val(r);
r == "1" ? $('.return-ok').fadeIn(): $('.return-ok').fadeOut();
}

else if (multi == "1"){
$('html, body').animate({scrollTop: $("#always_show").offset().top}, 500);
$("#transfer_buy").fadeIn();
$("#buy_from_txt").text($("#location-1 option:selected" ).text());
$("#buy_from_val").val(l1);
$("#buy_to_txt").text($( "#location-2 option:selected" ).text());
$("#buy_to_val").val(l2);
$("#total_pax_txt").text($( "#total-pax option:selected" ).text());
$("#total_pax_val").val(tp);
$("#return_txt").text($( "#return option:selected" ).text());
$("#return_val").val(r);
r == "1" ? $('.return-ok').fadeIn(): $('.return-ok').fadeOut();
}
}

function clearBuy(){
$('#always_show').empty();
$('#formdata').empty();
multi=0;
$('#return').val('0');
$('#total_pax').val('1');
}


/*
http://jdmweb.com/how-to-easily-integrate-a-paypal-checkout-with-php
*/
