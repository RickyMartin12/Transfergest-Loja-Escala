<link href="dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="dataTables/css/select.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="dataTables/css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="dataTables/css/mytables.css" rel="stylesheet" type="text/css"/>

<div id="example_container2">
  <div class="registries-filters">
    <div class="company"></div>
      <div class="panel panel-default">

        <div class="search_results">
          <div class="form-group">
            <h3 style="text-align:center; font-size:21px;">
              <span class="label label-default" id="nr_resultados" style="padding: 10px;">
              </span>
            </h3>
          </div>
        </div>

        <div class="panel-heading my-orange">
          <div class="container-fluid">
            <div class="row">
              <form class='filter-form' id="mysearch">
                <h3 class="panel-title col-xs-12 col-md-6 col-lg-6">
                <i class="fa fa-table"></i> Relatórios</h3>
                <div class="col-xs-12 col-md-6 col-lg-6" style="text-align: right;">
                  <button type="button" class="btn btn-default filter-button" onclick="resetTable()">
                    <span class="glyphicon glyphicon-erase"></span> <span class="hidden-xs"> Limpar</span>
                  </button>
                  <button type="submit" class="btn btn-info filter-button" >
                    <span class="glyphicon glyphicon-filter"></span> <span class="hidden-xs"> Pesquisar</span>
                  </button>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-3 w3-padding-8">
                  <div class="input-group" style="width:100%;">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <select id="staff_value" class='form-control'></select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-3 w3-padding-8">
                 
                 <div class="input-group" style="width:100%;">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
                    <select id="operador_value" class='form-control'></select>
                  </div>
                </div>
                
                 <div class="col-md-6 col-sm-6 col-xs-12 col-lg-3 w3-padding-8">
                  <div class="input-group" id="data_value">
                    <input type="text" readonly class="form-control" id="data_ini" name="data_ini" placeholder="Dia Inicio">
                    <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-3 w3-padding-8">
                  <div class="input-group" id="data_value_fim">
                    <input type="text" readonly class="form-control" id="data_fim" name="data_fim" placeholder="Dia Fim">
                    <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>


<table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Acções/ID</th>
      <th>Refª</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Staff</th>
      <th>Matricula</th>
      <th>Estado</th>
      <th>Serviço</th>
      <th>Voo</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Pais</th>
      <th>Adt</th>
      <th>Chr</th>
      <th>Inf</th>
      <th>Recolha</th>
      <th>Entrega</th>
      <th>P.Referência</th>
      <th>Obs</th>
      <th>Operador</th>
      <th>Ticket</th>
      <th>Cob.Opera.</th>
      <th>Cob.Diret.</th>
      <th>Cmx.Opera.</th>
      <th>Cmx.Staff.</th>
      <th></th>
      <th>Hora Voo</th>
      <th>Mor.Recolha</th>
      <th>Mor.Rec.GPS</th>
      <th>Mor.Entrega</th>
      <th>Mor.Ent.GPS</th>
      <th>Duração</th>
      <th>Gerado</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Acções/ID</th>
      <th>Refª</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Staff</th>
      <th>Matricula</th>
      <th>Estado</th>
      <th>Serviço</th>
      <th>Voo</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Pais</th>
      <th>Adt</th>
      <th>Chr</th>
      <th>Inf</th>
      <th>Recolha</th>
      <th>Entrega</th>
      <th>P.Referência</th>
      <th>Obs</th>
      <th>Operador</th>
      <th>Ticket</th>
      <th>Cob.Opera.</th>
      <th>Cob.Diret.</th>
      <th>Cmx.Opera.</th>
      <th>Cmx.Staff.</th>
      <th></th>
      <th>Hora Voo</th>
      <th>Mor.Recolha</th>
      <th>Mor.Rec.GPS</th>
      <th>Mor.Entrega</th>
      <th>Mor.Ent.GPS</th>
      <th>Duração</th>
      <th>Gerado</th>
    </tr>
  </tfoot>
</table>

<input id="edit-service" type="hidden" data-toggle="modal" data-target="#edit-servicies">

<input id="pdftitle" type="hidden">

<?php include 'servicesmodal.php' ?>

<script src="dataTables/js/jquery.dataTables.min.js"></script>
<script src="dataTables/js/dataTables.select.min.js"></script>
<script src="dataTables/js/dataTables.buttons.min.js"></script>
<script src="dataTables/js/buttons.print.min.js"></script>
<script src="dataTables/js/buttons.colVis.js"></script>
<script src="dataTables/js/buttons.html5.min.js"></script>
<script src="dataTables/js/pdfmake.min.js"></script>
<script src="dataTables/js/vfs_fonts.js"></script>
<script src="dataTables/js/jszip.min.js"></script>
<script src="dataTables/js/dataTables.colReorder.min.js"></script>

<script type="text/javascript">

function generatePdf(p,o){
$('#pdf_conf').modal('hide');
$('.back').fadeIn();
setTimeout(function(){
$('.'+p+''+o).trigger('click');}, 500);
setTimeout(function(){$('.back').fadeOut();}, 1000);
}


var table;
var editor;
var myElem;
var estado;

title='';
file_name='';


function formatSeconds(secs){
    var hours = Math.floor(secs / (60 * 60));
    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);
    hours <= 9 ? hours='0'+hours : hours;
    minutes <= 9 ? minutes='0'+minutes : minutes;
    return hours+':'+minutes;
}


