<?php
require ROOTDIR . '/config/database.php';

$page = intval($data['page']);
$operador = $data['operador'];
$service = $data['service'];
$status = $data['status'];
$id = $data['id'];


//pagination
$SERVICES_PER_PAGE = 20;
$minLimitValue = 0;

if ($page != 1) {
    $minLimitValue = ($page - 1) * $SERVICES_PER_PAGE;
}


$query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf FROM excel WHERE operador = '{$operador}' ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";


if ($id != -1) {
    $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
        "FROM excel " .
        "WHERE operador = '{$operador}' " . " AND id LIKE '{$id}%' " .
        "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
    if ($service != -1) {
        $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
            "FROM excel " .
            "WHERE operador = '{$operador}' " . " AND id LIKE '{$id}%' AND servico='{$service}' " .
            "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
        if ($status != -1) {
            $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
                "FROM excel " .
                "WHERE operador = '{$operador}' " . " AND id LIKE '{$id}%' AND servico='{$service}' AND estado='{$status}' " .
                "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
        }
    } elseif ($status != -1) {
        $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
            "FROM excel " .
            "WHERE operador = '{$operador}' " . " AND id LIKE '{$id}%' AND estado='{$status}' " .
            "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
    }



    elseif ($ini != -1 && $fim != -1) {
      $d_i=explode('/',trim($data['ini']));
      $di=strtotime($d_i[2].'-'.$d_i[1].'-'.$d_i[0].'-00');

      $d_f = explode('/',trim($data['fim']));
      $df=strtotime($d_f[2].'-'.$d_f[1].'-'.$d_f[0].'-00');
        $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
            "FROM excel " .
            "WHERE (data_servico BETWEEN $di AND $df) AND operador = '{$operador}' " . " AND id LIKE '{$id}%' AND estado='{$status}' " .
            "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
    }


    elseif ($ini != -1) {
      $d_i=explode('/',trim($data['ini']));
      $di=strtotime($d_i[2].'-'.$d_i[1].'-'.$d_i[0].'-00');
        $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
            "FROM excel " .
            "WHERE data_servico = $di AND operador = '{$operador}' " . " AND id LIKE '{$id}%' AND estado='{$status}' " .
            "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
    }


} elseif ($service != -1) {
    $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
        "FROM excel " .
        "WHERE operador='{$operador}' " . "AND servico='{$service}' " .
        "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
    if ($status != -1) {
        $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
            "FROM excel " .
            "WHERE operador = '{$operador}' " . " AND servico='{$service}' AND estado='{$status}' " .
            "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
    }
} elseif ($status != -1) {
    $query = "SELECT id, servico, nome_cl, px + cr + bebe as pax, estado, data_servico, hrs, pag_ope, pag_staf " .
        "FROM excel " .
        "WHERE operador = '{$operador}' " . "AND estado='{$status}' " .
        "ORDER BY hrs LIMIT {$minLimitValue},{$SERVICES_PER_PAGE}";
}













$result = mysqli_query($conn, $query);
$services = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_array()) {
        $services[] = $row;
    }
}
mysqli_free_result($result);

$query2 = "SELECT count(*) as total FROM excel WHERE operador = '{$operador}'";
if ($id != -1) {
    $query2 = "SELECT count(*) as total " .
        "FROM excel " .
        "WHERE operador = '{$operador}' " . "AND id LIKE '{$id}%'";
    if ($service != -1) {
        $query2 = "SELECT count(*) as total " .
            "FROM excel " .
            "WHERE operador = '{$operador}' " . "AND id LIKE '{$id}%' AND servico='{$service}'";
        if ($status != -1) {
            $query2 = "SELECT count(*) as total " .
                "FROM excel " .
                "WHERE operador = '{$operador}' " . "AND id LIKE '{$id}%' AND servico='{$service}' AND estado='{$status}'";
        }
    } elseif ($status != -1) {
        $query2 = "SELECT count(*) as total " .
            "FROM excel " .
            "WHERE operador = '{$operador}' " . "AND id LIKE '{$id}%' AND estado='{$status}'";
    }
} else if ($service != -1) {
    $query2 = "SELECT count(*) as total " .
        "FROM excel " .
        "WHERE operador = '{$operador}' " . "AND servico='{$service}'";
    if ($status != -1) {
        $query2 = "SELECT count(*) as total " .
            "FROM excel " .
            "WHERE operador = '{$operador}' " . "AND servico='{$service}' AND estado='{$status}'";
    }
} else if ($status != -1) {
    $query2 = "SELECT count(*) as total " .
        "FROM excel " .
        "WHERE operador = '{$operador}' " . "AND estado='{$status}'";
}


$result2 = mysqli_query($conn, $query2);
$total_of_services = [];
if (mysqli_num_rows($result2) > 0) {
    while ($row = $result2->fetch_array()) {
        $total_of_services[] = $row;
    }
}
mysqli_free_result($result2);
mysqli_close($conn);

$total_of_services = $total_of_services[0]['total'];

$numOfPages = ceil($total_of_services / $SERVICES_PER_PAGE);

return ['services' => $services, 'num_of_pages' => $numOfPages, 'total_of_services' => $total_of_services];