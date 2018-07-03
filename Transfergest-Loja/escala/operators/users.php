<?php
define('ROOTDIR', dirname(__FILE__));
date_default_timezone_set('Europe/Lisbon');

require ROOTDIR . "/session/auth.php";
?>
<!doctype html>
<html lang="pt_PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="o-token" content="<?php echo "6E6xI4riA3." . $idOperador . ".L5J17jMD4w"; ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="static/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Gestão</title>

</head>
<body>
<!-- top bar -->
<?php require ROOTDIR . '/includes/topbar.php'; ?>
<!-- top bar -->

<div class="container-fluid">
    <div style="padding-top:10px;">

        <!-- navbar -->
        <?php $menu = 'users';
        require ROOTDIR . '/includes/navbar.php'; ?>
        <!--/ navbar -->

        <!-- Content -->
        <?php require ROOTDIR . '/includes/users/index.php'; ?>
    </div>
</div>

    <!--Javascript-->
    <script src="static/js/plugins/jquery-3.1.1.min.js"></script>
    <script src="static/js/plugins/momentjs/moment-with-locales.min.js"></script>
    <script src="static/js/plugins/bootstrap.min.js"></script>
    <script src="static/js/users.js"></script>
</body>
</html>