$("#example, .search").css("display","none");

function clearTable(){
  table = $('#example').DataTable();
  table.destroy();

  $('#example').empty().html('<thead><tr><th>Acções/ID</th><th>Refª</th><th>Data</th><th>Hora</th><th>Staff</th><th>Matricula</th><th>Estado</th><th>Serviço</th><th>Voo</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Pais</th><th>Adt</th><th>Chr</th><th>Inf</th><th>Recolha</th><th>Entrega</th><th>P.Referência</th><th>Obs</th><th>Operador</th><th>Ticket</th><th>Cob.Opera.</th><th>Cob.Diret.</th><th>Cmx.Opera.</th><th>Cmx.Staff.</th><th></th><th>Hora Voo</th><th>Mor.Recolha</th><th>Mor.Rec.GPS</th><th>Mor.Entrega</th><th>Mor.Ent.GPS</th><th>Duração</th><th>Gerado</th></tr></thead><tfoot><tr><th>Acções/ID</th><th>Refª</th><th>Data</th><th>Hora</th><th>Staff</th><th>Matricula</th><th>Estado</th><th>Serviço</th><th>Voo</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Pais</th><th>Adt</th><th>Chr</th><th>Inf</th><th>Recolha</th><th>Entrega</th><th>P.Referência</th><th>Obs</th><th>Operador</th><th>Ticket</th><th>Cob.Opera.</th><th>Cob.Diret.</th><th>Cmx.Opera.</th><th>Cmx.Staff.</th><th></th><th>Hora Voo</th><th>Mor.Recolha</th><th>Mor.Rec.GPS</th><th>Mor.Entrega</th><th>Mor.Ent.GPS</th><th>Duração</th><th>Gerado</th></tr></tfoot>');
  $("#example_container").css('display','none');
}

function inputNoDataTable(){
  $('#Modalko .debug-url').html('Preencha um dos campos para efectuar a pesquisa!');
  $("#mensagem_ko").trigger('click');
  $('.back').fadeOut();
  $('.row .search, #example_wrapper, #example, .search_results').hide();  
}

function resetTable(){
  $("#mysearch input").val('');
  $("#operador_value, #staff_value").val('').change();
}

function mydunc(){
  var e = document.getElementById("length_Menu");
  var strUser = e.options[e.selectedIndex].value;
}
  
$("#mysearch").submit(function(e){

  clearTable();

  e.preventDefault();
  staff = $("#staff_value").val();
  operador = $("#operador_value").val();
  data_inicio = $("#data_ini").val();
  data_fim = $("#data_fim").val();

  if (data_inicio == '' && data_fim == '' && staff == '' && operador == '')
  {
  inputNoDataTable();
  }
  else
  {
    $('.back').fadeIn();
    $('.row .search, #example_wrapper, #example, .search_results').show();
    if(staff != '' && operador == '' && data_inicio == '' && data_fim == '')
    {
      searchValue('action=1&staff='+staff);
      }
    else if(staff == '' && operador != '' && data_inicio == '' && data_fim == '')
    {
      searchValue('action=2&operador='+operador);          
    }
    else if(staff != '' && operador != '' && data_inicio == '' && data_fim == '')
    {
      searchValue('action=3&staff='+staff+'&operador='+operador);
    }
    else if(staff == '' && operador == '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=4&data_servico='+data_inicio);
    }
    else if(staff == '' && operador == '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=5&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if(staff != '' && operador == '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=6&staff='+staff+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if(staff != '' && operador == '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=7&staff='+staff+'&data_servico='+data_inicio);
    }
    else if(staff != '' && operador != '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=8&staff='+staff+'&operador='+operador+'&data_servico='+data_inicio);
    }
    else if(staff == '' && operador != '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=9&operador='+operador+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if(staff == '' && operador != '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=10&operador='+operador+'&data_servico='+data_inicio);
    }
    else if(staff != '' && operador != '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=11&staff='+staff+'&operador='+operador+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
  }
});

