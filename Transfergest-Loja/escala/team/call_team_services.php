<link href="dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="dataTables/css/select.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="dataTables/css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="dataTables/css/mytables.css" rel="stylesheet" type="text/css"/>
<style>
.dataTables_info,.hh, .day_more,.payments{display:none;}
.linetr{text-decoration: line-through;}

</style>

<form class="getcmxstaff">
  <div class=" my-orange panel panel-default no-print">
    <div class="panel-heading my-orange">
      <div class='row'>
        <div class="col-md-4">
          <h3 class="panel-title" style="color:#000!important;">
           <i class="fa fa-university"></i> Cobranças
          </h3>
        </div>
        <div class="col-md-8" style="text-align: right;">
          <button type="submit" class="btn btn-info btn-stp" title="Pesquisar"><span class="glyphicon glyphicon-filter"></span><span class="hidden-xs"> Pesquisar</span></button>
          <button type="reset" class="btn btn-default btn-clear" title="Limpar"><i class="fa fa-eraser"></i><span class="hidden-xs"> Limpar</span></button>
          <a href="#" class="received btn btn-success disabled" title="Validar cobrar direto dos serviços como valor Recebido do Staff, no campo Cobrar Direto "><span class="glyphicon glyphicon-eur"></span><span class="hidden-xs"> Validar</span></a>
        </div>
      </div>
      <div class='search_results'>
        <div class="form-group">
          <h3 style="text-align:center; font-size:21px;">
            <span class="label label-default" id='nr_resultados' style="padding: 10px;"></span>
          </h3>
        </div>
      </div>
      <div class='searchprint'></div>
      <div class='row nosearchprint no-print'>
        <div class='col-sm-4 col-xs-12 staff_date'>
          <div class="form-group input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <select type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Nome Staff">
            </select>
          </div>
        </div>
        <div class='col-sm-4 col-xs-12'>
          <div class="form-group input-group" id="datetimepicker6">
            <input type="text" readonly class="form-control" id="date_ini" name="date_ini" placeholder="Dia Inicio">
            <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
        <div class='col-sm-4 col-xs-12'>
          <div class="form-group input-group" id="datetimepicker7">
            <input type="text" readonly class="form-control" id="date_fim" name="date_fim" placeholder="Dia Fim">
            <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>ID1</th>
      <th>Refª2</th>
      <th>Data3</th>
      <th>Hora4</th>
      <th>Staff5</th>
      <th>Matricula6</th>
      <th>Estado7</th>
      <th>Serviço8</th>
      <th>Voo9</th>
      <th>Nome10</th>
      <th>Email11</th>
      <th>Telefone12</th>
      <th>Pais13</th>
      <th>Adt14</th>
      <th>Chr15</th>
      <th>Inf16</th>
      <th>Recolha17</th>
      <th>Entrega18</th>
      <th>P.Referência19</th>
      <th>Obs20</th>
      <th>Operador21</th>
      <th>Ticket22</th>
      <th>Cob.Opera.23</th>
      <th>Cmx.Staff24</th>
      <th>Cmx.Opera.25</th>
      <th>Cob.Direto26</th>
      <th>27</th>
      <th>Hora Voo28</th>
      <th>Mor.Recolha29</th>
      <th>Mor.Rec.GPS30</th>
      <th>Mor.Entrega31</th>
      <th>Mor.Ent.GPS32</th>
      <th>Duração33</th>
      <th>Gerado34</th>
      <th>Total Pax35</th>
      <th>36</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>ID</th>
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
      <th>Cmx.Staff.</th>
      <th>Cmx.Opera.</th>
      <th>Cob.Direto</th>
      <th></th>
      <th>Hora Voo</th>
      <th>Mor.Recolha</th>
      <th>Mor.Rec.GPS</th>
      <th>Mor.Entrega</th>
      <th>Mor.Ent.GPS</th>
      <th>Duração</th>
      <th>Gerado</th>
      <th>Total Pax</th>
      <th></th>
     </tr>
  </tfoot>
</table>

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
<script src="dataTables/js/dataTables.fixedHeader.min.js"></script>

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
var vencimento = 0;
title='';
file_name='';
$("#example, .search").css("display","none");

