<style>
.categories_staff{display:none;}
</style>

<div class="panel panel-default">
  <form id="staff_new_categoria">
    <div class="panel-heading my-orange">
      <div class="row">
        <h3 class="panel-title col-md-6 col-xs-12"><span class="glyphicon glyphicon-plus"></span> Novo Grupo</h3>
        <div class="col-md-6 col-xs-12">
          <button type="submit" style="float: right;" class="btn btn-success">
            <span class="glyphicon glyphicon-save-file" title="Guardar Novo Grupo"></span>
            <span class='hidden-xs'> Guardar</span>
          </button>
        </div>
        <div class='col-md-6 col-xs-12 w3-padding-8'>
            <input type="text" title="Insira Nome do Grupo" class="form-control" name="categoria" id="categoria" placeholder="Grupo *">
         </div>
      </div>
    </div>
  </form>
</div>

<div class="panel panel-default categories_staff">
    <div class="panel-heading my-orange">
      <div class="row">
        <h3 class="panel-title col-md-6 col-xs-12"><i class="fa fa-users"></i> Grupos</h3>
      </div>
    </div>
    <div id="results"></div>
    <div class="panel-footer my-orange"></div>
</div>

<script>

getStaffTableCategories();


/*CRIAR NOVA CATEGORIA STAFF TABELA*/

$('#staff_new_categoria').on('submit',function(e){
  e.preventDefault();
  categoria = $('#categoria').val();
  if (!categoria){
    $('.debug-url').html('O Campo está vazio, insira um valor e tente novamente.');
    $("#mensagem_ko").trigger('click');
  }
  else{
    $('.back').fadeIn();
    setTimeout(function(){
      dataValue='categoria='+categoria+'&action=19';
      $.ajax({ url:'team/action_team.php',
        data:dataValue,
        type:'POST',
        cache:false,
        success:function(data){
          $('.back').fadeOut();
          if (data == 99){
            $('.debug-url').html('Não foi possivel guardar o Grupo, <b>'+categoria+'</b>, já existe.');
            $("#mensagem_ko").trigger('click');
          }
          else if (data == 1 ){
            $('.debug-url').html('O Grupo, <b>'+categoria+'</b> foi criado.');
            $("#mensagem_ok").trigger('click');
            $('#categoria').val('');
            getStaffTableCategories();
          }
          else if (data == 0){
            $('.debug-url').html('Surgiu um erro ao guardar o Grupo, <b>'+categoria+'</b>, tente novamente.');
            $("#mensagem_ko").trigger('click');
          }
          else {
            $('.debug-url').html('Por favor verifique:<br>'+data);
            $("#mensagem_ko").trigger('click')
          }
        },
        error:function(){
          $('.back').fadeOut();
          $('.debug-url').html('O Grupo <b>'+categoria+'</b> não foi criado, p.f. verifique a ligação WiFi.');
          $("#mensagem_ko").trigger('click');
        }
      });
    }, 500);
  }
});

function getStaffTableCategories(){
    dataValue='action=20';
    t=''; 
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $('.categories_staff').show();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        t = "Não existem Grupos criados.";
      }
      else {
        for(i=0;i<arr.length;i++){
          t += "<div style='height:47px;' class='bd col-md-2 col-sm-4 col-xs-8' id='cat-name-"+arr[i].id+"'>"+arr[i].nome+"</div><div class='bd bdr col-md-1 col-sm-2 col-xs-4' style='text-align:right;'><button title='Apagar Grupo: "+arr[i].nome+"' class='btn btn-danger btn-sm' onclick='confirmDeleteStaffTableCategories("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button></div>";
          }
        $('#results').html("<div class='row'>"+t+"</div>");
      }
    },
    error:function(data){
      $('#Modalko .debug-url').html('Erro ao obter Grupos do Staff, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
  });
}

function confirmDeleteStaffTableCategories(id){

n = $('#cat-name-'+id).html();

bootbox.dialog({
  message: "Tem a certeza que pretende apagar ao Grupo  <strong>"+n+"</strong>, e todos os preços relacionados?",
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
       dataValue='id='+id+'&action=21';
       $.ajax({
        type: "POST",
        url: "team/action_team.php",
        data: dataValue,
        cache:false,
         success: function(data){
          if(data == 1){
            getStaffTableCategories();
            $('#Modalok .debug-url').html('O Grupo <strong>'+n+'</strong> foi apagado com sucesso.');
            $("#mensagem_ok").trigger('click');
            setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
          } 
          else{
            $('#Modalok .debug-url').html('O Grupo <strong>'+n+'</strong> não foi apagado, tente mais tarde.');
            $("#mensagem_ko").trigger('click');
            setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
          }
        },
        error:function(data){
          $('#Modalko .debug-url').html('O Grupo <strong>'+n+'</strong> não foi apagado, p.f. verifique a ligação Wi-Fi.');
          $("#mensagem_ko").trigger('click');
       }
      });
     }
    },
  }
});
}

</script>