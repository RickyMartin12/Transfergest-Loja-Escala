<?php
    require ROOTDIR . '/config/database.php';

    $query = "SELECT count(*) as total FROM excel WHERE operador = '{$nomeOperador}'";

    $result = mysqli_query($conn, $query);
    $total_of_services = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $total_of_services[] = $row;
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);

    return $total_of_services[0]['total'];
