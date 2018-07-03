<!DOCTYPE html>
<html>
<head>
<title>Loja - OSEUBACKOFFICE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link href="loja/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="loja/css/bootstrap.min.css">
       <link href="loja/css/select2.min.css" type="text/css" rel="stylesheet">
       <link href="loja/css/font-awesome.min.css" rel="stylesheet"> 
       <link rel="stylesheet" href="loja/css/w3.css">
       <link rel="stylesheet" href="loja/css/font.css">
       <link rel="stylesheet" href="loja/css/style2.css">
        
       <!-- Chave API pertencente ao dominio localhost -->
       <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbnI7Q3z65vyGBYBAExOd03yCf9rOKAVU&libraries=places&sensor=false"></script>
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
       
       <script src="loja/js/moment-with-locales.js"></script>
       <script src="loja/js/bootbox.min.js"></script>
       <script src="loja/js/select2.full.min.js"></script>
       
       <script src="loja/js/bootstrap.min.js"></script>
       <script src="loja/js/bootstrap-datetimepicker.js"></script>
       <script src="loja/calls.js"></script>
            
                
<style>

#search-prods
{
  display: none;
}

</style>       



       

</head>




<body>


<!-- Loja de Compra -->






<div class="bgimg w3-display-container w3-animate-opacity">

			    	<section id="page-top" class="section-style" data-background-image="images/background/page-top.jpg">
						<div class="pattern height-resize">
							<div class="container">			  
						<h1 class="site-title"><img class="fixed-ratio-resize" alt=""/></h1>
						
					
					<div class='load'></div>

					<?php require 'loja/shop.php'; ?>

					</div>
					</div>
					</section>

</div>
				


	</body>		
                
	</html>