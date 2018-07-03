<?php
session_start();
?>

<style>
.table-condensed>thead>tr>th {
padding: 0px;}


</style>

<div class="registries-filters">

<div class="company"></div>

<div class="panel panel-default">

<div class="panel-heading my-orange">
<div class="row">
<div class="col-xs-7">
<h3 class="panel-title">
<span class="glyphicon glyphicon-filter"></span> Validações</h3>
</div>

<div class="col-xs-5">
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


<div class='search_results'>
<div class="form-group">
<h3 style="text-align:center; font-size:21px;"><span class="label label-default" id='nr_resultados' style="padding: 10px;">/span><h3>
</div>
</div>

<div class='searchprint'></div>

<div class='nosearchprint'>
<div class='row'>
<div class='col-sm-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
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
</div>


<div class='col-sm-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
<select class="form-control" id="paymentfilterdates" onchange="paymentFilterDates(this.value)">
<option value=''>Escolha Data</option>
<option value='1'> Data</option>
<option value='2'> Entre datas</option>
</select>
</div>
</div>
</div>


<div class='col-sm-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-eur"></span></span>
<select class="form-control" id='paymentfiltertype'>
<option value='0'>Escolha Operação</option>
</select>
</div>
</div>
</div>
</div>



<div class='row'>
<div class="staff_date" style="display:none;">
<div class="col-sm-3 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" value="" class="form-control" name="staff_name" id="staff_name" placeholder="Nome Staff ">
</div>
</div>
</div>
</div>


<div class="operator_date" style="display:none;">
<div class="col-sm-3 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
<input type="text" value="" class="form-control" name="operator_name" id="operator_name" placeholder="Nome Operador">
</div>
</div>
</div>
</div>

<div class="in_date" style="display:none;">
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group">
    <div class="input-group datetimepicker_se">
      <input type="text" class="form-control" id="day_date" name="day_date" placeholder="Dia da pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>

<div class="between_date" style="display:none;">
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group">
    <div class="input-group" id="datetimepicker6">
      <input type="text" class="form-control" id="date_ini" name="date_ini" placeholder="Dia Inicio pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group">
    <div class="input-group" id="datetimepicker7">
      <input type="text" class="form-control" id="date_fim" name="date_fim" placeholder="Dia Fim pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table table-striped">
    <thead class="my-gray">
      <tr>
        <th class='bdr-w tbhcv col-0'>ID</th>
        <th class='bdr-w tbhcv col-1'>Refª</th>
        <th class='bdr-w tbhcv col-2'>Data</th>
        <th class='bdr-w tbhcv col-3'>Hora</th>
        <th class='bdr-w tbhcv col-4'>Staff</th>
        <th class='bdr-w tbhcv col-5'>Viatura</th>
        <th class='bdr-w tbhcv col-6'>Serviço</th>
        <th class='bdr-w tbhcv col-7'>Estado</th>
        <th class='bdr-w col-8'>Total<br>Pax</th>
        <th class='bdr-w tbhcv col-9'>Operador</th>
        <th class='bdr-w col-10'>Cob<br>Oper</th>
        <th class='bdr-w col-11'>Rec<br>Oper</th>
        <th class='bdr-w col-12'>Cob<br>Diret</th>
        <th class='bdr-w col-13'>Rec<br>Staff</th>
        <th class='bdr-w col-14'>Cms<br>Oper</th>
        <th class='bdr-w col-15'>Pago<br>Oper</th>
        <th class='bdr-w col-16'>Cms<br>Staff</th>
        <th class='bdr-w col-17'>Pago<br>Staff</th>
        <th class='bdr-w tbhcv col-18'>Acções</th>
      </tr>
    </thead>
    <tbody id="delete_team">
    </tbody>
  <tfoot class="my-gray">
    <tr>
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
      <td class='col-11'>
      <label class='txt-fr'>Cob:</label>
      </td>
      <td class='col-12'>
      <label class='geral_tot txt-fr'</label> 
      </td>
      <td class='col-13'></td>
      <td class='col-14'></td>
      <td class='col-15'>
      <label class='txt-fr'>Cms:</label>
      </td>
      <td class='col-16'>
      <label class='cmx_tot txt-fr'</label> 
       </td>
      <td class='col-17'></td>
      <td class='col-18'></td>
    </tr>
  </tfoot>
