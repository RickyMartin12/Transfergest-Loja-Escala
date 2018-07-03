<div class="panel panel-default" style="margin-top: -20px;">
 <form id="form_registry" class="no_print" onkeypress="return event.keyCode!=13">
    <div class="modal-header" style="background:#333; color:#FFF;">
        <h4 class="modal-title"><span class="glyphicon glyphicon-road"></span> Novo Registo</h4>
    </div>
    <div class="panel-body" style="padding: 0px 10px;">
       
            <div class="row">
<!-- SERVICO --> 

                <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"> <span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Serviço
                </h5>

    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O dia a que se realiza o serviço/transfers.(Visivel na aplicação)">Data Serviço <span class="w3-text-red">*</span></label>
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
                <label class="control-label" title="A hora a que que se realiza o serviço/transfers.(Visivel na aplicação)">Horas</label>
                <div class='input-group date datetimepicker_h'>
                    <input readonly type='text' name="hrs" class="form-control" id="regcol_3" placeholder="Horas"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
    </div>
    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O elemento do staff que realiza o serviço/transfers.(Visivel na aplicação)">Staff</label>
            <div class="input-group" style='width:100%;'>
            <select style="border-radius: 4px;" class="form-control" name="staff" id="regcol_99"></select>
            </div>
        </div>
    </div>
    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O tipo de serviço.(Visivel na aplicação)">Serviço</label>
            <select class="form-control" name="servico" id="regcol_4">
            </select>
        </div>
    </div>
    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
           <label class="control-label" title="Referência interna para pesquisa de serviços/transfers quando superior a 1.(Não visivel na aplicação)">Referência</label>
           <div class="input-group" style='width:100%;'>
            <input style="border-radius: 4px;" value ='-/-' type="text" class="form-control" name="referencia" id="regcol_179" placeholder="Ref.Interna">
           </div>
        </div>
    </div>

    <div class='col-md-3 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O serviço/transfer retorno.(Não visivel na aplicação)">Retorno/Replicar </label>
                <select class="form-control" id="regcol_178">
                <option selected value="0">Retorno - Não</option>
                <option value="1"> Retorno - Sim</option>
                <option value="2"> Replicar - Sim</option>
           </select>
        </div>
    </div>
    <div class='col-md-2 col-sm-6 col-xs-12'>
        <div class="form-group">
           <label class="control-label" title="A matricula do veiculo que efectua o serviço/transfer.(Não visivel na aplicação)">Matricula </label>
           <div class="input-group" style='width:100%;'>
            <select style="border-radius: 4px;" class="form-control" name="matricula" id="regcol_87"></select>
           </div>
        </div>
    </div>

   <div class='col-md-2 col-sm-6 col-xs-6'>
        <div class="form-group">
            <label class="control-label" title="O estado em que se encontra o serviço/transfer.(Controlado pela aplicação e central)"> Estado </label>
                <select class="form-control" name="estado" id="regcol_17">
                  <option value='Aceite'> Aceite</option>
                  <option value='Aguarda'>Aguarda</option>
                  <option value='Anulado'>Anulado</option>
                  <option value='Cancelado'>Cancelado</option>
                  <option value='Confirmado' selected> Confirmado</option>
                  <option value='Fechado'> Fechado</option>
                  <option value='Iniciado'> Iniciado</option>
                  <option value='Pendente'> Pendente</option>
                  <option value='Rejeitado'> Rejeitado</option>
           </select>
        </div>
    </div> 

    <div class='col-md-2 col-sm-6 col-xs-6'>
         <div class="form-group">
          <label class="control-label" title="Tempo do serviço/transfers.(Não visivel na aplicação)">Duração</label>
          <div class='input-group duracao'>
            <input readonly type="text" name="duracao" id="duracao" value="00:30" class="form-control" placeholder="Duração">
            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
           </div>
         </div>
     </div>

