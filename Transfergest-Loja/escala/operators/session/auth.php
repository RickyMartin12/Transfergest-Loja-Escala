<?php
require ROOTDIR . "/config/database.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_check = $_SESSION['login_user'];

//operador_utilizadores table
$query = "SELECT id, utilizador, operador_id FROM operador_utilizadores WHERE utilizador='{$user_check}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


if (isset($row['utilizador']) && !empty($row['utilizador'])) {
    $query2 = "SELECT id, nome, utilizador FROM operador WHERE id={$row['operador_id']}";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    mysqli_close($conn);
    if (isset($row2['utilizador']) && !empty($row2['utilizador'])) {
        $login_session = ['operador_id' => $row2['id'], 'user_id' => $row['id'], 'username' => $row['utilizador'], 'type' => 'normal', 'operador_name' => $row2['nome']];

        //shared Data
        require ROOTDIR . "/includes/sharedData.php";

        //redirect if login success
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri == "/operators/login.php") {
            header("location: /operators/");
        }
    } else {
        session_destroy();
        header("location: /operators/login.php");
    }
} else {
    //operador table
    $query2 = "SELECT id, utilizador, nome FROM operador WHERE utilizador='{$user_check}'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    mysqli_close($conn);
    if (isset($row2['utilizador']) && !empty($row2['utilizador'])) {
        $login_session = ['operador_id' => $row2['id'], 'user_id' => $row2['id'], 'username' => $row2['utilizador'], 'type' => 'admin', 'operador_name' => $row2['nome']];

        //shared Data
        require ROOTDIR . "/includes/sharedData.php";

        //redirect if login success
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri == "/operators/login.php") {
            header("location: /operators/");
        }
    } else {
        session_destroy();
        header("location: /operators/login.php");
    }
}