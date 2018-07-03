<?php
session_start();
?>

<script src="js/jquery.floatThead.js"></script>
<script src="js/jquery.floatThead._.js"></script>
<div class="registries-filters">
<div class="company"></div>

<div class="panel panel-default">
<div class="panel-heading my-orange">
<h3 class="panel-title">
<i class="fa fa-columns"></i> Relatórios</h3>
<div class='search_results'>
   <div class="form-group">
  <h3 style="text-align:center; font-size:21px;"><span class="label label-default" id='nr_resultados' style="padding: 10px;">/span><h3>
  </div>
  </div>
<hr style='border-top: 1px solid #FFF;'>
<div class='searchprint'></div>

<div class='nosearchprint'>

<div class='row'>
<div class='col-sm-4 col-xs-12'>
<div class="form-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
<select class="form-control" id="paymentfiltersuppliers" onchange="paymentFilterSuppliers(this.value)">
<option value='0'>Escolha Fornecedor (Todos) </option>
<option value='1'> Staff</option>
<option value='2'> Operador</option>
<option value='3'> Ambos</option>
</select>
</div>
</div>


<div class='col-sm-4 col-xs-12'>
<div class="form-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
<select class="form-control" id="paymentfilterdates" onchange="paymentFilterDates(this.value)">
<option value=''>Escolha Data</option>
<option value='1'> Data</option>
<option value='2'> Entre datas</option>
</select>
</div>
</div>


<div class='col-sm-4 col-xs-12'>
<div class="form-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-eur"></span></span>
<select class="form-control" id='paymentfiltertype'>
<option value='0'>Escolha Operação</option>
</select>
</div>
</div>
</div>


<div class='row'>
<div class="staff_date" style="display:none;">
<div class="col-sm-3 col-xs-12">
<div class="form-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" value="" class="form-control" name="staff_name" id="staff_name" placeholder="Nome Staff ">
</div>
</div>
</div>


<div class="operator_date" style="display:none;">
<div class="col-sm-3 col-xs-12">
 <div class="form-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
<input type="text" value="" class="form-control" name="operator_name" id="operator_name" placeholder="Nome Operador">
</div>
</div>
</div>

<div class="in_date" style="display:none;">
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group input-group datetimepicker_se">
      <input type="text" class="form-control" readonly id="day_date" name="day_date" placeholder="Dia da pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>

<div class="between_date" style="display:none;">
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group input-group" id="datetimepicker6">
      <input type="text" class="form-control" readonly id="date_ini" name="date_ini" placeholder="Dia Inicio pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>

 <div class='col-sm-3 col-xs-12'>
  <div class="form-group input-group" id="datetimepicker7">
      <input type="text" class="form-control" readonly id="date_fim" name="date_fim" placeholder="Dia Fim pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>

<div class="row">
  <div style='float:right;'>
    <div class="form-group ">
     <p style="text-align:right">
     <a href="#" onclick='searchData2()' id='search_action' class="btn btn-info" title="Atualizar pesquisa"><span class="glyphicon glyphicon-filter"></span></a>
     <a href="#" class="btn btn-default btn-print hidden-xs disabled" onclick='goToPrint(0);' title="Imprimir Relatório"><span class="glyphicon glyphicon-print"></span></a>
  </p>
 </div>
 </div>
</div>


</div>


</div>
</div>
</div>
</div>

<div class="table-responsive w-example">
<div aria-hidden="true" class="floatThead-container">

<div class="row android" style="z-index:3;">
<div class="col-xs-12" style=" margin-top:-31px;background: #FFF;height: 21px;">
<span class="glyphicon glyphicon-chevron-left scroll-l" title="Ir para Esquerda" style="float:left; top:2px; cursor:pointer;"></span>
<span class="glyphicon glyphicon-chevron-right scroll-r" title="Ir para Direita" style="float:right; top:2px;cursor:pointer;"></span>
</div>
</div>

</div>

