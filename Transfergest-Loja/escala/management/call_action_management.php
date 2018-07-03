<style>
.panel-primary>.panel-heading {
    border-color: transparent;
}
</style>


<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
<span class="glyphicon glyphicon-filter"></span> Editar</h3>
<div class="col-md-3 col-xs-10" style="float:right;top:-26px; right:-27px;">
  <div class="input-group">
  <input type="text" name="search_local" id="search_local" class="form-control" placeholder="Mostrar todos">
  <span class="bt_mod input-group-addon btn-info" onclick="searchLocal($('#search_local').val(),$('#tipo_val').val(),$('#cat_val').val())" style="cursor:pointer;">
  <span class="glyphicon glyphicon-filter"></span>
  </span>
  </div>
  </div>
</div>
</div>
<div id="show_search_local"></div>
<script>

document.getElementById('search_local').onkeydown = function(e){
   if(e.keyCode == 13){
     searchLocal($("#search_local").val(),$('#tipo_val').val());
   }
};


function formatSeconds(secs){
    var hours = Math.floor(secs / (60 * 60));
    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);
    hours <= 9 ? hours='0'+hours : hours;
    minutes <= 9 ? minutes='0'+minutes : minutes;
    return hours+':'+minutes;
}

function searchLocal(prod,tipo,cat){
  dataValue="search="+prod+"&tipo="+tipo+"&cat="+cat+"&action=6";

  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
     success:function(data){

    options='';
     loc=[];
     loc = JSON.parse(localStorage.getItem("prod_locais"));
     for(i=0;i<loc.length;i++){
       options+="<option value='"+loc[i].local+"'>"+loc[i].local+"</option>";
      }
     arr=[];
     arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){
      $('#show_search_local').empty().append("<div class='row'><div class='col-xs-12'><label>Não existem resultados, p.f. modifique a pesquisa</label></div></div>");
    }
    else {

      $('#show_search_local').empty();
      for(i=0;i<arr.length;i++){
      arr[i].visivel == 1 ? vs ='Sim' : vs='Não';
      duracao = formatSeconds(arr[i].duracao);  


$('#show_search_local').append("<div class='panel panel-info'><div class='panel-heading' id='heading-"+arr[i].id+"'><div class='row'><div class='col-md-1 col-sm-2'><label>ID#</label><br><font>"+arr[i].id+"</font></div><div class='col-md-3 col-sm-5 col-xs-12 tagtype5-"+arr[i].id+"'><label class='label5'>Origem</label><br/><select class='form-control frm-item' id='col-1-"+arr[i].id+"'><option value='"+arr[i].local+"'>"+arr[i].local+"</option><select><font>"+arr[i].local+"</font></div><div class='type5 col-md-3 col-sm-5 col-xs-12'><label>Destino</label></br><select class='form-control frm-item' id='col-2-"+arr[i].id+"'><option value='"+arr[i].local_fim+"'>"+arr[i].local_fim+"</option><select><font>"+arr[i].local_fim+"</font></div><div class='type5 col-md-2 col-sm-4 col-xs-6'><label>Duração</label><br><input type='text' style='border-radius:4px;' class='form-control frm-item' value='"+duracao+"' id='col-3-"+arr[i].id+"' placeholder='Duração'><font>"+duracao+"</font></div><div class='col-md-1 col-sm-4 col-xs-6'><label>Visivel</label><br/><select class='form-control frm-item' id='col-4-"+arr[i].id+"' style='padding: 6px 5px; min-width: 70px;'><option value='"+arr[i].visivel+"'>"+vs+"</option><option value='1'>Sim</option><option value='0'>Não</option></select><font>"+vs+"</font></div><div class='rt col-md-1 col-sm-4 col-xs-12' id='action-"+arr[i].id+"' style='min-width: 100px; float: right; margin-top: 5px;'><div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Produto' class='btn btn-danger btn-sm' onclick='confirmDeleteProduct("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrm("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div></div></div><div class='panel-body' style='padding:0px 5px 0px 5px;'><div class='row'  id='custom-labels-"+i+"'></div><div class='row'><div class='rt col-xs-12' id='action-prices"+arr[i].id+"'><div class='btn-group btn-group' style='float: right;' role='group'><button class='btn btn-info btn-sm' title='Editar Preços' onclick='showFrmPrices("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div></div></div><div class='panel-footer'></div></div>");

      if (tipo== 5 || tipo == 6){
      $('.type5').hide();
      $('.tagtype5-'+arr[i].id).html("<label>Nome do Produto</label><br/><input class='form-control frm-item' id='col-1-"+arr[i].id+"' value='"+arr[i].local+"'><font>"+arr[i].local+"</font>");
}
        for(h=0;h<arr[i].labels.length;h++){
         $('#custom-labels-'+i).append("<div class='total-prices-"+arr[i].id+" bd col-md-2 col-sm-4 col-xs-6'><label class='labels-txt-"+arr[i].labels[h].id+"'>"+arr[i].labels[h].nome+"</label></div>");
}
         for(j=0;j<arr[i].preco.length;j++){
         arr[i].preco[j].valor ? vl = parseFloat(arr[i].preco[j].valor).toFixed(2)+'€' : vl='-/-';
         arr[i].preco[j].valor == 0 ? vl='-/-' : vl = parseFloat(arr[i].preco[j].valor).toFixed(2)+'€';
 
         $('#custom-labels-'+i+' .labels-txt-'+arr[i].preco[j].id_label).append("<br><input  style='font-size: 12px; font-weight:normal;'class=' form-control frm-item editprice-"+arr[i].id+"' type='number' step='any' min='0' key='"+arr[i].preco[j].id+"' value='"+arr[i].preco[j].valor+"'><font id='"+arr[i].id+"-"+arr[i].preco[j].id+"' key='"+arr[i].preco[j].id+"'style='font-size: 12px; font-weight:normal;'>"+vl+"</font>");
}
 $('#col-3-'+arr[i].id).datetimepicker({format: 'HH:mm',collapse:false,sideBySide:true,useCurrent:false});
 $('#col-1-'+arr[i].id+', #col-2-'+arr[i].id).append(options);


}  
    } 
    },
    error:function(data){
     $('.debug-url').html('Erro ao obter os Produtos, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
    }
  });
}





