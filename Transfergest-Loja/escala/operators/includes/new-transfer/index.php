<style>
.close{
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
}

</style>

    <div class="modal fade" id="avisos_cliente" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title mensagem_head"></h4>
                    <p class="mensagem_txt"></p>
                </div>
            </div>
        </div>
    </div>

<div class="panel panel-default">
 <form id="form_registry" class="no_print" onkeypress="return event.keyCode!=13">
    <div class="panel-body" style="padding: 0px 10px;">
            <div class="row">
<!-- SERVICO --> 
                <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"> <span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Serviço
                </h5>

    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Data Serviço <span class="w3-text-red">*</span></label>
            <div class='input-group date' id='date-no-past-date'>
                <input type='text' readonly class="form-control" name="data_servico" id="regcol_1" placeholder="Data Serviço *"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-3 col-sm-6 col-xs-12'>
         <div class="form-group">
                <label class="control-label">Horas <span class="w3-text-red">*</span></label>
                <div class='input-group date datetimepicker_h'>
                    <input readonly type='text' name="hrs" class="form-control" id="regcol_3" placeholder="Horas *"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
    </div>
    
    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Serviço</label>
            <select disabled class="form-control" id="regcol_22" onchange="getCatClasses($('#regcol_22 option:selected').data('id'))">
              <option value='' data-id="0">Sem Categoria</option>
            </select>
        </div>
     </div>
    
    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="A Tipos associados à categoria, obtem valor da Tipo, se seleccionar uma opção diferente de 'Escolha'.(Não respeita total Pax)">Tipo</label>
            <select disabled class="form-control" id="regcol_24">
              <option value='' data-id="0">Sem Classes</option>
            </select>
        </div>
     </div>

    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Retorno </label>
                <select class="form-control" id="regcol_178">
                <option selected value="0">Retorno - Não</option>
                <option value="1"> Retorno - Sim</option>
           </select>
        </div>
    </div>
    <input id="regcol_179" name="referencia" type="hidden">
   <div class='col-md-3 col-sm-6 col-xs-6'>
        <div class="form-group">
            <label class="control-label"> Estado </label>
                <input type="text" class="form-control" name="estado" id="regcol_17" value='Pendente' readonly>
        </div>
    </div> 
     

   <div class='col-md-2 col-sm-6 col-xs-6'>
        <div class="form-group">
            <label class="control-label"> Duração </label>
                <input type="text" class="form-control" placeholder="Duração" id="duracao" readonly>
        </div>
    </div> 



<!-- CLIENTE --> 

    <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-user"></span>&nbsp;Cliente</h5>

    <div class='col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Nome Cliente</label>
            <input type="text" class="form-control" name="nome_cl" id="regcol_6" placeholder="Nome Cliente">
        </div>
    </div>

    <div class='col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" class="form-control" name="email" id="regcol_180" placeholder="Email">
        </div>
    </div>

    <div class='col-lg-3 col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">País</label>
             <select class="form-control" name="pais" id="regcol_182">
             </select>
        </div>
    </div>

    <div class='col-lg-3 col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Telefone</label>
            <input type="tel" class="form-control" name="tel" id="regcol_181" placeholder="Telefone">
        </div>
    </div>

  <div class='col-lg-2 col-md-4 col-xs-4'>
        <div class="form-group">
            <label class="control-label">Adultos <span class="w3-text-red">*</span></label>
            <input value='1' min='1' type="number" class="form-control" name="px" id="regcol_10" placeholder="Total Adultos *">
        </div>
    </div>
    <div class='col-lg-2 col-md-4 col-xs-4'>
        <div class="form-group">
        <label class="control-label">Crianças</label>
          <input type="number" min="0" class="form-control" value='0' name="cr" id="regcol_11" placeholder="Total Crianças">
      </div>
    </div>
    <div class='col-lg-2 col-md-4 col-xs-4'>
        <div class="form-group">
        <label class="control-label">Bébés</label>
          <input type="number" min="0" class="form-control" value='0' min='0' name="bebe" id="regcol_12" placeholder="Total Bébés">
      </div>
    </div>


    <!-- Locais - Morada de Recolha -->

    <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Morada Recolha</h5>