<div>
<table class="table table-striped table-condensed with-responsive-wrapper nowrap">
    <thead class="table-header">
      <tr>
        <th class='min-sz col-0'><input class="hidden-xs" id="col_0" type="checkbox"><span class="glyphicon green color_print_0 glyphicon-print hidden-xs no_print"></span><br/>ID</th>
        <th class='min-sz col-1'><input class="hidden-xs" id="col_1" type="checkbox"><span class="glyphicon green color_print_1 glyphicon-print hidden-xs no_print"></span><br/>Data</th>
        <th class='min-sz col-2'><input class="hidden-xs" id="col_2" type="checkbox"><span class="glyphicon green color_print_2 glyphicon-print hidden-xs no_print"></span><br/>Hora</th>
        <th class='min-sz col-3'><input class="hidden-xs" id="col_3" type="checkbox"><span class="glyphicon green color_print_3 glyphicon-print hidden-xs no_print"></span><br/>Staff</th>
        <th class='min-sz col-4'><input class="hidden-xs" id="col_4" type="checkbox"><span class="glyphicon green color_print_4 glyphicon-print hidden-xs no_print"></span><br/>Serviço</th>
        <th class='min-sz col-5'><input class="hidden-xs" id="col_5" type="checkbox"><span class="glyphicon green color_print_5 glyphicon-print hidden-xs no_print"></span><br/>Estado</th>
        <th class='min-sz col-6'><input class="hidden-xs" id="col_6" type="checkbox"><span class="glyphicon green color_print_6 glyphicon-print hidden-xs no_print"></span><br/>Voo</th>
        <th class='min-sz col-7'><input class="hidden-xs" id="col_7" type="checkbox"><span class="glyphicon green color_print_7 glyphicon-print hidden-xs no_print"></span><br/>Nome</th>
        <th class='min-sz col-8'><input class="hidden-xs" id="col_8" type="checkbox"><span class="glyphicon green color_print_8 glyphicon-print hidden-xs no_print"></span><br/>Recolha</th>
        <th class='min-sz col-9'><input class="hidden-xs" id="col_9" type="checkbox"><span class="glyphicon green color_print_9 glyphicon-print hidden-xs no_print"></span><br/>Entrega</th>
        <th class='min-sz col-10'><input class="hidden-xs" id="col_10" type="checkbox"><span class="glyphicon green color_print_10 glyphicon-print hidden-xs no_print"></span><br/>P.Referência</th>
        <th class='min-sz col-11'><input class="hidden-xs" id="col_11" type="checkbox"><span class="glyphicon green color_print_11 glyphicon-print hidden-xs no_print"></span><br/>Adulto</th>
        <th class='min-sz col-12'><input class="hidden-xs" id="col_12" type="checkbox"><span class="glyphicon green color_print_12 glyphicon-print hidden-xs no_print"></span><br/>Criança</th>
        <th class='min-sz col-13'><input class="hidden-xs" id="col_13" type="checkbox"><span class="glyphicon green color_print_13 glyphicon-print hidden-xs no_print"></span><br/>Bébé</th>
        <th class='min-sz col-14'><input class="hidden-xs" id="col_14" type="checkbox"><span class="glyphicon green color_print_14 glyphicon-print hidden-xs no_print"></span><br/>Obs</th>
        <th class='min-sz col-15'><input class="hidden-xs" id="col_15" type="checkbox"><span class="glyphicon green color_print_15 glyphicon-print hidden-xs no_print"></span><br/>Operador</th>
        <th class='min-sz col-16'><input class="hidden-xs" id="col_16" type="checkbox"><span class="glyphicon green color_print_16 glyphicon-print hidden-xs no_print"></span><br/>Ticket</th>
        <th class='min-sz col-17'><input class="hidden-xs" id="col_17" type="checkbox"><span class="glyphicon green color_print_17 glyphicon-print hidden-xs no_print"></span><br/>Cob.Opera.</th>

        <th class='min-sz col-18'><input class="hidden-xs" id="col_18" type="checkbox"><span class="glyphicon green color_print_18 glyphicon-print hidden-xs no_print"></span><br/>Rec.Oper.</th>

        <th class='min-sz col-19'><input class="hidden-xs" id="col_19" type="checkbox"><span class="glyphicon green color_print_19 glyphicon-print hidden-xs no_print"></span><br/>Cob.Diret.</th>

        <th class='min-sz col-20'><input class="hidden-xs" id="col_20" type="checkbox"><span class="glyphicon green color_print_20 glyphicon-print hidden-xs no_print"></span><br/>Rec.Staff.</th>

        <th class='min-sz col-21'><input class="hidden-xs" id="col_21" type="checkbox"><span class="glyphicon green color_print_21 glyphicon-print hidden-xs no_print"></span><br/>Cms.Oper.</th>

        <th class='min-sz col-22'><input class="hidden-xs" id="col_22" type="checkbox"><span class="glyphicon green color_print_22 glyphicon-print hidden-xs no_print"></span><br/>Pago.Oper</th>


        <th class='min-sz col-23'><input class="hidden-xs" id="col_23" type="checkbox"><span class="glyphicon green color_print_23 glyphicon-print hidden-xs no_print"></span><br/>Cms.Staff</th>

        <th class='min-sz col-24'><input class="hidden-xs" id="col_24" type="checkbox"><span class="glyphicon green color_print_24 glyphicon-print hidden-xs no_print"></span><br/>Pago.Staff</th>

        <th class='min-sz col-25' >&nbsp;<br />Acções</th>
      </tr>
    </thead>
    <tbody id="delete_team">
    </tbody>
 <tfoot class="footer_tot" style="border-top: 2px solid #888;">
    <tr>

<?php if ($_SESSION['privilegios'] >= '2'){?>

      <td class='col-0'><label>Total:<label></td>
      <td class='col-1'></td>
      <td class='col-2'></td>
      <td class='col-3'></td>
      <td class='col-4'></td>
      <td class='col-5'></td>
      <td class='col-6'></td>
      <td class='col-7'></td>
      <td class='col-8'></td>
      <td class='col-9'></td>
      <td class='col-10'></td>
      <td class='col-11'></td>
      <td class='col-12'></td>
      <td class='col-13'></td>
      <td class='col-14'></td>
      <td class='col-15'></td>
      <td class='col-16'></td>
      <td class='col-17'><label class='txt-fr'>Cobranças:</label></td>
      <td id='geral_tot' class='col-18'></td>
      <td class='col-19'></td>
      <td class='col-20'></td>
      <td class='col-21'><label class='txt-fr'>Comissões:</label></td>
      <td id='cmx_tot' class='col-22'></td>
      <td class='col-23'></td>
      <td class='col-24'></td>
      <td class='col-25'></td>
<?php
}
?>
    </tr>
  </tfoot>
 <tfoot class="footer_subtot">
    <tr>

<?php if ($_SESSION['privilegios'] >= '2'){?>

      <td id='reg_tot' class='col-0'><label>Sub-Total:<label></td>
      <td class='col-1'></td>
      <td class='col-2'></td>
      <td class='col-3'></td>
      <td class='col-4'></td>
      <td class='col-5'></td>
      <td class='col-6'></td>
      <td class='col-7'></td>
      <td class='col-8'></td>
      <td class='col-9'></td>
      <td class='col-10'></td>
      <td class='col-11'></td>
      <td class='col-12'></td>
      <td class='col-13'></td>
      <td class='col-14'></td>
      <td class='col-15'></td>
      <td class='col-16'></td>
      <td id='cb_op_tot' class='col-17'></td>
      <td class='col-18'></td>
      <td id='cb_di_tot' class='col-19'></td>
      <td class='col-20'></td>
      <td id='cmx_op_tot' class='col-21'></td>
      <td class='col-22'></td>
      <td id='cmx_st_tot' class='col-23'></td>
      <td class='col-24'></td>
      <td class='col-25'></td>
<?php
}
?>
    </tr>
  </tfoot>
  </table>
</div>
</div>

<script type="text/javascript">


arr = JSON.parse(localStorage.getItem("operadores"));
    $("#operator_name").autocomplete({
        source: arr,
        focus: function (event, ui) {
            event.preventDefault();
            $("#operator_name").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#operator_name").val(ui.item.label);
        }
    });


