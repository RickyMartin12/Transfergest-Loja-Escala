<div class="panel panel-default">
  <form id="form_equipa" autocomplete="off">
    <div class="panel-heading my-orange">
      <div class="row">
        <div class="col-md-6">
          <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Novo Staff</h3>
        </div>
        <div class="col-md-6" style="text-align: right;">
          <button type="reset" class="btn btn-default btn-reset"><span class="glyphicon glyphicon-erase"></span><font class='hidden-xs'> Limpar</font></button>
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save-file"></span><font class='hidden-xs'> Guardar</font></button>
        </div>
      </div>
    </div>
    <div class="panel-body" id="showteam">
      <div class="row">
        <div class='col-md-4 col-xs-12' title="Insira o nome do staff, p.f. não use acentuação">
          <div class="form-group input-group">
            <span class="input-group-addon req ft18"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" style='text-transform:capitalize;' required class="form-control" name="equipa_nome" id="fcol_50" placeholder="Nome* (Ex: a-z)">
          </div>
        </div>

        <div class='col-md-4 col-xs-12'>
          <div class="form-group input-group">
            <span class="input-group-addon req ft18"><span class="glyphicon glyphicon-asterisk"></span></span>
            <input type="password" required class="form-control" name="equipa_password" id="fcol_51" placeholder="Password*">
          </div>
        </div>

        <div class='col-md-4 col-xs-12'>
          <div class="form-group input-group"> 
            <span class="input-group-addon req ft18">@</span>
            <input type="email" required class="form-control" name="equipa_email" id="fcol_52" placeholder="Email *">
          </div>
        </div>

        <div class="col-md-4 col-xs-12">
          <div class="form-group input-group">
            <span class="input-group-addon req ft18"><span class="glyphicon glyphicon-list-alt"></span></span>
            <select required class="form-control" style="color:#999;" onchange="staffPayType(this.value)" name="sttpcomissao" id="fcol_55">
              <option value="">Escolha Tipo de Comissão *</option>
              <option value="Percentagem"> Percentagem</option>
              <option value="Percentagem Brt."> Percentagem Brt.</option>
              <option value="Fixo"> Fixo</option>
              <option value="Fixo Tabela"> Fixo Tabela</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-xs-12 cat_type">
          <div class="form-group input-group">
            <span class="input-group-addon req ft18"><i class="fa fa-line-chart"></i></span>
            <select class="form-control" style="color:#999;" id="cat-type" name="group">
            </select>
          </div>
        </div>
        <div class='col-md-4 col-xs-12'>
          <div class="form-group input-group">
            <span class="input-group-addon req ft18">%</span>
            <input type="number" min='0' max='100' value="" readOnly = "true" class="form-control" name="comissao" id="fcol_53" placeholder="Comissão *">
          </div>
        </div>

        <div class='col-md-4 col-xs-12'>
          <div class="form-group input-group">
            <span class="input-group-addon req ft18"><span class="glyphicon glyphicon-eur"></span></span>
            <input type="number" step="any" required class="form-control" name="vencimento" id="fcol_54" placeholder="Vencimento *">
          </div>
        </div>
      </div>
  </div>
</form>
<div class="panel-footer my-orange"></div>
</div>

<div class="panel panel-default">
  <div class="panel-heading my-orange">
    <h3 class="panel-title">
      <span class="glyphicon glyphicon-edit"></span> Editar Staff
    </h3>
  </div>
  <div class="table-responsive">
    <table class='table table-striped'>
      <thead class='my-gray'>
        <tr>

         <?php echo $lang['nome']; ?>

          <th class='bdr-w'>Nome</th>
          <th class='bdr-w'>Email</th>
          <th class='bdr-w'>Tipo</th>
          <th class='bdr-w'>Grupo</th>
          <th class='bdr-w'>Comissão</th>
          <th class='bdr-w'>Vencimento</th>
          <th class='bdr-w'>Régua</th>
          <th class='bdr-w'>Password</th>
          <th style='text-align: center; width:116px'>Acções</th>
        </tr>
      </thead>
      <tbody id="delete_team">
      </tbody>
    </table>
  </div>
  <div class="panel-footer my-orange"></div>
</div>

<script>

callEquipa();

function staffPayType(v){

if (v =='Percentagem' || v=='Percentagem Brt.')
$("#fcol_53").prop('readonly', false);
else if (v == 'Fixo Tabela') getStaffTableCategories();

else { $("#fcol_53").prop('readonly', true);
      $('.cat_type').hide();
      $('#cat-type').html('');
}

}

$('#form_equipa').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize()+'&action=1';
  $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){

      if(data == 99){
           $('.debug-url').html('O elemento do staff <strong class="cpt">'+$("#fcol_50").val()+'</strong>, não foi adicionado já existe.');
          $("#mensagem_ko").trigger('click');
      }
      
      else if(data == 11){
        $('.debug-url').html('O elemento do staff <strong class="cpt">'+$("#fcol_50").val()+'</strong>, foi adicionado com sucesso.');
        $("#mensagem_ok, .btn-reset").trigger('click');
        callEquipa();
      }
      
      else {
        $('.debug-url').html('O elemento do staff <strong class="cpt">'+$("#fcol_50").val()+'</strong>, não foi adicionado!');
        $("#mensagem_ko").trigger('click');
      }

    },
    error: function(){
      $('.debug-url').html('O elemento do staff não foi adicionado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
});



