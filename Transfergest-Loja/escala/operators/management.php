<?php
    define('ROOTDIR', dirname(__FILE__));
    date_default_timezone_set('Europe/Lisbon');

    require ROOTDIR . "/session/auth.php";
?>

<!doctype html>
<html lang="pt_PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="o-token" content="<?php echo "6E6xI4riA3." . $idOperador . ".L5J17jMD4w"; ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>


<link rel="stylesheet" type="text/css" href="static/css/main.css">
<link rel="stylesheet" href="static/css/plugins/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap-datetimepicker.min.css">
<link href="static/css/select.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="static/css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="static/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>  

    <title>Gestão</title>

<style>
table .btn-sm{height: 20px; margin:0 5px;}
td{padding: 2px 3px;}
#novo_transfer_form_datetime{background:white;}

@keyframes fade {
    from { opacity: 1.0; }
    50% { opacity: 0.4; }
    to { opacity: 1.0; }
}
 
@-webkit-keyframes fade {
    from { opacity: 1.0; }
    50% { opacity: 0.4; }
    to { opacity: 1.0; }
}
 
.blink {animation:fade 3000ms infinite;    -webkit-animation:fade 3000ms infinite;}
</style>

<body>

<input id="pdftitle" type="hidden">

<?php include 'servicesmodal.php' ?>
<div class="back">
    <div class="load"></div>
</div>

    <?php require ROOTDIR . '/includes/topbar.php';?>
    <div class="container-fluid">
        <div style="padding-top:10px;">
         <?php $menu ='management'; require ROOTDIR . '/includes/navbar.php';?>
          <div>
      <div class="registries-filters">
      <div class="panel">
        <div class="">
          <div class="container-fluid">
            <div class="row">
              <form class='filter-form' id="mysearch">
               <?php require ROOTDIR . '/includes/sharedData.php';?>
               <input type="hidden" name="idop" id='idop' value="<?php echo $idOperador; ?>">
               <input type="hidden" name="nmop" id='nmop' value="<?php echo $nomeOperador; ?>">

               <div class="col-md-4 col-sm-6 col-xs-12 col-lg-3">
                  <div class="input-group w3-margin-bottom" id="data_value">
                    <input type="text" readonly class="form-control" id="data_ini" name="data_ini" placeholder="Dia Inicio">
                    <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 col-lg-3 w3-padding-8">
                  <div class="input-group w3-margin-bottom" id="data_value_fim">
                    <input type="text" readonly class="form-control" id="data_fim" name="data_fim" placeholder="Dia Fim">
                    <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                    <div class="col-md-4 col-sm-12 col-lg-6 col-xs-12 w3-padding-8" style="text-align:right;">
                      <div class="input-group w3-margin-bottom w3-right">
                        <div class="col-xs-6">
                     <button type="button" class="btn btn-default filter-button" onclick="resetTable()">
                      <span class="glyphicon glyphicon-erase"></span> <span class="hidden-xs"> Limpar</span>
                     </button>
                      </div>
                      <div class="col-xs-6">
                     <button type="submit" class="btn btn-info filter-button" >
                      <span class="glyphicon glyphicon-filter"></span> <span class="hidden-xs"> Pesquisar</span>
                     </button>
                     </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="table-responsive hidden">

<table id="example" class="display responsive nowrap table-striped" cellspacing="0" width="100%">
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
      <th>Cob.Operador</th>
      <th>Cob.Motorista</th>
      <th>Cmx.Operador</th>
      <th>Cmx.Staff.</th>
      <th></th>
      <th>Hora Voo</th>
      <th>Mor.Recolha</th>
      <th>Mor.Rec.GPS</th>
      <th>Mor.Entrega</th>
      <th>Mor.Ent.GPS</th>
      <th>Duração</th>
     <th>criado_direto</th>
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
      <th>Cob.Operador</th>
      <th>Cob.Motorista</th>
      <th>Cmx.Operador</th>
      <th>Cmx.Staff.</th>
      <th></th>
      <th>Hora Voo</th>
      <th>Mor.Recolha</th>
      <th>Mor.Rec.GPS</th>
      <th>Mor.Entrega</th>
      <th>Mor.Ent.GPS</th>
      <th>Duração</th>
     <th>criado_direto</th>
    </tr>
  </tfoot>
