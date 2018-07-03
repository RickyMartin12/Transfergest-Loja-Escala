<?php
session_start();
if(isset($_SESSION['name'])){
?>


<html>

<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<style>

.modal-dialog{
z-index:1051;}


.jqx-grid-header {
height:31px!important;}

.jqx-top-align {
display:none;
background:transparent!important;
}

#contenttable2scheduler{
height:0px!important;
}

.jqx-scheduler-appointment{
font-size:10px!important;
color:#333!important;
}


</style>
    <link rel="stylesheet" href="css/jqx.base.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">

<input type="hidden" id="mensagem_ok" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalok">
<div id="Modalok" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#5cb85c;"> <span class='glyphicon glyphicon-ok'></span> Sucesso</h4>
      </div>
      <div class="modal-body">
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="mensagem_ko" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalko">
<div id="Modalko" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#d9534f;"><span class='glyphicon glyphicon-warning-sign'></span> Aviso</h4>
      </div>
      <div class="modal-body">
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class='default' id="default_schedule">
<div id="scheduler"></div>
</div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqxbuttons.js"></script>
    <script type="text/javascript" src="js/jqxscrollbar.js"></script>
    <script type="text/javascript" src="js/jqxdata.js"></script>
    <script type="text/javascript" src="js/jqxdate.js"></script>
    <script type="text/javascript" src="js/jqxscheduler.js"></script>
    <script type="text/javascript" src="js/jqxscheduler.api.js"></script>
    <script type="text/javascript" src="js/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="js/jqxmenu.js"></script>
    <script type="text/javascript" src="js/jqxcalendar.js"></script>
    <script type="text/javascript" src="js/jqxtooltip.js"></script>
    <script type="text/javascript" src="js/jqxwindow.js"></script>
    <script type="text/javascript" src="js/jqxcheckbox.js"></script>
    <script type="text/javascript" src="js/jqxlistbox.js"></script>
    <script type="text/javascript" src="js/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="js/jqxnumberinput.js"></script>
    <script type="text/javascript" src="js/jqxradiobutton.js"></script>
    <script type="text/javascript" src="js/jqxinput.js"></script>
    <script type="text/javascript" src="js/globalize.js"></script>
    <script type="text/javascript" src="js/globalize.culture.en-US.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

        var staff = [];
        var today = new Date();

       x= Math.round(new Date().getTime()/1000);
       y = parseInt(x)+86400;
       d = new Date(y*1000);
       todate=new Date(d).getDate();
       tomonth=new Date(d).getMonth()+1;
       toyear=new Date(d).getFullYear();
       todate < 9 ? todate = '0'+todate: todate=todate;
       tomonth < 9 ? tomonth = '0'+tomonth: tomonth=tomonth; 
       tomorrow = todate+'/'+tomonth+'/'+toyear;

        var source =
            {
                dataType: 'json',
                dataFields: [
                    { name: 'id', type: 'string' },
                    { name: 'description', type: 'string' },
                    { name: 'location', type: 'string' },
                    { name: 'subject', type: 'string' },
                    { name: 'draggable', type: 'boolean' },
                    { name: 'hidden', type: 'boolean' },
                   // { name: 'resizable' , type: 'boolean' },
                    { name: 'readOnly' , type: 'boolean' },
                    { name: 'calendar', type: 'string' },
                    { name: 'start', type: 'date' },
                    { name: 'end', type: 'date' },
                    { name: 'background', type: 'string' }
                ],
                id: 'id',
                url: 'data.php',

                beforeprocessing: function (data) {
  
                $(".jqx-scheduler-appointment").css('background','#F00').draggable({axis: "x"});

           }      
   
            };

            var adapter = new $.jqx.dataAdapter(source);
            $("#scheduler").jqxScheduler({
                toolBarRangeFormat: 'dd/MM/yyyy',
                date: new $.jqx.date(today),
                width:'100%',
                height: '100%',
                source: adapter,
                showLegend: false,
                    editDialogCreate: function (dialog, fields, editAppointment) {
                    fields.repeatContainer.hide();
                    fields.statusContainer.hide();
                    fields.timeZoneContainer.hide();
                    fields.allDayLabel.hide();
                    fields.allDay.hide();
                    fields.colorContainer.hide();
                    fields.subjectLabel.hide()
                    fields.subject.hide()
                    fields.from.hide();
                    fields.fromLabel.hide();
                    fields.locationLabel.hide();
                    fields.location.hide();
                    fields.toLabel.hide();
                    fields.to.hide();
                    fields.repeatLabel.hide();
                    fields.repeat.hide();
                    fields.descriptionLabel.hide();
                    fields.description.hide();
                    fields.resourceLabel.html("Staff");
                    fields.deleteButton.remove();
                },
                ready: function () {

$(".jqx-grid-columngroup-header").each(function( index ){
if ($(this).text() != 'Atribuir'){
nm ="'"+$(this).text()+"'";
$(this).prepend('<button style="float:right; margin: 3px 3px 0px 0px;" title="Enviar escala do dia para '+$(this).text()+'" class="btn btn-sm btn-default bt-'+$(this).text()+'" onclick="SendServiceSchedule('+nm+')"><span class="glyphicon glyphicon-envelope"></span></button>');

}
});

$(".jqx-scheduler-appointment").draggable({axis: "x"});

                 },
                 legendHeight: 30,
                 rowsHeight: 17,
                resources:
                {
                    colorScheme: "",
                    dataField: "calendar",
                    orientation: "horizontal",
                    source:  new $.jqx.dataAdapter(source)
                },
                appointmentDataFields:
                {
                    from: "start",
                    to: "end",
                    id: "id",
                    description: "description",
                    location: "location",
                    subject: "subject",
                    resourceId: "calendar",
                    draggable: "draggable",
                    hidden: "hidden",
                    //resizable: "resizable",
                    background: "background"
                },
                view: 'dayView',
                views:
                [
                 { 
                  type: 'dayView', 
                  appointmentHeight: 20,
                  showWorkTime: false,                  
                  timeRuler: {
                   scale: 'quarterHour',
                   scaleStartHour: 0,
		   scaleEndHour: 24,
                   formatString: 'HH:mm' 
                   }
                  },
/*
                    { type: 'timelineDayView', appointmentsRenderMode: "exactTime", showWorkTime: false, 
                             timeRuler: { scale: 'thirtyMinutes', formatString: 'HH:mm' }
                    },
                    { type: 'weekView', showWorkTime: false, appointmentHeight: 50, timeRuler: { scale: 'halfHour', formatString: 'HH:mm' }}*/
                ]
            });

                $("#scheduler").on('appointmentChange', function (event) {
                var args = event.args;
                var appointment = args.appointment;
                dataValue="staff="+appointment.resourceId+"&id="+appointment.id+"&action=17";
                $.ajax({ url:'upd_schedules.php',
                data:dataValue,
                type:'POST', 
                success:function(data){

$(".jqx-scheduler-appointment").draggable({axis: "x"});

                 if (data == 0){
                  $('.debug-url').html('Erro, ao atribuir o Staff ao Transfer <b>#'+appointment.id+'</b>!<br><a class="btn btn-warning" href="index.html">Atualizar</a>');
                  $("#mensagem_ko").trigger('click');
              }   
                },
                error:function(){
                 $('.debug-url').html('Erro, ao atribuir o Staff para o Transfers <b>#'+appointment.id+'</b>, p.f. verifique a Acesso Internet');
                 $("#mensagem_ko").trigger('click');
                }
              });
            });   
        });


