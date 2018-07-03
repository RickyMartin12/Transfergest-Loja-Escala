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
               <i class="fa fa-university"></i> Despesas
              </h3>
                <div class="col-xs-12 col-md-6 col-lg-6" style="text-align: right;">
                  <button type="submit" class="btn btn-info filter-button" >
                    <span class="glyphicon glyphicon-filter"></span> <span class="hidden-xs"> Pesquisar</span>
                  </button>
                  <button type="button" class="btn btn-default filter-button" onclick="resetTable()">
                    <span class="glyphicon glyphicon-erase"></span> <span class="hidden-xs"> Limpar</span>
                  </button>
                  <a href="#" class="received btn btn-success disabled" title="Validar Despesas">
                    <span class="glyphicon glyphicon-check"></span><span class="hidden-xs"> Validar</span>
                  </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-3 w3-padding-8">
                  <div class="input-group" style="width:100%;">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <select id="staff_value" class='form-control'></select>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-3 w3-padding-8"> 
                 <div class="input-group" style="width:100%;">
                    <span class="input-group-addon"><i class="fa fa-taxi"></i></span>
                    <select id="matricula_value" class='form-control'></select>
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
      <th>Data</th>
      <th>Staff</th>
      <th>Viatura</th>
      <th>NºFatura</th>
      <th>Entidade</th>
      <th>GPS</th>
      <th>Hora</th>
      <th>Km</th>
      <th>Tipo</th>
      <th>Despesa</th>
      <th>Total</th>
      <th>Descrição</th>
      <th>Km.Inicio</th>
      <th>Responsável</th>
      <th>Localidade</th>
      <th>Prox.Km.</th>
      <th>Data Inicio</th>
      <th>Data Fim</th>
      <th>Periodicidade</th>      
      <th>Dia</th>
      <th>Hrs.Fim</th>
      <th>Lat.Inicio</th>
      <th>Log.Inicio</th>
      <th>Lat.Fim</th>
      <th>Log.Fim</th>
      <th>Validado</th>
      <th></th>
      <th>Gps.Fim</th>
    </tr>
  </thead>
  <tfoot>
    <tr>

 <th>Acções/ID</th>
      <th>Data</th>
      <th>Staff</th>
      <th>Viatura</th>
      <th>NºFatura</th>
      <th>Entidade</th>
      <th>GPS</th>
      <th>Hora</th>
      <th>Km</th>
      <th>Tipo</th>
      <th>Despesa</th>
      <th>Total</th>
      <th>Descrição</th>
      <th>Km.Inicio</th>
      <th>Responsável</th>
      <th>Localidade</th>
      <th>Prox.Km.</th>
      <th>Data Inicio</th>
      <th>Data Fim</th>
      <th>Periodicidade</th>      
      <th>Dia</th>
      <th>Hrs.Fim</th>
      <th>Lat.Inicio</th>
      <th>Log.Inicio</th>
      <th>Lat.Fim</th>
      <th>Log.Fim</th>
      <th>Validado</th>
      <th></th>
      <th>Gps.Fim</th>
    </tr>
  </tfoot>
</table>

<input id="edit-service" type="hidden" data-toggle="modal" data-target="#edit-servicies">

<input id="pdftitle" type="hidden">

<?php include 'expensiesmodal.php' ?>

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


