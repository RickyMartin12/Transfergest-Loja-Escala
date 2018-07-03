<?php
    require ROOTDIR . '/config/database.php';

    $operador = $data['operador'];
    $id = $data['id'];

    $query = "SELECT ".
             "id, servico, nome_cl, px + cr + bebe as pax, px, cr, bebe, ".
             "estado, data_servico, hrs, pag_ope, pag_staf, ".
             "local_recolha, local_entrega, operador, email, telefone, pais, morada_recolha, morada_entrega, obs, ".
             "cobrar_direto, cobrar_operador ".
             "FROM excel WHERE operador='{$operador}' AND id = {$id} ORDER BY hrs";


    $result = mysqli_query($conn, $query);
    $services = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $services[] = $row;
        }
    }

    mysqli_free_result($result);
    mysqli_close($conn);

    return $services[0];