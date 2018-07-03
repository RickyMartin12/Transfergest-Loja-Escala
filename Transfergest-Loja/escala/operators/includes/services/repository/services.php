<?php
    require ROOTDIR . '/config/database.php';

    $date=strtotime(date("Y-m-d").'-00');

    $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf FROM excel WHERE operador = '{$nomeOperador}' AND data_servico  >= $date ORDER BY hrs LIMIT 0,20";

    $result = mysqli_query($conn, $query);
    $services = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $services[] = $row;
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);

    return $services;
