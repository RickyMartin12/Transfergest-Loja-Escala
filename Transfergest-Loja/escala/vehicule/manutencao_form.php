<form id="form_d_manutencao">
  <div class="panel-body">
    <div class="row">
       <div class="col-md-6 col-xs-7">
         <h3 class="panel-title">Nova Despesa Manutenção</h3>
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
        <div class="form-group input-group date" id="date-no-past-date">
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          <input type="text" title="Insira Data"  class="form-control" name="data" id="data" placeholder="Data *" readonly style="border-right: 0px; background-color: #fff;">
          <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group" style="width:100%;"> 
          <span class="input-group-addon" style="cursor:pointer;"><span class="fa fa-car"></span></span>  
          <select type="text" class="form-control" name="matricula" id="matricula" placeholder="Matricula *"></select>
        </div>
      </div>

      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="fa fa-tachometer"></span></span>
          <input type="number" class="form-control" min="0" name="km_fim" id="km_fim" placeholder="Km Fim">
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
            <select class="form-control" id="tipo_posto" name="tipo_posto">
              <option value=""disabled selected>Seleccione Despesa *</option>
              <option value="Revisão">Revisão</option>
              <option value="Mecânica">Mecânica</option>
              <option value="Sinistro">Sinistro</option>
              <option value="Outros">Outros</option>
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
            <input type='number' min="0" step="any" class='form-control' name="total" id='number' placeholder='Valor'>
          </div>
        </div>

        <div class="col-md-3 col-xs-12">
          <div class="form-group input-group">
            <span class='input-group-addon req ft18'><span class='fa fa-cogs'></span></span>
            <input type='number' min="0" class='form-control' name='proximo_km' id='proximo_km' placeholder='KM Revisão'>
          </div>
        </div>

        <div class="col-md-6 col-xs-12">
          <div class="form-group input-group">
            <span class="input-group-addon req ft18"><span class="fa fa-columns"></span></span>
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Observacoes">
          </div>
        </div>
      </div>
    </div>

</form>

<script>

$('#date-no-past-date').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY', locale: 'pt',daysOfWeekDisabled: [] });

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

opt='<option selected disabled value="">Staff</option>';
for (i=0;i<arr.length;i++){
 opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}

opt +='<option value="'+$(".sessionname").text()+'">'+$(".sessionname").text()+'</option>';
$('#responsavel').html(opt).select2();

/*CRIAR/GRAVER DESPESA MANUTENCAO*/

$('#form_d_manutencao').on('submit',function(e){
 e.preventDefault();

 matric = $('#matricula').val();

 dataValue=$(this).serialize()+'&action=31';

 console.log(dataValue);

 $.ajax({ url:'vehicule/action.php',
  data:dataValue,
  type:'POST', 
  success:function(data){
    if (data == 1){
     $('.reset-form').trigger('click');
     $('.debug-url').html('A Despesa Manutenção <b>'+matric+'</b> foi criada com sucesso.');
     $("#mensagem_ok").trigger('click');
     setTimeout(function(){  $('#Modalok').modal('hide'); }, 2500);
    }

    else if(data == 0){
       $('.debug-url').html('A Despesa Manutenção c/ matricula: <b>'+matric+'</b> não foi criada, surgiu um erro ao criar o registo.');
       $("#mensagem_ko").trigger('click');
       setTimeout(function(){  $('#Modalko').modal('hide'); }, 2500);
     }

     else{
       $('.debug-url').html('A Despesa Manutenção não foi criada, p.f. verifique:<br>'+data);
       $("#mensagem_ko").trigger('click');
     }

  },
  error:function(){
    $('.debug-url').html('A Despesa da manutenção <b>'+matric+'</b> não foi criada, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
 });
});

</script>