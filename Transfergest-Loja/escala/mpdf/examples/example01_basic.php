<?php

$ref = '123/526565';
$ref2 = '234/87FAD';

$html ='<link rel="stylesheet" href="w3.css">
<body style="background-gradient: linear #88FFFF #FF6600 0 0.5 1 0.5;">
<div class="w3-row w3-padding-4">
<div class="sbs-pdf125">&nbsp;</div>
<div class="w3-orange sbs-pdf250 w3-border" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;"><h3 class="w3-center">'.$ref2.'</h3></div><div class="sbs-pdf250">&nbsp;</div><div class="w3-indigo sbs-pdf250"><h3 class="w3-center">'.$ref.'</h3></div>
</div>
<div class="w3-row w3-padding-4">
<div class="sbs-pdf125">&nbsp;</div>
    <div class="sbs-pdf250">
      <img class="w3-border w3-card-4" src="images/steak.jpg" alt="Steak" style="width:100%">
      <h3 class="w3-center">Steak</h3>
    </div>
<div class="sbs-pdf250">&nbsp;</div>
    <div class="sbs-pdf250">
      <img src="images/cherries.jpg" alt="Cherries" style="width:100%">
      <h3 class="w3-center">Cherries</h3>
    </div>
<div class="sbs-pdf125">&nbsp;</div>
</div>
<div class="w3-row w3-padding-4">
<div class="w3-green sbs-pdf250"><h3 class="w3-center">25</h3></div>

<div class="w3-blue sbs-pdf50"><h3 class="w3-center">5</h3></div>
<div class="w3-purple sbs-pdf50"><h3 class="w3-center">5</h3></div>
<div class="w3-green sbs-pdf50"><h3 class="w3-center">5</h3></div>
<div class="w3-lime sbs-pdf50"><h3 class="w3-center">5</h3></div>
<div class="w3-red sbs-pdf50"><h3 class="w3-center">5</h3></div>
<div class="w3-brown sbs-pdf50"><h3 class="w3-center">5</h3></div>
<div class="w3-white sbs-pdf100"><h3 class="w3-center">10</h3></div>
<div class="w3-black sbs-pdf100"><h3 class="w3-center">10</h3></div>
<div class="w3-cyan sbs-pdf125"><h3 class="w3-center">12,5</h3></div>
<div class="w3-light-green sbs-pdf125"><h3 class="w3-center">12,5</h3></div>
</div>
<div class="w3-row w3-padding-4">
    <div class="sbs-pdf250 w3-round-xlarge">
      <img class="w3-border" src="images/wine.jpg" alt="Pasta and Wine" style="width:100%">
      <h3 class="w3-center w3-lime">Wine Pasta</h3>
    </div>
<div class="sbs-pdf500 w3-deep-orange" style="height:254px;"><h3 class="w3-center">50</h3></div>
    <div class="sbs-pdf250">
      <img class="w3-border" src="images/sandwich.jpg" alt="Pasta and Wine" style="width:100%">
      <h3 class="w3-border w3-center w3-red">Vegetable</h3>
    </div>
    </div>

<div class="w3-teal sbs-pdf1000"><h3 class="w3-center">100</h3></div>

</body>';


//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>