<!-- OPERADOR --> 

     <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-tower"></span>&nbsp;Operador</h5>

     <div class="col-md-3 col-sm-4 col-xs-12 mrg">
       <label class="control-label" title="Nome do operador (Visivel na aplicação)">Operador <span class="w3-text-red">*</span></label>
       <div class="form-group input-group">
         <span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
         <select onchange="getAvailableCats($('#regcol_88 option:selected').data('id'))" type="text" class="form-control" name="operador" id="regcol_88" placeholder="Operador *">
         </select>
       </div>
     </div>
     <div class='col-md-3 col-sm-4 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="As categorias associadas ao operador, para obter valores dessas rotas.(Não visivel na aplicação)">Categorias </label>
            <select disabled class="form-control" id="regcol_22" onchange="getCatClasses($('#regcol_22 option:selected').data('id'))">
              <option data-id="0">Sem Categoria</option>
            </select>
        </div>
     </div>

     <div class='col-md-3 col-sm-4 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="As classes associadas à categoria, obtem valor da Classe, se seleccionar uma opção diferente de 'Escolha'.(Não respeita total Pax)">Classes</label>
            <select disabled class="form-control" id="regcol_24">
              <option data-id="0">Sem Classes</option>
            </select>
        </div>
     </div>

     <div class='col-md-3 col-sm-4 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O ticket/voucher atribuido ao serviço.(Visivel na aplicação)">Ticket </label>
            <input type="text" class="form-control" name="ticket" id="regcol_14" placeholder="Ticket">
        </div>
     </div> 

<!-- CLIENTE --> 

    <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-user"></span>&nbsp;Cliente</h5>

    <div class='col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O nome do cliente.(Visivel na aplicação)">Nome Cliente</label>
            <input type="text" class="form-control" name="nome_cl" id="regcol_6" placeholder="Nome Cliente">
        </div>
    </div>

    <div class='col-md-6 col-xs-12'>
        <div class="form-group" title="O email do cliente.(Não visivel na aplicação)">
            <label class="control-label">Email</label>
            <input type="email" class="form-control" name="email" id="regcol_180" placeholder="Email">
        </div>
    </div>

    <div class='col-lg-3 col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O país de origem do cliente.(Não visivel na aplicação)">País</label>
             <select class="form-control" name="pais" id="regcol_182">
             </select>
        </div>
    </div>

    <div class='col-lg-3 col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="O nº. telefone do cliente.(Não visivel na aplicação)">Telefone</label>
            <input type="tel" class="form-control" name="tel" id="regcol_181" placeholder="Telefone">
        </div>
    </div>

  <div class='col-lg-2 col-md-4 col-xs-4'>
        <div class="form-group">
            <label class="control-label" title="O total de adultos para o serviço/Transfer.(visivel na aplicação)">Adultos <span class="w3-text-red">*</span></label>
            <input value='1' min='1' type="number" class="form-control" name="px" id="regcol_10" placeholder="Total Adultos *">
        </div>
    </div>
    <div class='col-lg-2 col-md-4 col-xs-4'>
        <div class="form-group">
		<label class="control-label" title="O total de crianças para o serviço/Transfer.(visivel na aplicação)">Crianças</label>
		  <input type="number" min="0" class="form-control" value='0' name="cr" id="regcol_11" placeholder="Total Crianças">
	  </div>
    </div>
    <div class='col-lg-2 col-md-4 col-xs-4'>
        <div class="form-group">
		<label class="control-label" title="O total de bébés para o serviço/Transfer.(visivel na aplicação)">Bébés</label>
		  <input type="number" min="0" class="form-control" value='0' min='0' name="bebe" id="regcol_12" placeholder="Total Bébés">
	  </div>
    </div>

  <!-- LOCAIS -->

   <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Locais</h5>