staff = JSON.parse(localStorage.getItem("staff"));
    $("#staff_name").autocomplete({
        source: staff,
        focus: function (event, ui) {
            event.preventDefault();
            $("#staff_name").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#staff_name").val(ui.item.label);
        }
    });



function fixDiv() {
    var $cache = $('.android');
    if ($(window).scrollTop() > 220)
      $cache.css({
        'position': 'fixed',
        'top': '72px',
        'background':'#FFF'
      });
    else
      $cache.css({
        'position': 'absolute',
        'top': 'auto'
      });
  }
  $(window).scroll(fixDiv);
  fixDiv();

$('.android').css('width',$('#insert').width());

$(window).resize(function(){
$('.android').css('width',$('#insert').width());
});


var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
isAndroid ? $('.scroll-r,.scroll-l').hide() : $('.scroll-r,.scroll-l').show();

$('.scroll-r').click(function() {
x= $('.table-header').width();
    $('.table-responsive').animate({
        scrollLeft: x
    }, 500);

});

$('.scroll-l').click(function() {
x = -1 * $('.table-header').width();
    $('.table-responsive').animate({
        scrollLeft: x
    }, 500);

});



        $('#datetimepicker6').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY HH:mm', 
    locale: 'pt'});
        $('#datetimepicker7').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY HH:mm', 
    locale: 'pt', useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });


       $('.datetimepicker_se').datetimepicker({
          format: 'DD/MM/YYYY', ignoreReadonly:true,
    locale: 'pt'
});


$('.table-responsive input[type=checkbox]').each(function(index){
$(this).click(function(){
if ($(this).is(':checked')){
$('.color_print_'+index).removeClass('green').addClass('red');
}
else{
$('.color_print_'+index).removeClass('red').addClass('green');
}
});
});

$('.datetimepicker_se').datetimepicker({
    format: 'DD/MM/YYYY', 
    locale: 'pt'
});


