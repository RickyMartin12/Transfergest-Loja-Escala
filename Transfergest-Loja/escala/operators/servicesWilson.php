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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/typeahead.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" type="text/css" href="static/css/main.css">
    <link rel="stylesheet" type="text/css" href="static/css/servicos.css">
    <title>Transfergest - Operadores</title>

</head>
<body>
    <?php require ROOTDIR . '/includes/topbar.php';?>

    <div class="container-fluid">
        <div style="padding-top:10px;">
            <?php $menu ='services'; require ROOTDIR . '/includes/navbar.php';?>
            <?php require ROOTDIR . '/includes/services/index.php'; ?>
        </div>
    </div>

    <!--Javascript-->
    <script src="static/js/plugins/jquery-3.1.1.min.js"></script>
    <script src="static/js/plugins/jquery.confirm.min.js"></script>
    <script src="static/js/plugins/momentjs/moment-with-locales.min.js"></script>
    <script src="static/js/plugins/bootstrap.min.js"></script>
    <script src="static/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="static/js/plugins/bootstrap-select.min.js"></script>
    <script src="static/js/plugins/i18n/defaults-pt_PT.min.js"></script>
    <script src="static/js/plugins/typeahead.bundle.min.js"></script>
    <script src="static/js/plugins/jquery.mask.min.js"></script>
    <script src="static/js/services.js"></script>
</body>
</html>