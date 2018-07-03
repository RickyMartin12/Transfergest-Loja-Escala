function confirmDeleteAdmin(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Administrador #<strong>"+id+"</strong>",
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
       dataValue='id='+id+'&action=8';
       $.ajax({
        type: "POST",
        url: "/escala/team/action_team.php",
        data: dataValue,
        cache:false,
        success: function(data){
        if(data == 2){  
         callAdmin();
         $('.debug-url').html('O Administrador ID '+id+' foi apagado com sucesso.');
         $("#mensagem_ok").trigger('click');
         setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
       },
       error:function(data){
        $('.debug-url').html('O Administrador ID '+id+' não foi apagado, p.f. verifique a ligação.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}


/*CARREGA PHP COM FORMULARIO PARA NOVO ELEMENTO DA ADMINISTRACAO*/
function callNewAdminForm(){
$('#insert-action').empty();
      $.ajax({url: "/escala/team/new_admin_form.php",error:function(){
$('.debug-url').html('Erro ao obter o formulário dos Administradores, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}

})
      .done(function( html ) { $('.back').fadeOut();$('#insert-action').empty(); $( "#insert" ).html(html);});
}


/*
*
*MENU BOTÃO ADMINISTRAÇAO ACÇÕES
*
*/
/*OBTEM TODOS OS ELEMENTOS ADMINISTRAÇAO PARA ACÇÕES APAGAR */
function callAdminActions(){
$('#insert-action').empty();
      $.ajax({url: "/escala/team/call_admin_actions.php",error:function(){
$('.debug-url').html('Erro ao obter os dados dos administradores, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}

})
      .done(function( html ) { $('.back').fadeOut(); $('#insert-action').empty(); $( "#insert" ).html(html); callAdmin();});
}


function callGraphics(){
      $.ajax({url: "/escala/team/call_graphics.php",error:function(){
$('.debug-url').html('Erro ao obter os dados dos Gráficos, p.f. verifique a ligação Wi-Fi.');
     $("#mensagem_ko").trigger('click');
$('#Modalko .back').fadeOut();}

})
      .done(function(html) { $('#insert-action').empty(); $('#insert').html(html);});
}



/*OBTEM TEMPLATE PRIVILEGIOS*/

function callAdminPrivilegies(){
$('.back').fadeIn();
$('#insert-action').empty();
 $.ajax({url: "/escala/team/call_admin_privilegies.php",error:function(){
$('.debug-url').html('Erro ao obter os dados dos Privilégios, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}
})
      .done(function( html ) { $('.back').fadeOut(); $('#insert-action').empty(); $( "#insert" ).html(html); callTable();});

}

function callTable(){
    dataValue='action=13';
     $.ajax({ url:'/escala/team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
      arr=[];
      arr =  JSON.parse(data);
$('#testeloader').html("<table class='table'><thead><tr><th>Menu</th><th>Administrador</th><th>Gestor Plus</th><th>Gestor</th></tr></thead><tbody><tr><td class='info'>Transfers <span class='menu1 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(1)'></span></td><td class='info'><input id='m10-2' type='checkbox' data-size='mini' data-off-color='danger' "+arr[0].m10+" data-on-color='success'></td><td class='info'><input id='m10-1' type='checkbox'data-size='mini' data-off-color='danger' "+arr[1].m10+" data-on-color='success'></td><td class='info'><input id='m10-0' type='checkbox' data-size='mini'data-off-color='danger' "+arr[2].m10+" data-on-color='success'></td></tr><tr class='menu1all'><td>- Novo</td><td><input id='m11-2'"+arr[0].m11+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m11-1' type='checkbox' "+arr[1].m11+" data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m11-0' "+arr[2].m11+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu1all'><td>- Pesquisa ID</td><td><input id='m12-2' "+arr[0].m12+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'</td><td><input id='m12-1' "+arr[1].m12+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m12-0' "+arr[2].m12+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu1all'><td>- Gestão</td><td><input id='m13-2' "+arr[0].m13+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'</td><td><input id='m13-1' "+arr[1].m13+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m13-0' "+arr[2].m13+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu1all'><td>- Relatório Geral</td><td><input id='m14-2' "+arr[0].m14+" type='checkbox' data-size='mini' data-off-color='danger'  data-on-color='success'</td><td><input id='m14-1' "+arr[1].m14+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m14-0' "+arr[2].m14+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr><td class='info'>Operadores <span class='menu2 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(2)'></span></td><td class='info'><input id='m20-2' "+arr[0].m20+" type='checkbox' data-size='mini' data-off-color='danger'  data-on-color='success'></td><td class='info'><input id='m20-1' "+arr[1].m20+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m20-0' "+arr[2].m20+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'</td></tr><tr class='menu2all'><td>- Novo</td><td><input id='m21-2' "+arr[0].m21+" type='checkbox' data-size='mini' data-off-color='danger'  data-on-color='success'></td><td><input id='m21-1' "+arr[1].m21+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m21-0' "+arr[2].m21+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu2all'><td>- Editar</td><td><input id='m22-2' "+arr[0].m22+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m22-1' "+arr[1].m22+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m22-0' "+arr[2].m22+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu2all'><td>- Locais</td><td><input id='m23-2' "+arr[0].m23+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m23-1' "+arr[1].m23+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m23-0' "+arr[2].m23+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu2all'><td>- Tabela Operadores</td><td><input id='m24-2' "+arr[0].m24+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m24-1' "+arr[1].m24+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m24-0' "+arr[2].m24+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu2all hidden'><td>- Folha Cobranças</td><td><input id='m25-2' "+arr[0].m25+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m25-1' "+arr[1].m25+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m25-0' "+arr[2].m25+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr><td class='info'>Staff <span class='menu3 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(3)'></span></td><td class='info'><input id='m30-2' "+arr[0].m30+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m30-1' "+arr[1].m30+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m30-0' "+arr[2].m30+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu3all'><td>- Novo</td><td><input id='m31-2' "+arr[0].m31+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m31-1' "+arr[1].m31+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m31-0' "+arr[2].m31+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu3all'><td>- Editar</td><td><input id='m32-2' "+arr[0].m32+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m32-1' "+arr[1].m32+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m32-0' "+arr[2].m32+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu3all'><td>- Vencimentos</td><td><input id='m33-2' "+arr[0].m33+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m33-1' "+arr[1].m33+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m33-0' "+arr[2].m33+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu3all'><td>- Folha Cobranças</td><td><input id='m34-2' "+arr[0].m34+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m34-1' "+arr[1].m34+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m34-0' "+arr[2].m34+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr><td class='info'>Viaturas <span class='menu4 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(4)'></span></td><td class='info'><input id='m40-2' "+arr[0].m40+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m40-1' "+arr[1].m40+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m40-0' "+arr[2].m40+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu4all'><td>- Nova</td><td><input id='m41-2' "+arr[0].m41+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m41-1' "+arr[1].m41+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m41-0' "+arr[2].m41+"  type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu4all'><td>- Despesas</td><td><input id='m42-2' "+arr[0].m42+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m42-1' "+arr[1].m42+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m42-0' "+arr[2].m42+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu4all'><td>- Relatório Geral</td><td><input id='m43-2' "+arr[0].m43+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m43-1' "+arr[1].m43+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m43-0' "+arr[2].m43+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr><td class='info'>Loja <span class='menu5 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(5)'></span></td><td class='info'><input id='m50-2' "+arr[0].m50+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m50-1' "+arr[1].m50+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m50-0' "+arr[2].m50+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu5all'><td>- Locais</td><td><input id='m51-2' "+arr[0].m51+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m51-1' "+arr[1].m51+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m51-0' "+arr[2].m51+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu5all'><td>- Preços</td><td><input id='m52-2' "+arr[0].m52+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m52-1' "+arr[1].m52+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m52-0' "+arr[2].m52+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu5all'><td>- Editar</td><td><input id='m53-2' "+arr[0].m53+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m53-1' "+arr[1].m53+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m53-0' "+arr[2].m53+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr> <td class='info'>Administrador <span class='menu6 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(6)'></span></td><td class='info'><input id='m60-2' "+arr[0].m60+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m60-1' "+arr[1].m60+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m60-0' "+arr[2].m60+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu6all'><td>- Novo</td><td><input id='m61-2' "+arr[0].m61+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m61-1' "+arr[1].m61+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m61-0' "+arr[2].m61+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu6all'><td>- Editar</td><td><input id='m62-2' "+arr[0].m62+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m62-1' "+arr[1].m62+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m62-0' "+arr[2].m62+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu6all'><td>- Privilégios</td><td><input id='m63-2' "+arr[0].m63+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m63-1' "+arr[1].m63+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m63-0' "+arr[2].m63+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr><td class='info'>Configurações <span class='menu7 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(7)'></span></td><td class='info'><input id='m70-2' "+arr[0].m70+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m70-1' "+arr[1].m70+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m70-0' "+arr[2].m70+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu7all'><td>- Sistema</td><td><input id='m71-2' "+arr[0].m71+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m71-1' "+arr[1].m71+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m71-0' "+arr[2].m71+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu7all hidden'><td>- Loja</td><td><input id='m72-2' "+arr[0].m72+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m72-1' "+arr[1].m72+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m72-0' "+arr[2].m72+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu7all hidden'><td>- Tablet</td><td><input id='m73-2' "+arr[0].m73+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m73-1' "+arr[1].m73+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m73-0' "+arr[2].m73+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr><td class='info'>Back-Up <span class='menu8 glyphicon glyphicon-chevron-down' title='Expandir' style='cursor:pointer;float: right;' onclick='showMenuAll(8)'></span></td><td class='info'><input id='m80-2' "+arr[0].m80+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m80-1' "+arr[1].m80+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td class='info'><input id='m80-0' "+arr[2].m80+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu8all'><td>- Novo</td><td><input id='m81-2' "+arr[0].m81+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m81-1' "+arr[1].m81+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m81-0' "+arr[2].m81+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tr><tr class='menu8all'><td>- Editar</td><td><input id='m82-2' "+arr[0].m82+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m82-1' "+arr[1].m82+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td><td><input id='m82-0' "+arr[2].m82+" type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success'></td></tbody></table><script src='js/highlight.js'></script><script src='js/bootstrap-switch.min.js'></script><script src='js/main.js'></script><script>$('.bootstrap-switch-label').addClass('disabled');$('input').on('switchChange.bootstrapSwitch', function(event, state) {menu = this.id;state == true ? is_checked = 'checked' : is_checked = 'false';dataValue = 'action=12&tipo='+menu+'&estado='+is_checked;$.ajax({ url:'team/action_team.php',data:dataValue,type:'POST',success: function(data){if (data == 0){$('.debug-url').html('Erro ao atribuir o privilégio, p.f. tente novamente.');$('#mensagem_ko').trigger('click');}},error: function(){console.log(data);$('.debug-url').html('Não foi possivel obter os dados privilégios, p.f. verifique a ligação Wi-Fi.');$('#mensagem_ko').trigger('click');}});});");


/*
</tr></tbody></table><script src='js/highlight.js'></script><script src='js/bootstrap-switch.min.js'></script><script src='js/main.js'></script><script>$ ('.bootstrap-switch-label').addClass('disabled');$('input').on('switchChange.bootstrapSwitch', function(event, state) {menu = this.id;state == true ? is_checked = 'checked' : is_checked = 'false';dataValue = 'action=12&tipo='+menu+'&estado='+is_checked;$.ajax({ url:'team/action_team.php',data:dataValue,type:'POST',success: function(data){if (data == 0){$('.debug-url').html('Erro ao atribuir o privilégio, p.f. tente novamente.');$('#mensagem_ko').trigger('click');}},error: function(){console.log(data);$('.debug-url').html('Não foi possivel obter os dados privilégios, p.f. verifique a ligação Wi-Fi.');$('#mensagem_ko').trigger('click');}});});");*/
    },
    error:function(data){  
 
console.log(data);
}
  });
}





/*OBTEM TODOS OS ELEMENTOS PARA ACÇÕES ADMINISTRADORES*/
function callAdmin(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=7';
     $.ajax({ url:'/escala/team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
$(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $("#showteam").empty().append("<div class='col-xs-10 col-xs-offset-1'><h3 style='margin-top: 10px; text-align:center;'>Não existem administradores criados.<br/></h3></div>");
      }
      else {
        $("#delete_team").empty().html("<div class='row'><div class='col-xs-1'><label>ID</label></div><div class='col-xs-2'><label>Nome</label></div><div class='col-xs-3'><label>Password</label></div><div class='col-xs-4'><label>Email</label></div><div class='col-xs-2'><label>Privilegios</label></div></div>");
        for(i=0;i<arr.length;i++){
          id = arr[i].id;
          $("#delete_team").append("<div class='row' id='del_team_"+id+"'><div class='bd col-xs-1' id='col-0-"+id+"' >"+id+"</div><div class='bd col-xs-2'><input type='text' value='"+arr[i].nome+"' id='col-1-"+id+"' class='frm-item form-control'><font>"+arr[i].nome+"</font></div><div class='bd col-xs-3'><input type='password' id='col-2-"+id+"' class='frm-item form-control' placeholder='******'><font> ******* </font></div><div class='bd col-xs-4'><input type='email' value='"+arr[i].email+"' id='col-3-"+id+"' class='frm-item form-control'><font>"+arr[i].email+"</font></div><div class='bd col-xs-2'><select id='col-4-"+id+"' class='frm-item form-control'><option value='"+arr[i].privilegios+"*/*"+arr[i].tipo+"'>"+arr[i].tipo+"</option><option value='0*/*Gestor' >Gestor</option><option value='1*/*GestorPlus'> GestorPlus</option><option value='2*/*Administrator'>Administrator</option></select><font>"+arr[i].tipo+"</font></div><div class='col-md-12 col-xs-12' style='margin-top:15px;' id='action-"+id+"'><div class='btn-group btn-group' style='float: right;' role='group'><a title='Apagar Administrador' class='r-"+arr[i].id+" btn btn-sm btn-danger' onclick='confirmDeleteAdmin("+id+")'><span class='glyphicon glyphicon-trash'></span></a><button class='btn btn-info btn-sm' title='Editar Administrador' onclick='showFrmAdmin("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div></div>");
arr[i].no_del =='1' ?  $('.r-'+arr[i].id).addClass('disabled') : $('.r-'+arr[i].id).removeClass('disabled');      
}
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados dos Administradores, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}



/*MOSTRAR OS CAMPOS PARA EDIÇÃO ADMINISTRADORES*/
function showFrmAdmin(id){
    $('#del_team_'+id).addClass('list-group-item-success');
    $('#col-0-'+id).css('height','41px');

  for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).fadeIn().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button class='btn btn-sm btn-success safe_it' onclick='saveItemAdmin("+id+")' title='Guardar'><span class='glyphicon glyphicon-save-file'></span></button><button class='btn btn-default btn-sm' title='Fechar Edição' onclick='cancelAdmin("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}

/*FECHAR OS CAMPOS DE EDIÇÃO ADMINISTRADORES*/
function cancelAdmin(id){
$('#del_team_'+id).removeClass('list-group-item-success');
    $('#col-0-'+id).css('height','31px');
   for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).fadeOut().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Administrador' class='btn btn-sm btn-danger' onclick='confirmDeleteAdmin("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-sm btn-info' title='Editar Administrador' onclick='showFrmAdmin("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");}



/* EDITAR/ALTERAÇÃO GRAVAR ADMINISTRADOR  */
function saveItemAdmin(id){
  nome = $("#col-1-"+id).val();

  var dataValue='';
  for(i=1;i<5;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="nome="+nome+"&id="+id+"&action=9";
  $.ajax({ url:'/escala/team/action_team.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $('#del_team_'+id).removeClass('list-group-item-success');
      $('#col-0-'+id).css('height','31px');
      if (data == 2){
        $('.debug-url').html('Erro, já existe um administrador com o nome <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if (data == 22){
        $('.debug-url').html('Erro, ao modificar o administrador <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if(data == 1){
      callAdmin();
      $('.debug-url').html('O administrador <b>'+nome+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('#del_team_'+id).removeClass('list-group-item-success');
      $('#col-0-'+id).css('height','31px');
      $('.debug-url').html('O administrador <b>'+nome+'</b> não foi modificado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}




