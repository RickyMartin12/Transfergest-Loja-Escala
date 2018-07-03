<style>

div#arr_fl_dt {
    width: 100%;
}

.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;}

h5 {
    padding: 4px;
    background: #333;
    color: #FFF;
    font-size: 14px;
}

h5.uppercase{
text-align:center;
text-transform: uppercase;
}

</style>

<!-- TRANSFER COM IDA -->
F4
<form id='trans'>
<input type='hidden' name ='language' class='LANGUAGE'>
<input type='hidden' name ='navigator' id='navigator'>
<input type='hidden' id='data_reserva_hotel'>
<input type='hidden' id='categ'>


<div class='row'>
<div class="col-lg-12" style='padding-top:18px;'>
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title TRANSFER_PICK_DETAILS"></h3></div>
<div class="panel-body">

<div class="row">

 <div class="col-lg-3 col-md-6 col-xs-12 form-group">
  <font class='TRANSFER_PICK_DT'></font>
  <div class='input-group' id="arr_fl_dt" style="width:100%;">
  <input type='text' name="arr_fl_dt" required class="form-control" readonly/>
  </div>
 </div>


<div class="col-lg-9 col-md-6 col-xs-12 form-group">
<font class='TRANSFER_PICK_ADDR'></font>
<input type="text" class="form-control" id="arr_fl_addr" name="arr_fl_addr"/>
</div>
</div>

<input type="hidden" id="coord">

</div>
<div class="panel-footer"></div>
</div>


<!-- Morada de Entrega -->

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title DEPARTURE_DETAILS2"></h3></div>
<div class="panel-body">

<div class="row">



<div class="col-lg-12 col-md-12 col-xs-12 form-group">
<font class='TRANSFER_PICK_DEP'></font>
<input type="text" class="form-control" id="arr_dep_addr" name="arr_dep_addr"/>

<input type="hidden" id="coord2">

</div>
</div>


</div>
<div class="panel-footer"></div>
</div>


</div>
</div>


<!-- DADOS -->
<div class='row'>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title PERSONAL_DETAILS"></h3></div>
<div class="panel-body">

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_NAME'></font>
<input type="text" required class="form-control" id="per_de_name" name="per_de_name" />
</div>
<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_EMAIL'></font>
<input type="email" required class="form-control" id="per_de_email" name="per_de_email" />
</div>

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_TEL'></font>
<input type="tel" class="form-control" id="per_de_tel" name="per_de_tel" />
</div>

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_COUNTRY'></font>
<select class="form-control" id="per_de_country" name="per_de_country">
</select>
</div>

</div>
<div class="panel-footer"></div>
</div>







<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title NR_PAX"></h3></div>
<div class="panel-body">

<div class="col-lg-4 col-md-6 col-xs-6 form-group">
<font class='ADULT'></font>
<input type="number" min='1' value='1' required class="form-control" id="nr_pax_adu" name="nr_pax_adu" />
</div>
<div class="col-lg-4 col-md-6 col-xs-6 form-group">
<font class='CHILDREN'></font>
<input type="number" min='0' value='0' class="form-control" id="nr_pax_chi" name="nr_pax_chi" />
</div>
<div class="col-lg-4 col-md-6 col-xs-6 form-group">
<font class='BABY'></font>
<input type="number" min='0' value='0' class="form-control" id="nr_pax_ba" name="nr_pax_ba" />
</div>
</div>
<div class="panel-footer"></div>
</div>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title OBS"></h3></div>
<div class="panel-body">
<div class="col-lg-12 form-group">
<font class='OBS_TXT'></font>
<textarea class="form-control" id="obx_txt" name="obs_txt" rows="5" cols="50"></textarea>
</div>
</div>
<div class="panel-footer"></div>
</div>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title PAYMENTS_MET"></h3></div>
<div class="panel-body">
<div class="col-lg-6 col-xs-12 form-group">
<font class='PAYMENTS_MET_LABEL'></font>
<select required class="form-control pay_type" id="payments_type" onchange='calcPaypal(this.value)' name="payments_type">
</select>
</div>
<div class='col-lg-6 col-xs-12 add-paypal-calc form-group'></div>
<div class="col-lg-6 col-xs-12 terms-cont form-group">
<font class='TERMS_CONDITIONS_LABEL'></font>
<br>
<input type="checkbox" required name="shop-terms" value="shop-terms"> <p style="margin: -25px 27px 10px;" class='ACCEPT_TERMS'></p>
<a style="float:right;" class="btn btn-primary SEE_MORE" onclick='myTermsConditions()'></a>
</div>
</div>
<div class="panel-footer">
<div class="row">
<button type="submit" name='submit' class="btn btn-success CONFIRM" style="float:right;margin-right: 10px;"></button>
</div>
</div></div>

