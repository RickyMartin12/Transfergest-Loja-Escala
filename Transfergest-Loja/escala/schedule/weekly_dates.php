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
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
header('Location:/'.$_COOKIE['folders'].'/logout.php');
}

?>
