<div class="panel panel-default">

<div class="panel-heading my-orange"><h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span> Novo Tipo Serviço</h3>
</div>

<div class="panel-body">
<div class="row"> 
<form id="form_new_servicetype">
<div class="col-md-12 col-xs-12">
   <div class="form-group">
<input type="text" title="Insira o tipo de serviço" required class="form-control" name="servicestype" id="servicestype" placeholder="Tipo serviço: (EX.s: Chegada ou Golf, etc) *">
</div>
</div>

 <div class="col-xs-12">
<p style="text-align:right;&quot;">
  <button type="submit" class="btn btn-success">
  <span class="glyphicon glyphicon-save-file" title="Guardar Tipo Serviço"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
</form>
</div>
</div>
<div class="panel-footer my-orange"></div>
</div>


<div class="panel panel-default">
<div class="panel-heading my-orange"><h3 class="panel-title"><span class="glyphicon glyphicon-tags"></span> Tipos Serviços criados</h3>
</div>
<div class="panel-body" id="created">

</div><div class="panel-footer my-orange"></div></div>

<script>

$('#form_new_servicetype').on('submit',function(e){
dataValue=$(this).serialize()+'&action=6';
e.preventDefault();
tp_serv = $('#servicestype').val();
$.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     if (data.match(/99/g)){
     $('.debug-url').html('Erro, o Tipo de Serviço <b>'+tp_serv+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data.match(/1/g)){
      $('.debug-url').html('O Tipo de Serviço <b>'+tp_serv+'</b> foi criado.');
      $("#mensagem_ok").trigger('click');
      $('#servicestype').val('');
      callServicesType();
      callAllServicesType();
     }
   },
 error:function(){
   $('.debug-url').html('O Tipo de Serviço <b>'+tp_serv+'</b> não foi criado, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});

</script>