<div class="col-lg-2 col-md-6 col-xs-6">
      <div class="form-group">
        <label class="control-label">Frequentes</label>
        <div class="input-group" style='width:100%;'>
          <select class="form-control" style="border-radius: 4px;" id="regcol_27" onchange="completeGoogleOrPlaces('repla_mor_rec',this.value,7)">
           <option selected value='0'>Não</option>
           <option value='1'>Sim</option>
          </select>
        </div>
      </div>
    </div>


    <div class="col-lg-3 col-md-6 col-xs-6">
       <div class="form-group">
              <label class="control-label">Zona Recolha</label>
              <div class="input-group" style='width:100%;'>
                <select name="local_recolha" type="text" class="form-control" id="regcol_200" placeholder="Zona Recolha">
               </select>
             </div>
           </div>
         </div>

    <div class='col-lg-7 col-md-12 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Morada Recolha</label>
            <div class="input-group" style='width:100%;' id="repla_mor_rec">
              <input style="border-radius: 4px;" name="morada_recolha" type="text" class="form-control input" id="regcol_7" placeholder="Morada Recolha">
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="form-group">
        <label class="control-label">GPS Recolha</label>
        <input type="text" readonly class="form-control" name="morada_recolha_gps" id="regcol_21" placeholder="GPS Recolha">
      </div>
    </div>

    <!-- Locais - Morada de Entrega -->

    <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-screenshot"></span>&nbsp Morada Entrega</h5>

    <div class="col-lg-2 col-md-6 col-xs-6">
      <div class="form-group">
        <label class="control-label">Frequentes</label>
        <div class="input-group" style='width:100%;'>
          <select class="form-control" id="regcol_28"style="border-radius: 4px;" onchange="completeGoogleOrPlaces('repla_mor_ent',this.value,8)">
           <option selected value='0'>Não</option>
           <option value='1'>Sim</option>
          </select>
        </div>
      </div>
    </div>
   
    <div class="col-lg-3 col-md-6 col-xs-6">
      <div class="form-group">
        <label class="control-label">Zona Entrega</label>
        <div class="input-group" style='width:100%;'>
          <select name="local_entrega" type="text" class="form-control" id="regcol_201" placeholder="Zona Entrega">
          </select>
        </div>
      </div>
    </div>

    <div class='col-lg-7 col-md-12 col-xs-12'>
      <div class="form-group">
        <label class="control-label"title="Descrição completa morada entrega do cliente.(Visivel na aplicação)">Morada Entrega</label>
        <div class="input-group" style='width:100%;' id="repla_mor_ent">
       <input style="border-radius: 4px;" name="morada_entrega" type="text" class="form-control input" id="regcol_8" placeholder="Morada Entrega">
    </div>
      </div>
    </div>

    <div class='col-lg-3 col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">GPS Entrega</label>
            <input type="text" readonly class="form-control" name="morada_entrega_gps" id="regcol_23" placeholder="GPS Entrega">
      </div>
    </div>

    <div class='col-lg-offset-1 col-lg-8 col-md-6 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label">Ponto Referência</label>
            <input type="text" class="form-control" name="ponto_referencia" id="regcol_9" placeholder="Ponto de Referência">
        </div>
    </div>

    <div class='col-md-12 col-xs-12'>
        <div class="form-group">
           <label class="control-label">Observações</label>
           <textarea type="text" class="form-control" name="obs" id="regcol_13" placeholder="Obs"></textarea>
       </div>
    </div>

<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="fa fa-plane"></span>&nbsp;Voo</h5>

    <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
      <div class="form-group">
        <label class="control-label">Voo</label>
        <input type="text" class="form-control" name="voo" id="regcol_5" placeholder="Voo">
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="form-group">
        <label class="control-label">Hora Voo</label>
       <div class="input-group date" id="flight-date">
         <input type="text" name="voo_horario" class="form-control" id="regcol_25" placeholder="Hora Voo">
         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>


    <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-eur"></span>&nbsp;Dados de Pagamento</h5>
    
    <div class='col-md-6 col-xs-6'>
        <div class="form-group">
            <label class="control-label">Forma Pagamento<span class="w3-text-red">*</span></label>
            <select class="form-control" name="cobrar_a" id="regcol_15">
            <option value=''selected>Escolha *</option>
            <option value='cobrar_operador'>Operador</option>
            <option value='cobrar_direto'>Motorista</option>
            </select>
        </div>
    </div> 

    <div class='col-md-6 col-xs-6'>
        <div class="form-group">
            <label class="control-label">Valor </label>
            <input type="number" readonly step="any" min='0' class="form-control" name="valor" id="regcol_16" placeholder="A definir">
        </div>
    </div>
