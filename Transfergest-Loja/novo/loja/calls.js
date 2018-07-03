jQuery(function($) {




$('.my-tab').addClass('w3-hover-red w3-text-grey');


loaded = 0;
setTime = 0;

$('#search-prods').trigger('onload');
$('#transfer-form').on('submit',function(e){
 e.preventDefault(); 
 $('#content-order').hide();

 if($("#not-recomended").val() == "")
 {
  $('#modal-warn').modal('show');

  $('#modal-warn #info-warn').html('Por Favor Insere o Pickup Date and Time');
 }
 else
 {


  

 setPayments();
 setTime = 1;

 $('html, body').animate({ scrollTop: $('.pd-tp-bo').offset().top }, 'slow');

 f=0;
 t=0;

 var from = $("#all-places").val();

         var to = $("#match-places").val();

if($('#all-places').val().match(/Airpo/g) || $('#all-places').val().match(/Aerop/g) || $('#all-places').val().match(/airpo/g) || $('#all-places').val().match(/aerop/g)) f=1;

if($('#match-places').val().match(/Airpo/g) || $('#match-places').val().match(/Aerop/g) || $('#match-places').val().match(/airpo/g) || $('#match-places').val().match(/aerop/g))t=1;

/*APRESENTA FORM AEROPORTO CHEGADA*/
if($("input[type=radio]:checked").val() == 'No' && f == '1'){
$.ajax({url: "loja/f2.php",error:function(){

 $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); languages($('.LANGUAGE').val()); $('.middle').hide();});
}


/*APRESENTA FORM AEROPORTO PARTIDA*/
else if($("input[type=radio]:checked").val() == 'No' && t == '1'){
 $('.middle').hide();
 $.ajax({url: "loja/f3.php",error:function(){

 $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 $("#pop-modal_ko").trigger('click');
}

})
  .done(function( html ) {$( "#include" ).html(html); languages($('.LANGUAGE').val()); $('.middle').hide();});
}

/*APRESENTA FORM AEROPORTO CHEGADA/PARTIDA IDA E VOLTA*/
else if($("input[type=radio]:checked").val() == 'Yes' && f == '1' || $("input[type=radio]:checked").val() == 'Yes' && t == '1' && (from.match(/Airport/g) || from.match(/Aeroporto/g)) ){
$.ajax({url: "loja/f1.php",error:function(){

$('#info-user-ko').html('Erro ao obter form ida e volta aeroporto, p.f. verifique a ligação Wi-Fi.');
$("#pop-modal_ko").trigger('click');
}
})
      .done(function( html ) {$( "#include" ).html(html); languages($('.LANGUAGE').val()); $('.middle').hide();});
}


/*APRESENTA FORM AEROPORTO CHEGADA/PARTIDA IDA E VOLTA*/
else if($("input[type=radio]:checked").val() == 'Yes' && f == '1' || $("input[type=radio]:checked").val() == 'Yes' && t == '1' && (to.match(/Airport/g) || to.match(/Aeroporto/g)) ){
$.ajax({url: "loja/f6.php",error:function(){

$('#info-user-ko').html('Erro ao obter form ida e volta aeroporto, p.f. verifique a ligação Wi-Fi.');
$("#pop-modal_ko").trigger('click');
}
})
      .done(function( html ) {$( "#include" ).html(html); languages($('.LANGUAGE').val()); $('.middle').hide();});
}




/*APRESENTA FORM TRANSFER UMA VIAGEM*/
else if($("input[type=radio]:checked").val() == 'No' && t == '0' || $("input[type=radio]:checked").val() == 'No' && f == '0'){

 $.ajax({url: "loja/f4.php",error:function(){

 $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); languages($('.LANGUAGE').val()); $('.middle').hide();});
}

/*APRESENTA FORM TRANSFER IDA E VOLTA*/
 else if($("input[type=radio]:checked").val() == 'Yes' && f == '0' || $("input[type=radio]:checked").val() == 'Yes' && t == '0' ){

  $.ajax({url: "loja/f5.php",error:function(){

   $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
   $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); languages($('.LANGUAGE').val()); $('.middle').hide();});
}


 

 }


});

 
});