function searchData2(){

di = $('#date_ini').val();
df = $('#date_fim').val();
on = $('#operator_name').val();
sn = $('#staff_name').val();
dd = $('#day_date').val();
dt1='';
dt2='';
dt3='';

cmx_st = 0;
cmx_st_tot = 0;
cmx_op = 0;
cmx_op_tot = 0;
cb_op_tot = 0;
cb_op = 0;
cb_di_tot = 0;
cb_op_tot = 0;
geral_tot= 0;

var di_ini = di.replace(" ", "/");
di_ini = di_ini.replace(":","/");
arr_di=di_ini.split("/");
arr_di[0];
arr_di[1];
arr_di[2];
arr_di[3];
arr_di[4];

var datum = new Date(arr_di[2],(arr_di[1]-1),arr_di[0],arr_di[3],arr_di[4]);

di= (datum.getTime()/1000);

var df_fim = df.replace(" ", "/");
df_fim = df_fim.replace(":","/");
arr_df=df_fim.split("/");
arr_df[0];
arr_df[1];
arr_df[2];
arr_df[3];
arr_df[4];
var datum = new Date(arr_df[2],(arr_df[1]-1),arr_df[0],arr_df[3],arr_df[4]);

df= (datum.getTime()/1000);

/*ENVIO DO STAFF E/OU OPERADORES PARA FILTRO*/
$('#paymentfiltersuppliers').val() == '1' ? (!sn ? dt1='&sn=----' : dt1='&sn='+sn) : false;
$('#paymentfiltersuppliers').val() == '2' ? (!on ? dt1='&on=----' : dt1='&on='+on) : false;
$('#paymentfiltersuppliers').val() == '3' ? (!on || !sn ? dt1='&on=----&sn=----' : dt1='&on='+on+'&sn='+sn) : false;

/*ENVIO DATA OU DATAS PARA FILTRO*/
$('#paymentfilterdates').val() == '1' ? (!dd ? dt2='&dd='+ moment().format("DD/MM/YYYY") : dt2='&dd='+dd) : false;
$('#paymentfilterdates').val() == '2' ? (!di || !df ? dt2='&di=----&df=------' : dt2='&di='+di+'&df='+df) : false;

/*ENVIO DO TIPO PAGO/RECEBIDO FILTRO*/
$('#paymentfiltertype').val() != '0' ? dt3='&pr='+$('#paymentfiltertype').val() : false;


$('.back').fadeIn();
servico='0'; 
setTimeout(function(){

dataValue='action=6'+dt1+''+dt2+''+dt3;

     $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não foram encontrados Registos, pf modifique a pesquisa!');
        $("#mensagem_ko").trigger('click');
        $('#cb_op_tot,#cb_di_tot, #cmx_st_tot,#cmx_op_tot,#cmx_tot,#geral_tot,#delete_team').empty();
        $('.search_results').fadeIn();
        $('.btn-print').addClass('disabled');
        $('#nr_resultados').html("<span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados : 0");
      }
      else {
        $("#delete_team").empty();
 for(i=0;i<arr.length;i++){
       data_out = moment(arr[i].data_servico*1000).format("DD/MM/YYYY")
       hora_out = moment(arr[i].hrs*1000).format("H:mm");
      servico= i+1;

if( arr[i].cmx_st) cmx_st_tot += parseFloat(arr[i].cmx_st);
if( arr[i].cmx_op) cmx_op_tot += parseFloat(arr[i].cmx_op);
if( arr[i].cobrar_direto) cb_di_tot += parseFloat(arr[i].cobrar_direto);
if( arr[i].cobrar_operador) cb_op_tot += parseFloat(arr[i].cobrar_operador);

arr[i].cmx_st && arr[i].cmx_st != '0'  ? cmx_st = parseFloat(arr[i].cmx_st).toFixed(2)+"€" : cmx_st = '';
arr[i].cmx_op && arr[i].cmx_op != '0' ? cmx_op = parseFloat(arr[i].cmx_op).toFixed(2)+"€" : cmx_op = '';
arr[i].cobrar_direto && arr[i].cobrar_direto != '0' ? cb_di = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€" : cb_di = '';
arr[i].cobrar_operador && arr[i].cobrar_operador != '0' ? cb_op = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€" : cb_op = '';

arr[i].estado == 'Fechado' ? estado = 1 : estado = 0;

 $("#delete_team").append("<tr id='del_registry_"+arr[i].id+"'><td class='col-0'><label>"+arr[i].id+"</label></td><td class='col-1'><input type='text' id='col-1-"+arr[i].id+"' class='datetimepicker_dt frm-item' value='"+data_out+"'><label>"+data_out+"</label></td><td class='col-2'><input type='text' id='col-2-"+arr[i].id+"' class='datetimepicker_h frm-item' value='"+hora_out+"'><label>"+hora_out+"</label></td><td class='col-3'><select id='col-3-"+arr[i].id+"' class='frm-item form_select'><option value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><label>"+arr[i].staff+"</label></td><td class='col-4'><select id='col-4-"+arr[i].id+"' class='add_servico form_select frm-item'><option value='"+arr[i].servico+"'>"+arr[i].servico+"</option></select><label>"+arr[i].servico+"</label></td><td class='col-5'><select id='col-5-"+arr[i].id+"' class='add_estado frm-item form_select'><option value='"+arr[i].estado+"'>"+arr[i].estado+"</option><option value='Aceite'> Aceite</option><option value='Aguarda'>Aguarda</option><option value='Anulado'>Anulado</option><option value='Cancelado'>Cancelado</option><option value='Confirmado'> Confirmado</option><option value='Fechado'> Fechado</option><option value='Iniciado'> Iniciado</option><option value='Pendente'> Pendente</option><option value='Rejeitado'> Rejeitado</option></select><label>"+arr[i].estado+"</label></td><td class='col-6'><input type='text' id='col-6-"+arr[i].id+"' class='frm-item' value='"+arr[i].voo+"'><label>"+arr[i].voo+"</label></td><td class='col-7'><input type='text' id='col-7-"+arr[i].id+"' class='frm-item' value='"+arr[i].nome_cl+"'><label>"+arr[i].nome_cl+"</label></td><td class='col-8'><input type='text' id='col-8-"+arr[i].id+"' class='frm-item' value='"+arr[i].local_recolha+"'><label>"+arr[i].local_recolha+"</label></td><td class='col-9'><input type='text' id='col-9-"+arr[i].id+"' class='frm-item' value='"+arr[i].local_entrega+"'><label>"+arr[i].local_entrega+"</label></td><td class='col-10'><input type='text' id='col-10-"+arr[i].id+"' class='frm-item' value='"+arr[i].ponto_referencia+"'><label>"+arr[i].ponto_referencia+"</label></td><td class='col-11'><input type='number' min='1' id='col-11-"+arr[i].id+"' class='frm-item' value='"+arr[i].px+"'><label>"+arr[i].px+"</label></td><td class='col-12'><input type='number' min='0' id='col-12-"+arr[i].id+"' class='frm-item' value='"+arr[i].cr+"'><label>"+arr[i].cr+"</label></td><td class='col-13'><input type='number' min='0' id='col-13-"+arr[i].id+"' class='frm-item' value='"+arr[i].bebe+"'><label>"+arr[i].bebe+"</label></td><td class='col-14'><input type='text' id='col-14-"+arr[i].id+"' class='frm-item' value='"+arr[i].obs+"'><label>"+arr[i].obs+"</label></td><td class='col-15'><select id='col-15-"+arr[i].id+"' class='frm-item form_select'><option value='"+arr[i].operador+"'>"+arr[i].operador+"</option></select><label>"+arr[i].operador+"</label></td><td class='col-16'><input type='text' id='col-16-"+arr[i].id+"' class='frm-item' value='"+arr[i].ticket+"'><label>"+arr[i].ticket+"</label></td><td class='col-17'><input type='number' step='any' id='col-17-"+arr[i].id+"' class='frm-item' value='"+arr[i].cobrar_operador+"'><label class='txt-fr'>"+cb_op+"</label></td><td class='col-18'><a title='Recebido do Operador' class='rfo-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",0)'><span class='glyphicon glyphicon-tower'></span></a><select id='col-18-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].rec_ope+"'>"+arr[i].rec_ope+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].rec_ope+"</label></td><td class='col-19'><input type='number' step='any' id='col-19-"+arr[i].id+"' class='frm-item' value='"+arr[i].cobrar_direto+"'><label class='txt-fr'>"+cb_di+"</label></td><td class='col-20'><a title='Recebido do Staff' class='rfs-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",1)' style='margin-left: 7px;'><span class='glyphicon glyphicon-user'></span></a><select id='col-20-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].rec_staf+"'>"+arr[i].rec_staf+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].rec_staf+"</label></td><td class='col-21'><input type='number' step='any' id='col-21-"+arr[i].id+"' class='frm-item' value='"+arr[i].cmx_op+"'><label class='txt-fr'>"+cmx_op+"</label></td><td class='col-22'><a title='Pago a Operador' class='pto-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",2)' style='margin-left: 7px;'><span class='glyphicon glyphicon-tower'></span></a><select id='col-22-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].pag_ope+"'>"+arr[i].pag_ope+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].pag_ope+"</label></td><td class='col-23'><input type='number' step='any' id='col-23-"+arr[i].id+"' class='frm-item' value='"+arr[i].cmx_st+"'><label class='txt-fr'>"+cmx_st+"</label></td><td class='col-24'><a title='Pago ao Staff' class='pts-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",3)' style='margin-left: 7px;'><span class='glyphicon glyphicon-user'></span></a><select id='col-24-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].pag_staf+"'>"+arr[i].pag_staf+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].pag_staf+"</label></td><td class='col-25' id='action-"+arr[i].id+"'style='display:inline-flex'><button title='Apagar Registo: "+arr[i].id+"' class='btn btn-danger' onclick='confirmDeleteRegistriesReports("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left: 7px;' class='btn btn-info' title='Editar Registo: "+arr[i].id+"' onclick='showFrmRegistryReports("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button><a id='close-ser-"+arr[i].id+"' class='btn btn-default' style='margin-left: 7px;' title='Fechar Serviço : "+arr[i].id+"' onclick='closeServicies("+arr[i].id+","+estado+")'><span class='glyphicon glyphicon-stop'></span></a></td></tr>");