</div>

<input type="hidden" name="criado_em" value="2">
<input type="hidden" value="<?php echo $username; ?>" name="created_by">
<input type="hidden" value="<?php echo $nomeOperador ?>" name="opnm" id="opnm">
<input type="hidden" value="<?php echo $idOperador ?>" name="opid" id="opid">
<input type="hidden" name="nid" id="nid">

</div>
<div class="panel-footer" style="background:#333;">
        <p style="text-align:right;">
            <button type="reset" class="btn btn-default btn-clear" onclick="resetNewServiceForm()"><i class="fa fa-eraser"></i><font class='hidden-xs'> Limpar</font></button>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save-file"></span><font class='hidden-xs'> Guardar</font></button>
        </p>
</div>
</form>
</div>

<script>

getAvailableCats($('#opnm').val());

        function resetNewServiceForm(){$('#regcol_99,#regcol_87,#regcol_200,#regcol_201,#duracao').val('').change();
            completeGoogleOrPlaces('repla_mor_ent','0',8);
            completeGoogleOrPlaces('repla_mor_rec','0',7);
            $("#regcol_10,#regcol_11,#regcol_12").val('');
}

          var date = new Date();
          d = date.setDate(date.getDate());
          h = date.setHours(date.getHours());
    

$("#date-no-past-date").datetimepicker({useCurrent: false, ignoreReadonly: true, locale: 'pt', minDate: h, defaultDate: h, format: 'DD/MM/YYYY'});

$(".datetimepicker_h").datetimepicker({useCurrent: false, ignoreReadonly: true, defaultDate: h, locale: 'pt', format: 'HH:mm'});

function getAvailableCats(v){

dataValue='operador='+v+'&action=25';
  $.ajax({ url:'../registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success: function(data){ 
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
       $('#regcol_22').attr('disabled',true).html('<option data-id="0">Sem Categoria</option>');
       $('#regcol_24').attr('disabled',true).html('<option data-id="0">Sem Classe</option>');
      }
      else{
       ct='<option data-id="0">Escolha</option>';
       for (i=0;i<arr.length;i++){
       ct += '<option data-id="'+arr[i].id+'">'+arr[i].nome+'</option>';
      }
      $('#regcol_22').attr('disabled',false).html(ct);
     }
    },
    error: function(){}
});

}

function getCatClasses(v){
dataValue='cat='+v+'&action=27';
  $.ajax({ url:'../registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success: function(data){ 
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
       $('#regcol_24').attr('disabled',true).html('<option data-id="0">Sem Classes</option>');
      }
      else{
       ct='<option data-id="0">Escolha</option>';
       for (i=0;i<arr.length;i++){
       ct += '<option data-id="'+arr[i].id+'">'+arr[i].nome+'</option>';
      }
      $('#regcol_24').attr('disabled',false).html(ct);
     }
    },
    error: function(){}
});

}


$('#regcol_24, #regcol_22, #regcol_200, #regcol_201, #regcol_10, #regcol_11, #regcol_12').change(function() { getTablePrices(); });

