<section>

<div class="w3-row-padding mylabel w3-padding-8 w3-margin-bottom w3-card-2">
  <h4 class="w3-col l7 m6 s12">
   <i class="txt-23 fa fa-dashboard"></i> PAINEL CONTROLO</h4>
  <h4 class="w3-col l3 m4 s6" style="text-align: right;">
    <i class="glyphicon glyphicon-calendar"></i> <?php echo date("d/m/Y") ?></h4>
  <h4 class="w3-col l2 m2 s6" style="text-align: right;">
    <i class="txt-23 fa fa-clock-o"></i>&nbsp;<span class="timenow"><?php echo date("H:i") ?></span></h4>
</div>


<div class="w3-row">
    <div class="w3-col l3 m4 s6 w3-padding-8">
      <div class="myball border-dgray w3-card-2">
       <div class="w3-padding-8">
          <h2 class="counter w3-center" id="totaltoday">0</h2>
       <h5 class="w3-center txt-14">Total Serviços</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>
 <div class="w3-col l3 m4 s6 w3-padding-8">
      <div class="myball ne border-dgray w3-card-2">
       <div class="w3-padding-8">
          <h2 class="counter w3-center" id="nostafftoday">0</h2>
       <h5 class="w3-center txt-14">Serviços por Atribuir</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>
    <div class="w3-col l3 m4 s6 w3-padding-8">
      <div class="myball border-dgray w3-card-2">
        <div class="w3-padding-8">
          <h2 class="counter w3-center" id="opentoday">0</h2>
          <h5 class="w3-center txt-14">Serviços<br>Abertos</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>

    <div class="w3-col l3 m4 s6 w3-padding-8">
      <div class="myball border-dgray w3-card-2">
        <div class="w3-padding-8">
          <h2 class="counter w3-center" id="closedtoday">0</h2>
          <h5 class="w3-center txt-14">Serviços Concluidos</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>
  </div>

  <div class="w3-row w3-margin-bottom w3-card-2" style="background:#333;">
    <span style="margin-top: -2px;" class="w3-col s12 w3-center w3-text-white">Serviços Agendados para Hoje</span>
  </div>

  <div class="w3-row">
    <div class="w3-col l4 m4 s6 w3-padding-8">
      <div class="myball de border-dgray w3-card-2">
       <div class="w3-padding-8">
          <h2 class="counter w3-center" id="pendingoperators">0</h2>
       <h5 class="w3-center txt-14">Operador Pendentes</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>

    <div class="w3-col l4 m4 s6 w3-padding-8">
      <div class="myball ce border-dgray w3-card-2">
        <div class="w3-padding-8">
          <h2 class="counter w3-center w3-padding-4" id="canceledoperators">0</h2>
<!--
          <h5 class="w3-center txt-14">Operador Alterados</h5>
-->
         <h5 class="w3-center txt-14">Operador Cancelados</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>
    <div class="w3-col l4 m4 s6 w3-padding-8">
      <div class="myball sp border-dgray w3-card-2">
        <div class="w3-padding-8">
          <h2 class="counter w3-center" id="fromshop">0</h2>
          <h5 class="w3-center txt-14">Online<br>Novos</h5>
        </div>
        <div class="w3-clear"></div>
      </div>
    </div>
  </div>

  <div class="w3-row w3-margin-bottom w3-card-2" style="background:#333;">
    <span style="margin-top: -2px;" class="w3-col s12 w3-center w3-text-white"> Serviços Externos</span>
  </div>

</section>
<script>

getAnalitics();

</script>