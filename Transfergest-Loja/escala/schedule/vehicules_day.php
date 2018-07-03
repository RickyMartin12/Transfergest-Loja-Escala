<?php
session_start();

if(isset($_SESSION['name'])){
require '../modals.php';

?>

<html>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
.modal-dialog{z-index:1051;}
.jqx-grid-header {height:31px!important;}
.jqx-top-align {display:none;background:transparent!important;}
#contenttable2scheduler{height:0px!important;}
.jqx-widget-header {text-align:center!important;}
.jqx-scheduler-appointment {color:#333!important;}
.modal-header, .modal-footer {background: #333;}
.modal-header{border-radius: 4px 4px 0px 0px}
.modal-footer{border-radius: 0px 0px 4px 4px}
</style>
<link rel="stylesheet" href="css/jqx.base.css" type="text/css"/>

<div class='default' id="default_schedule">
<div id="scheduler"></div>
</div>

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
    <script type="text/javascript" src="js/jqxwindow.js"></script>
    <script type="text/javascript" src="js/jqxtooltip.js"></script>
    <script type="text/javascript" src="js/globalize.js"></script>
    <script type="text/javascript" src="js/globalize.culture.en-US.js"></script>
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
                    { name: 'service', type: 'string' },
                    { name: 'location', type: 'string' },
                    { name: 'location2', type: 'string' },
                    { name: 'subject', type: 'string' },
                    { name: 'draggable', type: 'boolean' },
                    { name: 'hidden', type: 'boolean' },
                    { name: 'resizable' , type: 'boolean' },
                    { name: 'readOnly' , type: 'boolean' },
                    { name: 'calendar', type: 'string' },
                    { name: 'start', type: 'date' },
                    { name: 'end', type: 'date' },
                    { name: 'background', type: 'string'},
                    { name: 'borderColor', type: 'string'}
                ],
                id: 'id',
                url: 'viaturas_data.php'    
            };

            var adapter = new $.jqx.dataAdapter(source);
            $("#scheduler").jqxScheduler({
                date: new $.jqx.date(today),
                toolBarRangeFormat: 'dd/MM/yyyy',
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
                    fields.description.next().fadeIn();
                    fields.descriptionLabel.hide();
                    fields.description.hide();
                    fields.resourceLabel.html("Matricula");
                    fields.deleteButton.remove();
                },
                ready: function () {
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
                    service: "service",
                    location: "location",
                    location2: "location2",
                    subject: "subject",
                    resourceId: "calendar",
                    draggable: "draggable",
                    hidden: "hidden",
                    resizable: "resizable",
                    background: "background",
                    borderColor: "borderColor"
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
                ]

            });

                $("#scheduler").on('appointmentChange', function (event) {
                var args = event.args;
                var appointment = args.appointment;
                dataValue="viatura="+appointment.resourceId+"&id="+appointment.id+"&action=18";
                $.ajax({ url:'upd_schedules.php',
                data:dataValue,
                type:'POST', 
                success:function(data){
                 if (data == 0){
                  $('.debug-url').html('Erro, ao atribuir a viatura ao Transfer <b>#'+appointment.id+'</b>!<br>A página vai ser reiniciada dentro de 3 segundos.');
                  $("#Modalko").modal();
                 setTimeout(function(){ window.open("/administration/schedule/vehicules_day.php",'_self');}, 2500);
              } 
               },
                error:function(){
                 $('.debug-url').html('Erro, ao atribuir a viatura para o Transfers <b>#'+appointment.id+'</b>, p.f. verifique a Acesso Internet<br>A página vai ser reiniciada dentro de 3 segundos.');
                 $("#Modalko").modal();
setTimeout(function(){ window.open("/administration/schedule/vehicules_day.php",'_self');}, 2500);
                }
              });
            });
        });

    </script>
</html>


<?php
} 
else {

header('Location:/'.$_COOKIE['folders'].'/logout.php');

}

?>