function clearTable(){
  table = $('#example').DataTable();
  table.destroy();

  $('#example').empty().html('<thead><tr><th>ID</th><th>Refª</th><th>Data</th><th>Hora</th><th>Staff</th><th>Matricula</th><th>Estado</th><th>Serviço</th><th>Voo</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Pais</th><th>Adt</th><th>Chr</th><th>Inf</th><th>Recolha</th><th>Entrega</th><th>P.Referência</th><th>Obs</th><th>Operador</th><th>Ticket</th><th>Cob.Opera.</th><th>Cmx.Staff</th><th>Cmx.Opera.</th><th>Cob.Diret.</th><th></th><th>Hora Voo</th><th>Mor.Recolha</th><th>Mor.Rec.GPS</th><th>Mor.Entrega</th><th>Mor.Ent.GPS</th><th>Duração</th><th>Gerado</th><th>Total Pax</th><th></th></tr></thead><tfoot><tr><th>ID</th><th>Refª</th><th>Data</th><th>Hora</th><th>Staff</th><th>Matricula</th><th>Estado</th><th>Serviço</th><th>Voo</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Pais</th><th>Adt</th><th>Chr</th><th>Inf</th><th>Recolha</th><th>Entrega</th><th>P.Referência</th><th>Obs</th><th>Operador</th><th>Ticket</th><th>Cob.Opera.</th><th>Cmx.Staff.</th><th>Cmx.Opera.</th><th>Cob.Diret.</th><th></th><th>Hora Voo</th><th>Mor.Recolha</th><th>Mor.Rec.GPS</th><th>Mor.Entrega</th><th>Mor.Ent.GPS</th><th>Duração</th><th>Gerado</th><th>Total Pax</th><th></th></tr></tfoot>');
  $("#example_container").css('display','none');
}

function inputNoDataTable(){
  $('.received').addClass('disabled');
  $('.cmx_calc').addClass('hidden');
  $('#Modalko .debug-url').html('Preencha um dos campos para efectuar a pesquisa!');
  $("#Modalko").modal();
  $('.back').fadeOut();
  $('.row .search, #example_wrapper, #example, .search_results').hide();  
}

function mydunc(){
  var e = document.getElementById("length_Menu");
  var strUser = e.options[e.selectedIndex].value;
}
 

$('.getcmxstaff').on('submit',function(e){
  e.preventDefault();
  clearTable();

  df = $('#date_fim').val();
  di = $('#date_ini').val();
  st = $('#staff_name').val();

  if (!df && !di && !st){ 
      inputNoDataTable();
  }
  else {
 $('.back').show();
    $('.row .search, #example_wrapper, #example, .search_results').show();
     if(st && di=='' && df==''){
       dt ='action=0&st='+st;
       $('.cmx_calc').removeClass('hidden');
       }

     else if (st=='' && di && !df || st=='' && df && !di){
       di ? di : di = df;
       dt ='action=1&di='+ di;
       $('.cmx_calc').addClass('hidden');
       }

     else if (st=='' && di && df){
       dt ='action=2&di='+ di +'&df='+df;
        $('.cmx_calc').addClass('hidden');
     }
     else if(st && !di || st && !df){
       di ? di : di = df;
       dt ='action=3&st='+st+'&di='+di;
        $('.cmx_calc').removeClass('hidden');
     }
     else if (st && di && df){
        $('.cmx_calc').removeClass('hidden');
       dt ='action=4&di='+ di +'&df='+df+'&st='+st;
      }
      searchValue(dt);
  }
});

