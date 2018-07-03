<style>

.locations{display:none;}

</style>

<div class="panel panel-default">
<form id="form_operator_locations">
	<div class="panel-heading my-orange" style="padding: 10px 0px;">
		<div class="row" style="margin-top: 0px;margin-bottom:0px;">
  			<div class="col-xs-7">
   				<h3 class="panel-title" style="margin-top: 7px;">
   					<span class="glyphicon glyphicon-tower"></span> Novo Local Frequente
   				</h3>
  			</div>
  			<div class="col-xs-5">
   				<button type="submit" style="float:right; margin-left:5px;" class="btn btn-success">
   					<span class="glyphicon glyphicon-save-file" title="Criar Local Operador"></span><font class="hidden-xs"> Guardar</font>
   				</button>
   				<button style="float:right;" type="reset" class="btn btn-default btn-reset">
   					<span class="glyphicon glyphicon-erase" title="Limpar dados"></span><font class="hidden-xs"> Limpar</font>
   				</button>
 			</div>
		</div>
	</div>
	<div class="panel-body" id="showoperator">
		<div class="row" style="margin-top: 0px;margin-bottom:0px;">
			<div class='col-md-4 col-xs-12'>
				<div class="form-group input-group">
                                   <span class="input-group-addon ft18"><span class="glyphicon glyphicon-tags"></span></span>
                                     <input required class="form-control" id="nome_local" placeholder="Nome *" name="nome_local">
				</div>
			</div>

                         <div class='col-md-4 col-xs-12'>
				<div class="form-group input-group">
				 <span class="input-group-addon ft18"><i class="fa fa-crosshairs"></i></span>
					<select required class="form-control" name="zones_locations" id="loccol_11">
                                    	</select>
                                </div>
                        </div>

			<div class='col-md-4 col-xs-12'>
				<div class="form-group input-group">
					<span class="input-group-addon ft18"><span class="glyphicon glyphicon-map-marker"></span></span>
					<input type="text" class="form-control" name="local_gps" placeholder="GPS Morada">
				</div>
			</div>


			<div class='col-md-6 col-xs-12'>
				<div class="form-group input-group">
					<span class="input-group-addon ft18"><span class="glyphicon glyphicon-map-marker"></span></span>
					<input type="text" required class="form-control" name="morada" placeholder="Morada *">
				</div>
			</div>

			<div class='col-md-6 col-xs-12'>
				<div class="form-group input-group">
					<span class="input-group-addon ft18"><span class="glyphicon glyphicon-home"></span></span>
					<input type="text" class="form-control" name="referencias" placeholder="Referências">
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer my-orange"></div>
</form>
</div>

<div class="panel panel-default locations">
  <div class="panel-heading my-orange">
    <h3 class="panel-title">
      <i class="fa fa-map-marker" style="font-size: 20px;"></i> Locais Existentes <span class="show-operador"></span>
    </h3>
  </div>
  <div class="panel-body" style="padding:0px;">
   <div class="table-responsive">
    <table class="table table-striped" style="margin-bottom:0px; font-size:12px;">
     <thead class="my-gray">
       <tr>
         <th class="bdr-w">Nome</th>
         <th class="bdr-w" style="width: 220px;">Zona</th>
          <th class="bdr-w">Gps</th>
         <th class="bdr-w">Morada</th>
        <th class="bdr-w">Referências</th>
         <th style="width:80px">Acções</th>
       </tr>
     </thead>
     <tbody id="show-locations"></tbody>
    </table>
   </div>
</div>
  <div class="panel-footer my-orange"></div>
</div>

<script>

callOperatorLocationsFilter();


/*MOSTRAR OS CAMPOS PARA EDIÇAO LOCAIS OPERADORES*/
function showFrmOperatorLocations(id){
   $('#edit-'+id).addClass('w3-pale-green');
    local='';
    for(i=1;i<6;i++){
    $(" #col-"+i+"-"+id).show().next().hide();
    }
for (i=0;i<ar.length;i++){
  local +='<option data-id="'+ar[i].value+'" value="'+ar[i].label+'">'+ar[i].label+'</option>';
}

$('#col-2-'+id).append(local);

    $("#action-"+id).html("<button style='float:right; margin-left:6px;' class='btn btn-sm btn-success safe_it' onclick='saveItemOperatorLocations("+id+")' title='Guardar'><span class='glyphicon glyphicon-save-file'></span></button><button style='float:right;' class='btn btn-sm btn-default' onclick='cancelOperatorLocations("+id+")' title='Fechar edição'><span class='glyphicon glyphicon-remove-sign'></span></button>");
}


