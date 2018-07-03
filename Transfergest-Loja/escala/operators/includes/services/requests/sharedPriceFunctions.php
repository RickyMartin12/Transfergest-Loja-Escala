<?php

function getProductId($conn, $zonaRecolha, $zonaEntrega, $servico)
{
    $product_id = -1;
    $query      = "SELECT id FROM locais WHERE (local='{$zonaRecolha}' AND local_fim='{$zonaEntrega}') OR (local_fim='{$zonaRecolha}' AND local='{$zonaEntrega}') AND cat = {$servico} LIMIT 1";
    $result     = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $product_id = $row['id'];
        }
    }
    mysqli_free_result($result);

    return $product_id;
}

function getLabelId($conn, $passageiros, $servico)
{
    $label_id = -1;
    $query    = "SELECT id FROM classe_prods WHERE  min <= {$passageiros} AND max >= {$passageiros} AND cat = {$servico} LIMIT 1";
    $result   = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $label_id = $row['id'];
        }
    }
    mysqli_free_result($result);

    return $label_id;
}

function getValor($conn, $local, $label, $idOperador, $servico, $atNight = false)
{
    $valor  = -1;

    $table = $atNight == true ? "operador_noturno": "operador_precos";
    
    $query  = "SELECT valor FROM {$table} WHERE prod_id={$local} AND id_label={$label} AND id_operador={$idOperador} AND id_categoria={$servico} LIMIT 1";
    $result = mysqli_query($conn, $query);

    echo mysqli_error($conn);


    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $valor = $row['valor'];
        }
    }
    mysqli_free_result($result);

    return $valor;
}