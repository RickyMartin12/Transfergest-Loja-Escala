<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
  <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/system.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <script src="js/system.js"></script>
</head>

<?php include 'modals.php'; ?>
<body onload="getLocation(), callDefinitions()" style="padding-top:5px;">
<div class="back"></div>
<input type="hidden" id="reserved_time">
<div class="container-fluid">
<div class="row">
<div id='logo' class='col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12'></div>
</div>
<?php include 'quotes.php'; ?>

<div class="row">
  <div class="col-xs-offset-1 col-xs-10">
    <div id="results"></div>
  </div>
</div>

<div id="formdata"></div>
</div>

<span class="to_top btn btn-default" title="To top...">
<i class="fa fa-chevron-up" aria-hidden="true"></i>
</span>
</body>
</html>