<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Payment Cancelled</title>
  <link rel="stylesheet"
   href='<?php echo "http://".$_SERVER[HTTP_HOST];?>/loja/css/font-awesome.min.css'>
  <link href='<?php echo "http://".$_SERVER[HTTP_HOST];?>/loja/css/bootstrap-datetimepicker.css' rel="stylesheet">
  <link rel="stylesheet" href='<?php echo "http://".$_SERVER[HTTP_HOST];?>/loja/css/bootstrap.min.css'>
  <link rel="stylesheet" href='<?php echo "http://".$_SERVER[HTTP_HOST];?>/loja/css/style.css'>
  <script src='<?php echo "http://".$_SERVER[HTTP_HOST];?>/loja/js/jquery.1.12.4.min.js'></script>
  <script src='<?php echo "http://".$_SERVER[HTTP_HOST];?>/loja/js/bootstrap.min.js'></script>
</head>
<body style='padding-top:5%;'>
<div class="container">
<div class='row'>
<div class="col-xs-10 col-xs-offset-1">
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
  <h1 style='text-align:center;' text>Payment Successful</h1>
  <p style="text-align:center;">Your payment was successful.</p>
</div>
</div>
<div class='row'>
<div class="col-xs-12">
<a href='<?php echo "http://".$_SERVER[HTTP_HOST];?>' id='redirect' class='col-xs-6 col-xs-offset-3 btn-default btn' 'title='To home page'><?php echo $_SERVER[HTTP_HOST];?></a>
</div>
</div>
</div>
<script>
setTimeout(function(){window.open("<?php echo 'http://'.$_SERVER[HTTP_HOST]?>", "_self"); }, 10000);
</script>
</body>
</html>