function getTablePrices(){

id_ope = $('#opid').val();
$('#regcol_200').val() ? pt1 =  $('#regcol_200').val() : pt1='';
$('#regcol_201').val() ? pt2 = $('#regcol_201').val() : pt2='';
id_categoria = $("#regcol_22 option:selected").data('id');
hrs = $('#regcol_3').val();

/*OPERADOR APENAS TIPO TABELA*/

if ( $("#regcol_24 option:selected").data('id') == '0') {

/* QUANTIDADE PASSAGEIROS */
a=$('#regcol_10').val();
c=$('#regcol_11').val();
b=$('#regcol_12').val();

/* PASSAGEIROS ADULTOS VAZIO */
if (!a && id_ope && pt1 && pt2 ){
return;} 

/*PESQUISA PELO VALOR DO TRANSFER*/
else if (!b || !c){
c=$('#regcol_11').val(0);
b=$('#regcol_12').val(0);
}

total = parseInt(a)+parseInt(b)+parseInt(c);
if (total){
dataValue = 'id_oper='+id_ope+'&pt1='+pt1+'&pt2='+pt2+'&total='+total+'&id_categoria='+id_categoria+'&horas='+hrs+'&action=15';

$.ajax({ url:'../registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     arr=[];
     arr = JSON.parse(data); 
     if (arr.success == 1){
     !arr.valor || arr.valor == '0' ? $('#regcol_16').val('') : $('#regcol_16').val(parseFloat(arr.valor).toFixed(2));
     !arr.duracao? $('#duracao').val('') : $('#duracao').val(arr.duracao);
     !arr.nid ? $('#nid').val('') : $('#nid').val(arr.nid);}
   },
    error:function(){}
  });
}
}

else{
  id_class = $("#regcol_24 option:selected").data('id');
  dataValue = 'id_oper='+id_ope+'&pt1='+pt1+'&pt2='+pt2+'&id_categoria='+id_categoria+'&horas='+hrs+'&id_class='+id_class+'&action=28';
  $.ajax({ url:'../registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     arr=[];
     arr = JSON.parse(data); 
     if (arr.success == 1){
     !arr.valor || arr.valor == '0' ? $('#regcol_16').val('') : $('#regcol_16').val(parseFloat(arr.valor).toFixed(2));
     !arr.duracao? $('#duracao').val('') : $('#duracao').val(arr.duracao);
     !arr.nid ? $('#nid').val('') : $('#nid').val(arr.nid);
     }
   },
    error:function(){}
  });

}

}


function ToInputOperatorLocations(in_val){
        in_val = in_val.split('*/*');
        if (in_val[0] != 'Locais Frequentes') {
        $("#regcol_7").val(in_val[0]);
        $("#regcol_9").val(in_val[1]+' (Recolha)');
        }
        else {
        document.getElementById("regcol_7").readOnly = false;
        document.getElementById("regcol_9").readOnly = false;
        $("#regcol_7, #regcol_9").val('');
        }
}


// Indicar a Hora de Voo

$("#flight-date").datetimepicker({sideBySide: true, useCurrent: true, locale: 'pt',widgetPositioning: {vertical: 'bottom'}});

// Locais - Morada de Entrega e de Recolha

ar = JSON.parse(localStorage.getItem("locais"));
local='';
localr='<option selected value="">Zona Recolha</option>';
locale='<option selected value="">Zona Entrega</option>';
for (i=0;i<ar.length;i++){
local +='<option data-id="'+ar[i].value+'" value="'+ar[i].label+'">'+ar[i].label+'</option>';
}
$('#regcol_200').html(localr+''+local).select2();
$('#regcol_201').html(locale+''+local).select2();


// Iniciar a Localização das moradas através das coordenadas GPS
    function initAutocomplete() {
    var defaultBounds = new google.maps.LatLngBounds(
          new google.maps.LatLng(35.985275, -9.792110),
          new google.maps.LatLng(40.428699, -2.233517)
        );

        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('regcol_7')),
            {bounds: defaultBounds,componentRestrictions: {country: 'pt'}},
            {types: ['geocode']});

        autocomplete.addListener('place_changed', fillInAddress);

        autocomplete_to = new google.maps.places.Autocomplete(
            (document.getElementById('regcol_8')),
            {bounds: defaultBounds,componentRestrictions: {country: 'pt'}},
            {types: ['geocode']});

        autocomplete_to.addListener('place_changed', fillInAddressTo);
    }