arr[i].rec_ope == 'Sim' ? $('.rfo-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.rfo-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

arr[i].rec_staf == 'Sim' ? $('.rfs-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.rfs-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

arr[i].pag_ope == 'Sim' ? $('.pto-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.pto-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

arr[i].pag_staf == 'Sim' ? $('.pts-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.pts-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

}

cmx_tot= cmx_op_tot + cmx_st_tot;
geral_tot =cb_op_tot + cb_di_tot;
        $('.btn-print').removeClass('disabled');
        $('.search_results').fadeIn();
        $('#nr_resultados').html("<span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: "+servico+"");
 cb_op_tot !=0 ? $('#cb_op_tot').html("<label class='txt-fr'>"+cb_op_tot.toFixed(2)+"€</label>") : $('#cb_op_tot').html("<label class='txt-fr'>--/--</label>");
 cb_di_tot !=0 ? $('#cb_di_tot').html("<label class='txt-fr'>"+cb_di_tot.toFixed(2)+"€</label>") : $('#cb_di_tot').html("<label class='txt-fr'>--/--</label>");

cmx_st_tot !=0 ? $('#cmx_st_tot').html("<label class='txt-fr'>"+cmx_st_tot.toFixed(2)+"€</label>") : $('#cmx_st_tot').html("<label class='txt-fr'>--/--</label>");

cmx_op_tot !=0 ? $('#cmx_op_tot').html("<label class='txt-fr'>"+cmx_op_tot.toFixed(2)+"€</label>") : $('#cmx_op_tot').html("<label class='txt-fr'>--/--</label>");


cmx_tot !=0 ? $('#cmx_tot').html("<label class='txt-fr'>"+cmx_tot.toFixed(2)+"€</label>") : $('#cmx_tot').html("<label class='txt-fr'>--/--</label>");

geral_tot !=0 ? $('#geral_tot').html("<label class='txt-fr'>"+geral_tot.toFixed(2)+"€</label>") : $('#geral_tot').html("<label class='txt-fr'>--/--</label>");
    }

/*CORRECAO TABELA*/
setTimeout(function(){
 $(".table.with-responsive-wrapper").floatThead({
        responsiveContainer: function($table){
            return $table.closest(".table-responsive");
        },
        zIndex: function($table){
            return 1;},
        top: function($table){
            return 72;

        }
    });
window.dispatchEvent(new Event('resize'));
 }, 550);

    },
    error:function(data){
      $('#Modalko .debug-url').html('Erro ao obter dados dos Registos, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}



function paymentCheck(id,nr){
switch (nr){

/*CHECKS RECEBIDO OPERADOR*/
case 0: 
vl = $('#col-18-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=11&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-18-'+id).val(vl).next().text(vl);
      vl == 'Sim' ? $('.rfo-'+id).removeClass('btn-warning').addClass('btn-success'): $('.rfo-'+id).removeClass('btn-success').addClass('btn-warning');
     }
    else {
     $('#Modalko .debug-url').html('A validação para <strong>'+vl+'</strong> no campo <strong> Recebido do Operador com #'+id+'</strong> não foi efetuada, p.f. tente novamente.');
     $("#mensagem_ko").trigger('click');
    }

  },
     error:function(){
     $('#Modalko .debug-url').html('A validação para "+vl+" no campo Recebido do Operador com #'+id+' não foi gravado com sucesso, p.f. verifique a ligação Wi-fi, e tente novamente.');
     $("#mensagem_ko").trigger('click');
    }
  });break;


/*CHECKS REBCEBIDO STAFF*/
case 1: 
vl = $('#col-20-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=12&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-20-'+id).val(vl).next().text(vl);
      vl == 'Sim' ? $('.rfs-'+id).removeClass('btn-warning').addClass('btn-success'): $('.rfs-'+id).removeClass('btn-success').addClass('btn-warning');
     }
    else {
     $('#Modalko .debug-url').html('A validação para <strong>'+vl+'</strong> no campo <strong> Recebido do Staff com #'+id+'</strong> não foi efetuada, p.f. tente novamente.');
     $("#mensagem_ko").trigger('click');
    }

  },
     error:function(){
     $('#Modalko .debug-url').html('A validação para "+vl+" no campo Recebido do Staff com #'+id+' não foi gravado com sucesso, p.f. verifique a ligação Wi-fi, e tente novamente.');
     $("#mensagem_ko").trigger('click');
    }
  });break;


/*CHECKS PAGO OPERADOR*/
case 2: 
vl = $('#col-22-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=13&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-22-'+id).val(vl).next().text(vl);
      vl == 'Sim' ? $('.pto-'+id).removeClass('btn-warning').addClass('btn-success'): $('.pto-'+id).removeClass('btn-success').addClass('btn-warning');
     }
    else {
     $('#Modalko .debug-url').html('A validação para <strong>'+vl+'</strong> no campo <strong> Pago ao Operador com #'+id+'</strong> não foi efetuada, p.f. tente novamente.');
     $("#mensagem_ko").trigger('click');
    }

  },
     error:function(){
     $('#Modalko .debug-url').html('A validação para "+vl+" no campo Pago ao Operador com #'+id+' não foi gravado com sucesso, p.f. verifique a ligação Wi-fi, e tente novamente.');
     $("#mensagem_ko").trigger('click');
    }
  });break;