<div class="col-lg-2 col-md-6 col-xs-6">
      <div class="form-group">
        <label class="control-label" title="Escolher os Locais Frequentes ou Moradas pelo google (Não visivel na aplicação)">Frequentes</label>
        <div class="input-group autoc-zindex">
          <select class="form-control" style="border-radius: 4px;" id="regcol_27" onchange="completeGoogleOrPlaces('repla_mor_rec',this.value,7)">
           <option selected value='0'>Não</option>
           <option value='1'>Sim</option>
          </select>
        </div>
      </div>
    </div>


    <div class="col-lg-3 col-md-6 col-xs-6">
       <div class="form-group">
              <label class="control-label" title="Zona de Recolha (Visivel na aplicação)">Zona Recolha</label>
              <div class="input-group autoc-zindex">
                <select name="local_recolha" type="text" class="form-control" id="regcol_200" placeholder="Zona Recolha">
               </select>
             </div>
           </div>
         </div>

    <div class='col-lg-7 col-md-12 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="Descrição completa do ponto de origem do cliente.(Visivel na aplicação)">Morada Recolha</label>
            <div class="input-group autoc-zindex"id="repla_mor_rec">
              <input style="border-radius: 4px;" name="morada_recolha" type="text" class="form-control input" id="regcol_7" placeholder="Morada Recolha">
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="form-group">
        <label class="control-label" title="Coordenadas GPS Recolha.(Visivel na aplicação)">GPS Recolha</label>
        <input type="text" class="form-control" name="morada_recolha_gps" id="regcol_21" placeholder="GPS Recolha">
      </div>
    </div>

    <div class="col-xs-12 w3-border-bottom w3-border-dark-grey w3-margin-bottom"></div>

<div class="col-lg-2 col-md-6 col-xs-6">
      <div class="form-group">
        <label class="control-label" title="Escolher os Locais Frequentes ou Moradas pelo google (Não visivel na aplicação)">Frequentes</label>
        <div class="input-group autoc-zindex">
          <select class="form-control" id="regcol_28"style="border-radius: 4px;" onchange="completeGoogleOrPlaces('repla_mor_ent',this.value,8)">
           <option selected value='0'>Não</option>
           <option value='1'>Sim</option>
          </select>
        </div>
      </div>
    </div>
   
    <div class="col-lg-3 col-md-6 col-xs-6">
      <div class="form-group">
        <label class="control-label" title="Zona de Recolha (Visivel na aplicação)">Zona Entrega</label>
        <div class="input-group autoc-zindex">
          <select name="local_entrega" type="text" class="form-control" id="regcol_201" placeholder="Zona Entrega">
          </select>
        </div>
      </div>
    </div>

    <div class='col-lg-7 col-md-12 col-xs-12'>
      <div class="form-group">
        <label class="control-label"title="Descrição completa morada entrega do cliente.(Visivel na aplicação)">Morada Entrega</label>
        <div class="input-group autoc-zindex" id="repla_mor_ent">
       <input style="border-radius: 4px;" name="morada_entrega" type="text" class="form-control input" id="regcol_8" placeholder="Morada Entrega">
    </div>
      </div>
    </div>

    <div class='col-lg-3 col-md-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label"title="Descrição completa morada entrega do cliente.(Visivel na aplicação)">GPS Entrega</label>
            <input type="text" class="form-control" name="morada_entrega_gps" id="regcol_23" placeholder="GPS Entrega">
	  </div>
    </div>

    <div class='col-lg-offset-1 col-lg-8 col-md-6 col-sm-6 col-xs-12'>
        <div class="form-group">
            <label class="control-label" title="Observação extra referente a uma localização especifica, origem ou destino.(Visivel na aplicação)">Ponto Referência</label>
            <input type="text" class="form-control" name="ponto_referencia" id="regcol_9" placeholder="Ponto de Referência">
        </div>
    </div>

    <div class='col-md-12 col-xs-12'>
        <div class="form-group">
           <label class="control-label" title="Observações suplementares repeitantes ao transfer ou cliente.(Visivel na aplicação)">Observações</label>
           <input type="text" class="form-control" name="obs" id="regcol_13" placeholder="Obs">
       </div>
    </div>


<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="fa fa-plane"></span>&nbsp;Voo</h5>
    <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
      <div class="form-group">
        <label class="control-label" title="O nº. do voo do cliente.(Visivel na aplicação)">Voo</label>
        <input type="text" class="form-control" name="voo" id="regcol_5" placeholder="Voo">
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="form-group">
        <label class="control-label" title="A data do voo do cliente.(Visivel na aplicação)">Hora Voo</label>
       <div class="input-group date" id="flight-date">
         <input type="text" name="voo_horario" class="form-control" id="regcol_25" placeholder="Hora Voo">
         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>



    
