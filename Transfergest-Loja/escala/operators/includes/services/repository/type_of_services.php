<?php
    require ROOTDIR . '/config/database.php';

    $query = "SELECT DISTINCT id_categoria FROM operador_precos WHERE id_operador = {$idOperador}";
    $result = mysqli_query($conn, $query);

    $idsDeCategorias = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $idsDeCategorias[] = $row['id_categoria'];
        }
    }
    mysqli_free_result($result);

    $type_of_services = [];
    if (count($idsDeCategorias) > 0) {
        $query2 = 'SELECT id, nome FROM categoria_prods WHERE `id` IN (' . implode(',', array_map('intval', $idsDeCategorias)) . ')';
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = $result2->fetch_array()) {
                $type_of_services[$row2['id']] = $row2['nome'];
            }
        }
        mysqli_free_result($result2);
    }

    mysqli_close($conn);

    return $type_of_services;