/*CHECKS PAGO STAFF*/
case 3: 
vl = $('#col-24-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=14&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-24-'+id).val(vl).next().text(vl);
      vl == 'Sim' ? $('.pts-'+id).removeClass('btn-warning').addClass('btn-success'): $('.pts-'+id).removeClass('btn-success').addClass('btn-warning');
     }
    else {
     $('#Modalko .debug-url').html('A validação para <strong>'+vl+'</strong> no campo <strong> Pago ao Staff com #'+id+'</strong> não foi efetuada, p.f. tente novamente.');
     $("#mensagem_ko").trigger('click');
    }

  },
     error:function(){
     $('#Modalko .debug-url').html('A validação para "+vl+" no campo Pago ao Staff com #'+id+' não foi gravado com sucesso, p.f. verifique a ligação Wi-fi, e tente novamente.');
     $("#mensagem_ko").trigger('click');
    }
  });break;

}


}



function paymentFilterDates(vl){

switch (vl){

case '0': $('.in_date, .between_date').hide();break;

case '1': $('.in_date').show();$('.between_date').hide();break;

case '2': $('.in_date').hide();$('.between_date').show();break;

default:$('.in_date, .between_date').hide();break;
}

}

function paymentFilterSuppliers(vl){
switch (vl){
case '0': $('.operator_date, .staff_date').hide();
$('#paymentfiltertype').html("<option value='0'>Escolha:</option>");
break;

case '1':
$('.staff_date').show();$('.operator_date').hide();
$('#paymentfiltertype').html("<option value='0'>Escolha:</option><option value='4'>A receber</option><option value='7'>Pago</option>");

break;

case '2': $('.staff_date').hide();$('.operator_date').show();
$('#paymentfiltertype').html("<option value='0'>Escolha:</option><option value='3'>A receber</option><option value='6'>Pago</option><option value='8'> A Cobrar</option>");

break;

case '3': $('.operator_date,.staff_date').show();
$('#paymentfiltertype').html("<option value='0'>Escolha:</option><option value='1'> A receber & Pago</option><option value='2'> A receber</option><option value='5'>Pago</option>");

break;

default:$('.operator_date, .staff_date').hide();
$('#paymentfiltertype').html("<option value='0'>Escolha:</option>");

break;
}
}


function closeServicies(id,vl){
 
 if (vl == 0 ){
     dataValue="id="+id+"&action=9";
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     cache:false,
     success:function(data){
if (data == 0){
        $('#Modalko .debug-url').html('Surgiu um erro ao aceder a BD, p.f. tente mais tarde.<br> ERR#0 ');
        $("#mensagem_ko").trigger('click');}

if (data == 10){
       $('#Modalko .debug-url').html('Surgiu um erro, não foi definido um operador.<br>P.f insira um operador no campo <strong> Operador</strong>, e tente novamente. <br> ERR#10');
       $("#mensagem_ko").trigger('click');}
      
if (data == 100){
      $('#Modalko .debug-url').html('Surgiu um erro, o membro do staff atribuido ao serviço não existe!<br>P.f insira um membro válido no campo <strong>Staff</strong>, e tente novamente. <br> ERR#101');
      $("#mensagem_ko").trigger('click');}

if (data == 101){
      $('#Modalko .debug-url').html('Surgiu um erro, foi definido um operador mas não existe valor a cobrar.<br>P.f insira valor no campo a <strong>cobrar operador ou a cobrar direto</strong>, e tente novamente. <br> ERR#101');
      $("#mensagem_ko").trigger('click');}

if (data == 110){
      $('#Modalko .debug-url').html('Surgiu um erro ao aceder a BD, p.f. tente mais tarde.<br> ERR#110');
      $("#mensagem_ko").trigger('click');}

if (data == 111){
       $('#Modalko .debug-url').html('Não foi possivel fechar o serviço, não foi definido um tipo de comissão ao elemento do Staff.<br>P.f insira valor no campo <strong> Tipo de comissão de Staff (Fixo  ou Percentagem)</strong>, e tente novamente. <br> ERR#111');
 $("#mensagem_ko").trigger('click');}

if (data == 1100){
       $('#Modalko .debug-url').html('Surgiu um erro, não foi definido um operador válido nem um valor a cobrar.<br>P.f insira valores  nos campos <strong> Operador e cobrar operador ou a cobrar direto</strong>, e tente novamente. <br> ERR#1100');
 $("#mensagem_ko").trigger('click');}
    
if (data == 1110){
      $('#Modalko .debug-url').html('Surgiu um erro, não foi definido valor a cobrar.<br>P.f insira valor no campo <strong>cobrar operador ou a cobrar direto</strong>, e tente novamente. <br> ERR#1110');
      $("#mensagem_ko").trigger('click');}

if (data == 1101 || data == 1111 || data == 11110){
      searchData2();
      $('#Modalok .debug-url').html('O Registo #'+id+' foi fechado com sucesso.');
      $("#mensagem_ok").trigger('click');}

if(data == 11111){
     searchData2();
     $('#Modalok .debug-url').html('O Registo #'+id+' foi fechado com sucesso e mail enviado para o operador.');
     $("#mensagem_ok").trigger('click');}

  },
    error:function(){
     $('#Modalko .debug-url').html('O Registo #'+id+' não foi fechado, p.f. verifique a ligação Wi-fi.');
     $("#mensagem_ko").trigger('click');
    }
  });

}
else {
 $('#Modalko .debug-url').html('O Registo #'+id+' já se encontra fechado');
 $("#mensagem_ko").trigger('click');
 }
}