<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-eur"></span>&nbsp;Cobranças/Comissões</h5>
    
    <div class='col-md-3 col-xs-6'>
        <div class="form-group">
            <label class="control-label" title="Apenas valor a cobrar por Motorista é visivel na aplicação, no icone 'i' de cada serviço)">Cobranças <span class="w3-text-red">*</span></label>
            <select class="form-control" name="cobrar_a" id="regcol_15">
            <option value=''selected>Escolha *</option>
            <option value='cobrar_operador'>Operador</option>
            <option value='cobrar_direto'>Motorista</option>
            </select>
        </div>
    </div> 

   <div class='col-md-3 col-xs-6'>
        <div class="form-group">
            <label class="control-label"title="Valor a cobrar  pelo serviço/transfer.(Visivel na aplicação no icone 'i' de cada serviço)">A Cobrar <span class="w3-text-red">*</span></label>
            <input type="number" step="any" min='0' class="form-control" name="valor" id="regcol_16" placeholder="Valor a cobrar">
        </div>
    </div> 

   <div class='col-md-3 col-xs-6'>
        <div class="form-group">
            <label class="control-label" title="Zonas predefinidas de comissão a pagar ao 'Staff', para aceitar este valor, o campo 'Staff -> Comissão' tem que ser 'Fixo'.(Não visivel na aplicação)">Zonas Cmx Staff</label>
            <input type="text" class="form-control" id="regcol_77" placeholder="Zonas Cmx Staff">
        </div>
    </div> 

   <div class='col-md-3 col-xs-6'>
        <div class="form-group">
            <label class="control-label" title="Valores predefinidos de comissão a pagar ao 'Staff'.(Não visivel na aplicação)">Cmx Staff </label>
            <input type="number" step='any' min='0' class="form-control" name="cmx_st" id="regcol_78" placeholder="Cmx Staff">
        </div>
    </div> 
</div>

<input type="hidden" name="criado_em" id="criado_em">
<input type="hidden" name="nid" id="nid">
<input type="hidden" name="created_by" id="created_by">

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


function resetNewServiceForm(){$('#regcol_99,#regcol_87,#regcol_88,#regcol_200,#regcol_201').val('').change();
completeGoogleOrPlaces('repla_mor_ent','0',8);
completeGoogleOrPlaces('repla_mor_rec','0',7);
}


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

w='';
y='';
f='';
t='';
p='';