function SendServiceSchedule(id){
date = $(".jqx-scheduler-toolbar-details").text();

if (!id || !date){
$('.debug-url').html('Não foi possivel enviar email para elemento do staff: <b>'+id+'</b>, p.f verifique os dados inseridos no link: "Configuracoes -> Sistema".');
$("#mensagem_ko").trigger('click');
}


setTimeout(function(){
 dataValue="data="+date+"&id="+id+"&action=1";

  $.ajax({ url:'../mail_notifica.php',
    data:dataValue,
    type:'POST', 
     success:function(data){
console.log(data);
       if (data == 0){
        $('.debug-url').html('Não foi possivel enviar email para elemento do staff: <b>'+id+'</b>, p.f verifique os dados inseridos no link: "Configuracoes -> Sistema".');
        $("#mensagem_ko").trigger('click');
       }
      else if (data == 10 ){
        $('.debug-url').html('Não foi possivel enviar email para elemento do staff: <b>'+id+'</b>, p.f verifique os dados inseridos no link: "Staff -> Editar".');
        $("#mensagem_ko").trigger('click');
       }
  else if (data == 110){
        $('.debug-url').html('Não foi possivel enviar email, o elemento do staff: <b>'+id+'</b> sem serviços atribuidos. p.f. atribua servicos.');
        $("#mensagem_ko").trigger('click');
       }
   else if (data == 1111){
        $('.debug-url').html('Os Servicos foram enviados com sucesso, para o elemento do staff: <b>'+id+'</b>.');
        $('.bt-'+id).addClass('btn-success');
        $("#mensagem_ok").trigger('click');
       }

   else {
        $('.debug-url').html('Erro, não definido!!');
        $("#mensagem_ko").trigger('click');
       }
    },
    error:function(data){
     $('.debug-url').html('Erro ao enviar dados para o elemento do staff: <b>'+id+'</b>, p.f. verifique o Acesso Internet.');
     $("#mensagem_ko").trigger('click');
    }
  });

}, 500);
}

</script>
</html>

<?php
} 
else {
header('Location:../logout.php');
}

?>