setTimeout(function(){ initAutocomplete(); }, 1500);

    function fillInAddressTo() {
        var place_to = autocomplete_to.getPlace();
        var lat_to = parseFloat(place_to.geometry.location.lat()).toFixed(7);
        var lng_to = parseFloat(place_to.geometry.location.lng()).toFixed(7);
        $('#regcol_23').val(lat_to+', '+lng_to);
      }


         function fillInAddress() {
        var place = autocomplete.getPlace();
        var lat = parseFloat(place.geometry.location.lat()).toFixed(7);
        var lng = parseFloat(place.geometry.location.lng()).toFixed(7);
        $('#regcol_21').val(lat+', '+lng);
      }

      // Seleccionar para os locais mais frequentes

      function getSelectV(id){
  if(id == '7'){
    gps = 21;
    z = 200;
  }
  else{
    gps = 23;
    z = 201;
  }
  $('#regcol_'+gps).val($("#regcol_"+id).select2().find(":selected").data("gps"));
  $('#regcol_'+z).val($("#regcol_"+id).select2().find(":selected").data("zona")).change();
}


// Completar a localidades das moradas de entrega e de recolha



function completeGoogleOrPlaces(id,vl,n_id){
  if(n_id == '7'){
    gp = 21;
    zl = 200;
    placeh = 'Morada Recolha';
    nm = 'morada_recolha';
  }
  else{
    gp = 23; 
    zl = 201;
    placeh = 'Morada Entrega';
    nm = 'morada_entrega';
 }
  switch(vl){

      case '0':
      $("#regcol_"+zl).val('').change();
      $("#regcol_"+gp).val('');
      $("#"+id).html('<input style="border-radius: 4px;" name="'+nm+'" type="text" class="form-control input" id="regcol_'+n_id+'" placeholder="'+placeh+'">');
      initAutocomplete();
   break;

/*LOCAIS FREQUENTES*/
    case '1':
      $("#regcol_"+zl).val('').change();
      $("#regcol_"+gp).val('');
      $("#"+id).html('<select class="form-control" onchange="getSelectV('+n_id+')" name="'+nm+'" id="regcol_'+n_id+'"></select>');
      frq = JSON.parse(localStorage.getItem("frequent_places"));
      opt='<option selected value="">Frequentes</option>'; 
      for (i=0;i<frq.length;i++){
        opt +='<option data-zona="'+frq[i].zona+'" data-gps="'+frq[i].morada_gps+'" value="'+frq[i].nome+', '+frq[i].morada+'">'+frq[i].nome+',  '+frq[i].morada+'</option>';
      }
      $('#regcol_'+n_id).html(opt).select2();
    break;
  }
}


// Pais do Cliente que foi efectuado o serviço

countries = '';
arr_c = ['PT','EN','FR','SP','HOL','OUT'];

for(i=0;i<arr_c.length;i++){
countries += '<option value="'+arr_c[i]+'">'+arr_c[i]+'</option>';
}
$("#regcol_182").html(countries);

if (JSON.parse(localStorage.getItem("clients_operators")) == null || JSON.parse(localStorage.getItem("clients_operators")).length < 1){}

else{
client_by_email = JSON.parse(localStorage.getItem("clients_operators"));

    $("#regcol_180").autocomplete({
        source: client_by_email,
        focus: function (event, ui) {
            event.preventDefault();
            $("#regcol_180").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#regcol_6").val(ui.item.value);
            $("#regcol_180").val(ui.item.label);
            $("#regcol_182").html('<option value="'+ui.item.pais+'">'+ui.item.pais+'</option>'+countries);
            $("#regcol_181").val(ui.item.telefone);
        }
    });

client_by_name = [];

for(i=0;i<client_by_email.length;i++){
client_by_name.push({label:client_by_email[i].value, value:client_by_email[i].label,pais:client_by_email[i].pais,telefone:client_by_email[i].telefone});
}

 $("#regcol_6").autocomplete({
        source: client_by_name,
        focus: function (event, ui) {
            event.preventDefault();
            $("#regcol_6").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#regcol_6").val(ui.item.label);
            $("#regcol_180").val(ui.item.value);
            $("#regcol_182").html('<option value="'+ui.item.pais+'">'+ui.item.pais+'</option>'+countries);
            $("#regcol_181").val(ui.item.telefone);
        }
    });
}


// Formulario de Submissão de valores dos transfers 