</table>
</div>

    <!-- Modal 2-->
    <div class="modal fade" id="pdf_modal" tabindex="-1" role="dialog" aria-labelledby="services">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="services__modal__title">Escolha:</h4>
                </div>
                <form class="mypdf" action="../operators/includes/services/requests/json/transfers.php" method="post" target="print_pdf" 
                onsubmit="window.open('about:blank','print_pdf','width=1000,height=800');">
                <div class="modal-body">
                  <label for="sel1">Idioma a emitir o voucher/transfer</label>
                    <select class="form-control" name="lang" id="mylangs">
                     <option selected value="PT">PT</option>
                     <option value="EN">EN</option>
                    </select>
                    <input type="hidden" name="id" id="num">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" onclick="closeModal('pdf_modal')" value="Emitir">
                </div>
               </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="avisos_cliente" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title mensagem_head"></h4>
                    <p class="mensagem_txt"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pdf_modal_send_mail" tabindex="-1" role="dialog" aria-labelledby="services">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Escolha:</h4>
                </div>
                <form id="email_form">
                <div class="modal-body">
                <div class="form-group">
                <input type="hidden" name="id" id="num2">
                <label for="sel1">Idioma para anexar o voucher/transfer a enviar por Email ao cliente</label>
                <select name="lang" class="form-control">
                     <option selected value="PT">PT</option>
                     <option value="EN">EN</option>
                </select>    
                 </div>   
                </div>
                <div class="modal-footer">
                <input type="submit" Value='Enviar Email' id="btn_send" class="btn btn-success">
                </div>
               </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="services__modal" tabindex="-1" role="dialog" aria-labelledby="services">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="services__modal__title"></h4>
                </div>
                <div class="modal-body">
                    <form id="novo_transfer_form" role="form">
                        <?php require ROOTDIR . '/includes/new-transfer/partials/serviceArea.php'; ?>
                        <?php require ROOTDIR . '/includes/new-transfer/partials/clientArea.php'; ?>
                        <?php require ROOTDIR . '/includes/new-transfer/partials/startArea.php'; ?>
                        <?php require ROOTDIR . '/includes/new-transfer/partials/paymentAreaEdit.php'; ?>
                        <input type="hidden" value="<?php echo $idOperador; ?>" id="operador_admin_id" name="operador">
                        <input type="hidden" value="-1" id="service_id">
                       <input type="hidden" value="<?php echo $username2; ?>"  id="username" name="username">

                    </form>
                    <?php require ROOTDIR . '/includes/new-transfer/partials/modalMaps.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="saveEditService($('#novo_transfer_form_datetime').val(),$('#novo_transfer_form_estado-do-pagamento').val(),$('#service_id').val(),$('#operador').val(),$('#username').val())">Guardar</button>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
    
    <input type="hidden" id="operador" value="<?php echo $nomeOperador; ?>">
    <input type="hidden" id="username" value="<?php echo $username; ?>">   
    <input type="hidden" id="old-novo_transfer_form_datetime">
    <input type="hidden" id="old-novo_transfer_form_observacoes">
    <input type="hidden" id="old-novo_transfer_form_forma-de-pagamento">
    <input type="hidden" id="old-novo_transfer_form_estado-do-pagamento">

   <script src="static/js/plugins/jquery-3.1.1.min.js"></script>
   <script src="static/js/plugins/momentjs/moment-with-locales.min.js"></script>
   <script src="static/js/plugins/bootstrap.min.js"></script>
   <script src="static/js/plugins/bootstrap-datetimepicker.min.js"></script>
   <script src="static/js/plugins/jquery.dataTables.min.js"></script>
   <script src="static/js/plugins/dataTables.bootstrap.min.js"></script>
   <script src="static/js/plugins/dataTables.buttons.min.js"></script>
   <script src="static/js/plugins/buttons.print.min.js"></script>
   <script src="static/js/plugins/buttons.colVis.js"></script> 
   <script src="static/js/plugins/buttons.html5.min.js"></script>
   <script src="static/js/plugins/pdfmake.min.js"></script>
   <script src="static/js/plugins/vfs_fonts.js"></script>
   <script src="static/js/plugins/jszip.min.js"></script>

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