function showFrmRegistryReports(id){
var date = new Date();

d = date.setDate(date.getDate());
$('#del_registry_'+id+' .datetimepicker_dt, .datetimepicker_se').datetimepicker({
    format: 'DD/MM/YYYY', 
    locale: 'pt',
});
$('#del_registry_'+id+' .datetimepicker_h').datetimepicker({format: 'HH:mm',locale: 'pt'});
$('#del_registry_'+id).addClass('list-group-item-success');


o='';
s='';


   if ($('#col-3-'+id+' option').size() <=1)
   { 
     arr = JSON.parse(localStorage.getItem("operadores"));
     for (i=0;i<arr.length;i++){
       o +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
     }
     o +='<option value=""></option>';
     $('#col-15-'+id).append(o);

     arr = JSON.parse(localStorage.getItem("staff"));
     for (i=0;i<arr.length;i++){
       s +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
     }
     s +='<option value=""></option>'; 
     $('#col-3-'+id).append(s);
   }



servicestype = JSON.parse(localStorage.getItem("servicestype")); 
      if (servicestype == null || servicestype.length < 1){
        $('#Modalko .debug-url').html('Não foram encontrados Tipos de Serviços, têm que ser criados, p.f. crie no link "Definições" em "Tipo de Serviços".<br>Após a criar os serviços, p.f. reinicie a Sessão.');
        $("#mensagem_ko").trigger('click');
      }
      else {
       if ($('#col-4-'+id+' option').size() <=1){
        for(i=0;i<servicestype.length;i++){
         $('#col-4-'+id).append("<option value='"+servicestype[i].servico+"'>"+servicestype[i].servico+"</option>");
        }
       }
      }


  $('#col-0-'+id).fadeIn();
  for(i=1;i<25;i++){
    $(" #col-"+i+"-"+id).fadeIn().next().hide();
    }
    $("#action-"+id).html('<button class="btn btn-success safe_it" onclick="saveItemRegistryReports('+id+');"><span class="glyphicon glyphicon-save-file" title="Guardar Registo: '+id+'"></span</button><button style="margin-left: 9px;" title="Cancelar Edição" class="btn btn-default "onclick="cancelRegistryReports('+id+');"><span class="glyphicon glyphicon-remove-sign" title="Fechar Edição: '+id+'"></span></button>');

/*CORRECAO TABELA*/
setTimeout(function(){
 $(".table.with-responsive-wrapper").floatThead({
        responsiveContainer: function($table){
            return $table.closest(".table-responsive");
        },
        zIndex: function($table){
            return 1;},
        top: function($table){
            return 51;

        }
    });
window.dispatchEvent(new Event('resize'));
 }, 150);

}


