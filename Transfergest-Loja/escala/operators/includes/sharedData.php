<?php
    $isAdmin      = $login_session['type'] == 'admin';
    $idOperador   = $_SESSION['login_id_operator'];
    $nomeOperador = $_SESSION['login_operator'];
    $username     = $login_session['username'];
    $user_id      = $login_session['user_id'];