/* ACESSO AS LINGUAGENS*/
function languages(vl){
 $('.load').show();
 console.log(vl);
 
 
 $.ajax({
  type: "POST",
  url: "../novo/loja/languages/lang."+vl+".php",
  dataType:"json",
   success: function(data) {
    $('.load').hide();
    $('.TRANSFER_PICK_DEP').text(data.TRANSFER_PICK_DEP).next().prop('placeholder',data.TRANSFER_PICK_DEP);
    $('.MENU_HOME').text(data.MENU_HOME);
    $('.LANGUAGE').val(data.LANGUAGE);
    $('.CHOOSE').val(data.CHOOSE);
    $('.HORA').val(data.HORA);
    $('#all-places, #match-places, #all-classes').prop('data-placeholder',data.CHOOSE);
    $('.NO').text(data.NO).val(data.NO);
    $('.YES').text(data.YES).val(data.YES);
    $('.TO').text(data.TO).val(data.TO);
    $('.FROM').text(data.FROM).val(data.FROM)
    $('.PASSENGERS').text(data.PASSENGERS).val(data.PASSENGERS);
    $('.RETURN').text(data.RETURN).val(data.RETURN);
    $('.PROMO_CODE').text(data.PROMO_CODE);
    $('#promo-code').prop('placeholder',data.PROMO_CODE);
    $('.VALIDATE').html("<span class='glyphicon glyphicon-check'></span> "+data.VALIDATE);
    $('.BOOK_NOW').html("<span class='glyphicon glyphicon-shopping-cart'></span> "+data.BOOK_NOW);
    $('.PAYMENTS').text(data.PAYMENTS);
    $('.CLOSE').text(data.CLOSE).val(data.CLOSE);
    $('.WARNING').html("<span class='glyphicon glyphicon-warning-sign'></span> "+data.WARNING);
    $('.SUCCESS').html("<span class='glyphicon glyphicon-ok'></span> "+data.SUCCESS);
    $('.TERMS_CONDITIONS').html("<span class='glyphicon glyphicon-cog'></span> "+data.TERMS_CONDITIONS);
    $('.NO_CONNECTION').html(data.NO_CONNECTION);
    $('.NO_CODE').html(data.NO_CODE);
    $('.NO_ORIGIN').html(data.NO_ORIGIN);
    $('.NO_DESTINATION').html(data.NO_DESTINATION);
    $('.REQUIRED').html(data.REQUIRED);
    $('.TOTAL').text(data.TOTAL);
    $('.ARRIVAL_DETAILS').html("<span class='glyphicon glyphicon-map-marker'></span> "+data.ARRIVAL_DETAILS);
    $('.DEPARTURE_DETAILS').html("<span class='glyphicon glyphicon-screenshot'></span> "+ data.DEPARTURE_DETAILS);
    $('.DEPARTURE_DETAILS2').html("<span class='glyphicon glyphicon-map-marker'></span> "+ data.DEPARTURE_DETAILS2);
    $('.NR_PAX').html("<span class='glyphicon glyphicon-signal'></span> "+data.NR_PAX);
    $('.OBS').html("<span class='glyphicon glyphicon-paperclip'></span> "+data.OBS);
    $('.PAYMENTS_MET').html("<span class='glyphicon glyphicon-eur'></span> "+data.PAYMENTS_MET);
    $('.CONFIRM').html("<span class='glyphicon glyphicon-thumbs-up'></span> "+data.CONFIRM);
    $('.RETURN_DETAILS').text(data.RETURN_DETAILS);
    $('.PICKUP_DETAILS').text(data.PICK_UP_DETAILS);
    $('.BANK_TRANSFER').text(data.BANK_TRANSFER);
    $('.PAYPAL').text(data.PAYPAL);
    $('.TO_DRIVER').text(data.TO_DRIVER);
    $('.QUOTES').text(data.QUOTES);
    $('.ARRIVAL_FLIGHT_N').text(data.ARRIVAL_FLIGHT_N).next().prop('placeholder',data.ARRIVAL_FLIGHT_N);
    $('.ARRIVAL_FLIGHT_DT').text(data.ARRIVAL_FLIGHT_DT);
    $('.ARRIVAL_FLIGHT_TM').text(data.ARRIVAL_FLIGHT_TM);
    $('.ARRIVAL_FLIGHT_ADDR').text(data.ARRIVAL_FLIGHT_ADDR).next().prop('placeholder',data.ARRIVAL_FLIGHT_ADDR);
    $('.DEPARTURE_FLIGHT_N').text(data.DEPARTURE_FLIGHT_N).next().prop('placeholder',data.DEPARTURE_FLIGHT_N);
    $('.DEPARTURE_FLIGHT_DT').text(data.DEPARTURE_FLIGHT_DT);
    $('.DEPARTURE_FLIGHT_DT_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_DT);
    $('.DEPARTURE_FLIGHT_TM').text(data.DEPARTURE_FLIGHT_TM);
    $('.DEPARTURE_FLIGHT_TM_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_TM);
    $('.DEPARTURE_FLIGHT_PICK').text(data.DEPARTURE_FLIGHT_PICK);
    $('.HOUR_RESERVATION').text(data.HOUR_RESERVATION);
    $('.HOUR_RESERVATION_LABEL').prop('placeholder',data.HOUR_RESERVATION_LABEL);
    $('.DEPARTURE_FLIGHT_TR_TIME').text(data.DEPARTURE_FLIGHT_TR_TIME)
    $('.DEPARTURE_FLIGHT_TR_TIME_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_TR_TIME);
    $('.DEPARTURE_FLIGHT_ADDR').text(data.DEPARTURE_FLIGHT_ADDR).next().prop('placeholder',data.DEPARTURE_FLIGHT_ADDR);
    $('.PERSONAL_DETAILS').html("<span class='glyphicon glyphicon-user'></span> "+data.PERSONAL_DETAILS);
    $('.PERSONAL_DETAILS_NAME').text(data.PERSONAL_DETAILS_NAME).next().prop('placeholder',data.PERSONAL_DETAILS_NAME);
    $('.PERSONAL_DETAILS_EMAIL').text(data.PERSONAL_DETAILS_EMAIL).next().prop('placeholder',data.PERSONAL_DETAILS_EMAIL);
    $('.PERSONAL_DETAILS_TEL').text(data.PERSONAL_DETAILS_TEL).next().prop('placeholder',data.PERSONAL_DETAILS_TEL);
    $('.PERSONAL_DETAILS_COUNTRY').text(data.PERSONAL_DETAILS_COUNTRY).next().prop('placeholder',data.PERSONAL_DETAILS_COUNTRY);
    $('.ADULT').text(data.ADULT).next().prop('placeholder',data.ADULT);
    $('.CHILDREN').text(data.CHILDREN).next().prop('placeholder',data.CHILDREN);
    $('.BABY').text(data.BABY).next().prop('placeholder',data.BABY);
    $('.OBS_TXT').text(data.OBS_TXT).next().prop('placeholder',data.OBS_TXT);
    $('.SESSION_EXPIRED').html(data.SESSION_EXPIRED);
    $('.SEE_MORE').html("<span class='glyphicon glyphicon-eye-open'></span> "+data.SEE_MORE);
    $('.ACCEPT_TERMS').text(data.ACCEPT_TERMS);
    $('.TERMS_CONDITIONS_LABEL').text(data.TERMS_CONDITIONS);
    $('.PAYMENTS_MET_LABEL').text(data.PAYMENTS_MET);
    $('.CONFIRM_DETAILS').val(data.CONFIRM_DETAILS);
    $('.PURCHASE').val(data.PURCHASE);
    $('.YOUR_ORDER').val(data.YOUR_ORDER).text(data.YOUR_ORDER);
    $('.TRANSFER_PICK_DETAILS').html("<span class='glyphicon glyphicon-map-marker'></span> "+data.TRANSFER_PICK_DETAILS);
    $('.TRANSFER_PICK_DT').text(data.TRANSFER_PICK_DT);
    $('.TRANSFER_PICK_DT_LABEL').prop('placeholder',data.TRANSFER_PICK_DT);
    $('.TRANSFER_PICK_TM').text(data.TRANSFER_PICK_TM);
    $('.TRANSFER_PICK_TM_LABEL').prop('placeholder',data.TRANSFER_PICK_TM);
    $('.TRANSFER_PICK_ADDR').text(data.TRANSFER_PICK_ADDR).next().prop('placeholder',data.TRANSFER_PICK_ADDR);
    $('.TRANSFER_DEL_DETAILS').html("<span class='glyphicon glyphicon-screenshot'></span> "+ data.TRANSFER_DEL_DETAILS);
    $('.TRANSFER_DEL_DT').text(data.TRANSFER_DEL_DT);
    $('.TRANSFER_DEL_DT_LABEL').prop('placeholder',data.TRANSFER_DEL_DT);
    $('.TRANSFER_DEL_TM').text(data.TRANSFER_DEL_TM);
    $('.TRANSFER_DEL_TM_LABEL').prop('placeholder',data.TRANSFER_DEL_TM);
    $('.TRANSFER_DEL_ADDR').text(data.TRANSFER_DEL_ADDR).next().prop('placeholder',data.TRANSFER_DEL_ADDR);
    $('.GET').text(data.GET);
    $('.CODE_TXT').text(data.CODE_TXT);
    $('.DEBIT').text(data.DEBIT).prop('title',data.DEBIT);
    $('.DATA_ERROR').text(data.DATA_ERROR);
    $('.MIN_PAX').text(data.MIN_PAX);
    $('.TRY_AGAIN').text(data.TRY_AGAIN);
    $('.MAX_PAX').text(data.MAX_PAX);
    $('.ERROR_PAX').text(data.ERROR_PAX);
    $('.PAYMENT_TO_DRIVER').text(data.PAYMENT_TO_DRIVER);
    $('.PAYMENT_PAYPAL').text(data.PAYMENT_PAYPAL);
    $('.PAYMENT_BANK').text(data.PAYMENT_BANK);
    $('.EMAIL_KO').text(data.EMAIL_KO);
    $('.EMAIL_OK').text(data.EMAIL_OK);
    $('.THANK_YOU').text(data.THANK_YOU);
    $('.PAYPAL_PAY').text(data.PAYPAL_PAY);
    $('.REDIRECT').text(data.REDIRECT);
 
    $('.flags').addClass('f-active');
    $('.active-'+vl).removeClass('f-active');


    

    $('.add-paypal-calc').empty();
    $('.terms-cont').removeClass('col-lg-12').addClass('col-lg-6');
    $('.terms-cont a').css('float','right');

    setPayments();
   
   /* CARREGAR CATEGORIAS */
   loaded == '0' ? getCategorias(): false;
  },
  error:function(data){
     $('.load').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
});
}

/*PAGAMENTOS ATIVOS */

function setPayments(){
 $('#pp_tax').text($('#pp_tax').text().replace('.',','));

 payactive = "<option value=''>"+$('.CHOOSE').val()+" *</option>";
 $('#driver_active').text() == 'checked' ? payactive += "<option value='Driver'>"+$('.TO_DRIVER').text()+"</option>" : false;
 $('#paypal_active').text() == 'checked' ? payactive += "<option value='Paypal'>"+$('.PAYPAL').text()+" (+ "+$('#pp_tax').text()+"%)</option>" :false;
 $('#bank_active').text() == 'checked' ? payactive += "<option value='Bank'>"+$('.BANK_TRANSFER').text()+"</option>" : false;

if ($('#driver_active').text() == 'checked' && $('#paypal_active').text() == 'checked' && $('#bank_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/123.png');

else if ($('#driver_active').text() == 'checked' && $('#paypal_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/13.png');

else if ($('#bank_active').text() == 'checked' && $('#paypal_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/23.png');

else if ($('#bank_active').text() == 'checked' && $('#driver_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/12.png');

else if ($('#driver_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/1.png');

else if ($('#bank_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/2.png');

else if ($('#paypal_active').text() == 'checked')
  $('.available-payments').prop('src','loja/images/3.png');

 $('.pay_type').html(payactive);
}

function calcPaypal(vl){
taxes = $('#pp_tax').text().replace(',','.');
vltx=(taxes/100)*pp;
totals =  parseFloat(pp)+parseFloat(vltx);
 if (vl == 'Paypal' ) 
  {
   $('.add-paypal-calc').html("<font>Paypal</font><br><font class='col-xs-6'>Sub-Total = </font><font class='col-xs-6 align-r'>"+parseFloat(pp).toFixed(2)+"€</font><font class='col-xs-6'>Tx. ("+$('#pp_tax').text()+"%) = </font><font class='col-xs-6 align-r'>"+parseFloat(vltx).toFixed(2)+"€</font><font class='col-xs-6' style='border-top:1px solid;'>Total = </font><font class='col-xs-6 align-r' style='border-top:1px solid;'>"+parseFloat(totals).toFixed(2)+"€</font>");
   $('.terms-cont').addClass('col-lg-12').removeClass('col-lg-6');
   $('.terms-cont a').css('float','left');
  }
 else {
  $('.add-paypal-calc').empty();
  $('.terms-cont').removeClass('col-lg-12').addClass('col-lg-6');
  $('.terms-cont a').css('float','right');
 } 
}

/*ABRE TERMOS E CONDIÇÕES*/
function myTermsConditions(){
$("#pop-modal-terms" ).trigger( "click" );
}

/*CALCULAR TEMPO DE RETORNO*/

function calculateRecomendTime(){
  stamp = $("#dep_fl_tm2").val().split(":");
  console.log(stamp);
  end_stamp = (stamp[0]*60*60)+(stamp[1]*60);
  dur = parseInt(duracao)+parseInt(7200);
  pc_dt= $("#dep_fl_dt2").val().split("/");
  p1= pc_dt[1]+'/'+pc_dt[0]+'/'+pc_dt[2];
  x = parseInt(Math.round(new Date(p1))/1000)+parseInt(stamp[0]*60*60)+(stamp[1]*60)-parseInt(dur);
  var d = new Date(x*1000);
  todate=new Date(d).getDate();
  tomonth = new Date(d).getMonth()+1;
  toyear = new Date(d).getFullYear();
  tohours = new Date(d).getHours();
  tominutes = new Date(d).getMinutes();
  tominutes <= 9 ? tominutes = '0'+tominutes: tominutes=tominutes;
  tohours <= 9 ? tohours = '0'+tohours: tohours=tohours;
  todate <= 9 ? todate = '0'+todate: todate=todate;
  tomonth <= 9 ? tomonth = '0'+tomonth: tomonth=tomonth;
  recomend_pick_up = todate+'/'+tomonth+'/'+toyear+' '+tohours+':'+tominutes;
  recomend_pick_up_date = todate+'/'+tomonth+'/'+toyear;
  recomend_pick_up_hour = tohours+':'+tominutes;
  $('#dep_fl_pick, #not-recomended2').val(recomend_pick_up);
  $("input[name='arr_fl_tm']").val(recomend_pick_up_hour);
}