function searchValue(vl){
  $("#example, #example_container2, #example_container, .search").css("display","block");
   x='';
   table = $('#example').DataTable( {
    dom: "Blfrtip",
    colReorder:{fixedColumnsLeft:1},
    rowId: "id",
    "paging": true,
    "serverside":true,
    "drawCallback": function( settings ) {
        setTimeout(function(){
          $('.search_results').show();
          info = table.page.info();
          $('#nr_resultados').html("<span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: "+info.recordsTotal);
        }, 500);
    },

    "ajax": 
      {
        "url" : "registries/action_datatables.php?"+vl,
        "type": "POST"
/*
            success: function(data){
                console.log(JSON.stringify(data));
            },*/

      },
      columns: [
        { data: "id", render: function ( data, type, row ) {
          return '<button title="Fechar '+data+'" class="btn-sm btn-close btn btn-default" style="margin-left: 5px;"><i class="fa fa-taxi"></i></span></button><button title="Editar '+data+'" class="btn-sm btn btn-info"><span class="glyphicon glyphicon-edit"></span> '+data+'</button><button style="margin-left: 5px;" title="Apagar '+data+'" class="btn-sm btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>';
          }

},
        { data: "referencia" },
        { data: "data_servico" , render: function ( data, type, row ) {
          myDate = new Date(data*1000);
          a = myDate.toLocaleDateString();
          return a;
          }
        },
        { data: "hrs" , render: function ( data, type, row ) {
          date = new Date(data * 1000);
          year = date.getFullYear();
          month = date.getMonth() + 1; 
          day = date.getDate();
          hours = date.getHours();
          minutes = date.getMinutes();
          seconds = date.getSeconds();
          month = (month < 10) ? '0' + month : month;
          day = (day < 10) ? '0' + day : day;
          hours = (hours < 10) ? '0' + hours : hours;
          minutes = (minutes < 10) ? '0' + minutes : minutes;
          seconds = (seconds < 10) ? '0' + seconds: seconds;
          return hours + ':' + minutes;
          }
        },
        { data: "staff" },
        { data: "matricula", render: function ( data, type, row ) {
          matr = data.substring(0, 2)+"-"+data.substring(2, 4)+"-"+data.substring(4, 6);
          !data ? matr='-/-' : false;
          return matr;
          }
        },
        { data: "estado" },
        { data: "servico" },
        { data: "voo" },
        { data: "nome_cl" },
        { data: "email" },
        { data: "telefone" },
        { data: "pais" },
        { data: "px" },
        { data: "cr" },
        { data: "bebe" },
        { data: "local_recolha" },
        { data: "local_entrega" },
        { data: "ponto_referencia" },
        { data: "obs" },
        { data: "operador" },
        { data: "ticket" },
        { data: "cobrar_operador", className: "number-right",
           render: function ( data, type, row ) {
             cob = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? cob='-/-' : false;
             return cob;
            }
        },
        { data: "cobrar_direto", className: "number-right",
            render: function ( data, type, row ) {
              cob = parseFloat(data).toFixed(2)+'€';
              !data || data == 0 ? cob='-/-' : false;
              return cob;
            }
        },
        { data: "cmx_op", className: "number-right",
             render: function ( data, type, row ) {
             cob = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? cob='-/-' : false;
             return cob;
            }
        },
        { data: "cmx_st", className: "number-right",
             render: function ( data, type, row ) {
             cob = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? cob='-/-' : false;
             return cob;
            }
         },
         { data: "tstp", className: "hidden"},

         { data: "voo_horario", className: "number-right",
           render: function ( data, type, row ) {
            if (data && data != '0'){ 
               timestamp = moment.unix(data);
               a = timestamp.format("DD/MM/YYYY HH:mm");}
            else a='';
           return a; }
         },
         { data: "morada_recolha" },
         { data: "morada_recolha_gps",
             render: function ( data, type, row ) {
               !data || data.length < 10 ? gps='-/-' : gps = data;
               return gps;
            }
        },
         { data: "morada_entrega" },
         { data: "morada_entrega_gps",
             render: function ( data, type, row ) {
               !data || data.length < 10 ? gps='-/-' : gps = data;
               return gps;
             }
         },
         { data: "end",
           render:function (data, type, row){
            return formatSeconds(data);
           }
         },
         { data: "created_by" }
       ],

    "rowCallback": function(row, data, index){
    if(data['estado'] =='Fechado')
        $(row).find('td:eq(0) .btn-close').addClass('btn-success').removeClass('btn-default');
    },

      select: 
        {
          style:    'os',
          selector: 'td:first-child'
        },
        buttons: [
          {
            extend: 'colvis', text: '<i class="fa fa-scissors"></i>',
            titleAttr: 'Esconder Colunas',
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            columns: ':not(:nth-child(27))'
          },

            {
            extend:'',
            className:'buttons-totals',
            text: '<i class="fa fa-eye-slash"></i>',
            titleAttr: 'Esconder/Remover Total Geral'
          },
          {
            extend: 'print', 
            text: '<i class="fa fa-print"></i>',
            titleAttr: 'Imprimir',
            exportOptions: { orthogonal: 'export', columns: ':visible' }
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Excel',
            key: {key: 't', altkey: true},
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff:'+$("#staff_value").val();}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+'_';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'de_'+$('#data_ini').val()+'_';
                 title_3 = 'De: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+'_';
                title_4 = 'De: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              $.fn.dataTable.ext.buttons.excelHtml5.action(e,dt,button,config);
            }
          },
           {  
            extend: '',
            className:'buttons-pdf-format',
            text: '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'PDF'
           },

          {
            extend: 'pdfHtml5',
            className:'a4landscape hidden',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'landscape',
            pageSize: 'A4',
            footer: true,
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.pdfHtml5.action(e,dt,button,config);
            },
              customize: function(doc) {
              doc.styles.title = {
                color: 'black',
                fontSize: '12',
                alignment: 'left'
              }
           }    
          },

          {
            extend: 'pdfHtml5',
            className:'a4portrait hidden',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'portrait',
            pageSize: 'A4',
            footer: true,
            exportOptions: { orthogonal: 'export', columns: ':visible' }, action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.pdfHtml5.action(e,dt,button,config);
            },
            customize: function(doc) {
              doc.styles.title = {
                color: 'black',
                fontSize: '12',
                alignment: 'left'
              }
           }    
          },

          {
            extend: 'pdfHtml5',
            className:'a3portrait hidden',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'portrait',
            pageSize: 'A3',
            footer: true,
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.pagesize = $('#pagesize').val();
              config.orientation = $('#orientation').val();
              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.pdfHtml5.action(e,dt,button,config);
            },
            customize: function(doc) {
              doc.styles.title = {
                color: 'black',
                fontSize: '12',
                alignment: 'left'
              }
           }    
          },
          {
            extend: 'pdfHtml5',
            className:'a3landscape hidden',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'landscape',
            pageSize: 'A3',
            footer: true,
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.pagesize = $('#pagesize').val();
              config.orientation = $('#orientation').val();
              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.pdfHtml5.action(e,dt,button,config);
            },
            customize: function(doc) {
              doc.styles.title = {
                color: 'black',
                fontSize: '20',
                alignment: 'left'
              }
            }
          },


          {
            extend: 'pdfHtml5',
            className:'a2portrait hidden',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'portrait',
            pageSize: 'A2',
            footer: true,
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.pdfHtml5.action(e,dt,button,config);
            },
            customize: function(doc) {
              doc.styles.title = {
                color: 'black',
                fontSize: '20',
                alignment: 'left'
              }
           }    
          },
          {
            extend: 'pdfHtml5',
            className:'a2landscape hidden',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'landscape',
            pageSize: 'A2',
            footer: true,
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.pdfHtml5.action(e,dt,button,config);
            },
            customize: function(doc) {
              doc.styles.title = {
                color: 'black',
                fontSize: '20',
                alignment: 'left'
              }
            }
          },

          {
           extend: 'csv',
           filename: file_name,
           text: '<i class="fa fa-file-text-o"></i>',
           titleAttr: 'CSV',
           key: {key: 'l', altkey: true},
           exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_value").val()){
                 file_1 ='staff_'+$("#staff_value").val()+'_';
                 title_1= 'Staff: '+$("#staff_value").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#operador_value").val()){
                 file_2 ='operador_'+$("#operador_value").val()+'_';
                 title_2 ='Operador: '+$("#operador_value").val()+' ';}
              else {file_2='';title_2 ='';}

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename = file_1+''+file_2+''+file_3+''+file_4;
              config.title = title_1+''+title_2+''+title_3+''+title_4;
              $.fn.dataTable.ext.buttons.csvHtml5.action(e,dt,button,config);
            }
          }
       ],


            "footerCallback": function ( row, data, start, end, display ) {
              var api = this.api(), data;

              var intVal = function ( i ) {
                return typeof i === 'string' ?
                i.replace(/[\€]/g, '')*1 :
                typeof i === 'number' ?
                i : 0;
              };
              for (j = 22; j < 26; j++) {
                total = api
                .column( j )
                .data()
                .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
                }, 0 );
                pageTotal = api
                    .column( j, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

              $( api.column( j ).footer() ).html(
                parseFloat(pageTotal.toString()).toFixed(2)+'€ <br><span class="totals no-pdf">('+ parseFloat(total.toString()).toFixed(2) +'€)</span>'
              );                       
            }
            },
                "createdRow": function ( row, data, index ) {
                $(row).attr('id', data[0]);
                t= parseInt(data["px"])+parseInt(data["cr"])+parseInt(data["bebe"]);

                 switch(data['servico']){
                   case "Chegada":
                       if (t >= 9)
                          $(row).addClass('pale-green-dark');
                       else
                          $(row).addClass('w3-pale-green');break;
                   case "Partida":
                       if (t >= 9)
                          $(row).addClass('pale-red-dark');
                       else
                          $(row).addClass('w3-pale-red');break;
                   case "Interzone":
                        if (t >= 9)
                          $(row).addClass('pale-yellow-dark');
                       else
                          $(row).addClass('w3-pale-yellow');break;
                   case "Golf":
                        if (t >= 9)
                          $(row).addClass('pale-blue-dark');
                       else
                          $(row).addClass('w3-pale-blue');break;
                 }

              },

             "columnDefs": [
               { className:"my_class", "targets": [4] },
               { "orderData":[ 26 ],   "targets": [ 2 ] },
               {
                 "targets": [ 26 ],
                 "visible": false,
                 "searchable": false
                }
             ],
              "language": {
                "emptyTable":"Sem resultados",         
                "paginate": {
                  "first":      "Primeiro",
                  "last":       "Ultimo",
                  "next":       "Seguinte",
                  "previous":   "Anterior"
                },
                "zeroRecords": "Não tem registos",
                "loadingRecords": "A carregar...",
                "processing":     "A processar ...",
                "info": "Página nº _PAGE_ de _PAGES_",
                "infoEmpty": "Sem registos disponiveis",
                "infoFiltered": "(filtro de _MAX_ registos totais)",
                "search" : "",
                "lengthMenu": '<span class="hidden-xs">Mostrar </span><select id="length_Menu" onChange="mydunc()">'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="40">40</option>'+
                '<option value="-1">Todos</option>'+
                '</select>'
              },
              "destroy": true
            });

            table.ajax.reload();
            table.order( [ 26, 'asc' ] ).draw();
            $('.tableSearch').on( 'keyup', function () {
              table.search( this.value ).draw();
            });


