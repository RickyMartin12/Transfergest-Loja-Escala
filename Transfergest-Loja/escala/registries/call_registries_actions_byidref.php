<?php
session_start();
?>

<style>
.twoway:first-of-type {border-top: 3px dotted #888;}
.twoway, .show_reg{display:none;}
.frm-item {font-size: 11px; padding: 2px;}
.bd{padding: 5px;}
.panel-body {padding:0px;}
</style>

<div class="expensies-filters">
	<div class="company"></div>
	<div class="panel panel-default no-print">
		<div class="panel-heading my-orange">
			<div class="row">
				<h3 class="panel-title col-xs-12 col-md-6 col-lg-6">
					<span class="glyphicon glyphicon-filter"></span> Pesquisa ID ou Refº
				</h3>
				<div class="col-xs-12 col-md-6 col-lg-6" style="text-align: right;">
					<a href="#" class="btn btn-default btn-print hidden-xs disabled" onclick="goToPrint(4)" title="Imprimir Serviço">
						<span class="glyphicon glyphicon-print"></span><span> Imprimir</span>
					</a>
                	<a href="#" onclick='searchServiceId($("#id_name").val())' id='search_action' class="btn btn-info" title="Filtrar ID ou Refª">
                		<span class="glyphicon glyphicon-filter"></span><span class="hidden-xs"> Pesquisar</span>
               		</a>
                </div>
            </div>
			<div class='row'>
				<div class="col-sm-6 col-xs-12">
					<div class="form-group mrg input-group">
						<span class="input-group-addon">#</span>
						<input type="text" class="form-control" name="id_name" id="id_name" placeholder="ID Serviço ou Referência">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default show_reg">
	<div class="panel-heading my-orange">
		<h3 class="panel-title myvoucher" >
			<span class="glyphicon glyphicon-list-alt"></span> Registos
		</h3>
	</div>
	<div class="panel-body" id="delete_team"></div>
	<div class="panel-footer"></div>
</div>

<div class="signatures row" style="margin-top:40px;">
	<div class="col-xs-7"></div>
	<div class="col-xs-5" style="border-bottom:1px solid #000;">A gerência<p><br></p>
	</div>
</div>


<script type="text/javascript">

function searchServiceId(vl){
  if (!vl){
    $('#Modalko .debug-url').html('O campo para pesquisa está vazio!');
    $("#mensagem_ko").trigger('click');
  }

  else{
    serv='';
    setTimeout(function(){
    $('.back').fadeIn();
      dataValue='action=7&id='+vl;
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
            $('.show_reg').hide();
            $('.btn-print').addClass('disabled');
          }
          else {
            $('.btn-print').removeClass('disabled');
            $('.show_reg').show();
            for(i=0;i<arr.length;i++){
              data_out = moment(arr[i].data_servico*1000).format("DD/MM/YYYY");
              hora_out = moment(arr[i].hrs*1000).format("H:mm");
              arr[i].cobrar_direto ? cob_dir = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€":cob_dir = '-/-';
              arr[i].cobrar_operador ? cob_ope = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€":cob_ope = '-/-';
              fs = arr[i].matricula.substring(0, 2);
              md = arr[i].matricula.substring(2, 4);
              fn =arr[i].matricula.substring(4, 6);
              matr = fs+"-"+md+"-"+fn;
              serv += "<div class='cbc'></div><div class='row ficha' style='margin-top:0px;' id='del_registry_"+arr[i].id+"'><div class='servico'><h5 class='prt_header'><span class='glyphicon glyphicon-tags'></span> Serviço</h5><div class='bd myid col-md-1 col-sm-3 col-xs-6'><label>ID</label><br/><input style='cursor:not-allowed;' type='text' id='col-0-"+arr[i].id+"' class='frm-item form-control' readonly='true' value='"+arr[i].id+"'><font>"+arr[i].id+"</font></div><div class='bd myref col-md-2 col-sm-3 col-xs-6'><label>Ref</label><br/><input data-toggle='tooltip' data-placement='top' title='Ao alterar a Referência verifique se tem retorno, se sim tem que alterar ambas as Referências (valores iguais)!' type='text' id='col-1-"+arr[i].id+"' class='frm-item form-control'value='"+arr[i].referencia+"'><font>"+arr[i].referencia+"</font></div><div class='bd mydata col-md-2 col-sm-3 col-xs-6'><label>Data</label><br><input type='text' id='col-2-"+arr[i].id+"' readonly class='datetimepicker_dt frm-item form-control' value='"+data_out+"'><font>"+data_out+"</font></div><div class='bd myhora col-md-1 col-sm-3 col-xs-6'><label>Hora</label><br/><input type='text' id='col-3-"+arr[i].id+"' readonly class='datetimepicker_h frm-item form-control' value='"+hora_out+"'><font>"+hora_out+"</font></div><div class='bd mystaff col-md-2 col-sm-6 col-xs-6'><label>Staff</label><br><select id='col-4-"+arr[i].id+"' class='addstaff frm-item form-control'><option value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><font>&nbsp;"+arr[i].staff+"</font></div><div class='bd myservico col-md-2 col-sm-6 col-xs-6'><label>Servico</label><br><select id='col-5-"+arr[i].id+"' class='add_servico frm-item form-control'><option value='"+arr[i].servico+"'>"+arr[i].servico+"</option></select><font>&nbsp;"+arr[i].servico+"</font></div><div class='bd myestado col-md-1 col-sm-6 col-xs-6'><label>Estado</label><br><select id='col-6-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+arr[i].estado+"'>"+arr[i].estado+"</option><option value='Aceite'> Aceite</option><option value='Aguarda'>Aguarda</option><option value='Anulado'>Anulado</option><option value='Cancelado'>Cancelado</option><option value='Confirmado'> Confirmado</option><option value='Fechado'> Fechado</option><option value='Iniciado'> Iniciado</option><option value='Pendente'> Pendente</option><option value='Rejeitado'> Rejeitado</option></select><font>&nbsp;"+arr[i].estado+"</font></div><div class='bd mymatricula col-md-1 col-sm-6 col-xs-6'><label>Matricula</label><br><select id='col-7-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+matr+"'>"+matr+"</option></select><font class='txt_matr'>&nbsp;"+matr+"</font></div></div><div class='cliente'><h5 class='col-xs-12'><span class='label label-default' style='padding: 4px;'><span class='glyphicon glyphicon-user'></span> Cliente </span></h5><div class='bd myvoo col-md-2 col-sm-6 col-xs-6'><label>Nº Voo</label><br><input type='text' id='col-8-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].voo+"'><font>&nbsp;"+arr[i].voo+"</font></div><div class='bd mynome col-md-2 col-sm-6 col-xs-6'><label>Nome</label><br><input type='text' id='col-9-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].nome_cl+"'><font>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd myemail col-md-2 col-sm-6 col-xs-6'><label>Email</label><br><input type='text' id='col-10-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].email+"'><font>&nbsp;"+arr[i].email+"</font></div><div class='bd mytel col-md-2 col-sm-6 col-xs-6'><label>Telefone</label><br><input type='text' id='col-11-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].telefone+"'><font>&nbsp;"+arr[i].telefone+"</font></div><div class='bd mypais col-md-2 col-sm-12 col-xs-12'><label>Pais</label><br><input type='text' id='col-12-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].pais+"'><font>&nbsp;"+arr[i].pais+"</font></div><div class='bd myrec col-md-2 col-sm-6 col-xs-12'><label>Recolha</label><br><input type='text' id='col-13-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_recolha+"'><font>&nbsp;"+arr[i].local_recolha+"</font></div><div class='bd myent col-md-2 col-sm-6 col-xs-12'><label>Entrega</label><br><input type='text' id='col-14-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_entrega+"'><font>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd myptref col-md-4 col-sm-12 col-xs-12'><label>P. Referência</label><br><input type='text' id='col-15-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ponto_referencia+"'><font>&nbsp;"+arr[i].ponto_referencia+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Adulto</label><br><input type='number' min='1' id='col-16-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].px+"'><font>&nbsp;"+arr[i].px+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Criança</label><br><input type='number' min='0' id='col-17-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cr+"'><font>&nbsp;"+arr[i].cr+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Bébé</label><br><input type='number' min='0' id='col-18-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].bebe+"'><font>&nbsp;"+arr[i].bebe+"</font></div><div class='bd myobs col-sm-12 col-xs-12'><label>Observações</label><br><input type='text' id='col-19-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].obs+"'><font>&nbsp;"+arr[i].obs+"</font></div></div><div class='operador col-xs-12 col-md-6'><h5 class=''><span class='label label-default' style='padding: 4px;'><span class='glyphicon glyphicon-tower'></span> Operador</span></h5><div class='bd col-sm-6 xs6 col-xs-6'><label>Operador</label><br><select id='col-20-"+arr[i].id+"' class='addstaff frm-item form-control'><option value='"+arr[i].operador+"'>"+arr[i].operador+"</option></select><font>&nbsp;"+arr[i].operador+"</font></div><div class='bd xs6 col-sm-6 col-xs-6'><label>Ticket</label><br><input type='text' id='col-21-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ticket+"'><font>&nbsp;"+arr[i].ticket+"</font></div></div><div class='cobrancas col-md-6 col-xs-12'><h5 class=''><span class='label valor label-default' style='padding: 4px;'><span class='glyphicon glyphicon-eur'></span> Cobranças</span></h5><div class='bd col-sm-6 col-xs-6'><label>Cob.Operador</label><br><input type='number' min='0' step='any' id='col-22-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_operador+"'><font>"+cob_ope+"</font></div><div class='bd col-xs-6 col-sm-6'><label>Directo</label><br><input type='number' step='any' min='0' id='col-23-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_direto+"'><font>"+cob_dir+"</font></div></div><div class='col-md-12 col-xs-12' style='margin-top:15px;' id='action-"+arr[i].id+"'><div class='btn-group btn-group no-print' style='float: right;' role='group'><button title='Apagar Registo' class='btn btn-danger btn-sm' onclick='confirmDeleteRegistries("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Registo' onclick='showFrmRegistry("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span</button></div></div></div><div class='ft'></div>";
            }
          $("#delete_team").html(serv);
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
}




function confirmDeleteRegistries(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Registo #<strong>"+id+"</strong>",
    title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-trash'></span> Apagar",
      className: "btn-danger",
      callback: function() {
    
    dataValue='id='+id+'&action=2';
     $.ajax({
      type: "POST",
      url: "registries/action_registries.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2){
          $('.debug-url').html('O Registo #'+id+' foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          $('#delete_team').empty();
          $('.show_reg').hide();
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('O Registo #'+id+' não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });

      }
    },
  }
});
}



/*MOSTRAR OS CAMPOS PARA EDIÇAO REGISTOS*/
function showFrmRegistry(id){
$('#del_registry_'+id).addClass('w3-pale-green');
var date = new Date();
d = date.setDate(date.getDate());
$('#del_registry_'+id+' .datetimepicker_dt, .datetimepicker_se').datetimepicker({ignoreReadonly: true,
    format: 'DD/MM/YYYY', 
    locale: 'pt',
});
$('#del_registry_'+id+' .datetimepicker_h').datetimepicker({ignoreReadonly: true,format: 'HH:mm',locale: 'pt'});

arr = JSON.parse(localStorage.getItem("operadores"));
staff = JSON.parse(localStorage.getItem("staff"));
servicestype = JSON.parse(localStorage.getItem("servicestype"));
matr = JSON.parse(localStorage.getItem("matricula"));

if ($('#col-4-'+id+' option').size() <=1){
 for(i=0;i<staff.length;i++){
  $('#col-4-'+id).append("<option value='"+staff[i].label+"'>"+staff[i].label+"</option>");
 } 
}

if ($('#col-5-'+id+' option').size() <=1){  
 for(i=0;i<servicestype.length;i++){
  $('#col-5-'+id).append("<option value='"+servicestype[i].servico+"'>"+servicestype[i].servico+"</option>");
 }
}

if ($('#col-7-'+id+' option').size() <=1){  
 for(i=0;i<matr.length;i++){
  $('#col-7-'+id).append("<option value='"+matr[i].label+"'>"+matr[i].label+"</option>");
 }
}

if ($('#col-20-'+id+' option').size() <=1){
 for(i=0;i<arr.length;i++){
  $('#col-20-'+id).append("<option value='"+arr[i].label+"'>"+arr[i].label+"</option>");
 }
}

  for(i=0;i<24;i++){
    $(" #col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group no-print' style='float:right;' role='group'><button class='btn btn-sm btn-success safe_it' onclick='saveItemRegistry("+id+")' title='Guardar Registo: "+id+"'><span class='glyphicon glyphicon-save-file'></span></button><button class='btn btn-sm btn-default' title='Fechar Edição: "+id+"' onclick='cancelRegistry("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");

$('[data-toggle="tooltip"]').tooltip(); 

}



/*FECHAR OS CAMPOS DE EDIÇÃO REGISTOS*/
function cancelRegistry(id){
$('#del_registry_'+id).removeClass('w3-pale-green');
   for(i=0;i<24;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group no-print' style='float:right;' role='group'><button title='Apagar Registo: "+id+"' class='btn btn-danger btn-sm' onclick='confirmDeleteRegistries("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Registo: "+id+"' onclick='showFrmRegistry("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
  }



/* EDITAR/ALTERAÇÃO GRAVAR REGISTOS*/
function saveItemRegistry(id){
$('#del_registry_'+id).removeClass('w3-pale-green');
  var dataValue='';
  for(i=1;i<24;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=4";
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

arr[0].cobrar_direto ? cob_dir = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€":cob_dir = '--/--';
arr[0].cobrar_operador ? cob_ope = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€":cob_ope = '--/--';

          fs = arr[0].matricula.substring(0, 2);
          md = arr[0].matricula.substring(2, 4);
          fn =arr[0].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;

 $('#del_registry_'+arr[0].id).fadeOut().html("<div class='servico'><h5 class='col-xs-12'><span class='label label-default mylabel' style='padding: 4px;'><span class='glyphicon glyphicon-tags'></span> Serviço</span></h5><div class='bd myid col-md-1 col-sm-3 col-xs-6'><label>ID</label><br/><input style='cursor:not-allowed;' type='text' id='col-0-"+arr[i].id+"' class='frm-item form-control' readonly='true' value='"+arr[i].id+"'><font>"+arr[i].id+"</font></div><div class='bd myref col-md-2 col-sm-3 col-xs-6'><label>Ref</label><br/><input data-toggle='tooltip' data-placement='top' title='Ao alterar a Referência verifique se tem retorno, se sim tem que alterar ambas as Referências (valores iguais)!' type='text' id='col-1-"+arr[i].id+"' class='frm-item form-control'value='"+arr[i].referencia+"'><font>"+arr[i].referencia+"</font></div><div class='bd mydata col-md-2 col-sm-3 col-xs-6'><label>Data</label><br><input type='text' id='col-2-"+arr[i].id+"' class='datetimepicker_dt frm-item form-control' value='"+data_out+"'><font>"+data_out+"</font></div><div class='bd myhora col-md-1 col-sm-3 col-xs-6'><label>Hora</label><br/><input type='text' id='col-3-"+arr[i].id+"' class='datetimepicker_h frm-item form-control' value='"+hora_out+"'><font>"+hora_out+"</font></div><div class='bd mystaff col-md-2 col-sm-6 col-xs-6'><label>Staff</label><br><select id='col-4-"+arr[i].id+"' class='addstaff frm-item form-control'><option selected value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><font>&nbsp;"+arr[i].staff+"</font></div><div class='bd myservico col-md-2 col-sm-6 col-xs-6'><label>Servico</label><br><select id='col-5-"+arr[i].id+"' class='add_servico frm-item form-control'><option value='"+arr[i].servico+"'>"+arr[i].servico+"</option></select><font>&nbsp;"+arr[i].servico+"</font></div><div class='bd myestado col-md-1 col-sm-6 col-xs-6'><label>Estado</label><br><select id='col-6-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+arr[i].estado+"'>"+arr[i].estado+"</option> <option value='Aguarda'> Aguarda</option><option value='Aceite'> Aceite</option><option value='Cancelado'> Cancelado</option><option value='Rejeitado'> Rejeitado</option><option value='Iniciado'> Iniciado</option><option value='Fechado'> Fechado</option></select><font>&nbsp;"+arr[i].estado+"</font></div><div class='bd mymatricula col-md-1 col-sm-6 col-xs-6'><label>Matricula</label><br><select id='col-7-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+matr+"'>"+matr+"</option></select><font class='txt_matr'>&nbsp;"+matr+"</font></div></div><div class='cliente'><h5 class='col-xs-12'><span class='label label-default' style='padding: 4px;'><span class='glyphicon glyphicon-user'></span> Cliente </span></h5><div class='bd myvoo col-md-2 col-sm-6 col-xs-6'><label>Nº Voo</label><br><input type='text' id='col-8-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].voo+"'><font>&nbsp;"+arr[i].voo+"</font></div><div class='bd mynome col-md-2 col-sm-6 col-xs-6'><label>Nome</label><br><input type='text' id='col-9-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].nome_cl+"'><font>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd myemail col-md-2 col-sm-6 col-xs-6'><label>Email</label><br><input type='text' id='col-10-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].email+"'><font>&nbsp;"+arr[i].email+"</font></div><div class='bd mytel col-md-2 col-sm-6 col-xs-6'><label>Telefone</label><br><input type='text' id='col-11-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].telefone+"'><font>&nbsp;"+arr[i].telefone+"</font></div><div class='bd mypais col-md-2 col-sm-12 col-xs-12'><label>Pais</label><br><input type='text' id='col-12-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].pais+"'><font>&nbsp;"+arr[i].pais+"</font></div><div class='bd myrec col-md-2 col-sm-6 col-xs-12'><label>Recolha</label><br><input type='text' id='col-13-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_recolha+"'><font>&nbsp;"+arr[i].local_recolha+"</font></div><div class='bd myent col-md-2 col-sm-6 col-xs-12'><label>Entrega</label><br><input type='text' id='col-14-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_entrega+"'><font>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd myptref col-md-4 col-sm-12 col-xs-12'><label>P. Referência</label><br><input type='text' id='col-15-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ponto_referencia+"'><font>&nbsp;"+arr[i].ponto_referencia+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Adulto</label><br><input type='number' min='1' id='col-16-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].px+"'><font>&nbsp;"+arr[i].px+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Criança</label><br><input type='number' min='0' id='col-17-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cr+"'><font>&nbsp;"+arr[i].cr+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Bébé</label><br><input type='number' min='0' id='col-18-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].bebe+"'><font>&nbsp;"+arr[i].bebe+"</font></div><div class='bd myobs col-sm-12 col-xs-12'><label>Observações</label><br><input type='text' id='col-19-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].obs+"'><font>&nbsp;"+arr[i].obs+"</font></div></div><div class='operador col-xs-12 col-md-6'><h5 class=''><span class='label label-default' style='padding: 4px;'><span class='glyphicon glyphicon-tower'></span> Operador</span></h5><div class='bd col-sm-6 xs6 col-xs-6'><label>Operador</label><br><select id='col-20-"+arr[i].id+"' class='addstaff frm-item form-control'><option selected value='"+arr[i].operador+"'>"+arr[i].operador+"</option></select><font>&nbsp;"+arr[i].operador+"</font></div><div class='bd xs6 col-sm-6 col-xs-6'><label>Ticket</label><br><input type='text' id='col-21-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ticket+"'><font>&nbsp;"+arr[i].ticket+"</font></div></div><div class='cobrancas col-md-6 col-xs-12'><h5 class=''><span class='label valor label-default' style='padding: 4px;'><span class='glyphicon glyphicon-eur'></span> Cobranças</span></h5><div class='bd col-sm-6 col-xs-6'><label>Cob.Operador</label><br><input type='number' min='0' step='any' id='col-22-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_operador+"'><font>"+cob_ope+"</font></div><div class='bd col-xs-6 col-sm-6'><label>Directo</label><br><input type='number' step='any' min='0' id='col-23-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_direto+"'><font>"+cob_dir+"</font></div></div><div class='col-md-12 col-xs-12' style='margin-top:15px;' id='action-"+arr[i].id+"'><div class='btn-group btn-group no-print' style='float: right;' role='group'><button title='Apagar Registo' class='btn btn-danger btn-sm' onclick='confirmDeleteRegistries("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Registo' onclick='showFrmRegistry("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span</button></div></div>").fadeIn().addClass('blink');

 $("html, body").animate({scrollTop: $('#del_registry_'+arr[0].id).offset().top-20}, 500);
  setTimeout(function(){
    $('.row').removeClass('blink');
  }, 5000);
    },
    error:function(){
      $('#Modalko .debug-url').html('O Registo <b>'+id+'</b> não foi modificado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}


</script>