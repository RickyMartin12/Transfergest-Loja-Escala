function confirmDeleteVehicule(id, matricula){
fs = matricula.substring(0, 2);
          md = matricula.substring(2, 4);
          fn = matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;

bootbox.dialog({
  message: "Tem a certeza que pretende apagar a Viatura com a matricula <strong>"+matr+"</strong>",
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
      dataValue='id='+id+'&action=2';
      $.ajax({
      type: "POST",
      url: "vehicule/action_vehicule.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2){
          callVehicule();
          $('.debug-url').html('A viatura com a matricula <strong>'+matr+'</strong> foi apagada com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('A viatura com a matricula '+matr+' não foi apagada, p.f. verifique a ligação.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}





/*CARREGA PHP COM FORMULARIO PARA NOVA VIATURA
function callNewVehiculeForm(){
      $.ajax({url: "vehicule/new_vehicule_form.php",error:function(){
$('.debug-url').html('Erro ao obter o formulário das viaturas, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}

})
      .done(function( html ) { $( "#insert" ).html(html); callVehicule();});
}
*/


/*OBTEM TODAS AS VIATURAS ACÇÕES APAGAR*/
function callVehicule(){
  var s = '';

  $('.back').fadeIn();

    setTimeout(function(){

    dataValue='action=4';

     $.ajax({ url:'vehicule/action_vehicule.php',
      data:dataValue,
      type:'POST',
      cache:false,
      success:function(data){
        $(".back").fadeOut();
        arr=[];
        arr = JSON.parse(data);
        if (arr == null || arr.length < 1){
          $("#vehicules-created").empty().append("<h3 style='margin-top: 10px; text-align:center;'>Não existem viaturas criadas.<br/></h3>");
        }
        else {
          for(i=0;i<arr.length;i++){
           if (arr[i].id){
           id = arr[i].id;
          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matricula = arr[i].matricula;
          matr = fs+"-"+md+"-"+fn;
          arr[i].km ? arr[i].km : arr[i].km = '-/-';

          s += "<tr class='edit-oper-"+id+"'><td scope='row' class='line-grey' style='text-align:center;'><font>"+id+"</font></td><td class='line-grey' style='text-align:center;'><font>"+matr+"</font></td><td class='line-grey'><font>"+arr[i].data_matricula+"</font></td><td class='line-grey'><font>"+arr[i].marca+"</font></td><td class='line-grey'><font>"+arr[i].modelo+"</font></td><td class='line-grey' style='text-align:right;'><font>"+arr[i].km_iniciais+"</font></td><td class='line-grey' style='text-align:center;'><font>"+arr[i].lugares+"</font></td><td class='line-grey'><div class='btn-group btn-group buttoes_matricula' style='float: right;' role='group'><button title='Apagar viatura' class='btn btn-danger btn-sm' onclick='confirmDeleteVehicule("+id+",\""+matricula+"\")'><span class='glyphicon glyphicon-trash'></span></button></div></div></td></tr>";
        }
       }
       $("#vehicules-created").html("<div class='table-responsive'><table class='table table-striped' style='margin-bottom:0'><thead class='my-gray'><tr><th class='bdr-w'>ID</th><th class='bdr-w'>Matricula</th><th class='bdr-w'>Data Matricula</th><th class='bdr-w'>Marca</th><th class='bdr-w'>Modelo</th><th class='bdr-w'>Km Iniciais</th><th class='bdr-w' style='width:50px;'>Lugares</th><th class='bdr-w' style='width:40px;'>Acções</th></tr></thead><tbody>"+s+"</tbody></table></div>");
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados das viaturas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}


function callVehiculeToExpensies(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=3';
     $.ajax({ url:'vehicule/action_vehicule.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();
      localStorage.setItem("vehicle", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não foram encontrados dados das viaturas para adicionar as despesas , p.f. crie os elementos.');
      $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++){
          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;
            $('#expcol_2').append('<option>'+matr+'</option>');
      }}
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados das viaturas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}

function callVehiculeToFilter(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=3';
     $.ajax({ url:'vehicule/action_vehicule.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){

 $(".back").fadeOut();
    localStorage.setItem("vehicle", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não foram encontrados dados das viaturas para adicionar as despesas , p.f. crie os elementos.');
      $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++){
          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;
            $('#matricula_name').append('<option>'+matr+'</option>');
      }}
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados das viaturas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}



