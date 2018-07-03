<div class="panel panel-default">
<div class="panel-heading my-orange"><h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span> Nova Zona Comissão Staff</h3>
</div>

<div class="panel-body">

<div class="row"> 
<form id="form_new_zonetype">
<div class="col-md-6 col-xs-12">
   <div class="form-group">
<input type="text" title="Insira a Zona" required class="form-control" name="zonetype" id="zonetype" placeholder="Tipo: (EX.s: ZonaA ou Zona1, etc) *">
</div>
</div>

<div class="col-md-6 col-xs-12">
   <div class="form-group">
<input type="number" step ="any" title="Valor Comissão da Zona" required class="form-control" name="zonevalue" id="zonevalue" placeholder="Valor Comissão da Zona: (EX.s: 15, 12.00, etc) *">
</div>
</div>


 <div class="col-xs-12">
<p style="text-align:right;&quot;">
  <button type="submit" class="btn btn-success">
  <span class="glyphicon glyphicon-save-file" title="Guardar Zona"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
</form>
</div>
</div>
<div class="panel-footer my-orange"></div>
</div>


<div class="panel panel-default">
<div class="panel-heading my-orange"><h3 class="panel-title"><span class="glyphicon glyphicon-bookmark"></span> Zonas Comissão Criadas</h3>
</div>
<div class="panel-body" id="zones">

</div><div class="panel-footer my-orange"></div></div>

<script>

$('#form_new_zonetype').on('submit',function(e){
dataValue=$(this).serialize()+'&action=10';
e.preventDefault();
zn_type = $('#zonetype').val();
$.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     if (data == 99 ){
     $('.debug-url').html('Erro, A Zona com nome: <b>'+zn_type+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data == 1){
      $('.debug-url').html('A Zona com nome: <b>'+zn_type+'</b> foi criada.');
      $("#mensagem_ok").trigger('click');
      $('#zonetype, #zonevalue').val('');
      callAllZonesValues();
      getZonasCmx();
      setTimeout(function(){
        $('#Modalok').modal().fadeOut();
      },2500);
      
     }
   },
 error:function(){
   $('.debug-url').html('A Zona com nome:  <b>'+zn_type+'</b> não foi criada, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});

</script>



