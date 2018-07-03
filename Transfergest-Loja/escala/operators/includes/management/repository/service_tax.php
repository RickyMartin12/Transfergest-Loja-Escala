<?php
    require ROOTDIR . '/config/database.php';

    $query = "SELECT taxa_de_servico,tipo_taxa_de_servico, valor_taxa_de_servico FROM operador WHERE id={$idOperador};";
    $result = mysqli_query($conn, $query);

    $operador = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $operador[] = $row;
        }
    }
    mysqli_free_result($result);

    mysqli_close($conn);

    return $operador[0];