title='Despesas: ';
file_name='Despesas_';

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

  $('#example').empty().html('<thead><tr><th>Acções/ID</th><th>Data</th><th>Staff</th><th>Viatura</th><th>NºFatura</th><th>Entidade</th><th>GPS</th><th>Hora</th><th>Km</th><th>Tipo</th><th>Despesa</th><th>Total</th><th>Descrição</th><th>Km.Inicio</th><th>Responsável</th><th>Localidade</th><th>Prox.Km.</th><th>Data Inicio</th><th>Data Fim</th><th>Periodicidade</th><th>Dia</th><th>Hrs.Fim</th><th>Lat.Inicio</th><th>Log.Inicio</th><th>Lat.Fim</th><th>Log.Fim</th><th>Validado</th><th></th><th>Gps.Fim</th></tr></thead><tfoot><tr><th>Acções/ID</th><th>Data</th><th>Staff</th><th>Viatura</th><th>NºFatura</th><th>Entidade</th><th>GPS</th><th>Hora</th><th>Km</th><th>Tipo</th><th>Despesa</th><th>Total</th><th>Descrição</th><th>Km.Inicio</th><th>Responsável</th><th>Localidade</th><th>Prox.Km.</th><th>Data Inicio</th><th>Data Fim</th><th>Periodicidade</th><th>Dia</th><th>Hrs.Fim</th><th>Lat.Inicio</th><th>Log.Inicio</th><th>Lat.Fim</th><th>Log.Fim</th><th>Validado</th><th></th><th>Gps.Fim</th></tr></tfoot>');

  $("#example_container").css('display','none');
}



function inputNoDataTable(){
  $('.received').addClass('disabled');
  $('#Modalko .debug-url').html('Preencha um dos campos para efectuar a pesquisa!');
  $("#Modalko").modal();
  $('.back').fadeOut();
  $('.row .search, #example_wrapper, #example, .search_results').hide();  
  resetTable();
}

function resetTable(){
  $("#mysearch input").val('');
  $("#staff_value, #matricula_value").val('').change();
}

function mydunc(){
  var e = document.getElementById("length_Menu");
  var strUser = e.options[e.selectedIndex].value;
}
  
