<section class="new_vehicle">
  <div class="panel panel-default">
    <div class="panel-heading my-orange">
      <form id="form_vehicule" style="margin-bottom:10px;">
      <div class="row">
      <h3 class="panel-title col-xs-12 col-md-6 col-lg-6"> <i class="fa fa-taxi" aria-hidden="true"></i> Nova Viatura</h3>
      <div class="col-xs-12 col-md-6 col-lg-6" style="text-align:right;">
      <button type="reset" class="btn btn-default btn-reset"><span class="glyphicon glyphicon-erase"></span>
        <font class='hidden-xs'> Limpar</font>
      </button>
      <button type="submit" title="Guardar Nova Viatura" class="btn btn-success"><span class="glyphicon glyphicon-save-file"></span>
        <font class='hidden-xs'> Guardar</font>
      </button>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="fa fa-road"></span></span>
          <input type="text" pattern="[0-9 A-Z]{6}" title='4 numeros e 2 letras maiusculas' required class="form-control" name="matricula" id="veh_1" placeholder="Matricula* EX:EE9911">
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group input-group" id="date-no-past-date">
            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
            <input type="text" class="form-control" name="data_matricula" id="veh_2" placeholder="Data" readonly style="border-right: 0px; background-color: #fff;">
            <span class="input-group-addon" style="background-color: #fff;">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group input-group">
            <span class="input-group-addon req ft18"><span class="fa fa-tachometer"></span></span>
            <input type="number" min="0" required class="form-control" name="km_iniciais" id="veh_3" placeholder="Km Inicio *">
          </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="fa fa-car"></span></span>
          <input type="text" required class="form-control" name="marca" id="veh_4" placeholder="Marca *">
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="glyphicon glyphicon-bookmark"></span></span>
          <input type="text" required class="form-control" name="modelo" id="veh_5" placeholder="Modelo *">
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="fa fa-users"></span></span>
          <input type="number" min ='1' required class="form-control" name="lugares" id="veh_6" placeholder="Lugares *">
        </div>
      </div>
    </div>
  </form>
</div>

</div>

<!-- TODOS OS VEICULOS -->

<div class="panel panel-default">
 <div class="panel-heading my-orange">
  <h3 class="panel-title"> <i class="fa fa-wpforms" aria-hidden="true"></i> Viaturas Existentes</h3>
  </div>
  <div id="vehicules-created"></div>
 <div class="panel-footer my-orange"></div>
</div>

</section>

<script>

$('#date-no-past-date').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY', locale: 'pt',daysOfWeekDisabled: [] });

/* INSERIR VEICULOS*/
 
$('#form_vehicule').on('submit',function(e)
{
e.preventDefault();
dataValue=$(this).serialize()+'&action=1';
  $.ajax({ url:'vehicule/action_vehicule.php',
    data:dataValue,
    type:'POST', 
    success: function(data){

      if(data.match(/err/g)){
           $('.debug-url').html('A viatura <strong class="cpt">'+$("#veh_1").val()+'</strong>, não foi adicionada já existe.');
          $("#mensagem_ko").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
      }
      else if (data.match(/10/g)){
        $('.debug-url').html('A viatura <strong class="cpt">'+$("#veh_1").val()+'</strong>, não foi adicionada!');
        $("#mensagem_ko").trigger('click');
        setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
      }
      else if(data.match(/11/g)){
        $('.debug-url').html('A viatura <strong class="cpt">'+$("#veh_1").val()+'</strong>, foi adicionada com sucesso.');
        $("#mensagem_ok").trigger('click');
        setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        //callMatriculaFilter();
        callVehicule();
        $('.btn-reset').trigger('click');
        
      }
    },
    error: function(){
      $('.debug-url').html('A viatura não foi adicionada, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
});

</script>