function getCatClasses(v){
dataValue='cat='+v+'&action=27';
  $.ajax({ url:'registries/action_registries.php',
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



/*PEDIDO TODAS CATEGORIAS REFERENTES O OPERADOR SELECCIONADO*/
function getAvailableCats(v){
dataValue='operador='+v+'&action=25';
  $.ajax({ url:'registries/action_registries.php',
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

var dateNow = new Date();
$('#date-no-past-date').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY', locale: 'pt',daysOfWeekDisabled: [] });
$('.duracao').datetimepicker({ignoreReadonly:true, format: 'HH:mm',collapse:false,sideBySide:true,useCurrent:false});
$('.datetimepicker_h').datetimepicker({ignoreReadonly:true, format: 'HH:mm',locale: 'pt'});

$("#flight-date").datetimepicker({sideBySide: true, useCurrent: true, locale: 'pt',widgetPositioning: {vertical: 'bottom'}});

$('#form_registry').on('submit',function(e){
e.preventDefault();

$("#created_by").val($('#usnm').text());

$("#criado_em").val(1);
adulto='';
crianca='';
bebe='';
nome='';
recolha='';
operador='';
referencia='';
telefone ='';
email='';
pais='';

fl=0;

if($('#regcol_178').val() =='1'){
x = Math.floor(Date.now() / 1000).toString(16);
$('#regcol_179').val() =='-/-' ? $('#regcol_179').val(x):false;
obs =  $('#regcol_13').val();
ct = "(TEM RETORNO) ";

m_rec = $('#regcol_7').val();
m_ent = $('#regcol_8').val();

referencia = $('#regcol_179').val();
z_rec = $('#regcol_200').val();
z_ent = $('#regcol_201').val();
gps_rec = $('#regcol_21').val();
gps_ent = $('#regcol_23').val();
fl=1;
}

if($('#regcol_178').val() =='2'){ fl = 2; }

dataValue=$(this).serialize()+'&action=1';
  $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
           arr=[];
      arr =  JSON.parse(data);
      if (arr.error){
        $('.debug-url').html('Por favor, verifique:<br><br>'+arr.error+'<br> e tente novamente.');
        $('#Modalko').modal();
      }

      else if (arr.success == 0){
        $('.debug-url').html('Surgiu um erro, o registo, não foi criado!');
        $('#Modalko').modal();
      }

      else if(arr.success == 1){
        if (fl==0){
          $('#regcol_178').show();
          $('.btn-clear').trigger('click');
          $('.debug-url').html('O registo foi criado com ID# <strong class="cpt">'+arr.id+'</strong>.');
          $("#Modalok").modal();
          $('html, body').animate({ scrollTop: 0 }, 500);
          setTimeout(function(){
          $('#Modalok').modal('hide');},2500);
        }
         if (fl==1){

          $('.debug-url').html('O registo de ida foi criado com ID# <strong class="cpt">'+arr.id+'</strong>, finalize o registo do Retorno.');
          $('#regcol_178').val('0').hide();
          $("#Modalok").modal();
          $("#regcol_4").val('');

          $('#regcol_7').val(m_ent).change();
          $('#regcol_8').val(m_rec).change();
          $('#regcol_200').val(z_ent).change();
          $('#regcol_201').val(z_rec).change();
          $('#regcol_21').val(gps_ent);
          $('#regcol_23').val(gps_rec);
          $('#regcol_179').val(referencia).prop('readOnly',true);
          $('#regcol_13').val('(RETORNO) '+obs);
          $('html, body').animate({ scrollTop: 0 }, 500);
          setTimeout(function(){
          $('#Modalok').modal('hide');},2500);
         }
        if (fl==2){
          $('#regcol_178').show();
          $('.debug-url').html('O registo com ID# <strong class="cpt">'+arr.id+'</strong> foi criado com sucesso.<br> modifique os campos da nova réplica.');
          $("#mensagem_ok").trigger('click');
          $('html, body').animate({ scrollTop: 0 }, 500);
          setTimeout(function(){
          $('#Modalok').modal('hide');},2500);
         }
      }
    },
    error: function(){
      $('.debug-url').html('O registo não foi criado, p.f. verifique a ligação Wi-Fi.');
      $('#Modalko').modal();
    }
  });
});


$('#regcol_24, #regcol_22, #regcol_88, #regcol_200, #regcol_201, #regcol_10, #regcol_11, #regcol_12').change(function() { getTablePrices(); });


function getTablePrices(){

tipo_ope = $('#regcol_88 option:selected').data('tipo');
id_ope = $('#regcol_88 option:selected').data('id');
$('#regcol_200').val() ? pt1 =  $('#regcol_200').val() : pt1='';
$('#regcol_201').val() ? pt2 = $('#regcol_201').val() : pt2='';
id_categoria = $("#regcol_22 option:selected").data('id');
hrs = $('#regcol_3').val();

/*OPERADOR APENAS TIPO TABELA*/
if (tipo_ope === undefined || !tipo_ope.match(/Tabela/g) || !tipo_ope)return;

if ( $("#regcol_24 option:selected").data('id') == '0') {

/* QUANTIDADE PASSAGEIROS */
a=$('#regcol_10').val();
c=$('#regcol_11').val();
b=$('#regcol_12').val();

/* PASSAGEIROS ADULTOS VAZIO */
if (!a && tipo_ope && id_ope && pt1 && pt2 ){
return;} 

/*PESQUISA PELO VALOR DO TRANSFER*/
else if (!b || !c){
c=$('#regcol_11').val(0);
b=$('#regcol_12').val(0);
}

total = parseInt(a)+parseInt(b)+parseInt(c);
if (total){
dataValue = 'id_oper='+id_ope+'&pt1='+pt1+'&pt2='+pt2+'&total='+total+'&id_categoria='+id_categoria+'&horas='+hrs+'&action=15';

$.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     arr=[];
     arr = JSON.parse(data); 
     if (arr.success == 1){
     !arr.valor || arr.valor == '0' ? $('#regcol_16').val('') : $('#regcol_16').val(parseFloat(arr.valor).toFixed(2));
     !arr.duracao? $('#duracao').val('00:30') : $('#duracao').val(arr.duracao);
     !arr.nid ? $('#nid').val('') : $('#nid').val(arr.nid);}
   },
    error:function(){}
  });
}
}

else{
  id_class = $("#regcol_24 option:selected").data('id');
  dataValue = 'id_oper='+id_ope+'&pt1='+pt1+'&pt2='+pt2+'&id_categoria='+id_categoria+'&horas='+hrs+'&id_class='+id_class+'&action=28';
  $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     arr=[];
     arr = JSON.parse(data); 
     if (arr.success == 1){
     !arr.valor || arr.valor == '0' ? $('#regcol_16').val('') : $('#regcol_16').val(parseFloat(arr.valor).toFixed(2));
     !arr.duracao? $('#duracao').val('00:30') : $('#duracao').val(arr.duracao);
     !arr.nid ? $('#nid').val('') : $('#nid').val(arr.nid);
     }
   },
    error:function(){}
  });

