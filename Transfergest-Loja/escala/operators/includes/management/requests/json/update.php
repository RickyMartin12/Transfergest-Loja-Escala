<?php

    $operador = $data['id'];
    $taxa = $data['taxa'] === 'true' ? 1 : 0;

    if ($taxa === 1) {
        $tipo = $data['tipo'];
        if ($tipo == 0) {
            $tipo = "Percentagem";
        } else if ($tipo == 1) {
            $tipo = "Valor fixo";
        }
        $valor = $data['valor'];
    } else {
        $tipo = "";
        $valor = "";
    }

    require ROOTDIR . '/config/database.php';


    $query = "UPDATE `operador` SET taxa_de_servico={$taxa}, tipo_taxa_de_servico='{$tipo}', valor_taxa_de_servico='{$valor}' WHERE id={$operador};";
    mysqli_query($conn, $query);
    mysqli_close($conn);

    return ['success' => true];