$('#example tbody').on( 'click', '.btn-info', function () {
       arr = table.row($(this).parents('tr')).data();
       $('.servico_id').html(arr.id);
       triggerEditFields(arr);
});



$('#example tbody').on( 'click', '.btn-danger', function () {
       arr = table.row($(this).parents('tr')).data();
       confirmDeleteRegistriesReports(arr.id);
});


$('#example tbody').on( 'click', '.btn-close', function () {
       arr = table.row($(this).parents('tr')).data();
       closeServicies(arr.id,arr.estado);
});


$('#example tbody').on( 'click', 'tr', function () {
$(this).toggleClass('selected');
});

$('#example_filter').addClass('w3-col l4 m10 s9 w3-padding-8').removeClass('dataTables_filter');
$('#example_length').addClass('w3-col l3 m2 s3 w3-padding-8').removeClass('dataTables_length');
$('div.dt-buttons').addClass('w3-col l5 m12 s12 w3-padding-8');
$('#example_filter input').attr('placeholder','Filtrar ...');

$('#example_wrapper').on( 'click', '.buttons-totals', function () {
$('.no-pdf').empty();
});

$('#example_wrapper').on( 'click', '.buttons-pdf-format', function () {
$('#pdf_conf').modal();
});



$('.back').fadeOut();
}




    $("#flight-date").datetimepicker({sideBySide: true, useCurrent: true,
    locale: 'pt',widgetPositioning: {vertical: 'bottom'}});

    $("#data_value, #date-no-past-date").datetimepicker({ ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt',widgetPositioning: {vertical: 'bottom'}});
 
      $("#data_value_fim").datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', 
      locale: 'pt', useCurrent: false,widgetPositioning: {horizontal: 'right',vertical: 'bottom'}
        });

    $("#data_value").on("dp.change", function (e) {
        $("#data_value_fim").data("DateTimePicker").minDate(e.date);
    });
    
    $("#data_value_fim").on("dp.change", function (e) {
        $("#data_value").data("DateTimePicker").maxDate(e.date);
    });

   $(".datetimepicker_h").datetimepicker({ ignoreReadonly: true, format: 'H:mm', 
    locale: 'pt',widgetPositioning: {vertical: 'bottom'}});

   $('#duracao').datetimepicker({ignoreReadonly:true, format: 'HH:mm',collapse:false,sideBySide:true,useCurrent:false,widgetPositioning: {vertical: 'bottom'}});


 arr = JSON.parse(localStorage.getItem("operadores"));
  opt='<option selected value="">Operador</option>';   
  for (i=0;i<arr.length;i++){
    opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
  }
  $('#operador_value').html(opt).select2();