$('#form_registry').on('submit',function(e){
e.preventDefault();

adulto='';
crianca='';
bebe='';
nome='';
recolha='';
operador='';
telefone ='';
referencia='';
email='';
pais='';


if($('#regcol_178').val() =='0'){
x = Math.floor(Date.now() / 1000).toString(16);
$('#regcol_179').val() =='' ? $('#regcol_179').val(x):false;
referencia = $('#regcol_179').val();
}

fl=0;

if($('#regcol_178').val() =='1'){
x = Math.floor(Date.now() / 1000).toString(16);
$('#regcol_179').val() =='' ? $('#regcol_179').val(x):false;
referencia = $('#regcol_179').val();
obs =  $('#regcol_13').val();
ct = "(TEM RETORNO) ";
$('#regcol_178').hide();
m_rec = $('#regcol_7').val();
m_ent = $('#regcol_8').val();
z_rec = $('#regcol_200').val();
z_ent = $('#regcol_201').val();
gps_rec = $('#regcol_21').val();
gps_ent = $('#regcol_23').val();
fl=1;
}

dataValue=$(this).serialize()+'&serv='+$("#regcol_22 option:selected").text()+'&class='+$("#regcol_24 option:selected").text()+'&referencia='+referencia+'&action=1';

  $.ajax({ url:'../registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      arr=[];
      arr =  JSON.parse(data);

      if (arr.error){
               $("#avisos_cliente").modal();
               $("#avisos_cliente .modal-header").removeClass('w3-pale-green w3-pale-red').addClass('w3-pale-yellow');
               $('.mensagem_head').html('Aviso');
               $('.mensagem_txt').html('<hr>Por favor, verifique:<br>'+arr.error);
      }

      else if (arr.success == 0){
               $("#avisos_cliente").modal();
               $("#avisos_cliente .modal-header").removeClass('w3-pale-yellow w3-pale-green').addClass('w3-pale-red');
               $('.mensagem_head').html('Aviso');
               $('.mensagem_txt').html('<hr>Surgiu um erro, o registo, não foi criado!');
      }

      else if(arr.success == 1){  
          if (fl==0){
              $('.btn-clear').trigger('click');
              $("#avisos_cliente").modal();
              $("#avisos_cliente .modal-header").removeClass('w3-pale-yellow w3-pale-red').addClass('w3-pale-green');
              $('.mensagem_head').html('Sucesso');
              $('.mensagem_txt').html('<hr>O registo foi criado com ID# <strong class="cpt">'+arr.id+'</strong>.');
              $('html, body').animate({ scrollTop: 0 }, 500);
              setTimeout(function(){location.href = "index.php";},2500);
        }
         if (fl==1){
            $("#avisos_cliente").modal();
            $("#avisos_cliente .modal-header").removeClass('w3-pale-yellow w3-pale-red').addClass('w3-pale-green');
            $('.mensagem_head').html('Sucesso');
            $('.mensagem_txt').html('<hr>O registo de ida foi criado com ID# <strong class="cpt">'+arr.id+'</strong>, finalize o registo do Retorno.');
            $("#regcol_4").val('');
            $('#regcol_179').val(referencia);
            $('#regcol_7').val(m_ent).change();
            $('#regcol_8').val(m_rec).change();
            $('#regcol_200').val(z_ent).change();
            $('#regcol_201').val(z_rec).change();
            $('#regcol_21').val(gps_ent);
            $('#regcol_23').val(gps_rec);
            $('#regcol_13').val('(RETORNO) '+obs);
            $('#regcol_178').val('0');
            $('html, body').animate({ scrollTop: 0 }, 500);
            setTimeout(function(){$('#avisos_cliente').modal('hide'); fl=0;},2500);
            

         } 
      }
    },
    error: function(){
               $("#avisos_cliente").modal();
               $("#avisos_cliente .modal-header").removeClass('w3-pale-yellow w3-pale-green').addClass('w3-pale-red');
               $('.mensagem_head').html('Aviso');
               $('.mensagem_txt').html('<hr>Por favor verifique a ligação Wi-Fi, e tente novamente!');
    }
  });
});


</script>