function clearTable(){
  $('.table-responsive').addClass('hidden');
  table = $('#example').DataTable();
  table.destroy();
  $('#example').empty().html('<thead><tr><th>Acções/ID</th><th>Refª</th><th>Data</th><th>Hora</th><th>Staff</th><th>Matricula</th><th>Estado</th><th>Serviço</th><th>Voo</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Pais</th><th>Adt</th><th>Chr</th><th>Inf</th><th>Recolha</th><th>Entrega</th><th>P.Referência</th><th>Obs</th><th>Operador</th><th>Ticket</th><th>Cob.Operador</th><th>Cob.Motorista</th><th>Cmx.Opera.</th><th>Cmx.Staff.</th><th></th><th>Hora Voo</th><th>Mor.Recolha</th><th>Mor.Rec.GPS</th><th>Mor.Entrega</th><th>Mor.Ent.GPS</th><th>Duração</th><th>criado_direto</th></tr></thead><tfoot><tr><th>Acções/ID</th><th>Refª</th><th>Data</th><th>Hora</th><th>Staff</th><th>Matricula</th><th>Estado</th><th>Serviço</th><th>Voo</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Pais</th><th>Adt</th><th>Chr</th><th>Inf</th><th>Recolha</th><th>Entrega</th><th>P.Referência</th><th>Obs</th><th>Operador</th><th>Ticket</th><th>Cob.Operador</th><th>Cob.Motorista</th><th>Cmx.Opera.</th><th>Cmx.Staff.</th><th></th><th>Hora Voo</th><th>Mor.Recolha</th><th>Mor.Rec.GPS</th><th>Mor.Entrega</th><th>Mor.Ent.GPS</th><th>Duração</th><th>criado_direto</th></tr></tfoot>');
}

function inputNoDataTable(){
  $("#avisos_cliente").modal();
  $("#avisos_cliente .modal-header").removeClass('w3-pale-green w3-pale-red').addClass('w3-pale-yellow');
  $('.mensagem_head').html('Aviso');
  $('.mensagem_txt').html('Preencha um dos campos para efectuar a pesquisa!');
}

function resetTable(){
  $("#data_ini, #data_fim").val('');
}

function mydunc(){
  var e = document.getElementById("length_Menu");
  var strUser = e.options[e.selectedIndex].value;
}
  
$("#mysearch").submit(function(e){

  e.preventDefault();
  idop = $("#idop").val();
  nmop = $("#nmop").val();
  data_inicio = $("#data_ini").val();
  data_fim = $("#data_fim").val();

  if (!data_inicio && !data_fim  || !idop && !nmop)
  {
  inputNoDataTable();
  }
  else
  {
    $('.back').show();
    clearTable();

    if(data_inicio && data_fim && idop && nmop)
    {
    searchValue('action=1&di='+data_inicio+'&nmop='+nmop+'&idop='+idop+'&df='+data_fim);
    }
    else if(data_inicio && !data_fim && idop && nmop)
    {
      searchValue('action=2&di='+data_inicio+'&nmop='+nmop+'&idop='+idop);          
    }
    else if(!data_inicio && data_fim && idop && nmop)
    {
      searchValue('action=2&di='+data_fim+'&nmop='+nmop+'&idop='+idop);
    }

  }
});

