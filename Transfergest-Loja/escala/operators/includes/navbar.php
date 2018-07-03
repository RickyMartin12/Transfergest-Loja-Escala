<?php
function isActive($link = 'home', $menu)
{
    $classActive = 'btn-warning btn-md ';
    $classBtn = 'btn btn-md';

    return $menu == $link ? $classBtn . ' ' . $classActive : $classBtn . ' ' . 'btn-default';
}
?>

<?php

$operator = $_SESSION['login_operator'];
$id_login = $_SESSION['login_id_operator'];
$useris = $_SESSION['login_user'];
?>

<div class="panel panel-default" style="background-color:#222;">
    <div class="panel-heading" style="background-color:#222;color:white;">
        <h3 class="panel-title"><?php echo $operator; ?> - Olá <?php echo $useris; ?>.</h3>
        <input type="hidden" id="op" value="<?php echo $operator; ?>">
        <input type="hidden" id="id_op" value="<?php echo $id_login; ?>">
    </div>
    <div class="panel-body">
        <div class="btn-group" role="group">
            <a class="<?php echo isActive('home', $menu);?>" href="index.php"><span class="glyphicon glyphicon-home"></span><span class="hidden-xs"> Home</span></a>
            <a class="<?php echo isActive('new-transfer', $menu);?> btn" href="new-transfer.php"><span class="glyphicon glyphicon-plus"></span><span class="hidden-xs"> Novo</span></a>
            <a class="<?php echo isActive('services', $menu);?> btn" href="services.php"><span class="glyphicon glyphicon-th-list"></span><span class="hidden-xs">  Serviços</span></a>

            <?php if ($isAdmin) { ?>
                <a class="<?php echo isActive('management', $menu);?> btn" href="management.php"><span class="glyphicon glyphicon-cog"></span><span class="hidden-xs"> Gestão</span></a>
                <a class="<?php echo isActive('users', $menu);?> btn" href="users.php"><span class="glyphicon glyphicon-user"></span><span class="hidden-xs"> Utilizadores</span></a>
            <?php } ?>
        </div>
    </div>
</div>