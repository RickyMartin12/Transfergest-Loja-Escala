<div class="panel panel-primary" style="margin-bottom: 50px;">
  <div class="panel-heading">
    <h3 class="panel-title">
      <i class="fa fa-list-alt" aria-hidden="true"></i> Your Transfer
      <span style="float:right;" id='quote_total'></span></h3>
</div>
<form id="record_buy">
<div class="panel-body">  
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
    <input type="hidden" id="buy_from_val"/>
    <h4 class="label label-primary" style="font-size:15px;"><i class="fa fa-crosshairs" aria-hidden="true"></i> From:</h4>
    <label><h4 id="buy_from_txt"></h4></label>   
    </div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
    <input type="hidden" id="buy_to_val"/>
    <h4 class="label label-primary" style="font-size:15px;"><i class="fa fa-road" aria-hidden="true"></i> To:</h4>
    <label><h4 id="buy_to_txt"></h4></label>   
    </div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
    <input type="hidden" id="total_pax_val"/>
    <h4 class="label label-primary" style="font-size:15px;"><i class="fa fa-user" aria-hidden="true"></i> Passengers:</h4>
    <label><h4 id="total_pax_txt"></h4></label>  
    </div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
    <input type="hidden" id="return_val"/>
    <h4 class="label label-primary" style="font-size:15px;"><i class="fa fa-retweet" aria-hidden="true"></i> Return:</h4>
    <label><h4 id="return_txt"></h4></label>
    </div>
</div>

  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label required" style="font-size:15px;color:#333;" title="Required Field"><i class="fa fa-user" aria-hidden="true"></i> Your name: *</label>
        <input type="text" name="name-n" required id="name-hr" class="form-control" placeholder="Your name *" />
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label required" style="color:#333;font-size:15px" title="Required Field"><i class="fa fa-calendar" aria-hidden="true"></i> Pick-up Date: *</label>
      <div class="input-group date" id="datepicker-in">
        <input readonly="readonly" type="text" name='dia-recolha' required id="date-pick" title='dd/mm/yyyy' class="form-control" placeholder="Pick-up Date *" />
        <span class="input-group-addon btn-info" title="Set Date"><i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label required" style="color:#333;font-size:15px" title="Required Field" ><i class="fa fa-clock-o" aria-hidden="true"></i> Pick-up Hour: *</label>
      <div class="input-group date" id="datepicker-hr"  readonly>
        <input readonly="readonly" type="text" required name="hora-recolha" id="hr-pick"title='00:00' class="form-control" placeholder="Pick-up Hour *" />
        <span class="input-group-addon btn-info" title="Set Time"><i class="fa fa-clock-o" aria-hidden="true"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label" style="font-size:15px;color:#333;" title="Your flight number"><i class="fa fa-plane" aria-hidden="true"></i> Fly nr:</label>
        <input type="text" name="voo-n" id="fly-hr" class="form-control" placeholder="Fly nr" />
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label required" title="Required Field" style="font-size:15px;color:#333;"><i class="fa fa-envelope-square" aria-hidden="true"></i> Email: *</label>
        <input type="email" required name='email-n' id="email-hr" class="form-control" placeholder="@ *" />
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label"style="color:#333; font-size:15px;"><i class="fa fa-phone-square" aria-hidden="true"></i> Phone:</label>
        <input type="number" name='phone-n' title="Numbers only" id="phone-hr" class="form-control" placeholder="Phone" />
    </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label"style="color:#333; font-size:15px;"><i class="fa fa-globe" aria-hidden="true"></i> Country:</label>
        <input type="text" name='pais' title="PT or GB or SP etc " id="pais_" class="form-control" placeholder="Country" />
    </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-3 return-ok" >
    <div class="form-group">
      <label class="label required" style="color:#333;font-size:15px;" title="Required Field"><i class="fa fa-calendar" aria-hidden="true"></i> Return Date: *</label>
      <div class="input-group date" id="datepicker-r">
        <input readonly="readonly" type="text" id="dia-retorno" title='00/00/0000' class="form-control" placeholder="Pick-up Date *" />
        <span class="input-group-addon btn-info" title="Set Date"><i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-3 return-ok">
    <div class="form-group">
      <label class="label required" style="color:#333;font-size:15px;" title="Required Field"><i class="fa fa-clock-o" aria-hidden="true"></i> Return Hour: *</label>
      <div class="input-group date" id="datepicker-hr-r">
        <input readonly="readonly" type="text" id="hora-retorno" title='00:00' class="form-control" placeholder="Pick-up Hour *" />
        <span class="input-group-addon btn-info" title="Set Time"><i class="fa fa-clock-o" aria-hidden="true"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3 return-ok">
    <div class="form-group">
      <label class="label "style="color:#333;font-size:15px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Address: </label>
        <input type="text" title="Address to pick you up on the return" id="morada-pick" class="form-control" placeholder="Return Address " />
    </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="form-group">
      <label class="label" style="color:#333;font-size:15px;"><i class="fa fa-cogs" aria-hidden="true"></i> Obs:</label>
        <textarea id="obs-hr" name="obs-n" rows="6" class="form-control" placeholder="Observations"></textarea>
    </div>
  </div>
