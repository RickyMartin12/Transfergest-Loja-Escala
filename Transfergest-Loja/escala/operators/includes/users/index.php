<?php require ROOTDIR . "/includes/users/repository/users.php";?>

<style>
.panel-heading{
border-radius:0px;
}

</style>
<div id="users">
    <?php require ROOTDIR . "/includes/users/partials/create.php";?>
    <?php require ROOTDIR . "/includes/users/partials/list.php";?>
    <?php require ROOTDIR . "/includes/users/partials/modalDelete.php";?>
</div>