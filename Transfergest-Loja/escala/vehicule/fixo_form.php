 <div class="row my-orange" style="margin-top:0px;">
    <div class="col-md-4 col-xs-12">
      <h3 class="panel-title">Pesquisa Despesas Fixas</h3>
    </div>
    <div class="col-md-5 col-xs-9">
      <div class="form-group input-group" style='width:100%;'>
        <span class="input-group-addon"><span class="fa fa-car"></span></span> 
        <select type="text" class="form-control" name="matricula_search" id="matricula_search" placeholder="Matricula *">
        </select>
      </div>
    </div>
    <div class="col-md-3 col-xs-3">
      <div class="form-group input-group" style='width:100%;'>
        <button onclick="PesquisaValoresMatricula($('#matricula_search').val())" class="btn btn-info">
          <span class="glyphicon glyphicon-search"></span><span class='hidden-xs'> Pesquisa</span>
        </button>
      </div>
    </div>
  </div>

<form id="form_d_fixa">
  <div class="row">
    <div class="col-md-6 col-xs-7">
      <h3 class="panel-title">Nova Despesa Fixa</h3>
    </div>
    <div class="col-md-6 col-xs-5" style="text-align:right;">
      <button type="reset" class="btn btn-default reset-form">
        <span class="glyphicon glyphicon-erase"></span><span class="hidden-xs"> Limpar</span>
      </button>
      <button type="submit" title="Guardar Despesa" class="btn btn-success">
        <span class="glyphicon glyphicon-save-file"></span><span class="hidden-xs"> Guardar</span>
      </button>
    </div>
  </div>

  <div class="row"> 
    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group">
        <span class="input-group-addon req ft18"><span class="fa fa-star"></span></span>
        <select class="form-control" id="tipo_posto" name="tipo_posto">
          <option value="" disabled selected>Seleccione Despesa *</option>
          <option value="selo">Selo</option>
          <option value="inspeccao">Inspecção</option>
          <option value="seguro">Seguro</option>
          <option value="renda">Renda</option>
        </select>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group">
        <span class="input-group-addon req ft18"><span class="fa fa-signal"></span></span>
        <select class="form-control" id="tipo_periocidade" name="tipo_periocidade">
          <option value="" disabled selected>Tipo de Periocidade *</option>
          <option value="Mensal">Mensal</option>
          <option value="Trimestral">Trimestral</option>
          <option value="Semestral">Semestral</option>
          <option value="Anual">Anual</option>
        </select>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group">
        <span class="input-group-addon req ft18"><span class="fa fa-calendar-times-o"></span></span>
        <input type="number" class="form-control" min='1' max="31" name="dia" id="dia" placeholder="Dia *">
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group">
        <span class="input-group-addon req ft18"><span class="fa fa-building"></span></span>
        <input type="text" class="form-control" name="entidade" id="entidade" placeholder="Entidade">
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group" style='width:100%;'>  
        <span class="input-group-addon"><span class="fa fa-car"></span></span>  
        <select type="text" class="form-control" name="matricula" id="matricula" placeholder="Matricula *"></select>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class='form-group input-group'>
        <span class='input-group-addon req ft18'><span class='fa fa-money'></span></span>
        <input type='number' step='any' class='form-control' name="total" min="0" id='total' placeholder='Valor'>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group" id="data_value">
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        <input type="text"  placeholder="Data Inicio *"  title="Data Inicio"  class="form-control" name="data_inicio" id="data_inicio" readonly style="border-right: 0px; background-color: #fff;">
        <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group" id="data_value_fim">
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        <input type="text" placeholder="Data Fim *" title="Insira Data Fim" class="form-control" name="data_fim" id="data_fim" readonly style="border-right: 0px; background-color: #fff;">
        <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="form-group input-group">
        <span class="input-group-addon req ft18"><span class="fa fa-copy"></span></span>
        <input type="text" class="form-control" name="fatura" id="fatura" placeholder="Nº Fatura">
      </div>
    </div>

    <div class='col-md-3 col-xs-12 form-group'>
      <div class="form-group input-group">
        <span class="input-group-addon"><span class="fa fa-user"></span></span>
        <select class="form-control" id="responsavel" name="responsavel"></select>
      </div>
    </div>
  </div>