function getStaffTableCategories(){
    dataValue='action=20';
    t=''; 
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){}
      else {
        for(i=0;i<arr.length;i++){
          t += "<option value='"+arr[i].id+"-"+arr[i].nome+"'>"+arr[i].nome+"</option>";
          }
         $('.cat_type').show();
         $('#cat-type').html("<option disabled selected>Escolha Categoria</option>"+t);
      }
    },
    error:function(data){}
  });
}



function callEquipa(){



fch_cmx = 0; 
fch_venc = 0;
team='';
gr='-/-';

setTimeout(function(){
    dataValue='action=3';
     $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        team = "Não existem elementos do staff criados.";
      }
      else {
        for(i=0;i<arr.length;i++){
          nome = arr[i].equipa;
          id = arr[i].id;
          arr[i].comissao ? fch_cmx = arr[i].comissao+'%' : fch_cmx = '0%';
          arr[i].vencimento && arr[i].vencimento != 0 ? fch_venc = parseFloat(arr[i].vencimento).toFixed(2)+'€' : fch_venc = '-/-'; 


          if (arr[i].grupo && arr[i].grupo != '-/-' && arr[i].tipo == "Fixo Tabela"){
            r = arr[i].grupo.split('-');
            gr = r[1];}

          else gr ='-/-';

          if( arr[i].tipo == "Fixo" || arr[i].tipo == "Fixo Tabela"){
            arr[i].comissao = '-/-';
            fch_cmx ='-/-';
          }

          team += "<tr id='del_team_"+id+"'><td><input type='text' value='"+arr[i].equipa+"' id='col-1-"+id+"' class='frm-item form-control'><font>"+arr[i].equipa+"</font></td><td><input type='email' value='"+arr[i].email+"' id='col-2-"+id+"' class='frm-item form-control'><font>"+arr[i].email+"</font></td><td><select class='form-control frm-item' id='col-3-"+id+"' onchange='set_types(this.value,"+arr[i].id+")'><option value='"+arr[i].tipo+"'>"+arr[i].tipo+"</option><option value='Percentagem'> Percentagem</option><option value='Percentagem Brt.'> Percentagem Brt.</option><option value='Fixo'> Fixo</option><option value='Fixo Tabela'> Fixo Tabela</option></select><font>"+arr[i].tipo+"</font></td><td><select class='form-control frm-item' id='col-4-"+id+"'><option value='"+arr[i].grupo+"'>"+gr+"</option></select><font>"+gr+"</font></td><td><input type='number' value='"+arr[i].comissao+"' max='100' min='0' id='col-5-"+id+"' class='frm-item form-control'><font>"+fch_cmx+"</font></td><td><input type='number' min='0' step='any' value='"+arr[i].vencimento+"' id='col-6-"+id+"' class='frm-item form-control'><font style='float:right;'>"+fch_venc+"</font></td><td><Select id='col-7-"+id+"' class='frm-item form-control'><option value='"+arr[i].regua+"'>"+arr[i].regua+"</option><option value='Staff'>Staff</option><option value='Forn.'>Forn.</option></select><font style='float:right;'>"+arr[i].regua+"</font></td><td>******<div class='edit_pass-"+id+" input-group' style='display:none;'><input type='password' id='pass-"+id+"' class='form-control' placeholder='Nova Palavra Passe, Min. 4 caracteres'><span class='input-group-btn'><button onclick='SendEditNewPassword("+id+")' class='btn btn-success' type='button' title='Guardar Palavra Passe'><span class='glyphicon glyphicon-save-file'></span></button><button onclick='CloseEditNewPassword("+id+")' class='btn btn-default' type='button' title='Fechar edição'><span class='glyphicon glyphicon-remove-sign'></span></button></span></div></td><td id='action-"+id+"'><button style='margin-left:4px;' title='Apagar elemento staff' class='btn btn-sm btn-danger' onclick='confirmDeleteTeam("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-sm btn-info' style='margin-left:4px;' title='Editar elemento staff' onclick='showFrmTeam("+id+")'><span class='glyphicon glyphicon-edit'></span></button><button style='margin-left:4px;' title='Editar Password' class='btn btn-sm btn-warning' onclick='EditNewPassword("+id+")'><span class='glyphicon glyphicon-lock'></span></button><button style='margin-left:4px;' title='Enviar escala dia seguinte para staff ID: "+id+"' class='btn btn-sm btn-default' onclick='SendService("+id+")'><span class='glyphicon glyphicon-envelope'></span></button></td></tr>";
        }
        $("#delete_team").html(team);
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados do staff, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}




function EditNewPassword(id){
$('.edit_pass-'+id).fadeIn();
}

function CloseEditNewPassword(id){
$('.edit_pass-'+id).fadeOut();
}

function SendEditNewPassword(id){

n = $('#col-1-'+id).val();

pss = $('#pass-'+id).val()
if (pss.length < 4)
{
      $('.debug-url').html('P.f. insira pelo menos 4 caracteres no campo Nova Password, e tente novamente.');
      $("#mensagem_ko").trigger('click');
return;
}
else{
    dataValue='action=18&id='+id+'&pss='+pss;
     $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST',
    
    success:function(data){
     if (data == 1){
      $('.debug-url').html('A password do elemento do staff <strong>'+n+'</strong>, foi alterada com sucesso.');
      $("#mensagem_ok").trigger('click');
      $('.edit_pass-'+id).fadeOut();
    }
   },
    error:function(data){
      $('.debug-url').html('Erro ao modificar a password do elemento do staff com <strong> '+n+'</strong>, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}

}


function set_types(vl,id){

if(vl != 'Fixo Tabela'){
      $('#col-4-'+id).html('<option value="-/-">-/-<option>');
      $('#col-4-'+id).next().text('-/-');
}



}


/*MOSTRAR OS CAMPOS PARA EDIÇAO DA EQUIPA*/
function showFrmTeam(id){

    dataValue='action=20';
    t='',v=''; 
    vl = $('#col-4-'+id).val();

    txt = $('#col-4-'+id).next().text();

    for(i=0;i<8;i++){
      $("#col-"+i+"-"+id).fadeIn().next().hide();
    }

    $('#col-4-'+id).hide().next().show();

    if ($('#col-3-'+id).val() == "Fixo Tabela")
    {
       $('#col-5-'+id).hide().next().show();
       $("#col-4-"+id).fadeIn().next().hide();

       v = '<option value="'+vl+'">'+txt+'</option>';
       $.ajax({ url:'team/action_team.php',
        data:dataValue,
        type:'POST',
        cache:false,
        success:function(data){
        arr=[];
        arr =  JSON.parse(data);
        if (arr == null || arr.length < 1){}
        else {
          for(i=0;i<arr.length;i++){
            t += "<option value='"+arr[i].id+"-"+arr[i].nome+"'>"+arr[i].nome+"</option>";
          }
        $('#col-4-'+id).html(v+""+t);
        }
      },
      error:function(data){}
    });

    }
    else
    {
      $('#col-4-'+id).html('<option value="-/-">-/-<option>');
      $('#col-4-'+id).next().text('-/-');
     }


    $('#del_team_'+id).addClass('w3-pale-green');
    $("#action-"+id).html("<button style='margin-left:4px;' class='btn btn-sm btn-success safe_it' onclick='saveItemTeam("+id+")' title='Guardar'><span class='glyphicon glyphicon-save-file'></span></button><button style='margin-left:4px;' class='btn btn-default btn-sm' title='Fechar Edição' onclick='cancelTeam("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button>");
}

/*FECHAR OS CAMPOS DE EDIÇÃO DA EQUIPA*/
function cancelTeam(id){
   for(i=0;i<8;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $('#del_team_'+id).removeClass('w3-pale-green');
    $("#action-"+id).html("<button style='margin-left:4px;' title='Apagar elemento staff' class='btn btn-sm btn-danger' onclick='confirmDeleteTeam("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left:4px;' class='btn btn-sm btn-info' title='Editar elemento staff' onclick='showFrmTeam("+id+")'><span class='glyphicon glyphicon-edit'></span></button><button style='margin-left:4px;' title='Editar Password' class='btn btn-sm btn-warning' onclick='EditNewPassword("+id+")'><span class='glyphicon glyphicon-lock'></span></button><button style='margin-left:4px;' title='Enviar escala dia seguinte para staff ID: "+id+"' class='btn btn-sm btn-default' onclick='SendService("+id+")'><span class='glyphicon glyphicon-envelope'></span></button>");}


/* EDITAR/ALTERAÇÃO GRAVAR EQUIPA  */


function saveItemTeam(id){
  nome = $("#col-1-"+id).val();
  var dataValue='';
  for(i=1;i<8;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="nome="+nome+"&id="+id+"&action=4";

  $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      if (data == 9){
        $('.debug-url').html('Erro, já existe um elemento do staff com o nome <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if (data == 10){
        $('.debug-url').html('Erro, ao modificar o elemento do staff <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if(data == 111 ){
      callEquipa();
      $('.debug-url').html('A elemento do staff <b>'+nome+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
     }
    },
    error:function(){
      $('.debug-url').html('A elemento do staff <b>'+nome+'</b> não foi modificado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}





function confirmDeleteTeam(id){
n = $('#col-1-'+id).val();
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o elemento do staff <strong>"+n+"</strong>",
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
      url: "team/action_team.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2){  
          $('.debug-url').html('O elemento do staff '+n+' foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          callEquipa();       
        }
      },
      error:function(data){
        $('.debug-url').html('O elemento do staff '+n+' não foi apagado, p.f. verifique a ligação.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}


</script>