<style>
.table>tbody>tr>td {
    border-left: 0px solid transparent;
</style>

<div class="panel panel-default">

<form id="form_new_promo_code">

<div class="panel-heading my-orange" style='padding: 10px 0px;'>
<div class='row' style='margin-top: 0px;margin-bottom:0px;'>
<div class='col-xs-6'>
<h3 class='panel-title' style='margin-top: 7px;'><span class="glyphicon glyphicon-plus"></span> Novo Código Promo</h3>
</div>
<div class='col-xs-6'>
  <button type="submit" style='float:right; margin-left:5px;' class="btn btn-success">
  <span class="glyphicon glyphicon-save-file" title="Criar Novo Código Promo"></span><font class='hidden-xs'> Criar</font></button>
  <button style='float:right;' type="reset" class="btn btn-default">
  <span class="glyphicon glyphicon-erase" title="Limpar dados"></span><font class='hidden-xs'> Limpar</font>
</button>
</div>

</div>
</div>

<div class="panel-body">

<div class="row" style=' margin-bottom: 0px;'> 

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-gift"></span></span>
<input type="text" required title="Insira o nome do código promo" required class="form-control" name="promo" id="promo" placeholder="Nome Código Promo *">
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><b>%</b></span>
<input type="number" required step='any' title="Insira a percentagem do código promo" min='0' max='100' required class="form-control" name="promo_val" placeholder="Percentagem *">
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="form-group">
<div class="input-group date" id="dt_ini">
<input type="text" class="form-control" name="inicio" placeholder="Data Inicio *">
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="form-group">
<div class="input-group date" id="dt_fim">
<input type="text" class="form-control" name="fim" placeholder="Data Fim *">
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>
</div>

</div>
</div>
</form>
<div class="panel-footer my-orange"></div>
</div>
</div>

<div class='panel panel-default'><div class='panel-heading my-orange'><h3 class='panel-title'><span class="glyphicon glyphicon-gift"></span> Códigos Promo</h3></div>
<div class='panel-heading my-gray' id="promo-created">
</div>
<div class='panel-footer my-orange'></div>
</div>

<script>

var date = new Date();
d = date.setHours(date.getHours());
h = date.setHours(date.getHours() + 1);
   $('#dt_ini').datetimepicker({ignoreReadonly: true, minDate: d, format: 'DD/MM/YYYY', locale: 'pt'});
   $('#dt_fim').datetimepicker({useCurrent: false, ignoreReadonly: true, minDate: h, format: 'DD/MM/YYYY', locale: 'pt'});
   $("#dt_ini").on("dp.change", function (e) {$('#dt_fim').data("DateTimePicker").minDate(e.date);});
   $("#dt_fim").on("dp.change", function (e) {$('#dt_ini').data("DateTimePicker").maxDate(e.date); });

$('#form_new_promo_code').on('submit',function(e){
dataValue=$(this).serialize()+'&action=17';
e.preventDefault();
promo = $('#promo').val();

$.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success:function(data){

     if (data == 99 ){
     $('.debug-url').html('Erro, o código promo <b>'+promo+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data == 1){
      $('.debug-url').html('O código promo <b>'+promo+'</b> foi criado.');
      $("#mensagem_ok").trigger('click');
      $("#form_new_promo_code").trigger('reset');
      callAllPromo();
      setTimeout(function(){
        $('#Modalok .close').trigger('click');
      },2500);
     }
   },
 error:function(){
   $('.debug-url').html('O código promo <b>'+promo+'</b> não foi criado, verifique a ligação Wi-Fi/Internet.');
    $("#mensagem_ko").trigger('click');
    }
  });
});

</script>