/*FECHAR OS CAMPOS DE EDIÇÃO LOCAIS OPERADORES*/
function cancelOperatorLocations(id){
  
   $('#edit-'+id).removeClass('w3-pale-green');
 
   for(i=1;i<6;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<button style='float:right; margin-left:6px;' title='Apagar Local Operador' class='btn btn-sm btn-danger' onclick='confirmDeleteOperatorLocations("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='float:right;'class='btn btn-sm btn-info' title='Editar Local Operador' onclick='showFrmOperatorLocations("+id+")'><span class='glyphicon glyphicon-edit'></span></button>");
  }

/* EDITAR/ALTERAÇÃO GRAVAR LOCAIS OPERADORES  */
function saveItemOperatorLocations(id){

  l = $('#col-1-'+id).val();

  var dataValue='';
  for(i=1;i<6;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=4";

 $.ajax({ url:'operator/action_operator_locations.php',
    data:dataValue,
    type:'POST',
    cache:false,
     success:function(data){
      if (data == 0){
        $('.debug-url').html("Erro, ao modificar o local <strong>"+l+"</strong>!");
        $("#mensagem_ko").trigger('click');
      }
     else if (data == 1){
      $('.debug-url').html("O local <strong>"+l+"</strong> foi modificado com sucesso.");
      $("#mensagem_ok").trigger('click');
      callOperatorLocationsFilter();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html("O local <strong>"+l+"</strong> não foi modificado, p.f. verifique a ligação Wi-Fi.");
      $("#mensagem_ko").trigger('click');
      setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
    }
  });
}


function confirmDeleteOperatorLocations(id){

  l = $('#col-1-'+id).val();

bootbox.dialog({
  message: "Tem a certeza que pretende apagar o local <strong>"+l+"</strong> ?",
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
      cache:false,
      url: "operator/action_operator_locations.php",
      data: dataValue,
      success: function(data){
        if(data == 2){
          callOperatorLocationsFilter();
          $('.debug-url').html('O local <strong>'+l+'</strong>, foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('O local <strong>'+l+'</strong>, não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
        setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
      }
   });

      }
    },
  }
});
}




function callOperatorLocationsFilter(){
  $('.back').fadeIn();
  setTimeout(function(){
    dataValue='action=3';
     $.ajax({ url:'operator/action_operator_locations.php',
      data:dataValue,
      type:'POST',
      cache:false,
      success:function(data){
       $(".back").fadeOut();
       arr=[];
       arr =  JSON.parse(data);
       if (arr == null || arr.length < 1){
        $("#show-locations").html("Sem locais criados");
        $('.locations').show();
       }
       else {
        temp='';
        $('.locations').show();
        for(i=0;i<arr.length;i++){
temp += "<tr id='edit-"+arr[i].id+"'><td><input type='text' value='"+arr[i].nome+"' id='col-1-"+arr[i].id+"' class='frm-item form-control'><span>"+arr[i].nome+"</span></td><td><select id='col-2-"+arr[i].id+"' class='frm-item form-control'><option value ='"+arr[i].zona+"'>"+arr[i].zona+"</option></select><span>"+arr[i].zona+"</span></td><td><input type='text' value='"+arr[i].morada_gps+"' id='col-3-"+arr[i].id+"' class='frm-item form-control'><span>"+arr[i].morada_gps+"</span></td><td><input type='text' value='"+arr[i].morada+"' id='col-4-"+arr[i].id+"' class='frm-item form-control'><span>"+arr[i].morada+"</span></td><td><input type='text' value='"+arr[i].referencias+"' id='col-5-"+arr[i].id+"' class='frm-item form-control'><span>"+arr[i].referencias+"</span></td><td id='action-"+arr[i].id+"'><button style='float:right;margin-left: 6px;' title='Apagar Local Operador' class='btn btn-sm btn-danger' onclick='confirmDeleteOperatorLocations("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='float:right;' class='btn btn-sm btn-info' title='Editar Local Operador' onclick='showFrmOperatorLocations("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></td></tr>";
      }
      $("#show-locations").html(temp);
    }
    },
    error:function(data){
      $(".back").fadeOut();
      $('.debug-url').html('Erro ao obter os Locais Frequentes, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
    
    }
  });
}, 500);
}




ar = JSON.parse(localStorage.getItem("locais"));
local='<option selected disabled value="">Zona *</option>';
for (i=0;i<ar.length;i++){
  local +='<option data-id="'+ar[i].value+'" value="'+ar[i].label+'">'+ar[i].label+'</option>';
}
$('#loccol_11').html(local).select2();


$(".btn-reset").click(function(){$('#loccol_11').val('').change();});


$('#form_operator_locations').on('submit',function(e){
e.preventDefault();

l = $('#nome_local').val();

dataValue=$(this).serialize()+'&action=1';
  $.ajax({ url:'operator/action_operator_locations.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success: function(data){
      if (data == 0){
        $('.debug-url').html('O local <strong>'+l+'</strong>, não foi adicionado!');
        $("#mensagem_ko").trigger('click');
        setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
      }
       else if(data == 1){
        $('#loccol_1').trigger('change');
        $('.debug-url').html('O local <strong>'+l+'</strong>, foi adicionado com sucesso.');
        $("#mensagem_ok").trigger('click');
        setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        $(".btn-reset").trigger('click');
        callOperatorLocationsFilter();
      }
      else{
        $('.debug-url').html('Por favor, verifique:<br>'+data);
        $("#mensagem_ko").trigger('click');
      }
    },
    error: function(){
      $('.debug-url').html('O local <strong>'+l+'</strong>, não foi adicionado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
    }
  });
});

</script>