</form>

<script>

$('.reset-form').click(function() {
  $('#responsavel').val('').change();
  $('#matricula').val('0').change();
});

arr = JSON.parse(localStorage.getItem("staff"));
st='<option selected disabled value="">Staff</option>';
sti = '';

for (i=0;i<arr.length;i++){
 st +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
 sti +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}

opt +='<option value="'+$(".sessionname").text()+'">'+$(".sessionname").text()+'</option>';
$('#responsavel').html(st).select2();

arr = JSON.parse(localStorage.getItem("matricula"));
mt='<option selected disabled value="0">Matricula *</option>';
mti='';
for (i=0;i<arr.length;i++){
 mt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
 mti +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}
$('#matricula_search, #matricula').html(mt).select2();


    $("#data_value").datetimepicker({ ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt', widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});

    $("#data_value_fim").datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt', useCurrent: false,widgetPositioning: {horizontal: 'right',vertical: 'bottom'} //Important! See issue #1075
        });

    $("#data_value").on("dp.change", function (e) {
        $("#data_value_fim").data("DateTimePicker").minDate(e.date);
    });
    
    $("#data_value_fim").on("dp.change", function (e) {
        $("#data_value").data("DateTimePicker").maxDate(e.date);
    });


/*SUBMISSAO DE DADOS*/
$('#form_d_fixa').on('submit',function(e){
  e.preventDefault();

  matr= $("#matricula").val();

  dataValue=$(this).serialize()+'&action=33';
  $.ajax({ url:'vehicule/action.php',
  data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      if (data == 1){
      $('.debug-url').html('A Despesa Fixa c/ a <b>'+matr+'</b> foi criada.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
      $('.reset-form').trigger('click');
    }

    else if(data == 0){
       $('.debug-url').html('A Despesa Fixa  c/ matricula: <b>'+matr+'</b> não foi criada, surgiu um erro ao criar o registo.');
       $("#mensagem_ko").trigger('click');
       setTimeout(function(){  $('#Modalko').modal('hide'); }, 2500);
     }

     else{
       $('.debug-url').html('Para criar a Despesa Fixa é necessário:<br>'+data);
       $("#mensagem_ko").trigger('click');
     }

   },
 error:function(){
   console.log(data);
   $('.debug-url').html('A Despesa Fixa c/ a <b>'+matr+'</b> não foi criada, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});

// Pesquisa de Valores por Matricula da Viatura

/*MOSTRAR OS CAMPOS PARA EDIÇAO LOCAIS OPERADORES*/


function PesquisaValoresMatricula(matricula)
{
  var str = '';

 if(!matricula) {
   $('.debug-url').html('O campo para pesquisa está vazio!!');
   $("#mensagem_ko").trigger('click');
 }

else{

    $('.back').fadeIn();
    setTimeout(function(){
    dataValue='action=34&matricula='+matricula+'';
     $.ajax({ url:'vehicule/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();
      arr=[];
      arr = JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('.debug-url').html('Não existem resultados!');
        $("#mensagem_ko").trigger('click');
        $("#add_type_edit").empty();
        $('#search').css('display', 'none');
      }
      else {
        $('#search').css('display', 'block');
        for(i=0;i<arr.length;i++){
         if (arr[i].id){
          id = arr[i].id;
          matricula = arr[i].matricula;
          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;
          arr[i].valor ? totais = parseFloat(arr[i].valor).toFixed(2)+'€' : totais ='-/-';

          str += "<tr id='values-"+arr[i].id+"'><td class='line-grey'><font>"+id+"</font></td><td class='line-grey'><select id='col-2-"+arr[i].id+"' class='frm-item form-control'><option value='"+matr+"'>"+matr+"</option></select><font>"+matr+"</font></td><td class='line-grey'><select required class='frm-item form-control' id='col-3-"+arr[i].id+"'><option value='"+arr[i].tipo_despesa+"'>"+arr[i].tipo_despesa+"</option><option value='Inspecçao'>Inspecção</option><option value='Seguro'>Seguro</option><option value='Selo'>Selo</option><option value='Renda'>Renda</option></select><font>"+arr[i].tipo_despesa+"</font></td><td class='line-grey'><select class='frm-item form-control' id='col-4-"+arr[i].id+"'><option value='"+arr[i].tipo_periocidade+"'>"+arr[i].tipo_periocidade+"</option><option value='Mensal'>Mensal</option><option value='Trimestral'> Trimestral</option><option value='Semestral'> Semestral</option><option value='Anual'>Anual</option></select><font>"+arr[i].tipo_periocidade+"</font></td><td class='line-grey'><input type='number' value='"+arr[i].dia+"' id='col-5-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].dia+"</font></td><td class='line-grey'><input type='text' value='"+arr[i].entidade+"' id='col-6-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].entidade+"</font></td><td class='line-grey' style='text-align:right;'><input type='number' step='any' value='"+arr[i].valor+"' id='col-7-"+arr[i].id+"' class='frm-item form-control'/><font>"+totais+"</font></td><td class='line-grey'><input type='text' id='col-8-"+arr[i].id+"' class='frm-item form-control datetimepicker_dt' value='"+arr[i].data_inicio+"' /><font>"+arr[i].data_inicio+"</font></td><td class='line-grey'><input type='text' id='col-9-"+arr[i].id+"' class='frm-item form-control datetimepicker_dt' value='"+arr[i].data_fim+"'/><font>"+arr[i].data_fim+"</font></td><td class='line-grey'><input type='text' value='"+arr[i].fatura+"' id='col-10-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].fatura+"</font></td><td class='line-grey'><select class='frm-item form-control' id='col-11-"+arr[i].id+"'><option value='"+arr[i].responsavel+"'>"+arr[i].responsavel+"</option></select><font>"+arr[i].responsavel+"</font></td><td class='line-grey' style='padding-left:10px;' id='action-"+id+"'><button title='Apagar viatura' class='btn btn-danger btn-sm' onclick='confirmDeleteViature("+id+",\""+matricula+"\")'><span class='glyphicon glyphicon-trash'></span></button><button title='Editar viatura' class='btn btn-info btn-sm' style='margin-left:4px;' onclick='EditViature("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div></td></tr>";

        }
       }
       $("#add_type_edit").html("<div class='panel panel-default'><div class='panel-heading my-orange'><h3 class='panel-title' style='color:#000;'>Despesas Fixas Viatura: "+matr+"</span></h3></div><div class='panel-body'><div class='table-responsive'><table class='table table-striped' style='margin-bottom:0'><thead class='my-gray'><tr><th class='bdr-w'>ID</th><th class='bdr-w'>Matricula</th><th class='bdr-w'>Despesa</th><th class='bdr-w'>Periocidade</th><th class='bdr-w'>Dia</th><th class='bdr-w'>Entidade</th><th class='bdr-w'>Valor</th><th class='bdr-w'>Data Inicio</th><th class='bdr-w'>Data Fim</th><th class='bdr-w'>Factura</th><th class='bdr-w'>Staff</th><th style='width:50px;' class='bdr-w'>Acções</th></tr></thead><tbody>"+str+"</tbody></table></div></div><div class='panel-footer my-orange'></div></div>");
$('html, body').animate({ scrollTop: $("#add_type_edit").offset().top -30 }, 750);

      }

      $('#search').html("<div class='search_results' style='display: block;'><div class='form-group'><h3 style='text-align:center; font-size:21px;'><span class='label label-default' id='nr_resultados' style='padding: 6px;'><span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: "+i+"</span></h3></div></div>");
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados das viaturas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);

}
}


function EditViature(id)
{
  $("#col-8-"+id).datetimepicker({ ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt', widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});

    $("#col-9-"+id).datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt', useCurrent: false,widgetPositioning: {horizontal: 'right',vertical: 'bottom'} //Important! See issue #1075
        });

    $("#col-8-"+id).on("dp.change", function (e) {
        $("#col-9-"+id).data("DateTimePicker").minDate(e.date);
    });
    
    $("#col-9-"+id).on("dp.change", function (e) {
        $("#col-8-"+id).data("DateTimePicker").maxDate(e.date);
    });

   mtr = $("#col-2-"+id).val(); 
   $("#col-2-"+id).css('width','125px').html("<option value='"+mtr+"'>"+mtr+"</option>"+mti);

   $("#col-3-"+id+",#col-7-"+id ).css('width','110px');

   str = $("#col-11-"+id).val();   
   $("#col-11-"+id).css('width','110px').html("<option value='"+str+"'>"+str+"</option>"+sti);

   for(i=2;i<12;i++){
     $(" #col-"+i+"-"+id).show().next().hide(); 
   }
    
    $("#action-"+id).html("<button class='btn btn-sm btn-success safe_it' onclick='saveViature("+id+")' title='Guardar'><span class='glyphicon glyphicon-save-file'></span></button><button  class='btn btn-sm btn-default' style='margin-left:4px;' onclick='cancelarEdicaoViaturas("+id+")' title='Fechar edição'><span class='glyphicon glyphicon-remove-sign'></span></button>");
}

function cancelarEdicaoViaturas(id)
{
   for(i=2;i<12;i++){
    $("#col-"+i+"-"+id).hide().next().show();
   }
 
   m = $("#col-2-"+id).val().replace(/-/gi,'');

   $("#action-"+id).html("<button title='Apagar viatura' class='btn btn-danger btn-sm' onclick='confirmDeleteViature("+id+",\""+m+"\")'><span class='glyphicon glyphicon-trash'></span></button><button title='Editar viatura' class='btn btn-info btn-sm' style='margin-left:4px;' onclick='EditViature("+id+")'><span class='glyphicon glyphicon-edit'></span></button>");

}

function saveViature(id){

  var dataValue='';

  for(i=2;i<12;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=36";

  $.ajax({ url:'vehicule/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      console.log(data);
      if (data == 9 ){
        $('.debug-url').html('Erro, já existe a viatura c/ a matricula <b>'+$("#col-2-"+id).val()+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if (data == 0 ){
        $('.debug-url').html('Erro, ao modificar a despesa #<strong>"+id+"</strong> da viatura c/ a matricula <b>'+$("#col-2-"+id).val()+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else
    {
      PesquisaValoresMatricula($("#col-2-"+id).val());
      $('.debug-url').html('A despesa #<strong>"+id+"</strong> da viatura c/ a matricula <b>'+$("#col-2-"+id).val()+'</b> foi modificada com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
      
     }
    },
    error:function(){
      $('.debug-url').html('A despesa #<strong>"+id+"</strong> da viatura c/ a matricula <b>'+$("#col-2-"+id).val()+'</b> não foi modificada, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}

function confirmDeleteViature(id, matricula){
fs = matricula.substring(0, 2);
md = matricula.substring(2, 4);
fn = matricula.substring(4, 6);        
matr = fs+"-"+md+"-"+fn;

bootbox.dialog({
  message: "Tem a certeza que pretende apagar a despesa #<strong>"+id+"</strong> da viatura c/ a matricula <strong>"+matr+"</strong>",
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
      dataValue='id='+id+'&action=35';
      $.ajax({
      type: "POST",
      url: "vehicule/action.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2)
        {
          PesquisaValoresMatricula(matricula);
          $('.debug-url').html('A despesa #<strong>"+id+"</strong> da viatura c/ a matricula '+matr+' foi apagada com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('A despesa #<strong>"+id+"</strong> da viatura c/ a matricula '+matr+' não foi apagada, p.f. verifique a ligação.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}



</script>