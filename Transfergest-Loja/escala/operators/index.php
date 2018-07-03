<?php
    define('ROOTDIR', dirname(__FILE__));
    date_default_timezone_set('Europe/Lisbon');

    require ROOTDIR . "/session/auth.php";
    $operador_id = $_SESSION['login_id_operator'];
?>
<!doctype html>
<html lang="pt_PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="o-token" content="<?php echo "6E6xI4riA3." . $operador_id. ".L5J17jMD4w"; ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" type="text/css" href="static/css/main.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/plugins/circle.css">
    <link rel="stylesheet" href="../css/w3.css">
    <title>Home</title>
</head>

<?php

$operator = $_SESSION['login_operator'];
?>

<body onload="getCurrentServicies('<?php echo $operator ?>')">




<div class="back">
    <div class="load"></div>
</div>

    <!-- top bar -->
    <?php require ROOTDIR . '/includes/topbar.php';?>
    <!-- top bar -->

    <div class="container-fluid">
        <div style="padding-top:10px;">
            <!-- navbar -->
            <?php $menu ='home'; require ROOTDIR . '/includes/navbar.php';?>
            <!--/ navbar -->

            <!-- Content -->
            <?php require ROOTDIR . '/includes/dashboard/index.php';?>
        </div>
    </div>
    <script src="static/js/plugins/jquery-3.1.1.min.js"></script>
    <script src="static/js/plugins/momentjs/moment-with-locales.min.js"></script>
    <script src="static/js/plugins/bootstrap.min.js"></script>
    <script src="static/js/shopinfo.js"></script>
        <script>
      arr = JSON.parse(localStorage.getItem("shopDef"));
      $('.logo_insert').prop('src','../definitions/'+arr[0].logo);
    </script>
</body>
</html>