$("#mysearch").submit(function(e){

  clearTable();

  e.preventDefault();
  staff = $("#staff_value").val();
  matricula = $("#matricula_value").val();
  data_inicio = $("#data_ini").val();
  data_fim = $("#data_fim").val();

  if (data_inicio == '' && data_fim == '' && staff == '' && matricula == '')
  {
  inputNoDataTable();
  }
  else
  {
    $('.back').fadeIn();
    $('.row .search, #example_wrapper, #example, .search_results').show();
    if(staff != '' && matricula == '' && data_inicio == '' && data_fim == '')
    {
      searchValue('action=1&staff='+staff);
      }
    else if(staff == '' && matricula != '' && data_inicio == '' && data_fim == '')
    {
      searchValue('action=2&matricula='+matricula);          
    }
    else if(staff != '' && matricula != '' && data_inicio == '' && data_fim == '')
    {
      searchValue('action=3&staff='+staff+'&matricula='+matricula);
    }
    else if(staff == '' && matricula == '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=4&data_servico='+data_inicio);
    }
    else if(staff == '' && matricula == '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=5&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if(staff != '' && matricula == '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=6&staff='+staff+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if(staff != '' && matricula == '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=7&staff='+staff+'&data_servico='+data_inicio);
    }
    else if(staff != '' && matricula != '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=8&staff='+staff+'&matricula='+matricula+'&data_servico='+data_inicio);
    }
    else if(staff == '' && matricula != '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=9&matricula='+matricula+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if(staff == '' && matricula != '' && data_inicio != '' && data_fim == '')
    {
      searchValue('action=10&matricula='+matricula+'&data_servico='+data_inicio);
    }
    else if(staff != '' && matricula != '' && data_inicio != '' && data_fim != '')
    {
      searchValue('action=11&staff='+staff+'&matricula='+matricula+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
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
          if(info.recordsTotal > 0) {
            $('.received').removeClass('disabled');
          }
          else{
            $('.received').addClass('disabled');
          }
        }, 500);
    },

    "ajax": 
      {
        "url" : "expensies/action_datatables_expensies.php?"+vl,
        "type": "GET"

/*,
            success: function(data){
                console.log(JSON.stringify(data));
            },*/

      },
      columns: [
 /*0*/
  
        { data: "id", render: function ( data, type, row ) {
          return '<button title="Validar despesa #'+data+'" class="btn-sm btn-close btn btn-warning" style="margin-left: 5px;"><i class="fa fa-check"></i></span></button><button title="Editar despesa #'+data+'" class="btn-sm btn btn-info"><span class="glyphicon glyphicon-edit"></span> '+data+'</button><button style="margin-left: 5px;" title="Apagar despesa #'+data+'" class="btn-sm btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>';
          }
        },
/*1*/ 
        { data: "data", render: function ( data, type, row ) {
          myDate = new Date(data*1000);
          a = myDate.toLocaleDateString();
          return a;
          }
        },
/*2*/ 
        { data: "staff" },
/*3*/ 
        { data: "matricula", render: function ( data, type, row ) {
          matr = data.substring(0, 2)+"-"+data.substring(2, 4)+"-"+data.substring(4, 6);
          !data ? matr='-/-' : false;
          return matr;
          }
        },
/*4*/ 
        { data: "fatura"},
/*5*/ 
        { data: "entidade" },
/*6*/ 
        { data: "gps_ini", className: "number-right", render: function ( data, type, row ) {
             !data || data.length < 5 ? gi='-/-' : gi = data;
             return gi;
            }
        },
/*7*/ 
        {data: "data",  className: "hidden",render: function ( data, type, row ) {
          myDate = new Date(data*1000);
          var h = myDate.getHours();
          h < 9 ? h = '0'+h : h; 
          var m = myDate.getMinutes();
          m < 9 ? m = '0'+m : m; 
          //a = myDate.toLocaleDateString();
          time = h+':'+m; 
          return time;}
        },
/*8*/ 
        { data: "km_fim" },
/*9*/ 
        { data: "tipo_manutencao" },
/*10*/ 
        { data: "tipo_despesa" },
/*11*/ 
        { data: "total", className: "number-right",
             render: function ( data, type, row ) {
             t = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? t='-/-' : false;
             return t;
            }
        },
/*12*/
        { data: "descricao"},
/*13*/
        { data: "sort" },

        { data: "validado",className: "hidden payok"},
        { data: "km_inicio", className: "hidden" },
        { data: "responsavel",className: "hidden"},
        { data: "localidade",className: "hidden" },
        { data: "proximo_km",className: "hidden" },
        { data: "data_inicio",className: "hidden", render: function ( data, type, row ) {
          if( data != 0 && data){
            myDate = new Date(data*1000);
            a = myDate.toLocaleDateString();
          }
          else a= '-/-';
          return a;
         }
        },
        { data: "data_fim",className: "hidden", render: function ( data, type, row ) {
          myDate = new Date(data*1000);
           if( data != 0 && data){
            myDate = new Date(data*1000);
            a = myDate.toLocaleDateString();
           }
           else a='-/-';
           return a;
          }
        },
        { data: "tipo_periodicidade",className: "hidden" },
        { data: "dia",className: "hidden" },
        //{ data: "hora_inicio",className: "hidden"},
        { data: "horas_fim",className: "hidden" },        
        { data: "lat_inicio", className: "hidden" },
        { data: "long_inicio", className: "hidden" },
        { data: "lat_fim", className: "hidden"  },
        { data: "long_fim", className: "hidden" },
        { data: "gps_fim", className: "hidden", render: function ( data, type, row ) {
             !data || data.length < 5 ? gf='-/-' : gf = data;
             return gf;
            }
        }
     ],

    "rowCallback": function(row, data, index){
       if (data['validado'] =='Sim')
         $(row).find('td:eq(0) .btn-close').addClass('btn-success').removeClass('btn-warning').attr('title','Remover Validação Despesa #' +data['id']);
       if (data['validado'] !='Sim')
         $(row).find('td:eq(0) .btn-close').removeClass('btn-success').addClass('btn-warning').attr('title','Validar Despesa #' +data['id']);
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
            columns: ':not(:nth-child(14),:nth-child(15),:nth-child(16),:nth-child(17),:nth-child(18),:nth-child(19),:nth-child(20),:nth-child(21),:nth-child(22),:nth-child(23),:nth-child(24),:nth-child(25),:nth-child(26),:nth-child(27),:nth-child(28),:nth-child(29))'
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

              if($("#data_ini").val()){
                 file_3 = 'de_'+$('#data_ini').val()+'_';
                 title_3 = 'De: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+'_';
                title_4 = 'De: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename =file_name+''+file_1+''+file_3+''+file_4;
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

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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
              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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
              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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

              if($("#data_ini").val()){
                 file_3 = 'data_'+$('#data_ini').val()+'_';
                 title_3 = 'Data: '+$('#data_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#data_fim").val()){
                file_4 = 'a_'+$('#data_fim').val()+' ';
                title_4 = 'a: '+$('#data_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename =file_name+''+file_1+''+file_3+''+file_4;
              config.title = title+''+title_1+''+title_3+''+title_4;
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
                total = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
                }, 0 );
                pageTotal = api
                    .column( 11, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

              $( api.column( 11 ).footer() ).html(
                parseFloat(pageTotal.toString()).toFixed(2)+'€ <br><span class="totals no-pdf">('+ parseFloat(total.toString()).toFixed(2) +'€)</span>'
              );                       
            },

                "createdRow": function ( row, data, index ) {
                $(row).attr('id', data[0]);
                 switch(data['tipo_manutencao']){
                   case "Diária":
                          $(row).addClass('w3-pale-green');break;
                   case "Manutenção":
                          $(row).addClass('w3-pale-red');break;
                   case "Fixa":
                          $(row).addClass('w3-pale-blue');break;
                 }
              },

             "columnDefs": [
               { "orderData":[ 13 ],   "targets": [ 1 ] },
               {
                 "targets": [ 13 ],
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
            table.order( [ 13, 'asc' ] ).draw();
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

/*VALIDAÇÃO DE 1 DESPESA*/
$('#example tbody').on( 'click', '.btn-warning', function () {
   arr = table.row($(this).parents('tr')).data(); 
   idarr=[];
   idarr.push(arr.id);
   ServicesPayment(idarr,arr.total,1);
});


/*REMOVER VALIDAÇÃO DE 1 DESPESA*/
$('#example tbody').on( 'click', '.btn-success', function () {
   arr = table.row($(this).parents('tr')).data(); 
   idarr=[];
   idarr.push(arr.id);
   ServicesPayment(idarr,arr.total,0);
});


$('#example tbody').on( 'click', 'tr', function () {
$(this).toggleClass('selected');
});

$('#example_filter').addClass('w3-col l4 m10 s9 w3-padding-8').removeClass('dataTables_filter');
$('#example_length').addClass('w3-col l3 m2 s3 w3-padding-8').removeClass('dataTables_length');
$('div.dt-buttons').addClass('w3-col l5 m12 s12 w3-padding-8');
$('#example_filter input').attr('placeholder','Filtrar Ex:Validado insira sim ou não');

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

    $("#data_value, #date_one, .data_two").datetimepicker({ ignoreReadonly: true, format: 'DD/MM/YYYY', 
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

    $(".data_tree").datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', 
      locale: 'pt', useCurrent: false,widgetPositioning: {horizontal: 'right',vertical: 'bottom'}
        });

    $(".data_two").on("dp.change", function (e) {
        $(".data_tree").data("DateTimePicker").minDate(e.date);
    });

    
    $(".data_tree").on("dp.change", function (e) {
        $(".data_two").data("DateTimePicker").maxDate(e.date);
    });

   $(".datetimepicker_h").datetimepicker({ ignoreReadonly: true, format: 'H:mm', 
    locale: 'pt',widgetPositioning: {vertical: 'bottom'}});

   $('.clocktime').datetimepicker({ignoreReadonly:true, format: 'HH:mm',collapse:false,sideBySide:true,useCurrent:false,widgetPositioning: {vertical: 'bottom'}});


arr = JSON.parse(localStorage.getItem("staff"));
opt='<option selected value="">Staff</option>';
for (i=0;i<arr.length;i++){
  opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}
$('#staff_value').html(opt).select2();


 arrl = JSON.parse(localStorage.getItem("matricula"));
   mt='<option selected value="">Matricula</option>';
  for (i=0;i<arrl.length;i++){
   mt +='<option value="'+arrl[i].label+'">'+arrl[i].label+'</option>';
  }
$('#matricula_value').html(mt).select2();


$("#regcol_18").change(function(){

$("#regcol_19").attr('disabled',false);

switch ($(this).val()){

case 'Diária':

$('.serviceclient_0, .serviceclient').addClass('hidden');
$("#regcol_19").html('<option value="Combustivel">Combustivel</option><option value="Portagem">Portagem</option><option value="Lavagem">Lavagem</option><option value="Parque">Parque</option><option value="Diversos">Diversos</option>');
break;

case 'Fixa':
$('.serviceclient_0, .serviceclient').removeClass('hidden');
$("#regcol_19").html('<option value="Selo">Selo</option><option value="Inspecção">Inspecção</option><option value="Seguro">Seguro</option><option value="Renda">Renda</option>');

break;

case 'Manutenção':
$('.serviceclient_0, .serviceclient').addClass('hidden');
$("#regcol_19").html('<option value="Revisão">Revisão</option><option value="Mecânica">Mecânica</option><option value="Sinistro">Sinistro</option><option value="Outros">Outros</option>');

break;
}

});


/*PREPARO VALORES PARA MODAL EDIÇAO DADOS DA LINHA*/

function triggerEditFields(arr){

arr.tipo_manutencao == 'Fixa' ? $('.serviceclient_0, .serviceclient').removeClass('hidden') : $('.serviceclient_0, .serviceclient').addClass('hidden');

$('#regcol_1').val(moment(arr.data*1000).format("DD/MM/YYYY"));
$('#regcol_3').val(arr.responsavel); 
$("#regcol_4").val(arr.entidade);
$("#regcol_5").val(arr.fatura);
$("#regcol_179").val(arr.km_fim);

$("#regcol_18").html('<option value="'+arr.tipo_manutencao+'">'+arr.tipo_manutencao+'</option><option value="Diária">Diária</option><option value="Fixa">Fixa</option><option value="Manutenção">Manutenção</option>');

$("#regcol_19").html('<option value="'+arr.tipo_despesa+'">'+arr.tipo_despesa+'</option>');

$("#regcol_16").val(arr.descricao);
$("#regcol_78").val(arr.total);
$("#regcol_6").val(arr.km_inicio);
$("#regcol_180").val(arr.proximo_km);

!arr.data_inicio || arr.data_inicio =='0'  ? arr.data_inicio = new Date().getTime() : arr.data_inicio = arr.data_inicio*1000;
!arr.data_fim || arr.data_fim =='0'  ? arr.data_fim = new Date().getTime() : arr.data_fim = arr.data_fim*1000;

$("#regcol_181").val(moment(arr.data_inicio).format("DD/MM/YYYY"));
$("#regcol_182").val(moment(arr.data_fim).format("DD/MM/YYYY"));
$("#regcol_10").val(arr.dia);
$("#regcol_20").val(arr.localidade);

arr.tipo_periodicidade ? prd = '<option value="'+arr.tipo_periodicidade+'">'+arr.tipo_periodicidade+'</option>' : prd='';

$("#regcol_22").html(prd+'<option value="Mensal">Mensal</option><option value="Trimestral">Trimestral</option><option value="Semestral">Semestral</option><option value="Anual">Anual</option>');
$("#regcol_55").val(arr.lat_inicio);
$("#regcol_56").val(arr.long_inicio);
$("#regcol_57").val(arr.lat_fim);
$("#regcol_58").val(arr.long_fim);

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

$("#edit-service").trigger('click');
} 

/*SALVAR ALTERAÇÕES DESPESA NA BD*/

function saveIt(vl){
dataValue="action=2&id="+vl+"&data="+$('#regcol_1').val()+"&entidade="+$('#regcol_4').val()+"&fatura="+$('#regcol_5').val()+"&staff="+$('#regcol_99').val()+"&responsavel="+$('#regcol_3').val()+"&matricula="+$('#regcol_87').val()+"&tipo_manutencao="+$('#regcol_18').val()+"&tipo_despesa="+$('#regcol_19').val()+"&localidade="+$('#regcol_20').val()+"&km_inicio="+$('#regcol_6').val()+"&km_fim="+$('#regcol_17').val()+"&proximo_km="+$('#regcol_180').val()+"&lat_inicio="+$('#regcol_55').val()+"&long_inicio="+$('#regcol_56').val()+"&lat_fim="+$('#regcol_57').val()+"&long_fim="+$('#regcol_58').val()+"&data_inicio="+$('#regcol_181').val()+"&data_fim="+$('#regcol_182').val()+"&dia="+$('#regcol_10').val()+"&periodicidade="+$('#regcol_22').val()+"&horas_inicio="+$('#regcol_11').val()+"&horas_fim="+$('#regcol_12').val()+"&descricao="+$('#regcol_16').val()+"&total="+$('#regcol_78').val() ;


console.log(dataValue);

$.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){

console.log(data);

     if (data == 1) {
      reWriteRowTable(vl);
     }
     else if (data == 0){
       $('.cancel-edit').trigger('click');
       $('.debug-url').html('Fatura #<strong>'+vl+'</strong> não foi modificada!');
          $("#Modalko").modal();
          setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
     }
},
    error:function(){
        $('.cancel-edit').trigger('click');
        $('.debug-url').html('Fatura #'<strong>+vl+'</strong> não foi modificada, p.f. verifique a ligação Wi-Fi.');
        $("#Modalko").modal();

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

y = $('#regcol_87').val().replace (/-/g, "");

myDateIni=$('#regcol_181').val().split("/");
var newDateIni=myDateIni[1]+"/"+myDateIni[0]+"/"+myDateIni[2];
ndi = new Date(newDateIni).getTime()/1000;

myDateFim=$('#regcol_182').val().split("/");
var newDateFim=myDateFim[1]+"/"+myDateFim[0]+"/"+myDateFim[2];
ndf = new Date(newDateFim).getTime()/1000;

data['data'] = x;
data['entidade'] = $('#regcol_4').val();
data['fatura'] = $('#regcol_5').val();
data['staff'] = $('#regcol_99').val();
data['responsavel'] = $('#regcol_3').val();
data['matricula'] = y;
data['tipo_manutencao'] = $('#regcol_18').val();
data['tipo_despesa'] = $('#regcol_19').val();
data['localidade'] = $('#regcol_20').val();
data['km_inicio'] = $('#regcol_6').val();
data['km_fim'] = $('#regcol_17').val();
data['proximo_km'] = $('#regcol_180').val();
data['gps_ini']= $('#regcol_55').val()+', '+$('#regcol_56').val();
/*PARTE FIXAS*/

data['data_inicio'] = ndi;
data['data_fim'] = ndf;

data['hora_inicio'] = $('#regcol_11').val();
data['horas_fim'] = $('#regcol_12').val();
data['dia'] = $('#regcol_10').val();
data['tipo_periodicidade'] = $('#regcol_22').val();

/*PARTE COBRANÇAS*/
data['descricao'] = $('#regcol_16').val();
data['total'] = $('#regcol_78').val();

table.row("#"+vl ).data(data).draw(false);

$("#"+vl).removeClass('w3-pale-green w3-pale-red w3-pale-blue');

switch(data['tipo_manutencao']){
                   case "Diária":
                          $("#"+vl).addClass('w3-pale-green');break;
                   case "Manutenção":
                          $("#"+vl).addClass('w3-pale-red');break;
                   case "Fixa":
                          $("#"+vl).addClass('w3-pale-blue');break;
                 }
$('.cancel-edit').trigger('click');
$("#"+vl).addClass('blink').removeClass('selected');
setTimeout(function(){ $("#"+vl).removeClass('blink'); }, 10000);
}






/*REMOVER VALIDA DESPESAS SERVIÇOS ESTADO NÃO*/
$('.received').click(function(){

idArr=[];
temp = [];
tocalc = [];

$('.payok').each(function( index ) {

  if($( this ).text() != 'Sim' )
      {
      idArr.push($(this).parent().attr('id'));
      str = $(this).prev().prev().text();
      var intVal = function ( i ) {
           return typeof i === 'string' ?
           i.replace(/[\€]/g, '')*1 :
           typeof i === 'number' ?
           i : 0;
       };
       temp.push(intVal(str));
   }
});

for (i = 0; i < idArr.length; i++){ if (idArr[i]) tocalc.push(idArr[i]);}
v = clear(temp);
ServicesPayment(tocalc,v,1);
});


function clear (arr){
vl=0;
   for (i = 2; i < arr.length; i++){
      if (arr[i])
       vl += arr[i];
   }
   return parseFloat(vl).toFixed(2);
}

function ServicesPayment(arr,vl,tp){

/*
vl = valor total
tp = 1  validar serviços = sim
tp = 0  validar serviços = nao
arr =  ids dos serviços
*/

tp == '1' ? isvalid = "Validar": isvalid = "Remover validação";

txt='';

for(i=0;i<arr.length; ++i){txt += arr[i]+', ';}
vl && vl !=0 ? vl= parseFloat(vl).toFixed(2)+'€' : vl='-/-'; 
if (arr.length >=1){
bootbox.dialog({
  message: "Tem a certeza que pretende <b>"+isvalid+"</b>, "+arr.length+" despesas(s) com ID: <strong>"+txt+"</strong>?<br>O valor é de: "+vl+"</strong>",
   title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-eur'></span> "+isvalid,
      className: "btn-warning",
      callback: function() {
      dataValue = JSON.stringify(arr);
      $.ajax({ 
      url:'expensies/action_validate_expensies.php',
      data: {data : dataValue, action: tp}, 
      type:'POST',
      cache:false,
      success: function(data){
      ar =[];
      ar = JSON.parse(data);
       if(!ar.success.match(/0/g)){  
         $('.debug-url').html('A(s) '+arr.length+' Despesas(s) com ID: <strong>'+txt+'</strong> para estado: '+isvalid+', no campo Validado.');
         $("#Modalok").modal();
         $('.received').addClass('disabled');
         txt='';
         setTimeout(function(){$("#Modalok").modal('hide');}, 2500);
         table = $('#example').DataTable(); 
         for(i=0;i<arr.length; ++i){
          txt += arr[i]+', ';
         table.cell( "#"+arr[i], 14 ).data(ar.value).draw(false);
         }
         txt='';
       }
       else{
         $('#Modalko .debug-url').html('A(s) '+arr.length+' despesas(s) com ID: <strong>'+txt+'</strong> não mudou o estado, p.f. verfique e tente novamente.');
         $("#Modalko").modal();
       }
     },
      error:function(){
$('#Modalko .debug-url').html('A(s) '+arr.length+' despesas(s) com ID: <strong>'+txt+'</strong> não mudou o estado, p.f. verifique a ligação Wi-Fi.');
$("#Modalko").modal();
      }
   });
      }
    },
  }
});
}
else{
$('#Modalko .debug-url').html('Não tem despesas para validar!');
$("#Modalko").modal();
}
}

/*APAGAR DESPESAS*/
function confirmDeleteRegistriesReports(id){
table = $('#example').DataTable();
bootbox.dialog({
  message: "Tem a certeza que pretende apagar a despesa #<strong>"+id+"</strong> ?",
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
        dataValue='id='+id+'&action=1';
     $.ajax({
      type: "POST",
      cache:false,
      url: "expensies/action_expensies.php",
      data: dataValue,
      success: function(data){
        if(data == 1){
          table.row("#"+id).remove().draw();
          $('.debug-url').html('A despesa #<strong>'+id+'</strong> foi apagada com sucesso.');
          $("#Modalok").modal();
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
        else{
          $('.debug-url').html('A despesa #<strong>'+id+'</strong> não foi apagada.');
          $("#Modalko").modal();
          setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
        }

      },
      error:function(data){
        $('.debug-url').html('A despesa #'<strong>+id+'</strong> não foi apagada, p.f. verifique a ligação Wi-Fi.');
        $("#Modalko").modal();
      }
   });

      }
    },
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

</script>