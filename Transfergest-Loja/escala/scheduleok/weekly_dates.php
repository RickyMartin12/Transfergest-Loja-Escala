<?php
session_start();
if(isset($_SESSION['name'])){
?>


<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<style>

.modal-dialog{
z-index:1051;}

.jqx-top-align {
height:30px!important;
}

#contenttable2scheduler{
height:30px!important;
}


.jqx-scheduler-appointment{
font-size:11px;
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
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
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
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

        var staff = [];
        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        var m=today.getMonth();
        if(dd<10) dd='0'+dd; 
        if(mm<10) mm='0'+mm;
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
                    { name: 'resizable' , type: 'boolean' },
                    { name: 'readOnly' , type: 'boolean' },
                    { name: 'calendar', type: 'string' },
                    { name: 'start', type: 'date' },
                    { name: 'end', type: 'date' }
                ],
                id: 'id',
                url: 'datasemana.php'
            };

            var adapter = new $.jqx.dataAdapter(source);
            $("#scheduler").jqxScheduler({
                toolBarRangeFormat: 'dd/MM/yyyy',
                date: new $.jqx.date(today),
                width:'100%',
                height: '100%',
                source: adapter,
                showLegend:true,
                ready: function () {
                 },
                resources:
                {
                    colorScheme: "scheme04",
                    dataField: "calendar",
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
                    readOnly : "readOnly",
                    resizable: "resizable"
                },



 views:
                [
 { type: 'weekView', showWorkTime: false,timeRuler: { formatString: 'HH:mm' }}
                ]
            });

$("#scheduler").jqxScheduler({ editDialog: false});

});




    </script>
</html>


<?php
} 
else {
header('Location:../logout.php');
}

?>