</div>
</div>
</form>

<script>


// Retorno do web browser pretendido

var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName  = navigator.appName;
var fullVersion  = ''+parseFloat(navigator.appVersion); 
var majorVersion = parseInt(navigator.appVersion,10);
var nameOffset,verOffset,ix;

// In Opera, the true version is after "Opera" or after "Version"
if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
 browserName = "Opera";
 fullVersion = nAgt.substring(verOffset+6);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
 browserName = "Microsoft Internet Explorer";
 fullVersion = nAgt.substring(verOffset+5);
}
// In Chrome, the true version is after "Chrome" 
else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
 browserName = "Chrome";
 fullVersion = nAgt.substring(verOffset+7);
}
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
 browserName = "Safari";
 fullVersion = nAgt.substring(verOffset+7);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In Firefox, the true version is after "Firefox" 
else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
 browserName = "Firefox";
 fullVersion = nAgt.substring(verOffset+8);
}
// In most other browsers, "name/version" is at the end of userAgent 
else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
          (verOffset=nAgt.lastIndexOf('/')) ) 
{
 browserName = nAgt.substring(nameOffset,verOffset);
 fullVersion = nAgt.substring(verOffset+1);
 if (browserName.toLowerCase()==browserName.toUpperCase()) {
  browserName = navigator.appName;
 }
}
// trim the fullVersion string at semicolon/space if present
if ((ix=fullVersion.indexOf(";"))!=-1)
   fullVersion=fullVersion.substring(0,ix);
if ((ix=fullVersion.indexOf(" "))!=-1)
   fullVersion=fullVersion.substring(0,ix);

majorVersion = parseInt(''+fullVersion,10);
if (isNaN(majorVersion)) {
 fullVersion  = ''+parseFloat(navigator.appVersion); 
 majorVersion = parseInt(navigator.appVersion,10);
}



$("#navigator").val(nAgt);

var date_r = $("#not-recomended").val();
var ct = $("#cat").val();

$("#data_reserva_hotel").val(date_r);





antes=parseInt($('#reserved_time').val());
!antes ? antes = 0 : false; 
var date = new Date();
d = date.setDate(date.getDate());
h = date.setHours(date.getHours() + antes);
flag_hr = 0;
flag_dt = 0;



