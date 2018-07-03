<style>
.hv:hover{color:#337ab7;}
</style>
<input type="hidden" id="realtime">
<div class="panel panel-primary" id="real_time_container" style="border-color: #000; background: #222;">
	<div class="panel-heading heading_small" id="panel-heading" style="overflow: auto;">
<div class="realtimeheader">
		<span class="glyphicon glyphicon-chevron-down seemore" onclick="showTeamLogs()"></span>
		<h3 class="panel-title" style="text-align:center;line-height: 37px;" id="timenow"></h3><span style="padding:5px;">
                <img class="img-round myrealtime" style='top: 10px;right: -65px;'src="css/contador.png" height="25" width="25" onclick="showRealTime()">
              </span>
		</div>
		<div id="logs15" style="margin-top:46px;"></div>
	</div>
	<div class="panel-body" id="panel-body" style='background: #222; padding: 10px 10px 0px 10px;'>
	<div id="ontime_container" class='ontime_full'>
		<div class="row" style="border-bottom:3px solid #222; font-size:12px;margin-bottom: 1px;  margin-top: 1px;">
		<div class="col-xs-3 no_pd ct_uc" style="width:40px;">id</div>
		<div class="col-xs-3 no_pd ct_uc" style="width:40px;">hora</div>
		<div class="col-xs-2 no_pd ct_uc" style="max-width:100px; min-width:75px;">staff</div>
		<div class="accao no_pd col-xs-2 ct_uc" style="width:90px;">estado</div>
		<div class="col-xs-2 no_pd ct_uc" style="width:62px;">acções</div></div>
		<div id="ontime" style='padding: 1px 1px 1px 1px;'></div>
	</div>
	<div id="map_container">
		<div class="scr_hrz">
			<div class="inner_scr_hrz">
				<div class="item">
						<a href="map.php" target="_blank" class=" btn-info btn-sm zoom-in" title="Mapa Grande"><span class="glyphicon glyphicon-zoom-in"></span></a>
						<a href="#" onclick="myStaff()" title="Ver Staff" class="btn-sm btn-info"><span class="glyphicon glyphicon-user" style="color:#FFF;"></span></a>
        			</div>	
				</div>
			</div>
			<div id="mymap"></div>
		</div>
	</div>
</div>
<script>
currentServices();
</script>