arr = JSON.parse(localStorage.getItem("staff"));
opt='<option selected value="">Staff</option>';
for (i=0;i<arr.length;i++){
  opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}
$('#staff_value').html(opt).select2();


/*PREPARO VALORES PARA MODAL EDIÇAO DADOS DA LINHA*/

function triggerEditFields(arr){

       $('#regcol_1').val(moment(arr.data_servico*1000).format("DD/MM/YYYY"));
       $('#regcol_3').val(moment(arr.hrs*1000).format("H:mm"));  
       $("#regcol_179").val(arr.referencia);
       $("#regcol_14").val(arr.ticket);
       $("#regcol_5").val(arr.voo);

       arr.voo_horario && arr.voo_horario !=0 ? voo_horario = moment(arr.voo_horario*1000).format("DD/MM/YYYY H:mm") : voo_horario =''; 
       !arr.morada_recolha_gps || arr.morada_recolha_gps.length < 10 ? rgps='' : rgps = arr.morada_recolha_gps;
       !arr.morada_entrega_gps || arr.morada_entrega_gps.length < 10 ? egps='' : egps = arr.morada_entrega_gps;

       $("#regcol_25").val(voo_horario);
       $("#regcol_6").val(arr.nome_cl);
       $("#regcol_180").val(arr.email);
       $("#regcol_181").val(arr.telefone);
       $("#regcol_182").val(arr.pais);
       $("#regcol_7").val(arr.local_recolha);
       $("#regcol_20").val(arr.morada_recolha);
       $("#regcol_21").val(rgps);
       $("#regcol_8").val(arr.local_entrega);
       $("#regcol_22").val(arr.morada_entrega);
       $("#regcol_23").val(egps);
       $("#regcol_10").val(arr.px);
       $("#regcol_11").val(arr.cr);
       $("#regcol_9").val(arr.ponto_referencia);
       $("#regcol_12").val(arr.bebe);
       $("#regcol_13").val(arr.obs);
       $("#regcol_15").val(arr.cobrar_operador);
       $("#regcol_16").val(arr.cobrar_direto);
       $("#regcol_77").val(arr.cmx_op);
       $("#regcol_78").val(arr.cmx_st);
       $("#duracao").val(formatSeconds(arr.end));
       $("#duracao").val(formatSeconds(arr.end));
       ar = JSON.parse(localStorage.getItem("frequent_places"));
       ar = JSON.parse(localStorage.getItem("locais"));
       local='';
       localr='<option selected value="'+arr.local_recolha+'">'+arr.local_recolha+'</option>';
       locale='<option selected value="'+arr.local_entrega+'">'+arr.local_entrega+'</option>';
       for (i=0;i<ar.length;i++){
         local +='<option value="'+ar[i].label+'">'+ar[i].label+'</option>';
        }
        $('#regcol_7').html(localr+''+local).select2();
        $('#regcol_8').html(locale+''+local).select2();

       arrl = JSON.parse(localStorage.getItem("servicestype")); 
       stp ='<option selected value="'+arr.servico+'">'+arr.servico+'</option>';
       for(i=0;i<arrl.length;i++){
         stp += "<option value='"+arrl[i].servico+"'>"+arrl[i].servico+"</option>";
       }
       $('#regcol_4').html(stp).select2();

      arrl = JSON.parse(localStorage.getItem("operadores"));
      op = '<option selected value="'+arr.operador+'">'+arr.operador+'</option>'; 
      for (i=0;i<arrl.length;i++){
        op +='<option value="'+arrl[i].label+'">'+arrl[i].label+'</option>';
      }
  
    $('#regcol_88').html(op).select2();

  arrl = JSON.parse(localStorage.getItem("staff"));
  st='<option selected value="'+arr.staff+'">'+arr.staff+'</option>';
  for (i=0;i<arrl.length;i++){
   st +='<option value="'+arrl[i].label+'">'+arrl[i].label+'</option>';
  }
  $('#regcol_99').html(st).select2();

  arrl = JSON.parse(localStorage.getItem("matricula"));

  matr = arr.matricula.substring(0, 2)+"-"+arr.matricula.substring(2, 4)+"-"+arr.matricula.substring(4, 6);

  mt='<option selected value="'+matr+'">'+matr+'</option>';
  for (i=0;i<arrl.length;i++){
   mt +='<option value="'+arrl[i].label+'">'+arrl[i].label+'</option>';
  }
 $('#regcol_87').html(mt).select2();

  $('#regcol_17').html('<option selected value="'+arr.estado+'">'+arr.estado+'</option><option value="Aceite"> Aceite</option><option value="Aguarda">Aguarda</option><option value="Anulado">Anulado</option><option value="Cancelado">Cancelado</option><option value="Confirmado"> Confirmado</option><option value="Fechado"> Fechado</option><option value="Iniciado"> Iniciado</option><option value="Pendente"> Pendente</option><option value="Rejeitado"> Rejeitado</option>');

$("#edit-service").trigger('click');
} 