<tfoot class="my-gray">
    <tr>
      <td class='col-0'><label> Sub<label></td>
      <td class='col-1'><label>Total:<label></td>
      <td class='col-2'></td>
      <td class='col-3'></td>
      <td class='col-4'></td>
      <td class='col-5'></td>
      <td class='col-6'></td>
      <td class='col-7'></td>
      <td class='col-8'></td>
      <td class='col-9'>
      <label class='txt-fr'>Cob:</label>
      </td>
      <td class='col-10'>
      <label class='txt-stco txt-fr'></label>
      </td>
      <td class='col-11'>
      </td>
      <td class='col-12'>
      <label class='txt-stcs txt-fr'></label>
      </td>
      <td class='col-13'>
      <label class='txt-fr'>Cms:</label>
      </td>
      <td class='col-14'>
      <label class='txt-cmop txt-fr'></label></td>
      <td class='col-15'></td>
      <td id='cmx_tot' class='col-16'>
      <label class='txt-cmst txt-fr'></label></td>
      </td>
      <td id='cmx_tot' class='col-17'></td>
      <td id='cmx_tot' class='col-18'></td>
    </tr>
  </tfoot>


</table>
</div>


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



        $('#datetimepicker6').datetimepicker({format: 'DD/MM/YYYY HH:mm', 
    locale: 'pt'});
        $('#datetimepicker7').datetimepicker({format: 'DD/MM/YYYY HH:mm', 
    locale: 'pt', useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
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
var datum = new Date(Date.UTC(arr_di[2],(arr_di[1]-1),arr_di[0],arr_di[3],arr_di[4]));

di= (datum.getTime()/1000)-3600;

var df_fim = df.replace(" ", "/");
df_fim = df_fim.replace(":","/");
arr_df=df_fim.split("/");
arr_df[0];
arr_df[1];
arr_df[2];
arr_df[3];
arr_df[4];
var datum = new Date(Date.UTC(arr_df[2],(arr_df[1]-1),arr_df[0],arr_df[3],arr_df[4]));
df= (datum.getTime()/1000)-3600;



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

totalPax = 0;
setTimeout(function(){
dataValue='action=6'+dt1+''+dt2+''+dt3;

console.log(dataValue);

     $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    cache:false,
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
      
       arr[i].px ? px = parseInt(arr[i].px) : px = 0;
       arr[i].cr ? cr = parseInt(arr[i].cr) : cr = 0; 
       arr[i].bebe ? bebe = parseInt(arr[i].bebe) : bebe = 0; 

       totalPax = px+ cr + bebe;

       if( arr[i].cmx_st) cmx_st_tot += parseFloat(arr[i].cmx_st);
       if( arr[i].cmx_op) cmx_op_tot += parseFloat(arr[i].cmx_op);
       if( arr[i].cobrar_direto) cb_di_tot += parseFloat(arr[i].cobrar_direto);
       if( arr[i].cobrar_operador) cb_op_tot += parseFloat(arr[i].cobrar_operador);

arr[i].cmx_st && arr[i].cmx_st != '0'  ? cmx_st = parseFloat(arr[i].cmx_st).toFixed(2)+"€" : cmx_st = '';
arr[i].cmx_op && arr[i].cmx_op != '0' ? cmx_op = parseFloat(arr[i].cmx_op).toFixed(2)+"€" : cmx_op = '';
arr[i].cobrar_direto && arr[i].cobrar_direto != '0' ? cb_di = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€" : cb_di = '';
arr[i].cobrar_operador && arr[i].cobrar_operador != '0' ? cb_op = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€" : cb_op = '';

arr[i].estado == 'Fechado' ? estado = 1 : estado = 0;

          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;
          !arr[i].matricula ? matr= '-/-': false;


$("#delete_team").append("<tr id='del_registry_"+arr[i].id+"'><td class='col-0'><label>"+arr[i].id+"</label></td><td class='col-1'> <label>"+arr[i].referencia+"</label> </td><td class='col-2'><label>"+data_out+"</label></td><td class='col-3'><label>"+hora_out+"</label></td> <td class='col-4'><label>"+arr[i].staff+"</label></td><td class='col-5'><label style='white-space: nowrap;'>"+matr+"</label></td><td class='col-6'><label >"+arr[i].servico+"</label></td><td class='col-7'><label id='col-7-"+arr[i].id+"'>"+arr[i].estado+"</label></td><td class='col-8'><label style='margin-left:40%;'>"+totalPax+"</label></td><td class='col-9'><label>"+arr[i].operador+"</label></td><td class='col-10'><label class='txt-fr'>"+cb_op+"</label></td><td class='col-11'><a style='margin-left: 7px;' title='Recebido do Operador' class='rfo-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",0)'><input type='hidden' id='col-11-"+arr[i].id+"' value='"+arr[i].rec_ope+"'><span class='glyphicon glyphicon-tower'></span></a></td><td class='col-12'><label class='txt-fr'>"+cb_di+"</label></td><td class='col-13'><a title='Recebido do Staff' class='rfs-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",1)' style='margin-left: 7px;'><input type='hidden' id='col-13-"+arr[i].id+"' value='"+arr[i].rec_staf+"'><span class='glyphicon glyphicon-user'></span></a></td><td class='col-14'><label class='txt-fr'>"+cmx_op+"</label></td><td class='col-15'><a title='Pago a Operador' class='pto-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",2)' style='margin-left: 7px;'><input type='hidden'id='col-15-"+arr[i].id+"' value='"+arr[i].pag_ope+"'><span class='glyphicon glyphicon-tower'></span></a></td><td class='col-16'><label class='txt-fr'>"+cmx_st+"</label></td><td class='col-17'><a title='Pago ao Staff' class='pts-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+",3)' style='margin-left: 7px;'><input type='hidden' id='col-17-"+arr[i].id+"' value='"+arr[i].pag_staf+"'><span class='glyphicon glyphicon-user'></span></a></td><td class='col-18' id='action-"+arr[i].id+"'style='display:inline-flex'><button title='Apagar Registo: "+arr[i].id+"' class='btn btn-danger' onclick='confirmDeleteRegistriesReports("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><a id='close-ser-"+arr[i].id+"' class='btn btn-warning' style='margin-left: 7px;' title='Fechar Serviço : "+arr[i].id+"' onclick='closeServicies("+arr[i].id+","+estado+")'><i class='fa fa-taxi'></i></a></td></tr>");

$("#col-7-"+arr[i].id).text() == "Fechado" ? $("#close-ser-"+arr[i].id).addClass("btn-success").removeClass("btn-warning").attr('title', 'Serviço : '+arr[i].id+' Fechado') : false;

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


 cb_op_tot !=0 ? $('.txt-stco').text(cb_op_tot.toFixed(2)+"€") : $('.txt-stco').text("-/-");

 cb_di_tot !=0 ? $('.txt-stcs').text(cb_di_tot.toFixed(2)+"€") : $('.txt-stcs').text("-/-");

 cmx_st_tot !=0 ? $('.txt-cmst').text(cmx_st_tot.toFixed(2)+"€") : $('.txt-cmst').text("-/-");

 cmx_op_tot !=0 ? $('.txt-cmop').text(cmx_op_tot.toFixed(2)+"€") : $('.txt-cmop').text("-/-");

 cmx_tot !=0 ? $('.cmx_tot').text(cmx_tot.toFixed(2)+"€") : $('.cmx_tot').text("-/-");

 geral_tot !=0 ? $('.geral_tot').text(geral_tot.toFixed(2)+"€") : $('.geral_tot').text("-/-");




    }




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

/*CHECKS REBCEBIDO OPERADOR*/
case 0: 
vl = $('#col-11-'+id).val();
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=11&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-11-'+id).val(vl);
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
vl = $('#col-13-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=12&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-13-'+id).val(vl);
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
vl = $('#col-15-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=13&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-15-'+id).val(vl);
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
vl = $('#col-17-'+id).val()
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=14&id="+id+"&vl="+vl;
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-17-'+id).val(vl);
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
      dataType: 'html',
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
      $("#mensagem_ok").trigger('click');
}

if(data == 11111){
     searchData2();
     $('#Modalok .debug-url').html('O Registo #'+id+' foi fechado com sucesso e mail enviado para o operador.');
     $("#mensagem_ok").trigger('click');
    }

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

</script>