/*FECHAR OS CAMPOS DE EDIÇÃO REGISTOS RELATORIO*/
function cancelRegistryReports(id){
  $('#col-0-'+id).fadeOut();
$('#del_registry_'+id).removeClass('list-group-item-success');
   for(i=1;i<25;i++){
    $("#col-"+i+"-"+id).fadeOut().next().show();
    }
    $("#action-"+id).html("<button title='Apagar Registo: "+id+"' class='btn btn-danger' onclick='confirmDeleteRegistriesReports("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left: 7px;' class='btn btn-info' title='Editar Registo: "+id+"'onclick='showFrmRegistryReports("+id+")'><span class='glyphicon glyphicon-edit'></span></button><a id='close-ser-"+id+"' class='btn btn-default' style='margin-left: 7px;' title='Fechar Serviço' onclick='closeServicies("+id+",0)'><span class='glyphicon glyphicon-stop'></span></a>");
 
/*CORRECAO TABELA*/
setTimeout(function(){
 $(".table.with-responsive-wrapper").floatThead({
        responsiveContainer: function($table){
            return $table.closest(".table-responsive");
        },
        zIndex: function($table){
            return 1;},
        top: function($table){
            return 51;

        }
    });
window.dispatchEvent(new Event('resize'));
 }, 150);
}

/* EDITAR/ALTERAÇÃO GRAVAR REGISTOS RELATORIO*/
function saveItemRegistryReports(id){

cmx_st = 0;
cmx_st_tot = 0;
cmx_op = 0;
cmx_op_tot = 0;
cb_op_tot = 0;
cb_op = 0;
cb_di_tot = 0;
cb_op_tot = 0;
geral_tot = 0;
cmx_tot = 0;

  var dataValue='';
  for(i=1;i<25;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=8";
  $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      arr=[];
      arr =  JSON.parse(data);
      i=0;
      data_out = moment(arr[0].data_servico*1000).format("DD/MM/YYYY");
      hora_out = moment(arr[0].hrs*1000).format("H:mm");

if( arr[i].cmx_st) cmx_st_tot += parseFloat(arr[i].cmx_st);
if( arr[i].cmx_op) cmx_op_tot += parseFloat(arr[i].cmx_op);
if( arr[i].cobrar_direto) cb_di_tot += parseFloat(arr[i].cobrar_direto);
if( arr[i].cobrar_operador) cb_op_tot += parseFloat(arr[i].cobrar_operador);

arr[i].cmx_st && arr[i].cmx_st != '0'  ? cmx_st = parseFloat(arr[i].cmx_st).toFixed(2)+"€" : cmx_st = '';
arr[i].cmx_op && arr[i].cmx_op != '0' ? cmx_op = parseFloat(arr[i].cmx_op).toFixed(2)+"€" : cmx_op = '';
arr[i].cobrar_direto && arr[i].cobrar_direto != '0' ? cb_di = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€" : cb_di = '';
arr[i].cobrar_operador && arr[i].cobrar_operador != '0' ? cb_op = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€" : cb_op = '';

arr[i].estado == 'Fechado' ? estado = 1 : estado = 0;

$('#del_registry_'+arr[i].id).fadeOut().html("<td class='col-0'><label>"+arr[i].id+"</label></td><td class='col-1'><input type='text' id='col-1-"+arr[i].id+"' class='datetimepicker_dt frm-item' value='"+data_out+"'><label>"+data_out+"</label></td><td class='col-2'><input type='text' id='col-2-"+arr[i].id+"' class='datetimepicker_h frm-item' value='"+hora_out+"'><label>"+hora_out+"</label></td><td class='col-3'><select id='col-3-"+arr[i].id+"' class='frm-item form_select'><option selected value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><label>"+arr[i].staff+"</label></td><td class='col-4'><select id='col-4-"+arr[i].id+"' class='add_servico form_select frm-item'><option value='"+arr[i].servico+"'>"+arr[i].servico+"</option></select><label>"+arr[i].servico+"</label></td><td class='col-5'><select id='col-5-"+arr[i].id+"' class='add_estado frm-item form_select'><option value='"+arr[i].estado+"'>"+arr[i].estado+"</option><option value='Aceite'> Aceite</option><option value='Aguarda'>Aguarda</option><option value='Anulado'>Anulado</option><option value='Cancelado'>Cancelado</option><option value='Confirmado'> Confirmado</option><option value='Fechado'> Fechado</option><option value='Iniciado'> Iniciado</option><option value='Pendente'> Pendente</option><option value='Rejeitado'> Rejeitado</option></select><label>"+arr[i].estado+"</label></td><td class='col-6'><input type='text' id='col-6-"+arr[i].id+"' class='frm-item' value='"+arr[i].voo+"'><label>"+arr[i].voo+"</label></td><td class='col-7'><input type='text' id='col-7-"+arr[i].id+"' class='frm-item' value='"+arr[i].nome_cl+"'><label>"+arr[i].nome_cl+"</label></td><td class='col-8'><input type='text' id='col-8-"+arr[i].id+"' class='frm-item' value='"+arr[i].local_recolha+"'><label>"+arr[i].local_recolha+"</label></td><td class='col-9'><input type='text' id='col-9-"+arr[i].id+"' class='frm-item' value='"+arr[i].local_entrega+"'><label>"+arr[i].local_entrega+"</label></td><td class='col-10'><input type='text' id='col-10-"+arr[i].id+"' class='frm-item' value='"+arr[i].ponto_referencia+"'><label>"+arr[i].ponto_referencia+"</label></td><td class='col-11'><input type='number' min='1' id='col-11-"+arr[i].id+"' class='frm-item' value='"+arr[i].px+"'><label>"+arr[i].px+"</label></td><td class='col-12'><input type='number' min='0' id='col-12-"+arr[i].id+"' class='frm-item' value='"+arr[i].cr+"'><label>"+arr[i].cr+"</label></td><td class='col-13'><input type='number' min='0' id='col-13-"+arr[i].id+"' class='frm-item' value='"+arr[i].bebe+"'><label>"+arr[i].bebe+"</label></td><td class='col-14'><input type='text' id='col-14-"+arr[i].id+"' class='frm-item' value='"+arr[i].obs+"'><label>"+arr[i].obs+"</label></td><td class='col-15'><select id='col-15-"+arr[i].id+"' class='frm-item form_select'><option selected value='"+arr[i].operador+"'>"+arr[i].operador+"</option></select><label>"+arr[i].operador+"</label></td><td class='col-16'><input type='text' id='col-16-"+arr[i].id+"' class='frm-item' value='"+arr[i].ticket+"'><label>"+arr[i].ticket+"</label></td><td class='col-17'><input type='number' step='any' min='0' id='col-17-"+arr[i].id+"' class='frm-item' value='"+arr[i].cobrar_operador+"'><label class='txt-fr'>"+cb_op+"</label></td><td class='col-18'><a title='Recebido do Operador' class='rfo-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",0)'><span class='glyphicon glyphicon-tower'></span></a><select id='col-18-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].rec_ope+"'>"+arr[i].rec_ope+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].rec_ope+"</label></td><td class='col-19'><input type='number' step='any' min='0' id='col-19-"+arr[i].id+"' class='frm-item' value='"+arr[i].cobrar_direto+"'><label class='txt-fr'>"+cb_di+"</label></td><td class='col-20'><a title='Recebido do Staff' class='rfs-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",1)' style='margin-left: 7px;'><span class='glyphicon glyphicon-user'></span></a><select id='col-20-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].rec_staf+"'>"+arr[i].rec_staf+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].rec_staf+"</label></td><td class='col-21'><input type='number' step='any' min='0' id='col-21-"+arr[i].id+"' class='frm-item' value='"+arr[i].cmx_op+"'><label class='txt-fr'>"+cmx_op+"</label></td><td class='col-22'><a title='Pago a Operador' class='pto-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",2)' style='margin-left: 7px;'><span class='glyphicon glyphicon-tower'></span></a><select id='col-22-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].pag_ope+"'>"+arr[i].pag_ope+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].pag_ope+"</label></td><td class='col-23'><input type='number' min='0' step='any' id='col-23-"+arr[i].id+"' class='frm-item' value='"+arr[i].cmx_st+"'><label class='txt-fr'>"+cmx_st+"</label></td><td class='col-24'><a title='Pago ao Staff' class='pts-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",3)' style='margin-left: 7px;'><span class='glyphicon glyphicon-user'></span></a><select id='col-24-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].pag_staf+"'>"+arr[i].pag_staf+"</option><option value='Não'> Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].pag_staf+"</label></td><td class='col-25' id='action-"+arr[i].id+"'style='display:inline-flex'><button title='Apagar Registo: "+arr[i].id+"' class='btn btn-danger' onclick='confirmDeleteRegistriesReports("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left: 7px;' class='btn btn-info' title='Editar Registo: "+arr[i].id+"' onclick='showFrmRegistryReports("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button><a id='close-ser-"+arr[i].id+"' class='btn btn-default' style='margin-left: 7px;' title='Fechar Serviço: "+arr[i].id+"' onclick='closeServicies("+arr[i].id+","+estado+")'><span class='glyphicon glyphicon-stop'></span></a></td>").fadeIn().addClass('blink').removeClass('list-group-item-success');
$('#cb_op_tot, #cb_di_tot, #cmx_op_tot, #cmx_st_tot, #geral_tot, #cmx_tot').empty();

arr[i].rec_ope == 'Sim' ? $('.rfo-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.rfo-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

arr[i].rec_staf == 'Sim' ? $('.rfs-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.rfs-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

arr[i].pag_ope == 'Sim' ? $('.pto-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.pto-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

arr[i].pag_staf == 'Sim' ? $('.pts-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.pts-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');

 
/*CORRECAO TABELA*/
setTimeout(function(){
 $(".table.with-responsive-wrapper").floatThead({
        responsiveContainer: function($table){
            return $table.closest(".table-responsive");
        },
        zIndex: function($table){
            return 1;},
        top: function($table){
            return 51;

        }
    });
window.dispatchEvent(new Event('resize'));
 }, 250);


 setTimeout(function(){
    $('tr').removeClass('blink');
  }, 5000);
    },
    error:function(){
      $('#Modalko .debug-url').html('O Registo <b>'+id+'</b> não foi modificado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}



</script>