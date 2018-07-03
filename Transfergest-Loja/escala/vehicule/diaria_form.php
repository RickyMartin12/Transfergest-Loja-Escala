<form id="form_d_dia">
  <div class="panel-body">
    <div class="row">
       <div class="col-md-6 col-xs-7">
         <h3 class="panel-title">Nova Despesa Diária</h3>
       </div>
       <div class="col-md-6 col-xs-5" style="text-align:right;">
         <button type="reset" class="btn btn-default reset-form">
           <span class="glyphicon glyphicon-erase"></span><span class='hidden-xs'> Limpar</span>
         </button>
         <button type="submit" title="Guardar Despesa" class="btn btn-success">
           <span class="glyphicon glyphicon-save-file"></span><span class='hidden-xs'> Guardar</span>
         </button>
       </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group" id="date-no-past-date">
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          <input type="text" title="Insira Data"  class="form-control" name="data" id="data" placeholder="Data *" readonly style="border-right: 0px; background-color: #fff;">
          <span class="input-group-addon" style="background-color: #fff;">
          <span class="glyphicon glyphicon-calendar" style="cursor-type:pointer;"></span>
          </span>
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">      
          <span class="input-group-addon" style="cursor:pointer;"><span class="fa fa-car"></span></span>  
          <select type="text" class="form-control" name="matricula" id="matricula"></select>
        </div>
      </div>
      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">   
          <span class="input-group-addon req ft18"><span class="fa fa-tachometer"></span></span>
          <input type="number" min="0" class="form-control" name="km_fim" id="km_fim" placeholder="Km Fim">
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">   
          <span class="input-group-addon" style="cursor:pointer;"><span class="fa fa-user"></span></span>
          <select class="form-control" id="responsavel" name="responsavel"></select>
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">   
          <span class="input-group-addon req ft18"><span class="fa fa-star"></span></span>
          <select class="form-control"  id="tipo_posto" name="tipo_posto">
            <option value="" disabled selected>Seleccione Despesa *</option>
            <option value="Combustivel">Combustivel</option>
            <option value="Portagem">Portagem</option>
            <option value="Lavagem">Lavagem</option>
            <option value="Parque">Parque</option>
            <option value="Diversos">Diversos</option>
          </select>
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">  
          <span class="input-group-addon req ft18"><span class="fa fa-copy"></span></span>
          <input type="text" class="form-control" name="fatura" id="fatura" placeholder="Nº Fatura">
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">  
          <span class="input-group-addon req ft18"><span class="fa fa-building"></span></span>
          <input type="text" class="form-control" name="entidade" id="entidade" placeholder="Entidade">
        </div>
      </div>
      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">  
          <span class="input-group-addon req ft18"><span class="fa fa-map-o"></span></span>
          <input type="text" class="form-control" name="localidade" id="localidade" placeholder="Localidade">
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">  
          <span class='input-group-addon req ft18'><span class='fa fa-money'></span></span>
          <input type='number' step='any' min="0" name="total" class="form-control" id="valores" placeholder="Valor">
        </div>
      </div>

      <div class="col-md-9 col-xs-12">
        <div class="form-group input-group">  
          <span class="input-group-addon req ft18"><span class="fa fa-columns"></span></span>
          <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Observações">
        </di
      </div>
    </div>
  </div>
</form>

<script>

$('.reset-form').click(function() {
  $('#responsavel').val('').change();
  $('#matricula').val('0').change();
});

arr = JSON.parse(localStorage.getItem("matricula"));

opt='<option selected disabled value="0">Matricula *</option>';

for (i=0;i<arr.length;i++){
 opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}
$('#matricula').html(opt).select2();

arr = JSON.parse(localStorage.getItem("staff"));

opt='<option selected value="">Staff</option>';
for (i=0;i<arr.length;i++){
 opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}

opt +='<option value="'+$(".sessionname").text()+'">'+$(".sessionname").text()+'</option>';
$('#responsavel').html(opt).select2();

var dateNow = new Date();

$('#date-no-past-date').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY', locale: 'pt',daysOfWeekDisabled: [] });

$(".datetimepicker_se").datetimepicker({format: 'DD/MM/YYYY'});

/*CRIAR/GRAVAR NOVA DSESPESA DIARIA*/

$("#form_d_dia").on('submit',function(e){
 e.preventDefault();

 matric = $('#matricula').val();

 dataValue=$(this).serialize()+'&action=30';

 $.ajax({ url:'vehicule/action.php',
 data:dataValue,
   type:'POST', 
   success:function(data){

     if (data == 1){
       $('.debug-url').html('A Despesa diária c/ matricula: <b>'+matric+'</b> foi criada com sucesso.');
       $("#mensagem_ok, .reset-form").trigger('click');
       setTimeout(function(){  $('#Modalok').modal('hide'); }, 2500);
      }
     else if(data == 0){
       $('.debug-url').html('A Despesa diária c/ matricula: <b>'+matric+'</b> não foi criada, surgiu um erro ao criar o registo.');
       $("#mensagem_ko").trigger('click');
       setTimeout(function(){  $('#Modalko').modal('hide'); }, 2500);
     }
     else{
       $('.debug-url').html('A Despesa diária não foi criada, p.f. verifique:<br>'+data);
       $("#mensagem_ko").trigger('click');
     }
    },
    error:function(){
       $('.debug-url').html('A Despesa diária c/ matricula: <b>'+matric+'</b> não foi criada, p.f. verifique a ligação WiFi.');
       $("#mensagem_ko").trigger('click');
    }
  });
});

</script>