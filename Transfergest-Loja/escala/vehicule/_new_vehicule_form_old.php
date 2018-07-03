<div class="new_vehicle">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-taxi" aria-hidden="true"></i> Nova Viatura ??</h3>
<span onclick="$('.new_vehicle').empty();" class="glyphicon glyphicon-remove" title='Fechar Nova Viatura' style='float: right;top: -14px; cursor: pointer;'></span>
</div>
<div class="panel-body" id="showvehicule">
<form id="form_vehicule" style="margin-bottom:10px;">

<div class='col-md-3 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-object-align-vertical"></span></span>
<input type="text" pattern="[0-9 A-Z]{6}" title='4 numeros e 2 letras maiusculas' required class="form-control" name="matricula" id="veh_1" placeholder="Matricula* EX:EE9911">
</div>
</div>
</div>

<div class='col-md-7 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-object-align-right"></span></span>
<input type="text" required class="form-control" name="marca" id="veh_2" placeholder="Modelo / Marca * (0-9 a-z)">
</div>
</div>
</div>
<div class='col-md-2'>
<p style='text-align:right;'>
<button type="submit" title="Guardar Nova Viatura" class="btn btn-success"><span class="glyphicon glyphicon-save-file"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
</form>
</div>
<div class="panel-footer">
</div>
</div>
</div>
<script>

$('#form_vehicule').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize()+'&action=1';
  $.ajax({ url:'vehicule/action_vehicule.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      if(data.match(/err/g)){
           $('.debug-url').html('A viatura <strong class="cpt">'+$("#veh_1").val()+'</strong>, não foi adicionada já existe.');
          $("#mensagem_ko").trigger('click');
      }
      else if (data.match(/10/g)){
        $('.debug-url').html('A viatura <strong class="cpt">'+$("#veh_1").val()+'</strong>, não foi adicionada!');
        $("#mensagem_ko").trigger('click');
      }
      else if(data.match(/11/g)){
        $('.debug-url').html('A viatura <strong class="cpt">'+$("#veh_1").val()+'</strong>, foi adicionada com sucesso.');
        $("#mensagem_ok").trigger('click');
        clearForm();
        callMatriculaFilter();
        callVehiculeActions();
        
      }
    },
    error: function(){
      $('.debug-url').html('A viatura não foi adicionada, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
});

</script>