function initAutocomplete() {
    var defaultBounds = new google.maps.LatLngBounds(
          new google.maps.LatLng(35.985275, -9.792110),
          new google.maps.LatLng(40.428699, -2.233517)
        );

        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('arr_fl_addr')),
            {bounds: defaultBounds,componentRestrictions: {country: 'pt'}},
            {types: ['geocode']});

        autocomplete.addListener('place_changed', fillInAddress);
      }


      function fillInAddress() {
        var place = autocomplete.getPlace();
        var lat = parseFloat(place.geometry.location.lat()).toFixed(7);
        var lng = parseFloat(place.geometry.location.lng()).toFixed(7);
        $('#coord').val(lat+', '+lng);
      }


      function initAutocomplete2() {
    var defaultBounds2 = new google.maps.LatLngBounds(
          new google.maps.LatLng(35.985275, -9.792110),
          new google.maps.LatLng(40.428699, -2.233517)
        );

        autocomplete2 = new google.maps.places.Autocomplete(
            (document.getElementById('arr_dep_addr')),
            {bounds: defaultBounds2,componentRestrictions: {country: 'pt'}},
            {types: ['geocode']});

        autocomplete2.addListener('place_changed', fillInAddress2);
      }


      function fillInAddress2() {
        var place = autocomplete2.getPlace();
        var lat = parseFloat(place.geometry.location.lat()).toFixed(7);
        var lng = parseFloat(place.geometry.location.lng()).toFixed(7);
        $('#coord2').val(lat+', '+lng);
      }


      setTimeout(function(){ initAutocomplete(); }, 1500);
      setTimeout(function(){ initAutocomplete2(); }, 1500);










  $(function () {

    var str = $("#data_reserva_hotel").val();

    var res = str.split(" ");

    $("input[name='arr_fl_dt']").val(date_r);

   
   !$('.LANGUAGE').val() ? $('.LANGUAGE').val(<?php echo json_encode(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2)) ?>) : $('.LANGUAGE').val();


   $('.panel-body,  .type-1 ,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover').css('background',$('.color').val());

   $('#per_de_country').html('<option value=""> </option><option value="Austria">Áustria</option><option value="Alemanha">Alemanha</option><option value="Austrália">Austrália</option><option value="Brasil">Brasil</option><option value="Bulgária">Bulgária</option><option value="Bélgica">Bélgica</option><option value="Canadá">Canadá</option><option value="China">China</option><option value="Dinamarca">Dinamarca</option><option value="Egipto">Egito</option><option value="Espanha">Espanha</option><option value="Estados Unidos">Estados Unidos</option><option value="França">França</option><option value="Grécia">Grécia</option><option value="Holanda">Holanda</option><option value="Hong Kong">Hong Kong</option><option value="Hungria">Hungria</option><option value="Irlanda">Irlanda</option><option value="Itália">Itália</option><option value="Japão">Japão</option><option value="Luxemburgo">Luxemburgo</option><option value="Malta">Malta</option><option value="Moçambique">Moçambique</option><option value="México">México</option><option value="Monáco">Mónaco</option><option value="Noruega">Noruega</option><option value="Polónia">Polónia</option><option value="Portugal">Portugal</option><option value="Reino Unido">Reino Unido</option><option value="Romania">Romania</option><option value="RS">Rússia</option><option value="Suíça">Suíça</option><option value="Índia">Índia</option><option value="OTR">Outro</option>');


$('#trans').on('submit',function(e){
e.preventDefault();
!$('#nr_pax_adu').val() ? ad=0 : ad=$('#nr_pax_adu').val();
!$('#nr_pax_chi').val() ? ch=0 : ch=$('#nr_pax_chi').val();
!$('#nr_pax_ba').val() ? bb=0 : bb=$('#nr_pax_ba').val();
total = parseInt(ad)+parseInt(ch)+parseInt(bb);

if ( total < min ){
$("#pop-modal-ko" ).trigger( "click" );
$('#info-user-ko').html($('.MIN_PAX').text()+"<strong>"+min+"</strong>.<br>"+$('.ERROR_PAX').text()+"<strong>"+total+"</strong>.<br>"+$('.TRY_AGAIN').text());
return;
}

else if ( total > max ){
$("#pop-modal-ko" ).trigger( "click" );
$('#info-user-ko').html($('.MAX_PAX').text()+"<strong>"+max+"</strong>.<br>"+$('.ERROR_PAX').text()+"<strong>"+total+"</strong>.<br>"+$('.TRY_AGAIN').text());
return;
}

else{
  $('.load').show();
  $('.back').show();
  dataValue=$( this ).serialize()+"&prod="+id_prods+"&label="+$('#all-classes').val()+"&action=12&oneway="+$('input[type=radio]:checked').val()+"&promo="+$('#promo-code').val()+"&from="+$('#all-places').val()+"&to="+$('#match-places').val()+"&pax="+$('#all-classes option:selected').text()+"&pp="+pp;
$.ajax({
      type: "POST",
      url: url+'requests.php',
      data: dataValue,
      success: function(data){
      $('.load').hide();
      $('.back').hide();
      arr=[];
      arr =  JSON.parse(data);
      if(arr[0].errors == 1){
       $("#pop-modal-ko" ).trigger( "click" );
       $('#info-user-ko').html(arr[0].invalid);
      }
      else{
      pay='';

arr[0].payments == 'Bank' ? pay= $('.BANK_TRANSFER').text() : false; 
arr[0].payments == 'Driver' ? pay = $('.TO_DRIVER').text() : false; 
arr[0].payments == 'Paypal' ? pay = $('.PAYPAL').text() : false; 
!arr[0].obs ? arr[0].obs = '-/-' : false;
!arr[0].promo ? arr[0].promo = '-/-' : false;
!arr[0].voo_che_mor ? arr[0].voo_che_mor = '-/-' : false;
!arr[0].tel ? arr[0].tel = '-/-' : false;
!arr[0].country ? arr[0].country = '-/-' : false;
arr[0].oneway =='Yes' ? arr[0].oneway = $('.YES').val() : arr[0].oneway = $('.NO').val();

purchase ="<form class='twowayairport'><h5 class='uppercase'>"+$('.YOUR_ORDER').val()+"</h5><label>"+$('.FROM').val()+"</label> "+arr[0].from+"<input type='hidden' name='from' value ='"+arr[0].from+"'><br><label>"+$('.TO').val()+"</font></label> "+arr[0].to+"<input type='hidden' name='to' value ='"+arr[0].to+"'><br><label>"+$('.PASSENGERS').val()+"</label> "+arr[0].pax+"<input type='hidden' name='pax' value ='"+arr[0].pax+"'><br><label>"+$('.RETURN').val()+"</label> "+arr[0].oneway+"<input type='hidden' name='oneway' value ='"+arr[0].oneway+"'><br><label>Promo:</label> "+arr[0].promo+"<input type='hidden' name='promo' value ='"+arr[0].promo+"'><br><label>Total:</label> "+parseFloat(arr[0].total).toFixed(2)+"€ <input type='hidden' name='pp' value ='"+arr[0].total+"'><br><h5>"+$('.TRANSFER_PICK_DETAILS').html()+"</h5><label>"+$('.TRANSFER_PICK_DT').text()+":</label> "+arr[0].voo_che_dt+"<br><input type='hidden' name='voo_che_dt' value ='"+arr[0].voo_che_dt+"'><label>"+$('.TRANSFER_PICK_ADDR').text()+":</label> "+arr[0].voo_che_mor+"<input type='hidden' name='voo_che_mor' value ='"+arr[0].voo_che_mor+"'><h5>"+$('.DEPARTURE_DETAILS2').html()+"</h5><label>"+$('.TRANSFER_PICK_DEP').text()+":</label> "+arr[0].voo_dep_mor+"<input type='hidden' name='voo_dep_mor' value ='"+arr[0].voo_dep_mor+"'><h5>"+$('.PERSONAL_DETAILS').html()+"</h5><label>"+$('.PERSONAL_DETAILS_NAME').text()+":</label> "+arr[0].nome+"<input type='hidden' name='nome' value ='"+arr[0].nome+"'><br><label>"+$('.PERSONAL_DETAILS_EMAIL').text()+":</label> "+arr[0].email+"<input type='hidden' name='email' value ='"+arr[0].email+"'><br><label>"+$('.PERSONAL_DETAILS_TEL').text()+":</label> "+arr[0].tel+"<input type='hidden' name='tel' value ='"+arr[0].tel+"'><br><label>"+$('.PERSONAL_DETAILS_COUNTRY').text()+":</label> "+arr[0].country+"<input type='hidden' name='country' value ='"+arr[0].country+"'><br><h5>"+$('.NR_PAX').html()+"</h5><label>"+$('.ADULT').text()+":</label> "+arr[0].adult+"<input type='hidden' name='adult' value ='"+arr[0].adult+"'><br><label>"+$('.CHILDREN').text()+":</label> "+arr[0].children+"<input type='hidden' name='children' value ='"+arr[0].children+"'><br><label>"+$('.BABY').text()+":</label> "+arr[0].baby+"<input type='hidden' name='baby' value ='"+arr[0].baby+"'><br><h5>"+$('.OBS').html()+"</h5><label>"+$('.OBS_TXT').text()+":</label> "+arr[0].obs+"<input type='hidden' name='obs' value ='"+arr[0].obs+"'><br><h5>"+$('.PAYMENTS_MET').html()+"</h5><label>"+$('.PAYMENTS_MET_LABEL').text()+":</label> "+pay+"<input type='hidden' name='payments' value ='"+arr[0].payments+"'><br><input type='hidden' value='"+arr[0].id+"' name='prod'><input type='hidden' value='"+arr[0].id_price+"' name='label'><input type='hidden' value='"+arr[0].lang+"' name='language'></form>";


      confirmPurchase(purchase);

    }
    },
     error:function(data) {
      $('.load').hide();
      $('.back').hide();
    }
});

}
});

function confirmPurchase(purchase){
bootbox.dialog({
  message: purchase,
    title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> "+$('.CONFIRM_DETAILS').val(),
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> "+$('.CLOSE').val(),
      className: "btn-default", 
      callback: function() {
      $('body').css('padding-right','0');
     }
    },
    danger: {
      label: "<span class='glyphicon glyphicon-ok'></span> "+$('.PURCHASE').val(),
      className: "btn-success",
      callback: function() {
      $('body').css('padding-right','0');
      $('.load').show();
      $('.back').show();
      dataValue=$('.twowayairport').serialize()+'&dominio='+$('.dominio').val()+'&navigator='+$("#navigator").val()+'&categoria='+$("#cat").val()+'&url='+$(".url").val()+'&coord='+$("#coord").val()+'&coord2='+$("#coord2").val()+'&action=1';
       $.ajax({
        type: "POST",
        url: url_forms+'form4_t.php',
        data: dataValue,
        success: function(data){
         arr=[];
         arr =  JSON.parse(data);
         $('.load').hide();
         $('.back').hide();
         if(arr[0].errors == 1){
          $("#pop-modal-ko" ).trigger( "click" );
          $('#info-user-ko').html(arr[0].invalid);
         }
         else if(arr[0].errors == 0){
          $('body').css('padding-right','0');
          $('#include').empty();
          showProds($('#types').val(),$('#cat').val());
          $('#prod-price, #info-client, #include').empty();
          $('.check-code').removeClass('btn-success');
          $("#ret-t").removeAttr('checked');
          $("#ret-f").prop('checked',true);
          $('#match-places, #all-classes').prop("disabled", true);
          $('#promo-code').prop('readonly', true);
          $('#info-user-ok').addClass('pop-txt');
          languages($('.LANGUAGE').val());
           if (arr[0].invalid == 10){ 
             $("#pop-modal-ok" ).trigger("click" );
             $('#info-user-ok').html($(".PAYMENT_TO_DRIVER").text()+'<br>'+$(".EMAIL_KO").text()+'<a class="btn btn-warning" href="tel:'+tel+'">'+tel+'</a><br>'+$(".YOUR_ORDER").text()+' <strong>'+arr[0].order+'</strong><br>'+$(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 11){
             $("#pop-modal-ok" ).trigger( "click" );
             $('#info-user-ok').html($(".PAYMENT_TO_DRIVER").text()+'<br>'+$(".EMAIL_OK").text()+' <strong>'+arr[0].order+'</strong><br>'+$(".THANK_YOU").text());

              
            }
            else if (arr[0].invalid == 20){ 
             $("#pop-modal-ok" ).trigger( "click" );
             $('#info-user-ok').html($(".PAYMENT_BANK").text()+'<br>'+$(".EMAIL_KO").text()+'<a class="btn btn-warning" href="tel:'+tel+'">'+tel+'</a><br>'+$(".YOUR_ORDER").text()+' <strong>'+arr[0].order+'</strong><br>'+$(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 21){ 
             $("#pop-modal-ok" ).trigger( "click" );
             $('#info-user-ok').html($(".PAYMENT_BANK").text()+'<br>'+$(".EMAIL_OK").text()+' <strong>'+arr[0].order+'</strong><br>'+$(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 30){ 
             $("#pop-modal-ok" ).trigger( "click" );
             $('#info-user-ok').html($(".PAYMENT_PAYPAL").text()+'<br>'+$(".EMAIL_KO").text()+'<a class="btn btn-warning" href="tel:'+tel+'">'+tel+'</a><br>'+$(".YOUR_ORDER").text()+' <strong>'+arr[0].order+'</strong><br>'+$(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 31){
             $("#pop-modal-ok" ).trigger( "click" );
             $('#info-user-ok').html($(".REDIRECT").text()+'<br>'+$(".EMAIL_OK").text()+ '<strong> '+arr[0].order+'</strong><br>'+$(".THANK_YOU").text()+'<br><form class="paypal" action="'+url_forms+'paypal/payments.php" method="post" id="paypal_form" target="_blank"><input type="hidden" name="cmd" value="_xclick" /><input type="hidden" name="no_note" value="1"/><input type="hidden" name="lc" value="EUR" /><input type="hidden" name="currency_code" value="EUR" /><input type="hidden" name="item_number" value="'+arr[0].order+'"/><input type="hidden" name="item_date" value="'+arr[0].data_criacao+'"/><button type="submit" class="btn btn-success" name="submit" id="f4-bt" value="'+$(".PAYPAL_PAY").text()+'">'+$(".PAYPAL_PAY").text()+'</button></form>');

                $('html, body').animate({ scrollTop: $('#all-cats').offset().top -200 }, 'slow');

                setTimeout(function(){ $("#f4-bt" ).trigger( "click" );}, 2000);

            

            

            }
        }
      },
      error:function(data){
        $('.load').hide();
        $('.back').hide();
         $("#pop-modal-ko" ).trigger( "click" );
         $('#info-user-ko').html($('.NO_CONNECTION').text());
      }
   });
      }
    },
  }
});
}

$("#per_de_country").select2();

});


</script>


