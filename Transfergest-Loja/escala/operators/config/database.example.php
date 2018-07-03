<?php
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_password = "";
    $db_database = "oseuback_transfergest";

    $conn = mysqli_connect($db_host, $db_user , $db_password, $db_database);

    if (!$conn) {
        die("Erro ao ligar DB" . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
