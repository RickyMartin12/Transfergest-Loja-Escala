<?php
session_start();
?>

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<span class="glyphicon glyphicon-user"></span> Definir Administrator</h3>
<span onclick="$('#insert').empty();" class="glyphicon glyphicon-remove" title="Fechar Definir Administrator " style="float: right;top: -14px; cursor: pointer;"></span>
</div>
<div class="panel-body">
<form id="form_admin" style="margin-bottom:10px;">
<div class='col-md-3 col-xs-12'>
 <div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" style='text-transform:capitalize;' required class="form-control" name="admin_nome" id="admcol_1" placeholder="Nome*">
</div>
</div>
</div>
<div class='col-md-3 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-asterisk"></span></span>
<input type="password" required class="form-control" name="admin_password" id="admcol_2" placeholder="Password*">
</div>
</div>
</div>

<div class="col-md-3 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18">@</span>
<input type="email" required="" class="form-control" name="admin_email" id="admcol_3" placeholder="Email *">
</div>
</div>
</div>

<div class='col-md-3 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-signal"></span></span>
<select required class="form-control" name="admin_priv" id="admcol_4" placeholder="Privilégios *">
<option value='0*/*Gestor'> Gestor</option>
<option value='1*/*GestorPlus'> GestorPlus+</option>
<?php if ($_SESSION['privilegios'] >= 2){?>
<option value='2*/*Administrator'> Administrator</option>
<?php
}
?>
<?php if ($_SESSION['privilegios'] == 3){?>
<option value='3*/*SuperUser'> SuperUser</option>
<?php
}
?>
</select>
</div>
</div>
</div>

<div class='col-md-3 col-md-offset-9 col-xs-12'>
<p style='text-align:right;'>
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save-file"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
</form>
</div>
<div class="panel-footer">

</div>
</div>

<script>
$('#form_admin').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize()+'&action=6';

  $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      console.log(data);
      if(data.match(/err/g)){
           $('.debug-url').html('O elemento administrador <strong class="cpt">'+$("#admcol_1").val()+'</strong>, não foi adicionado já existe.');
          $("#mensagem_ko").trigger('click');
      }
      else if (data.match(/10/g)){
        $('.debug-url').html('O elemento administrador <strong class="cpt">'+$("#admcol_1").val()+'</strong>, não foi adicionado!');
        $("#mensagem_ko").trigger('click');
      }
      
      else if(data.match(/11/g)){
        $('.debug-url').html('O elemento administrador <strong class="cpt">'+$("#admcol_1").val()+'</strong>, foi adicionado com sucesso.');
        $("#mensagem_ok").trigger('click');
        clearForm();
        callEquipaFilter();
      }
    },
    error: function(){
      console.log(data);
      $('.debug-url').html('O elemento administrador não foi adicionado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
});

</script>