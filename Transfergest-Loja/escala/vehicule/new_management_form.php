<style>
.panel-body{ padding:0px;}
</style>

<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
  <li class="active btn-acc">
   <a title='Criar Nova despesa Diária' onclick="callNewVehExpense(5)"><i class="fa fa-list" aria-hidden="true"></i> Diária</a>
 </li>
 <li class="btn-acc">
   <a title='Criar Nova despesa Manutenção' onclick="callNewVehExpense(1)"><i class="fa fa-cogs" aria-hidden="true"></i> Manutenção</a>
 </li>
 <li class="btn-acc">
   <a title='Criar Nova despesa Fixa' onclick="callNewVehExpense(4)"><span class="glyphicon glyphicon-bookmark"></span> Fixa</a>
 </li>
</ul>

<div class="panel panel-default">
 <div class="panel-heading my-orange"></div>

<!--INSERIR NOVO PRODUTO-->

 <div class="panel-body" id="add_type"></div>

 <div class="panel-footer my-orange"></div> 
</div>

<!--INSERIR EDITAR PRODUTO-->

 <div id="add_type_edit"></div>

<script>

$('.btn-acc').on('click',function(){
  $('.btn-acc').removeClass('active');
  $(this).addClass('active');
});

</script>