/*SALVAR ALTERAÇÕES DO SERVIÇO NA BD*/

function saveIt(vl){

$("#regcol_10").val() ? $("#regcol_10").val() : $("#regcol_10").val('0');

if ($('#regcol_21').val()) $('#regcol_21').val(gpsMaxLenght($('#regcol_21').val()));

if ($('#regcol_23').val()) $('#regcol_23').val(gpsMaxLenght($('#regcol_23').val()));

if($('#regcol_25').val() == '0' || !$('#regcol_25').val()) $('#regcol_25').val();

$("#regcol_10").val() ? $("#regcol_10").val() : $("#regcol_10").val('0');

$("#regcol_11").val() ? $("#regcol_11").val() : $("#regcol_11").val('0');

$("#regcol_12").val() ? $("#regcol_12").val() : $("#regcol_12").val('0');


dataValue="action=20&id="+vl+"&data_servico="+$('#regcol_1').val()+"&hrs="+$("#regcol_3").val()+"&matricula="+$("#regcol_87").val()+"&estado="+$('#regcol_17').val()+"&servico="+$('#regcol_4').val()+"&referencia="+$("#regcol_179").val()+"&staff="+$("#regcol_99").val()+"&operador="+$('#regcol_88').val()+"&ticket="+ $("#regcol_14").val()+"&voo="+ $("#regcol_5").val()+"&voo_horario="+ $("#regcol_25").val()+"&nome_cl="+ $("#regcol_6").val()+"&email="+ $("#regcol_180").val()+"&telefone="+ $("#regcol_181").val()+"&pais="+ $("#regcol_182").val()+"&local_recolha="+ $("#regcol_7").val()+"&morada_recolha="+ $("#regcol_20").val()+"&morada_recolha_gps="+ $("#regcol_21").val()+"&local_entrega="+ $("#regcol_8").val()+"&morada_entrega="+ $("#regcol_22").val()+"&morada_entrega_gps="+ $("#regcol_23").val()+"&px="+ $("#regcol_10").val()+"&cr="+ $("#regcol_11").val()+"&bebe="+ $("#regcol_12").val()+"&obs="+ $("#regcol_13").val()+"&ponto_referencia="+$('#regcol_9').val()+"&cobrar_operador="+ $("#regcol_15").val()+"&cobrar_direto="+ $("#regcol_16").val()+"&cmx_op="+ $("#regcol_77").val()+"&cmx_st="+ $("#regcol_78").val()+"&end="+ $("#duracao").val();

$.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){
     if (data == 1) {
      reWriteRowTable(vl);
     }
     else if (data == 0){
       $('.cancel-edit').trigger('click');
       $('.debug-url').html('O Registo #<strong>'+vl+'</strong> não foi modificado!');
          $("#mensagem_ko").trigger('click');
          setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
     }
},
    error:function(){
        $('.cancel-edit').trigger('click');
        $('.debug-url').html('O Registo #'<strong>+vl+'</strong> não foi modificado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
}
  });
}