/*MOSTRAR CAMPOS PARA EDITAR PRECOS (1)*/
function showFrmPrices(id){
$('.total-prices-'+id+' label br').next().show().next().hide();

    $("#action-prices"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItemPrices("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemPrices("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS DE EDIÇÃO DOS PRECOS */
function cancelItemPrices(id){
  $('.total-prices-'+id+' label br').next().hide().next().show();
    $("#action-prices"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrmPrices("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}

/* EDITAR GRAVAR PRECOS */
function saveItemPrices(id){
 idpricearr=[];
  $(".editprice-"+id).each(function(index){
    idpricearr.push ({id:$(this).attr('key'),preco:$(this).val()});
  });
  $.ajax({ 
    url:'management/action1.php',
    data: {myData:idpricearr},
    type:'POST',
    success:function(data){
    if (data == 0){
     $('.debug-url').html('Erro, ao modificar os preços do local <b>'+id+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
     else { 
      $('.debug-url').html('Os preços do local <b>'+id+'</b> foram modificados com sucesso.');
      $("#mensagem_ok").trigger('click');
      cancelItemPrices(id)
      getPricesEdit(id);
     }
   },
 error:function(){
   $('.debug-url').html('Os preços do local com o <b>'+id+'</b> não foram modificados, verifique a ligação WiFi.');
     $("#mensagem_ko").trigger('click');
    }
  });
}



 function getPricesEdit(id){
 dataValue="id="+id+"&action=22";
  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
     success:function(data){
     arr=[];
     arr =  JSON.parse(data);
console.log(data)
    if (arr == null || arr.length < 1){}
    else {
      for(i=0;i<arr.length;i++){
       arr[i].valor != 0 ? $("#"+id+"-"+arr[i].id).text(parseFloat(arr[i].valor).toFixed(2)+'€') : $("#"+id+"-"+arr[i].id).text('-/-');
      }
    }
   },
   error:function(data){
     $('.debug-url').html('Erro ao obter os Preços dos produtos, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
    }
  });
}



/*MOSTRAR CAMPOS PARA EDITAR LOCAIS (1)*/
function showFrm(id){
  for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItem("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItem("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS DE EDIÇÃO DOS LOCAIS */
function cancelItem(id){
   for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Produto' class='btn btn-danger btn-sm' onclick='confirmDelete("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrm("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}

/* EDITAR GRAVAR LOCAIS */
function saveItem(id){
  $(".back").fadeIn();
  setTimeout(function(){ 
  var dataValue='';

end_stamp=1800;
if ($('#col-3-'+id).val())
{
stamp = $('#col-3-'+id).val().split(":");
!stamp ? stamp ='00:30' : stamp=stamp;
end_stamp = (stamp[0]*60*60)+(stamp[1]*60);
$('#col-3-'+id).val(end_stamp);
}
  for(i=1;i<5;i++){
   dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }

  dataValue+="id="+id+"&action=5";
 $("#col-3-"+id).hide();  
$.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $(".back").fadeOut();
     if (data == 99){
     $('.debug-url').html('Erro, o local com o '+id+' já existe.');
     $("#mensagem_ko").trigger('click');
     }
     else if (data == 0){
     $('.debug-url').html('Erro, ao modificar o local <b>'+id+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if(data == 1 ){ 
      $('.debug-url').html('O local <b>'+id+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      getLocais(id);
     }
   },
 error:function(){
   $('.debug-url').html('O local com o <b>'+id+'</b> não foi modificado, verifique a ligação WiFi.');
     $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
    }, 1000);
}




/* CHAMADA DE TODOS OS LOCAIS*/
function getLocais(id){
tipo = $('#tipo_val').val();
    dataValue="id="+id+"&action=2";
 $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
     success:function(data){
    options='';
     loc=[];
     loc = JSON.parse(localStorage.getItem("prod_locais"));
     for(i=0;i<loc.length;i++){
       options+="<option value='"+loc[i].local+"'>"+loc[i].local+"</option>";
      }

     arr=[];
     arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){
      $('#show_search_local').empty().append("<div class='row'><div class='col-xs-12'><label>Não existem resultados, p.f. modifique a pesquisa</label></div></div>");
    }
    else {
      for(i=0;i<arr.length;i++){
      arr[i].visivel == 1 ? vs ='Sim' : vs='Não';
      duracao = formatSeconds(arr[i].duracao);

$('#heading-'+id).html("<div class='row'><div class='col-md-1 col-sm-2'><label>ID#</label><br><font>"+arr[i].id+"</font></div><div class='col-md-3 col-sm-5 col-xs-12 tagtype5-"+arr[i].id+"'><label>Origem</label><br/><select class='form-control frm-item' id='col-1-"+arr[i].id+"'><option value='"+arr[i].local+"'>"+arr[i].local+"</option><select><font>"+arr[i].local+"</font></div><div class='col-md-3 col-sm-5 col-xs-12 type5'><label>Destino</label></br><select class='form-control frm-item' id='col-2-"+arr[i].id+"'><option value='"+arr[i].local_fim+"'>"+arr[i].local_fim+"</option><select><font>"+arr[i].local_fim+"</font></div><div class='col-md-2 col-sm-4 col-xs-6 type5'><label>Duração</label><br><input type='text' style='border-radius:4px;' class='form-control frm-item' value='"+duracao+"' id='col-3-"+arr[i].id+"' placeholder='Duração'><font>"+duracao+"</font></div><div class='col-md-1 col-sm-4 col-xs-6'><label>Visivel</label><br/><select class='form-control frm-item' id='col-4-"+arr[i].id+"' style='padding: 6px 5px; min-width: 70px;'><option value='"+arr[i].visivel+"'>"+vs+"</option><option value='1'>Sim</option><option value='0'>Não</option></select><font>"+vs+"</font></div><div class='rt col-md-1 col-sm-4 col-xs-12' id='action-"+arr[i].id+"' style='min-width: 100px; float: right; margin-top: 5px;'><div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Produto' class='btn btn-danger btn-sm' onclick='confirmDeleteProduct("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Produto' onclick='showFrm("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div></div>");

      if (tipo == 5 || tipo == 6){
      $('.type5').hide();
      $('.tagtype5-'+arr[i].id).html("<label>Nome do Produto</label><br/><input class='form-control frm-item' id='col-1-"+arr[i].id+"' value='"+arr[i].local+"'><font>"+arr[i].local+"</font>");
}


 $('#col-3-'+arr[i].id).datetimepicker({format: 'HH:mm',collapse:false,sideBySide:true,useCurrent:false});
 $('#col-1-'+arr[i].id+', #col-2-'+arr[i].id).append(options);

}  

    }
    },
    error:function(data){
     $('.debug-url').html('Erro ao obter os Produtos, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
    }
  });
}

</script>