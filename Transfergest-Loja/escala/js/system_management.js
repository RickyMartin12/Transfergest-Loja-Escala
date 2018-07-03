/* OPÇÕES NAVEGAÇÃO */
function callNewPricesForm(template,tipo,categoria){
  switch (template){
    case 1:


/* OBTER TODOS OS LOCAIS ORIGEM E DESTINO */
      $.ajax({url: "management/new_location_form.php"})
      .done(function( html ) { $( "#add_type" ).html(html); $("#add_type_edit").empty(); getCreatedLocations(tipo);});
    break;

/*OBTER TODAS AS CATEGORIAS PARA INSERIR PRODUTOS*/
    case 2:
      $.ajax({url: "management/new_management_form.php"})
      .done(function( html ) { $('#insert-action').empty(); $( "#insert" ).html(html); getAllCategorias();});
    break;


    case 3:
      $.ajax({url: "management/call_action_management.php"})
      .done(function( html ) {  $('#insert-action').empty(); $( "#insert" ).html(html);});
    break;


//CATEGORIAS, TRANSFERS, TOURS, ETC
case 4: $.ajax({url: "management/new_location_category.php"})
      .done(function( html ) { $('#insert-action').empty(); $( "#insert" ).html(html);getCreatedCategorias();});break;



//CLASSES, 1-4 PAX, 5-8 PAX, ETC
case 5:$.ajax({url: "management/new_location_classe.php"})
      .done(function( html ) {  $( "#add_type" ).html(html); $("#add_type_edit").empty(); getCreatedClasses(tipo,categoria);}); break;
 }
}


function callNewProdForm(val,cat){

  switch (val){
    case 1:
      $.ajax({url: "management/new_transfer_form.php"})
      .done(function( html ) { $("#add_type_edit").empty(); 
       $( "#add_type" ).html(html);$('#new_prod_form_types').html("<input type='hidden' id='tipo_val' value='1'/><input type='hidden' id='cat_val' value='"+cat+"'/>"); getAllLocations(cat);});
    break;

    case 2:
      $.ajax({url: "management/new_golf_form.php"})
      .done(function( html ) { $("#add_type_edit").empty(); $("#add_type").html(html);$('#new_prod_form_types').html("<input type='hidden' id='tipo_val' value='2'/><input type='hidden' id='cat_val' value='"+cat+"'/>"); getAllLocations(2);});
    break;
    case 3:
      $.ajax({url: "management/new_tours_form.php"})
      .done(function( html ) { $("#add_type_edit").empty(); $("#add_type").html(html);$('#new_prod_form_types').html("<input type='hidden' id='tipo_val' value='3'/><input type='hidden' id='cat_val' value='"+cat+"'/>"); getAllLocations(3);});
    break;
    case 4:
      $.ajax({url: "management/new_tickets_form.php"})
      .done(function( html ) { $("#add_type_edit").empty(); $("#add_type").html(html);$('#new_prod_form_types').html("<input type='hidden' id='tipo_val' value='4'/>"); getAllLocations(4);});
    break;
    case 5:
      $.ajax({url: "management/new_hour_form.php"})
      .done(function( html ) { $("#add_type_edit").empty(); $("#add_type").html(html);$('#new_prod_form_types').html("<input type='hidden' id='tipo_val' value='5'/>");});
    break;
 case 6:
      $.ajax({url: "management/new_kilometer_form.php"})
      .done(function( html ) { $("#add_type_edit").empty(); $("#add_type").html(html);$('#new_prod_form_types').html("<input type='hidden' id='tipo_val' value='6'/>");});
    break;
 }
}