function searchValue(vl){

  $("#example, #example_container2, #example_container, .search").css("display","block");
   table = $('#example').DataTable( {
    dom: "Blfrtip",
    rowId: "id",
    "paging": true,
    "serverside":true,
    "ajax": 
      {
        "url" : "action_datatables.php?"+vl,
        "type": "GET"

/*,
            success: function(data){
                console.log(JSON.stringify(data));
            },*/
      },
      columns: [
        { data: "id", render: function ( data, type, row ) {
          return '<button title="Imprimir Serviço: '+data+'" class="btn-sm btn-close btn btn-default btn-print" style="margin-left: 5px;"><span class="glyphicon glyphicon-print"></span></span></button><button title="Editar Serviço:'+data+'" class="btn-sm btn btn-primary btn-edit"><span class="glyphicon glyphicon-edit"></span> '+data+'</button><button style="margin-left: 5px;" title="Enviar Serviço: '+data+' para cliente" class="btn-sm btn btn-default btn-email"><span class="glyphicon glyphicon-envelope"></span></button>';
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

         { data: "voo_horario", className: "hidden",
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
         { data: "criado_direto" }
       ],
      select: 
        {
          style:    'os',
          selector: 'td:first-child'
        },
 buttons: [
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
              },
       "rowCallback": function(row, data, index){
          if(data['criado_direto'] != '2')
           $(row).find('td:eq(0) button').attr({"disabled":true,"title":"Não permitido"}).removeClass('btn-print btn-edit btn-email');
        },

             "columnDefs": [
               { className:"my_class", "targets": [4] },
               { "orderData":[ 26 ],   "targets": [ 2 ] },
               {
                 "targets": [33,32,31,29,26,25,21,20,19,18,12,11,8,7,5,4],
                 "visible": false,
                 "searchable": false
                }
             ],
              "language": {
                "emptyTable":     "Sem resultados",         
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
                "search" : "Procurar:",
                "lengthMenu": 'Mostrar <select id="length_Menu" style=" height: 36px;" onChange="mydunc()">'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="30">30</option>'+
                '<option value="40">40</option>'+
                '<option value="50">50</option>'+
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


      $('#example tbody').on( 'click', '.btn-edit', function () {
       arr = table.row($(this).parents('tr')).data();
       var operador = $('#operador').val();    
                    
                    $('#service_id').val(arr.id);
                    var servicesModal = $('#services__modal');

                    servicesModal.find('#services__modal__title').html('Serviço - #' + arr.id);

                    //servico
                    var servicoElement = servicesModal.find('#novo_transfer_form_servico');
                    servicoElement.attr("disabled", "disabled").html('<option selected>'+arr.servico+'</option>');  

                    //zona de recolha
                    var zonaDeRecolhaElement = servicesModal.find('#novo_transfer_form_zona-de-recolha');
                    zonaDeRecolhaElement.val(arr.local_recolha);

                    //zona de entrega
                    var zonaDeEntregaElement = servicesModal.find('#novo_transfer_form_zona-de-entrega');
                    zonaDeEntregaElement.val(arr.local_entrega);

                    //Datetime picker
                    var datetimeElement = servicesModal.find('#novo_transfer_form_datetime');
                    if (datetimeElement.is(':disabled')) {
                        datetimeElement.removeAttr("disabled");
                    }
                    datetimeElement.val(moment(arr.hrs * 1000).format('DD/MM/YYYY HH:mm'));

                    //local frequente recolha checkbox
                    servicesModal.find('#novo_transfer_form_local-frequente-recolha').parent().parent().parent().hide();

                    //local frequente entrega
                    servicesModal.find('#novo_transfer_form_local-frequente-entrega').parent().parent().parent().hide();

                    //retorno
                    servicesModal.find('#novo_transfer_form_retorno').parent().parent().parent().hide();

                    //Dados Cliente
                    //email
                    var clienteEmailElement = servicesModal.find('#novo_transfer_form_e-mail');
                    clienteEmailElement.val(arr.email);

                    //nome
                    var clienteNomeElement = servicesModal.find('#novo_transfer_form_nome-cliente');
                    clienteNomeElement.val(arr.nome_cl);

                    //telefone
                    var clienteTelefoneElement = servicesModal.find('#novo_transfer_form_telefone');
                    clienteTelefoneElement.val(arr.telefone);

                    /*quarto
                    var clienteQuartoElement = servicesModal.find('#novo_transfer_form_numero-quarto');
                    clienteQuartoElement.val(data.quarto);*/

                    //pais
                    var clientePaisElement = servicesModal.find('#novo_transfer_form_pais');
                    clientePaisElement.attr("disabled", "disabled").html('<option selected>'+arr.pais+'</option>');  

                    //Dados de Partida
                    //morada de Recolha
                    var moradaRecolhaElement = servicesModal.find('#novo_transfer_form_morada-de-recolha');
                        moradaRecolhaElement.val(arr.morada_recolha);

                    //button recolha GPS
                    var buttonRecolhaGps = servicesModal.find('#novo_transfer_form_group_morada-de-recolha_button-gps');
                        buttonRecolhaGps.hide();

                    //morada de Entrega
                    var moradaEntregaElement = servicesModal.find('#novo_transfer_form_morada-de-entrega');
                        moradaEntregaElement.val(arr.morada_entrega);

                    //button Entrega GPS
                    var buttonEntregaGps = servicesModal.find('#novo_transfer_form_group_morada-de-entrega_button-gps');
                        buttonEntregaGps.hide();

                    //adultos
                    var numeroAdultosElement = servicesModal.find('#novo_transfer_form_adultos');
                        numeroAdultosElement.val(arr.px);

                    //criancas
                    var numeroCriancasElement = servicesModal.find('#novo_transfer_form_criancas');
                        numeroCriancasElement.val(arr.cr);

                    //bebes
                    var numeroBebesElement = servicesModal.find('#novo_transfer_form_bebes');
                        numeroBebesElement.val(arr.bebe);


                    //observacoes
                    var observacoesElement = servicesModal.find('#novo_transfer_form_obserpavacoes');
                        if(observacoesElement.is(':disabled')){
                            observacoesElement.removeAttr('disabled');
                        }
                        observacoesElement.val(arr.obs);


                    //Estado do Pagamento
                    var estadoDoPagamentoElement = $('#novo_transfer_form_estado-do-pagamento');
                    estadoDoPagamentoElement.removeAttr("disabled").html('<option selected>'+arr.estado+'</option><option value="Cancelado">Cancelado</option><option value="Pendente">Pendente</option>'); 
                    servicesModal.modal();
});


$('#example tbody').on( 'click', '.btn-print', function () {
       arr = table.row($(this).parents('tr')).data();
        $("#num").val(arr.id);
        $("#pdf_modal").modal();
});


$('#example tbody').on( 'click', '.btn-email', function () {
       arr = table.row($(this).parents('tr')).data();
        $("#num2").val(arr.id);
        $("#pdf_modal_send_mail").modal();
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

$('.table-responsive').removeClass('hidden'); 

$('.back').fadeOut();
}


$('#email_form').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize();
closeModal('pdf_modal_send_mail');
$('.modal-header').removeClass('w3-pale-green w3-pale-yellow w3-pale-red');
setTimeout(function(){

 $.ajax({ url:'../operators/includes/services/requests/json/mail_transfers.php',
        data:dataValue,
            type:'POST',
            cache:false,
            success:function(data){
              if (data == 1){
              $("#avisos_cliente").modal();
              $("#avisos_cliente .modal-header").removeClass('w3-pale-yellow w3-pale-red').addClass('w3-pale-green');
              $('.mensagem_head').html('Sucesso');
              $('.mensagem_txt').html('O email foi enviado com sucesso.');
              }  
              else{
               $("#avisos_cliente").modal();
               $("#avisos_cliente .modal-header").removeClass('w3-pale-green w3-pale-red').addClass('w3-pale-yellow');
               $('.mensagem_head').html('Aviso');
               $('.mensagem_txt').html('O serviço não tem email atribuido!');
              }
            },
              error:function(){
               $("#avisos_cliente").modal();
               $("#avisos_cliente .modal-header").removeClass('w3-pale-yellow w3-pale-green').addClass('w3-pale-red');
               $('.mensagem_head').html('Aviso');
               $('.mensagem_txt').html('Por favor verifique a ligação Wi-Fi, e tente novamente!');
              } 
    });

  }, 500);
});

    $("#datetimepickerAgendamento").datetimepicker({ignoreReadonly: true,sideBySide: true, useCurrent: true,
    locale: 'pt', widgetPositioning: {vertical: 'bottom'}});

    $("#data_value").datetimepicker({ ignoreReadonly: true, format: 'DD/MM/YYYY', 
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

/*SALVAR ALTERAÇÕES DO SERVIÇO NA BD*/

function saveEditService(dt,st,id,op,usr){
dataValue="action=2&id="+id+"&op="+op+"&dt="+dt+"&st="+st+"&usr="+usr;
$.ajax({ url:'/operators/includes/services/requests/json/update.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){

     if (data == 1) {
      reWriteRowTable(id);
     }
     else if (data == 0){
       $('.cancel-edit').trigger('click');
       $('.debug-url').html('O Registo #<strong>'+id+'</strong> não foi modificado!');
       $("#mensagem_ko").trigger('click');
       setTimeout(function(){  $('#Modalko').modal('hide');}, 2500);
     }
},
    error:function(){
        $('.cancel-edit').trigger('click');
        $('.debug-url').html('O Registo #<strong>'+id+'</strong> não foi modificado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
    }
  });
}

/*ATUALIZA LINHA DOS DADOS ALTERADOS APOS SUCESSO NA BD*/
function reWriteRowTable(vl){
table = $('#example').DataTable();
data = table.row("#"+vl ).data();
myDate=$('#novo_transfer_form_datetime').val().split(" ");
arrDias = myDate[0].split("/");
var newDate=arrDias[1]+"/"+arrDias[0]+"/"+arrDias[2];
x = new Date(newDate).getTime()/1000;
myh=myDate[1].split(":");
h = myh[0]*60*60;
m = myh[1]*60;
t = h+m+x;
alert (x +'-->'+ t);
data['data_servico'] = x;
data['hrs'] = t;
data['estado'] =  $('#novo_transfer_form_estado-do-pagamento').val();
table.row("#"+vl ).data(data).draw(false);
$('#services__modal').modal('hide');
$("#"+vl).addClass('blink').removeClass('selected');
setTimeout(function(){ $("#"+vl).removeClass('blink'); }, 10000);
}

function closeModal(id){setTimeout(function(){ $('#'+id).modal('hide')}, 500);}

</script>

</body>