/*ATUALIZA LINHA DOS DADOS ALTERADOS APOS SUCESSO NA BD*/
function reWriteRowTable(vl){
table = $('#example').DataTable();
data = table.row("#"+vl ).data();
myDate=$('#regcol_1').val().split("/");
var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
x = new Date(newDate).getTime()/1000;
myh=$('#regcol_3').val().split(":");
h = myh[0]*60*60;
m = myh[1]*60;
t = h+m+x;

vt = $('#regcol_25').val().split(" ");
vtd = vt[0].split("/");
d = vtd[1]+"/"+vtd[0]+"/"+vtd[2]+" "+vt[1];
fdtx = new Date(d).getTime()/1000;


y = $('#regcol_87').val().replace (/-/g, "");
myh=$('#duracao').val().split(":");
dh = myh[0]*60*60;
dm = myh[1]*60;
d = dh+dm;
data['tstp'] =  $('#regcol_3').val();
data['data_servico'] = x;
data['hrs'] = t;
data['servico'] = $('#regcol_4').val();
data['referencia'] = $('#regcol_179').val();
data['staff'] = $('#regcol_99').val();
data['matricula'] = y;
data['estado'] =  $('#regcol_17').val();
data['end'] = d;
data['operador'] = $('#regcol_88').val();
data['ticket'] = $('#regcol_14').val();
data['nome_cl'] = $('#regcol_6').val();
data['email'] = $('#regcol_180').val();
data['pais'] = $('#regcol_182').val();
data['telefone'] = $('#regcol_181').val();
data['px'] = $('#regcol_10').val();
data['cr'] = $('#regcol_11').val();
data['bebe'] = $('#regcol_12').val();
data['voo'] = $('#regcol_5').val();
data['voo_horario'] = fdtx;
data['local_recolha'] = $('#regcol_7').val();
data['morada_recolha_gps'] = $('#regcol_21').val();
data['morada_recolha'] = $('#regcol_20').val();
data['local_entrega'] = $('#regcol_8').val();
data['morada_entrega_gps'] = $('#regcol_23').val();
data['morada_entrega'] = $('#regcol_22').val();
data['obs'] = $('#regcol_13').val();
data['ponto_referencia'] = $('#regcol_9').val();

data['cobrar_operador'] = $('#regcol_15').val();
data['cobrar_direto'] = $('#regcol_16').val();
data['cmx_op'] = $('#regcol_77').val();
data['cmx_st'] = $('#regcol_78').val();

table.row("#"+vl ).data(data).draw(false);

t= parseInt(data["px"])+parseInt(data["cr"])+parseInt(data["bebe"]);

$("#"+vl).removeClass('pale-green-dark w3-pale-green pale-red-dark w3-pale-red pale-yellow-dark w3-pale-yellow pale-blue-dark w3-pale-blue');

                 switch(data['servico']){
                   case "Chegada":
                       if (t >= 9)
                          $("#"+vl).addClass('pale-green-dark');
                       else
                          $("#"+vl).addClass('w3-pale-green');break;
                   case "Partida":
                       if (t >= 9)
                          $("#"+vl).addClass('pale-red-dark');
                       else
                          $("#"+vl).addClass('w3-pale-red');break;
                   case "Interzone":
                        if (t >= 9)
                          $("#"+vl).addClass('pale-yellow-dark');
                       else
                          $("#"+vl).addClass('w3-pale-yellow');break;
                   case "Golf":
                        if (t >= 9)
                          $("#"+vl).addClass('pale-blue-dark');
                       else
                          $("#"+vl).addClass('w3-pale-blue');break;
                 }


$('.cancel-edit').trigger('click');
$("#"+vl).addClass('blink').removeClass('selected');
setTimeout(function(){ $("#"+vl).removeClass('blink'); }, 10000);
}



