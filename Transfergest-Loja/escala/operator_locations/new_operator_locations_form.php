<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<span class="glyphicon glyphicon-tower"></span> Definir Local Operador</h3>
<span onclick="$('#insert').empty();" class="glyphicon glyphicon-remove" title="Fechar Definir Local Operador" style="float: right;top: -14px; cursor: pointer;"></span>
</div>
<div class="panel-body" id="showoperator">
<form id="form_operator_locations" style="margin-bottom:10px;">
<div class='col-md-2 col-xs-12'>
 <div class="form-group">
<div class="input-group">
<span class="input-group-addon ft18"><span class="glyphicon glyphicon-tower"></span></span>
<select class="form-control" name="operator_nid" onchange="operatorName(this.value)" id="loccol_1">
<option value="Escolha"> Escolha *</option>
</select>
</div>
</div>
</div>
<div class='col-md-5 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon ft18"><span class="glyphicon glyphicon-map-marker"></span></span>
<input type="text" class="form-control" required readonly="true" name="loc_recolha" id="loccol_2" placeholder="Local Recolha (GPS) *">
</div>
</div>
</div>
<div class='col-md-5 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon ft18"><span class="glyphicon glyphicon-home"></span></span>
<input type="text" class="form-control" required readonly="true" id="loccol_3" name ="pt_ref_recolha" placeholder="Pt. Ref. Recolha (Morada) *">
</div>
</div>
</div>

<div class='col-md-offset-9 col-md-3 col-xs-12'>
<p style='text-align:right;'>
<button type="submit" class="btn btn-success" title="Guardar Novo Local"><span class="glyphicon glyphicon-save-file"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
</form>
</div>
<div class="panel-footer">
</div>
</div>

<script>

function operatorName(vl){
if (vl =='Escolha' ){ 
document.getElementById("loccol_2").readOnly = true;
document.getElementById("loccol_3").readOnly = true;
$('#loccol_2,#loccol_3').val('');
}
else{
vl = vl.split("/");
vl = vl[0];
document.getElementById("loccol_2").readOnly = false;
document.getElementById("loccol_3").readOnly = false;
callOperatorLocationsFilter(vl);
}
}

$('#form_operator_locations').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize()+'&action=1';
  $.ajax({ url:'operator_locations/action_operator_locations.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
console.log(data);
      if (data.match(/10/g)){
        $('.debug-url').html('O Local do operador <strong class="cpt">'+$("#loccol_3").val()+'</strong>, não foi adicionado!');
        $("#mensagem_ko").trigger('click');
      }
       else if(data.match(/11/g)){
        $('.debug-url').html('O Local do operador <strong class="cpt">'+$("#loccol_3").val()+'</strong>, foi adicionado com sucesso.');
        $("#mensagem_ok").trigger('click');
        $('#loccol_1').val('Escolha');
        $('#loccol_2,#loccol_3').val('');
      }
    },
    error: function(){
      $('.debug-url').html('O Local do operador não foi adicionado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
});

</script>