function searchValue(vl){
  $("#example, #example_container2, #example_container, .search").css("display","block");
   x='';
   table = $('#example').DataTable( {
   "paging": false,
    dom: "Blfrtip",
    fixedHeader: true,
    rowId: "id",
    "serverside":true,
    "drawCallback": function( settings ) {
        setTimeout(function(){
          $('.search_results').show();
          info = table.page.info();
          $('#nr_resultados').html("<span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: <span class='results_t'>"+info.recordsTotal+ "</span>");
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
        "url" : "team/action_datatables_cmx_staff.php?"+vl,
        "type": "GET"


/*
,
            success: function(data){
                console.log(JSON.stringify(data));
            },
*/

      },
      columns: [
/*1*/
        { data: "id", render: function ( data, type, row ) {
          return '<button title="Validar Cobrar Direto #'+data+'" class="btn-sm btn-validate btn btn-warning" style="margin-left: 5px;">&nbsp;<i class="fa fa-eur"></i>&nbsp; </span></button><button title="Ver todos os detalhes do Serviço #'+data+'" class="btn-sm btn btn-expand btn-info"><i class="fa fa-exclamation-circle"></i> '+data+'</button>';
          }
},
/*2*/
        { data: "referencia" },
        { data: "data_servico" , render: function ( data, type, row ) {
          myDate = new Date(data*1000);
          a = myDate.toLocaleDateString();
          return a;
          }
        },
/*3*/
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
/*4*/
        { data: "staff" },
        { data: "matricula", render: function ( data, type, row ) {
          matr = data.substring(0, 2)+"-"+data.substring(2, 4)+"-"+data.substring(4, 6);
          !data ? matr='-/-' : false;
          return matr;
          }
        },
/*5*/
        { data: "estado" },
/*6*/
        { data: "servico" },
/*7*/
        { data: "voo" },
/*8*/
        { data: "nome_cl" },
/*9*/
        { data: "email" },
/*10*/
        { data: "telefone" },
/*11*/
        { data: "pais" },
/*12*/
        { data: "px" },
/*13*/
        { data: "cr" },
/*14*/
        { data: "bebe" },
/*15*/
        { data: "local_recolha" },
/*16*/
        { data: "local_entrega" },
/*17*/
        { data: "ponto_referencia" },
/*18*/
        { data: "obs" },
/*19*/
        { data: "operador" },
/*20*/
        { data: "ticket" },
/*21*/
        { data: "cobrar_operador", className: "number-right",
           render: function ( data, type, row ) {
             cob = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? cob='-/-' : false;
             return cob;
            }
        },
/*22*/
        { data: "cmx_st", className:"number-right",
             render: function ( data, type, row ) {
             cob = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? cob='-/-' : false;
             return cob;
            }
         },
/*23*/
        { data: "cmx_op", className: "number-right",
             render: function ( data, type, row ) {
             cob = parseFloat(data).toFixed(2)+'€';
             !data || data == 0 ? cob='-/-' : false;
             return cob;
            }
        },
/*24*/
        { data: "cobrar_direto", className: "number-right",
            render: function ( data, type, row ) {
              cob = parseFloat(data).toFixed(2)+'€';
              !data || data == 0 ? cob='-/-' : false;
              return cob;
            }
        },
/*25*/
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
         { data: "morada_recolha_gps" },
         { data: "morada_entrega" },
         { data: "morada_entrega_gps" },
         { data: "end",
           render:function (data, type, row){
            return formatSeconds(data);
           }
         },
         {data: "created_by" },
         {data: "totalpax", className:"number-center"},
         {data: "rec_staf", className:"hidden payok"}
        ],
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
            columns: ':not(:nth-child(6),:nth-child(7),:nth-child(9),:nth-child(10),:nth-child(11),:nth-child(12),:nth-child(13),:nth-child(14),:nth-child(15),:nth-child(16),:nth-child(19),:nth-child(20),:nth-child(21),:nth-child(24),:nth-child(25),:nth-child(27),:nth-child(28),:nth-child(29),:nth-child(30),:nth-child(31),:nth-child(32),:nth-child(33),:nth-child(34),:nth-child(36))'
          },
          {
            extend: 'print', 
            text: '<i class="fa fa-print"></i>',
            titleAttr: 'Imprimir',
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            footer: true
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Excel',
            key: {key: 't', altkey: true},
            exportOptions: { orthogonal: 'export', columns: ':visible' },
            action:function(e,dt,button,config){
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff:'+$("#staff_name").val();}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'de_'+$('#date_ini').val()+'_';
                 title_3 = 'De: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+'_';
                title_4 = 'De: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};
             
              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}
              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;
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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;
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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.pagesize = $('#pagesize').val();
              config.orientation = $('#orientation').val();
              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;
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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.pagesize = $('#pagesize').val();
              config.orientation = $('#orientation').val();
              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;
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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;
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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;

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
              if($("#staff_name").val()){
                 file_1 ='staff_'+$("#staff_name").val()+'_';
                 title_1= 'Staff: '+$("#staff_name").val()+' ';}
              else {file_1='';title_1 ='';};

              if($("#date_ini").val()){
                 file_3 = 'data_'+$('#date_ini').val()+'_';
                 title_3 = 'Data: '+$('#date_ini').val();}
              else{title_3='';file_3 ='';}

              if($("#date_fim").val()){
                file_4 = 'a_'+$('#date_fim').val()+' ';
                title_4 = 'a: '+$('#date_fim').val();}
              else{
                file_4='';title_4='';}

              config.filename ='cobrar_direto_staff_'+file_1+''+file_3+''+file_4;
              config.title ='Cobrar Direto Staff: '+title_1+''+title_3+''+title_4;
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
                .column( 34 )
                .data()
                .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
                }, 0 );
                pageTotal = api
                    .column( 34, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

              $( api.column( 34 ).footer() ).html(pageTotal.toString());    

                total = api
                .column( 22 )
                .data()
                .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
                }, 0 );
                pageTotal = api
                    .column( 22, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

              $( api.column( 22 ).footer() ).html('<span class="total_cmx">'+parseFloat(pageTotal.toString()).toFixed(2)+'</span>€<br/>');                       
            

                total = api
                .column( 25 )
                .data()
                .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
                }, 0 );
                pageTotal = api
                    .column( 25, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

              $( api.column( 25 ).footer() ).html('<span class="total_cmx">'+parseFloat(pageTotal.toString()).toFixed(2)+'</span>€<br/>');                       
            
            },

    "rowCallback": function(row, data, index){
        
       if (data['rec_staf'] =='Sim')

        $(row).find('td:eq(0) .btn-validate').addClass('btn-success').removeClass('btn-warning').attr('title','Remover Validação Cobrar Direto #' +data['id']);
if (data['rec_staf'] !='Sim')
 $(row).find('td:eq(0) .btn-validate').removeClass('btn-success').addClass('btn-warning').attr('title','Validação Cobrar Direto #' +data['id']);

     },

                "createdRow": function ( row, data, index ) {
                $(row).attr('id', data[0]);
              },

             "columnDefs": [
               { className:"my_class", "targets": [4] },
               { "orderData":[ 25 ],   "targets": [ 2 ] },
               {

                  "targets": [5,6,8,9,10,11,12,13,14,15,18,19,23,24,26,27,28,29,30,31,32,33],
                   "visible": false,
                 "searchable": false,
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
                '<option value="-1">Todos</option>'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="40">40</option>'+
                '</select>'
              },
              "destroy": true
            });

            table.ajax.reload();
            table.order( [ 26, 'asc' ] ).draw();
            $('.tableSearch').on( 'keyup', function () {
              table.search( this.value ).draw();
              
            });

            $('#example tbody').on( 'click', '.btn-expand', function () {
               arr = table.row($(this).parents('tr')).data();
               $('.servico_id').html(arr.id);
               triggerEditFields(arr);

});