function getCreatedClasses(tp,cat){
  $(".back").fadeIn();
  setTimeout(function(){ 
    dataValue="categoria="+cat+"&tipo="+tp+"&action=19";

$.ajax({
    url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
     $(".back").fadeOut();
     arr=[];
     arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){$("#add_type_edit").html('<div class="row"><div class="col-xs-12"><label>Não existem classes na categoria seleccionada.</label></div></div>')}
     else {
          $("#add_type_edit").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'><span class='glyphicon glyphicon-paperclip'></span> Classes criadas</h3></div><div class='panel-body' id='created'></div><div class='panel-footer'></div></div>");
        for(i=0;i<arr.length;i++){
          $("#created").append("<div style='height:47px;' class='bd col-md-1 col-xs-2'><font>#"+arr[i].id+"</font></div><div style='height:47px;' class='bd col-md-2 col-xs-10 edit-"+arr[i].id+"'><input type='text' value='"+arr[i].nome+"' id='col-1-"+arr[i].id+"' class='frm-item form-control'/><font>Nome: "+arr[i].nome+"</font></div><div style='height:47px;' class='bd col-md-1 col-xs-6 edit-"+arr[i].id+"'><input type='number' min='0' value='"+arr[i].min+"' id='col-2-"+arr[i].id+"' class='frm-item form-control'/><font>Min: "+arr[i].min+"</font></div><div style='height:47px;' class='bd col-md-1 col-xs-6 edit-"+arr[i].id+"'><input type='number' min='0' value='"+arr[i].max+"' id='col-3-"+arr[i].id+"' class='frm-item form-control'/><font>Max: "+arr[i].max+"</font></div><div class='bd col-md-1 col-xs-12' id='action-"+arr[i].id+"'><div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Classe' class='btn btn-danger btn-sm' onclick='confirmDeleteClassesCreated("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrmClassesCreated("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div>");
        }
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter as classes, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
    });
  }, 1000);
}



/*MOSTRAR CAMPOS PARA EDITAR CLASSES (1)*/
function showFrmClassesCreated(id){
  $('.edit-'+id).css('background','#dff0d8');
  for(i=1;i<4;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItemClassesCreated("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemClassesCreated("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS DE EDIÇÃO DAS CLASSES */
function cancelItemClassesCreated(id){
    $('.edit-'+id).css('background','#FFF');
   for(i=1;i<4;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Classe' class='btn btn-danger btn-sm' onclick='confirmDeleteClassesCreated("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Classe' onclick='showFrmClassesCreated("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}

/* EDITAR GRAVAR CLASSES */
function saveItemClassesCreated(id){
   $('.edit-'+id).css('background','#FFF');
  setTimeout(function(){ 
  classe = $("#col-1-"+id).val();
  var dataValue='';
  for(i=1;i<4;i++){
   dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=25";

  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
     if (data == 0){
     $('.debug-url').html('Erro, ao modificar a classe <b>'+classe+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
     else if(data == 1 ){
      $('#show_search_local').fadeOut();
      getCreatedClasses($("#tipo_val").val(),$("#cat_val").val());
      $('.debug-url').html('A classe <b>'+classe+'</b> foi modificada com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
   error:function(){
   $('.debug-url').html('O local com o <b>'+local+'</b> não foi modificado, verifique a ligação WiFi.');
   $("#mensagem_ko").trigger('click');
    }
  });
    }, 1000);
}




/* CHAMADA DE TODAS AS CATEGORIAS PARA FORMULARIOS*/
function getAllCategorias(){
    tabs='';
    v = '';
    dataValue="&action=15";
    $.ajax({
    url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
     arr=[];
     arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não foram encontradas categorias,p.f crie no Link "Produtos --> Categorias".');
      $("#mensagem_ko").trigger('click');
      }
      else {
          for(i=0;i<arr.length;i++){ 
          t = arr[0].tipo;
          c = arr[0].id; 

i==0 ? tabs +="<li class='active'><a data-toggle='tab' onclick='callNewProdForm("+arr[0].tipo+","+arr[0].id+")'><span class='glyphicon glyphicon-tags'></span>&nbsp;&nbsp;"+arr[i].nome+"</a></li>": tabs +="<li><a data-toggle='tab' onclick='callNewProdForm("+arr[i].tipo+","+arr[i].id+")'><span class='glyphicon glyphicon-tags'></span>&nbsp;&nbsp;"+arr[i].nome+"</a></li>";
}
        $('#new_prod_form_tabs').append(tabs+'<script>setTimeout(function(){callNewProdForm('+t+','+c+');},250);</script>');
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter as categorias, p.f. verifique a ligação Internet.');
      $("#mensagem_ko").trigger('click');
    }
    });
}

/* CHAMADA DE TODOS AS CATEGORIAS*/
function getCreatedCategorias(){
   $(".back").fadeIn();
  setTimeout(function(){ 
    tipo='';
    dataValue="&action=15";
    $.ajax({
    url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
    $(".back").fadeOut();
     arr=[];
     arr =  JSON.parse(data);

      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não existem categorias criadas!');
      $("#mensagem_ko").trigger('click');
      $('#created').empty();
      }
      else {
          $("#insert_result").html("<div class='panel panel-default'><div class='panel-heading my-orange'><h3 class='panel-title'><span style='font-weight:900;font-size: 21px;'>#</span> Categorias criadas</h3></div><div class='panel-body' id='created'><div class='row bd'><div class='col-xs-2 col-md-1'>ID</div><div class='col-md-3 col-xs-5'>Categoria</div><div class='col-md-3 col-xs-5'>Tipo</div><div class='col-md-2 col-xs-5'>Visivel</div></div></div><div class='panel-footer my-orange'></div></div>");
        for(i=0;i<arr.length;i++){
         arr[i].visivel == 1 ? val = 'Sim' : val = 'Não';

        switch (arr[i].tipo) {
         case '1': tipo ='Transfers'; break;
         case '2': tipo ='Golf'; break;
         case '3': tipo ='Passeios'; break;
         case '4': tipo ='Bilhetes'; break;
         case '5': tipo ='Hora'; break;
         }

          $("#created").append("<div class='row bd row-"+arr[i].id+"'><div class='col-md-1 col-xs-2'><font>#"+arr[i].id+"</font></div><div class='col-md-3 col-xs-10'><input type='text' value='"+arr[i].nome+"' id='col-1-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].nome+"</font></div><div class='col-md-3 col-xs-7 form-group'><input type='hidden' id='col-2-"+arr[i].id+"'  value='"+arr[i].tipo+"'><font>"+tipo+"</font></div><div class='col-md-2 col-xs-5 form-group'><select class='form-control frm-item' id='col-3-"+arr[i].id+"'><option value='"+arr[i].visivel+"'>"+val+"</option><option value='1'>Sim</option><option value='0'>Não</option></select><font>"+val+"</font></div><div class='col-xs-12' id='action-"+arr[i].id+"'><div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Categoria' class='btn btn-danger btn-sm' onclick='confirmDeleteCategoriaCreated("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Categoria' onclick='showFrmCategoriasCreated("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div></div>");
        } 
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter as categorias, p.f. verifique a ligação Internet.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
    });
  }, 1000);
}



/*MOSTRAR CAMPOS PARA EDITAR LOCAIS (1)*/
function showFrmCategoriasCreated(id){
    $('.row-'+id).css('background','#dff0d8');
  for(i=1;i<4;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItemCategoriasCreated("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemCategoriasCreated("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS DE EDIÇÃO DAS CATEGORIAS*/
function cancelItemCategoriasCreated(id){
 $('.row-'+id).css('background','#FFF');
   for(i=1;i<4;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Categoria' class='btn btn-danger btn-sm' onclick='confirmDeleteCategoriasCreated("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Categoria' onclick='showFrmCategoriasCreated("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}


/* EDITAR GRAVAR CATEGORIAS */
function saveItemCategoriasCreated(id){
  setTimeout(function(){ 
  categoria = $("#col-1-"+id).val();
  var dataValue='';
  for(i=1;i<4;i++){
   dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=17";
  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     if (data == 99){
     $('.debug-url').html('Erro, a categoria com o nome <b>'+categoria+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
      }
     else if (data ==0 ){
     $('.debug-url').html('Erro, ao modificar a categoria <b>'+categoria+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if(data == 1){
      getCreatedCategorias();
      $('.debug-url').html('A categoria <b>'+categoria+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
 error:function(){
   $('.debug-url').html('A categoria <b>'+categoria+'</b> não foi modificada, verifique a ligação WiFi.');
     $("#mensagem_ko").trigger('click');
    }
  });
    }, 1000);
}






/* POP UP APAGAR CLASSE*/
function confirmDeleteClassesCreated(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar a Classe #<strong>"+id+"</strong>?<br> Todos os produtos com a <b>classe e  preço</b> anexada, serão apagados.<br><p style='text-align:center; margin: 10px 0 10px;'><b>Este processo é definitivo !!</b></p>",
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
        url: "management/action.php",
        data: dataValue,
        success: function(data){
         if(data == 1){
          getCreatedClasses($("#tipo_val").val(),$("#cat_val").val());
          $('#Modalok .debug-url').html('A classe #'+id+' foi apagada com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('A classe #'+id+' não foi apagada, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
  }
 },
}
});
}


/* POP UP APAGAR CATEGORIAS*/
function confirmDeleteCategoriaCreated(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar a Categoria #<strong>"+id+"</strong>?<br> Os produtos,classes, preços operador anexados à Categoria serão Apagados.",
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
    dataValue='id='+id+'&action=16';
     $.ajax({
      type: "POST",
      cache:false,
      url: "management/action.php",
      data: dataValue,
      success: function(data){
     

        if(data == 1111111){
          getCreatedCategorias();
          $('#Modalok .debug-url').html('A categoria #'+id+' e todos os dados associados, apagados com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
        else{
          getCreatedCategorias();
          $('#Modalko .debug-url').html('Surgiu o seguinte erro #'+data+', alguns registos não foram apagados.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('A categoria #'+id+' não foi apagada, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
  }
 },
}
});
}


/* POP UP APAGAR LOCAIS*/
function confirmDeleteLocationsCreated(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Local #<strong>"+id+"</strong>",
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
    dataValue='id='+id+'&action=12';
     $.ajax({
      type: "POST",
      cache:false,
      url: "management/action.php",
      data: dataValue,
      success: function(data){
        if(data == 1){
          getCreatedLocations($("#tipo_val").val());
          $('#Modalok .debug-url').html('O Local #'+id+' foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('O Local #'+id+' não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
  }
 },
}
});
}



/* CHAMADA DE TODOS OS LOCAIS*/
function getCreatedLocations(tp){
  $(".back").fadeIn();
  setTimeout(function(){ 
    dataValue="&action=10&tipo="+tp;
    $.ajax({
    url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
    $(".back").fadeOut();
     arr=[];
     arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){
       $('.debug-url').html('Não existem Locais criados para a categoria, p.f. Crie no link "Produtos-->Categorias-->Locais".');
       $("#mensagem_ko").trigger('click');
     }
     else {
          $("#add_type_edit").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'><span class='glyphicon glyphicon-map-marker'></span> Locais criados</h3></div><div class='panel-body' id='created'></div><div class='panel-footer'></div></div>");
        for(i=0;i<arr.length;i++){
          $("#created").append("<div  style='height:47px;' class='bd col-md-1 col-xs-2'><font>#"+arr[i].id+"</font></div><div style='height:47px;' class='bd col-md-2 col-xs-6'><input type='text' value='"+arr[i].local+"' id='col-1-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].local+"</font></div><div class='bd col-md-1 col-xs-4' id='action-"+arr[i].id+"'><div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Produto' class='btn btn-danger btn-sm' onclick='confirmDeleteLocationsCreated("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrmLocationsCreated("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div>");
        }
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter os locais, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
    });
  }, 1000);
}

/*MOSTRAR CAMPOS PARA EDITAR LOCAIS (1)*/
function showFrmLocationsCreated(id){
  for(i=1;i<2;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItemLocationsCreated("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemLocationsCreated("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS DE EDIÇÃO DOS LOCAIS */
function cancelItemLocationsCreated(id){
   for(i=1;i<2;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Local' class='btn btn-danger btn-sm' onclick='confirmDeleteLocationsCreated("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrmLocationsCreated("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}

/* EDITAR GRAVAR LOCAIS */
function saveItemLocationsCreated(id){
  setTimeout(function(){ 
  local = $("#col-1-"+id).val();
  var dataValue='';
  for(i=1;i<2;i++){
   dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=11";
  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
     if (data == 99 ){
     $('.debug-url').html('Erro, o local com o nome <b>'+local+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
     else if (data == 0){
     $('.debug-url').html('Erro, ao modificar o local <b>'+local+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if(data == 1 ){
      $('#show_search_local').fadeOut();
      getCreatedLocations($("#tipo_val").val());
      $('.debug-url').html('O local <b>'+local+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
   error:function(){
   $('.debug-url').html('O local com o <b>'+local+'</b> não foi modificado, verifique a ligação WiFi.');
   $("#mensagem_ko").trigger('click');
    }
  });
    }, 1000);
}



/*          */
/*FIM LOCAIS*/
/*          */


/* CHAMADA DE TODOS OS LOCAIS PARA NOVO PRODUTO*/
function getAllLocations(tp){
  $(".back").fadeIn();
  setTimeout(function(){

    dataValue="action=10&tipo="+$('#tipo_val').val();
    $.ajax({
    url:'management/action.php',
    data:dataValue,
    type:'POST', 
    cache:false,
    success:function(data){
    $(".back").fadeOut();

    localStorage.setItem("prod_locais", data);
    options='<option selected disabled value="">Escolha</option>';
     arr=[];
     arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('.debug-url').html('Não existem locais criados, p.f. crie em "Produtos->Produto->Locais"');
        $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++){
        options+="<option value='"+arr[i].local+"'>"+arr[i].local+"</option>";
}

$('#origem_local, #destino_local').html(options);

      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter os locais, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
    });
  }, 1000);
}




/* POP UP APAGAR PRODUTOS*/
function confirmDeleteProduct(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Produto #<strong>"+id+"</strong>",
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
    dataValue='id='+id+'&action=3';
     $.ajax({
      type: "POST",
      url: "management/action.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 1){
          $('#Modalok .debug-url').html('O Produto #'+id+' foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          $('.bt_mod').trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
         }
       else {
          $('#Modalko .debug-url').html('O Produto #'+id+' não foi apagado,p.f. tente novamente mais tarde.');
          $("#mensagem_ko").trigger('click');
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('O Produto #'+id+' não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });

      }
    },
  }
});
}
/*MOSTRAR CAMPOS PARA EDITAR PRODUTOS (1)*/
function showFrmMat(id){
  for(i=1;i<6;i++){
    $("#col-"+i+"-"+id).fadeIn();
    }
    $("#action-"+id).html("<button class='btn btn-success safe_it' onclick='saveItemMat("+id+")'><span class='glyphicon glyphicon-save-file' title='Guardar'></span></button><button class='btn btn-default' onclick='cancelMat("+id+")' title='Fechar Edição'><span class='glyphicon glyphicon-remove-sign'></span></button>");
}

/*FECHAR OS CAMPOS DE EDIÇÃO DOS PRODUTOS(2)*/
function cancelMat(id){
   for(i=1;i<6;i++){
    $("#col-"+i+"-"+id).fadeOut();
    }
    $("#action-"+id).html("<button class='btn btn-danger' onclick='confirmDeleteProduct("+id+")' title='Apagar Produto'><span class='glyphicon glyphicon-trash'></span> Apagar</button><button class='btn btn-info' onclick='showFrmMat("+id+")'><span class='glyphicon glyphicon-edit'></span> Editar</button>");
}

/* EDITAR GRAVAR PRODUTOS(3)*/
function saveItemMat(id){
	var dataValue='';
	for(i=1;i<5;i++){
	 dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
	}
	dataValue+="id="+id+"&action=upd_mat";
  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
     if (data.match(/ha/g)){
     $('.debug-url').html('Erro, O Produto com o ID; <b>'+id+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
     else if (data.match(/0/g)){
     $('.debug-url').html('Erro, ao modificar o Produto ID: <b>'+id+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if(data.match(/1/g)){
      clearFormMat();
      $('.debug-url').html('O Produto com o ID: <b>'+id+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
 error:function(){
   $('.debug-url').html('O Produto com o ID: <b>'+id+'</b> não foi modificado,p.f. verifique a ligação WiFi.');
    }
  });
}








