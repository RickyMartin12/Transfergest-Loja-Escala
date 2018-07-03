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
    <meta name="o-token" content="<?php echo "6E6xI4riA3." . $operador_id. ".L5J17jMD4w"; ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->



    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/select2.min.css">
    <link rel="stylesheet" href="static/css/jquery-ui.css"> 
    <link rel="stylesheet" type="text/css" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


        <!-- Dominio Transfergest.com -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDStLYcYnL_jyIcmrChfZ3rGp71WBHHBmc&libraries=places&sensor=false"></script>


    <script src="static/js/plugins/jquery-2.1.1.min.js"></script>
    <script src="static/js/plugins/jquery-ui.js"></script>
    <script src="static/js/plugins/momentjs/moment-with-locales.min.js"></script>
    <script src="static/js/plugins/bootstrap.min.js"></script>
    <script src="static/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="static/js/plugins/select2.full.min.js"></script>

    <title>Novo Serviço</title>
    <style type="text/css">
        #map-canvas {width:350px;height:350px;}
        .row 
        {
            margin-right: -10px;
            margin-left: -10px;
        }

        h5.col-xs-12.mylabel.w3-padding-8.w3-card-2 {
            width: 100%;
            background-color: #f0ad4e;
            padding: 10px;
            margin: -1px 0px 20px auto;
        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            height: 34px!important;
        }
        .select2-container {
                width: 100%!important;
                box-sizing: border-box;
                display: inline-block;
                margin: 0;
                position: relative;
                vertical-align: middle;
            }
    </style>
</head>
<body>


<div class="back">
    <div class="load"></div>
</div>

<?php require '../modals.php' ?>

    <!-- top bar -->
    <?php require ROOTDIR . '/includes/topbar.php';?>
    <!-- top bar -->

    <div class="container-fluid">
        <div style="padding-top:10px;">

            <!-- navbar -->
            <?php $menu ='new-transfer'; require ROOTDIR . '/includes/navbar.php';?>
            <!--/ navbar -->

            <!-- Content -->
            <?php require ROOTDIR . '/includes/new-transfer/index.php';?>
        </div>
    </div>

    
</body>
</html>