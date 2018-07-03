<style>
.panel-body{padding:0;}
.table{margin-bottom:0px;}
.staff-edit-table-prices{display:none;}
.txt-r{float:right;}
</style>
<div class="panel panel-default">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12"><span class="glyphicon glyphicon-plus"></span> Tabelas Comissões Staff </h3>
    </div>
  </div>
  <div class="panel-body">
    <div class='table-responsive'>
      <table class='table table-striped' id="mytable">
        <thead class='my-gray'>
          <tr id='header_staff_tables'>
          </tr>
        </thead>
        <tbody id='staff_table'>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel-footer my-orange"></div>
</div>


<div class="panel panel-default staff-edit-table-prices">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12 staff-table-names"></h3>
    </div>
  </div>
  <div class="panel-body">
    <div class='table-responsive'>
      <table class='table table-striped' id="">
        <thead class='my-gray'>
          <tr id='header_staff_tables_prices'>
          </tr>
        </thead>
        <tbody id='staff_table_prices'>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel-footer my-orange"></div>
</div>


<script>

getStaffCategories();

 function TablesStaffEditions(vl,p_id,s_id,s_txt,p_txt){
     $('.staff-table-names').html("<input type='hidden' id='gr_id' value='"+s_id+"'><input type='hidden' id='ct_id' value='"+p_id+"'> <i class='fa fa-calculator'></i> Grupo: <b>"+s_txt+"</b> Categoria: <b>"+p_txt+"</b>");
     $('.staff-edit-table-prices').show();
     dataValue='action='+vl+'&s_id='+s_id+'&p_id='+p_id;

      rst='', b='';
      rs='<th class="bdr-w">Rotas</th>';
      b = '';
      $.ajax({ url:'team/action_team.php',
      data:dataValue,
      type:'POST',
      cache:false,
      success:function(data){

      $('html, body').animate({scrollTop: $(".staff-edit-table-prices").offset().top}, 500);

      arr = JSON.parse(data);

     if (arr.c == null || arr.c.length < 1){
     rs = "Não existem Classes nos Produtos da Categoria <b>"+p_txt+"</b>";
     }
     else {
      for(i=0;i<arr.c.length;i++){
       rs += '<th class="bdr-w" data-id="'+arr.c[i].id+'">'+arr.c[i].nome+'</th>';
       b += '<td><span class="txt-r l-val-'+arr.c[i].id+'">-/-</span><input data-label ="'+arr.c[i].id+'" class="form-control frm-item l-val-'+arr.c[i].id+'" min="0" type="number" step="any"></td>';
     }
    }

$('#header_staff_tables_prices').html(rs+'<th style="width:80px;">Acções</th>');

     if (arr.p == null || arr.p.length < 1){
     rst = "Não existem Produtos criados na Categoria <b>"+p_txt+"</b>";
     }
     else {
      for(i=0;i<arr.p.length;i++){
       rst += '<tr id="row-edit-'+arr.p[i].id+'" data-id="'+arr.p[i].id+'"><td><span>De: '+arr.p[i].local+'<br>Para: '+arr.p[i].local_fim+'</span></td>'+b+'<td id="row-action-'+arr.p[i].id+'"><button style="float: right;" class="btn btn-sm btn-info" onclick="editRowsTable('+arr.p[i].id+')"><span class="glyphicon glyphicon-edit"></span></button></td></tr>';
     }
    }
   $('#staff_table_prices').html(rst);

     if (arr.v == null || arr.v.length < 1){}
     else {

      for(i=0;i<arr.v.length;i++){
      if ($('#gr_id').val() == arr.v[i].id_group) {
        !arr.v[i].total ? txt ='-/-' : txt = parseFloat(arr.v[i].total).toFixed(2)+'€';
        $('#row-edit-'+arr.v[i].id_prod+' input.l-val-'+arr.v[i].id_label).val(arr.v[i].total).prev().text(txt);
      }
     }
    }

   },
   error:function(){}
  });
}

function editRowsTable(pr){
  $("#row-edit-"+pr).addClass('w3-pale-green');
  $("#row-edit-"+pr+" input").show().prev().hide();
  $("#row-action-"+pr).html('<button style="margin-left: 5px; float: right;" class="btn btn-sm btn-default" onclick="cancelRowsTable('+pr+')"><span class="glyphicon glyphicon-remove-sign"></span></button><button onclick="saveRowsTable('+pr+')" style="float: right;" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-save-file"></span></button>');
}

function cancelRowsTable(id){
  $("#row-edit-"+id).removeClass('w3-pale-green');
  $("#row-edit-"+id+" input").hide().prev().show();
  $("#row-action-"+id).html('<button style="float: right;" onclick="editRowsTable('+id+')" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span></button>');
}