<div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-9 col-sm-offset-6">
<div class="form-group">
<label class="label required" style="color:#333; font-size:15px"><i class="fa fa-eur" aria-hidden="true"></i> Payment type: *</label>
<select onchange="" required style="width: 100%; display: inline-block;" id="payment" name='payment' class="form-control">
<option value=""> Choose</option>        
<option value="Ao Motorista"> To Driver</option>
<!--
<option value="Paypal"> Paypal</option>
-->
<option value="Trans.Bancaria"> Bank Transfer</option>
</select>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-9 col-sm-offset-6">
<div class="form-group">
<div class="checkbox">
<label class="required">
<input id="validtermsconditions" required type="checkbox" style="width:17px; height:17px;"> Terms & Conditions* &nbsp;
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#terms_conditions"><i class="fa fa-info-circle" aria-hidden="true"></i> More</button></label>
</div>
</div>
</div>



</div>
<div class="panel-footer">
  <p style="text-align:right;">
    <button type="reset" class="btn btn-default" onclick="clearBuy()">
    <i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="submit" class="btn btn-success">
    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Confirm</button>
</p>
</div>
</form>
</div>
<script>

$(function () {


antes=parseInt($('#reserved_time').val());
!antes ? antes = 0 : false; 
var date = new Date();
d = date.setDate(date.getDate());
h = date.setHours(date.getHours() + antes);

        $('#datepicker-in').datetimepicker({ format: 'DD/MM/YYYY', locale: 'en-gb', minDate: h,ignoreReadonly: true});
        $('#datepicker-r').datetimepicker({format: 'DD/MM/YYYY', locale: 'en-gb', minDate: d, useCurrent: false,ignoreReadonly: true});
        $("#datepicker-in").on("dp.change", function (e) {
            $('#datepicker-r').data("DateTimePicker").minDate(e.date);
        });
        $("#datepicker-r").on("dp.change", function (e) {
            $('#datepicker-in').data("DateTimePicker").maxDate(e.date);
        });
    $('#datepicker-hr').datetimepicker( {format: 'LT', locale: 'en-gb', minDate:h,ignoreReadonly: true});
    $('#datepicker-hr-r').datetimepicker( {format: 'LT', locale: 'en-gb',ignoreReadonly: true});


});

$('#record_buy').on('submit',function(e){
e.preventDefault();

px = $('#total_pax_txt').text()

switch (px)
{
case '1 - 4 Pax': px = 4 ;break;
case '5 - 8 Pax': px = 8 ;break;
case '9 - 12 Pax': px = 12 ;break;
case '13 - 16 Pax': px = 16 ;break;
}
value=$('#always_show').text().replace("€","");
dataValue = $(this).serialize()+'&action=9&local_recolha='+$('#buy_from_txt').text()+'&local_entrega='+$('#buy_to_txt').text()+'&px='+px+'&return='+$('#return').val()+'&value='+value+'&dia-retorno='+$('#dia-retorno').val()+'&hora-retorno='+$('#hora-retorno').val()+'&pt_referencia='+$('#morada-pick').val();

$.ajax({ url:'action.php',
  data:dataValue,
  type:'POST', 
  success: function(data){
 if(data.match(/#FF/g)){
    var r1 = data.split("#FF");
    var r2 = r1[1].split("F##");

r2[1] ? rt ='<br><strong>Return Ticket ID is: '+r2[1]+'</strong>' : rt='';

     $('.debug-url').html('Thank you '+$("#name-hr").val().toUpperCase()+', the purchase is complete.<br/>Your Ticket ID is:<strong> '+r1[1]+'</strong>'+rt+'.<br>Soon you´ll receive an email with the details.');
     $("#mensagem_ok").trigger('click');
clearBuy();
       }
  else if(data.match(/F##/g)){
   var r = data.split("F##");
     $('.debug-url').html('Thank you '+$("#name-hr").val().toUpperCase()+', the purchase is complete.<br/>Your Ticket ID is: <strong> '+r[1]+'</strong>.<br>Soon you´ll receive an email with the details2.');
     $("#mensagem_ok").trigger('click');
clearBuy();
        }
        else{
      $('.debug-url').html('An error occur while trying to get a response from the Server. Sorry for the inconvenience, try again later on.');
	   $("#mensagem_ko").trigger('click');
	}
     },
error: function(){
           $('.debug-url').html('Unable to Proceed the <strong>Purchase</strong>, please check your Wi-Fi connection, and try again!');
	   $("#mensagem_ko").trigger('click');
}
  });
});
</script>