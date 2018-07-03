<?php
    define('ROOTDIR', dirname(dirname(dirname(dirname(__FILE__)))));

    $nomeOperador = $_GET['nomeOperador'];

    //filtros

    require ROOTDIR . '/config/database.php';

    $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf FROM excel WHERE operador = '{$nomeOperador}'"; 
    $result = mysqli_query($conn, $query);

    $servicos = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $servicos[] = $row;
        }
    }
    mysqli_free_result($result);

    mysqli_close($conn);