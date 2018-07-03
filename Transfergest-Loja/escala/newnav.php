<style> 

.logo-t{width:auto; margin: -5px 10px 10px -6px; max-width: 190px; cursor: pointer;}
.w3-sidenav{z-index: 3; width: 200px; background:#333;}
.my-top {z-index:5;top:45px; margin-bottom:40px;}
#myNavbarSmall{background:#333; z-index:99;}
.main-link{padding: 6px 10px!important;}

</style>

<div class='row hidden-xs header-info'>
	<marquee direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" id='instant-info'></marquee>
</div>

<div id="myNavbarSmall" class='w3-top w3-card-2'>
	<span title="Ver Menu" class="w3-margin w3-opennav w3-text-white w3-xxlarge w3-hover-text-amber nav-action is-open"><i class="fa fa-bars"></i>
	</span>
	<input id='domains' type='hidden' value='<?php echo $_SERVER['HTTP_HOST'];?>'>
	<img class="logo-t" src="css/logo-nav.png" onclick="up()">
	<span class="w3-right" style='margin-right: 16px;'>
		<a href="#" onclick="showRealTime()" class="w3-text-white w3-xxlarge w3-hover-text-amber"><i class="fa fa-clock-o"></i>
		</a>
	</span>
</div>

<div class="w3-top my-top">
	<nav class="w3-sidenav w3-card-4 w3-animate-left" id="mySidenav">
		<ul class="nav">

<!-- MENU 1 -->

			<?php if ($_SESSION['m10'] == 'checked') { ?>

			<li data-toggle="collapse" data-target="#transfers" class="collapsed">
				<a href="#" class="main-link">
					<span class="glyphicon glyphicon-road"></span> Transfers <span class=" myarrow glyphicon 
glyphicon-chevron-down"></span>
				</a>
			</li>

			<ul class="sub-menu collapse" id="transfers">


				<?php if ($_SESSION['m11'] == 'checked') { ?>

				<li class='nav-mob' onclick='transfersLinks(0)' title="Painel Controlo">
					<a href='#'>
						<i class="fa fa-dashboard"></i> Painel Controlo
					</a>
				</li>

				<li class='nav-mob' onclick='transfersLinks(1)' title="Novo Transfer">
					<a href='#'>
						<span class="glyphicon glyphicon-plus"></span> Novo
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m12'] == 'checked') { ?>

				<li class='nav-mob' onclick="transfersLinks(2)" title="Acções sobre os registos apagar/editar">
					<a href='#'>
						<span class="glyphicon glyphicon-filter"></span> Pesquisa ID
					</a>
				</li>
				
				<?php } ?>

				<?php if ($_SESSION['m13'] == 'checked') { ?>

				<li class='nav-mob' onclick="transfersLinks(3)" title="Listagem todos campos serviços">
					<a href='#'>
						<i class="fa fa-table"></i> Gestão Consulta
					</a>
				</li>

				<?php } ?>
				
				<?php if ($_SESSION['m14'] == 'checked') { ?>

				<li class='nav-mob' onclick="transfersLinks(4)" title="Atribuição de Serviços">
					<a href='#'>
						<span class="glyphicon glyphicon-list-alt"></span> * Gestão Escalas
					</a>
				</li>
				
				<?php } ?>

				<?php if ($_SESSION['m14'] == 'checked') { ?>

				<li class='nav-mob' onclick="transfersLinks(5)" title="Gerir e editar os campos dos serviços">
					<a href="#">
						<i class="fa fa-columns"></i> * Gestão Edição
					</a>
				</li>
				
				<?php } ?>

			</ul>

			<?php } ?>

<!-- MENU 2 -->

			<?php if ($_SESSION['m20'] == 'checked') { ?>

			<li data-toggle="collapse" data-target="#escalas" class="collapsed">
				<a href="#" class="main-link">
					<i class="fa fa-clock-o"></i> Escalas 
					<span class=" myarrow glyphicon glyphicon-chevron-down"></span>
				</a>
			</li>

			<ul class="sub-menu collapse" id="escalas">

				<?php if ($_SESSION['m20'] == 'checked') { ?>

				<li class='nav-mob' onclick='window.open("/escala/schedule/shedule_day.php")' title="Apresenta todos os serviços do Staff Régua (Staff) a realizar, 3 dias antes e 90 dias após o dia atual">
					<a href="#">
						<i class="fa fa-list"></i>  Régua Dia Staff
					</a>
				</li>


<li class='nav-mob' onclick='window.open("/schedule/ndt/index.php")'title="Apresenta todos os serviços do Staff Régua (Staff) a realizar, 1 dia após o dia atual">
					<a href="#">
						<i class="fa fa-list"></i> Horizontal
					</a>
				</li>


				<li class='nav-mob' onclick='window.open("../schedule/shedule_day_operators.php")'title="Apresenta todos os serviços do Staff Régua (Forn.) a realizar, 3 dias antes e 90 dias após o dia atual">
					<a href="#">
						<i class="fa fa-list"></i> Régua Dia Forn.
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m20'] == 'checked') { ?>

				<li class='nav-mob' onclick='window.open("../schedule/weekly_dates.php")'title="Apresenta todos os serviços do staff a realizar apartir do dia atual mais 180 dias seguintes">
					<a href="#">
						<i class="fa fa-list-alt"></i> Régua Semana
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m20'] == 'checked') { ?>

				<li class='nav-mob' onclick='window.open("../schedule/vehicules_day.php")'title="Apresenta todos os serviços  a realizar, 3 dias antes e 8 dias após o dia atual">
					<a href="#">
						<i class="fa fa-taxi"></i> Escala Viaturas
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m20'] == 'checked') { ?>
<!--
				<li class='nav-mob' onclick="escalasLinks(1)" tit1="Validar montantes dos serviços e comissões">
					<a href="#">
						<i class="fa fa-money"></i> Validar
					</a>
				</li>
-->
				<?php } ?>

			</ul>

			<?php } ?>

<!-- MENU 3 OPERADORES-->

			<?php if ($_SESSION['m20'] == 'checked') { ?>

			<li data-toggle="collapse" data-target="#operadores" class="collapsed">
				<a href="#" class="main-link">
					<span class="glyphicon glyphicon-tower"></span> Operadores <span class=" myarrow glyphicon glyphicon-chevron-down"></span>
				</a>
			</li>

			<ul class="sub-menu collapse" id="operadores">

				<?php if ($_SESSION['m21'] == 'checked') { ?>

				<li class='nav-mob' onclick="operadorLink(1)" title="Novo Operador">
					<a href='#'><span class="glyphicon glyphicon-tower"></span> Novo
					</a>
				</li>
				
				<?php } ?>

				<?php if ($_SESSION['m23'] == 'checked') { ?>

				<li class='nav-mob' onclick="operadorLink(2)" title="Novo Local">
					<a href='#'><span class="glyphicon glyphicon-home"></span> Locais
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m24'] == 'checked' || $_SESSION['m24'] == 'checked1') { ?>

				<li class='nav-mob' onclick="operadorLink(3)" title="Tabelas Valores Operadores">
					<a href='#'><i class="fa fa-line-chart"></i> Tabela
					</a>
				</li>

				<?php } ?>



				<?php if ($_SESSION['m25'] == 'checked') { ?>

				<li  class='nav-mob' onclick="operadorLink(5)" title="Valores de comissões a liquidar a operadores, apenas são exibidos valores onde o campo Cmx.Operador é superior a 0.">
					<a href='#'><i class="fa fa-percent"></i> Comissões
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m25'] == 'checked') { ?>

				<li  class='nav-mob' onclick="operadorLink(4)" title="Valores de serviços a cobrar a operadores, apenas são exibidos valores onde o campo Cobrar Operador é superior a 0.">
					<a href='#'><i class="fa fa-university"></i> Cobranças
					</a>
				</li>

				<?php } ?>


			</ul>
			<?php } ?>


<!-- MENU 4 -->

 			<?php if ($_SESSION['m30'] == 'checked') { ?>

			<li data-toggle="collapse" data-target="#staff" class="collapsed">
				<a href="#" class="main-link">
					<span class="glyphicon glyphicon-user"></span> Staff 
					<span class=" myarrow glyphicon glyphicon-chevron-down"></span>
				</a>
			</li>

			<ul class="sub-menu collapse" id="staff">

				<?php if ($_SESSION['m31'] == 'checked') { ?>
				
				<li class='nav-mob' onclick="staffLink(1)" title="Novo elemento do staff">
					<a href='#'><span class="glyphicon glyphicon-user"></span> Novo
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m32'] == 'checked') { ?>

				<li class='nav-mob' onclick="staffLink(2)" title="Criar Grupos para Tabela Comissões Fixas">
					<a href='#'><i class="fa fa-object-group"></i> Grupos
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m32'] == 'checked') { ?>

				<li class='nav-mob' onclick="staffLink(3)" title="Criar Tabelas para Comissões Fixo Staff">
					<a href='#'><i class="fa fa-line-chart"></i> Tabela
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m33'] == 'checked') { ?>
				
				<li class='nav-mob' onclick="staffLink(4)" title="Comissões a Staff">
					<a href="#"> <i class="fa fa-percent"></i> Comissões
					</a>
				</li>

				<?php } ?>

				<?php if ($_SESSION['m34'] == 'checked') { ?>

				<li class='nav-mob' title="Cobranças a Staff" onclick="staffLink(6)">
					<a href="#" ><i class="fa fa-university"></i> Cobranças</a>
				</li>
				
				<li class='nav-mob' title="Diferença entre Serviços/Despesas efetuados pelo Staff" onclick="staffLink(7)">
					<a href="#" ><i class="fa fa-columns"></i> Relatório</a>
				</li>
				<?php } ?>

			</ul>
			<?php } ?>


<!-- OK -->

<?php if ($_SESSION['m40'] == 'checked') { ?>
<!--MENU 4 VIATURAS-->
<li data-toggle="collapse" data-target="#viaturas" class="collapsed">
<a href="#" style="padding: 4px 10px;"> <i class="fa fa-bus" aria-hidden="true"></i> Viaturas <span class=" myarrow glyphicon glyphicon-chevron-down"></span></a></li>

<ul class="sub-menu collapse" id="viaturas">

<?php if ($_SESSION['m41'] == 'checked') { ?>
<li class='nav-mob' title="Lançar Nova viatura" onclick="callNewVehExpense(0)">
<a href='#'>  <i class="fa fa-taxi" aria-hidden="true"></i>   Nova</a>
</li>
<?php } ?>

<?php if ($_SESSION['m42'] == 'checked') { ?>
<li class='nav-mob' title="Lançar Despesa Viatura" onclick="callNewVehExpense(2)">
<a href='#'>  <span class="glyphicon glyphicon-plus"></span> Despesa</a>
</li>
<?php } ?>

<?php if ($_SESSION['m43'] == 'checked') { ?>

<!--
<li class='nav-mob' onclick="callExpensiesActions()" title="Editar despesas">
<a href='#'>  <span class="glyphicon glyphicon-list-alt"></span> Relatório GeralOLD</a>
</li>

<li class='nav-mob' onclick="callNewVehExpense(6)" title="Proveitos e Despesas Staff/Viatura">
<a href='#'><i class="fa fa-calculator"></i> Rendimento</a>
</li>

<li class='nav-mob' onclick="callNewVehExpense(7)" title="Editar despesas">
<a href='#'>  <span class="glyphicon glyphicon-list-alt"></span> Gestão 2</a>
</li>
-->

<?php } ?>


<li class='nav-mob' onclick="callNewVehExpense(8)" title="Consultar Despesas de Viaturas">
<a href='#'><i class="fa fa-university" aria-hidden="true"></i> Ver Despesas</a>
</li>

<!--
<li class='nav-mob' onclick="callNewVehExpense(9)" title="Consultar Despesas de Viaturas ">
<a href='#'><i class="fa fa-cog" aria-hidden="true"></i> Relatório</a>
</li>
-->


</ul> 
<?php } ?>


<?php if ($_SESSION['m50'] == 'checked') { ?>
<!--MENU 5 LOJA-->

<li data-toggle="collapse" data-target="#loja" class="collapsed">
<a href="#" style="padding: 4px 10px;"> <span class="glyphicon glyphicon-shopping-cart"></span> Produtos <span class=" myarrow glyphicon glyphicon-chevron-down"></span></a>
</li>

<ul class="sub-menu collapse" id="loja">

<?php if ($_SESSION['m51'] == 'checked') { ?>
<li class='nav-mob' title="Criar Nova Categoria" onclick="callNewPricesForm(4)">
<a href='#'>  <span style="font-weight:900;font-size: 21px;">#</span> Categorias</a>
</li>
<?php }  ?>

<?php if ($_SESSION['m52'] == 'checked') { ?>
<li class='nav-mob' title="Lançar Novo Produto" onclick="callNewPricesForm(2)"><a href='#'>  <span class="glyphicon glyphicon-tag"></span>  Produto</a></li>
<?php }  ?>

<?php if ($_SESSION['m53'] == 'checked') { ?>
<!--
<li class='nav-mob' title="Editar Produtos" onclick="callNewPricesForm(3)"><a href='#'>     <span class="glyphicon glyphicon-edit"></span>  Editar</a></li>
-->
<?php }  ?>

</ul>
<?php }  ?>

<?php if ($_SESSION['m60'] == 'checked') { ?>
<!--MENU 6 ADMINISTRADOR-->

<li data-toggle="collapse" data-target="#admin" class="collapsed">
<a href="#" style="padding: 4px 10px;"> <span class="glyphicon glyphicon-king"></span> Administrador <span class="myarrow glyphicon glyphicon-chevron-down"></span></a></li>

<ul class="sub-menu collapse" id="admin">

<?php if ($_SESSION['m61'] == 'checked') { ?>
<li class='nav-mob' onclick="callNewAdminForm()" title="Novo Administrador">
<a href='#'>  <span class="glyphicon glyphicon-plus"></span>  Novo</a>
</li>
<?php }  ?>

<?php if ($_SESSION['m62'] == 'checked') { ?>
<li class='nav-mob' onclick="callAdminActions()" title="Editar Administrador">
<a href='#'>  <span class="glyphicon glyphicon-edit"></span>  Editar</a>
</li>
<?php }  ?>

<?php if ($_SESSION['m63'] == 'checked') { ?>
<li class='nav-mob' onclick="callAdminPrivilegies()" title="Atribuir privilégios aos utilizadores"><a href='#'>  <span class="glyphicon glyphicon-signal"></span>  Privilégios</a>
</li>

<?php }  ?>

<?php if ($_SESSION['m63'] == 'checked') { ?>
<li class='nav-mob' title="Graficos Proveitos/Despesas" onclick="callGraphics()"><a href='#'>  <span class="glyphicon glyphicon-equalizer"></span> Gráfico</a>
</li>
<?php }  ?>

</ul>
<?php } ?>


<?php if ($_SESSION['m70'] == 'checked') { ?>
<!--MENU 7 CONFIGURACOES-->

<li data-toggle="collapse" data-target="#configuracoes" class="collapsed">
<a href="#" style="padding: 4px 10px;"> <span class="glyphicon glyphicon-cog"></span> Configurações <span class=" myarrow glyphicon glyphicon-chevron-down"></span></a></li>

<ul class="sub-menu collapse" id="configuracoes">

<?php if ($_SESSION['m71'] == 'checked') { ?>
<li class='nav-mob' onclick="callDefinitionsActions()" title="Definições do Sistema">
<a href='#'>  <span class="glyphicon glyphicon-cog"></span>  Sistema</a>
</li>
<?php } ?>

<?php if ($_SESSION['m72'] == 'checked1') { ?>
<li class='nav-mob' onclick="callDefinitionsActions()" title="Definições da Loja">
<a href='#'>  <span class="glyphicon glyphicon-shopping-cart"></span>  Loja</a>
</li>
<?php } ?>

<?php if ($_SESSION['m73'] == 'checked1') { ?>
<li class='nav-mob' onclick="callDefinitionsActions()" title="Definições Tablet">
<a href='#'>  <span class="glyphicon glyphicon-phone"></span>  Tablet</a>
</li>
<?php } ?>

</ul>

<?php }  ?>

<?php if ($_SESSION['m80'] == 'checked') { ?>
<!--MENU 8 BACKUP-->

<li data-toggle="collapse" data-target="#backup" class="collapsed">
<a href="#" style="padding: 4px 10px;"> <span class="glyphicon glyphicon-save-file"></span> Back-Up <span class=" myarrow glyphicon glyphicon-chevron-down"></span></a></li>

<ul class="sub-menu collapse" id="backup">

<?php if ($_SESSION['m81'] == 'checked') { ?>
<li class='nav-mob' onclick="self.location.href ='export.php';" title="Guardar BD parcial">
<a href=#>  <span class="glyphicon glyphicon-save-file"></span>  Backup (XLS)</a>
</li>
<?php } ?>


<?php if ($_SESSION['m82'] == 'checked') { ?>
<li class='nav-mob' onclick="self.location.href ='export_sql.php';" title="Guardar BD total">
<a href="#">  <span class="glyphicon glyphicon-save-file"></span>  Backup (SQL)</a>
</li>
<?php } ?>

</ul>
<?php } ?>

<li title="Terminar Sessão" onclick="logOut('<?php echo $_SESSION['name'];?>');">
<a href="#" style="padding: 4px 10px;"> <span class="glyphicon glyphicon-log-out">
</span> Sair, <span id="usnm"><?php echo $_SESSION['name'];?></span></a>
</li>

<li class='nav-mob' onclick='window.open("http://transfergest.com/admin/manual_tg.pdf")' title="Manual TransferGest">
<a href="#" style="padding: 4px 10px;"> <i class="fa fa-question"></i> Ajuda</a>
</li>
</ul>

<div id="latestnews" class="latestnews"></div>

</nav>
</div>


<script src="js/loader.js"></script>

<script>

function up(){
loaderInit(1);
callAdminNews();
}


</script>