function confirmDeleteRegistriesReports(id){
table = $('#example').DataTable();
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Registo #<strong>"+id+"</strong> ?",
  title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> <span class='hidden-xs'>Fechar</span>",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-trash'></span><span class='hidden-xs'> Apagar</span>",
      className: "btn-danger",
      callback: function() {
        dataValue='id='+id+'&action=2';
     $.ajax({
      type: "POST",
      cache:false,
      url: "registries/action_registries.php",
      data: dataValue,
      success: function(data){
        if(data == 2){
          table.row("#"+id).remove().draw();
          $('.debug-url').html('O Registo #<strong>'+id+'</strong> foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
        else{
          $('.debug-url').html('O Registo #<strong>'+id+'</strong> não foi apagado.');
          $("#mensagem_ko").trigger('click');
          setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
        }

      },
      error:function(data){
        $('.debug-url').html('O Registo #'<strong>+id+'</strong> não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });

      }
    },
  }
});
}


function closeServicies(id,vl){
 if (vl != 'Fechado' ){
     dataValue="id="+id+"&action=9";
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     cache:false,
     success:function(data){

if (data == 0){
        $('.debug-url').html('Surgiu um erro ao aceder a BD, p.f. tente mais tarde.<br> ERR#0 ');
        $("#mensagem_ko").trigger('click');}

if (data == 10){
       $('#Modalko .debug-url').html('Surgiu um erro, não foi definido um operador.<br>P.f insira um operador no campo <strong> Operador</strong>, e tente novamente. <br> ERR#10');
       $("#mensagem_ko").trigger('click');}

if (data == 100){
      $('.debug-url').html('Surgiu um erro, o membro do staff atribuido ao serviço não existe!<br>P.f insira um membro válido no campo <strong>Staff</strong>, e tente novamente. <br> ERR#101');
      $("#mensagem_ko").trigger('click');}

if (data == 101){
      $('#.debug-url').html('Surgiu um erro, foi definido um operador mas não existe valor a cobrar.<br>P.f insira valor no campo a <strong>cobrar operador ou a cobrar direto</strong>, e tente novamente. <br> ERR#101');
      $("#mensagem_ko").trigger('click');}

if (data == 110){
      $('.debug-url').html('Surgiu um erro ao aceder a BD, p.f. tente mais tarde.<br> ERR#110');
      $("#mensagem_ko").trigger('click');}

if (data == 111){
       $('.debug-url').html('Não foi possivel fechar o serviço, não foi definido um tipo de comissão ao elemento do Staff.<br>P.f insira valor no campo <strong> Tipo de comissão de Staff (Fixo  ou Percentagem)</strong>, e tente novamente. <br> ERR#111');
 $("#mensagem_ko").trigger('click');}

if (data == 1100){
       $('.debug-url').html('Surgiu um erro, não foi definido um operador válido nem um valor a cobrar.<br>P.f insira valores  nos campos <strong> Operador e cobrar operador ou a cobrar direto</strong>, e tente novamente. <br> ERR#1100');
 $("#mensagem_ko").trigger('click');}
    
if (data == 1110){
      $('.debug-url').html('Surgiu um erro, não foi definido valor a cobrar.<br>P.f insira valor no campo <strong>cobrar operador ou a cobrar direto</strong>, e tente novamente. <br> ERR#1110');
      $("#mensagem_ko").trigger('click');}

if (data == 1101 || data == 1111 || data == 11110){
      closeServiceGetValues(id);
      $('.debug-url').html('O Registo #<strong>'+id+'</strong> foi fechado com sucesso.');
      $("#mensagem_ok").trigger('click');
     setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
   }
if(data == 11111){
     $('.debug-url').html('O Registo #<strong>'+id+'</strong> foi fechado com sucesso e mail enviado para o operador.');
     $("#mensagem_ok").trigger('click');}
  },
    error:function(){
     $('.debug-url').html('O Registo #<strong>'+id+'</strong> não foi fechado, p.f. verifique a ligação Wi-fi.');
     $("#mensagem_ko").trigger('click');
    }
  });

}
else {
 $('.debug-url').html('O Registo #<strong>'+id+'</strong> já se encontra fechado');
 $("#mensagem_ko").trigger('click');
 }
}


 function closeServiceGetValues(id){
    dataValue='id='+id+'&action=12';
     $.ajax({
      type: "GET",
      cache:false,
      url: "registries/action_datatables.php",
      data: dataValue,
      success: function(data){
     a = JSON.parse(data);   
     table = $('#example').DataTable(); 
     table.cell( "#"+id, 6 ).data( a.data[0].estado );
     table.cell( "#"+id, 24 ).data( a.data[0].cmx_op );
     table.cell( "#"+id, 25 ).data( a.data[0].cmx_st ).draw(false);
     $("#"+id).addClass('blink').removeClass('selected'); 
    setTimeout(function(){ $("#"+id).removeClass('blink'); }, 8000);
      },
      error:function(data){
        $('.debug-url').html('O Registo #<strong>'+id+'</strong> não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
}

function hideShowdetails(vl){
  if($('.'+vl).hasClass('hidden')){
    $('.'+vl+'_0').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    $('.'+vl).removeClass('hidden');
  }
  else{
  $('.'+vl).addClass('hidden'); 
 $('.'+vl+'_0').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
}
}

function gpsMaxLenght(v){
  coor_e = v.split(',');
  space= ', ';
 return parseFloat(coor_e[0]).toFixed(7)+''+space+''+parseFloat(coor_e[1]).toFixed(7);
}


function newTransferType(type){

$('#created_by').val($('#usnm').text());

/*
param type 
23 = replicar serviço
24 = retorno do serviço
*/



dataValue = $('.createdfromother').serialize()+'&action='+type;
console.log(dataValue);

  $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST',
    success: function(data){
      arr=[];
      arr =  JSON.parse(data);
      if (arr.error){
        $('#errorvalues .debug').html('Por favor, verifique:<br><br>'+arr.error+'<br> e tente novamente.');
         $('#errorvalues').css('display','block');
      }
      else if (arr.success == 0){
        $('#errorvalues .debug').html('Surgiu um erro, o registo, não foi criado!');
         $('#errorvalues').css('display','block');
      }
      else if(arr.success == 1){
        if (type==23){
         $('#edit-servicies').modal('hide');
          $('.debug-url').html('A Réplica do registo foi criada com ID# <strong class="cpt">'+arr.id+'</strong>.<br>O Estado do serviço está Pendente.');
          $("#Modalok").modal();
          setTimeout(function(){
          $('#Modalok').modal('hide');},3500);
        }
         if (type==24){
          $('#edit-servicies').modal('hide');
          $('.debug-url').html('O Retorno do Registo foi criado com ID# <strong class="cpt">'+arr.id+'</strong>.<br>O Estado do serviço está Pendente.');
          $("#Modalok").modal();
          setTimeout(function(){
          $('#Modalok').modal('hide');},3500);
         }
      }
    },
    error:  function(data){
      $('#errorvalues .debug').html('O registo não foi criado, p.f. verifique a ligação Wi-Fi.');
      $('#errorvalues').css('display','block');
    }
});

}

</script>