$('.btn-clear').click(function(){
  $('.received').addClass('disabled');
  $('#staff_name').val('').change();
  $('.cmx_calc').addClass('hidden');
  $('.row .search, #example_wrapper, #example, .search_results').hide();  
});


/*VALIDAÇÃO DE 1 SERVICO*/
$('#example tbody').on( 'click', '.btn-warning', function () {
   arr = table.row($(this).parents('tr')).data(); 
   idarr=[];
   idarr.push(arr.id);
   ServicesPayment(idarr,arr.cobrar_direto,1);
});


/*REMOVER VALIDAÇÃO DE 1 SERVICO*/
$('#example tbody').on( 'click', '.btn-success', function () {
   arr = table.row($(this).parents('tr')).data(); 
   idarr=[];
   idarr.push(arr.id);
   ServicesPayment(idarr,arr.cobrar_direto,0);
});



$('#example tbody').on( 'click', 'tr', function () {
$(this).toggleClass('selected');
});

$('#example_filter').addClass('w3-col l8 m12 s12 w3-padding-8').removeClass('dataTables_filter');
$('div.dt-buttons').addClass('w3-col l4 m12 s12 w3-padding-8');
$('#example_filter input').attr('placeholder',' Filtrar EX:(Para ver se Validados insira: sim ou não)');

$('#example_wrapper').on( 'click', '.buttons-totals', function () {
$('.no-pdf').empty();
});


$('#example_wrapper').on( 'click', '.buttons-pdf-format', function () {
$('#pdf_conf').modal();
});


$('.back').fadeOut();

}

/*REMOVER VALIDAR TODOS SERVIÇOS ESTADO NÃO*/
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