function saveRowsTable(pr){
  g = $('#gr_id').val();
  c = $('#ct_id').val();
  arr = [];
  $("#row-edit-"+pr+" input").show().each(function(){
    v = $( this ).data('label')+"-"+$( this ).val();
    arr.push(v);
  });

  dataValue='action=26&group='+g+'&cat='+c+'&prod='+pr+'&labels='+arr;
  $.ajax({ url:'team/action_team.php',
      data:dataValue,
      type:'POST',
      cache:false,
      success:function(data){
       for(j=0;j<arr.length;j++){
        label = arr[j].split("-");
        !label[1] ? txt ='-/-' : txt = parseFloat(label[1]).toFixed(2)+'€';
        $('#row-edit-'+pr+' input.l-val-'+label[0]).val(label[1]).prev().text(txt);
       }
        cancelRowsTable(pr);
      },
      error:function(){}
   });
}


    $('#mytable tbody').on('click', 'button', function () {
     p_id = $(this).data('id');
     p_txt = $(this).closest('td').text();
     s_id = $(this).closest('tr').data('id');
     s_txt = $('#table-staff-'+s_id).text();

     if ($(this).hasClass('btn-primary'))
     TablesStaffGenerate(22,p_id,s_id,s_txt,p_txt);

     else if ($(this).hasClass('btn-danger'))
     TablesStaffGenerate(24,p_id,s_id,s_txt,p_txt);

     else if ($(this).hasClass('btn-info'))
     TablesStaffEditions(25,p_id,s_id,s_txt,p_txt);


    });

    function TablesStaffGenerate(vl,p,s,s_txt,p_txt){
     if (vl=='22'){
        scs = 'Gerada com sucesso tabela do Grupo <b>'+s_txt+'</b> Categoria <b>'+p_txt+'</b> !';
        err = 'Erro ao gerar a tabela do Grupo <b>'+s_txt+'</b> Categoria <b>'+p_txt+'</b>';
     }
     else if (vl=='24'){
        scs = 'Apagada com sucesso a tabela do Grupo <b>'+s_txt+'</b> Categoria <b>'+p_txt+'</b> !';
        err = 'Erro ao Apagar a tabela do Grupo <b>'+s_txt+'</b> Categoria <b>'+p_txt+'</b>';
     }

    dataValue='action='+vl+'&s_id='+s+'&p_id='+p;
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 

    success:function(data){ 
      if(data==1){
        $('#Modalok .debug-url').html(scs);
        $("#mensagem_ok").trigger('click');
        setTimeout(function(){$('.close').trigger('click');},2500);
        getStaffCategories();
        if (vl=='24')$('.staff-edit-table-prices').hide();
      }
    },
    error:function(){}
    });
}



function getStaffTableCategories(){

  p="<th class='bdr-w'>Grupos</th>";

  pb='', s='';
  
  pr_cat = JSON.parse(localStorage.getItem("productcategories"));

  if (pr_cat == null || pr_cat.length < 1)
     p = "Não existem Categorias de Produtos criadas.";
  else {
    for(i=0;i<pr_cat.length;i++){
       j=i+1;
       p += "<th class='bdr-w'> Categoria nº "+j+"</th>";
       pb += "<td class='table-prod-"+pr_cat[i].id+"'>"+pr_cat[i].nome+" <span style='float:right;' ><button title='Criar Tabela Comissões "+pr_cat[i].nome+"' class='my-btn btn btn-primary btn-sm' data-id='"+pr_cat[i].id+"'><span class='glyphicon glyphicon-plus'></span></button></span></td>";
    }
    $('#header_staff_tables').html(p);
  }
  st_cat = JSON.parse(localStorage.getItem("staffcategories"));

  if (st_cat == null || st_cat.length < 1)
    s = "Não existem Grupos de Staff criados.";

  else {
    for(i=0;i<st_cat.length;i++){
      s += "<tr class='trow-"+st_cat[i].id+"' data-id='"+st_cat[i].id+"'><td><span id='table-staff-"+st_cat[i].id+"'>"+st_cat[i].nome+"</span></td>"+pb+"</tr>";
    }

    $('#staff_table').html(s);

    act = JSON.parse(localStorage.getItem("actions"));
    if (act == null || act.length < 1){}
    else {
      for(i=0;i<act.length;i++){
        $('.trow-'+act[i].id_cat_staff+' .table-prod-'+act[i].id_cat_prod+' span').html("<button class='btn btn-sm btn-info' data-id='"+act[i].id_cat_prod+"'><span class='glyphicon glyphicon-edit'></span></button><button style='margin-left: 5px;' class='btn btn-sm btn-danger' data-id='"+act[i].id_cat_prod+"'><span class='glyphicon glyphicon-trash'></span></button>");
      }
    }
  }
}




/*TODAS CATEGORIAS STAFF*/

function getStaffCategories(){
    dataValue='action=20';
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("staffcategories", data);
    getProductCategories();
      },
    error:function(){}
    });
}

/*TODAS CATEGORIAS PRODUTOS*/
function getProductCategories(){
    dataValue='action=15';
    $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("productcategories", data);
    getProductActions();
      },
    error:function(){}
    });
}

/*TODAS CATEGORIAS PRODUTOS*/
function getProductActions(){
    dataValue='action=23';
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("actions", data);
    getStaffTableCategories();
      },
    error:function(){}
    });
}


</script>