$("#regcol_13").val($("#regcol_24 option:selected").text()); 

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

/*VALORES LOCAL STORAGE PARA CAMPOS DO FORM*/

arr = JSON.parse(localStorage.getItem("operadores"));
opt='<option selected value="">Escolha *</option>';
for (i=0;i<arr.length;i++){
opt +='<option data-id="'+arr[i].value+'" data-tipo="'+arr[i].tipo+'" value="'+arr[i].label+'">'+arr[i].label+'</option>';
}
$('#regcol_88').html(opt).select2();

arr = JSON.parse(localStorage.getItem("staff"));
opt='<option selected value="">Escolha </option>';
for (i=0;i<arr.length;i++){
opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}
$('#regcol_99').html(opt).select2();

mt = JSON.parse(localStorage.getItem("matricula"));
opt='<option selected value="">Escolha </option>';
for (i=0;i<mt.length;i++){
opt +='<option value="'+mt[i].label+'">'+mt[i].label+'</option>';
}
$('#regcol_87').html(opt).select2();

ar = JSON.parse(localStorage.getItem("locais"));
local='';
localr='<option selected value="">Zona Recolha</option>';
locale='<option selected value="">Zona Entrega</option>';
for (i=0;i<ar.length;i++){
local +='<option data-id="'+ar[i].value+'" value="'+ar[i].label+'">'+ar[i].label+'</option>';
}
$('#regcol_200').html(localr+''+local).select2();
$('#regcol_201').html(locale+''+local).select2();

stp = JSON.parse(localStorage.getItem("servicestype"));
istp ='<option selected value="">Escolha</option>';
for(i=0;i<stp.length;i++){
  istp += "<option value='"+stp[i].servico+"'>"+stp[i].servico+"</option>";
}
$('#regcol_4').html(istp);


countries = '';
arr_c = ['PT','EN','FR','SP','HOL','OUT'];

for(i=0;i<arr_c.length;i++){
countries += '<option value="'+arr_c[i]+'">'+arr_c[i]+'</option>';
}

zona_cmx = JSON.parse(localStorage.getItem("zona_cmx"));
    $("#regcol_77").autocomplete({
        source: zona_cmx,
        focus: function (event, ui) {
            event.preventDefault();
            $("#regcol_77").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#regcol_77").val(ui.item.label);
            $("#regcol_78").val(ui.item.value);
        }
    });


if (JSON.parse(localStorage.getItem("clients")) == null || JSON.parse(localStorage.getItem("clients")).length < 1){}

else{
client_by_email = JSON.parse(localStorage.getItem("clients"));

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

$("#regcol_182").html(countries);

</script>