function triggerEditFields(arr){
       $('#regcol_1').val(moment(arr.data_servico*1000).format("DD/MM/YYYY"));
       $('#regcol_3').val(moment(arr.hrs*1000).format("H:mm"));  
       $("#regcol_179").val(arr.referencia);
       $("#regcol_14").val(arr.ticket);
       $("#regcol_5").val(arr.voo);
       arr.voo_horario && arr.voo_horario !=0 ? arr.voo_horario = moment(arr.voo_horario*1000).format("DD/MM/YYYY HH:mm") : arr.voo_horario ='';
       $("#regcol_25").val(arr.voo_horario);
       $("#regcol_6").val(arr.nome_cl);
       $("#regcol_180").val(arr.email);
       $("#regcol_181").val(arr.telefone);
       $("#regcol_182").val(arr.pais);
       $("#regcol_7").val(arr.local_recolha);
       $("#regcol_20").val(arr.morada_recolha);
       $("#regcol_21").val(arr.morada_recolha_gps);
       $("#regcol_8").val(arr.local_entrega);
       $("#regcol_22").val(arr.morada_entrega);
       $("#regcol_23").val(arr.morada_entrega_gps);
       $("#regcol_10").val(arr.px);
       $("#regcol_11").val(arr.cr);
       $("#regcol_12").val(arr.bebe);
       $("#regcol_13").val(arr.obs);
       $("#regcol_15").val(arr.cobrar_operador);
       $("#regcol_16").val(arr.cobrar_direto);
       $("#regcol_77").val(arr.cmx_op);
       $("#regcol_78").val(arr.cmx_st);
       $("#duracao").val(formatSeconds(arr.end));
       $('#regcol_7').val(arr.local_recolha);
       $('#regcol_8').val(arr.local_entrega);
       $('#regcol_4').val(arr.servico);
       $('#regcol_88').val(arr.operador);
       $('#regcol_99').val(arr.staff);
       matr = arr.matricula.substring(0, 2)+"-"+arr.matricula.substring(2, 4)+"-"+arr.matricula.substring(4, 6);
       $('#regcol_87').val(matr);
       $('#regcol_9').val(arr.ponto_referencia);
       $('#regcol_17').val(arr.estado);
       $("#edit-servicies").modal();
} 

  $('#datetimepicker6').datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', locale: 'pt'});    
  
  $('#datetimepicker7').datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY HH:mm', locale: 'pt', useCurrent: false});
  
  $("#datetimepicker6").on("dp.change", function (e) {$('#datetimepicker7').data("DateTimePicker").minDate(e.date);});
  
  $("#datetimepicker7").on("dp.change", function (e) {$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);});
    
  $('.datetimepicker_se').datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', locale: 'pt'});

  arr = JSON.parse(localStorage.getItem("staff"));
  opt='<option selected value="">Staff</option>';
  for (i=0;i<arr.length;i++){
    opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
  }

$('#staff_name').html(opt).select2();

/*

function showAllCmx(dia){
if(!$('.closeservices-'+dia+'.show_days').hasClass('is-open')){
$('tr.closeservices-'+dia+'.show_days').addClass('is-open');
$('tr.closeservices-'+dia+'.day_more').fadeIn();
$('.simbolo-'+dia).removeClass('glyphicon-plus-sign').addClass('glyphicon-minus-sign').attr('title','Minimizar');
}
else{
$('tr.closeservices-'+dia+'.show_days').removeClass('is-open');
$('tr.closeservices-'+dia+'.day_more').fadeOut();
$('.simbolo-'+dia).removeClass('glyphicon-minus-sign').addClass('glyphicon-plus-sign').attr('title','Maximizar');
}
}

*/

function ServicesPayment(arr,vl,tp){

/*
vl = valor total das cmx staff 
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
  message: "Tem a certeza que pretende <b>"+isvalid+"</b>, "+arr.length+" serviço(s) com ID: <strong>"+txt+"</strong> no Campo Cobrar Direto?<br>O valor total é de: "+vl+"</strong>",
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
      url:'team/action_close_cob_dir.php',
      data: {data : dataValue, action: tp}, 
      type:'POST',
      cache:false,
      success: function(data){
      ar =[];
      ar = JSON.parse(data);
       if(!ar.success.match(/0/g)){  
         $('.debug-url').html('O(s) '+arr.length+' serviço(s) com ID: <strong>'+txt+'</strong> para estado: '+isvalid+', no campo Cobrar Direto.');
         $("#Modalok").modal();
         $('.received').addClass('disabled');
         txt='';
         setTimeout(function(){$("#Modalok").modal('hide');}, 2500);
         table = $('#example').DataTable(); 
         for(i=0;i<arr.length; ++i){
          txt += arr[i]+', ';
         table.cell( "#"+arr[i], 35 ).data(ar.value).draw(false);
         }
         txt='';
       }
       else{
         $('#Modalko .debug-url').html('O(s) '+arr.length+' serviço(s) com ID: <strong>'+txt+'</strong> não mudou o estado, p.f. verfique e tente novamente.');
         $("#Modalko").modal();
       }
     },
      error:function(){
$('#Modalko .debug-url').html('O(s) '+arr.length+' serviço(s) com ID: <strong>'+txt+'</strong> não mudou o estado, p.f. verifique a ligação Wi-Fi.');
$("#Modalko").modal();
      }
   });
      }
    },
  }
});
}
else{
$('#Modalko .debug-url').html('Não tem Valores Cobrar Direto para validar!');
$("#Modalko").modal();
}
}

</script>