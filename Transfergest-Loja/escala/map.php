<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
  <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDStLYcYnL_jyIcmrChfZ3rGp71WBHHBmc"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/system_map.js"></script>
    <script src="js/system_services.js"></script>
</head>
<body onload="showFullMap()">
<div id="mymap">
</div>
</body>
</html>
<script>
function showFullMap(){
$('#mymap').css('height','100vh');
$('#mymap').css('width','100%');
LoadMap();
}
</script>